<?php
include_once('navbar.php');
include_once('config1.php');
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
  font-family: 'Helvetica Neue',Helvetica, Arial, cursive;
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
        <h4 class="page-header">Add Follow-Up</h4>
      </div>
    </div>
    <br>
    <form class="" action="add-follow_up.php?id=$id" method="post">
      <div class="form-row">
        <div class="col-md-6">
          <label class='control-label'>Name:</label>
          <?php
          $id = $_GET['id'];
          $sql = "SELECT Name FROM leads where Email_ID='$id'";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $n= $row['Name'];
           ?>
          <input type="text" name="name" value="<?php echo $n;?> " class="form-control" readonly style="border:none;font-size:15px;">
        </div>
        <div class="col-md-6">
          <label class='control-label'>Email:</label>
          <?php
          $sql = "SELECT Email_ID FROM leads where Email_ID='$id'";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          // echo $row["Email_ID"];
          $em= $row["Email_ID"];
          // echo "<input type='email' name='email' value=$em disabled>";
           ?>
           <input type="email" name="email" value="<?php echo $em;?>" class="form-control" readonly style="border:none;font-size:15px;">
        </div>
      </div>
      <br>
      <div class="form-row">
        <div class="form-group required col-md-4">
          <label class='control-label'>Interest Level:</label>
            <select class="form-control" id="exampleFormControlSelect1" name="IL">
              <option>Select</option>
              <option value="hot">Hot</option>
              <option value="warm">Warm</option>
              <option value="cold">Cold</option>
            </select>
        </div>
        <div class="col-md-2"></div>
        <div class="form-group required col-md-6">
          <label class='control-label'>Follow-up Details:</label>
            <select class="form-control" id="exampleFormControlSelect1" name="FD">
              <option>Select</option>
              <option value="call_back">Call Back</option>
              <option value="meeting">Meeting Fixed</option>
              <option value="course">Send Course Details</option>
              <option value="fee">Send Fee Details</option>
              <option value="admission">Ready for Admission</option>
            </select>
        </div>
      </div>
      <br>
      <label class='control-label'>Next Slot:</label><br>
      <div class="form-row">
        <div class="form-group required col-md-4">
            Date <input type="date" name="date" value="next_date" class="form-control" required>
        </div>
        <div class="col-md-1"></div>
        <div class="form-group required col-md-3">
          Time <input type="time" id="appt" name="appt" min="09:00" max="18:00" class="form-control" required>
        </div>
      </div>
      <br><br>
      <div class="form-row">
        <div class="col-md-3"></div>
        <div class="col-md-1">
          <input type="submit" name="submit" style="width:80px;font-size:15px;" value="Add" class="btn btn-secondary">
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
