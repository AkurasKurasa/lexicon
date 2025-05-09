<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/styles/recipe.css">
</head>
<body>
<?php   session_start();
        include '../components/Navbar.php'; 
      ?>

<main>
<div class="mainContent">
<div class="recipeContainer">
    <section class="headerSection">

    <main>
        <!-- Section for the header -->
        <section class="headerSection">
        <div class="recipeHeader">
            <h1 class="recipeName">Aunt Jemima's Beloved Fried Chicken</h1>
            <span></span>
            <div class="recipeRating">
                <span class="starRecipe"></span>
                <span class="starRecipe"></span>
                <span class="starRecipe"></span>
                <span class="starRecipe"></span>
                <span class="starRecipe"></span>
                <p style="display: inline-block;"> <span id="NumOfReviews">0</span> reviews / <span id="AveStars">0</span> average
                <hr style="margin: 20px 15px 20px 15px">
            </div>


            <div class ="userLink">
                <span class="userIcon"></span>
                <span>Submitted by: </span>
            <a href="#">
                <span class="userSubmit" id="userSubmit">Aunt Jemima</span>
            </a>
            </div>

            <p class="recipeDescription">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non commodi nemo quidem, cumque omnis sit optio aspernatur esse placeat odit praesentium dolorem quo accusamus, provident ad! Ex ullam nemo nihil!
            </p>
            <button class="jumpToRecipe">&#129059; JUMP TO RECIPE</button>
            <div class="recipeImage"></div>
        </div>
    </section>

    <div class="verticalLine"></div>
    <div class="prepTimeContainer">
      <div class="prepTimeContents">
        <div class="prepTimeTitle">Ready In:</div>
        <hr style="margin: 30px 0px 30px 0px">
        <div class="timeHeader">
            <span>Prep Time:</span>
        </div>
        <div class="timeValues">
            <span class="preptime">20 minutes</span>
        </div>
        <br>

        <div class="timeHeader">
            <span>Cook Time:</span>
        </div>
        <div class="timeValues">
            <span class="cooktime">35 minutes</span>
        </div><br>

        <div class="timeHeader">
            <span>Additional Time:</span>
        </div>
        <div class="timeValues">
            <span class="additionaltime">1 hour 20 minutes</span>
        </div><br>
        <hr style="margin: 30px 0px 30px 0px">

        <div class="timeHeader">
                    <div class="prepTimeTitle">   
                      <span>Servings:</span> 
                    </div>
        </div>
        <div class="timeValues">
            <span class="servings">8</span>
        </div>

        <hr style="margin: 30px 0px 30px 0px">

        <div class="timeHeader">
            <span>Estimated Budget: </span>
        </div>

        <div class="timeValues">
            <span class="budget">&#8369;00.00</span>
        </div><br>
    </div>
  </div>
</div>

</div>
<div class="recipeListv2">

<div class="directions">
  <div class="listTitle">Directions</div>

  <hr style="margin: 30px 0px 30px 0px">

  <p>1. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque reprehenderit a, nulla 
    consequuntur autem totam voluptate facere natus dolorem atque magni aliquam asperiores in distinctio deleniti 
    ducimus necessitatibus tempora error?
  </p>
  <p>2. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque reprehenderit a, nulla 
    consequuntur autem totam voluptate facere natus dolorem atque magni aliquam asperiores in distinctio deleniti 
    ducimus necessitatibus tempora error?
  </p>
  <p>3. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque reprehenderit a, nulla 
    consequuntur autem totam voluptate facere natus dolorem atque magni aliquam asperiores in distinctio deleniti 
    ducimus necessitatibus tempora error?
  </p>
  <p>4. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque reprehenderit a, nulla 
    consequuntur autem totam voluptate facere natus dolorem atque magni aliquam asperiores in distinctio deleniti 
    ducimus necessitatibus tempora error?
  </p>
</div>

<div class="ingredients">
  <div class="listTitle">Ingredients</div>

  <hr style="margin: 30px 0px 30px 0px">
  <p>1 kilogram Chicken pieces</p>
  <p>2 ½ cups All-Purpose Flour</p>
  <p>2 teaspoons Salt</p>
  <p>1 teaspoon Black Pepper</p>
  <p>1 teaspoon Garlic Powder</p>
  <p>1 teaspoon Onion Powder</p>
  <p>1 teaspoon Paprika sweet or smoked</p>
  <p>½ teaspoon Cayenne Pepper optional for heat</p>
  <p>Cooking Oil for frying vegetable oil cooking oil - enough to submerge the chicken about 3-4 inches deep in your kawali or pan</p>
</div>

</div>

<!-- THIS IS THE COMMENTS SECTION -->
<section class="comment-section">
    <div class="repTitle">Questions and Replies:</div>
    <hr style="margin: 30px 0px 30px 0px">
    <div id="input-container">
     <form method=POST id="commentForm">
        <div class="input-comment">
            <div class="img-container" style="width:4rem;height:4rem;">
                <img src="../assets/images/img_avatar.png" class="img userImage">
            </div> 
            <div class="input-comment-details">
                <div id="rateRecipe">
                    <input name="starsGiven" id="starsGiven" value="" hidden>
                    <input name="product_id" id="product_id" value="<?php echo $_GET['id']; ?>" hidden>
                    <p style="display: inline-block;margin:0;"> <span id="userStar">0</span> / 5 stars </p>
                    <span class="star userRating" id="ratingOne">&#9734;</span>
                    <span class="star userRating" id="ratingTwo">&#9734;</span>
                    <span class="star userRating" id="ratingThree">&#9734;</span>
                    <span class="star userRating" id="ratingFour">&#9734;</span>
                    <span class="star userRating" id="ratingFive">&#9734;</span>
                </div>
                <textarea name="userComment" id="userComment" placeholder="Enter your comment..."></textarea>
                <li class="error"></li>
                <div style="display:flex; margin-left:auto;">
                    <button type="reset" class="commentButton" id="cancelComment">Cancel</button>
                    <button type="submit" class="commentButton" id="submitComment" disabled>Comment</button>
                </div>
            </div>                
        </div>
    </form> 
</div>

    <div class="comments-container">
    <hr>
        <div class="other-comment">
            <div class="img-container"> 
                <img src="../assets/images/img_avatar.png" class="img">
            </div>
            <div class="comment-details">
                <div class="comment-container">
                    <p class="comment-username">Ralph Ganzon</p>
                    <div class="otherUserRatingContainer">
                            <span class="star otherUserRating">&#9734;</span>  
                            <span class="star otherUserRating">&#9734;</span>  
                            <span class="star otherUserRating">&#9734;</span>  
                            <span class="star otherUserRating">&#9734;</span>  
                            <span class="star otherUserRating">&#9734;</span>  
                    </div>
                </div>
                <p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>
            <p class="time-posted">12h ago</p>
        </div>
    </div>
<main>
</section>
<script src="../assets/scripts/recipeScript.js"></script>
</body>
</html>