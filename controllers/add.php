<?php
    include('../config.php');
    require_once '../models/Recipe.php';
    require_once '../models/User.php';

    $type = $_POST['type'];

    switch ($type) {

        case 'addRecipeByUser':

            $recipe = new Recipe($pdo);
            $errors = [];

            $recipeId = uniqid("recipe_");
            $recipeName = $_POST['name'];
            $recipeDescription = $_POST['description'];
            $recipeCategory = $_POST['category'] ?? NULL;
            $recipeIngredients = $_POST['ingredients'];
            $recipeProcedure = $_POST['procedure'];
            $recipeImage = $_POST['image'];
            $recipePrepTime = $_POST['prepTime'];
            $recipeCookingTime = $_POST['cookingTime'];
            $recipeAdditionalTime = $_POST['additionalTime'];
            $recipeBudget = $_POST['budget'];
            session_start();
            $author = $_SESSION['id'];
            if (empty($recipeId) || empty($recipeName) || empty($recipeDescription) || empty($recipeCategory) ||
            empty($recipeIngredients) || empty($recipeProcedure) || empty($recipeImage) || 
            empty($recipePrepTime) || empty($recipeCookingTime) || empty($recipeAdditionalTime) || empty($recipeBudget)) {
            $errors[] = "Please enter all necessary fields!";
        }   

            $ingredientsArray = explode("\n", $recipeIngredients); 
            if (count($ingredientsArray) < 3) {
                $errors[] = "Please enter at least 3 ingredients!";
            }

            $procedureSteps = explode("\n", $recipeProcedure);
            if (count($procedureSteps) < 3) {
                $errors[] = "Please enter at least 3 procedure steps!";
            }

            if (strlen($recipeDescription) < 300) {
                $errors[] = "The description must be at least 300 characters long!";
            }

            if (empty($errors)) {
                $recipeInfo = [
                    'id'               => $recipeId,
                    'name'             => $recipeName,
                    'description'      => $recipeDescription,
                    'category'         => $recipeCategory,
                    'ingredients'      => $recipeIngredients,
                    'procedure'        => $recipeProcedure,
                    'image'            => $recipeImage,
                    'prep_time'        => $recipePrepTime,
                    'cooking_time'     => $recipeCookingTime,
                    'additional_time'  => $recipeAdditionalTime,
                    'budget'           => $recipeBudget,
                    'author'           => $author
                ];
                $recipe->create($recipeInfo);
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'errors' => $errors]);
            }
            break;

        case 'addRecipeByAdmin':

            $recipe = new Recipe($pdo);
            $errors = [];

            $recipeId = $_POST['id'];
            $recipeName = $_POST['name'];
            $recipeDescription = $_POST['description'];
            $recipeCategory = $_POST['category'];
            $recipeIngredients = $_POST['ingredients'];
            $recipeProcedure = $_POST['procedure'];
            $recipeImage = $_POST['image'];
            $recipePrepTime = $_POST['prepTime'];
            $recipeCookingTime = $_POST['cookingTime'];
            $recipeAdditionalTime = $_POST['additionalTime'];
            $recipeBudget = $_POST['budget'];

            if (empty($recipeId) || empty($recipeName) || empty($recipeDescription) || empty($recipeCategory) ||
            empty($recipeIngredients) || empty($recipeProcedure) || empty($recipeImage) || 
            empty($recipePrepTime) || empty($recipeCookingTime) || empty($recipeAdditionalTime) || empty($recipeBudget)) {
            $errors[] .= "Please enter all necessary fields!";
        }   

            $ingredientsArray = explode(",", $recipeIngredients); 
            if (count($ingredientsArray) < 3) {
                $errors[] .= "Please enter at least 3 ingredients!";
            }

            $procedureSteps = explode(",", $recipeProcedure);
            if (count($procedureSteps) < 3) {
                $errors[] .= "Please enter at least 3 procedure steps!";
            }

            if (strlen($recipeDescription) < 300) {
                $errors[] .= "The description must be at least 300 characters long!";
            }

            if (empty($errors)) {
                $recipeInfo = [
                    'id'               => $recipeId,
                    'name'             => $recipeName,
                    'description'      => $recipeDescription,
                    'category'         => $recipeCategory,
                    'ingredients'      => $recipeIngredients,
                    'procedure'        => $recipeProcedure,
                    'image'            => $recipeImage,
                    'prep_time'        => $recipePrepTime,
                    'cooking_time'     => $recipeCookingTime,
                    'additional_time'  => $recipeAdditionalTime,
                    'budget'           => $recipeBudget
                ];
                $recipe->create($recipeInfo);
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'errors' => $errors]);
            }
            break;

        case 'addUserByAdmin':
            $user = new User($pdo);

            $id = $_POST['id'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $password = $_POST['password'];
            $image = $_POST['image'];

            $userInfo = [
                'id'         => $id,
                'first_name' => $firstName,
                'last_name'  => $lastName,
                'gender'     => $gender,
                'email'      => $email,
                'password'   => $password,
                'role'       => $role,
                'image'      => $image
            ];

            $user->create($userInfo);

            echo json_encode(['success' => true]);
            break;

            case 'addComment':
                session_start();
                if (isset($_POST['starsGiven'], $_POST['userComment'], $_POST['product_id']) && isset($_SESSION['id'])) {
                    $starsGiven = filter_var($_POST['starsGiven'], FILTER_SANITIZE_NUMBER_INT);
                    $userComment = filter_var($_POST['userComment'], FILTER_SANITIZE_STRING);
                    $product_id = $_POST['product_id'];
                    $author = $_SESSION['id'];
                    date_default_timezone_set('Asia/Manila');
                    $currentTimestamp = date('Y-m-d H:i:s');
            
                    $sql = "INSERT INTO product_review_comments (comment, product_id, authored_by, created_at)
                            VALUES (:comment, :product_id, :authored_by, :created_at)
                            ON DUPLICATE KEY UPDATE 
                            comment = VALUES(comment), 
                            created_at = VALUES(created_at)";
                    $stmt = $pdo->prepare($sql);
                    $success = $stmt->execute([
                        ':comment' => $userComment,
                        ':product_id' => $product_id,
                        ':authored_by' => $author,
                        ':created_at' => $currentTimestamp
                    ]);
            
                    if ($success) {
                        $commentId = $pdo->lastInsertId();
                        if ($commentId == 0) {
                            $stmt = $pdo->prepare("SELECT id FROM product_review_comments WHERE authored_by = :author AND product_id = :product_id");
                            $stmt->execute([':author' => $author, ':product_id' => $product_id]);
                            $commentId = $stmt->fetchColumn();
                        }
            
                        $sql = "INSERT INTO product_votes (comment_id, rating)
                                VALUES (:comment_id, :rating)
                                ON DUPLICATE KEY UPDATE rating = VALUES(rating)";
                        $stmt = $pdo->prepare($sql);
                        if ($stmt->execute([
                            ':comment_id' => $commentId,
                            ':rating' => $starsGiven
                        ])) {
                            $response = [
                                'success' => 'CommentID Fetched Successfully',
                                'comment_id' => $commentId
                            ];
                        } else {
                            $response["error"] = "Comment error!";
                        }
                    } else {
                        $response["error"] = "Comment error!";
                    }
            
                    echo json_encode($response);
                }
                break;            
        default:
            echo json_encode(['success' => true, 'content' => $output, 'id' => $id]);
            break;
        
    }

?>