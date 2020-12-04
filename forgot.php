<?php
// Initialize the session
session_start();
require_once "procedural.php";
 
// Define variables and initialize with empty values
if(isset($_POST['change_password'])){
// check for valid email address
$email = mysqli_real_escape_string($db,$_POST['email']);
$new_password = mysqli_real_escape_string($db,$_POST['new_password']);
$confirm_password = mysqli_real_escape_string($db,$_POST['confirm_password']);
 
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     $error[] = 'Please enter a valid email address';
}

if (!$error) {

$query = "SELECT EMAIL_ID FROM student WHERE EMAIL_ID = '$email'";
$res=mysqli_query($db,$query);
 
//create a new random password
 
$new1_password = password_hash($new_password, PASSWORD_DEFAULT);

$sql = "UPDATE student SET PASSWORD='$new1_password' WHERE EMAIL_ID = '$email'";
$res1=mysqli_query($db,$sql);
}

header('location:login.php');
}