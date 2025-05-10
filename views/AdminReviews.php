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

                <div class="controlContainer">

                    <div class="controlWrapper1">

                        <div class="searchBarContainer">
                            <input id="filterName" type="text" name="searchQueryInput" class="filterLogFieldInput" placeholder="Search user..." value="" />
                        </div>
                        
                        <div class="searchBarContainer" style="margin: 0">
                            <input id="filterRecipe" type="text" name="searchQueryInput" class="filterLogFieldInput" placeholder="Search recipe..." value="" />
                        </div>

                        <div class="filtersContainer">
                            <select name="" id="filterRating" class="filterLogField">
                                <option value="" selected>Select rating...</option>
                                <option value="User">1</option>
                                <option value="Admin">2</option>
                                <option value="Super-admin">3</option>
                                <option value="Super-admin">4</option>
                                <option value="Super-admin">5</option>
                            </select>
                        </div>

                        <div class="filtersContainer">
                            <select name="" id="filterSentiment" class="filterLogField">
                                <option value="" selected>Select sentiment...</option>
                                <option value="positive">Positive</option>
                                <option value="neutral">Neutral</option>
                                <option value="negative">Negative</option>
                            </select>
                        </div>


                    </div>

                    <div class="controlWrapper1">

                        <div class="filtersContainer" style="margin-left: 2rem;">
                            <input type="date" name="filterStartDate" id="filterStartDate" class="filterLogField"> :
                            <input type="time" name="filterStartTime" id="filterStartTime" class="filterLogField">
                        </div>
                        -
                        <div class="filtersContainer">
                            <input type="date" name="filterEndDate" id="filterEndDate" class="filterLogField"> :
                            <input type="time" name="filterEndTime" id="filterEndTime" class="filterLogField">
                        </div>

                    </div>

                </div>

                <div class="dataSectionReviews">

                </div>

            </section>

            <div class="modalReview">
                <div class="modal-overlay modal-toggle"></div>
                <div class="modal-wrapper modal-transition">
                    <div class="modal-header">
                        <button class="modal-close modal-toggle"><svg class="icon-close icon" viewBox="0 0 32 32"><use xlink:href="#icon-close"></use></svg></button>
                        <h2 class="modalReview-heading"></h2>
                    </div>
                
                <div class="modal-body">
                    <div class="modal-content">
                        <form action="" id="adminReviewForm" class="reviewForm">

                            <input type="text" id="reviewId" name="id" hidden>

                            <div class="fieldsContainer recipe-name">
                                <label for="">RECIPE FROM</label>
                                <input type="text" id="reviewRecipe" name="email" value="Chicken" disabled>
                            </div>

                            <div class="fieldsContainer recipe-name">
                                <label for="">AUTHOR</label>
                                <input type="text" id="reviewAuthor" name="email" value="John Doe" disabled>
                            </div>

                            <div class="fieldsContainer recipe-name">
                                <label for="">RATING</label>
                                <input type="text" id="reviewRating" name="email" value="4.9" disabled>
                            </div>

                            <div class="fieldsContainer description">
                                <label for="">REVIEW</label>
                                <textarea name="ingredients" id="reviewComment" disabled>This shit is so ass...</textarea>
                            </div>

                            <div class="fieldsContainer recipe-name">
                                <label for="">SENTIMENT</label>
                                <input type="text" id="reviewSentiment" name="email" value="NEGATIVE" disabled>
                            </div>

                           <div class="fieldsWrapper">
                                <div class="fieldsContainer description">
                                    <label for="">POSITIVE</label>
                                    <input type="text" id="reviewPositive" name="firstName" value="0" disabled>
                                </div>

                                <div class="fieldsContainer description">
                                    <label for="">NEUTRAL</label>
                                    <input type="text" id="reviewNeutral" name="lastName" value="3" disabled>
                                </div>

                                <div class="fieldsContainer description">
                                    <label for="">NEGATIVE</label>
                                    <input type="text" id="reviewNegative" name="lastName" value="2" disabled>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>   



    </main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../scripts/adminReviews.js"></script>
<script src="../scripts/admin.js"></script>
</html>