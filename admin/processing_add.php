<?php 
session_start();

include('../dist/includes/dbcon.php');

	$product = $_POST['product'];
	$qty = $_POST['qty'];
	$id = $_POST['id'];
	        
		$i=0;      
	    foreach($qty as $qty1) {  
        if ($qty1<>0)
        {
      mysqli_query($con,"INSERT INTO process (delivery_id,prod_id,qty) VALUES('$id','$product[$i]','$qty1')")or die(mysqli_error($con));
        	//echo $product[$i];
        }
        $i++;           
    }
        


		echo "<script type='text/javascript'>alert('Successfully added process chicken!');</script>";
	  echo "<script>document.location='processing.php?id=$id'</script>";  
	
?>