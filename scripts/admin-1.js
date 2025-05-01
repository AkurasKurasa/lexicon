$(document).ready(function(){

    $('#recipeButton').on('click', function(e) {
        e.preventDefault();
        $('.modal').toggleClass('is-visible');
        $('#recipeId').val(null);
        $('#recipeName').val(null);
        $('#recipeDescription').val(null);
    });

    $('.modal-toggle').on('click', function(e) {
        e.preventDefault();
        $('.modal').toggleClass('is-visible');
    });

    $("#adminRecipeForm").submit(function(e) {
        e.preventDefault();
    
        let formData = $('#adminRecipeForm').serializeArray().reduce(function(obj, item) {
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
              type: 'updateRecipeByAdmin'
            },
            success: function(response) {
              const data = JSON.parse(response);
              if (data.success) {
                alert("Recipe successfully updated!");
                $('.modal').toggleClass('is-visible');
                const name = $('#filterName').val();
                const category = $('#filterCategory').val();
                const author = $('#filterUser').val();
                fetch(name, category, author);
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
              type: 'addRecipeByAdmin'
            },
            success: function(response) {
              const data = JSON.parse(response);
              if (data.success) {
                alert("Recipe successfully added!");
                $('.modal').toggleClass('is-visible');
                const name = $('#filterName').val();
                const category = $('#filterCategory').val();
                const author = $('#filterUser').val();
                fetch(name, category, author);
              } else {
                alert("Something went wrong!");
              }
            },
            error: function() {
            
            }
          });

        }
    
    })

    $(".dataSection").ready(function() {
        fetch();
    });

    // $(document).on('click', '.btn.delete', function() {
    //   var id = $(this).closest('.recipeContainer').data('name');

    //   let confirmation = confirm("Are you sure you want to delete this item?");

    //   if ( confirmation ) {

    //     $.ajax({
    //       url: "../controllers/delete.php",
    //       method: "POST",
    //       data: { 
    //         id: id,
    //         type: 'deleteRecipeByAdmin'
    //       },
    //       success: function(response) {
    //         const data = JSON.parse(response);
    //         if (data.success) {
    //           alert("Successfully deleted!");
    //           const name = $('#filterName').val();
    //           const category = $('#filterCategory').val();
    //           const author = $('#filterUser').val();
    //           fetch(name, category, author);
    //         } else {
    //           alert("Something went wrong!");
    //         }
    //       },
    //       error: function() {
    //         alert("Something went wrong.");
    //       }
    //     });
    //   }
 
    // });

    // $(document).on('click', '.btn.edit', function() {
    //   var id = $(this).closest('.recipeContainer').data('name');
    //   $('.modal').toggleClass('is-visible');

    //   $.ajax({
    //     url: "../controllers/fetch.php",
    //     method: "GET",
    //     data: { 
    //       id: id,
    //       type: 'fetchRecipe'
    //     },
    //     success: function(response) {
    //       const data = JSON.parse(response);
    //       if (data.success) {
    //         $("#recipeId").val(data.content['id']);
    //         $("#recipeName").val(data.content['product_name']);
    //         $("#recipeDescription").val(data.content['description']);
    //         $("#recipeCategory").val(data.content['category']);
    //       } else {
            
    //       }
    //     },
    //     error: function() {
    //       alert("Something went wrong.");
    //     }
    //   });

    // });

    $('.filterField').change(function() {

      const name = $('#filterName').val();
      const category = $('#filterCategory').val();
      const author = $('#filterUser').val();

      fetch(name, category, author);

    });

    $('.filterFieldInput').on("input", function() {

      const name = $('#filterName').val();
      const category = $('#filterCategory').val();
      const author = $('#filterUser').val();

      fetch(name, category, author);

    });

    $(document).on('click', '.btn.delete', function() {
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
              const name = $('#filterName').val();
              const category = $('#filterCategory').val();
              const author = $('#filterUser').val();
              fetch(name, category, author);
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

    $(document).on('click', '.btn.edit', function() {
      var id = $(this).closest('.recipeContainer').data('name');
      $('.modal').toggleClass('is-visible');

      $.ajax({
        url: "../controllers/fetch.php",
        method: "GET",
        data: { 
          id: id,
          type: 'fetchRecipe'
        },
        success: function(response) {
          const data = JSON.parse(response);
          if (data.success) {
            $("#recipeId").val(data.content['id']);
            $("#recipeName").val(data.content['product_name']);
            $("#recipeDescription").val(data.content['description']);
            $("#recipeCategory").val(data.content['category']);
          } else {
            
          }
        },
        error: function() {
          alert("Something went wrong.");
        }
      });

    });

    function fetch(name=null, category=null, author=null) {

      $.ajax({
        url: "../controllers/fetch.php",
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
            $(".dataSection").empty();
            $(".dataSection").html(data.content);
          } else {
            
          }
        },
        error: function() {
          alert("Something went wrong.");
        }
      });
    }

});