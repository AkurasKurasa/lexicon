<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/styles/admin.css">
</head>
<body>
    <main>
        <div class="navigation">

            <div class="logoContainer">
                <h1 class="logo">Cooked.</h1>
                <h2 class="logoAdmin">ADMIN PANEL</h2>
            </div>

            <div class="tabs">

                <h3 class="tabDivider">GENERAL</h3>

                <div class="tab">
                    <div class="dashboard"></div>
                    <p>DASHBOARD</p>
                </div>

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

        </div>

        <!-- Dashboard -->
        <div class="content">
            <nav class="top-divider">
                <div class="profileContainer">
                    <p>John Doe</p>
                    <div class="profile"></div>
                </div>
            </nav>

            <section class="bottomDivider">
                <div class="controlContainer">
                    <div class="wrapper-1">
                        <div class="searchBar">
                            <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search recipe..." value="" />
                            <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" /></svg>
                            </button>
                        </div>

                        <div class="filters">
                            <select name="" id="">
                                <option value="" selected hidden>Select a category...</option>
                                <option value="chicken">Chicken</option>
                            </select>

                            <select name="" id="">
                                <option value="" selected>Select a chef...</option>
                                <option value="gordon ramsay">Gordon Ramsay</option>
                            </select>
                        </div>

                    </div>

                    <div class="wrapper-2">
                        <div class="pages">

                            <!-- <p class="page">1</p>
                            <p class="page">...</p>
                            <p class="page">4</p>
                            <p class="page">5</p>
                            <p class="page">6</p>
                            <p class="page">7</p>
                            <p class="page">8</p>
                            <p class="page">...</p>
                            <p class="page">12</p> -->
                            
                        </div>

                        <button class="controlBtn">Add Recipe</button>
                    </div>

                </div>

                <div class="recipesSection">
                    <div class="recipesContainer">

                        <div class="recipeContainer">

                            <div class="recipeTop">
                                <img src="" alt="" class="">
                                <div class="recipeContainer-content">
                                    <h1>Aunt Jemima's Beloved Fried Chicken</h1>
                                </div>
                            </div>

                            <div class="recipeBottom">
                                <p class="categoryName">CHICKEN</p>
                                <p class="authorName">Aunt Jemima</p>
                                <div class="buttonsContainer">
                                    <div class="btn"></div>
                                    <div class="btn"></div>
                                    <div class="btn"></div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </section>

            
        </div>   

    </main>
</body>
</html>