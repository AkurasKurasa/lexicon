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


        case 'deleteComment':
            $comment_id = $_POST['comment_id'];
            
           if(isset($comment_id)) {
                $query = 'DELETE FROM product_review_comments WHERE id = :comment_id';
                $result = $pdo->prepare($query);
                $result->execute([':comment_id' => $comment_id]);
                if ($result->rowCount() > 0) {
                    $response["success"] = "Comment Deleted Successfully!";
                } else {
                    $response["error"] = "No comment found to delete!";
                }
            } else {
                $response["error"] = "Comment not Deleted!";
            }
            echo json_encode($response);
            break;
        default:
            echo json_encode(['success' => true, 'content' => $output, 'id' => $id]);
            break;
    }

?>