<?php 
session_start();

include('../dist/includes/dbcon.php');

	$tare_weight = $_POST['tare_weight'];
	$tare_pc = $_POST['tare_pc'];
	$daa_pc = $_POST['daa_pc'];
	$daa_wt = $_POST['daa_wt'];
	$doa_pc = $_POST['doa_pc'];
	$doa_wt = $_POST['doa_wt'];
	$id = $_POST['id'];
	$tare_total=$tare_weight*$tare_pc;

			mysqli_query($con,"INSERT INTO tare(tare_weight,tare_pc,tare_total,delivery_id)
			VALUES('$tare_weight','$tare_pc','$tare_total','$id')")or die(mysqli_error($con));

			mysqli_query($con,"INSERT INTO death(delivery_id,death_type,death_pc,death_wt)
			VALUES('$id','doa','$doa_pc','$doa_wt')")or die(mysqli_error($con));

			mysqli_query($con,"INSERT INTO death(delivery_id,death_type,death_pc,death_wt)
			VALUES('$id','daa','$daa_pc','$daa_wt')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new tare weight!');</script>";
			echo "<script>document.location='live_weight.php?id=$id'</script>";  
		
?>