$(document).ready(function() {
    // AdminRecipes.php

    $('#recipeButton').on('click', function(e) {
        e.preventDefault();
        $('.modalRecipe').toggleClass('is-visible');
        $('.modalRecipe-heading').text('Add a Recipe');
    
        $("#recipeId").val(null);
        $("#recipeName").val(null);
        $("#recipeDescription").val(null);
        $("#recipeCategory").val(null);
        $("#recipeDescription").val(null);
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

    $("#adminRecipeForm").submit(function(e) {
        e.preventDefault();
    
        let formData = $('#adminRecipeForm').serializeArray().reduce(function(obj, item) {
          obj[item.name] = item.value;
          return obj;
        }, {});
        if ( formData['id'].length > 0 ) {

          $.ajax({
            url: "../controllers/adminUpdate.php",
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
                const name = $('#filterName').val();
                const category = $('#filterCategory').val();
                const author = $('#filterUser').val();
                fetchRecipes(name, category, author);
              } else {
                alert("Something went wrong!");
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
              type: 'addRecipeByAdmin'
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
                alert("Something went wrong!");
              }
            },
            error: function() {
            
            }
          });

        }
    
    })

    $(".clear").click(function(e) {
      e.preventDefault();
      $("#recipeName").val(null);
      $("#recipeDescription").val(null);
      $("#recipeCategory").val(null);
      $("#recipeDescription").val(null);
      $("#recipeIngredients").val(null);
      $("#recipeProcedure").val(null);
      $("#recipeImage").val(null);
      $("#recipePrepTime").val(null);
      $("#recipeAdditionalTime").val(null);
      $("#recipeCookingTime").val(null);
      $("#recipeBudget").val(null);
    }); 

    $(".dataSectionRecipe").ready(function() {
        fetchRecipes();
    });

    $('.filterRecipeField').change(function() {

      const name = $('#filterName').val();
      const category = $('#filterCategory').val();
      const author = $('#filterUser').val();

      fetchRecipes(name, category, author);

    });

    $('.filterRecipeFieldInput').on("input", function() {

      const name = $('#filterName').val();
      const category = $('#filterCategory').val();
      const author = $('#filterUser').val();

      fetchRecipes(name, category, author);

    });

    $(document).on('click', '.recipeBtn.delete', function() {
      var id = $(this).closest('.recipeContainer').data('name');

      let confirmation = confirm("Are you sure you want to delete this item?");

      if ( confirmation ) {

        $.ajax({
          url: "../controllers/adminDelete.php",
          method: "POST",
          data: { 
            id: id,
            type: 'deleteRecipeByAdmin'
          },
          success: function(response) {
            const data = JSON.parse(response);
            if (data.success) {
              alert("Successfully deleted!");
              const name = $('#filterName').val();
              const category = $('#filterCategory').val();
              const author = $('#filterUser').val();
              fetchRecipes(name, category, author);
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

    $(document).on('click', '.recipeBtn-update', function() {
      var id = $(this).closest('.recipeContainer').data('name');
      $('.modalRecipe').toggleClass('is-visible');
      $('.modalRecipe-heading').text('Update Recipe');

      $.ajax({
        url: "../controllers/adminFetch.php",
        method: "GET",
        data: { 
          id: id,
          type: 'fetchRecipeAdmin'
        },
        success: function(response) {
          const data = JSON.parse(response);
          if (data.success) {
            $("#recipeId").val(data.content['related_product']);
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

    function fetchRecipes(name=null, category=null, author=null) {

      $.ajax({
        url: "../controllers/adminFetch.php",
        method: "GET",
        data: { 
          filterName: name,
          filterCategory: category,
          filterUser: author,
          type: 'fetchRecipesAdmin'
        },
        success: function(response) {
          const data = JSON.parse(response);
          if (data.success) {
            $(".dataSectionRecipe").empty();
            $(".dataSectionRecipe").html(data.content);
          } else {
            
          }
        },
        error: function() {
          alert("Something went wrong.");
        }
      });
    }
})