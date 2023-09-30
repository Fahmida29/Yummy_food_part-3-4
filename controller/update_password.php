<?php

session_start();
include "../database/envr.php";

$id = $_SESSION['auth']['id'];
$oldPssword = $_REQUEST['old_password'];
$password = $_REQUEST['password'];
$confirmPassword = $_REQUEST['confirm_password'];
$encPassword = password_hash($password, PASSWORD_BCRYPT);
$errors = [];

$query = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($add,$query);
$user = mysqli_fetch_assoc($result);
$isverified = password_verify($oldPssword, $user['password']);

var_dump($isverified);

if($isverified) {

    if($password==$confirmPassword) {

        $query = "UPDATE users SET password='$encPassword' WHERE id = '$id'";
        $result = mysqli_query($add, $query);

        var_dump($result);
    }
    
}
else {
    $errors['old_error'] = "Old password did not match";
    $_SESSION['form_errors'] = $errors;
    header("Location: ../backend/profile.php");
}


?>