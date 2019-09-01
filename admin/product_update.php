<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$name =$_POST['prod_name'];
	$price = $_POST['price'];
	$desc = $_POST['desc'];

	mysqli_query($con,"update product set prod_code='$name',prod_price='$price',prod_desc='$desc' where prod_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated product details!');</script>";
	echo "<script>document.location='product.php'</script>";  

	
?>
