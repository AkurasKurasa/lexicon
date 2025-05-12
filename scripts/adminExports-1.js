$(document).ready(function() {

    $("#exportRecipes").click(function() {
        window.location.href = "../controllers/export.php?type=exportRecipes";
    })

    $("#exportUsers").click(function() {
        window.location.href = "../controllers/export.php?type=exportUsers";
    })

    $("#exportReviews").click(function() {
        window.location.href = "../controllers/export.php?type=exportReviews";
    })

    $("#exportLogs").click(function() {
        window.location.href = "../controllers/export.php?type=exportLogs";
    })

    $("#exportAll").click(function() {
        window.location.href = "../controllers/export.php?type=exportAll";
    })
});