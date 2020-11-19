<?php
$dbname = "erp";
$conn = mysqli_connect("localhost", "root", "", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['id'])){
$id = $_GET['id'];
// sql to delete a record
$sql = "DELETE FROM leads WHERE Email_ID = '$id'";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: leads.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
}
?>
