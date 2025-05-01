<?php
    include('../config.php');
    require_once '../models/Recipe.php';

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

            $recipeInfo = [
                'name' => $recipeName,
                'description'  => $recipeDescription,
                'category'     => $recipeCategory
            ];

            if ( strlen($recipeName) > 0 && strlen($recipeDescription) > 0 && strlen($recipeCategory) > 0 ) {
                $recipe->update($recipeId, $recipeInfo);
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