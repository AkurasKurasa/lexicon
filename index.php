<?php
session_start();
if (isset($_SESSION['loggedInUser'])) {
        header("Location: ./views/Home.php");
        exit();
} else {
    header("Location: ./views/Login.php");
}
?>  