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
    <link rel="stylesheet" href="../assets/styles/recipes.css">
    <link rel="stylesheet" href="../assets/styles/user.css">
</head>
    <body>
    <?php include '../components/Navbar.php'; ?>
    <main>
        <div class="user-information">
        <img src="../assets/images/banner.jpg" class="cover-photo" alt="Cover Image">
            <div class="user-image-container">
                <img src="../assets/images/profile_pictures/11.jpg" class="user-image" id="userImage" alt="User Image">
            </div>
            <div class="user-details">
                <h2 id="user-name">John Doe</h2>
                <p id="occupation">Home Cook</p>
                <p id="user-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
            </div>
        </div>
            <h1 class="header">Explore John Doe's Recipes</h1>
        <div class="user-recipes">
            <section class="recipesSection">

            </section>
        </div>
    </main>
    <script src="../assets/scripts/user.js"></script>
    </body>
</html>
