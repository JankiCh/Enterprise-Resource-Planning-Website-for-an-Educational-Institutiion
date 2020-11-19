<?php
$connection = new mysqli("localhost","root","","erp");
if (! $connection){
  die("Error in connection".$connection->connect_error);
}

$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$source=$_POST['source'];
$date=$_POST['date'];
$rb=$_POST['rb'];
$at=$_POST['at'];



$sql="INSERT INTO leads (Name,Email_ID,Contact_No,Source,Date,Referred_By,Assigned_To) VALUES('$name','$email','$mobile','$source','$date','$rb','$at')";
if(!mysqli_query($connection,$sql))
{
  echo 'Not inserted';
}
else{
  echo 'Inserted';
}

header("refresh:0; url=leads.php");

 ?>
