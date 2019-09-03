<?php 
session_start();

include('../dist/includes/dbcon.php');

	$name = $_POST['name'];
	
	$query2=mysqli_query($con,"select * from personnel where personnel_name='$name'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Personnel already exist!');</script>";
			echo "<script>document.location='personnel.php'</script>";  
		}
		else
		{	

			
			mysqli_query($con,"INSERT INTO personnel(personnel_name)
			VALUES('$name')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new personnel!');</script>";
			echo "<script>document.location='personnel.php'</script>";  
		}
?>