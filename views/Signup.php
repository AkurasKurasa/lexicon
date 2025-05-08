<?php
<<<<<<< HEAD
session_start();
if (isset($_SESSION['loggedInUser'])) {
        header("Location: home.php");
        exit();
} 
?>
=======
// Start the session
session_start();
?>

>>>>>>> version_1_merge
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