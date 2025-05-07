<?php
class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    //Inserts the registered information to the database
    public function create($data)
    {
        $sql = "INSERT INTO users (first_name, last_name, gender, email, password, role)
                VALUES (:first_name, :last_name, :gender, :email, :password, :role)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':first_name' => $data['first_name'],
            ':last_name'  => $data['last_name'],
            ':gender'     => $data['gender'],
            ':email'      => $data['email'],
            ':password'   => $data['password'],
            ':role'       => $data['role']
        ]);

    }

    //Checks if the account exists
    public function verifyUser($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
    
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // if ($user && password_verify($password, $user['password'])) {
        //     return $user;
        // }

        if ( $user && $password == $user['password'] ) {
            //Starts Session
            session_start();
            $_SESSION["loggedInUser"] = $user['id'];
            return $user;
        }
    
        return false;
    }

    //Checks if the emailExists
    public function emailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        $count = $stmt->fetchColumn();

        return $count > 0;
    }

    //Gets the information of the Player
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