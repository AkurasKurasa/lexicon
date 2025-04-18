$( document ).ready(function() {
    /*When the comment input is empty, the submit button is disabled*/
    $("#userComment").on("input", function(){
        if($(this).val() != "") {
            $("#submitComment").attr("disabled", false);
        }
        else {
            $("#submitComment").attr("disabled", true);
        }
    });

    /*Cancels the input*/
    $("#cancelComment").on("click", function(){
        $("#userComment").val("").blur();
        $("#userStar").html("0");
        $("#starsGiven").val("");
        $(".rating").each(function(){
            $(this).removeClass("on");
        });
    });

    /*Rating Functionality*/
    $("#rateRecipe").on("click", ".rating", function(){
        indexStarSelected = $(".rating").index($(this));
        i = 0
        $(".rating").each(function(){
            if (i<=indexStarSelected) {
                $(this).addClass("on");
                i++;
            }
            else {
                $(this).removeClass("on");
            }
        });
        $("#userStar").html(i);
    });
});