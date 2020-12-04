<?php
// Initialize the session
include("procedural.php");
session_start();
$email=$_SESSION['email'];

        
        if(isset($_POST['submit'])){
            
            $YEAR = mysqli_real_escape_string($db,$_POST['YEAR']);
            $BRANCH = mysqli_real_escape_string($db,$_POST['BRANCH']);
            $SEMESTER = mysqli_real_escape_string($db,$_POST['SEMESTER']);
            $TITLE = mysqli_real_escape_string($db,$_POST['TITLE']);
            $AUTHOR = mysqli_real_escape_string($db,$_POST['AUTHOR']);
            $PUBLISHER = mysqli_real_escape_string($db,$_POST['PUBLISHER']);
            $PRICE = mysqli_real_escape_string($db,$_POST['PRICE']);
            
            $filename = $_FILES["uploadfile"]["name"]; 
            $tempname = $_FILES["uploadfile"]["tmp_name"];     
            $folder = "image/".$filename; 
            if(move_uploaded_file($_FILES['uploadfile']['tmp_name'],$folder)){
                $msg = "IMAGE UPLOADED";
            }else{
                $msg= " something is wrong";
            }
            // image file directory
            // $sql3="INSERT INTO book (IMAGE) VALUES('$filename')";
            // $res4= mysqli_query($db,$sql3);
            
            $sql1="INSERT INTO author (AUTHOR_NAME) VALUES ('$AUTHOR')";
            $RES1= mysqli_query($db,$sql1); 

            $se= "SELECT AUTHOR_NAME FROM author WHERE AUTHOR_NAME='$AUTHOR'";
            $res= mysqli_query($db,$se);
            $row1 = mysqli_fetch_row($res);
            $tid = $row1[0];

            $sql2="INSERT INTO publisher (PUBLISHER_NAME) VALUES ('$PUBLISHER')";
            $RES2= mysqli_query($db,$sql2); 

            $se1= "SELECT PUBLISHER_NAME FROM publisher WHERE PUBLISHER_NAME='$PUBLISHER'";
            $res2= mysqli_query($db,$se1);
            $row2 = mysqli_fetch_row($res2);
            $PUB = $row2[0];
           

            $sql= "INSERT INTO book (TITLE,YEAR,BRANCH,SEMESTER,IMAGE,PRICE,EMAIL_ID,AUTHOR_NAME,PUBLISHER_NAME,product_status) VALUES ('$TITLE','$YEAR','$BRANCH','$SEMESTER','$filename','$PRICE','$email','$tid','$PUB','1')";
            $res= mysqli_query($db,$sql);

            // echo $sql;
            $sq= "SELECT max(ISBN) FROM BOOK";
            $RESU= mysqli_query($db,$sq);
            $row= mysqli_fetch_row($RESU);
            $isbn= $row[0];
            $_SESSION['isbn']=$isbn;
            header('location:sellcart.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sell books</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
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

.form {
    margin: 35px;
}

.input-field {
    width: 400px;
    height: 40px;
    margin-left: 10%;
    margin-top: 20px;
    padding-left: 10px;
    padding-right: 10px;
    border: 1px solid #777;
    border-radius: 14px;
    outline: none;
    font-family: 'Nunito', sans-serif;
}

.button {
    width: 200px;
    margin: 20px;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 40px;
    background: -webkit-linear-gradient(left, #8b4513, #a67b5b);
    margin-left: 20%;
    font-family: 'Nunito', sans-serif;
    font-size: 20px;
}

label {
    font-size: 24px;
    font-weight: bold;
}


</style>

<body>
    <div class="navbar">
        <p class="logo" style="margin-left:30px;margin-top:10px; color: #DAA520;"> Paper Towns</p>
        <ul class="nav">
            <li><a href="buy&sell.php">Home</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="sellcart.php">Order Summary</a></li>
            <li><a href="index.php">Log Out</a></li>
        </ul>
    </div>


    <section class="choices">
        <h1 style="margin-bottom: 10px; margin-top: 6%; ">Book Details:</h1><hr>
    </section><br>

    <div style="position: center; margin-left: 30%;" >
        <form method="post" action="sell.php" enctype="multipart/form-data"> 
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px; font-size: 30px;">Enter Year of Publication:</p>
            <input id="year" name="YEAR" class="input-field" type="text" placeholder="Eg: 2019,2018" required><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px; font-size: 30px;">Enter Branch:</p>
            <p style="margin-bottom: 0px; font-size: 15px; font-weight: bold; margin-top:5px; margin-left: 90px;">NOTE: FOR FE BOOKS, BRANCH NAME IS "COMMON"</p>
            <input id="branch" name="BRANCH"class="input-field" type="text" placeholder="Eg: COMMON,CMPN,EXTC,ETRX,IT,INSTRU" required><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px; font-size: 30px;">Enter Semester:</p>
            <input id="sem" name="SEMESTER" class="input-field" type="text" placeholder="Eg: 1, 3 etc." required><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px; font-size: 30px;">Book Title:</p>
            <input id="title" name="TITLE" class="input-field" type="text" placeholder="Enter book name" required><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px; font-size: 30px;">Author:</p>
            <input id="author" name="AUTHOR"class="input-field" type="text" placeholder="Enter Author's name" required><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px; font-size: 30px;">Publisher:</p>
            <input id="author" name="PUBLISHER"class="input-field" type="text" placeholder="Enter Publisher's name" ><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px; font-size: 30px;">Price (max: ₹500):</p>
            <input id="title" name="PRICE" class="input-field" type="text" placeholder="Enter price" required><br>
            <!-- <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px;">Email ID:</p>
            <input id="title" name="EMAIL_ID" class="input-field" type="text" placeholder="Enter ves Email ID" required><br> -->
            <p style="margin-bottom: 0px; font-weight: bold; margin-top: 5px; margin-left: 90px; font-size: 30px;">Upload Book Image:</p>
            <input name= "uploadfile"style="align-content: center;" class="input-field" type="file" ><br><br>
            <input type="submit" name="submit" class="button" >
            <br><br><br><br><br>
        </form>
        </div>
    </body>
</html>