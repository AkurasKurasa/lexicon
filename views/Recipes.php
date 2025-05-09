<?php
// Start the session
session_start();

if (empty($_SESSION['id'])) {
    header("Location: Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="../assets/styles/recipes.css">
</head>
<body>

    <?php include '../components/Navbar.php'; ?>

    <h1 class="header">Explore Food Recipes</h1>

    <section class="recipesSection">

    </section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../script.js"></script>
</html>