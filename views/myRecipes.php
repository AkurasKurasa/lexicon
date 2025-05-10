<?php
session_start();
if (isset($_SESSION['loggedInUser'])) {
        header("Location: home.php");
        exit();
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="../assets/styles/myRecipes.css">
</head>
<body>

    <?php include '../components/Navbar.php'; ?>

    <h1 class="header">My Recipes</h1>
    <section class="recipesSection">
    <div class="dataSectionRecipe">
    </div>
    </section>

    <div class="modalRecipe">
                <div class="modal-overlay modal-toggle"></div>
                <div class="modal-wrapper modal-transition">
                    <div class="modal-header">
                        <button class="modal-close modal-toggle"><svg class="icon-close icon" viewBox="0 0 32 32"><use xlink:href="#icon-close"></use></svg></button>
                        <h2 class="modalRecipe-heading">Add a Recipe</h2>
                    </div>
                
                <div class="modal-body">
                    <div class="modal-content">
                        <form action="" id="userRecipeForm" class="recipeForm">

                            <input type="text" id="recipeId" name="id" hidden>

                            <div class="fieldsContainer recipe-name">
                                <label for="">RECIPE NAME</label>
                                <input type="text" id="recipeName" name="name" placeholder="e.g., Delicious Spaghetti">
                            </div>

                            <div class="fieldsContainer category">
                                <label for="">CATEGORY</label>
                                <select name="category" id="recipeCategory">
                                    <option value="chicken">Chicken</option>
                                    <option value="ramen">Ramen</option>
                                    <option value="salad">Salad</option>
                                    <option value="barbeque">Barbeque</option>
                                    <option value="pizza">Pizza</option>
                                    <option value="sandwiches">Sandwiches</option>
                                    <option value="asian">Asian</option>
                                    <option value="steak">Steak</option>
                                    <option value="soup">Soup</option>
                                    <option value="pasta">Pasta</option>
                                    <option value="healthy">Healthy</option>
                                    <option value="breakfast">Breakfast</option>
                                    <option value="seafood">Seafood</option>
                                </select>
                            </div>

                            <div class="fieldsContainer description">
                                <label for="">DESCRIPTION</label>
                                <textarea name="description" id="recipeDescription" placeholder="It is delicious."></textarea>
                            </div>

                            <div class="fieldsContainer description">
                                <label for="">INGREDIENTS</label>
                                <textarea name="ingredients" id="recipeIngredients"></textarea>
                                </div>

                            <div class="fieldsContainer description">
                                <label for="">PROCEDURE</label>
                                <textarea name="procedure" id="recipeProcedure"></textarea>
                            </div>


                            <div class="fieldsContainer description">
                                <label for="">IMAGE</label>
                                <textarea name="image" id="recipeImage" placeholder="e.g., https://i.imgur.com/RYbaxaF.jpeg, https://i.imgur.com/jzFOtOS.jpeg (seperate image url by a comma)"></textarea>
                            </div>

                            <div class="fieldsWrapper">
                                <div class="fieldsContainer description">
                                    <label for="">PREP TIME</label>
                                    <input type="text" name="prepTime" id="recipePrepTime" placeholder="e.g., 60 minutes">
                                </div>

                                <div class="fieldsContainer description">
                                    <label for="">COOKING TIME</label>
                                    <input type="text" name="cookingTime" id="recipeCookingTime" placeholder="e.g., Delicious Spaghetti">
                                </div>
                            </div>

                            <div class="fieldsWrapper">
                                <div class="fieldsContainer description">
                                    <label for="">ADDITIONAL TIME</label>
                                    <input type="text" name="additionalTime" id="recipeAdditionalTime" placeholder="e.g., Delicious Spaghetti">
                                </div>

                                <div class="fieldsContainer description">
                                    <label for="">BUDGET</label>
                                    <input type="text" name="budget" id="recipeBudget" placeholder="e.g., Delicious Spaghetti">
                                </div>
                            </div>

                            <div class="fieldsContainer buttons">
                                <button class="submit">Submit</button>
                                <button class="clear">Clear</button>
                            </div>
                            <ul class="error"></ul>

                        </form>
                    </div>
                </div>
            </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../assets/scripts/myRecipes.js"></script>
<script>

</script>
</html>