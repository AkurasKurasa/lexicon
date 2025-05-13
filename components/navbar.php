<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
?>
<link rel="stylesheet" href="../assets/styles/navbar.css">

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
            <a href="#" style="padding:0;">Welcome <?php echo $_SESSION['first_name']; ?>!▼</a>
            <ul class="dropdown">
                <li>
                <a href="../views/editProfile.php">Edit Profile</a>
                </li>

                <li>
                <a href="../views/myRecipes.php">My Recipes</a>
                </li>

                <?php if ( $_SESSION['role'] < 3 ): ?>
                <li>
                    <a href="../views/Admin.php">Admin Panel</a>
                </li>
                <?php else: ?>
                    
                <?php endif; ?>

                <li>
                    <a href="../components/logout.php">Logout</a>
                </li>
            </ul>
        </li>

    </ul>

</nav>