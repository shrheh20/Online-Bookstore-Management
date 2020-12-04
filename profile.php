<?php

session_start();
require_once 'procedural.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>

<style>
	html {
    scroll-behavior: smooth;
}
body{
    margin: 0;
    padding: 0;
    font-family:'Nunito', sans-serif;
    
}
h1{
    font-size: 50px;
    font-family: 'Nunito', sans-serif;
}
p{
    font-size: 24px;
    line-height: 50px;
}
.navbar{
    top: 0;
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    flex-wrap: wrap;
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(image/bookstore1.jpg);
    width: 100%;
    height: 70px;
    z-index: 1;
}
.nav{
    display: flex;
    justify-content: right;
    list-style: none;
    margin-right: 5%;
     margin-bottom: 40px;
}
.logo {
    flex: 1 1 auto;
    margin-left: 10%;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: bold;
    font-size: 35px;
    color: (left, #8b4513, #a67b5b);
}

hr {
    margin-top:0;
    margin-right: 200px;
}

a{
    margin: 15px;
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 15px;
}
a:hover{
    color: #fff;
    padding: 10px;
    border-radius: 40px;
    background: -webkit-linear-gradient(left, #8b4513, #a67b5b);
}

.display{
    margin-left: 100px;
    margin-top: 0px;
}

.profile {
    display: grid;
    grid-template-columns: 300px 300px;
    margin-left: 100px;
    margin-top:0;
}

.profile p {
    margin-top: 10px;
}

</style>

<body>
    <div class="navbar">
        <p class="logo" style="margin-left:30px; margin-top:10px; color: #DAA520;"> Paper Towns</p>
        <ul class="nav">
            <li><a href="buy&sell.php">Home</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="index.php">Log Out</a></li>
        </ul>
    </div>

    <div class="display">
        <h1 style="margin-bottom: 10px; margin-top: 100px;">My Profile:</h1><hr>
    </div>
    <div class="profile">
        <h2>Name:</h2>
        <p><?=$_SESSION['user'];?></p>
        <h2>E-mail ID:</h2>
        <p><?=$_SESSION['email'];?></p>
        <h2>Branch:</h2>
        <p><?=$_SESSION['branch'];?></p>
        <h2>Year:</h2>
        <p><?=$_SESSION['year'];?></p>
    </div>
</body>
</html>