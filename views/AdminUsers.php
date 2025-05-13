<?php
// Start the session
session_start();

if (empty($_SESSION['id'])) {
    header("Location: Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/styles/adminUsers.css">
    <link rel="stylesheet" href="../assets/styles/helper.css">
</head>

<body>
    <main>
       <section class="navigationSection">

            <div class="logo">
                <h1 class="">Cooked.</h1>
                <h2 class="">ADMIN PANEL</h2>
            </div>

            <div class="tabs">

                <h3 class="">GENERAL</h3>

                <div class="tab dash">
                    <div class="dashboard"></div>
                    <p>DASHBOARD</p>
                </div>

                <div class="tab recipes">
                    <div class="recipe"></div>
                    <p>RECIPES</p>
                </div>

                <div class="tab review">
                    <div class="reviews"></div>
                    <p>REVIEWS</p>
                </div>

                <div class="tab log">
                    <div class="logs"></div>
                    <p>LOGS</p>
                </div>

                <div class="tab user">
                    <div class="users"></div>
                    <p>USERS</p>
                </div>

                <div class="tab exports">
                    <div class="export"></div>
                    <p>EXPORT</p>
                </div>

            </div>

        </section>

        <section class="contentSection">
            <nav class="contentTop">
                <!-- <div class="profileContainer">
                    <p>
                        <?php echo $_SESSION['first_name'] ?>
                    </p>
                    <div class="profile"></div>
                </div> -->
            </nav>

            <section class="contentBottom">
                <div class="controlContainer">

                    <div class="controlWrapper1">

                        <div class="searchBarContainer">
                            <input id="filterName" type="text" name="searchQueryInput" class="filterUserFieldInput" placeholder="Search user..." value="" />
                        </div>

                        <div class="filtersContainer">
                            <select name="" id="filterUserCategory" class="filterUserField">
                                <option value="" selected>Select user type...</option>
                                <option value="3">User</option>
                                <option value="2">Admin</option>
                                <option value="1">Super-Admin</option>
                            </select>
                        </div>

                    </div>

                    <div class="controlWrapper2">
                        <button class="addBtn" id="userButton">Create New User</button>
                    </div>
 
                </div>

                <div class="dataSectionUsers">

                </div>
            </section>

            <div class="modalUser">
                <div class="modal-overlay modal-toggle"></div>
                <div class="modal-wrapper modal-transition">
                    <div class="modal-header">
                        <button class="modal-close modal-toggle"><svg class="icon-close icon" viewBox="0 0 32 32"><use xlink:href="#icon-close"></use></svg></button>
                        <h2 class="modalUser-heading"></h2>
                    </div>
                
                <div class="modal-body">
                    <div class="modal-content">
                        <form action="" id="adminUserForm" class="userForm">

                            <input type="text" id="userId" name="id" hidden>

                            <div class="fieldsWrapper">
                                <div class="fieldsContainer description">
                                    <label for="">FIRST NAME</label>
                                    <input type="text" id="userFirstName" name="firstName" placeholder="John">
                                </div>

                                <div class="fieldsContainer description">
                                    <label for="">LAST NAME</label>
                                    <input type="text" id="userLastName" name="lastName" placeholder="Doe">
                                </div>
                            </div>

                            <div class="fieldsContainer category">
                                <label for="">USER TYPE</label>
                                <select name="userType" id="userCategory">
                                    <option value="" selected>Select user type...</option>
                                    <option value="3">User</option>
                                    <?php if ( $_SESSION['role'] == 1 ): ?>
                                        <option value="2">Admin</option>
                                        <option value="1">Super-Admin</option>
                                    <?php else: ?>
                                        <option value="2" disabled>Admin</option>
                                        <option value="1" disabled>Super-Admin</option>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="fieldsContainer category">
                                <label for="">GENDER</label>
                                <select name="gender" id="userGender">
                                    <option value="" selected>Select gender...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="fieldsContainer recipe-name">
                                <label for="">EMAIL</label>
                                <input type="text" id="userEmail" name="email" placeholder="e.g., https://i.imgur.com/854cbHJ.jpeg">
                            </div>

                            <div class="fieldsContainer recipe-name">
                                <label for="">PASSWORD</label>
                                <input type="text" id="userPassword" name="password" placeholder="e.g., https://i.imgur.com/854cbHJ.jpeg">
                            </div>

                            <div class="fieldsContainer recipe-name">
                                <label for="">PROFILE URL</label>
                                <input type="text" id="recipeName" name="image" placeholder="e.g., https://i.imgur.com/854cbHJ.jpeg">
                            </div>

                            <div class="fieldsContainer buttons">
                                <button class="submit">Submit</button>
                                <button class="clear">Clear</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </section>   

    </main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../scripts/adminUsers.js"></script>
<script src="../scripts/admin.js"></script>
</html>
<!-- 
<link rel="stylesheet" href="../assets/styles/adminUsers.css">
<link rel="stylesheet" href="../assets/styles/helper.css">

<nav class="contentTop">
    <div class="profileContainer">
        <p>John Doe</p>
        <div class="profile"></div>
    </div>
</nav>

<section class="contentBottom">
    <div class="controlContainer">

        <div class="controlWrapper1">

            <div class="searchBarContainer">
                <input id="filterName" type="text" name="searchQueryInput" class="filterUserFieldInput" placeholder="Search user..." value="" />
            </div>

            <div class="filtersContainer">
                <select name="" id="filterUserCategory" class="filterUserField">
                    <option value="" selected>Select user type...</option>
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                    <option value="Super-admin">Super-Admin</option>
                </select>
            </div>

        </div>

        <div class="controlWrapper2">
            <button class="addBtn" id="userButton">Create New User</button>
        </div>

    </div>

    <div class="dataSectionUsers">

    </div>
</section>

<div class="modalUser">
    <div class="modal-overlay modal-toggle"></div>
    <div class="modal-wrapper modal-transition">
        <div class="modal-header">
            <button class="modal-close modal-toggle"><svg class="icon-close icon" viewBox="0 0 32 32"><use xlink:href="#icon-close"></use></svg></button>
            <h2 class="modalUser-heading"></h2>
        </div>
    
    <div class="modal-body">
        <div class="modal-content">
            <form action="" id="adminUserForm" class="userForm">

                <input type="text" id="userId" name="id" hidden>

                <div class="fieldsWrapper">
                    <div class="fieldsContainer description">
                        <label for="">FIRST NAME</label>
                        <input type="text" id="userFirstName" name="firstName" placeholder="John">
                    </div>

                    <div class="fieldsContainer description">
                        <label for="">LAST NAME</label>
                        <input type="text" id="userLastName" name="lastName" placeholder="Doe">
                    </div>
                </div>

                <div class="fieldsContainer category">
                    <label for="">USER TYPE</label>
                    <select name="userType" id="userCategory">
                        <option value="" selected>Select user type...</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="super-admin">Super-Admin</option>
                    </select>
                </div>

                <div class="fieldsContainer category">
                    <label for="">GENDER</label>
                    <select name="gender" id="userGender">
                        <option value="" selected>Select gender...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="fieldsContainer recipe-name">
                    <label for="">EMAIL</label>
                    <input type="text" id="userEmail" name="email" placeholder="e.g., https://i.imgur.com/854cbHJ.jpeg">
                </div>

                <div class="fieldsContainer recipe-name">
                    <label for="">PASSWORD</label>
                    <input type="text" id="userPassword" name="password" placeholder="e.g., https://i.imgur.com/854cbHJ.jpeg">
                </div>

                <div class="fieldsContainer recipe-name">
                    <label for="">PROFILE URL</label>
                    <input type="text" id="recipeName" name="image" placeholder="e.g., https://i.imgur.com/854cbHJ.jpeg">
                </div>

                <div class="fieldsContainer buttons">
                    <button class="submit">Submit</button>
                    <button class="clear">Clear</button>
                </div>

            </form>
        </div>
    </div>
</div> -->

<!-- <script src="../scripts/adminUsers.js"></script> -->