<?php


$admin_id = $_GET['id'];

include 'includes/conn.php';
$sql = "DELETE FROM user_master WHERE Id = {$admin_id}";

$result = mysqli_query($conn,$sql) or die("Query Unsuccessful !");

header("Location: http://localhost/Project/admin/usermasterlist.php?msg=delete");

mysqli_close($conn);

?>
