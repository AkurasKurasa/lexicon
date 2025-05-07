<?php
session_start();
$userID = $_SESSION["loggedInUser"];
require_once '../config.php';
require_once '../models/User.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $user = new User($pdo);
    $userInfo = $user->getUserInfo($userID);
    echo json_encode($userInfo);
} 

else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName   = $_POST['first-name'] ?? '';
    $lastName    = $_POST['last-name'] ?? '';
    $email       = $_POST['email-address'] ?? '';
    $occupation = $_POST['occupation'] ?? 'NULL';
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
        
        // Validate file type
        if (!in_array($fileType, $allowedTypes)) {
            die("Invalid file type.");
        }

        // Validate file size (max 1MB)
        if ($fileSize > 1 * 1024 * 1024) {
            die("Image file is too large (max 1MB).");
        }

        $uploadDir = '../assets/images/profile_pictures'; // Directory for uploads
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
        }

        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $newFileName = $userID . '.' . $fileExtension; 
        $destPath = $uploadDir . '/' . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $profilePicturePath = $destPath; 

            $stmtOld = $pdo->prepare("SELECT profile_picture_url FROM users WHERE id = :id");
            $stmtOld->execute([':id' => $userID]);
            $old = $stmtOld->fetch(PDO::FETCH_ASSOC);
            if ($old && $old['profile_picture_url'] && 
                file_exists($old['profile_picture_url']) &&
                realpath($old['profile_picture_url']) !== realpath($destPath)) {
                unlink($old['profile_picture_url']);
            }
        }

    }

    // Prepare the SQL query to update user information
    $sql = "UPDATE users SET 
                first_name = :firstName,
                last_name = :lastName,
                email = :email,
                occupation = :occupation,
                gender = :gender,
                birthday = :birthday,
                description = :description";

    // Parameters for SQL query
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

    // If a new image is uploaded, add it to the query
    if ($uploadNewImage) {
        $sql .= ", profile_picture_url = :profilePicture";
        $params[':profilePicture'] = $profilePicturePath; // Path or URL of the uploaded image
    }

    // Complete the query
    $sql .= " WHERE id = :userId";

    // Execute the query
    try {
        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute($params);
        echo json_encode(['success' => $success]);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error updating profile: ' . $e->getMessage()]);
    }
}

?>
