$(document).ready(function() {


    //Ajax for the recipe rating and the number of comments
    $.ajax({
        url: "../controllers/recipeProcess.php",
        type: "GET",
        data: {
            product_id: "1"
        },
        success: function(response) {
            data = JSON.parse(response);
        
            if (!data.checkLoggedIn) {
                $("#userComment").attr('placeholder', 'You must be logged in to submit a review.');
                $("#userComment").prop('disabled', true);
            } else if (data.alreadyCommented) {
                $("#userComment").attr('placeholder', 'You may only enter a comment once.');
                $("#userComment").prop('disabled', true);
            }
            $(".userImage").attr('src', data.profile_picture_url);

        
            $.each(data.usersCommented, function(index, user) {
                populateComment(user.first_name, user.last_name, user.profile_picture_url ?? "../assets/images/img_avatar.png", user.comment, user.rating, user.created_at);
            });
        }
        ,
        error: function(xhr, status, error) {
            console.log(error);
        }
    })
    $("#userComment").on("input", function() {
        checkInput();
    });

    /* Jump to Recipe */
    $(".jumpToRecipe").click(function() {
        $('html, body').animate({
            scrollTop: $('.mainSection').offset().top
        }, 100);
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
        $.ajax({
            url: "../controllers/recipeProcess.php",
            type: "POST",
            data: $("#commentForm").serialize(),
            success: function(response) {
                let data = JSON.parse(response);
                if (data.success) {
                    resetCommment();
                    $("#userComment").attr('placeholder', 'You may only enter a comment once.');
                    $("#userComment").prop('disabled', true);
                    console.log(data.profile_picture_url);
                    populateComment(data.first_name, data.last_name, data.profile_picture_url, data.comment, data.rating, data.created_at);
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

//function that populates the comment section
function populateComment(first_name, last_name, profile_picture_url, comment, rating, created_at) {
    //adds the comment to comment section
    var otherComment = $("<div>").addClass("other-comment");


    // img-container
    var imgContainer = $("<div>").addClass("img-container");
    var image = $("<img>").addClass("img").attr('src', profile_picture_url);
    imgContainer.append(image);

    // comment-details
    var commentDetails = $("<div>").addClass("comment-details");
    var commentContainer = $("<div>").addClass("comment-container");
    var commentUsername = $("<p>").addClass("comment-username").html(first_name + " " + last_name);
    var userRating = $("<div>").addClass("otherUserRatingContainer");
    for (i = 0; i < 5; i++) {
        if (i < rating) {
            userRating.append($("<span>").addClass("star otherUserRating").html("&#9733;"));
        } else {
            userRating.append($("<span>").addClass("star otherUserRating").html("&#9734;"));
        }
    }
    commentContainer.append(commentUsername).append(userRating);
    var comment = $("<p>").addClass("comment").html(comment);
    commentDetails.append(commentContainer).append(comment);

    //time-posted
    var timePosted = $("<p>").addClass("time-posted").html(created_at);
    otherComment.append(imgContainer).append(commentDetails).append(timePosted);

    //Append to the comment section
    $(".comments-container").prepend(otherComment).prepend($("<hr>"));
}