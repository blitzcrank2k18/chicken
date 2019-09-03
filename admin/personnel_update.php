<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$name =$_POST['name'];

	mysqli_query($con,"update personnel set personnel_name='$name' where personnel_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated personnel details!');</script>";
	echo "<script>document.location='personnel.php'</script>";  

	
?>
