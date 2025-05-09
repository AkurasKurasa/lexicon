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
        $sql = "INSERT INTO users (id, first_name, last_name, gender, email, password, role)
                VALUES (:id, :first_name, :last_name, :gender, :email, :password, :role)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id' => uniqid("user_"),
            ':first_name' => $data['first_name'],
            ':last_name'  => $data['last_name'],
            ':gender'     => $data['gender'],
            ':email'      => $data['email'],
            ':password'   => password_hash($data['password'], PASSWORD_DEFAULT),  // Hash password
            ':role'       => "3"
        ]);

        // $userId = $this->db->lastInsertId();

        // Insert into the images table
        // $sqlImage = "INSERT INTO images (related_id, image, related_type) VALUES (:related_id, :image, :related_type)";
        // $stmtImage = $this->db->prepare($sqlImage);
        
        // return $stmtImage->execute([
        //     ':related_id'   => $userId,
        //     ':image'        => $data['image'],
        //     ':related_type' => "user"
        // ]);
    }

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

        // Verify if the password matches the hashed password in the database
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function changePassword($userId, $currentPassword, $newPassword)
    {
        try {
            // Get the current password from the database
            $query = "SELECT password FROM users WHERE id = :user_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_STR);
            $stmt->execute();
            $currentStoredPassword = $stmt->fetchColumn();
            
            // Check if the current password matches the stored password
            if ($currentStoredPassword && password_verify($currentPassword, $currentStoredPassword)) {
                $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the password in the database
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
}

?>