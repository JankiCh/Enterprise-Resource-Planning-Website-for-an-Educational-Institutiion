<?php include_once("navbar.php");
$id = $_GET['id'];
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

$sql = "SELECT Name,Email_ID,Contact_No,Source,Date,Referred_By,Assigned_to FROM leads where Email_ID='$id'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name=$row['Name'];
$email=$row['Email_ID'];
$contact=$row['Contact_No'];
$date=$row['Date'];
$source=$row['Source'];
$rb=$row['Referred_By'];
$at=$row['Assigned_to'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>ERP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="wileadsh=device-wileadsh, initial-scale=1">
<style media="screen">
body{
  background-color: #f8f9fa;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.jumbotron{
  width: 50%;
  background-color: #E8EEEE;
}
.page-header {
    padding-bottom: 5px;
    border-bottom: 3px solid #D2DADA;
    margin-top: -8%;
    margin-left: -5%;
}
h4 {
	font-family: 'Helvetica Neue',Helvetica, Arial, cursive;
	font-size: 18px;
}
#container{
  columns: 2;
  -webkit-columns: 2;
  -moz-columns: 2;
}
</style>
</head>
<body>
<br>
<div class="jumbotron container">
  <div class="container form-row">
    <div class="col-lg-12">
      <h4 class="page-header">Edit Lead</h4>
    </div>
  </div>
  <br>
  <form class="" action="add_edit.php" method="post">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class='control-label'>Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" readonly>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-4">
        <label class='control-label'>Date:</label>
        <input type="date" name="date" value="<?php echo $date; ?>" class="form-control">
      </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-8">
      <label class='control-label'>Email:</label>
      <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" readonly>
    </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-5">
        <label class='control-label'>Contact:</label>
        <input type="mobile" name="mobile" value="<?php echo $contact; ?>" class="form-control">
      </div>
      <div class="form-group col-md-2"></div>
      <div class="form-group col-md-5">
        <label class='control-label'>Source:</label>
        <input type="text" name="source" value="<?php echo $source; ?>" class="form-control">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-5">
        <label class='control-label'>Referred by:</label>
        <input type="text" name="rb" value="<?php echo $rb; ?>" class="form-control">
      </div>
      <div class="form-group col-md-2"></div>
      <div class="form-group col-md-5">
        <label class='control-label'>Assigned to:</label>
        <input type="text" name="at" value="<?php echo $at ?>" class="form-control">
      </div>
    </div>
    <br><br>
    <div class="form-row">
      <div class="col-md-3"></div>
      <div class="col-md-1">
        <input type="submit" name="submit" style="width:80px;font-size:15px;" value="Edit" class="btn btn-secondary">
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-1">
        <a href='leads.php'><input type="button" style="width:80px;font-size:16px;" value="Cancel" class="btn btn-secondary"></a>
      </div>
      <div class="col-md-4"></div>
    </div>
</form>
</div>
</body>
</html>
