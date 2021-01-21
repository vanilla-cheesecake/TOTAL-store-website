<?php
    include '../midterm/php/connect.php';
    include '../midterm/php/query.php';
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
<form action="../midterm/php/update.php" method="POST">
    <input type='hidden' name="id" value="<?=($_GET['id'])?$_GET['id']:''?>">
    <input type="text" name="product_name" value="<?=$row['name']?>" placeholder="Product name">
    <input type="text" name="product_code" value="<?=$row['code']?>" placeholder="Product code">
    <input type="text" name="product_price" value="<?=$row['price']?>" placeholder="Product price">
    <input type="file" name="product_image" value="<?=$row['image']?>" placeholder="Photo">
    <input type="submit" value="Update">
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
<br>
<br>
<br>
<br>
