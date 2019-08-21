<?php 
session_start();

include('../dist/includes/dbcon.php');

	$weight = $_POST['weight'];
	
	mysqli_query($con,"INSERT INTO live_weight (weight,coops) VALUES('$weight','2')")or die(mysqli_error($con));
            
   	echo "<script type='text/javascript'>alert('Successfully added new live weight!');</script>";
	echo "<script>document.location='live_weight.php'</script>";  
	
?>