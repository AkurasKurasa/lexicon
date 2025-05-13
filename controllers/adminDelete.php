<?php

    session_start();

    include('../config.php');
    require_once '../models/Recipe.php';
    require_once '../models/User.php';
    require_once '../models/Log.php';

    $type = $_POST['type'];

    switch ($type) {

        case 'deleteRecipeByAdmin':

            $recipe = new Recipe($pdo);

            $id = $_POST['id'];

            $recipeInfo = [
                'id' => $id
            ];

            if ( strlen($id) > 0 ) {
                $recipe->deleteViaAdmin($id);

                $log = new Log($pdo);

                $logInfo = [
                    'id' => $_SESSION['id'],
                    'action'=> 'deleted recipe ' . $id 
                ];

                $log->addLog($logInfo);

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
                $user->deleteViaAdmin($id);

                $log = new Log($pdo);

                $logInfo = [
                    'id' => $_SESSION['id'],
                    'action'=> 'deleted user ' . $id 
                ];

                $log->addLog($logInfo);
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