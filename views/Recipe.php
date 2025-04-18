<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles/recipe.css">
</head>
<body>
    <main>
        <!-- Section for the header -->
        <section class="headerSection">
        <div class="recipeHeader">
            <h1 class="recipeName">Aunt Jemima's Beloved Fried Chicken</h1>
            <div class="recipeRating">
                <span class="star"></span>
                <span class="star"></span>
                <span class="star"></span>
                <span class="star"></span>
                <span class="star"></span>
                <p style="display: inline-block;"> <span id="numOfReviews">0</span> reviews / <span id="AveStars">0</span> average
            </div>
            <p class="recipeDescription">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non commodi nemo quidem, cumque omnis sit optio aspernatur esse placeat odit praesentium dolorem quo accusamus, provident ad! Ex ullam nemo nihil!
            </p>
            <button class="jumpToRecipe">&#129059; JUMP TO RECIPE</button>
            <div class="recipeImage"></div>
            </div>
            <!-- 
            <div class="recipeList">
                <h1>INGREDIENTS FOR THIS RECIPE</h1>

                <h2>INGREDIENT #1</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores ratione iste consequatur, cupiditate consequuntur animi aliquam fuga ipsum id repudiandae, deleniti eaque facilis debitis molestiae voluptatem vero suscipit quaerat laboriosam.</p>
            
                <h2>INGREDIENT #2</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores ratione iste consequatur, cupiditate consequuntur animi aliquam fuga ipsum id repudiandae, deleniti eaque facilis debitis molestiae voluptatem vero suscipit quaerat laboriosam.</p>

                <h2>INGREDIENT #2</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores ratione iste consequatur, cupiditate consequuntur animi aliquam fuga ipsum id repudiandae, deleniti eaque facilis debitis molestiae voluptatem vero suscipit quaerat laboriosam.</p>
            </div>

            <div class="recipeImage"></div>

            <form action="" id="reviewForm">
                <h1>Leave A Review</h1>

                <div class="fieldContainer">
                    <label for="">Subject *</label>
                    <input type="text" name="" id="">
                </div>

                <div class="fieldContainer">
                    <label for="">Review *</label>
                    <textarea name="" id=""></textarea>
                </div>

            </form>
        -->
            
        <div class="authorProfile">
        <div class="authorCard">    
            <h2 >Aunt Jemima</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non commodi nemo quidem, cumque omnis sit optio aspernatur esse placeat odit praesentium dolorem quo accusamus, provident ad! Ex ullam nemo nihil!</p>
            <img class="authorPicture stack-top" src="../assets/images/img_avatar.png" alt="Avatar">

        </div>

        </div>
        </div>
        </section>

    <!-- Section for the body (The main content of the page) -->
    <section class="mainSection"> 
    <div class="sectionCard">
        <div class="prepTimeContainer">
        <div class="colorFill"></div>
        <div class="timeHeader">
            <span>Prep Time</span>
            <span>Cook Time</span>
            <span>Additional Time</span>
        </div>
        <div class="timeValues">
            <span>20 minutes</span>
            <span>35 minutes</span>
            <span>1 hour 20 minutes</span>
        </div><br>
        <div class="timeHeader">
            <span>Total Time</span>
            <span>Servings</span>
        </div>
        <div class="timeValues">
            <span>2 hours 15 minutes</span>
            <span>8</span>
        </div>
        <hr style="margin: 30px 25px 30px 25px">
        <div class="timeHeader">
            <span>Estimated Budget: </span>
        </div>

        <div class="timeValues">
            <span>&#8369;0.00</span>
        </div><br>
        </div>
    </div>
    <!--Card for the Ingredients -->
    <div class="ingredientsCard">
        <div class="cardContainer">
        <p style="font-weight:bold;font-size:20px;">Ingredients for this recipe</p>
        <div class="ingredient">
            <p class="IngredName">Brown Sugar</p>
            <p class="IngredDesc">The perfect little bit of sweetness. The brown sugar helps offset the spiciness and makes everything, just deliciously rich.</p>
        </div>
        <div class="ingredient">
            <p class="IngredName">Brown Sugar</p>
            <p class="IngredDesc">The perfect little bit of sweetness. The brown sugar helps offset the spiciness and makes everything, just deliciously rich.</p>
        </div>
        <div class="ingredient">
            <p class="IngredName">Brown Sugar</p>
            <p class="IngredDesc">The perfect little bit of sweetness. The brown sugar helps offset the spiciness and makes everything, just deliciously rich.</p>
        </div>
        </div>
    </div>

    <!--Card for the cooking instructions -->
    <div class="instructionsCard">
        <div class="cardContainer">
            <p style="font-weight:bold;font-size:20px;">Instructions</p>
            <p><span class="stepNo">1</span><span class="stepDetails">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
            <p><span class="stepNo">2</span><span class="stepDetails">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
            <p><span class="stepNo">3</span><span class="stepDetails">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
        </div>
    </div>
</section>

<!--Comments Section -->
<section class="commentSection">
    <div class="">
        <div class="row height">
            <div class="">
                <div class="card">
                    <div class="p-3">
                        <h6>Comments <span id="noOfComments">0</span></h6>
                    </div>
                    <!--Comment Input -->
                    <form method=POST id="commentForm">
                        <div class="mt-3 d-flex flex-row align-items-center" style="height: 30vh;"> 
                            <img src="../assets/images/img_avatar.png" width="50" class="rounded-circle me-3">             
                            <div class="d-flex flex-column" style="width:100%;">
                                <div id="rateRecipe">
                                <input name="starsGiven" id="starsGiven" value="" hidden>
                                <p style="display: inline-block;margin:0;"> <span id="userStar">0</span> / 5 stars </p>
                                <span class="star userRating" id="ratingOne"></span>
                                <span class="star userRating" id="ratingTwo"></span>
                                <span class="star userRating" id="ratingThree"></span>
                                <span class="star userRating" id="ratingFour"></span>
                                <span class="star userRating" id="ratingFive"></span>
                                </div>
                                <div class="d-flex gap-3">
                                <textarea class="form-control" id="userComment" placeholder="Enter your comment..." rows="1" style="resize: none;"></textarea>
                                </div>
                                <div class="d-flex justify-content-end gap-3 mt-2" style="width:100%;">
                                <button type="reset" class="commentButton" id="cancelComment">Cancel</button>
                                <button type="submit" class="commentButton" id="submitComment" disabled>Comment</button>
                                </div>      
                            </div>
                        </div>
                    </form>
                    <!--Comment of other People -->
                    <div class="mt-2">
                        <!--Individual Comments-->
                        <hr>
                        <div class="d-flex flex-row p-3"> <img src="../assets/images/img_avatar.png" width="40" height="40" class="rounded-circle me-3">
                            <div class="w-100">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row align-items-center"> <span id="loggedInUsername"class="me-2">Username</span> 
                                    <div class="otherUserRatingContainer">
                                        <span class="star otherUserRating"></span>
                                        <span class="star otherUserRating"></span>
                                        <span class="star otherUserRating"></span>
                                        <span class="star otherUserRating"></span>
                                        <span class="star otherUserRating"></span>  
                                    </div>
                                    </div> 
                                    <small>12h ago</small>
                                </div>
                                <p class="text-justify comment-text mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex flex-row p-3"> <img src="../assets/images/img_avatar.png" width="40" height="40" class="rounded-circle me-3">
                            <div class="w-100">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row align-items-center"> <span id="loggedInUsername"class="me-2">Username</span> 
                                    <div class="otherUserRatingContainer">
                                        <span class="star otherUserRating"></span>
                                        <span class="star otherUserRating"></span>
                                        <span class="star otherUserRating"></span>
                                        <span class="star otherUserRating"></span>
                                        <span class="star otherUserRating"></span>  
                                    </div>
                                    </div> 
                                    <small>12h ago</small>
                                </div>
                                <p class="text-justify comment-text mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    </main>
<script src="../assets/scripts/recipeScript.js"></script>
</body>
</html>