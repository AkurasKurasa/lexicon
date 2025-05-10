<?php
session_start();
$userID = $_SESSION["id"];
require_once '../config.php';
require_once '../models/User.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $user = new User($pdo);
    $userInfo = $user->fetchUser($userID);
    echo json_encode($userInfo);
} 

else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName   = $_POST['first-name'] ?? '';
    $lastName    = $_POST['last-name'] ?? '';
    $email       = $_POST['email-address'] ?? '';
    $occupation  = $_POST['occupation'] ?? 'NULL';
    $gender      = $_POST['gender'] ?? '';
    $birthday    = $_POST['birthday'] ?? null;
    $description = $_POST['description'] ?? '';
    $profilePicturePath = null; 
    $uploadNewImage = false;

    if (isset($_FILES['imagefile']) && $_FILES['imagefile']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['imagefile']['tmp_name'];
        $fileName = $_FILES['imagefile']['name'];
        $fileSize = $_FILES['imagefile']['size'];
        $fileType = $_FILES['imagefile']['type'];

        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

        if (!in_array($fileType, $allowedTypes)) {
            die("Invalid file type.");
        }

        if ($fileSize > 1 * 1024 * 1024) {
            die("Image file is too large (max 1MB).");
        }

        $uploadDir = '../assets/images/profile_pictures';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $newFileName = $userID . '.' . $fileExtension; 
        $destPath = $uploadDir . '/' . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $profilePicturePath = $destPath; 
            $uploadNewImage = true;

            $stmtOld = $pdo->prepare("SELECT image FROM images WHERE related_user = :id");
            $stmtOld->execute([':id' => $userID]);
            $old = $stmtOld->fetch(PDO::FETCH_ASSOC);
            if ($old && $old['image'] && file_exists($old['image']) && realpath($old['image']) !== realpath($destPath)) {
                unlink($old['image']);
            }

            $stmtCheck = $pdo->prepare("SELECT 1 FROM images WHERE related_user = :id");
            $stmtCheck->execute([':id' => $userID]);
            $hasImage = $stmtCheck->fetchColumn();

            if ($hasImage) {
                $stmtNew = $pdo->prepare("UPDATE images SET image = :image WHERE related_user = :id");
                $stmtNew->execute([':image' => $profilePicturePath, ':id' => $userID]);
            } else {
                $stmtInsert = $pdo->prepare("INSERT INTO images (image, related_user) VALUES (:image, :id)");
                $stmtInsert->execute([':image' => $profilePicturePath, ':id' => $userID]);
            }
        }
    }

    $sql = "UPDATE users SET 
                first_name = :firstName,
                last_name = :lastName,
                email = :email,
                occupation = :occupation,
                gender = :gender,
                birthday = :birthday,
                description = :description 
            WHERE id = :userId";

    $params = [
        ':firstName' => $firstName,
        ':lastName'  => $lastName,
        ':email'     => $email,
        ':occupation' => $occupation,
        ':gender'    => $gender,
        ':birthday'  => $birthday,
        ':description' => $description,
        ':userId'    => $userID
    ];

    try {
        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute($params);
        echo json_encode([
            'success' => $success,
            'imagePath' => $profilePicturePath
        ]);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error updating profile: ' . $e->getMessage()]);
    }
}

?>
