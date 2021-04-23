<?php


$product_id = $_GET['id'];

include 'includes/conn.php';
$sql = "DELETE FROM products WHERE product_id = {$product_id}";

$result = mysqli_query($conn,$sql) or die("Query Unsuccessful !");

header("Location: http://localhost/Project/admin/itemmasterlist.php");

mysqli_close($conn);

?>
