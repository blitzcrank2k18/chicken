<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$lwid = $_POST['lwid'];
	//$weight =$_POST['weight'];

	$result=mysqli_query($con,"DELETE FROM live_weight WHERE live_weight_id ='$lwid'")
	or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully removed live weight!');</script>";
	echo "<script>document.location='live_weight.php?id=$id'</script>";  

	
?>
