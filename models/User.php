<?php
class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($data)
    {
        $userId = uniqid("user_");
    
        $sqlUser = "INSERT INTO users (id, first_name, last_name, gender, email, password, role)
                    VALUES (:id, :first_name, :last_name, :gender, :email, :password, :role)";
        $stmtUser = $this->db->prepare($sqlUser);
        $stmtUser->execute([
            ':id' => $userId,
            ':first_name' => $data['first_name'],
            ':last_name'  => $data['last_name'],
            ':gender'     => $data['gender'],
            ':email'      => $data['email'],
            ':password'   => password_hash($data['password'], PASSWORD_DEFAULT),
            ':role'       => "3" 
        ]);
    
        $sqlSecurity = "INSERT INTO security_questions 
                        (user_id, security_nickname, security_street, security_sweet,  security_cartoon) 
                        VALUES 
                        (:user_id, :security_nickname, :security_street, :security_sweet, :security_cartoon)";
        $stmtSecurity = $this->db->prepare($sqlSecurity);
        $stmtSecurity->execute([
            ':user_id'           => $userId,
            ':security_nickname' => $data['security_nickname'],
            ':security_street'    => $data['security_street'],
            ':security_sweet'   => $data['security_sweet'],
            ':security_cartoon'  => $data['security_cartoon']
        ]);        
    }
    

        // $userId = $this->db->lastInsertId();

        // Insert into the images table
        // $sqlImage = "INSERT INTO images (related_id, image, related_type) VALUES (:related_id, :image, :related_type)";
        // $stmtImage = $this->db->prepare($sqlImage);
        
        // return $stmtImage->execute([
        //     ':related_id'   => $userId,
        //     ':image'        => $data['image'],
        //     ':related_type' => "user"
        // ]);
    
    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([ ':id' => $id ]);
    }

    public function update($id, $data)
    {
        // Update user data
        $sql = "UPDATE users 
                SET first_name = :first_name, last_name = :last_name, gender = :gender, email = :email, password = :password, role = :role 
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':first_name' => $data['first_name'],
            ':last_name'  => $data['last_name'],
            ':gender'     => $data['gender'],
            ':email'      => $data['email'],
            ':password'   => password_hash($data['password'], PASSWORD_DEFAULT), // Hash new password
            ':role'       => $data['role'],
            ':id'         => $id
        ]);

        // Update image if applicable
        $sqlImage = "UPDATE images SET image = :image, related_type = :type WHERE related_id = :id";
        $stmtImage = $this->db->prepare($sqlImage);
        return $stmtImage->execute([
            ':id'    => $id,
            ':image' => $data['image'],
            ':type'  => "user"
        ]);
    }

        public function emailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        $count = $stmt->fetchColumn();

        return $count > 0;
    }

    public function verifyUser($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function changePassword($userId, $currentPassword, $newPassword)
    {
        try {
            $query = "SELECT password FROM users WHERE id = :user_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_STR);
            $stmt->execute();
            $currentStoredPassword = $stmt->fetchColumn();
            
            if ($currentStoredPassword && password_verify($currentPassword, $currentStoredPassword)) {
                $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $updateQuery = "UPDATE users SET password = :new_password WHERE id = :user_id";
                $updateStmt = $this->db->prepare($updateQuery);
                $updateStmt->bindParam(':new_password', $newHashedPassword, PDO::PARAM_STR);
                $updateStmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
                $updateStmt->execute();

                return ['success' => true, 'message' => 'Password successfully updated.'];
            } else {
                return ['success' => false, 'message' => 'Current password is incorrect.'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    public function fetchUser($id)
    {
        $sql = "SELECT users.*, images.image FROM users LEFT JOIN images ON users.id = images.related_user WHERE users.id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getSecurityQuestions($email) {
        $sql = "SELECT sq.security_nickname, sq.security_cartoon, sq.security_street, sq.security_sweet 
                FROM security_questions sq
                JOIN users u ON u.id = sq.user_id
                WHERE u.email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function updatePassword($email, $updateData) {
        $password = password_hash($updateData['password'], PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE users SET password = :password WHERE email = :email");
        $stmt->execute([
            ':password' => $password,
            ':email' => $email
        ]);
        
    }

}

?>