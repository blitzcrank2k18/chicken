<?php 
session_start();
$id=$_SESSION['id'];

include('../dist/includes/dbcon.php');

	$name = $_POST['prod_name'];
	$qty = $_POST['qty'];
	$weight = $_POST['weight'];
	
			
		$query=mysqli_query($con,"select prod_price,prod_id from product where prod_id='$name'")or die(mysqli_error());
		$row=mysqli_fetch_array($query);
		$price=$row['prod_price'];
		
		$query1=mysqli_query($con,"select * from temp_trans where prod_id='$name'")or die(mysqli_error());
		$count=mysqli_num_rows($query1);
		
		//$total=$price*$qty;
		
		if ($count>0){
			mysqli_query($con,"update temp_trans set qty=qty+'$qty' where prod_id='$name'")or die(mysqli_error());
	
		}
		else{
			mysqli_query($con,"INSERT INTO temp_trans(prod_id,qty,weight) VALUES('$name','$qty','$weight')")or die(mysqli_error($con));
		}

	
		echo "<script>document.location='transaction.php'</script>";  
	
?>