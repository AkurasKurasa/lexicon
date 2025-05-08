<?php
    include('../config.php');
    require_once '../models/Recipe.php';
    require_once '../models/User.php';

    $type = $_POST['type'];

    switch ($type) {

        case 'deleteRecipeByUser':

            echo json_encode(['success' => true, 'content' => $output, 'id' => $id]);
            break;

        case 'deleteRecipeByAdmin':

            $recipe = new Recipe($pdo);

            $id = $_POST['id'];

            $recipeInfo = [
                'id' => $id
            ];

            if ( strlen($id) > 0 ) {
                $recipe->delete($id);
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
            break;

        case 'deleteUserByAdmin':

            $user = new User($pdo);

            $id = $_POST['id'];

            $userInfo = [
                'id' => $id
            ];

            if ( strlen($id) > 0 ) {
                $user->delete($id);
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