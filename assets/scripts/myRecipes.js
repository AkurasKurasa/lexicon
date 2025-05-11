$(document).ready(function() {
  
    fetchMyRecipes();
    $(document).on('click', '.addRecipe', function(e) {
        e.preventDefault();
        $('.modalRecipe').toggleClass('is-visible');
        $('.modalRecipe-heading').text('Add a Recipe');
        const placeholderText = "e.g.\n" +
        "2 cups of flour\n" +
        "1 cup of sugar\n" +
        "2 eggs\n\n" +
        "# Instructions\n" +
        "Mix all dry ingredients.\n" +
        "Add eggs and stir well.\n" +
        "Bake at 180°C for 30 minutes.";
        const procedurePlaceholder = "e.g.\n" +
        "Mix all dry ingredients.\n" +
        "Add eggs and stir well.\n" +
        "Bake at 180°C for 30 minutes.";

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

    $(document).on('click', '.recipeBtn.delete', function() {
      var id = $(this).closest('.recipeContainer').data('name');
      let confirmation = confirm("Are you sure you want to delete this item?");

      if ( confirmation ) {

        $.ajax({
          url: "../controllers/delete.php",
          method: "POST",
          data: { 
            id: id,
            type: 'deleteRecipeByAdmin'
          },
          success: function(response) {
            const data = JSON.parse(response);
            if (data.success) {
              alert("Successfully deleted!");
              fetchMyRecipes();
            } else {
              alert("Something went wrong!");
            }
          },
          error: function() {
            alert("Something went wrong.");
          }
        });
      }
 
    });

    $('.modal-toggle').on('click', function(e) {
        e.preventDefault();
        
        $('.modalRecipe').toggleClass('is-visible');
        
    });

    $(document).on('click', '.recipeBtn-update', function() {
      var id = $(this).closest('.recipeContainer').data('name');
      $('.error').empty();
      $('.modalRecipe').toggleClass('is-visible');
      $('.modalRecipe-heading').text('Update Recipe');

      $.ajax({
        url: "../controllers/fetch.php",
        method: "GET",
        data: { 
          id: id,
          type: 'fetchRecipe'
        },
        success: function(response) {
          const data = JSON.parse(response);
          console.log(data.content['image']);
          if (data.success) {
            console.log(data.content)
            $("#recipeId").val(id);
            $("#recipeName").val(data.content['product_name']);
            $("#recipeDescription").val(data.content['description']);
            $("#recipeCategory").val(data.content['category']);
            $("#recipeDescription").val(data.content['description']);
            $("#recipeIngredients").val(data.content['ingredients']);
            $("#recipeProcedure").val(data.content['procedures']);
            $("#recipeImage").val(data.content['image']);
            $("#recipePrepTime").val(data.content['prep_time']);
            $("#recipeAdditionalTime").val(data.content['additional_time']);
            $("#recipeCookingTime").val(data.content['cooking_time']);
            $("#recipeBudget").val(data.content['budget']);
          } else {
            
          }
        },
        error: function() {
          alert("Something went wrong.");
        }
      });

    });

    // Clicks a recipe
    $(".dataSectionRecipe").on('click','.recipeTop', function() {
        window.location.href = '../views/recipe.php?id='+$(this).closest('.recipeContainer').data('name');
    })
    // SUBMITS THE RECIPE
    $("#userRecipeForm").submit(function(e) {
        e.preventDefault();
        $('.error').empty();
        let formData = $('#userRecipeForm').serializeArray().reduce(function(obj, item) {
          obj[item.name] = item.value;
          return obj;
        }, {});
        console.log(formData['id']);
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
              type: 'updateRecipeByAdmin'
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
  