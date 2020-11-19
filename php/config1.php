<?php
$dbHost = 'localhost';  //database host name
    $dbUser = 'root';       //database username
    $dbPass = '';           //database password
    $dbName = 'erp'; //database name
    $conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
    if(!$conn){
        die("Database connection failed: " . mysqli_connect_error());
    }
?>
