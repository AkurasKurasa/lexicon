<?php

    session_start();

    include('../config.php');
    require_once '../models/Recipe.php';
    require_once '../models/User.php';
    require_once '../models/Log.php';

    $type = $_POST['type'];

    switch ($type) {

        case 'updateRecipeByUser':
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $ingredients = $_POST['ingredients'];
            $procedure = $_POST['procedure'];
            $image = $_POST['image'];
            $prepTime = $_POST['prepTime'];
            $cookingTime = $_POST['cookingTime'];
            $additionalTime = $_POST['additionalTime'];
            $budget = $_POST['budget'];
            
            $sql = "UPDATE product_name, description, category, ingredients, procedures,
                    prep_time, cooking_time, additional_time, budget";
            echo json_encode(['success' => true, 'content' => $output, 'id' => $id]);
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
                $user->updateViaAdmin($userId, $userInfo);

                $log = new Log($pdo);

                $logInfo = [
                    'id' => $_SESSION['id'],
                    'action'=> 'updated user ' . $userId
                ];

                $log->addLog($logInfo);
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

                $log = new Log($pdo);

                $logInfo = [
                    'id' => $_SESSION['id'],
                    'action'=> 'updated user ' . $userId
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
