<?php

session_start();

$con = mysqli_connect('localhost','root');
mysqli_select_db($con, 'erp');
$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];
$s = "SELECT * FROM certificate2 where name = '$name'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num == 1){
  echo "Username already taken";
}
else{


 $reg = "INSERT INTO certificate2(name, email, course ) values('$name', '$email', '$course')";

  mysqli_query($con, $reg);
  header('content-type:image/jpeg');
$font="AGENCYR.TTF";
$image=imagecreatefromjpeg("images/course1.jpeg");
$color=imagecolorallocate($image,19,21,22);
$name=$_POST['name'];
imagettftext($image,30,0,560,350,$color,$font,$name);
$course=$_POST['course'];
imagettftext($image,30,0,500,445,$color,$font,$course);
$date2=$_POST['date2'];
imagettftext($image,20,0,600,530,$color,"AGENCYR.TTF",$date2);
$date1="2020-08-1";
imagettftext($image,20,0,350,530,$color,"AGENCYR.TTF",$date1);
$hours="100";
imagettftext($image,20,0,450,580,$color,"AGENCYR.TTF",$hours);


imagejpeg($image);


imagedestroy($image);
}
?>
