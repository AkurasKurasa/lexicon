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
    <title>Cooked.</title>
    <link rel="stylesheet" href="../assets/styles/home.css">
    <link rel="stylesheet" href="../assets/styles/adminRecipes-1.css">

</head>
<body>
    <?php include '../components/Navbar.php'; ?>
        <div class="featuredRecipes">
            <div class="featuredRecipe chicken" data-id="chicken">
                <h1 class="featuredRecipe-name">CHICKEN</h1>
            </div>

            <div class="featuredRecipe ramen" data-id="ramen">
                <h1 class="featuredRecipe-name">RAMEN</h1>
            </div>

            <div class="featuredRecipe salad" data-id="salad">
                <h1 class="featuredRecipe-name">SALAD</h1>
            </div>

            <div class="featuredRecipe barbeque" data-id="barbeque">
                <h1 class="featuredRecipe-name">BARBEQUE</h1>
            </div>
        </div>
        <!-- <form method="GET" action="../views/userRecipe.php">
            <div class="controlWrapper2" style="width: 100%; display: flex; justify-content: center;">
                <button type="submit" class="addBtn" id="recipeButton" style="width: 1200px; display: block; margin: auto; margin-top: -15px; position: relative; background-color: #e9b251; height: 60px; font-size: 18px; font-weight: bold; color: white; border: none; border-radius: 8px; cursor: pointer; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">Add Recipe</button>
            </div>
        </form> -->
            <br><br>
        <div class="otherRecipes">

            <div class="otherRecipe-wrapper" data-id="pizza">
                <div class="otherRecipe pizza"></div>
                <h3 class="otherRecipe-name">PIZZA</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="sandwich">
                <div class="otherRecipe sandwich"></div>
                <h3 class="otherRecipe-name">SANDWICHES</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="asian">
                <div class="otherRecipe asian"></div>
                <h3 class="otherRecipe-name">ASIAN</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="steak">
                <div class="otherRecipe steak"></div>
                <h3 class="otherRecipe-name">STEAK</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="soup">
                <div class="otherRecipe soup"></div>
                <h3 class="otherRecipe-name">SOUP</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="pasta">
                <div class="otherRecipe pasta"></div>
                <h3 class="otherRecipe-name">PASTA</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="healthy">
                <div class="otherRecipe healthy"></div>
                <h3 class="otherRecipe-name">HEALTHY</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="breakfast">
                <div class="otherRecipe breakfast"></div>
                <h3 class="otherRecipe-name">BREAKFAST</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="seafood">
                <div class="otherRecipe seafood"></div>
                <h3 class="otherRecipe-name">SEAFOOD</h3>
            </div>

        </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../script.js"></script>
<script src="../auth.js"></script>
</html>