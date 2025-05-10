<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: home.php");
    exit();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../assets/styles/auth.css">
</head>
<body>
    <main>
        <section class="imageSection"></section>

        <section class="contentSection">
            <form id="forgotPasswordForm">
                <h1>Cooked.</h1>
                <h2>Forgot Password</h2>

                <div class="fieldsContainer">
                    <label for="email">Email</label>
                    <input name="email" type="email" placeholder="yourname@example.com" required>
                </div>

                <div class="fieldsContainer">
                    <label for="securityNickname">What was your childhood nickname?</label>
                    <input type="password" name="securityNickname" id="securityNickname" placeholder="e.g. Johnny" required>
                </div>

                <div class="fieldsContainer">
                    <label for="securityStreet">What is the name of the street you grew up on?</label>
                    <input type="password" name="securityStreet" id="securityStreet" placeholder="e.g. Maple Street" required>
                </div>

                <div class="fieldsContainer">
                    <label for="securitySweet">What was your favorite sweet to eat as a child?</label>
                    <input type="password" name="securitySweet" id="securitySweet" placeholder="e.g. Lollipop" required>
                </div>

                <div class="fieldsContainer">
                    <label for="securityCartoon">Who was your favorite cartoon character as a child?</label>
                    <input type="password" name="securityCartoon" id="securityCartoon" placeholder="e.g. SpongeBob" required>
                </div>

                <div class="fieldsContainer">
                    <label for="newPassword">New Password</label>
                    <input type="password" name="newPassword" required>
                </div>

                <div class="fieldsContainer">
                    <label for="confirmNewPassword">Confirm New Password</label>
                    <input type="password" name="confirmNewPassword" required>
                </div>

                <button type="submit">RESET PASSWORD</button>

                <li class="error"></li>
                <p class="success"></p>

                <p>Remembered your password? <a href="Login.php">Log in</a></p>
            </form>
        </section>
    </main>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../auth.js"></script>
</html>
