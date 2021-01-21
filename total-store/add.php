<?php
      include '../midterm/php/connect.php';
      include '../midterm/html/adminheader.html';
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center>
<form action="../midterm/php/addproduct.php" method="POST">
    <input type="text" name="product_name" placeholder="Product name">
    <input type="text" name="product_code" placeholder="Product code">
    <input type="text" name="product_price" placeholder="Product price">
    <input type="file" name="product_image" placeholder="Photo">
    <input type="submit" value="Submit">
	<input type="reset" value="Reset">
    <a href="admin.php">Back to Records</a>
</form>
</center>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

