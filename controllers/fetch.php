<?php
    include('../config.php');
    require_once '../models/Recipe.php';
    require_once '../models/User.php';

    $type = $_GET['type'];

    switch ($type) {
    case 'fetchRecipesUser':
        $id = $_GET['id'];
        $output = "";
        $query = "
        SELECT 
            products.product_name,
            products.author,
            products.id,
            images.image
        FROM 
            products
        LEFT JOIN images 
            ON images.related_product = products.id
        ";
        $result = $pdo->prepare($query);
        $result->execute();
        $counter = 0;
        

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // product_name, product_image, category, id
                if ( $id == $row['author'] ) {
                    if ($counter % 4 == 0) {
                        $output .= "<div class='recipesContainer'>";
                    }
        
                    $output .= "
                        <div class='recipeContainer' data-name=".$row['id'].">
                            <div class='recipeImage' style='background-image: url({$row['image']});'></div>
                            <div class='recipeName'>
                                <h1>{$row['product_name']}</h1>
                                <div class='recipeRatingContainer'>
                                    <div class='starsContainer'>
                                        <!-- Repeat 5 empty stars -->
                                        <symbol id='icon-star-empty'>
                                            <svg viewBox='0 0 24 24' width='16px' height='16px' fill='rgba(0,0,0,.65)' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M22 9.24L14.81 8.62L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27L18.18 21L16.55 13.97L22 9.24ZM12 15.4L8.24 17.67L9.24 13.39L5.92 10.51L10.3 10.13L12 6.1L13.71 10.14L18.09 10.52L14.77 13.4L15.77 17.68L12 15.4Z'/></svg> 
                                        </symbol>
                                        <symbol id='icon-star-empty'>
                                            <svg viewBox='0 0 24 24' width='16px' height='16px' fill='rgba(0,0,0,.65)' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M22 9.24L14.81 8.62L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27L18.18 21L16.55 13.97L22 9.24ZM12 15.4L8.24 17.67L9.24 13.39L5.92 10.51L10.3 10.13L12 6.1L13.71 10.14L18.09 10.52L14.77 13.4L15.77 17.68L12 15.4Z'/></svg> 
                                        </symbol>
                                        <symbol id='icon-star-empty'>
                                            <svg viewBox='0 0 24 24' width='16px' height='16px' fill='rgba(0,0,0,.65)' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M22 9.24L14.81 8.62L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27L18.18 21L16.55 13.97L22 9.24ZM12 15.4L8.24 17.67L9.24 13.39L5.92 10.51L10.3 10.13L12 6.1L13.71 10.14L18.09 10.52L14.77 13.4L15.77 17.68L12 15.4Z'/></svg> 
                                        </symbol>
                                        <symbol id='icon-star-empty'>
                                            <svg viewBox='0 0 24 24' width='16px' height='16px' fill='rgba(0,0,0,.65)' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M22 9.24L14.81 8.62L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27L18.18 21L16.55 13.97L22 9.24ZM12 15.4L8.24 17.67L9.24 13.39L5.92 10.51L10.3 10.13L12 6.1L13.71 10.14L18.09 10.52L14.77 13.4L15.77 17.68L12 15.4Z'/></svg> 
                                        </symbol>
                                        <symbol id='icon-star-empty'>
                                            <svg viewBox='0 0 24 24' width='16px' height='16px' fill='rgba(0,0,0,.65)' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M22 9.24L14.81 8.62L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27L18.18 21L16.55 13.97L22 9.24ZM12 15.4L8.24 17.67L9.24 13.39L5.92 10.51L10.3 10.13L12 6.1L13.71 10.14L18.09 10.52L14.77 13.4L15.77 17.68L12 15.4Z'/></svg> 
                                        </symbol>
                                    </div>
                                    <p class='ratingsCount'>0 Ratings</p>
                                </div>
                            </div>
                        </div>
                    ";
            
                    $counter++;

                }
        
                if ($counter % 4 == 0) {
                    $output .= "</div>";
                }
            
        }
    
        if ($counter % 4 != 0) {
            $output .= "</div>";
        }
        
        echo json_encode(['success' => true, 'content' => $output, 'id' => $id]);
        break;

        case 'fetchRecipes':
            $id = $_GET['id'];
            $output = "";
            $query = "
            SELECT 
                products.product_name,
                products.category,
                products.id,
                images.image
            FROM 
                products
            LEFT JOIN images 
                ON images.related_product = products.id
            ";
            $result = $pdo->prepare($query);
            $result->execute();
            $counter = 0;
            

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // product_name, product_image, category, id

                    if ( $id == $row['category'] ) {

                        if ($counter % 4 == 0) {
                            $output .= "<div class='recipesContainer'>";
                        }
            
                        $output .= "
                            <div class='recipeContainer' data-name=".$row['id'].">
                                <div class='recipeImage' style='background-image: url({$row['image']});'></div>
                                <div class='recipeName'>
                                    <h1>{$row['product_name']}</h1>
                                    <div class='recipeRatingContainer'>
                                        <div class='starsContainer'>
                                            <!-- Repeat 5 empty stars -->
                                            <symbol id='icon-star-empty'>
                                                <svg viewBox='0 0 24 24' width='16px' height='16px' fill='rgba(0,0,0,.65)' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M22 9.24L14.81 8.62L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27L18.18 21L16.55 13.97L22 9.24ZM12 15.4L8.24 17.67L9.24 13.39L5.92 10.51L10.3 10.13L12 6.1L13.71 10.14L18.09 10.52L14.77 13.4L15.77 17.68L12 15.4Z'/></svg> 
                                            </symbol>
                                            <symbol id='icon-star-empty'>
                                                <svg viewBox='0 0 24 24' width='16px' height='16px' fill='rgba(0,0,0,.65)' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M22 9.24L14.81 8.62L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27L18.18 21L16.55 13.97L22 9.24ZM12 15.4L8.24 17.67L9.24 13.39L5.92 10.51L10.3 10.13L12 6.1L13.71 10.14L18.09 10.52L14.77 13.4L15.77 17.68L12 15.4Z'/></svg> 
                                            </symbol>
                                            <symbol id='icon-star-empty'>
                                                <svg viewBox='0 0 24 24' width='16px' height='16px' fill='rgba(0,0,0,.65)' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M22 9.24L14.81 8.62L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27L18.18 21L16.55 13.97L22 9.24ZM12 15.4L8.24 17.67L9.24 13.39L5.92 10.51L10.3 10.13L12 6.1L13.71 10.14L18.09 10.52L14.77 13.4L15.77 17.68L12 15.4Z'/></svg> 
                                            </symbol>
                                            <symbol id='icon-star-empty'>
                                                <svg viewBox='0 0 24 24' width='16px' height='16px' fill='rgba(0,0,0,.65)' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M22 9.24L14.81 8.62L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27L18.18 21L16.55 13.97L22 9.24ZM12 15.4L8.24 17.67L9.24 13.39L5.92 10.51L10.3 10.13L12 6.1L13.71 10.14L18.09 10.52L14.77 13.4L15.77 17.68L12 15.4Z'/></svg> 
                                            </symbol>
                                            <symbol id='icon-star-empty'>
                                                <svg viewBox='0 0 24 24' width='16px' height='16px' fill='rgba(0,0,0,.65)' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M22 9.24L14.81 8.62L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27L18.18 21L16.55 13.97L22 9.24ZM12 15.4L8.24 17.67L9.24 13.39L5.92 10.51L10.3 10.13L12 6.1L13.71 10.14L18.09 10.52L14.77 13.4L15.77 17.68L12 15.4Z'/></svg> 
                                            </symbol>
                                        </div>
                                        <p class='ratingsCount'>0 Ratings</p>
                                    </div>
                                </div>
                            </div>
                        ";
                
                        $counter++;

                    }
            
                    if ($counter % 4 == 0) {
                        $output .= "</div>";
                    }
                
            }
        
            if ($counter % 4 != 0) {
                $output .= "</div>";
            }
            
            echo json_encode(['success' => true, 'content' => $output, 'id' => $id]);
            break;

            case 'populateRecipe':
            session_start(); 
            $sql = "SELECT product_review_comments.id 
            FROM product_review_comments WHERE product_review_comments.product_id = :product_id
            ORDER BY product_review_comments.created_at ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':product_id' => $_GET['product_id']]);
            $usersCommented = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // $response["comment_id"] = $usersCommented;
            //CHECKS IF LOGGED IN AND IF THE USER HAS COMMENTED 
            $alreadyCommented = false;
            if (isset($_SESSION['id'])) {
            $user = new User($pdo);
            $userInfo = $user->fetchUser($_SESSION["id"]);
            $profile_url = $userInfo['image'] ?? "../assets/images/img_avatar.png";
            $response["profile_picture_url"] = $profile_url;
            $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM product_review_comments WHERE product_id = :product_id AND authored_by = :user_id");
            $checkStmt->execute([':product_id' => $_GET['product_id'], ':user_id' => $_SESSION['id']]);
            $alreadyCommented = $checkStmt->fetchColumn() > 0;

            $response["checkLoggedIn"] = true;
            } else {
            $response["checkLoggedIn"] = false;
            }
            $response["alreadyCommented"] = $alreadyCommented;

            //RETRIEVES ALL RECIPE INFO
            $recipe = new Recipe($pdo);
            $product_id = $_GET['product_id'];
            $recipeInfo = $recipe->fetchAllRecipeDetails($product_id);
            $ratingsInfo = $recipe->fetchRecipeRating($product_id);
            $response = [
                "recipeInfo" => $recipeInfo[0],
                "ratingsInfo" => $ratingsInfo,
                "comment_id" => $usersCommented
            ];
            echo json_encode($response);
            break;

            case 'fetchMyComment':
                $comment_id = $_GET['comment_id'];
                $sql = "SELECT product_review_comments.comment, product_votes.rating
                       FROM product_review_comments 
                       LEFT JOIN product_votes ON product_review_comments.id = product_votes.comment_ID
                       WHERE product_review_comments.id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([":id" => $comment_id]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if(isset($result)) {
                    $response = [
                        'success' => "Comment to be edited fetched successfully!",
                        'comment' => $result['comment'],
                        'rating'  => $result['rating']];
                } else {
                    $response["error"] = "Failed to fetch comment to be edited";
                }
                echo json_encode($response);
                break;

            case 'fetchComment':
                session_start();
                $comment_id = $_GET['comment_id'];
                
                $sql = "SELECT
                            users.id,
                            users.first_name, 
                            users.last_name, 
                            images.image,
                            product_review_comments.comment,
                            product_review_comments.created_at,
                            product_votes.rating
                        FROM product_review_comments
                        LEFT JOIN users ON product_review_comments.authored_by = users.id 
                        LEFT JOIN product_votes ON product_review_comments.id = product_votes.comment_id 
                        LEFT JOIN images ON users.id = images.related_user
                        WHERE product_review_comments.id = :comment_id";
            
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':comment_id' => $comment_id]);
            
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
                if ($result) {
                    $first_name = $result['first_name'];
                    $last_name = $result['last_name'];
                    $image = $result['image'] ?? '../assets/images/img_avatar.png';
                    $comment = $result['comment'];
                    $created_at = $result['created_at'];
                    $rating = $result['rating'] ?? 0;
            
                    $ratingOutput = '<div class="otherUserRatingContainer">';
                    for ($i = 0; $i < 5; $i++) {
                        $ratingOutput .= '<span class="star otherUserRating">' . ($i < $rating ? '&#9733;' : '&#9734;') . '</span>';
                    }
                    $ratingOutput .= '</div>';
            
                    $editDelete = '';
                    if (isset($_SESSION['id']) && $_SESSION['id'] == $result['id']) {
                        $editDelete = '<div class="edit-delete-container" style=""><p id="editBtn">Edit</p><p id="deleteBtn">Delete</p></div>';
                    }
            
                    $output = '
                    <div class="other-comment" data-comment-id='.$comment_id.'>
                        <div class="img-container">
                            <img class="img" src="' . htmlspecialchars($image) . '">
                        </div>
                        <div class="comment-details">
                            <div class="comment-container">
                                <p class="comment-username">' . htmlspecialchars($first_name . ' ' . $last_name) . '</p>' 
                                . $ratingOutput . 
                            '</div>
                            <p class="comment">' . htmlspecialchars($comment) . '</p>
                        </div>
                        <div class="timestamp-edit-delete-container">
                            <p class="time-posted">' . htmlspecialchars($created_at) . '</p>'
                            . $editDelete .
                        '</div>
                    <hr>
                    </div>';
                } else {
                    $output = "<p>Comment not found.</p>";
                }
                $response['success'] = 'Comment Fetched Successfully!';
                $response['output'] = $output;
                echo json_encode($response);
                break;
            

        case 'fetchRecipesAdmin': 
            $filterName = $_GET['filterName'] ?? null; 
            $filterCategory = $_GET['filterCategory'] ?? null; 
            $filterUser = $_GET['filterUser'] ?? null;  // New filter for user (author's name)
        
            $params = [];
            $conditions = [];
        
            $query = "
                SELECT 
                    products.product_name,
                    products.category,
                    products.id,
                    images.image,
                    CONCAT(users.first_name, ' ', users.last_name) AS author_name
                FROM 
                    products
                LEFT JOIN images 
                    ON images.related_product = products.id 
                LEFT JOIN users 
                    ON users.id = products.author
            ";
        
            // Add conditions dynamically
            if (!empty($filterCategory)) {
                $conditions[] = "products.category = :category";
                $params[':category'] = $filterCategory;
            }
        
            if (!empty($filterName)) {
                $conditions[] = "products.product_name LIKE :name";
                $params[':name'] = "%$filterName%";
            }
        
            if (!empty($filterUser)) {
                // Filter by author's name (first_name + last_name)
                $conditions[] = "CONCAT(users.first_name, ' ', users.last_name) LIKE :author_name";
                $params[':author_name'] = "%$filterUser%";  // Search for full name match
            }
        
            if (!empty($conditions)) {
                $query .= " WHERE " . implode(" AND ", $conditions);
            }
        
            $result = $pdo->prepare($query);
            $result->execute($params);
        
            $output = "";
            $counter = 0;
        
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        
                if ($counter % 4 == 0) {
                    $output .= "<div class='recipesContainer'>";
                }
        
                $output .= "
                    <div class='recipeContainer' data-name='{$row['id']}'>
                        <div class='recipeTop'>
                            <img src='' alt='' class='recipeBackground' style='background-image: url({$row['image']});'>
                            <div class='recipeContent'>
                                <h1>{$row['product_name']}</h1>
                            </div>
                        </div>
                        <div class='recipeBottom'>
                            <p class='categoryName'>" . strtoupper($row['category']) . "</p>
                            <p class='authorName'>{$row['author_name']}</p>  <!-- Now showing the combined author name -->
                            <div class='btnContainer'>
                                <div class='recipeBtn delete'>
                                    <img src='' alt='' class='trash'>
                                </div>
                                <div class='recipeBtn-update'>
                                    <img src='' alt='' class='edit'>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
        
                $counter++;
        
                if ($counter % 4 == 0) {
                    $output .= "</div>";
                }
            }
        
            if ($counter % 4 != 0) {
                $output .= "</div>";
            }
        
            echo json_encode(['success' => true, 'content' => $output]);
            break;
            
            case 'fetchMyRecipes':
                session_start();
                $userId = $_SESSION['id'] ?? null;
            
                if (!$userId) {
                    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
                    break;
                }
            
                $query = "
                    SELECT 
                        products.product_name,
                        products.category,
                        products.id,
                        images.image,
                        CONCAT(users.first_name, ' ', users.last_name) AS author_name
                    FROM 
                        products
                    LEFT JOIN images 
                        ON images.related_product = products.id 
                    LEFT JOIN users 
                        ON users.id = products.author
                    WHERE 
                        products.author = :author
                ";
            
                $result = $pdo->prepare($query);
                $result->execute([':author' => $userId]);
            
                $output = "";
                $counter = 0;
            
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    if ($counter % 4 == 0) {
                        $output .= "<div class='recipesContainer'>";
                    }
            
                    $output .= " 
                        <div class='recipeContainer' data-name='{$row['id']}'>
                            <div class='recipeTop'>
                                <img src='' alt='' class='recipeBackground' style='background-image: url({$row['image']});'>
                                <div class='recipeContent'>
                                    <h1>{$row['product_name']}</h1>
                                </div>
                            </div>
                            <div class='recipeBottom'>
                                <p class='categoryName'>" . strtoupper($row['category']) . "</p>
                                <p class='authorName'>{$row['author_name']}</p>
                                <div class='btnContainer'>
                                    <div class='recipeBtn delete'>
                                        <img src='' alt='' class='trash'>
                                    </div>
                                    <div class='recipeBtn-update'>
                                        <img src='' alt='' class='edit'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
            
                    $counter++;
                    if ($counter % 4 == 0) {
                        $output .= "</div>";
                    }
                }
                $output .= "<div class='addRecipe'>+</div>";
                if ($counter % 4 != 0) {
                    $output .= "</div>";
                }
                echo json_encode(['success' => true, 'content' => $output]);
                break;
            
        
        case 'fetchRecipe':

            $id = $_GET['id'];
            $recipe = new Recipe($pdo);
            $output = $recipe->fetchRecipe($id);

            echo json_encode(['success' => true, 'content' => $output]);
            break;

        case 'fetchUsersAdmin':
            $filterName = $_GET['filterName'] ?? null; 
            $filterRole = $_GET['filterRole'] ?? null; 
        
            $params = [];
            $conditions = [];
        
            $query = "
                SELECT 
                    users.id,
                    users.first_name,
                    users.last_name,
                    images.image,
                    roles.name AS role_name
                FROM 
                    users
                LEFT JOIN images
                    ON images.related_user = users.id
                LEFT JOIN roles
                    ON users.role = roles.id
            ";

            if (!empty($filterName)) {
                $conditions[] = "CONCAT(users.first_name, ' ', users.last_name) LIKE :filterName";
                $params[':filterName'] = '%' . $filterName . '%';
            }

            if (!empty($filterRole)) {
                $conditions[] = "users.role = :filterRole";
                $params[':filterRole'] = $filterRole;
            }

            if (!empty($conditions)) {
                $query .= " WHERE " . implode(" AND ", $conditions);
            }
        
            $result = $pdo->prepare($query);
            $result->execute($params);
        
            $output = "";
            $counter = 0;
        
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        
                if ($counter % 5 == 0) {
                    $output .= "<div class='usersContainer'>";
                }
        
                $output .= "

                    <div class='userContainer' data-name='{$row['id']}'>
                            <div class='userTop'>
                                <img src='' alt='' class='userBackground' style='background-image: url({$row['image']});'>
                                <div class='userContent'>
                                    <h1></h1>
                                </div>
                            </div>
                            <div class='userBottom'>
                                <p class='categoryName'>" . strtoupper($row['role_name']) . "</p>
                                <p class='authorName'>{$row['first_name']} {$row['last_name']}</p>  
                                <div class='btnContainer'>
                                    <div class='userBtn delete'>
                                        <img src='' alt='' class='trash'>
                                    </div>
                                    <div class='userBtn update'>
                                        <img src='' alt='' class='edit'>
                                    </div>
                                </div>
                            </div>
                        </div>
                ";
        
                $counter++;
        
                if ($counter % 5 == 0) {
                    $output .= "</div>";
                }
            }
        
            if ($counter % 5 != 0) {
                $output .= "</div>";
            }
        
            echo json_encode(['success' => true, 'content' => $output]);
            break;


        case 'fetchUser':

            $id = $_GET['id'];
            $user = new User($pdo);

            $output = $user->fetchUser($id);

            echo json_encode(['success' => true, 'content' => $output]);
            break;

        case 'fetchUserViaAdmin':

            $id = $_GET['id'];
            $user = new User($pdo);

            $output = $user->fetchUserViaAdmin($id);

            echo json_encode(['success' => true, 'content' => $output]);
            break;

        case 'fetchLogs':

            $filterName = $_GET['filterName'] ?? null; 
            $filterRole = $_GET['filterRole'] ?? null; 
            $filterStartDate = $_GET['filterStartDate'] ?? null;
            $filterStartTime = $_GET['filterStartTime'] ?? null;
            $filterEndDate = $_GET['filterEndDate'] ?? null;
            $filterEndTime = $_GET['filterEndTime'] ?? null;
        
            $params = [];
            $conditions = [];
        
            $query = "
                SELECT 
                    activity_logs.id,
                    activity_logs.activity,
                    activity_logs.activity_by,
                    activity_logs.created_at,
                    users.role,
                    users.first_name,
                    users.last_name
                FROM 
                    activity_logs
                LEFT JOIN users
                    ON activity_logs.activity_by = users.id
            ";

            if (!empty($filterName)) {
                $conditions[] = "CONCAT(users.first_name, ' ', users.last_name) LIKE :filterName";
                $params[':filterName'] = '%' . $filterName . '%';
            }

            if (!empty($filterRole)) {
                $conditions[] = "users.role = :filterRole";
                $params[':filterRole'] = $filterRole;
            }

            if (!empty($filterStartDate)) {
                $conditions[] = "DATE(activity_logs.created_at) >= :startDate";
                $params[':startDate'] = $filterStartDate;
            }
            
            if (!empty($filterStartTime)) {
                $conditions[] = "TIME(activity_logs.created_at) >= :startTime";
                $params[':startTime'] = $filterStartTime;
            }
            
            if (!empty($filterEndDate)) {
                $conditions[] = "DATE(activity_logs.created_at) <= :endDate";
                $params[':endDate'] = $filterEndDate;
            }
            
            if (!empty($filterEndTime)) {
                $conditions[] = "TIME(activity_logs.created_at) <= :endTime";
                $params[':endTime'] = $filterEndTime;
            }

            if (!empty($conditions)) {
                $query .= " WHERE " . implode(" AND ", $conditions);
            }

            $query .= " ORDER BY activity_logs.created_at DESC";
        
            $result = $pdo->prepare($query);
            $result->execute($params);
        
            $output = "";
        
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        
                $output .= "

                    <div class='logContainer'>
                        <p class='logTime'>{$row['created_at']}</p>
                        <p class='logInformation'><b style='color: black;'>{$row['first_name']} {$row['last_name']} (ID: {$row['activity_by']})</b>  {$row['activity']}.</p>
                    </div>
                ";
                
            }

            echo json_encode(['success' => true, 'content' => $output]);
            break;

    
        // case 'fetchComment':

        //     $id = $_GET['id'];

        //     $sql = "
        //             SELECT 
        //                 prc.id,
        //                 prc.comment, 
        //                 prc.created_at, 
        //                 prc.positive,
        //                 prc.negative,
        //                 prc.neutral,
        //                 prc.sentiment,
        //                 u.first_name, 
        //                 u.last_name,
        //                 p.product_name
        //             FROM 
        //                 product_review_comments_test prc
        //             LEFT JOIN 
        //                 users u ON prc.authored_by = u.id
        //             LEFT JOIN
        //                 products p ON prc.product_id = p.id
        //             WHERE
        //                 prc.id = :id
        //             LIMIT 1;
        //         ";
        //     $stmt = $pdo->prepare($sql);
        //     $stmt->execute([':id' => $id]);
        //     $output = $stmt->fetch(PDO::FETCH_ASSOC);

        //     echo json_encode(['success' => true, 'content' => $output]);
        //     break;
        
        // case 'fetchComments':

        //     $filterName = $_GET['filterName'] ?? null; 
        //     $filterRecipe = $_GET['filterRecipe'] ?? null; 
        //     $filterRating = $_GET['filterRating'] ?? null;
        //     $filterSentiment = $_GET['filterSentiment'] ?? null;  
        //     $filterStartDate = $_GET['filterStartDate'] ?? null;
        //     $filterStartTime = $_GET['filterStartTime'] ?? null;
        //     $filterEndDate = $_GET['filterEndDate'] ?? null;
        //     $filterEndTime = $_GET['filterEndTime'] ?? null;

        //     $params = [];
        //     $conditions = [];

        //     $query = "
        //         SELECT 
        //             prc.id,
        //             prc.comment, 
        //             prc.created_at, 
        //             prc.positive,
        //             prc.negative,
        //             prc.neutral,
        //             prc.sentiment,
        //             prc.created_at,
        //             u.first_name, 
        //             u.last_name,
        //             p.product_name
        //         FROM 
        //             product_review_comments_test prc
        //         LEFT JOIN 
        //             users u ON prc.authored_by = u.id
        //         LEFT JOIN
        //             products p ON prc.product_id = p.id
        //     ";

        //     if (!empty($filterName)) {
        //         $conditions[] = "CONCAT(u.first_name, ' ', u.last_name) LIKE :filterName";
        //         $params[':filterName'] = '%' . $filterName . '%';
        //     }

        //     if (!empty($filterRecipe)) {
        //         $conditions[] = "p.product_name LIKE :filterRecipe";
        //         $params[':filterRecipe'] = '%' . $filterRecipe . '%';
        //     }

        //     if (!empty($filterSentiment)) {
        //         $conditions[] = "prc.sentiment = :filterSentiment";
        //         $params[':filterSentiment'] = $filterSentiment;
        //     }

        //     if (!empty($filterStartDate)) {
        //         $conditions[] = "DATE(prc.created_at) >= :startDate";
        //         $params[':startDate'] = $filterStartDate;
        //     }
            
        //     if (!empty($filterStartTime)) {
        //         $conditions[] = "TIME(prc.created_at) >= :startTime";
        //         $params[':startTime'] = $filterStartTime;
        //     }
            
        //     if (!empty($filterEndDate)) {
        //         $conditions[] = "DATE(prc.created_at) <= :endDate";
        //         $params[':endDate'] = $filterEndDate;
        //     }
            
        //     if (!empty($filterEndTime)) {
        //         $conditions[] = "TIME(prc.created_at) <= :endTime";
        //         $params[':endTime'] = $filterEndTime;
        //     }

        //     if (!empty($conditions)) {
        //         $query .= " WHERE " . implode(" AND ", $conditions);
        //     }

        //     $query .= " ORDER BY prc.created_at DESC";
        
        //     $result = $pdo->prepare($query);
        //     $result->execute($params);
        
        //     $output = "";
        
        //     while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        
        //         $output .= "

        //             <div class='reviewContainer' data-name='{$row['id']}>
        //                 <p class='reviewTime'>{$row['created_at']}</p>
        //                 <p class='reviewInformation'>
        //                     {$row['comment']}   
        //                 </p>

        //                 <p class='reviewAuthor'>{$row['first_name']} {$row['last_name']}</p>

        //                 <p class='reviewResults'>
        //                     <span>Positive: {$row['positive']}</span>
        //                     <span>Neutral: {$row['neutral']}</span>
        //                     <span>Negative: {$row['negative']}</span>
        //                 </p>
        //             </div>
        //         ";
                
        //     }

        //     echo json_encode(['success' => true, 'content' => $output]);
        //     break;

        default:
            # code...
            break;
    }

?>