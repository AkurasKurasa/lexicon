<?php 
session_start();
if (!isset($_SESSION["id"])) {
        header("Location: Login.php");
        exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/styles/editProfile.css">
</head>
<body>
    <?php include_once("../components/navbar.php"); ?>
    <main>
        
        <div class="navigation">

            <div class="logoContainer">
                <h1 class="logo">User Settings</h1>
            </div>
            <div class="sectionDivider"></div>

            <div class="tabs">

                <div class="tab selected" id="editProfile">
                    <p>User Information</p>
                </div>

                <div class="tab" id="editPassword">
                    <p>Password and Security</p>
                </div>

                <!-- <div class="delete-account">
                    <p>Delete Account</p>
                </div> -->

            </div>

        </div>

        <div class="main-content">
        </div>




    </main>
    <script src="../assets/scripts/editProfileScript.js"></script>
</body>

</html>