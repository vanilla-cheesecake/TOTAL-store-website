<?php
include 'connect.php';



    //..........transfer the value in the textbox to the variable...........................

    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

		
// INSERT TO DATABASE
$sql = "INSERT INTO products(`name`, `code`, `image`, `price`) VALUES ('$product_name', '$product_code', '$product_image', '$product_price')";


    if($product_name=="" || $product_code==""){	
		echo "<script>alert('Complete all field');history.back();</script>"; 
			} else { 
	
                if (mysqli_query($db, $sql)) {
                    //javscript that will display a message and transfer user to the other page name view.php...........
                      
echo "<script>alert('Product successfuly added.');window.location.href='../admin.php';</script>";

	}else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
  
      }
  



?>