<?php
// Start the session
session_start();

if (empty($_SESSION['id'])) {
    header("Location: Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/styles/userRecipe.css">
    <link rel="stylesheet" href="../assets/styles/recipe-styles.css">
    
    <?php include '../components/Navbar.php';
     ?>
</head>
<br>
<body>
<br><br><br>
<div class="container">
  <div class="form-part">
    <h2 align="center" style="font-size: 30px; font-weight: 400; font-family: 'Josefin Sans', sans-serif; margin-bottom: 15px;">Add a Recipe</h2>

    <form id="recipeForm" method="post">
      <div class="form-inputs">
        <div class="text-input margin-bottom-zero">
            <div class="text-input">
              <label for="recipename">Recipe Name</label>
              <input type="text" name="recipename" id="recipename" >
            </div>
        </div>

        <div class="text-input">
          <label for="country">Category</label>
          <select name="country" id="country">
              <option value="0" selected>Choose your category</option>
              <option value="1">Chicken</option>
              <option value="2">Ramen</option>
              <option value="3">Salad</option>
              <option value="4">Barbeque</option>
              <option value="5">Pizza</option>
              <option value="6">Sandwiches</option>
              <option value="7">Asian</option>
              <option value="8">Steak</option>
              <option value="9">Soup</option>
              <option value="10">Pasta</option>
              <option value="11">Healthy</option>
              <option value="12">Breakfast</option>
              <option value="13">Seafood</option>
          </select>
        </div>

        <div class="cub-input">
          <div class="text-input">
            <label for="preptime">Prep Time</label>
            <div class="time-input-container">
              <input type="number" name="preptime" id="preptime" min="0">
              <select name="preptime_unit" id="preptime_unit">
                <option value="minutes">min</option>
                <option value="hours">hrs</option>
              </select>
            </div>
          </div>
          <div class="text-input">
            <label for="cookingtime">Cooking Time</label>
            <div class="time-input-container">
              <input type="number" name="cookingtime" id="cookingtime" min="0">
              <select name="cookingtime_unit" id="cookingtime_unit">
                <option value="minutes">min</option>
                <option value="hours">hrs</option>
              </select>
            </div>
          </div>
          <div class="text-input">
            <label for="addtime">Additional Time</label>
            <div class="time-input-container">
              <input type="number" name="addtime" id="addtime" min="0">
              <select name="addtime_unit" id="addtime_unit">
                <option value="minutes">min</option>
                <option value="hours">hrs</option>
              </select>
            </div>
          </div>
          <div class="text-input">
            <label for="budget">Budget</label>
            <div class="time-input-container">
              <input type="number" name="budget" id="budget" min="0" step="0.01">
              <select name="budget_unit" id="budget_unit">
                <option value="usd">₱</option>
                <option value="eur">€</option>
                <option value="php">$</option>
              </select>
            </div>
          </div>
        </div>

        <div class="text-input">
          <label for="ingredients">Ingredients</label>
          <textarea name="ingredients" id="ingredients"></textarea>
        </div>

        <div class="text-input">
          <label for="description">Description</label>
          <textarea name="description" id="description"></textarea>
        </div>

        <div class="button-container">
            <button type="submit" class="submit-btn" style="min-width: 200px; padding: 15px 30px; font-size: 18px; font-weight: bold; color: #fff; border: none; border-radius: 50px; cursor: pointer; background-color: #e9b251; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);">Submit Recipe</button>
            <button type="button" class="clear-btn" onclick="clearForm()" style="min-width: 200px; padding: 15px 30px; font-size: 18px; font-weight: bold; color: #fff; border: none; border-radius: 50px; cursor: pointer; background-color:rgb(0, 0, 0); box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);">Clear Form</button>
        </div>
      </div>
    </form>

  </div>
</div>

<script>
function clearForm() {
    document.getElementById('recipename').value = '';
    document.getElementById('preptime').value = '';
    document.getElementById('cookingtime').value = '';
    document.getElementById('addtime').value = '';
    document.getElementById('budget').value = '';
    document.getElementById('country').selectedIndex = 0;
    document.getElementById('ingredients').value = '';
    document.getElementById('description').value = '';
    
    // Reset unit selections to first option
    document.getElementById('preptime_unit').selectedIndex = 0;
    document.getElementById('cookingtime_unit').selectedIndex = 0;
    document.getElementById('addtime_unit').selectedIndex = 0;
    document.getElementById('budget_unit').selectedIndex = 0;
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="userRecipe.js"></script>
</body>
</html>