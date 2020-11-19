<?php
$connection = new mysqli("localhost","root","","erp");
if (! $connection){
  die("Error in connection".$connection->connect_error);
}

$paydate=$_POST['paydate'];
$payeecat=$_POST['payeecat'];
$category=$_POST['category'];
$payeename=$_POST['payeename'];
$amount=$_POST['amount'];
$mode=$_POST['mode'];


$sql="INSERT INTO expense(payment_date,payee_cat,category,payee_name,amount,payment_mode) VALUES('$paydate','$payeecat','$category','$payeename','$amount','$mode')";

if(!mysqli_query($connection,$sql))
{
  echo 'Not inserted';
}
else{
  echo 'Inserted';
}

header("refresh:0; url=expense-table.php");

 ?>
