$( document ).ready(function() {
    /*Checks if there is a rating and a comment*/
    function checkInput() {
        if($("#userComment").val() != "" & $("#starsGiven").val() != "") {
            $("#submitComment").attr("disabled", false);
        }
        else {
            $("#submitComment").attr("disabled", true);
        }
    }
    $("#userComment").on("input", function(){
        checkInput();
    });

    /*Cancels the input*/
    $("#cancelComment").on("click", function(){
        $("#userComment").val("").blur();
        $("#userStar").html("0");
        $("#starsGiven").val("");
        $(".userRating").each(function(){
            $(this).removeClass("on");
        });
        checkInput();
    });

    /*Rating Functionality*/
    $("#rateRecipe").on("click", ".userRating", function(){
        indexStarSelected = $(".userRating").index($(this));
        i = 0
        $(".userRating").each(function(){
            if (i<=indexStarSelected) {
                $(this).addClass("on");
                i++;
            }
            else {
                $(this).removeClass("on");
            }
        });
        $("#userStar").html(i);
        $("#starsGiven").val(i);
        checkInput();
    });
});