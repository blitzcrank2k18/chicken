<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];

	$result=mysqli_query($con,"DELETE FROM personnel WHERE personnel_id ='$id'")
	or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully removed personnel!');</script>";
	echo "<script>document.location='personnel.php'</script>";  

	
?>
