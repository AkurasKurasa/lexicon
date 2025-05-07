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

    <div class="nextRecipe">
      <ul>
          <li>
              <a href="#">
                <span>
                  <h4>< Previous Recipe</h4>
                </span>
              </a>
          </li>
          <li>
              <a href="#">
                <span>
                  <h4>Next Recipe ></h4>
                </span>
              </a>
          </li>
      </ul>
    </div>

    <div class="mainContent">
    <div class="recipeContainer">

        <section class="headerSection">
            <div class="recipeHeader">
                <h1 class="recipeName">Aunt Jemima's Beloved Fried Chicken</h1>
                <span></span>
                <div class="recipeRating">
                    <span class="star"></span>
                    <span class="star"></span>
                    <span class="star"></span>
                    <span class="star"></span>
                    <span class="star"></span>
                    <p style="display: inline-block;"> <span id="NumOfReviews">0</span> reviews / <span id="AveStars">0</span> average
                    <hr style="margin: 20px 15px 20px 15px">
                </div>


                <div class ="userLink">
                    <span class="userIcon"></span>
                    <span>Submitted by: </span>
                <a href="#">
                    <span class="userSubmit">Aunt Jemima</span>
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
                <span>20 minutes</span>
            </div>
            <br>

            <div class="timeHeader">
                <span>Cook Time:</span>
            </div>
            <div class="timeValues">
                <span>35 minutes</span>
            </div><br>

            <div class="timeHeader">
                <span>Additional Time:</span>
            </div>
            <div class="timeValues">
                <span>1 hour 20 minutes</span>
            </div><br>

            <div class="timeHeader">
                <span>Total Time:</span>
            </div>
            <div class="timeValues">
                <span>2 hours 15 minutes</span>
            </div><br>

            <hr style="margin: 30px 0px 30px 0px">

            <div class="timeHeader">
                        <div class="prepTimeTitle">   
                          <span>Servings:</span> 
                        </div>
            </div>
            <div class="timeValues">
                <span>8</span>
            </div>

            <hr style="margin: 30px 0px 30px 0px">

            <div class="timeHeader">
                <span>Estimated Budget: </span>
            </div>

            <div class="timeValues">
                <span>&#8369;00.00</span>
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

<div class="repliesSection">
<div class="repTitle">Questions and Replies:</div>
<hr style="margin: 30px 0px 30px 0px">
</div>

    </main>
</body>
</html>