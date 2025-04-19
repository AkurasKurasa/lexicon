<?php
    require_once '../config.php';        
    require_once '../models/User.php';

    $type = $_POST['type'];

    switch ($type) {
    
        case 'signup':
            if (isset($_POST['email'])) {

                $user = new User($pdo);
                
                $errors = [];

                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirmPassword'];

                if ( empty($firstName) || empty($lastName) || empty($gender) || empty($email) || empty($password) || empty($confirmPassword) ) {
                    $errors[] = "Fill all necessary fields";
                }

                if ( $user->emailExists($email) ) {
                    $errors[] = "Email already in use";
                }

                if (
                    !preg_match('/[A-Z]/', $password) || 
                    !preg_match('/\d/', $password) ||   
                    !preg_match('/[\W_]/', $password) 
                ) {
                    $errors[] = "Password must contain at least one uppercase letter, one number, and one special character.";
                }

                if ( $password != $confirmPassword ) {
                    $errors[] = "Passwords do not match";
                }

                if ( empty($errors) ) {
                    $userInfo = [
                        'first_name' => $firstName,
                        'last_name'  => $lastName,
                        'gender'     => $gender,
                        'email'      => $email,
                        'password'   => $password,
                        'role'       => 'User'
                    ];
    
                    $user->create($userInfo);
    
                    echo json_encode(['success' => true, 'message' => "Signup works fine homie"]);
                } else {
                    echo json_encode([ 'success' => false, 'errors' => $errors ]);
                }

            } else {

                echo json_encode(['success' => false]);
            }
            break;
        
        case 'login':
    
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = new User($pdo);

                $errors = [];

                if ( !($user->verifyUser($email, $password)) ) {
                    $errors = "Invalid credentials!";
                }

                if ( !($user->emailExists($email)) ) {
                    $errors = "Email does not exist!";
                }

                if ( empty($email) || empty($password) ) {
                    $errors = "Fill out all fields!";
                }
                
                if ( empty($errors) ) {
    
    
                    echo json_encode(['success' => true, 'message' => "Login works fine homie"]);
                } else {
                    echo json_encode([ 'success' => false, 'errors' => $errors ]);
                }

            } else {

                echo json_encode(['success' => false]);
            }
            break;
    
        default:
            echo json_encode(['success' => false]);
            break;
    }
?>