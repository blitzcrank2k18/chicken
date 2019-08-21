<?php 
session_start();

include('../dist/includes/dbcon.php');

	$name = $_POST['name'];
	$date = $_POST['date'];
	$qty = $_POST['qty'];
	$kg = $_POST['kg'];
	$id = $_POST['id'];
	$price = $_POST['price'];
	
	mysqli_query($con,"INSERT INTO pr (cust_id,pr_date) VALUES('$name','$date')")or die(mysqli_error($con));
            
    $pr_id=mysqli_insert_id($con);	        
		$i=0;      
	    foreach($qty as $qty1) {  
        if ($qty1<>0)
        {
            //$subtotal=$price[$i]*$value;
      mysqli_query($con,"INSERT INTO pr_details (pr_id,prod_id,pr_qty,pr_weight) VALUES('$pr_id','$id[$i]','$qty1','$kg[$i]')")or die(mysqli_error($con));
        }
        $i++;           
    }
        


		echo "<script type='text/javascript'>alert('Successfully added new purchase request!');</script>";
	  echo "<script>document.location='pr.php'</script>";  
	
?>