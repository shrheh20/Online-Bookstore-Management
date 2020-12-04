<?php
//fetch_data.php
include('config.php');
// include('session.php');
?>
<head>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
</head>
<style>
	.btn-style{
	margin-left:5%;
	margin-top: 50px;
    width: 200px;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 30px;
    background: -webkit-linear-gradient(left, #8b4513, #a67b5b);
    font-family: 'Nunito', sans-serif;
    font-size: 15px;
    font-weight: bold;
    /*position: absolute;*/
    align-content: center;
	}

	.input-style {
		margin: 10px 15px 10px 40px;
		color: black;
		font-size: 15px;

	}
</style>
<script>
$(document).ready(function(){
    // add to cart button listener
    $('.add-to-cart-form').on('submit', function(){
 
        // info is in the table / single product layout
        var ISBN = $(this).find('.ISBN').text();
        var quantity = $(this).find('.cart-quantity').val();
 
        // redirect to add_to_cart.php, with parameter values to process the request
        window.location.href = "add_to_cart.php?id=" + ISBN + "&quantity=" + quantity;
        return false;
    });
});
</script>
<?php

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM book WHERE product_status='1'	";
	if(isset($_POST["SEM"]))
	{
		$SEM_filter = implode("','", $_POST["SEM"]);
		$query .= "
		 AND SEMESTER IN ('".$SEM_filter."')
		";
	}
	if(isset($_POST["BRANCH"]))
	{
		$BRANCH_filter = implode("','", $_POST["BRANCH"]);
		$query .= "
		 AND BRANCH IN ('".$BRANCH_filter."')
		";
	}
	if(isset($_POST["AUTHOR"]))
	{
		$AUTHOR_filter = implode("','", $_POST["AUTHOR"]);
		$query .= "
		 AND AUTHOR_NAME IN ('".$AUTHOR_filter."')
		";
	}
	$statement = $mysqli->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '
			<form method="post" action="cart.php?action=add&ISBN='.$row['ISBN'].'">
			<div class="col-sm-3 col-lg-4 col-md-9">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:600px;">
					<img src="image/'. $row['IMAGE'] .'" alt="" class="img-responsive" style="height:300px; width:250px;" >
					<input type="hidden" name="hidden_title" value="'.$row['TITLE'].'"><strong><center style="font-size: 20px; margin-top: 10px; font-weight:bolder;">'.$row['TITLE'].'</center></strong>
					<input type="hidden" name="hidden_price" align="center" class="text-danger" value="'.$row['PRICE'] .'"> <strong><center style="font-size: 30px; font-weight:bolder; color:#8b4513;">₹ '.$row['PRICE'].'</strong>
					<p align="center" style="margin-top: 10px;"> Semester: '. $row['SEMESTER'] .'</p>
					<input type="number" name="quantity" class="form-control" value="1" min="1" max="1" style="margin-top:20px;" />
					<input type="submit" name="add_to_cart" class="btn-style" align="center" value="Add to Cart"/>
				</div>

			</div>
			</form>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}
?>
