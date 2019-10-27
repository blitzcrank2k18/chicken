<?php 
session_start();
$id=$_SESSION['id'];	
include('../dist/includes/dbcon.php');
	$discount = $_POST['discount'];
	
	$customer = $_POST['customer'];
	//$disc=$amount_due
	date_default_timezone_set("Asia/Manila"); 
	$date = date("Y-m-d H:i:s");
	$amount_due = $_POST['amount_due'];
	$total=$_POST['total'];
	$disc = $total*($discount/100);

		$tendered = $_POST['tendered'];
		$change = $_POST['change'];

		mysqli_query($con,"INSERT INTO sales(discount,amount_due,total,sales_date,cash_tendered,cash_change,cust_id,percent) 
	VALUES('$disc','$amount_due','$total','$date','$tendered','$change','$customer','$discount')")or die(mysqli_error($con));
		
	
	
	$sales_id=mysqli_insert_id($con);
	$_SESSION['sid']=$sales_id;
	$query=mysqli_query($con,"select * from temp_trans natural join product")or die(mysqli_error($con));
		while ($row=mysqli_fetch_array($query))
		{
			$pid=$row['prod_id'];	
 			$qty=$row['qty'];
			$price=$row['prod_price'];
			$weight=$row['weight'];
			$subtotal=$price*$weight;
			
			mysqli_query($con,"INSERT INTO sales_details(prod_id,sales_qty,sales_kg,sales_price,sales_id,sales_total) VALUES('$pid','$qty','$weight','$price','$sales_id','$subtotal')")or die(mysqli_error($con));
			//mysqli_query($con,"UPDATE product SET prod_qty=prod_qty-'$qty' where prod_id='$pid'") or die(mysqli_error($con)); 
		}
		
				echo "<script>document.location='receipt.php?sales_id=$sales_id'</script>";  	
		
		$result=mysqli_query($con,"DELETE FROM temp_trans")	or die(mysqli_error($con));
		//echo "<script>document.location='receipt.php?cid=$cid'</script>";  	
		
	
?>