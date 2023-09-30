<?php

session_start();
include "../database/envr.php";


$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$cta_title = $_REQUEST['cta_title'];
$cta_link = $_REQUEST['cta_link'];
$video_link = $_REQUEST['video_link'];
$banner_img = $_FILES['banner_img'];


$accepted_types = ['jpg','png','jpeg','pptx'];
$errors = [];

$ext = pathinfo($banner_img['name'])['extension'];

$fileName = "Banner-". uniqid() . ".$ext";
$path = "../uploads/banners";

if(!is_dir($path)) {
    mkdir($path);
}
$upload_file = move_uploaded_file($banner_img['tmp_name'], "../uploads/banners/".$fileName);

if($upload_file) {
    $query = "INSERT INTO banners(title, detail, cta_title, cta_link, video_link, banner_img) VALUES ('$title', '$detail', '$cta_title', '$cta_link', '$video_link', '$fileName')";
    $result = mysqli_query($add, $query);

   // $_SESSION['auth'] = $errors;
    var_dump($result);
}
  ?>