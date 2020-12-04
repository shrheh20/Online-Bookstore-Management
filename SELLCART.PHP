<?php
include('procedural.php');
session_start();
$email=$_SESSION['email'];
$isbn=$_SESSION['isbn'];

$sqllogin = "SELECT * from book where ISBN='$isbn'";
$result = mysqli_query($db, $sqllogin);
$row= mysqli_fetch_row($result);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" src="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
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
.btn {
    text-align: center;
    margin-left: -5%;

}

.btn a {
    color: white; 
    font-size: 20px; 
    font-weight: lighter;
    background: -webkit-linear-gradient(left, #8b4513, #a67b5b);
    border: none;
    padding: 15px;
    border-radius: 30px;
    text-transform: none;
    width: 150px;

}
.remove {
  color: black;
}

.choices h1 {
    text-align: left;
    margin-left: 100px;
    margin-top: 100px;  
}

hr {
    margin-left: 100px;
    top:0;
    margin-right: 200px;
}

th,td {
  font-size: 24px;
  color: black;
}


</style>

<body>
    <div class="navbar">
        <p class="logo" style="margin-left:30px;margin-top:10px; color: #DAA520;"> Paper Towns</p>
        <ul class="nav">
            <li><a href="buy&sell.php">Home</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="index.php">Log Out</a></li>
        </ul>
    </div>
    
<section class="choices">
        <h1 style="margin-bottom: 10px; ">Order Details: </h1><hr>
    </section><br>

                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="550px">Title</th>  
                               <th width="200px">Branch</th>  
                               <th width="200px">Semester</th> 
                               <th width="200px">Year</th> 
                               <th width="200px">Price</th>       
                          </tr>
                          <tr style="margin-left:100px;">  
                               <td colspan="1" align="center"><?=$row[1];?></td>  
                               <td colspan="1" align="center"><?=$row[3];?></td>  
                               <td colspan="1" align="center"><?=$row[4];?></td>
                               <td colspan="1" align="center"><?=$row[2];?></td>  
                               <td colspan="1" align="center"><?=$row[6];?></td>  
                          </tr>   
                      </table>
                <br><br><br>
                          <div class="btn">
                            
        <a href="sell.php" style="font-weight: 500 bold;"><b>Sell more books</b></a>
        <a href="checkout-sell.php" name="save_order" style="font-weight: 500 bold;" onclick="showAlert()"><b>Check Out</b></a>

      
    </div>  
                </div> 
           </div> 
           <?php
           unset($_SESSION['isbn']);
           ?> 

           </body> 
           <script>
             function showAlert() 
             {
              alert("You cannot change your order details now!");

             }
           </script>
           </html>