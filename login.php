<?php
$email_err=$password_err=$confirm_err="";

if($_SERVER["REQUEST_METHOD"] == "POST") {
$email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $email_err = "Invalid email format";
}
if(empty(trim($_POST["new_password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_err = "Please confirm password.";     
    } else{
        $confirm = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm)){
            $confirm_err = "Password did not match.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<style>
    ::placeholder {
        color:white;
        font-size: 20px;
       }

    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
}

html {
    scroll-behavior: smooth;
}

body{
    font-family: 'Nunito', sans-serif;
    background: #000;
}

.home-area, .about-area, .contact-area{
    position: relative;
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
    flex-direction: row;
    width: 100%;
    height: 800px;
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(image/bookstore1.jpg);
    background-size: cover;
    }

/*.background{
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url(image/bookstore1.jpg) no-repeat;
    background-size: 100% 100%;
    height: 100vh;
    display: flex;
}*/

.text, .box{
    opacity: 1;
    margin-top: 0vh;
    flex: 1;
}

.text{
    margin-left: 10%;
    font-weight: 300px;
}


.text h1{
    margin-top: -30vh;
    font-size: 70px;
    color: #fff;
    font-weight: 500 bolder;
}

.text p{
    font-size: 20px;
    color: white;
    font-weight: 300;
}

.text p a{
    color: #fff;
    font-weight: 700;
}

.form{
    background: transparent;
    color: white;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    width: 250px;

}

input{
    margin: 20px 0;
    padding: 10px;
    background: transparent;
    border: none;
    outline: none;
    color: white;
    font-size: 20px;
    font-family: 'Nunito', sans-serif;
}

.input-field{
    border-bottom: 1px solid #fff;
    font-weight: bolder;
    margin-left: 13%;
}

.a {
    margin-left: 20%;
    margin-right: 0;
    width: 150px;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 30px;
    background: -webkit-linear-gradient(left, #8b4513, #a67b5b);
    font-family: 'Nunito', sans-serif;
    font-size: 15px;
    font-weight: bold;
    position: relative;
    text-align: center;
}
</style>
<body>
        <div class="home-area">
            <div class="text">
                <h1>Login</h1>
                <p>New User? <a href="signup.php">Sign Up</a></p>
            </div>
            <div class="box">
                <form id="login" action="validation.php" method="post">
                    <input type="email" name="email"class="input-field" placeholder="Email ID" required>
                    <span class="error" style="color:white;">* <?php echo $email_err;?></span>
                    <input type="password" name="password"class="input-field" placeholder="Password" required>
                    <span class="error" style="color:white;">* <?php echo $password_err;?></span><br>
                    <input type="submit" class="a" name="login" onclick="buy&sell.php" value="Login"><br>
                     <!-- <a class="a" name="login"href="buy&sell.php">Login</a> -->
                    <?php
                    session_start();
                    if(isset($_SESSION['errmsg'])){
                        echo $_SESSION['errmsg'];
                        unset($_SESSION['errmsg']);
                    }
                    ?>
                </form>
                   <input type="submit" onclick="window.location='#about'" class="a"name="Forgot"value="Forgot Password">
                    <!-- <a class="a" href="forgot.php">Forgot Password?</a><br><br> -->
                
            </div>
        </div>
        <section class="about-area" id="about">
<div class="text">
                <h1>Forgot Password?</h1>
            </div>
            <div class="box">
                <form id="forgot" action="forgot.php" method="post">
                    <input type="email" name="email"class="input-field" placeholder="E-mail ID" required>
                    <span class="error" style="color:white;">* <?php echo $email_err;?></span>
                    <input type="password" name="new_password" class="input-field" placeholder="New Password" required><span class="error" style="color:white;">* <?php echo $password_err;?></span>
                    <input type="password" name="confirm_password" class="input-field" placeholder="Confirm Password" required><span class="error" style="color:white;">* <?php echo $confirm_err;?></span><br>
                    <input type="submit" class="a" name="change_password" onclick= 'showalert()'value="Change Password"><br>
               
                     <!-- <a class="a" name="login"href="buy&sell.php">Login</a> -->
                </form>
        </div>
</section>
</body>
<script type="text/javascript">
	function showalert{
		alert('New password has been set');
	}
</script>
</html>
