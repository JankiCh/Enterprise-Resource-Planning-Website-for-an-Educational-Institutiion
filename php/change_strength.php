<?php
include_once("config.php");
if (isset($_POST['submit'])) {
  // code...

echo $_POST['batch_strength'];
$batch_strength=$_POST['batch_strength'];
$course=$_POST['course'];
echo $course;
$sql="UPDATE courses set batch_strength=$batch_strength where course_name='$course'";
if ($conn->query($sql) === TRUE) {
  echo "Course registered";
} else {
  echo "Error  " . $conn->error;
}
}
header("refresh:0; url=course_update.php");

 ?>
