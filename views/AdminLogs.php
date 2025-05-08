<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/styles/adminLog.css">
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

                <div class="tab">
                    <div class="recipe"></div>
                    <p>RECIPES</p>
                </div>

                <div class="tab">
                    <div class="reviews"></div>
                    <p>REVIEWS</p>
                </div>

                <div class="tab">
                    <div class="logs"></div>
                    <p>LOGS</p>
                </div>

                <div class="tab">
                    <div class="users"></div>
                    <p>USERS</p>
                </div>

                <div class="tab">
                    <div class="export"></div>
                    <p>EXPORT</p>
                </div>

            </div>

        </section>

        <section class="contentSection">
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
                            <input id="filterName" type="text" name="searchQueryInput" class="filterLogFieldInput" placeholder="Search user..." value="" />
                        </div>

                        <div class="filtersContainer">
                            <select name="" id="filterLogsCategory" class="filterLogField">
                                <option value="" selected>Select user type...</option>
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                                <option value="Super-admin">Super-Admin</option>
                            </select>
                        </div>

                        <div class="filtersContainer">
                            <input type="date" name="filterLogStartDate" id="filterLogStartDate" class="filterLogField"> :
                            <input type="time" name="filterLogStartTime" id="filterLogStartTime" class="filterLogField">
                        </div>
                        -
                        <div class="filtersContainer">
                            <input type="date" name="filterLogEndDate" id="filterLogEndDate" class="filterLogField"> :
                            <input type="time" name="filterLogEndTime" id="filterLogEndTime" class="filterLogField">
                        </div>

                    </div>

                </div>

                <div class="dataSectionLogs">
                    

                </div>

            </section>

        </div>   

    </main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../scripts/adminLogs.js"></script>
</html>
<!-- 
<link rel="stylesheet" href="../assets/styles/adminLog.css">

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
                <input id="filterName" type="text" name="searchQueryInput" class="filterLogFieldInput" placeholder="Search user..." value="" />
            </div>

            <div class="filtersContainer">
                <select name="" id="filterLogsCategory" class="filterLogField">
                    <option value="" selected>Select user type...</option>
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                    <option value="Super-admin">Super-Admin</option>
                </select>
            </div>

            <div class="filtersContainer">
                <input type="date" name="filterLogStartDate" id="filterLogStartDate" class="filterLogField"> :
                <input type="time" name="filterLogStartTime" id="filterLogStartTime" class="filterLogField">
            </div>
            -
            <div class="filtersContainer">
                <input type="date" name="filterLogEndDate" id="filterLogEndDate" class="filterLogField"> :
                <input type="time" name="filterLogEndTime" id="filterLogEndTime" class="filterLogField">
            </div>

        </div>

    </div>

    <div class="dataSectionLogs">
        

    </div>

</section>

<script src="../scripts/adminLogs.js"></script> -->
