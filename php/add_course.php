
<?php
// include_once('navbar.php');
include_once("config.php");
// sql to create table
$course_id=$_POST['course_id'];
$course_name=$_POST['course_name'];
$course_fee = $_POST['course_fee'];
$num_topics=$_POST['member'];
for ($i=0; $i<$num_topics ; $i++) {
$topics[$i]=$_POST['topic'.$i.''];
}
$batch_strength=$_POST['batch_strength'];

  $lang = implode(",",$topics);
   $course_name=strtolower($course_name);
  $course_name=str_replace(' ', '_', $course_name);
$sql = "CREATE TABLE $course_name (
  student_id varchar(10) NOT NULL PRIMARY KEY,
  student_name varchar(20) NOT NULL,
  topics varchar(1000),
  batch int(5)
  ) ";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql="INSERT INTO courses(course_id,course_name,num_topics,topics,course_fee,batch_strength) VALUES ('$course_id','$course_name','$num_topics','$lang','$course_fee','$batch_strength')";
if ($conn->query($sql) === TRUE) {
  echo "Course registered";
} else {
  echo "Error  " . $conn->error;
}
$conn->close();
header("refresh:0; url=all_courses.php");
?>
