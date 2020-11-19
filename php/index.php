<?php include_once("navbar.php");
  include_once("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body{
  background-color: #f8f9fa;
}
* {
  box-sizing: border-box;
}
/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 250px; /* Should be removed. Only for demonstration */
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.container{
  margin: auto;
  /* width: 50%; */
  border: 1px solid black;
  padding: 10px;
}
.img-with-text {
text-align: center;
width: 150px;
color: black;
/* margin-left: 35%; */
font-family: 'Helvetica Neue',Helvetica, Arial, cursive;
/* border-radius:100px; */
margin-left:30%;
}
.list{
  margin-left: 10%;
}
.list1{
  /* font-size: 12px; */
  margin-left: 10%;
  /* line-height: 16px; */
  /* margin-top: 2px; */
  margin-bottom: 0;
  /* line-height: px; */
}
hr{
  border: 1px solid black;
  margin-top: 5px;
  /* position: fixed; */
}
.paid{
  background-color: #7fed7b;
  color: black;
}
.due{
  background-color: #f5bc49;
  color: black;
}
.nill{
  background-color: #fa4343;
  color: black;
}
</style>
</head>
<?php
$query = "SELECT * FROM leads";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
if($row){
  $leads = $row;
}
else{
  $leads=0;
}
$query = "SELECT * FROM follow_ups";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
if($row){
  $followups = $row;
}
else{
  $followups=0;
}
$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
if($row){
  $students = $row;
}
else{
  $students=0;
}
$sql = "SELECT * FROM expense";
$result = $conn->query($sql);
$exp=0;
while($row = $result->fetch_assoc()){
  $exp = $exp + (double)$row['amount'];
}
$sql = "SELECT * FROM income";
$result = $conn->query($sql);
$inc=0;
while($row = $result->fetch_assoc()){
  $inc = $inc + (double)$row['amount'];
}
$query = "SELECT * FROM courses";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
if($row){
  $courses = $row;
}
else{
  $courses=0;
}
$query = "SELECT * FROM fee_status WHERE status='Paid'";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
if($row){
  $paid = $row;
}
else{
  $paid=0;
}
$query = "SELECT * FROM fee_status WHERE status='Due'";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
if($row){
  $due = $row;
}
else{
  $due=0;
}
$query = "SELECT * FROM fee_status WHERE status='Not Initiated'";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
if($row){
  $nill = $row;
}
else{
  $nill=0;
}
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);
$batches=0;
while($row = $result->fetch_assoc()){
  $batches = $batches + (int)$row['batches'];
}
?>
<body>
<br>
<div class="container row">
  <div class="column" style="background-color:#C4D4D4;border:1px solid black;">
    <div class="img-with-text">
      <img src="images/coldcall.jpeg" alt="" width="100px" height="100px" style="border-radius:100px;">
      <h5 align="center">Cold Calling</h5>
    </div>
    <hr>
    <p class="list"><a href="leads.php">Leads</a> &nbsp;&nbsp;<span class="w3-badge w3-white"><?php echo $leads; ?></span></p>
    <p class="list"><a href="follow_ups.php">Follow-ups</a> &nbsp;&nbsp;<span class="w3-badge w3-white"><?php echo $followups; ?></span></p>
  </div>
  <div class="column" style="background-color:#C4D4D4;border:1px solid black;">
    <div class="img-with-text">
      <img src="images/admi.jpeg" alt="" width="100px" height="100px" style="border-radius:100px;">
      <h5 align="center">Admissions</h5>
    </div>
    <hr>
    <p class="list"><a href="enrolled-student-list.php">Enrolled students</a> &nbsp;&nbsp;<span class="w3-badge w3-white"><?php echo $students; ?></span></p>
  </div>
  <div class="column" style="background-color:#C4D4D4;border:1px solid black;">
    <div class="img-with-text">
      <img src="images/incexp.jpeg" alt="" width="100px" height="100px" style="border-radius:100px;">
      <h5 align="center">Finance</h5>
    </div>
    <hr>
    <p class="list"><a href="income-table.php">Total Income</a> -&nbsp;&nbsp;Rs.<?php echo $inc; ?></p>
    <p class="list"><a href="expense-table.php">Total Expense</a> -&nbsp;&nbsp;Rs.<?php echo $exp; ?></p>
  </div>
</div>
<br>
<div class="container row">
  <div class="column" style="background-color:#C4D4D4;border:1px solid black;">
    <div class="img-with-text">
      <img src="images/courses.jpeg" alt="" width="100px" height="100px" style="border-radius:100px;">
      <h5 align="center">Courses</h5>
    </div>
    <hr>
    <p class="list"><a href="all_courses.php">Ongoing Courses</a> &nbsp;&nbsp;<span class="w3-badge w3-white"><?php echo $courses; ?></span></p>
    <!-- <p class="list">Follow-ups &nbsp;&nbsp;<span class="w3-badge w3-white"><?php echo $followups; ?></span></p> -->
  </div>
  <div class="column" style="background-color:#C4D4D4;border:1px solid black;">
    <div class="img-with-text">
      <img src="images/fees.png" alt="" width="100px" height="100px" style="border-radius:100px;">
      <h5 align="center">Fee Status</h5>
    </div>
    <hr>
    <p class="list1" style="margin-top:-4px;"><a href="fee-status-table.php">Paid</a> &nbsp;&nbsp;<span class="w3-badge paid"><?php echo $paid; ?></span></p>
    <p class="list1" style="margin-top:4px;"><a href="fee-status-table.php">Due</a> &nbsp;&nbsp;<span class="w3-badge due"><?php echo $due; ?></span></p>
    <p class="list1" style="margin-top:4px;"><a href="fee-status-table.php">Not Initiated</a> &nbsp;&nbsp;<span class="w3-badge nill"><?php echo $nill; ?></span></p>
  </div>
  <div class="column" style="background-color:#C4D4D4;border:1px solid black;">
    <div class="img-with-text">
      <img src="images/batch.png" alt="" width="100px" height="100px" style="border-radius:100px;">
      <h5 align="center">Batches</h5>
    </div>
    <hr>
    <p class="list"><a href="all_courses.php">Total Batches</a> &nbsp;&nbsp;<span class="w3-badge w3-white"><?php echo $batches; ?></span></p>
  </div>
</div>

</body>
</html>
