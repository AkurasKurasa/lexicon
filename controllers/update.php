<?php
    include('../config.php');
    require_once '../models/Recipe.php';
    require_once '../models/User.php';

    $type = $_POST['type'];

    switch ($type) {

        case 'updateRecipeByUser':

            echo json_encode(['success' => true, 'content' => $output, 'id' => $id]);
            break;

        case 'updateRecipeByAdmin':

            $recipe = new Recipe($pdo);

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

            if ( strlen($recipeName) > 0 && strlen($recipeDescription) > 0 && strlen($recipeCategory) > 0 ) {
                $recipe->update($recipeId, $recipeInfo);
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
            break;

        case 'updateUserByAdmin':
            $user = new User($pdo);

            $userId = $_POST['id'];
            $userFirstName = $_POST['firstName'];
            $userLastName = $_POST['lastName'];
            $userRole = $_POST['role'];
            $userEmail = $_POST['email'];
            $userPassword = $_POST['password'];
            $userGender = $_POST['gender'];
            $userImage = $_POST['image'];

            $userInfo = [
                'id'         => $userId,
                'first_name' => $userFirstName,
                'last_name'  => $userLastName,
                'gender'     => $userGender,
                'email'      => $userEmail,
                'password'   => $userPassword,
                'role'       => $userRole,
                'image'      => $userImage
            ];

            if ( strlen($userFirstName) > 0 && strlen($userLastName) > 0 && strlen($userGender) > 0 && strlen($userEmail) > 0 && strlen($userPassword) > 0 && strlen($userRole) > 0 ) {
                $user->update($userId, $userInfo);
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
            break;


        default:

            echo json_encode(['success' => true, 'content' => $output, 'id' => $id]);
            break;
    }

?>