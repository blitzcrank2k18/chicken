<?php
include("../dist/includes/dbcon.php");
//$id = $_POST['id'];
$result=mysqli_query($con,"DELETE FROM temp_trans")or die(mysqli_error($con));
	echo "<script>document.location='transaction.php'</script>";   
?>