<?php
session_start();
include('../includes/db_connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['memno'];

$f = $_POST['note'];
$g = $_POST['date'];
// query
$sql = "INSERT INTO customer (customer_name,address,contact,membership_number,note,expected_date) VALUES (:a,:b,:c,:d,:f,:g)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':f'=>$f,':g'=>$g));
header("location: customer.php");


?>