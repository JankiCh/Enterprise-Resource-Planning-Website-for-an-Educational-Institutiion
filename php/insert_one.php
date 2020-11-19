<?php
session_start();
$con = mysqli_connect('localhost','root');
mysqli_select_db($con, 'erp');
$name = $_POST['name'];
$email= $_POST['email'];
$s = "SELECT * FROM certificate1 where name = '$name'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num == 1){
  echo "You have already registered";
}
else{


 $reg = "INSERT INTO certificate1(name, email ) values('$name', '$email')";

  mysqli_query($con, $reg);
  header('content-type:image/jpeg');
$font="AGENCYR.TTF";
$image=imagecreatefromjpeg("images/course.jpeg");
$color=imagecolorallocate($image,19,21,22);
$name=$_POST['name'];
imagettftext($image,30,0,560,300,$color,$font,$name);
$date=date('d F,Y');
imagettftext($image,20,0,600,400,$color,"AGENCYR.TTF",$date);
imagejpeg($image);
imagedestroy($image);
}
?>
