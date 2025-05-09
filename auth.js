$(document).ready(function() {

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
                console.log(response);
                data = JSON.parse(response);
                if (data.success) {
                    $('.success').empty();
                    $('.success').show();
                    $('.error').empty();
                    $('.error').hide();
                    let message = `<span>Account successfully created</span>`;
                    $('.success').append(message);
                    setTimeout(function() {
                        window.location.href = "Login.php";  // Redirect on success
                        yourFunction();
                    }, 1000);
                } else {
                    let errors = data.errors;
                    $('.error').empty();
                    errors.forEach(error => {
                        let message = `<li>${error}</li>`;
                        $('.error').append(message);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Request failed:", status, error);
            }
        });
    })

    // Login Form

    $("#loginForm").submit(function(e) {
        e.preventDefault();
        
        const email = $("#email").val();
        const password = $("#password").val();
      
        $.ajax({
          url: "../controllers/auth.php",
          method: "POST",
          data: { 
            email: email,
            password: password,
            type: 'login'
          },
          success: function(response) {
            console.log(response);
            const data = JSON.parse(response);
            if (data.success) {
              $('.error').empty();
              window.location.href = "Home.php";  // Redirect on success
            } else {
              $('.error').empty().append(`<li>${data.errors}</li>`); // Display error
            }
          },
          error: function() {
            $('.error').text('An error occurred while processing your request.');
          }
        });
      });      

});