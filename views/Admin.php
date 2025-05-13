<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/styles/adminDashboard-1.css">
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
                
            </nav>

            <section class="contentBottom">

                <div class="controlContainer">
                    <!-- <button id="trendBtn">Trend</button>
                    <button id="pieBtn">Pie</button>
                    <button id="barBtn">Bar</button> -->
                </div>
            
                <h1 id="sentimentHeader">Sentiment Bar Chart</h1>
                <canvas id="sentimentTrend" style="display: none"></canvas>
                <canvas id="sentimentPie" style="display: none"></canvas>
                <canvas id="sentimentBar" style="display: block"></canvas>
            </section>

        </section>   

    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../scripts/admin.js"></script>
<script src="../scripts/adminDashboard.js"></script>
</html>

