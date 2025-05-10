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
    <title>Sign Up</title>
    <link rel="stylesheet" href="../assets/styles/auth.css">
</head>
<body>
    <main>
        <section class="imageSection"></section>

        <section class="contentSection">
            <form id="signupForm">
                <h1>Cooked.</h1>
                <h2>Create an account</h2>

                <div class="nameWrapper" style="display: flex; align-items: center; justify-content: space-between; gap: 0.5rem;">
                    <div class="fieldsContainer">
                        <label for="firstName">First Name</label>
                        <input name="firstName" type="text" placeholder="e.g. John">
                    </div>

                    <div class="fieldsContainer">
                        <label for="">Last Name</label>
                        <input name="lastName" type="text" placeholder="e.g. Doe">
                    </div>
                </div>

                <div class="fieldsContainer">
                    <label for="">Email</label>
                    <input name="email" type="email" placeholder="yourname@example.com">
                </div>

                <div class="fieldsContainer">
                    <label for="gender_field">Gender</label>
                    <div class="radioBtnContainer">
                        <div>
                            <input type="radio" id="html" name="gender" value="Male" checked>
                            <label for="gender">Male</label>
                        </div>
                        <div>
                            <input type="radio" id="css" name="gender" value="Female">
                            <label for="gender">Female</label>
                        </div>
                        <div>
                            <input type="radio" id="javascript" name="gender" value="Other">
                            <label for="gender">Other</label>
                        </div>
                    </div>
                </div>

                <div class="fieldsContainer">
                    <label for="">Password</label>
                    <input type="password" name="password">
                </div>

                <div class="fieldsContainer">
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirmPassword">
                </div>

                <div class="fieldsContainer">
                    <label for="securityNickname">What was your childhood nickname?</label>
                    <input type="password" name="securityNickname" id="securityNickname" placeholder="e.g. Johnny" required>
                </div>

                <div class="fieldsContainer">
                    <label for="securityCartoon">Who was your favorite cartoon character as a child?</label>
                    <input type="password" name="securityCartoon" id="securityCartoon" placeholder="e.g. SpongeBob" required>
                </div>

                <div class="fieldsContainer">
                    <label for="securityStreet">What is the name of the street you grew up on?</label>
                    <input type="password" name="securityStreet" id="securityStreet" placeholder="e.g. Maple Street" required>
                </div>

                <div class="fieldsContainer">
                    <label for="securitySweet">What was your favorite sweet to eat as a child?</label>
                    <input type="password" name="securitySweet" id="securitySweet" placeholder="e.g. Lollipop" required>
                </div>


                <button>SIGN UP</button>

                <li class="error"></li>
                <p class="success"></p>
                
                <p>Have an account? <a href="Login.php">Log in</a></p>

            </form>
        </section>
    </main>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../auth.js"></script>
</html>