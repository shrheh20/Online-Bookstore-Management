<?php
// Initialize the session
include("procedural.php");
session_start();
$email_err=$password_er="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
        

        if(!empty($_POST['login'])){
            
            $email = mysqli_real_escape_string($db,$_POST['email']);
            $password = mysqli_real_escape_string($db,$_POST['password']);
            
        if(empty(trim($_POST["email"]))){
        $email_err = "Please enter valid email.";
        } 
        $sqllogin = "SELECT * from student where EMAIL_ID='$email'";
            $result = mysqli_query($db, $sqllogin);
            
            if (mysqli_num_rows($result) > 0) {
                    $row=mysqli_fetch_assoc($result);
                    $DBpassword=$row['PASSWORD'];
                    if(password_verify($password, $DBpassword)){
                        $_SESSION['user'] = $row['NAME'];
                        $_SESSION['email']= $row['EMAIL_ID'];
                        $_SESSION['branch']=$row['BRANCH'];
                        $_SESSION['year']=$row['YEAR'];
                        $_SESSION['success'] = "You are now logged in";
                        header('location: buy&sell.php');
                    }else{
                        echo "<script>alert('Wrong username/password combination');document.location='login.php'</script>";
                        // echo '<script type="text/javascript">';
                        // echo 'alert("Wrong username/password combination")';
                        // echo '</script>'
                        ;
                    }
            }
            else 
            {
                echo '<script type="text/javascript">';
                echo ' alert("Wrong username/password combination")';  //not showing an alert 
                header('location:login.php');
                echo '</script>';
            }
 
 }

}
?>

