<?php 
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <link rel="stylesheet" href="../assets/styles/recipes.css"> -->
    <link rel="stylesheet" href="../assets/styles/user.css">
</head>
    <body>
    <?php include '../components/Navbar.php'; ?>
    <main>
        <div class="user-information">
        <img src="../assets/images/banner.jpg" class="cover-photo" alt="Cover Image">
            <div class="user-image-container">
                <img src="" class="user-image" id="userImage" alt="User Image">
            </div>
            <div class="user-details">
                <h2 id="user-name"></h2>
                <p id="occupation"></p>
                <p id="user-description"></p>
            </div>
        </div>
            <h1 class="header"></h1>
        <div class="user-recipes">
            <section class="recipesSection">

            </section>
        </div>
    </main>
    <script src="../assets/scripts/user.js"></script>
    </body>
</html>
