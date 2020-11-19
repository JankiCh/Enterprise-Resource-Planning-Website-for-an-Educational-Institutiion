<?php
include_once('config.php');
$connection = new mysqli("localhost","root","","erp");
if (! $connection){
  die("Error in connection".$connection->connect_error);
}
// include_once('fee-status-table.php');

if(ISSET($_POST['updatedata'])){
  $new_payment = $_POST['new_payment'];
  $method = $_POST['payment_method'];
  $student = $_POST['student_details'];
  $type = $_POST['payment_type'];
  $date = $_POST['date'];

  $temp = explode("-",$student);
  $id = $temp[0]."-".$temp[1];

  $sql = "SELECT total_fee,fee_paid,status FROM fee_status WHERE student_id='$id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  $fee_paid = $row['fee_paid'] + $new_payment;
  $new_due = $row['total_fee'] - $fee_paid;

  $new_status = '';
  if($fee_paid == $row['total_fee']){
    $new_status = 'Paid';
  }
  elseif($fee_paid < $row['total_fee']){
    $new_status = 'Due';
  }

  $sql = "UPDATE fee_status SET fee_paid='$fee_paid',fee_due='$new_due',status='$new_status' WHERE student_id='$id'";
  $conn->query($sql);

  $sql_insert = "INSERT INTO income(payer_details,amount,payment_method,payment_type,payment_date) VALUES('$student','$new_payment','$method','$type','$date')";

  if(mysqli_query($conn,$sql_insert))
  {
    echo ' inserted';
  }
  else{
    echo 'not Inserted';
  }

  header("refresh:0; url=fee-status-table.php");
}
?>
