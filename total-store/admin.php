<?php
include '../midterm/php/connect.php';
include '../midterm/html/adminheader.html';
session_start();

?>


<center>
<table align="center">
    <h5></h5>
    <h2>PRODUCTS</h2>
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Product name</th>
            <th scope="col">Code</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
    
<?php
    // DATA QUERY
    $sql = "SELECT `id`, `name`, `code`, `image`, `price` FROM `products`";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            ?>       
            <tr>           
            <td><?=$row['id']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['code']?></td>
            <td><img src="../midterm/assets/products/<?php echo $row['image'];?>" style="width:50px; height: 50px;"></td>
            <td><?=$row['price']?></td>
            <td><a href="edit.php?id=<?=$row['id']?>">Edit</a>&nbsp;<a href="../midterm/php/delete.php?id=<?=$row['id']?>">Delete</a></td>
            </tr>
      <?php  }
        } else {   ?>
        <h5>[NO RECORDS FOUND]</h5>
            <?php  }  ?>   
            <a href="add.php" >Add new product</a>     
</table>
        
<br>
<br>
<br>
<br>


<table align="center">
    <h5></h5>
    <h2>USERS</h2>
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">NAME</th>
            <th scope="col">LASTNAME</th>
            <th scope="col">AGE</th>
            <th scope="col">USERNAME</th>
            <th scope="col">PASSWORD</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
    
<?php
    // DATA QUERY
    $sql2 = "SELECT `id`, `username`, `password`, `name`, `lastname`, `age`, `date` FROM `user`";
    $result2 = $db->query($sql2);

    if ($result2->num_rows > 0) {
        // output data of each row
        while($row2 = $result2->fetch_assoc()) {
            ?>       
            <tr>           
            <td><?=$row2['id']?></td>
            <td><?=$row2['name']?></td>
            <td><?=$row2['lastname']?></td>
            <td><?=$row2['age']?></td>
            <td><?=$row2['username']?></td>
            <td><?=$row2['password']?></td>
            <td><a href="../midterm/php/delete.php?id=<?=$row2['id']?>">Delete</a></td>
            </tr>
      <?php  }
        } else {   ?>
        <h5>[NO USERS FOUND]</h5>
            <?php  }  ?>        
</table>


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
