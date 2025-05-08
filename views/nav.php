
<?php
require_once '../config.php';
require_once '../models/User.php';

// session_start();

// Gets the info of the user currently logged in 
if (isset($_SESSION['loggedInUser'])) {
    $user = new User($pdo);
    $loggedInUser = $_SESSION['loggedInUser'];
    $username = $user->getUserInfo($loggedInUser)['first_name'];
} else {
    $username = "Guest";
}
// Logout function
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: Login.php");  // Redirect to homepage after logout
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link rel="stylesheet" href="../nav.css">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li style="float:right;">
                <span>Welcome, <?php echo htmlspecialchars($username); ?></span>
                <a href="?logout=true" style="padding-left:10px;">Logout</a>
            </li>
        </ul>
    </nav>
</body>
</html>