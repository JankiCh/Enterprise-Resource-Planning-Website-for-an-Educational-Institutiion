<?php
$connection = new mysqli("localhost","root","","erp");
if (! $connection){
  die("Error in connection".$connection->connect_error);
}

$paydate=$_POST['paydate'];
$paytype=$_POST['paytype'];
$payername=$_POST['payername'];
$amount=$_POST['amount'];
$mode=$_POST['mode'];


$sql="INSERT INTO income(	payer_details,amount,payment_method,payment_type,payment_date) VALUES('$payername','$amount','$mode','$paytype','$paydate')";

if(!mysqli_query($connection,$sql))
{
  echo 'Not inserted';
}
else{
  echo 'Inserted';
}

header("refresh:0; url=income-table.php");

 ?>
