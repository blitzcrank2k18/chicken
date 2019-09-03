<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$weigher =$_POST['weigher'];
	$verifier =$_POST['verifier'];

	mysqli_query($con,"update delivery set weigher='$weigher',verifier='$verifier' where delivery_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated assigned personnel details!');</script>";
	echo "<script>document.location='live_weight.php?id=$id'</script>"; 

	
?>
