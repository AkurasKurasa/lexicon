$(document).ready(function(){

  let currentTab = "";

  $('.tab.dash').click( function() {

    if ( currentTab != "dashboard" ) {
      $('.contentSection').empty();
      $('.contentSection').load('../templates/AdminDashboard.php')
    }

    currentTab = "dashboard";

  });

  $('.tab.recipes').click( function() {

    if ( currentTab != "recipes" ) {
      $('.contentSection').empty();
      $('.contentSection').load('../templates/AdminRecipes.php')
    }

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