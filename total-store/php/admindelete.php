<?php
        
    include 'connect.php';

    // sql to delete a record
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id=$id";

    if ($db->query($sql) === TRUE) {
        echo "<script>alert('Product deleted!');window.location.href='../useradmin.php';</script>";
    } else {
        echo "Error deleting record: " . $db->error;
    }

   


    

    
?>