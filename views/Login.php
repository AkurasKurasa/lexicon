<?php
session_start();
if (isset($_SESSION['loggedInUser'])) {
        header("Location: home.php");
        exit();
} 
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="../assets/styles/auth.css">
</head>
<body>
    <main>
        <section class="imageSection"></section>
        <section class="contentSection">
            <form id="loginForm">
                <h1>Cooked.</h1>
                <h2>Log in</h2>
                <div class="fieldsContainer">
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="yourname@example.com">
                </div>

                <div class="fieldsContainer">
                    <label for="">Password</label>
                    <input type="password" name="password">
                </div>

                <button>Log In</button>
                
                <li class="error"></li>

                <p>Don't have an account? <a href="Signup.php">Sign up</a></p>

            </form>
        </section>

    </main>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../auth.js"></script>
</body>
</html>