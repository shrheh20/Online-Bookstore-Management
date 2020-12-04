<?php   
session_start();  
include("procedural.php");
if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "ITEM_ID");  
           if(!in_array($_GET['ISBN'], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);
                echo $count;
                $item_array = array(  
                     'ITEM_ID'=>$_GET["ISBN"],  
                     'TITLE' =>$_POST["hidden_title"],  
                     'PRICE'=>$_POST["hidden_price"],  
                     'item_quantity'=>$_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="shopping_window.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'ITEM_ID'=>$_GET["ISBN"],  
                'TITLE'=>$_POST["hidden_title"],  
                'PRICE'=>$_POST["hidden_price"],  
                'item_quantity'=>$_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["ITEM_ID"] == $_GET["ISBN"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     //echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 }  
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
            <li><a href="cart.php">Order Summary</a></li>
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
                               <th width="200px">Quantity</th>  
                               <th width="200px">Price</th>  
                               <th width="200px">Total</th>  
                                 
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total =0; 
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr style="margin-left:100px;">  
                               <td colspan="1" align="center"><?php echo $values["TITLE"]; ?></td>  
                               <td colspan="1" align="center"><?php echo $values["item_quantity"]; ?></td>  
                               <td colspan="1" align="center">₹ <?php echo $values["PRICE"]; ?></td>  
                               <td colspan="1" align="center">₹ <?php echo number_format((int)$values["item_quantity"]*(int)$values["PRICE"], 2);?></td>  
                               <td colspan="1" align="center"><input type="submit" value="X" style="color:black; border: solid red; background: none; color: red; font-size: 20px;" onclick="window.location='cart.php?action=delete&ISBN=<?php echo $values["ITEM_ID"]; ?>'"></td>  
                          </tr> 
                          <?php  
                              $total = $total + ((int)$values["item_quantity"] * (int)$values["PRICE"]);
                              $_SESSION["totalpricesession"] = $total; 
                            }  
                          ?> 
                        </table>
                        <hr>
                          
                          <div class="table-responsive">
                            <table class="table table-bordered" style="margin-left: 790px;">
                              <tr>  
                               <th style="width:100px;"colspan="1" align="right">Total:</th>  
                               <td style="width:341px;"align="center"><b>₹ <?php echo number_format($total, 2); ?></b></td>  
                               <td></td>  
                              </tr>  
                              <?php  
                              }
                              else
                              {
                                ?>
                                <h2 align="center"> No items in the cart :(</h2>
                                <?php
                              }  
                              ?>  
                            </table> 
                          </div><br><br>
                          <div class="btn">
                            
        <a href="shopping_window.php" style="font-weight: 500 bold;"><b>Buy more books</b></a>
        <a href="payment.php" name="save_order" style="font-weight: 500 bold;" onclick="showAlert()"><b>Check Out</b></a>
      
    </div>  
                </div> 
    
           </div>  
           </body> 
           <script>
             function showAlert() 
             {
              alert("You cannot change your order details now!");

             }
           </script>
           </html>