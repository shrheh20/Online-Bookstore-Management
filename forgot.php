<?php
// Initialize the session
session_start();
require_once "procedural.php";
$email_err=$password_err=$confirm_err="";

if($_SERVER["REQUEST_METHOD"] == "POST") {

// Define variables and initialize with empty values
if(isset($_POST['change_password'])){
// check for valid email address
$email = mysqli_real_escape_string($db,$_POST['email']);
$new_password = mysqli_real_escape_string($db,$_POST['new_password']);
$confirm_password = mysqli_real_escape_string($db,$_POST['confirm_password']);
 
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     $email_err = 'Please enter a valid email address';
}
if(empty($_POST["new_password"])){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty($_POST["confirm_password"])){
        $confirm_err = "Please confirm password.";     
    } else{
        $confirm = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm)){
            $confirm_err = "Password did not match.";
        }
    }
}
if (empty($email_err) && empty($password_err) && empty($confirm_err)) {

$query = "SELECT EMAIL_ID FROM student WHERE EMAIL_ID = '$email'";
$res=mysqli_query($db,$query);

$new1_password = password_hash($new_password, PASSWORD_DEFAULT);
$sql = "UPDATE student SET PASSWORD='$new1_password' WHERE EMAIL_ID = '$email'";
$res1=mysqli_query($db,$sql);
}
else{
	echo "<script>alert('Wrong password combination');document.location='login.php'</script>";
}
header('location:login.php');
}