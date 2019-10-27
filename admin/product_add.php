<?php 
session_start();
//$branch=$_SESSION['branch'];
include('../dist/includes/dbcon.php');

	$name = $_POST['prod_code'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];
    $desc = $_POST['desc'];

	$query2=mysqli_query($con,"select * from product where prod_code='$name'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Product already exist!');</script>";
			echo "<script>document.location='product.php'</script>";  
		}
		else
		{	

			
			mysqli_query($con,"INSERT INTO product(prod_code,prod_price,prod_desc)
			VALUES('$name','$price','$desc')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new product!');</script>";
					  echo "<script>document.location='product.php'</script>";  
		}
?>