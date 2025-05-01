<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/styles/adminRecipes-1.css">
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

                <div class="tab">
                    <div class="recipe"></div>
                    <p>RECIPES</p>
                </div>

                <div class="tab">
                    <div class="reviews"></div>
                    <p>REVIEWS</p>
                </div>

                <div class="tab">
                    <div class="logs"></div>
                    <p>LOGS</p>
                </div>

                <div class="tab">
                    <div class="users"></div>
                    <p>USERS</p>
                </div>

                <div class="tab">
                    <div class="export"></div>
                    <p>EXPORT</p>
                </div>

            </div>

        </section>

        <section class="contentSection">
            <nav class="contentTop">
                <div class="profileContainer">
                    <p>John Doe</p>
                    <div class="profile"></div>
                </div>
            </nav>

            <section class="contentBottom">
                <div class="controlContainer">

                    <div class="controlWrapper1">

                        <div class="searchBarContainer">
                            <input id="filterName" type="text" name="searchQueryInput" class="filterFieldInput" placeholder="Search recipe..." value="" />
                            <!-- <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" /></svg>
                            </button> -->
                        </div>

                        <div class="searchBarContainer" style="margin-left: 0;">
                            <input id="filterUser" type="text" name="searchQueryInput" class="filterFieldInput" placeholder="Search user..." value="" />
                            <!-- <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" /></svg>
                            </button> -->
                        </div>

                        <div class="filtersContainer">
                            <select name="" id="filterCategory" class="filterField">
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

                            <select name="" id="" class="filterField">
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

                <div class="dataSection">
                    <!-- data here -->
                </div>
            </section>

            <div class="modal">
                <div class="modal-overlay modal-toggle"></div>
                <div class="modal-wrapper modal-transition">
                    <div class="modal-header">
                        <button class="modal-close modal-toggle"><svg class="icon-close icon" viewBox="0 0 32 32"><use xlink:href="#icon-close"></use></svg></button>
                        <h2 class="modal-heading">Add a Recipe</h2>
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
                                <textarea id="" name="ingredients" placeholder="e.g., carrots - 2, eggs - 5, ..."></textarea>
                            </div>

                            <div class="fieldsContainer description">
                                <label for="">IMAGES</label>
                                <textarea id="" name="images" placeholder="e.g., https://i.imgur.com/RYbaxaF.jpeg, https://i.imgur.com/jzFOtOS.jpeg (seperate image url by a comma)"></textarea>
                            </div>

                            <div class="fieldsWrapper">
                                <div class="fieldsContainer description">
                                    <label for="">PREP TIME</label>
                                    <input type="text" name="prepTime" placeholder="e.g., 60 minutes">
                                </div>

                                <div class="fieldsContainer description">
                                    <label for="">COOKING TIME</label>
                                    <input type="text" name="cookingTime" placeholder="e.g., Delicious Spaghetti">
                                </div>
                            </div>

                            <div class="fieldsWrapper">
                                <div class="fieldsContainer description">
                                    <label for="">ADDITIONAL TIME</label>
                                    <input type="text" name="additionalTime" placeholder="e.g., Delicious Spaghetti">
                                </div>

                                <div class="fieldsContainer description">
                                    <label for="">BUDGET</label>
                                    <input type="text" name="budget" placeholder="e.g., Delicious Spaghetti">
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

        </div>   

    </main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../scripts/admin-1.js"></script>
</html>