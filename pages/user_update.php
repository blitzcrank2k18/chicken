<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$name =$_POST['name'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];

	mysqli_query($con,"update user set grower_name='$name',grower_contact='$contact',grower_address='$address' where grower_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated user details!');</script>";
	echo "<script>document.location='user.php'</script>";  

	
?>
