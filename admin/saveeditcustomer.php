<?php
// configuration
include('../includes/db_connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['memno'];
$f = $_POST['note'];
$g = $_POST['date'];
// query
$sql = "UPDATE customer 
        SET customer_name=?, address=?, contact=?, membership_number=?,  note=?, expected_date=?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$f,$g,$id));
header("location: customer.php");

?>