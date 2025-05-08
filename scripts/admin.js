$(document).ready(function(){

  let currentTab = "";

  $('.tab.dash').click( function() {

    window.location.href = "Admin.php";

    currentTab = "dashboard";

  });

  $('.tab.recipes').click( function() {

    window.location.href = "AdminRecipes.php";

    currentTab = "recipes";

  });

  $('.tab.review').click( function() {

    console.log('reviews tab works')
    $('.contentSection').empty();
    $('.contentSection').load('../templates/AdminReviews.php')

  });

  $('.tab.user').click( function() {

    console.log('users tab works')
    $('.contentSection').empty();
    $('.contentSection').load('../templates/AdminUsers.php')

  });

  $('.tab.log').click( function() {

    console.log('users tab works')
    $('.contentSection').empty();
    $('.contentSection').load('../templates/AdminLogs.php')

  }); 

  $('.tab.exports').click( function() {

    console.log('users tab works')
    $('.contentSection').empty();
    $('.contentSection').load('../templates/AdminExport.php')

  });

});