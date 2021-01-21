<?php

include "../midterm/php/connect.php";



?>
<center>
    <table>
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
        <br>
        <br>
        <br>

  <?php      
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
            <td><a href="../midterm/php/edit.php?id=<?=$row['id']?>">Edit</a>&nbsp;<a href="../midterm/php/admindelete.php?id=<?=$row['id']?>">Delete</a></td>
            </tr>
      <?php  }
        } else {   ?>
        <h5>[NO RECORDS FOUND]</h5>
            <?php  }  ?>   
            <a href="add.php" >Add new product</a>     
        </table>
        </center>