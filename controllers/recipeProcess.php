<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['starsGiven']) && isset($_POST['userComment'])) {
        $starsGiven = $_POST['starsGiven'];
        $userComment = $_POST['userComment'];
        $response = ["stars" => $starsGiven,"comment" => $userComment];
        echo json_encode($response);
    }
}

?>