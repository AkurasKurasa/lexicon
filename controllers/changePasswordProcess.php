<?php
session_start();
require_once '../config.php';        
require_once '../models/User.php';

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['loggedInUser'])) {
        $userId = $_SESSION['loggedInUser'];
        
        $currentPassword = $_POST['currentpassword'] ?? '';
        $newPassword = $_POST['newpassword'] ?? '';
        $errors = [];

        if (empty($currentPassword) || empty($newPassword)) {
            $errors[] = "Please fill in all fields.";
        }

        if (empty($errors)) {
            $user = new User($pdo);
            
            $result = $user->changePassword($userId, $currentPassword, $newPassword);

            if ($result['success']) {
                $response['success'] = true;
                $response['message'] = "Password successfully updated.";
            } else {
                $response['message'] = $result['message'] ?? "An error occurred.";
            }
        } else {
            $response['message'] = implode(", ", $errors);
        }
    } else {
        $response['message'] = 'User not authenticated.';
    }

    echo json_encode($response);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
