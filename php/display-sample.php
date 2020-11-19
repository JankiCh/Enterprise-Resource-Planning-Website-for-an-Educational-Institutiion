<?php
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
$sql="SELECT * FROM students";
$count= $conn->query($sql);
   while($row = $count->fetch_assoc()){
     ?>
     <img src="<?php echo $row['photo']; ?>" alt="" width="500px" height="500px">
     
     <?php
}

 ?>
