<?php
session_start();
include "../database/envr.php";

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$errors = [];


if(empty($email)) {
    $errors['email_error'] = "Please enter your email";
}

if(empty($password)) {
    $errors['password_error'] = "Please enter your password";
}

if(count($errors) > 0) {
    $_SESSION['form_errors'] = $errors;
    header("Location: ../backend/login.php");
}
//print_r($errors);

else{
    $query = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($add,$query);
    $user = mysqli_fetch_assoc($result);
    
    

    if(mysqli_num_rows($result) > 0) {
        //PASSWORD_CHECK
        $check_password = password_verify($password, $user['password']);
        if($check_password) {
            // LOG IN
            $_SESSION['auth'] = $user;
            header("Location: ../backend/index.php");
        }
    else {
        $errors['password_error'] = "Wrong password";
        $_SESSION['form_errors'] = $errors;
        header("Location: ../backend/login.php");
    }

    }
    else {
        $errors['email_error'] = "Wrong email address";
        $_SESSION['form_errors'] = $errors;
        header("Location: ../backend/login.php");
    }
}

?>
