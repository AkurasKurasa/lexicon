<?php
//Starts Session
session_start();


include_once("../config.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['starsGiven']) && isset($_POST['userComment'])) {
        $starsGiven = $_POST['starsGiven'];
        $userComment = $_POST['userComment'];
        $response = ["stars" => $starsGiven,"comment" => $userComment];
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