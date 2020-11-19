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



$sql="UPDATE leads  SET Name='$name', Email_ID='$email', Contact_No='$mobile', Source='$source', Date='$date', Referred_By='$rb', Assigned_To='$at' where Email_ID='$email'";
if(!mysqli_query($connection,$sql))
{
  echo 'Not inserted';
}
else{
  echo 'Inserted';
}

header("refresh:0; url=leads.php");

 ?>
