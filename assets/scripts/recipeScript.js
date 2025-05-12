$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const product_id = urlParams.get('name');

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
            console.log(data);
            $.each(data.comment_id, function(index, comment_id) {
                populateComment(comment_id['id']);
            });
        console.log(data.recipeInfo);
        // Populates the recipe page
        total_review = data.ratingsInfo['total_review'];
        max_review = data.ratingsInfo['max_review'];
        numOfReviews = data.ratingsInfo['max_review'] / 5;
        aveRatings = total_review / max_review;
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
        $("#numOfReviews").html(numOfReviews);
        $("#aveRatings").html(aveRatings);
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
        selectStar(indexStarSelected);
        checkInput();
    });

    /*submitComment button script */
    $("#commentForm").on('submit', function(e) {
        e.preventDefault();
        let formData = $('#commentForm').serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
          }, {});   
          console.log(formData['product_id']);
          console.log(formData['starsGiven']);
          console.log(formData['userComment']);        
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

    //Delete comment
    $(".comments-container").on('click','#deleteBtn', function(){
        var comment_element = $(this).closest(".other-comment");
        let comment_id = comment_element.data("comment-id");
        $.ajax({
            url: '../controllers/delete.php',
            data: {
                comment_id: comment_id,
                type: 'deleteComment'
            },
            type: 'POST',
            success: function(response) {
                data = JSON.parse(response);
                if(data.success) {
                    comment_element.remove();
                    resetCommment()
                    $("#userComment").attr('placeholder', 'Enter your comment...');
                    $("#userComment").prop('disabled', false);

                }
            },
            error: function(xhr, status, error) {
                console.log("Something Went wrong:" + error);
            }
        });
    });

    // Edit Comment
    $(".comments-container").on("click","#editBtn",function(){
    $('.repTitle').offset()
        $('html, body').animate({
            scrollTop: $('.repTitle').offset().top
        }, 500);
        var comment_element = $(this).closest(".other-comment");
        let comment_id = comment_element.data("comment-id");
        populateInputComment(comment_id);
        $(".other-comment").filter(function() {
            return $(this).data("comment-id") == comment_id;
        }).remove();

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

function selectStar(indexStarSelected) {
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
}

function populateInputComment(comment_id) {
    
    $.ajax({
        url: '../controllers/fetch.php',
        type: 'GET',
        data: {
            comment_id: comment_id,
            type: 'fetchMyComment'
        },
        success: function(response) {
            data = JSON.parse(response);
            if(data.success) {
                $("#userComment").attr('placeholder', 'Enter your comment...');
                $("#userComment").prop('disabled', false);
                $("#userComment").val(data.comment);
                selectStar(data.rating-1);
            }
        }
    });
}