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
    $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (id, first_name, last_name, gender, email, password, role)
            VALUES (:id, :first_name, :last_name, :gender, :email, :password, :role)";
    $stmt = $this->db->prepare($sql);

    return $stmt->execute([
        'id' => uniqid(),
        ':first_name' => $data['first_name'],
        ':last_name'  => $data['last_name'],
        ':gender'     => $data['gender'],
        ':email'      => $data['email'],
        ':password'   => $hashedPassword,  // Ensure the password is hashed
        ':role'       => $data['role']
    ]);
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

    

    public function emailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        $count = $stmt->fetchColumn();

        return $count > 0;
    }

    public function getUserInfo($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }


    // public function getById($id)
    // {
    //     $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute([':id' => $id]);
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    // public function getByEmail($email)
    // {
    //     $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute([':email' => $email]);
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    // public function getAll()
    // {
    //     $sql = "SELECT * FROM users ORDER BY created_at DESC";
    //     $stmt = $this->db->query($sql);
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public function update($id, $data)
    // {
    //     $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name,
    //             gender = :gender, email = :email, role = :role WHERE id = :id";
    //     $stmt = $this->db->prepare($sql);
    //     return $stmt->execute([
    //         ':first_name' => $data['first_name'],
    //         ':last_name'  => $data['last_name'],
    //         ':gender'     => $data['gender'],
    //         ':email'      => $data['email'],
    //         ':role'       => $data['role'],
    //         ':id'         => $id
    //     ]);
    // }

    // public function delete($id)
    // {
    //     $sql = "DELETE FROM users WHERE id = :id";
    //     $stmt = $this->db->prepare($sql);
    //     return $stmt->execute([':id' => $id]);
    // }
}