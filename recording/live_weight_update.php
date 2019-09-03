<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$lwid = $_POST['lwid'];
	$weight =$_POST['weight'];

	mysqli_query($con,"update live_weight set weight='$weight' where live_weight_id='$lwid'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated live weight details!');</script>";
	echo "<script>document.location='live_weight.php?id=$id'</script>";  

	
?>
