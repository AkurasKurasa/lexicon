<?php
session_start();
require_once '../config.php';

header('Content-Type: application/json');

$response = ['hasSecurity' => false];

if (isset($_SESSION['loggedInUser'])) {
    $userId = $_SESSION['loggedInUser']; 

    $sql = "SELECT COUNT(*) FROM security_questions WHERE user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_STR);
    $stmt->execute();

    $count = (int) $stmt->fetchColumn();

    if ($count > 0) {
        $response['hasSecurity'] = true;
    }
}

echo json_encode($response);
