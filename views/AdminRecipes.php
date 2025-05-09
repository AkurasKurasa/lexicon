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
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/styles/adminRecipes.css">
    <link rel="stylesheet" href="../assets/styles/helper.css">
</head>
<body>
    <main>
        <section class="navigationSection">

            <div class="logo">
                <h1 class="">Cooked.</h1>
                <h2 class="">ADMIN PANEL</h2>
            </div>

            <div class="tabs">

                <h3 class="">GENERAL</h3>

                <div class="tab dash">
                    <div class="dashboard"></div>
                    <p>DASHBOARD</p>
                </div>

                <div class="tab recipes">
                    <div class="recipe"></div>
                    <p>RECIPES</p>
                </div>

                <div class="tab review">
                    <div class="reviews"></div>
                    <p>REVIEWS</p>
                </div>

                <div class="tab log">
                    <div class="logs"></div>
                    <p>LOGS</p>
                </div>

                <div class="tab user">
                    <div class="users"></div>
                    <p>USERS</p>
                </div>

                <div class="tab exports">
                    <div class="export"></div>
                    <p>EXPORT</p>
                </div>

            </div>

        </section>


        <section class="contentSection">
            <nav class="contentTop">
                <div class="profileContainer">
                    <p>
                        <?php echo $_SESSION['first_name'] ?>
                    </p>
                    <div class="profile"></div>
                </div>
            </nav>

            <section class="contentBottom">
                <div class="controlContainer">

                    <div class="controlWrapper1">

                        <div class="searchBarContainer">
                            <input id="filterName" type="text" name="searchQueryInput" class="filterRecipeFieldInput" placeholder="Search recipe..." value="" />
                        </div>

                        <div class="searchBarContainer" style="margin-left: 0;">
                            <input id="filterUser" type="text" name="searchQueryInput" class="filterRecipeFieldInput" placeholder="Search user..." value="" />
                        </div>

                        <div class="filtersContainer">
                            <select name="" id="filterCategory" class="filterRecipeField">
                                <option value="" selected>Select a category...</option>
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

                            <select name="" id="" class="filterRecipeField">
                                <option value="" selected>Choose rating...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                    </div>

                    <div class="controlWrapper2">
                        <button class="addBtn" id="recipeButton">Add Recipe</button>
                    </div>
 
                </div>

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
                        <form action="" id="adminRecipeForm" class="recipeForm">

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
                                <textarea name="ingredients" id="recipeIngredients" placeholder="e.g., carrots - 2, eggs - 5, ..."></textarea>
                            </div>

                            <div class="fieldsContainer description">
                                <label for="">PROCEDURE</label>
                                <textarea name="procedure" id="recipeProcedure" placeholder="e.g., carrots - 2, eggs - 5, ..."></textarea>
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

                        </form>
                    </div>
                </div>
            </div>

        </section>   

    </main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../scripts/adminRecipes.js"></script>
<script src="../scripts/admin.js"></script>
</html>