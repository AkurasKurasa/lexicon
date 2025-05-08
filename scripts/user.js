$(document).ready(function(){

  $('#recipeButton').on('click', function(e) {
      e.preventDefault();
      $('.modal').toggleClass('is-visible');
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
            
          } else {
             
          }
        },
        error: function() {
        
        }
      });
    })
});