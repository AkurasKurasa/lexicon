$(document).ready(function(){


  $('.tab.dash').click( function() {
    window.location.href = "Admin.php";
  });

  $('.tab.recipes').click( function() {
    window.location.href = "AdminRecipes.php";
  });

  $('.tab.review').click( function() {
    window.location.href = "AdminReviews.php";
  });

  $('.tab.user').click( function() {
    window.location.href = "AdminUsers.php";
  });

  $('.tab.log').click( function() {
    window.location.href = "AdminLogs.php";
  }); 

  $('.tab.exports').click( function() {
    window.location.href = "AdminExport.php";
  });

});