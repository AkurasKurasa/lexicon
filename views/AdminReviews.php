<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/styles/adminReviews.css">
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
                            <input id="filterName" type="text" name="searchQueryInput" class="filterLogFieldInput" placeholder="Search keyword..." value="" />
                        </div>

                        <div class="filtersContainer">
                            <select name="" id="filterLogsCategory" class="filterLogField">
                                <option value="" selected>Select rating...</option>
                                <option value="User">1</option>
                                <option value="Admin">2</option>
                                <option value="Super-admin">3</option>
                                <option value="Super-admin">4</option>
                                <option value="Super-admin">5</option>
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
                    
                    <div class='reviewContainer'>
                        <p class='reviewTime'>00:00</p>
                        <p class='reviewInformation'>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem accusantium quas non! Sit in vero iusto quae! Labore, blanditiis sapiente deleniti, hic perferendis dolore suscipit doloribus voluptas laudantium nam minima!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, vel magnam quaerat explicabo eveniet sequi, rerum officiis minima quod inventore et ratione, esse laboriosam vitae odio. Quibusdam beatae aliquam neque?
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis natus, aliquam placeat accusamus ullam odio nulla expedita officia delectus obcaecati, enim beatae atque molestias cum quod ratione asperiores dicta quasi.    
                        </p>

                        <p class="reviewRatings">0 stars</p>

                        <p class="reviewAuthor">John Doe</p>

                        <p class="reviewResults">
                            <span>Positive: </span>
                            <span>Neutral:</span>
                            <span>Negative:</span>
                        </p>
                    </div>

                </div>

            </section>
        </section>   

    </main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../scripts/adminReviews.js"></script>
</html>
<!-- 
<link rel="stylesheet" href="../assets/styles/adminReviews.css">

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
                <input id="filterName" type="text" name="searchQueryInput" class="filterLogFieldInput" placeholder="Search keyword..." value="" />
            </div>

            <div class="filtersContainer">
                <select name="" id="filterLogsCategory" class="filterLogField">
                    <option value="" selected>Select rating...</option>
                    <option value="User">1</option>
                    <option value="Admin">2</option>
                    <option value="Super-admin">3</option>
                    <option value="Super-admin">4</option>
                    <option value="Super-admin">5</option>
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
        
        <div class='reviewContainer'>
            <p class='reviewTime'>00:00</p>
            <p class='reviewInformation'>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem accusantium quas non! Sit in vero iusto quae! Labore, blanditiis sapiente deleniti, hic perferendis dolore suscipit doloribus voluptas laudantium nam minima!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, vel magnam quaerat explicabo eveniet sequi, rerum officiis minima quod inventore et ratione, esse laboriosam vitae odio. Quibusdam beatae aliquam neque?
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis natus, aliquam placeat accusamus ullam odio nulla expedita officia delectus obcaecati, enim beatae atque molestias cum quod ratione asperiores dicta quasi.    
            </p>

            <p class="reviewRatings">0 stars</p>

            <p class="reviewAuthor">John Doe</p>

            <p class="reviewResults">
                <span>Positive: </span>
                <span>Neutral:</span>
                <span>Negative:</span>
            </p>
        </div>

    </div>

</section> -->