<?php
include '../includes/db_connect.php';
$id = $_GET['id'];
echo $id;
$result = $db->prepare("DELETE FROM products WHERE product_id= :memid");
$result->bindParam(':memid', $id);
$result->execute();