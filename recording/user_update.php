<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	if(isset($_POST['changename']))
	{
	
	$name =$_POST['name'];
	$username = $_POST['username'];
	
		
		mysqli_query($con,"update user set name='$name',username='$username' where user_id='$id'")or die(mysqli_error($con));
	}
	else
	{
		$password = $_POST['password'];
		$pass=md5($password);
		$salt="a1Bz20ydqelm8m1wql";
		$pass=$salt.$pass;

		mysqli_query($con,"update user set password='$pass' where user_id='$id'")or die(mysqli_error($con));
	}	
	
	echo "<script type='text/javascript'>alert('Successfully updated user details!');</script>";
	echo "<script>document.location='account.php'</script>";  

	
?>
