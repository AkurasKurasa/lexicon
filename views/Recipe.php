<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe</title>
    <link rel="stylesheet" href="../assets/styles/recipe.css">
</head>
<body>

    <?php include '../components/Navbar.php'; ?>

    <main>

    <div class="recipeContainer">
      
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
                <p style="display: inline-block;"> <span id="NumOfReviews">0</span> reviews / <span id="AveStars">0</span> average
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
        <section class="sectionMain"> 
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
        <span>&#8369;00.00</span>
      </div><br>
    </div>
  </div>
</section>
</div>

    </main>
</body>
</html>