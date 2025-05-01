<?php
    include('../config.php');
    require_once '../models/Recipe.php';

    $type = $_GET['type'];

    switch ($type) {

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
                ON images.related_id = products.id 
                AND images.related_type = 'product';

            ";
            $result = $pdo->prepare($query);
            $result->execute();
            $counter = 0;
            

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                // product_name, product_image, category, id
            
                    if ($counter % 4 == 0) {
                        $output .= "<div class='recipesContainer'>";
                    }

                    if ( $id == $row['category'] ) {
            
                        $output .= "
                            <div class='recipeContainer' data-name='{$row['id']}'>
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
                    ON images.related_id = products.id 
                    AND images.related_type = 'product'
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
                                <div class='btn delete'>
                                    <img src='' alt='' class='trash'>
                                </div>
                                <div class='btn edit'>
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

        
        case 'fetchRecipe':

            $id = $_GET['id'];
            $recipe = new Recipe($pdo);

            $output = $recipe->fetchRecipe($id);

            echo json_encode(['success' => true, 'content' => $output]);
            break;

        case 'fetchComments':
            break;
        
        default:
            # code...
            break;
    }

?>