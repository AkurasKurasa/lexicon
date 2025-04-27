<?php
session_start();

include_once("../config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = []; 
    if (isset($_POST['starsGiven']) && isset($_POST['userComment'])) {
        $starsGiven = filter_var($_POST['starsGiven'], FILTER_SANITIZE_NUMBER_INT);
        $userComment = filter_var($_POST['userComment'], FILTER_SANITIZE_STRING);
        $product_id = $_POST['product_id'];
        $author = $_SESSION['loggedInUser'];
        $currentTimestamp = date('Y-m-d H:i:s');

        $sql = "INSERT INTO product_review_comments (comment, rating, product_id, authored_by, created_at)
                VALUES (:comment, :rating, :product_id, :authored_by, :created_at)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([
            ':comment' => $userComment,
            ':rating' => $starsGiven,
            ':product_id' => $product_id,
            ':authored_by' => $author,
            ':created_at' => $currentTimestamp
        ])) {
            // Success
            $response["success"] = "Comment Submitted Successfully!";
        } else {
            // Error handling
            $response["error"] = "Comment error!";
        }
        echo json_encode($response);
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_SESSION['loggedInUser'])) {
        $checkLoggedIn = TRUE;
    } else {
        $checkLoggedIn = FALSE;
    }
    $response = ["checkLoggedIn" => $checkLoggedIn];
    echo json_encode($response);
    }
?>