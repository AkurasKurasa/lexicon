<?php
    session_start(); // REQUIRED!

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
        
                if (empty($email) || empty($password)) {
                    $errors[] = "Fill out all fields!";
                } 
                
                if (!$user->emailExists($email)) {
                    $errors[] = "Email does not exist!";
                } 
                
                // Check user credentials
                $session = $user->verifyUser($email, $password);
                if (!$session) {
                    $errors[] = "Invalid credentials!";
                }
        
                if (empty($errors)) {
                    // User is valid, set session
                    $_SESSION['id'] = $session['id'];
                    $_SESSION['first_name'] = $session['first_name'];
                    $_SESSION['last_name'] = $session['last_name'];
                    $_SESSION['email'] = $session['email'];
                    $_SESSION['password'] = $session['password'];
        
                    echo json_encode(['success' => true, 'message' => "Login successful!", 'session' => $session]);
                } else {
                    echo json_encode(['success' => false, 'errors' => $errors]);
                }
            } else {
                echo json_encode(['success' => false, 'errors' => 'Invalid request.']);
            }
            break;
        
        default:
            echo json_encode(['success' => false, 'errors' => 'Something went wrong.']);
            break;
        
    }
?>