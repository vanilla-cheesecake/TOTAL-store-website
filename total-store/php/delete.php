<?php
        
    include 'connect.php';

    // sql to delete a record
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id=$id";

    if ($db->query($sql) === TRUE) {
        echo "<script>alert('Product deleted!');window.location.href='../admin.php';</script>";
    } else {
        echo "Error deleting record: " . $db->error;
    }

   

    $id2 = $_GET['id'];
    $sql2 = "DELETE FROM user WHERE id=$id2";

    if ($db->query($sql2) === TRUE) {
        echo "<script>alert('User deleted!');window.location.href='../admin.php';</script>";
    } else {
        echo "Error deleting record: " . $db->error;
    }

    

    
?>