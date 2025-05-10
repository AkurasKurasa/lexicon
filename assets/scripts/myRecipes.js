$(document).ready(function() {
  
    fetchMyRecipes();
    $(document).on('click', '.addRecipe', function(e) {
        e.preventDefault();
        $('.modalRecipe').toggleClass('is-visible');
        $('.modalRecipe-heading').text('Add a Recipe');
        const placeholderText = "e.g.\n" +
        "- 2 cups of flour\n" +
        "- 1 cup of sugar\n" +
        "- 2 eggs\n\n" +
        "# Instructions\n" +
        "1. Mix all dry ingredients.\n" +
        "2. Add eggs and stir well.\n" +
        "3. Bake at 180°C for 30 minutes.";
        const procedurePlaceholder = "e.g.\n" +
        "1. Mix all dry ingredients.\n" +
        "2. Add eggs and stir well.\n" +
        "3. Bake at 180°C for 30 minutes.";

        document.getElementById("recipeIngredients").placeholder = placeholderText;
        document.getElementById("recipeProcedure").placeholder = procedurePlaceholder;

        // Reset all form fields
        $("#recipeId").val(null);
        $("#recipeName").val(null);
        $("#recipeDescription").val(null);
        $("#recipeCategory").val(null);
        $("#recipeIngredients").val(null);
        $("#recipeProcedure").val(null);
        $("#recipeImage").val(null);
        $("#recipePrepTime").val(null);
        $("#recipeAdditionalTime").val(null);
        $("#recipeCookingTime").val(null);
        $("#recipeBudget").val(null);
    });

    $('.modal-toggle').on('click', function(e) {
        e.preventDefault();
        
        $('.modalRecipe').toggleClass('is-visible');
        
    });

    // Clicks a recipe
    $(".dataSectionRecipe").on('click','.recipeContainer', function() {
        window.location.href = '../views/recipe.php?id='+$(this).data('name');
    })
    // SUBMITS THE RECIPE
    $("#userRecipeForm").submit(function(e) {
        e.preventDefault();

        let formData = $('#userRecipeForm').serializeArray().reduce(function(obj, item) {
          obj[item.name] = item.value;
          return obj;
        }, {});
        if ( formData['id'].length > 0 ) {
          $.ajax({
            url: "../controllers/update.php",
            method: "POST",
            data: { 
              id: formData['id'],
              name: formData['name'],
              description: formData['description'],
              category: formData['category'],
              ingredients: formData['ingredients'],
              procedure: formData['procedure'],
              image: formData['image'],
              prepTime: formData['prepTime'],
              cookingTime: formData['cookingTime'],
              additionalTime: formData['additionalTime'],
              budget: formData['budget'],
              type: 'addRecipeByUser'
            },
            success: function(response) {
              const data = JSON.parse(response);
              if (data.success) {
                alert("Recipe successfully updated!");
                $('.modalRecipe').toggleClass('is-visible');
                fetchMyRecipes();
              } else {
                $('.error').empty();
                data.errors.forEach(error => {
                    $('.error').append(`<li>${error}</li>`);
                });
              }
            },
            error: function() {
            
            }
          });
          
        } else {
          $.ajax({
            url: "../controllers/add.php",
            method: "POST",
            data: { 
              name: formData['name'],
              description: formData['description'],
              category: formData['category'],
              id: formData['id'],
              name: formData['name'],
              description: formData['description'],
              category: formData['category'],
              ingredients: formData['ingredients'],
              procedure: formData['procedure'],
              image: formData['image'],
              prepTime: formData['prepTime'],
              cookingTime: formData['cookingTime'],
              additionalTime: formData['additionalTime'],
              budget: formData['budget'],
              type: 'addRecipeByUser'
            },
            success: function(response) {
              const data = JSON.parse(response);
              if (data.success) {
                alert("Recipe successfully added!");
                $('.modalRecipe').toggleClass('is-visible');
                const name = $('#filterName').val();
                const category = $('#filterCategory').val();
                const author = $('#filterUser').val();
                fetchRecipes(name, category, author);
              } else {
                $('.error').empty();
                data.errors.forEach(error => {
                    $('.error').append(`<li>${error}</li>`);
                });
              }
            },
            error: function() {
            
            }
          });

        }
    
    })
});

function fetchMyRecipes() {
    $.ajax({
      url: "../controllers/fetch.php",
      method: "GET",
      data: {
        type: "fetchMyRecipes"
      },
      success: function(response) {
        const data = JSON.parse(response);
        if (data.success) {
          $(".dataSectionRecipe").empty();
          $(".dataSectionRecipe").html(data.content);
        }
      },
      error: function() {
        alert("Failed to fetch your recipes.");
      }
    });
  }
  