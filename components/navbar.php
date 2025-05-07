<link rel="stylesheet" href="../assets/styles/navbar.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<nav class="navbar">

    <ul class="nav-logo">
        <li id="nav-logo-li">
            <a href="Home.php">
                <h1>Cooked.</h1>
            </a>
        </li>
    </ul>

    <ul class="nav-tabs">

        <li>
            <a href="#">Recipes</a>
        </li>

        <li>
            <a href="#">Search</a>
        </li>

        <li>
            <a href="#">User ▼</a>
            <ul class="dropdown">
                <li>
                    <a href="#">Edit Profile</a>
                </li>
                <li>
                    <a href="../components/logout.php">Logout</a>
                </li>
            </ul>
        </li>

    </ul>

</nav>
<div class="security-reminder">
Warning! Set your security questions in <a href="../views/editProfile.php">User Settings</a> to enable password recovery.</div>
<script>
$(document).ready(function () {
    $.ajax({
        url: '../controllers/checkSecurityQuestions.php',
        type: 'GET',
        success: function(response) {
            (response);
            if (response.hasSecurity) {
                $('.security-reminder').hide();
            }
        }
    });
});
</script>