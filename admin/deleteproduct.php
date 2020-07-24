<?php

include("./includes/db.inc.php");


if (isset($_POST['delete_btn'])) {
    $delete_id = $_POST['delete_id'];
    // echo   $delete_id;

    $sql = "DELETE FROM productss WHERE product_id= '$delete_id'";
    $sql1 = "DELETE FROM product_detailss WHERE product_id= '$delete_id'";
    if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE){
    echo "Record deleted successfully";
    header("Location: /admin/products.php");
    } else {
    echo "Error deleting record: " . $conn->error;
    }

$conn->close();

}