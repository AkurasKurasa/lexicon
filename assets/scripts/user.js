$(document).ready(function(){
    // Gets user profile information
    var urlParams = new URLSearchParams(window.location.search);
    var user_id = urlParams.get('id');

    $.ajax({
        url: "../controllers/fetch.php",
        type: "GET",
        data: {
            id: user_id,
            type: 'fetchUser'
        },
        success: function(response) {
            d = JSON.parse(response);
            data = d.content;
            console.log(data);
            var name = data.first_name + " " + data.last_name;
            var description = data.description;
            var image = data.image ?? '../assets/images/img_avatar.png';
            console.log(name);
            $("#userImage").attr('src', image);
            $("#user-name").html(name);
            $("#user-description").html(description);
            $(".header").html("Explore "+name+"'s Recipes");
        }
    });

      $.ajax({
        url: "../controllers/fetch.php",
        method: "GET",
        data: { 
          id: user_id,
          type: 'fetchRecipesUser'
        },
        success: function(response) {
          const data = JSON.parse(response);
          if (data.success) {
            $(".recipesSection").empty();
            $(".recipesSection").prepend(data.content);
          }
        },error: function() {
          alert("Something went wrong.");
        }
      });

        $(document).on('click','.recipeContainer', function(){
        var product_id = $(this).data("name");
        window.location.href = "../views/recipe.php?name=" + product_id;
      });
})