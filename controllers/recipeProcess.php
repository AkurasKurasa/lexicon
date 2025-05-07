<?php
session_start();

include_once("../config.php");
require_once '../models/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['starsGiven'], $_POST['userComment'], $_POST['product_id']) && isset($_SESSION['loggedInUser'])) {    
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
        //Echoes the inputted comment immediately
        $sql = "SELECT first_name, last_name, profile_picture_url FROM users
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $author]);

        $userCommented = $stmt->fetch(PDO::FETCH_ASSOC);
        $profile_picture_url = $userCommented["profile_picture_url"] ?? "../assets/images/img_avatar.png";
        $response = [
            'first_name' => $userCommented["first_name"],
            'last_name' => $userCommented["last_name"],
            'profile_picture_url' => $profile_picture_url,
            'comment' => $userComment,
            'rating' => $starsGiven,
            'created_at' => $currentTimestamp
        ];
            $response["success"] = "Comment Submitted Successfully!";
        } else {
            // Error handling
            $response["error"] = "Comment error!";
        }
        echo json_encode($response);
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT users.id, users.first_name, users.last_name, users.profile_picture_url, product_review_comments.comment, product_review_comments.rating, product_review_comments.created_at 
            FROM product_review_comments
            INNER JOIN users ON product_review_comments.authored_by = users.id 
            WHERE product_review_comments.product_id = :product_id 
            ORDER BY product_review_comments.created_at ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':product_id' => $_GET['product_id']]);
    $usersCommented = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response["usersCommented"] = $usersCommented;
    $response["loggedInUser"] = $_SESSION["loggedInUser"] ?? null;

    $alreadyCommented = false;

    if (isset($_SESSION['loggedInUser'])) {
        $user = new User($pdo);
        $userInfo = $user->getUserInfo($_SESSION["loggedInUser"]);
        $profile_url = $userInfo['profile_picture_url'] ?? "../assets/images/img_avatar.png";
        $response["profile_picture_url"] = $profile_url;


        $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM product_review_comments WHERE product_id = :product_id AND authored_by = :user_id");
        $checkStmt->execute([':product_id' => $_GET['product_id'], ':user_id' => $_SESSION['loggedInUser']]);
        $alreadyCommented = $checkStmt->fetchColumn() > 0;
        
        $response["checkLoggedIn"] = true;
    } else {
        $response["checkLoggedIn"] = false;
    }

    $response["alreadyCommented"] = $alreadyCommented;
    echo json_encode($response);
}

?>