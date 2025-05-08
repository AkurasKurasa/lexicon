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
        $sql = "INSERT INTO users (first_name, last_name, gender, email, password, role)
                VALUES (:first_name, :last_name, :gender, :email, :password, :role)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':first_name' => $data['first_name'],
            ':last_name'  => $data['last_name'],
            ':gender'     => $data['gender'],
            ':email'      => $data['email'],
            ':password'   => $data['password'],
            ':role'       => $data['role']
        ]);

        $userId = $this->db->lastInsertId();

        $sqlImage = "INSERT INTO images (related_id, image, related_type) VALUES (:related_id, :image, :related_type)";

        $stmtImage = $this->db->prepare($sqlImage);

        return $stmtImage->execute([
            ':related_id'   => $userId,
            ':image'        => $data['image'],
            ':related_type' => "user"
        ]);

    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE users 
                SET first_name = :first_name, last_name = :last_name, gender = :gender, email = :email, password = :password, role = :role 
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':first_name' => $data['first_name'],
            ':last_name'  => $data['last_name'],
            ':gender'     => $data['gender'],
            ':email'      => $data['email'],
            ':password'   => $data['password'],
            ':role'       => $data['role'],
            ':id'         => $id
        ]);

        $sqlImage = "UPDATE images
                    SET image = :image,
                        related_type = :type   
                    WHERE related_id = :id 
                    ";
        
        $stmt = $this->db->prepare($sqlImage);

        $resultImg = $stmt->execute([
            ':id'    => $data['id'],
            ':image' => $data['image'],
            ':type'  => "user"
        ]);
    }

    public function verifyUser($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
    
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ( $user && $password == $user['password'] ) {
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

    public function fetchUser($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}