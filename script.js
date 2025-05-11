$(document).ready(function(){

  // Home.php 

    $(".featuredRecipe, .otherRecipe-wrapper").click(function() {
        const pageId = $(this).data("id");
  
        $.ajax({
          url: "../controllers/redirect.php",
          method: "POST",
          data: { 
            id: pageId,
            type: 'category'
          },
          success: function(response) {
            const data = JSON.parse(response);
            if (data.success) {
                console.log(data.id)
                window.location.href = data.redirect_url;
            } else {
              alert("Page not found");
            }
          },
          error: function() {
            alert("Something went wrong.");
          }
        });
    });


    $(document).on('click','.recipeContainer', function() {
      console.log('hello_world');
      const dishName = $(this).data("name");

      $.ajax({
        url: "../controllers/redirect.php",
        method: "POST",
        data: { 
          name: dishName,
          type: 'dish'
        },
        success: function(response) {
          const data = JSON.parse(response);
          if (data.success) {
              // console.log(data.name)
              window.location.href = data.redirect_url;
          } else {
            console.log(data.name)
            alert("Page not found");
          }
        },
        error: function() {
          alert("Something went wrong.");
        }
      });
  });

  $(".recipesSection").ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
      const id = urlParams.get('category');
      $.ajax({
        url: "../controllers/fetch.php",
        method: "GET",
        data: { 
          id: id,
          type: 'fetchRecipes'
        },
        success: function(response) {
          const data = JSON.parse(response);
          if (data.success) {
            $(".recipesSection").empty();
            $(".recipesSection").prepend(data.content);
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get('category');
            if (id) {
                const category  = id.charAt(0).toUpperCase() + id.slice(1); 
                $(".header").text(`Explore ${category} Recipes`)
            }
          } else {
            
          }
        },
        error: function() {
          alert("Something went wrong.");
        }
      });
      
  });

});