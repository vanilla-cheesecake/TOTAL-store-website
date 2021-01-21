<?php
    include 'connect.php';
    $query = mysqli_query($db, "select * from products where id='".$_GET['id']."'");
    $row = mysqli_fetch_assoc($query);

?>
