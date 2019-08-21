<?php 
session_start();

include('../dist/includes/dbcon.php');

	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$pass=md5($password);
	$salt="a1Bz20ydqelm8m1wql";
	$pass=$salt.$pass;

	$query2=mysqli_query($con,"select * from user where name='$name'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('User already exist!');</script>";
			echo "<script>document.location='user.php'</script>";  
		}
		else
		{	

			
			mysqli_query($con,"INSERT INTO user(name,username,password)
			VALUES('$name','$username','$pass')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new user!');</script>";
			echo "<script>document.location='user.php'</script>";  
		}
?>