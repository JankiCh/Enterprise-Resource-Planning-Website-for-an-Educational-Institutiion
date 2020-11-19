<?php
include_once('config.php');
$course=$_POST['course'];
$date=$_POST['date'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$school=$_POST['school'];
$state=$_POST['state'];
$emailid=$_POST['emailid'];
$contact=$_POST['contact'];
$dob=$_POST['dob'];
$education=$_POST['education'];
$name=$fname." ".$mname." ".$lname;

$course = explode(" ",$course);
$course_id = $course[0];
$course=$course[2];
echo $course;
$sql="UPDATE courses set num_students=num_students+1 where course_name='$course'";
$result = $conn->query($sql);
$sql="SELECT * from courses where course_name='$course'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row['batch_strength'];
$id= $row['num_students'];
$batch=$row['batches'];
$sid=$row['course_id'].'-'.$id;
echo $sid;



//$batch=1;
// $sql="UPDATE courses set batches=1 where course_name='$course'";
//  $conn->query($sql);



echo $row['course_name'];
if ($row['num_students']%$row['batch_strength']==1) {
     $batch++;
     $sql="UPDATE courses set batches=batches+1 where course_name='$course'";
      $conn->query($sql);

  // code...
}
$sql="INSERT into $course(student_id,student_name,batch) values('$id','$name','$batch')";
//$result = $conn->query($sql);
$conn->query($sql);
// $sql="INSERT into students(student_id,doe,student_name,email,contact,course_name,gender,school,state,batch) values('$sid','$date','$name','$emailid','$contact','$course','$gender','$school','$state','$batch')";
// $result = $conn->query($sql);

// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'erp');

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);


// Uploads files
if (isset($_POST['register'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['id']['name'];
      $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $filename=$sid.'id.'.$extension;
    // destination of the file on the server
    $destination_id = 'uploads/' . $filename;

    // get the file extension


    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['id']['tmp_name'];
    $size = $_FILES['id']['size'];
    $path='uploads/'.$filename;
    echo $filename;
    if (!in_array($extension, [  'jpeg', 'jpg'])) {
        echo "You file extension must be  .jpg or .jpeg";
    } elseif ($_FILES['id']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination_id)) {
            $sql = "INSERT INTO files (name, size, downloads) VALUES ('$destination_id', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
if (isset($_POST['register'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['photo']['name'];
      $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $filename=$sid.'photo.'.$extension;
    // destination of the file on the server
    $destination_photo = 'uploads/' . $filename;

    // get the file extension


    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['photo']['tmp_name'];
    $size = $_FILES['photo']['size'];
    $path='uploads/'.$filename;
    echo $filename;
    if (!in_array($extension, [  'jpeg', 'jpg'])) {
        echo "You file extension must be  .jpg or .jpeg";
    } elseif ($_FILES['photo']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination_photo)) {
            $sql = "INSERT INTO files (name, size, downloads) VALUES ('$destination_photo', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "erp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<br>";
echo $destination_id;
echo "<br>";
echo $destination_photo;
$sql="INSERT into students(student_id,doe,student_name,dob,education,email,contact,course_id,course_name,gender,school,state,batch,photo,id) values('$sid','$date','$name','$dob','$education','$emailid','$contact','$course_id','$course','$gender','$school','$state','$batch','$destination_photo','$destination_id')";
if($conn->query($sql))
{
  echo "working";
}
else {
  echo "<br> not working";
}





if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}

$sql = "SELECT course_fee FROM courses WHERE course_id='$course_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$course_fee = $row['course_fee'];

$sql = "INSERT INTO fee_status(student_id,student_name,course_id,course_name,total_fee,fee_paid,fee_due,status)
        VALUES ('$sid','$name','$course_id','$course','$course_fee',0.00,'$course_fee','Not Initiated')";
$result = $conn->query($sql);

header("refresh:0; url=enrolled-student-list.php");
 ?>
