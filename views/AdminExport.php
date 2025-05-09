<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/styles/adminExport.css">
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
                <div class="profileContainer">
                    <p>John Doe</p>
                    <div class="profile"></div>
                </div>
            </nav>

            <section class="contentBottom">

                <div class="exportContainers">

                    <h1>Export Tables</h1>

                    <button>Export recipes as .csv</button>
                    <button>Export reviews as .csv</button>
                    <button id="exportUsers">Export users as .csv</button>
                    <button>Export logs as .csv</button>
                    <button>Export all as .csv</button>
                </div>

            </section>

        </section>

    </main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../scripts/admin.js"></script>
<script src="../scripts/adminExports.js"></script>
</html>

<!-- <link rel="stylesheet" href="../assets/styles/adminExport.css">

<nav class="contentTop">
    <div class="profileContainer">
        <p>John Doe</p>
        <div class="profile"></div>
    </div>
</nav>

<section class="contentBottom">

    <div class="exportContainers">

        <h1>Export Tables</h1>

        <button>Export recipes as .csv</button>
        <button>Export reviews as .csv</button>
        <button>Export users as .csv</button>
        <button>Export logs as .csv</button>
        <button>Export all as .csv</button>
    </div>

</section> -->