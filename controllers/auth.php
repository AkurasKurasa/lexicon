<?php
    session_start(); // REQUIRED!

    require_once '../config.php';        
    require_once '../models/User.php';
    require_once '../models/Log.php';

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

                $log->addLog($logInfo);
    
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
                    
                    $session = $user->verifyUser($email, $password);

                    $_SESSION['id'] = $session['id'];
                    $_SESSION['first_name'] = $session['first_name'];
                    $_SESSION['last_name'] = $session['last_name'];
                    $_SESSION['role'] = $session['role'];
                    $_SESSION['email'] = $session['email'];
                    $_SESSION['password'] = $session['password'];

                    $log = new Log($pdo);

                    $logInfo = [
                        'id' => $_SESSION['id'],
                        'action'=> 'logged in' 
                    ];

                $log->addLog($logInfo);
    
                    echo json_encode(['success' => true, 'message' => "Login works fine homie", 'session' => $session]);
                } else {
                    echo json_encode([ 'success' => false, 'errors' => $errors ]);
                }

            } else {

                echo json_encode(['success' => false]);
            }
            break;

        case 'logout':
            session_destroy();

            echo json_encode(['success' => true]);
            break;
    
        default:
            echo json_encode(['success' => false]);
            break;
    }
?>