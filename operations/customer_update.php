<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$name =$_POST['name'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];

	mysqli_query($con,"update customer set cust_name='$name',cust_contact='$contact',cust_address='$address' where cust_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated customer details!');</script>";
	echo "<script>document.location='customer.php'</script>";  

	
?>
