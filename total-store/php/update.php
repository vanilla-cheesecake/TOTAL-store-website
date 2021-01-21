
<?php
	include 'connect.php';  

    //..........transfer the value in the textbox to the variable...........................
    $id = ($_POST['id'])?$_POST['id']:'';
    $product_name = ($_POST['product_name'])?$_POST['product_name']:'';
    $product_code = ($_POST['product_code'])?$_POST['product_code']:'';
    $product_price = ($_POST['product_price'])?$_POST['product_price']:'';
    $product_image = ($_POST['product_image'])?$_POST['product_image']:'';



	if($product_name=="" || $product_code==""){	
		echo "<script>alert('Complete all field');history.back();</script>"; 
			} else { 
	
		//mysql code that update record to the database from the variable............    	
		mysqli_query($db, "update products set name='".$product_name."', code='".$product_code."', image='".$product_image."', price='".$product_price."' where id='".$id."'");
        echo "<script>alert('Record successfuly saved.');window.location.href='../admin.php';</script>";        


	}


?>


