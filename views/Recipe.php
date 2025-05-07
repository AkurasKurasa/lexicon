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
<section class="comment-section">
    <div id="input-container">
     <form method=POST id="commentForm">
        <div class="input-comment">
            <div class="img-container" style="width:4rem;height:4rem;">
                <img src="../assets/images/img_avatar.png" class="img userImage">
            </div> 
            <div class="input-comment-details">
                <div id="rateRecipe">
                    <input name="starsGiven" id="starsGiven" value="" hidden>
                    <input name="product_id" id="product_id" value="<?php //echo $_GET['name']; ?>1" hidden>
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
            <!-- THIS ARE THE INPUTTED COMMENTS -->
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
                <!--stars-->
                <p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>
            <p class="time-posted">12h ago</p>
        </div>
    <hr>
    </div>

</section>
<script src="../assets/scripts/recipeScript.js"></script>
</body>
</html>