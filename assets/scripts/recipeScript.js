$( document ).ready(function() {
    /*Function that checks if there is an input on rating and comment*/
    function checkInput() {
        if($("#userComment").val() != "" & $("#starsGiven").val() != "") {
            $("#submitComment").attr("disabled", false);
        }
        else {
            $("#submitComment").attr("disabled", true);
        }
    }

    //Ajax for the recipe rating and the number of comments
    $.ajax({
        url:"../controllers/recipeProcess.php",
        type:"GET",
        success: function(response) {
            data = JSON.parse(response);
            //shows the number of reviews and the average rating of the recipe
            /*$("#totalNumOfReviews").html(data.totalNumOfReviews);
            $("#averageRating").html(data.averageRating);*/
            if(!data.checkLoggedIn) {
                $("#userComment").attr('placeholder', 'You must be logged in to review.');
                $("#userComment").prop('disabled', 'true');
            }
            
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    })
    $("#userComment").on("input", function(){
        checkInput();
    });

    /* Jump to Recipe */
    $(".jumpToRecipe").click(function(){
        $('html, body').animate({
            scrollTop: $('.mainSection').offset().top
        }, 100);
        console.log
    })

    /*Cancels the input*/
    $("#cancelComment").on("click", function(){
        $("#userComment").val("").blur();
        $("#userStar").html("0");
        $("#starsGiven").val("");
        $(".userRating").each(function(){
            $(this).html("&#9734;");
        });
        checkInput();
    });

    /*Rating Functionality*/
    $("#rateRecipe").on("click", ".userRating", function(){
        indexStarSelected = $(".userRating").index($(this));
        i = 0
        $(".userRating").each(function(){
            if (i<=indexStarSelected) {
                $(this).html("&#9733;");
                i++;
            }
            else {
                $(this).html("&#9734;");
            }
        });
        $("#userStar").html(i);
        $("#starsGiven").val(i);
        checkInput();
    });

    /*submitComment button script */
    $("#commentForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url:"../controllers/recipeProcess.php",
            type: "POST",
            data: $("#commentForm").serialize(),
            success: function(response) {
                $data = JSON.parse(response);
                    if ($data.success) {
                        console.log($data.success);
                    }
                
            },
            error: function(xhr, status, error) {
                console.log("Something Went wrong:" + error);
            }
        })
    });

});