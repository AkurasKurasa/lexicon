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
        
                $firstName = trim($_POST['firstName']);
                $lastName = trim($_POST['lastName']);
                $gender = $_POST['gender'];
                $email = trim($_POST['email']);
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirmPassword'];
        
                // Security questions
                $securityNickname = trim($_POST['securityNickname']);
                $securityCartoon = trim($_POST['securityCartoon']);
                $securityStreet = trim($_POST['securityStreet']);
                $securitySweet = trim($_POST['securitySweet']);
        
                // Check for empty fields
                if (
                    empty($firstName) || empty($lastName) || empty($gender) ||
                    empty($email) || empty($password) || empty($confirmPassword) ||
                    empty($securityNickname) || empty($securityCartoon) ||
                    empty($securityStreet) || empty($securitySweet)
                ) {
                    $errors[] = "Fill all necessary fields";
                }
        
                if ($user->emailExists($email)) {
                    $errors[] = "Email already in use";
                }
        
                if (
                    !preg_match('/[A-Z]/', $password) || 
                    !preg_match('/\d/', $password) ||   
                    !preg_match('/[\W_]/', $password)
                ) {
                    $errors[] = "Password must contain at least one uppercase letter, one number, and one special character.";
                }
        
                if ($password !== $confirmPassword) {
                    $errors[] = "Passwords do not match";
                }
        
                if (empty($errors)) {
                    $userInfo = [
                        'first_name'         => $firstName,
                        'last_name'          => $lastName,
                        'gender'             => $gender,
                        'email'              => $email,
                        'password'           => $password,
                        'role'               => 'User',
                        'security_nickname'  => $securityNickname,
                        'security_cartoon'   => $securityCartoon,
                        'security_street'    => $securityStreet,
                        'security_sweet'     => $securitySweet
                    ];
        
                    $user->create($userInfo);
        
                    echo json_encode(['success' => true, 'message' => "Signup successful"]);
                } else {
                    echo json_encode(['success' => false, 'errors' => $errors]);
                }
            } else {
                echo json_encode(['success' => false, 'errors' => ['Invalid request']]);
            }
            break;

            case 'resetPassword':
                if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $confirmPassword = $_POST['confirmPassword'];
                    
                    $securityNickname = $_POST['securityNickname'];
                    $securityCartoon = $_POST['securityCartoon'];
                    $securityStreet = $_POST['securityStreet'];
                    $securitySweet = $_POST['securitySweet'];
            
                    $user = new User($pdo);
                    $errors = [];
            
                    if (empty($email) || empty($password) || empty($confirmPassword) || empty($securityNickname) || empty($securityCartoon) || empty($securityStreet) || empty($securitySweet)) {
                        $errors[] = "Fill all necessary fields";
                    }
            
                    if ($password !== $confirmPassword) {
                        $errors[] = "Passwords do not match";
                    }
            
                    if (!$user->emailExists($email)) {
                        $errors[] = "Email does not exist!";
                    }
            
                    $securityAnswers = $user->getSecurityQuestions($email);                    
                    if (
                        $securityNickname != $securityAnswers['security_nickname'] || 
                        $securityCartoon  != $securityAnswers['security_cartoon'] ||
                        $securityStreet   != $securityAnswers['security_street'] ||
                        $securitySweet    != $securityAnswers['security_sweet']
                    ) {
                        $errors[] = "Security answers are incorrect.";
                    }
                    
                    
            
                    if (empty($errors)) {            
                        $updateData = [
                            'password' => $password,
                        ];
                        $user->updatePassword($email, $updateData);
            
                        echo json_encode(['success' => true, 'message' => "Password successfully reset"]);
                    } else {
                        echo json_encode(['success' => false, 'errors' => $errors]);
                    }
                } else {
                    echo json_encode(['success' => false, 'errors' => ['Invalid request']]);
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
                    
                    // $_SESSION['password'] = $session['password'];
        
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