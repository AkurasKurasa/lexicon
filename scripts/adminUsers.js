$(document).ready(function() {
      // AdminUsers.php

      $('#userButton').on('click', function(e) {
        e.preventDefault();
        $('.modalUser').toggleClass('is-visible');
        $('.modalUser-heading').text('Create New User');
        $('#userId').val(null);
        $('#userFirstName').val(null);
        $('#userLastName').val(null);
        $('#userCategory').val(null);
        $('#userGender').val(null);
        $('#userEmail').val(null);
        $('#userPassword').val(null);
      });
  
      $('.modal-toggle').on('click', function(e) {
          e.preventDefault();
          $('.modalUser').toggleClass('is-visible');
      });
  
      $("#adminUserForm").submit(function(e) {
        e.preventDefault();

        var id = $(this).closest('.userContainer').data('name');
    
        let formData = $('#adminUserForm').serializeArray().reduce(function(obj, item) {
          obj[item.name] = item.value;
          return obj;
        }, {});
  
        if ( formData['id'].length > 0 ) {
  
          $.ajax({
            url: "../controllers/update.php",
            method: "POST",
            data: { 
              id: formData['id'],
              firstName: formData['firstName'],
              lastName: formData['lastName'],
              role: formData['userType'],
              email: formData['email'],
              gender: formData['gender'],
              password: formData['password'],
              image: formData['image'],
              type: 'updateUserByAdmin'
            },
            success: function(response) {
              const data = JSON.parse(response);
              if (data.success) {
                alert("User successfully updated!");
                $('.modalUser').toggleClass('is-visible');
                const name = $('#filterName').val();
                const role = $('#filterUserCategory').val();
                fetchUsers(name, role);
              } else {
                alert("Something went wrong!");
              }
            },
            error: function() {
            
            }
          });
          
        } else {
  
          $.ajax({
            url: "../controllers/add.php",
            method: "POST",
            data: { 
              id: formData['id'],
              firstName: formData['firstName'],
              lastName: formData['lastName'],
              role: formData['userType'],
              email: formData['email'],
              gender: formData['gender'],
              password: formData['password'],
              image: formData['image'],
              type: 'addUserByAdmin'
            },
            success: function(response) {
              const data = JSON.parse(response);
              if (data.success) {
                alert("User successfully created!");
                $('.modalUser').toggleClass('is-visible');
                const name = $('#filterName').val();
                const role = $('#filterUserCategory').val();
                fetchUsers(name, role);
              } else {
                alert("Something went wrong!");
              }
            },
            error: function() {
            
            }
          });
  
        }
    
      });

      $(".clear").click(function(e) {
        e.preventDefault();
        $('#userFirstName').val(null);
        $('#userLastName').val(null);
        $('#userCategory').val(null);
        $('#userGender').val(null);
        $('#userEmail').val(null);
        $('#userPassword').val(null);
      }); 

  
      $(".dataSectionUser").ready(function() {
        fetchUsers();
      });
  
      $('.filterUserField').change(function() {
  
        const name = $('#filterName').val();
        const role = $('#filterUserCategory').val();
        
        fetchUsers(name, role);
  
      });
  
      $('.filterUserFieldInput').on("input", function() {
  
        const name = $('#filterName').val();
        const role = $('#filterUserCategory').val();
        
        fetchUsers(name, role);
  
      });
  
      $(document).on('click', '.userBtn.delete', function() {
        var id = $(this).closest('.userContainer').data('name');
  
        let confirmation = confirm("Are you sure you want to delete this item?");
  
        if ( confirmation ) {
  
          $.ajax({
            url: "../controllers/delete.php",
            method: "POST",
            data: { 
              id: id,
              type: 'deleteUserByAdmin'
            },
            success: function(response) {
              const data = JSON.parse(response);
              if (data.success) {
                alert("Successfully deleted!");
                const name = $('#filterName').val();
                const role = $('#filterUserCategory').val();
                fetchUsers(name, role);
              } else {
                alert("Something went wrong!");
              }
            },
            error: function() {
              alert("Something went wrong.");
            }
          });
        }
   
      });
  
      $(document).on('click', '.userBtn.update', function() {
        var id = $(this).closest('.userContainer').data('name');
        $('.modalUser').toggleClass('is-visible');
        $('.modalUser-heading').text('Update User Information');
  
        $.ajax({
          url: "../controllers/fetch.php",
          method: "GET",
          data: { 
            id: id,
            type: 'fetchUser'
          },
          success: function(response) {
            const data = JSON.parse(response);
            if (data.success) {
              $("#userId").val(data.content['id']);
              $("#userFirstName").val(data.content['first_name']);
              $("#userLastName").val(data.content['last_name']);
              $("#userCategory").val(data.content['role'].toLowerCase());
              $("#userGender").val(data.content['gender'].toLowerCase());
              $("#userEmail").val(data.content['email']);
              $("#userPassword").val(data.content['password']);
            } else {
              
            }
          },
          error: function() {
            alert("Something went wrong.");
          }
        });
  
      });
      
      function fetchUsers(name=null, role=null) {
  
        $.ajax({
          url: "../controllers/fetch.php",
          method: "GET",
          data: { 
            filterName: name,
            filterRole: role,
            type: 'fetchUsersAdmin'
          },
          success: function(response) {
            const data = JSON.parse(response);
            if (data.success) {
              $(".dataSectionUsers").empty();
              $(".dataSectionUsers").html(data.content);
            } else {
              
            }
          },
          error: function() {
            alert("Something went wrong.");
          }
        });
      }
});