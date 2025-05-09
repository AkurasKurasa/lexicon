<?php
// Start the session
session_start();

if (!empty($_SESSION['id'])) {
    header("Location: Home.php");
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
            <form id="loginForm" method="POST">
                <h1>Cooked.</h1>
                <h2>Log in</h2>
                <div class="fieldsContainer">
                    <label for="">Email</label>
                    <input type="text" id="email" name="email" placeholder="yourname@example.com">
                </div>

                <div class="fieldsContainer">
                    <label for="">Password</label>
                    <input type="password" id="password" name="password">
                </div>

                <button>Log In</button>
                
                <li class="error"></li>

                <p>Don't have an account? <a href="Signup.php">Sign up</a></p>
                <p>Forgot your Password? <a href="resetPassword.php">Reset Password</a></p>

            </form>
        </section>

    </main>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../auth.js"></script>
</body>
</html>