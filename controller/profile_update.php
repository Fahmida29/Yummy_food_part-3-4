<?php
session_start();
include "../database/envr.php";

$id = $_SESSION['auth']['id'];

$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$profileImg = $_FILES['profile_img'];
$errors = [];
$accepted_types = ['jpg','png','jpeg','pptx'];

$extension = pathinfo($profileImg['name'])['extension'];


//* VALIDATION

if($profileImg['size'] == 0) {
    $errors['profileImg_error'] = "Image is empty";
}
else if(!in_array($extension,$accepted_types)) {
    $errors['profileImg_error'] = "Supported types are jpg, png, jpeg, pptx";
}
else if($profileImg['size'] > 6520000) {
    $errors['profileImg_error'] = "Total image size is 500kb";
}

//* REDIRECT
if(count($errors) == 0) {
//* Move uploaded file

$fileName = "user-" . uniqid() . ".$extension";

if(!is_dir("../uploads/users")) {
    mkdir("../uploads/users");

}
$uploadedFiles = move_uploaded_file($profileImg['tmp_name'], "../uploads/users/$fileName");

if($uploadedFiles){
    $query = "UPDATE users SET fname='$fname',lname='$lname',email='$email',profile_img='$fileName' WHERE id ='$id'";
    $result = mysqli_query($add,$query);
    
    $_SESSION['auth']['fname'] = $fname;
    $_SESSION['auth']['lname'] = $lname;
    $_SESSION['auth']['email'] = $email;
    $_SESSION['auth']['profile'] = $fileName;

    header("Location: ../backend/profile.php");
}
}
else {
    header("Location: ../backend/profile.php");
}
?>