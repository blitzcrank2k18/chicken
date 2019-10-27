<?php 
session_start();

include('../dist/includes/dbcon.php');

	$tare_weight = $_POST['tare_weight'];
	$tare_id = $_POST['tare_id'];
	$tare_pc = $_POST['tare_pc'];
	$daa_pc = $_POST['daa_pc'];
	$daa_wt = $_POST['daa_wt'];
	$doa_pc = $_POST['doa_pc'];
	$doa_wt = $_POST['doa_wt'];
	$id = $_POST['id'];
	
	$i=0;
	$tare_total=0;
	foreach ($tare_id as $value) 
	{
		$tare_total=$tare_weight[$i]*$tare_pc[$i];
		mysqli_query($con,"UPDATE tare SET tare_weight='$tare_weight[$i]',tare_pc='$tare_pc[$i]',tare_total='$tare_total' where tare_id='$value'")
	 or die(mysqli_error($con)); 

	 	$tare=$tare+$tare_total;
	 	$i++;

	}

			mysqli_query($con,"update delivery set doa_pcs='$doa_pc',doa_weight='$doa_wt',daa_pcs='$daa_pc',daa_weight='$daa_wt',tare='$tare',net_weight=gross_weight-'$tare' where delivery_id='$id'")or die(mysqli_error($con));
	

			echo "<script type='text/javascript'>alert('Successfully added new tare weight!');</script>";
			echo "<script>document.location='live_weight.php?id=$id'</script>";  
		
?>