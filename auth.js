$(document).ready(function(){
  
  // Signup.php

  $("#signupForm").submit(function(e) {
    e.preventDefault();

    let formData = $('#signupForm').serializeArray().reduce(function(obj, item) {
      obj[item.name] = item.value;
      return obj;
    }, {});

    $.ajax({
      url: "../controllers/auth.php",
      method: "POST",
      data: { 
        firstName: formData['firstName'],
        lastName: formData['lastName'],
        gender: formData['gender'],
        email: formData['email'],
        password: formData['password'],
        confirmPassword: formData['confirmPassword'],
        type: 'signup'
      },
      success: function(response) {
        const data = JSON.parse(response);
        if (data.success) {
          $('.error').empty();
           console.log("Success")
        } else {
          let errors = data.errors;
          $('.error').empty();
          errors.forEach(error => {
              let message = `<li>${error}</li>`;
              $('.error').append(message);
          });           
        }
      },
      error: function() {
      sggsdgs
      }
    });
  })

  // Login Form

  $("#loginForm").submit(function(e) {
    e.preventDefault();

    let formData = $('#loginForm').serializeArray().reduce(function(obj, item) {
      obj[item.name] = item.value;
      return obj;
    }, {});

    $.ajax({
      url: "../controllers/auth.php",
      method: "POST",
      data: { 
        email: formData['email'],
        password: formData['password'],
        type: 'login'
      },
      success: function(response) {
        const data = JSON.parse(response);
        if (data.success) {
          $('.error').empty();
          window.location.href = "Home.php";
        } else {
          let error = data.errors;
          $('.error').empty();
          let message = `<li>${error}</li>`;
          $('.error').append(message);          
        }
      },
      error: function() {
      
      }
    });
  })

});