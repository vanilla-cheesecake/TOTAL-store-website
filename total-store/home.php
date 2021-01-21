<?php 
  include('header.php');
  include '../midterm/php/connect.php';

     

  if(isset($_POST["add_to_cart"]))  
  {  
       if(isset($_SESSION["shopping_cart"]))  
       {  
            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
            if(!in_array($_GET["id"], $item_array_id))  
            {  
               
                 $item_array = array(  
                      'item_id'               =>     $_GET["id"],  
                      'item_name'               =>     $_POST["hidden_name"],  
                      'item_price'          =>     $_POST["hidden_price"],  
                      'item_quantity'          =>     $_POST["quantity"]  
                 );
                  
                 array_push($_SESSION['shopping_cart'], $item_array);  
            }  
            else  
            {  
                 echo '<script>alert("Item Already Added")</script>';  
                 echo '<script>window.location="home.php"</script>';  
            }  
       }  
       else  
       {  
            $item_array = array(  
                 'item_id'               =>     $_GET["id"],  
                 'item_name'               =>     $_POST["hidden_name"],  
                 'item_price'          =>     $_POST["hidden_price"],  
                 'item_quantity'          =>     $_POST["quantity"]  
            );  
            $_SESSION["shopping_cart"][0] = $item_array;  
       }  
  }  
  if(isset($_GET["action"]))  
  {  
       if($_GET["action"] == "delete")  
       {  
            foreach($_SESSION["shopping_cart"] as $keys => $values)  
            {  
                 if($values["item_id"] == $_GET["id"])  
                 {  
                      unset($_SESSION["shopping_cart"][$keys]);  
                      echo '<script>window.location="home.php"</script>';  
                 }  
            }  
       }  
  } 
?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Trending <b>Products</b></h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
		
			<!-- Wrapper for carousel items -->
			<div class="carousel-inner">
				<div class="item carousel-item active">
					<div class="row">

<?php  
$query = "SELECT * FROM products ORDER BY id ASC";  
$result = mysqli_query($db, $query);  
if(mysqli_num_rows($result) > 0)  {  
     while($row = mysqli_fetch_array($result))  
     { ?>
						<div class="col-sm-3">
							<div class="thumb-wrapper">
                                   <form method="post" action="home.php?action=add&id=<?php echo $row["id"]; ?>"> 
								<div class="img-box">
                                        <img src="../midterm/assets/products/<?php echo $row["image"]; ?> " class="img-responsive img-fluid" alt=""/>
								     </div>
								<div class="thumb-content">
									<h4><?php echo $row["name"]; ?></h4>
									<p class="item-price"><strike>₱400.00</strike> <span>₱<?php echo $row["price"]; ?></span></p>
                                             <input type="text" name="quantity" value="1" />  
                         <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                         <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                                             <button type="submit" class="btn btn-primary" name="add_to_cart"value="Add to Cart">Add to cart</button> 
								</div>	
                                        </form>					
                                   </div>
                              </div>
<?php }} ?>    

					     </div>
				     </div>
                    </div>
		     </div>
		</div>
	</div>
</div>


   

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<center>
<table>  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="home.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span>Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table> 

                        </center>



  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>




<?php 
  include('html/footer.html');
?>
