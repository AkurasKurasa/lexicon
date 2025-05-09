<?php
session_start();

include_once("../config.php");
include_once '../models/User.php';
include_once '../models/Recipe.php';


// Function for Commenting and Rating
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['starsGiven'], $_POST['userComment'], $_POST['product_id']) && isset($_SESSION['id'])) {    
        $starsGiven = filter_var($_POST['starsGiven'], FILTER_SANITIZE_NUMBER_INT);
        $userComment = filter_var($_POST['userComment'], FILTER_SANITIZE_STRING);
        $product_id = $_POST['product_id']; 
        $author = $_SESSION['id'];
        $currentTimestamp = date('Y-m-d H:i:s');

        $sql = "INSERT INTO product_review_comments (comment, product_id, authored_by, created_at)
                VALUES (:comment, :product_id, :authored_by, :created_at)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([
            ':comment' => $userComment,
            ':product_id' => $product_id,
            ':authored_by' => $author,
            ':created_at' => $currentTimestamp
        ]))
        $commentId = $pdo->lastInsertId();

        
        $sql = "INSERT INTO product_votes (comment_id, rating)
                VALUES (:comment_id, :rating)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([
            ':comment_id' => $commentId,
            ':rating' => $starsGiven
        ]))

        {
        //Echoes the inputted comment immediately
        $sql = "SELECT first_name, last_name, images.image FROM users
                INNER JOIN images ON users.id = images.related_user
                WHERE users.id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $author]);

        $userCommented = $stmt->fetch(PDO::FETCH_ASSOC);
        $profile_picture_url = $userCommented["image"] ?? "../assets/images/img_avatar.png";
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
    }

// Function for Loading from database
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {

    // lOADS ALL COMMENTS
    $sql = "SELECT product_review_comments.id as comment_id,users.id AS user_id, users.first_name, users.last_name, images.image, product_review_comments.comment, product_votes.rating, product_review_comments.created_at 
            FROM product_review_comments
            INNER JOIN users ON product_review_comments.authored_by = users.id
            INNER JOIN images ON product_review_comments.authored_by = images.related_user
            INNER JOIN product_votes ON product_review_comments.id = product_votes.comment_id
            WHERE product_review_comments.product_id = :product_id 
            ORDER BY product_review_comments.created_at ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':product_id' => $_GET['product_id']]);
    $usersCommented = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response["usersCommented"] = $usersCommented;
    $response["id"] = $_SESSION["id"] ?? null;

    //CHECKS IF LOGGED IN AND IF THE USER HAS COMMENTED 
    $alreadyCommented = false;
    if (isset($_SESSION['id'])) {
        $user = new User($pdo);
        $userInfo = $user->fetchUser($_SESSION["id"]);
        $profile_url = $userInfo['image'] ?? "../assets/images/img_avatar.png";
        $response["profile_picture_url"] = $profile_url;
        $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM product_review_comments WHERE product_id = :product_id AND authored_by = :user_id");
        $checkStmt->execute([':product_id' => $_GET['product_id'], ':user_id' => $_SESSION['id']]);
        $alreadyCommented = $checkStmt->fetchColumn() > 0;
        
        $response["checkLoggedIn"] = true;
    } else {
        $response["checkLoggedIn"] = false;
    }
    $response["alreadyCommented"] = $alreadyCommented;

    //RETRIEVES ALL RECIPE INFO
    $recipe = new Recipe($pdo);
    $recipeInfo = $recipe->fetchAllRecipeDetails($_GET['product_id']);
    $response["recipeInfo"] = $recipeInfo[0];
}
echo json_encode($response);
?>