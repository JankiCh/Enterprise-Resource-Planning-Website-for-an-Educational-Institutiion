<?php
include_once('config1.php');
$id = $_GET['id'];
$email=$_POST['email'];
$name=$_POST['name'];
$IL=$_POST['IL'];
$FD=$_POST['FD'];
$date=$_POST['date'];


echo $email;
echo $name;
echo $IL;
echo $date;
// $sql="INSERT INTO follow_ups(Name,Email_ID,Date,Interest_Level,Next_Follow_up) values ('$name',''$email,'$date','$IL','$FD')";
$sql="INSERT INTO follow_ups(Name,Email_ID,Date,Interest_Level,Follow_up_details)  values ('$name','$email','$date','$IL','$FD')";
if(!mysqli_query($conn,$sql))
{
  echo 'Not inserted';
}
else{
  echo 'Inserted';
}



header("refresh:0; url=follow_ups.php");

 ?>
