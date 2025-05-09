$(document).ready(function() {
    $("#exportUsers").click(function() {
        $.ajax({
            url: "../controllers/export.php",
            method: "GET",
            data: { 
              type: 'exportUsers'
            },
            success: function(response) {
              const data = JSON.parse(response);
              if (data.success) {
                alert("Successfully exported.");
              } else {
                alert("Something went wrong while exporting.");
              }
            },
            error: function() {
              alert("Something went wrong.");
            }
          });
    })
});