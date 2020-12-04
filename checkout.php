<?php
session_start();
require_once 'procedural.php';
require_once 'payment.php';
$email=$_SESSION['email'];

if(isset($_POST["CASH"])){
    $_SESSION["paymentopt"]= "CASH";
    
}
if(isset($_POST["CARD"])){
    $_SESSION["paymentopt"]= "CARD";
    
}
if(isset($_POST["UPI"])){
    $_SESSION["paymentopt"]= "UPI";
    
   }
if(isset($_POST["NET_BANKING"])){
    $_SESSION["paymentopt"]= "NET_BANKING";
    
}
$paymentmode=$_SESSION["paymentopt"];
    if(!empty($_SESSION["shopping_cart"])){
                    
                    foreach ($_SESSION["shopping_cart"] as $key => $value) {
                        
                        $ISBN= $value["ITEM_ID"];
                        $TITLE= $value['TITLE'];
                        $PRICE= $value['PRICE'];
                        $query2 = "SELECT ISBN FROM book WHERE TITLE ='$TITLE'";
                        $result2 = mysqli_query($db,$query2);
                        $row2 = mysqli_fetch_row($result2);
                                              
                        $query3 = "INSERT INTO cart (ISBN, TITLE, QUANTITY, EMAIL_ID, PRICE) VALUES ('$ISBN','$TITLE',1,'$email','$PRICE')";
                        $result3 = mysqli_query($db,$query3);
                                              
                    }
                    $amount =$_SESSION["totalpricesession"];
                    $query = "INSERT INTO transaction ( EMAIL_ID, AMOUNT) VALUES ('$email','$amount')";
                    $result= mysqli_query($db, $query);

                    $se= "SELECT max(TRANSACTION_ID) FROM transaction WHERE EMAIL_ID='$email'";
					$res= mysqli_query($db,$se);
					$row1 = mysqli_fetch_row($res);
            		$tid = $row1[0];

            		$query1 = "INSERT INTO payment (EMAIL_ID, TRANSACTION_ID, AMOUNT, PAYMENT_MODE) VALUES ('$email','$tid','$amount','$paymentmode')";
            		$result1= mysqli_query($db, $query1);

            		unset($_SESSION['shopping_cart']); 
    				unset($_SESSION['totalpricesession']);
    				unset($_SESSION["paymentopt"]);
                    header('location:check.php');
                    
    }
    
?>
