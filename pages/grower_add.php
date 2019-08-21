<?php 
session_start();

include('../dist/includes/dbcon.php');

	$name = $_POST['name'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	
	$query2=mysqli_query($con,"select * from grower where grower_name='$name'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Grower already exist!');</script>";
			echo "<script>document.location='grower.php'</script>";  
		}
		else
		{	

			
			mysqli_query($con,"INSERT INTO grower(grower_name,grower_contact,grower_address)
			VALUES('$name','$contact','$address')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new grower!');</script>";
			echo "<script>document.location='grower.php'</script>";  
		}
?>