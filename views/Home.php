<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooked.</title>
    <link rel="stylesheet" href="../assets/styles/home.css">
</head>
<body>
<?php require_once(__DIR__.'../nav.php'); ?>
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

        <div class="otherRecipes">

            <div class="otherRecipe-wrapper" data-id="pizza">
                <div class="otherRecipe pizza"></div>
                <h3 class="otherRecipe-name">PIZZA</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="burger">
                <div class="otherRecipe pizza"></div>
                <h3 class="otherRecipe-name">BURGER</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="asian">
                <div class="otherRecipe pizza"></div>
                <h3 class="otherRecipe-name">ASIAN</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="sandwich">
                <div class="otherRecipe pizza"></div>
                <h3 class="otherRecipe-name">SANDWICHES</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="soup">
                <div class="otherRecipe pizza"></div>
                <h3 class="otherRecipe-name">SOUP</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="pasta">
                <div class="otherRecipe pizza"></div>
                <h3 class="otherRecipe-name">PASTA</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="healthy">
                <div class="otherRecipe pizza"></div>
                <h3 class="otherRecipe-name">HEALTHY</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="breakfast">
                <div class="otherRecipe pizza"></div>
                <h3 class="otherRecipe-name">BREAKFAST</h3>
            </div>

            <div class="otherRecipe-wrapper" data-id="seafood">
                <div class="otherRecipe pizza"></div>
                <h3 class="otherRecipe-name">SEAFOOD</h3>
            </div>

        </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../script.js"></script>
</html>