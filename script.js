$(document).ready(function(){

    $(".featuredRecipe, .otherRecipe-wrapper").click(function() {
        const pageId = $(this).data("id");
  
        $.ajax({
          url: "../controllers/redirect.php",
          method: "POST",
          data: { id: pageId },
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

    $(".header").ready(function() {
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');

        if (id) {
            const category  = id.charAt(0).toUpperCase() + id.slice(1); 
            $(".header").text(`Explore ${category} Recipes`)
        }
    });

});