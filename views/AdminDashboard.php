<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/styles/adminDashboard.css">
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
                
                <!-- <h1>Sentiment Bar Chart</h1>
                <canvas id="sentimentBar"></canvas> -->
                <h1>Sentiment Line Chart</h1>
                <canvas id="sentimentTrend"></canvas>

            </section>

        </section>   

    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../scripts/adminDashboard.js"></script>
</html>

<link rel="stylesheet" href="../assets/styles/adminDashboard.css">

<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../scripts/adminDashboard.js"></script> -->