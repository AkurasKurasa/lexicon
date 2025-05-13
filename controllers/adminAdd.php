<?php

    session_start();

    include('../config.php');
    include('../lexicon.php');
    require_once '../models/Recipe.php';
    require_once '../models/User.php';
    require_once '../models/Log.php';

    $type = $_POST['type'];

    switch ($type) {

        case 'addRecipeByAdmin':

            $recipe = new Recipe($pdo);
            $errors = [];

            $recipeId = uniqid("recipe_");
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
                $recipe->createFromAdmin($recipeInfo);
                
                $log = new Log($pdo);

                $logInfo = [
                    'id' => $_SESSION['id'],
                    'action'=> 'added a recipe named ' . $recipeName  
                ];

                $log->addLog($logInfo);

                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'errors' => $errors]);
            }
            break;

        // case 'addRecipeByAdmin':

        //     $recipe = new Recipe($pdo);
        //     $errors = [];

        //     $recipeId = uniqid("recipe_");
        //     $recipeName = $_POST['name'];
        //     $recipeDescription = $_POST['description'];
        //     $recipeCategory = $_POST['category'];
        //     $recipeIngredients = $_POST['ingredients'];
        //     $recipeProcedure = $_POST['procedure'];
        //     $recipeImage = $_POST['image'];
        //     $recipePrepTime = $_POST['prepTime'];
        //     $recipeCookingTime = $_POST['cookingTime'];
        //     $recipeAdditionalTime = $_POST['additionalTime'];
        //     $recipeBudget = $_POST['budget'];

        //     if (empty($recipeId) || empty($recipeName) || empty($recipeDescription) || empty($recipeCategory) ||
        //     empty($recipeIngredients) || empty($recipeProcedure) || empty($recipeImage) || 
        //     empty($recipePrepTime) || empty($recipeCookingTime) || empty($recipeAdditionalTime) || empty($recipeBudget)) {
        //     $errors[] .= "Please enter all necessary fields!";
        //     }   

        //     $ingredientsArray = explode(",", $recipeIngredients); 
        //     if (count($ingredientsArray) < 3) {
        //         $errors[] .= "Please enter at least 3 ingredients!";
        //     }

        //     $procedureSteps = explode(",", $recipeProcedure);
        //     if (count($procedureSteps) < 3) {
        //         $errors[] .= "Please enter at least 3 procedure steps!";
        //     }

        //     if (strlen($recipeDescription) < 300) {
        //         $errors[] .= "The description must be at least 300 characters long!";
        //     }

        //     if (empty($errors)) {
        //         $recipeInfo = [
        //             'id'               => $recipeId,
        //             'name'             => $recipeName,
        //             'description'      => $recipeDescription,
        //             'category'         => $recipeCategory,
        //             'ingredients'      => $recipeIngredients,
        //             'procedure'        => $recipeProcedure,
        //             'image'            => $recipeImage,
        //             'prep_time'        => $recipePrepTime,
        //             'cooking_time'     => $recipeCookingTime,
        //             'additional_time'  => $recipeAdditionalTime,
        //             'budget'           => $recipeBudget
        //         ];
        //         $recipe->create($recipeInfo);
                
        //         $log = new Log($pdo);

        //         $logInfo = [
        //             'id' => $_SESSION['id'],
        //             'action'=> 'added a recipe named ' . $recipeName  
        //         ];

        //         $log->addLog($logInfo);

        //         echo json_encode(['success' => true]);
        //     } else {
        //         echo json_encode(['success' => false, 'errors' => $errors]);
        //     }
        //     break;

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

            $user->createViaAdmin($userInfo);

            $log = new Log($pdo);

            $logInfo = [
                'id' => $_SESSION['id'],
                'action'=> 'added a user named ' . $firstName . " " . $lastName 
            ];

            $log->addLog($logInfo);

            echo json_encode(['success' => true]);
            break;    

        default:
            echo json_encode(['success' => true, 'content' => $output, 'id' => $id]);
            break;
        
    }

?>