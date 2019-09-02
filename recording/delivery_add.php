<?php 
session_start();

include('../dist/includes/dbcon.php');

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
	$feed = $_POST['feed'];
	$time_weighed = $_POST['time_weighed'];
	$birdspercoop = $_POST['birdspercoop'];
	$coopswocover = $_POST['coopswocover'];
	$weigher = $_POST['weigher'];
	$alw = $_POST['alw'];

	$coops_taken = $_POST['coops_taken'];
	$coops_return = $_POST['coops_return'];
	$gross = $_POST['gross'];
	$time_taken = $_POST['time_taken'];
	$time_return = $_POST['time_return'];
	$coops_weight = $_POST['coops_weight'];
	$date_taken = $_POST['date_taken'];
	$date_return = $_POST['date_return'];
	$net_weight = $_POST['net_weight'];
	$guard_taken = $_POST['guard_taken'];
	$guard_return = $_POST['guard_return'];
	$doa_pcs = $_POST['doa_pcs'];
	$doa_weight = $_POST['doa_weight'];

			mysqli_query($con,"INSERT INTO delivery(truck_seal,tripno,noofcrew,plateno,delivery_date,timeoutfarm,timeinfarm,loadstart,loadfinish,timeinplant,pcshauled,houseno,farmchecker,feed,timeweighed,alw,weigher,birdspercoop,coopswocover,grower_id,doa_weight,doa_pcs,net_weight,coops_weight,gross_weight,driver)
			VALUES('$seal','$trips','$crew','$plateno','$date','$timeout_farm','$timein_farm','$load_start','$load_finish','$timein','$pcshauled','$houseno','$farm_checker','$feed','$time_weighed','$alw','$weigher','$birdspercoop','$coopswocover','$grower','$doa_weight','$doa_pcs','$net_weight','$coops_weight','$gross','$driver')")or die(mysqli_error($con));

			$id=mysqli_insert_id($con);	        

			mysqli_query($con,"INSERT INTO loops(delivery_id,looptaken,loopreturn,takedate,returndate,takenguard,returnguard)
			VALUES('$id','$coops_taken','$coops_return','$date_taken','$date_return','$guard_taken','$guard_return')")or die(mysqli_error($con));

			mysqli_query($con,"INSERT INTO tare(delivery_id)
			VALUES('$id')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new delivery!');</script>";
			echo "<script>document.location='live_weight.php?id=$id'</script>";  
		
?>