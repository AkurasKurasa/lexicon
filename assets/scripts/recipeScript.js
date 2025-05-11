$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const product_id = urlParams.get('id');

    //Ajax for the recipe rating and the number of comments
    $.ajax({
        url: "../controllers/fetch.php",
        type: "GET",
        data: {
            product_id: product_id,
            type: 'populateRecipe'
        },
        success: function(response) {
            data = JSON.parse(response);
            // Checks if there is a user logged in and if he has already commented
            if (!data.checkLoggedIn) {
                $("#userComment").attr('placeholder', 'You must be logged in to submit a review.');
                $("#userComment").prop('disabled', true);
            } else if (data.alreadyCommented) {
                $("#userComment").attr('placeholder', 'You may only enter a comment once.');
                $("#userComment").prop('disabled', true);
            }
            $(".userImage").attr('src', data.profile_picture_url);
            // Populates the comment
            $.each(data.comment_id, function(index, comment_id) {
                populateComment(comment_id['id']);
            });

        // Populates the recipe page
        author_image = data.recipeInfo['author_image'] ?? '../assets/images/img_avatar.png';
        recipe_name = data.recipeInfo['product_name'];
        author = data.recipeInfo['author'];
        author_name = data.recipeInfo['first_name'] + " " + data.recipeInfo['last_name'];
        description = data.recipeInfo['description'];
        category = data.recipeInfo['category'];
        ingredients = data.recipeInfo['ingredients']; // Assuming ingredients are passed with \n
        procedures = data.recipeInfo['procedures']; // Assuming procedures are passed with \n
        prep_time = data.recipeInfo['prep_time'];
        cooking_time = data.recipeInfo['cooking_time'];
        additional_time = data.recipeInfo['additional_time'];
        budget = data.recipeInfo['budget'];
        product_image = data.recipeInfo['product_image'];

        // Update the recipe content
        $(".recipeName").html(recipe_name);
        $(".userSubmit").html(author_name);
        $(".recipeDescription").html(description);
        $(".preptime").html(prep_time);
        $(".cooktime").html(cooking_time);
        $(".additionaltime").html(additional_time);
        $(".budget").html(budget);
        $("#userSubmit").attr("data-id", author);
        $(".recipeImage").css('background-image', 'url(' + product_image + ')');
        $(".userIcon").css('background-image', 'url(' + author_image + ')');

        var ingredientList = ingredients.split("\n");
        const $olIngredient = $("<ol></ol>");
        $(".ingredients").append($olIngredient);

        $.each(ingredientList, function(index, ingredient) {
            $olIngredient.append("<li>" + ingredient + "</li>");
        });

        var procedureList = procedures.split("\n");
        const $olProcedure = $("<ol></ol>");
        $(".directions").append($olProcedure);
        $.each(procedureList, function(index, procedure) {
            $olProcedure.append("<li>" + procedure + "</li>");
        });
        
    },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
    $("#userComment").on("input", function() {
        checkInput();
    });

    /* Jump to Recipe */
    $(".jumpToRecipe").click(function() {
        $('html, body').animate({
            scrollTop: $('.recipeListv2').offset().top
        }, 1000);
        console.log
    })

    /*Cancels the input*/
    $("#cancelComment").on("click", function() {
        resetCommment();
    });

    /*Rating Functionality*/
    $("#rateRecipe").on("click", ".userRating", function() {
        indexStarSelected = $(".userRating").index($(this));
        i = 0
        $(".userRating").each(function() {
            if (i <= indexStarSelected) {
                $(this).html("&#9733;");
                i++;
            } else {
                $(this).html("&#9734;");
            }
        });
        $("#userStar").html(i);
        $("#starsGiven").val(i);
        checkInput();
    });

    /*submitComment button script */
    $("#commentForm").on('submit', function(e) {
        e.preventDefault();
        let formData = $('#commentForm').serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
          }, {});           
           $.ajax({
            url: "../controllers/add.php",
            type: "POST",
            data: {
                starsGiven: formData['starsGiven'],
                product_id: formData['product_id'],
                userComment: formData['userComment'],
                type: 'addComment'
            },
            success: function(response) {

                let data = JSON.parse(response);
                console.log(data.success);  
                if (data.success) {
                    resetCommment();
                    $("#userComment").attr('placeholder', 'You may only enter a comment once.');
                    $("#userComment").prop('disabled', true);
                    populateComment(data.comment_id);
                }
            },
            error: function(xhr, status, error) {
                console.log("Something Went wrong:" + error);
            }
        });

    });

    // Dynamically resizes the textarea
    const $textarea = $('#userComment');
    $textarea.on('input', function() {
        $(this).height('auto'); // reset height
        $(this).height(this.scrollHeight + 'px'); // adjust to content
    });

});

/*Function that checks if there is an input on rating and comment*/
function checkInput() {
    if ($("#userComment").val() != "" && $("#starsGiven").val() != "") {
        $("#submitComment").attr("disabled", false);
    } else {
        $("#submitComment").attr("disabled", true);
    }
}
// function that resets the user comment
function resetCommment() {
    $("#userComment").val("").blur();
    $("#userComment").height('auto');
    $("#userStar").html("0");
    $("#starsGiven").val("");
    $(".userRating").each(function() {
        $(this).html("&#9734;");
    });
    checkInput();
}

function populateComment(comment_id) {
    $.ajax({
        url: "../controllers/fetch.php",
        type: "GET",
        data: {
            comment_id: comment_id,
            type: 'fetchComment'
        },
        success: function(response) {
            data = JSON.parse(response);
            if(data.success) {
                $(".comments-container").prepend(data.output);
            } else {
                alert("ERROR! Failed fetching comments")
            }
        }
    });
}

//function that populates the comment section
//     $.ajax({
//         url: "#",
//         type: "GET",
//         data: {
//             first_name: first_name,
//             last_name: last_name,
//             profile_picture_url: profile_picture_url,
//             comment: comment,
//             rating: rating,
//             created_at: created_at,
//             type: 'fetchComment'
//         },
//         success: function(response) {
//             data = JSON.parse(respone);
//             if(data.success) {

//             } else {
//                 alert("ERROR! Failed fetching comments")
//             }
//         }
//     });
//     //adds the comment to comment section
//     var otherComment = $("<div>").addClass("other-comment");

//     // img-container
//     var imgContainer = $("<div>").addClass("img-container");
//     var image = $("<img>").addClass("img").attr('src', profile_picture_url);
//     imgContainer.append(image);
    
//     // comment-details
//     var commentDetails = $("<div>").addClass("comment-details");
//     var commentContainer = $("<div>").addClass("comment-container");
//     var commentUsername = $("<p>").addClass("comment-username").html(first_name + " " + last_name);
    
//     // star rating
//     var userRating = $("<div>").addClass("otherUserRatingContainer");
//     for (var i = 0; i < 5; i++) {
//         userRating.append(
//             $("<span>")
//                 .addClass("star otherUserRating")
//                 .html(i < rating ? "&#9733;" : "&#9734;")
//         );
//     }
//     commentContainer.append(commentUsername).append(userRating);
    
//     // comment text
//     var commentText = $("<p>").addClass("comment").html(comment);
//     commentDetails.append(commentContainer).append(commentText);
    
//     // timestamp and edit/delete
//     var timestampEditDeleteContainer = $("<div>").addClass("timestamp-edit-delete-container");
//     var timePosted = $("<p>").addClass("time-posted").html(created_at);
    
//     var editDeleteContainer = $("<div>").addClass("edit-delete-container").css("display", "");
//     editDeleteContainer.append($("<p>").text("Edit")).append($("<p>").text("Delete"));
    
//     timestampEditDeleteContainer.append(timePosted).append(editDeleteContainer);
    
//     // assemble all parts
//     otherComment
//         .append(imgContainer)
//         .append(commentDetails)
//         .append(timestampEditDeleteContainer);
    
//     // Append to the comment section
//     $(".comments-container").prepend($("<hr>")).prepend(otherComment);
    
// }