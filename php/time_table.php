<?php
include_once("navbar.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "erp";
$id="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <a href="#"><button type="button" class="btn btn-success">Cources</button></a>
    <a href="#">  <button type="button" class="btn btn-warning">students</button></a>

    </div>
  </body>
</html>
