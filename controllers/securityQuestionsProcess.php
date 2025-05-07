<?php
session_start();
include_once("../config.php");

$response = ['success' => false];

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_SESSION['loggedInUser'])) {
        $userId = $_SESSION['loggedInUser'];

        try {
            $sql = "SELECT pet_name, school_name, childhood_nickname, favorite_cartoon, street_name, favorite_sweet
                    FROM security_questions WHERE user_id = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':user_id' => $userId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $response = $result;
                $response['success'] = true;
            } else {
                $response['message'] = 'No security questions found.';
            }
        } catch (PDOException $e) {
            $response['message'] = 'Error: ' . $e->getMessage();
        }
    } else {
        $response['message'] = 'User not authenticated.';
    }

    echo json_encode($response);
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['loggedInUser'])) {
        $userId = $_SESSION['loggedInUser'];

        $pet = $_POST['petname'] ?? '';
        $school = $_POST['schoolname'] ?? '';
        $nickname = $_POST['nickname'] ?? '';
        $cartoon = $_POST['cartoon'] ?? '';
        $street = $_POST['streetname'] ?? '';
        $sweet = $_POST['favoritesweet'] ?? '';

        try {
            $sql = "INSERT INTO security_questions 
                    (user_id, pet_name, school_name, childhood_nickname, favorite_cartoon, street_name, favorite_sweet)
                    VALUES (:user_id, :pet, :school, :nickname, :cartoon, :street, :sweet)
                    ON DUPLICATE KEY UPDATE 
                        pet_name = VALUES(pet_name),
                        school_name = VALUES(school_name),
                        childhood_nickname = VALUES(childhood_nickname),
                        favorite_cartoon = VALUES(favorite_cartoon),
                        street_name = VALUES(street_name),
                        favorite_sweet = VALUES(favorite_sweet)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':user_id' => $userId,
                ':pet' => $pet,
                ':school' => $school,
                ':nickname' => $nickname,
                ':cartoon' => $cartoon,
                ':street' => $street,
                ':sweet' => $sweet
            ]);

            $response['success'] = true;
        } catch (PDOException $e) {
            $response['message'] = 'Error: ' . $e->getMessage();
        }
    } else {
        $response['message'] = 'User not authenticated.';
    }

    echo json_encode($response);
}
?>
