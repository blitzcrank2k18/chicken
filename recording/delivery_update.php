<?php 
session_start();

include('../dist/includes/dbcon.php');
	
	$id = $_POST['id'];
	$seal = $_POST['seal'];
	$trips = $_POST['trips'];
	$plateno = $_POST['plateno'];
	$crew = $_POST['crew'];
	$date = $_POST['date'];
	$timein_farm = $_POST['timein_farm'];
	$timeout_farm = $_POST['timeout_farm'];
	$load_start = $_POST['load_start'];
	$load_finish = $_POST['load_finish'];
	$timein = $_POST['timein'];
	$driver = $_POST['driver'];

	$pcshauled = $_POST['pcshauled'];
	$grower = $_POST['grower'];
	$houseno = $_POST['houseno'];
	$farm_checker = $_POST['farm_checker'];
	$timefeed = $_POST['timefeed'];
	$datefeed = $_POST['datefeed'];
	$time_weighed = $_POST['time_weighed'];
	$birdspercoop = $_POST['birdspercoop'];
	$coopswocover = $_POST['coopswocover'];
	$weigher = $_POST['weigher'];
	$alw = $_POST['alw'];

	$coops_taken = $_POST['coops_taken'];
	$coops_return = $_POST['coops_return'];
	$gross = $_POST['gross'];
	$coops_weight = $_POST['coops_weight'];
	$date_taken = $_POST['date_taken'];
	$date_return = $_POST['date_return'];
	$net_weight = $_POST['net_weight'];
	$guard_taken = $_POST['takenguard'];
	$guard_return = $_POST['returnguard'];
	$doa_pcs = $_POST['doa_pcs'];
	$doa_weight = $_POST['doa_weight'];
	$time_taken = $_POST['time_taken'];
	$time_return = $_POST['time_return'];
	$status = $_POST['status'];
	$reason = $_POST['reason'];

	mysqli_query($con,"update delivery set truck_seal='$seal',tripno='$trips',noofcrew='$crew',plateno='$plateno',delivery_date='$date',timeoutfarm='$timeout_farm',timeinfarm='$timein_farm',loadstart='$load_start',loadfinish='$load_finish',timeinplant='$timein',pcshauled='$pcshauled',houseno='$houseno',farmchecker='$farm_checker',datefeed='$datefeed',timefeed='$timefeed',timeweighed='$time_weighed',alw='$alw',delivery_weigher='$weigher',birdspercoop='$birdspercoop',coopswocover='$coopswocover',grower_id='$grower',doa_weight='$doa_weight',doa_pcs='$doa_pcs',net_weight='$net_weight',gross_weight='$gross',driver='$driver',birdstatus='$status',reason='$reason' where delivery_id='$id'")or die(mysqli_error($con));

			mysqli_query($con,"update loops set delivery_id='$id',looptaken='$coops_taken',loopreturn='$coops_return',takedate='$date_taken',returndate='$date_return',takenguard='$guard_taken',returnguard='$guard_return',taketime='$time_taken',returntime='$time_return',coops_weight='$coops_weight' where delivery_id='$id'")or die(mysqli_error($con));

			//mysqli_query($con,"INSERT INTO tare(delivery_id) VALUES('$id')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully updated delivery details!');</script>";
			echo "<script>document.location='view_delivery.php?id=$id'</script>";  
		
?>