<?php

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
 $sql = "INSERT INTO follow_ups(Name,Email_ID,Contact_No) select Name,Email_ID,Contact_No from leads WHERE Email_ID = '$id'";
 //select Name,Email_ID,Contact_No from leads";

 if(!mysqli_query($conn,$sql))
 {
   echo ' ';
 }
 else{
   echo ' ';
 }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>ERP</title>

    <style>
      #buttons{
        padding: 5px;
        font-size: 15px;
      }
    </style>
  </head>
  <body>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Follow Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Pop-up Form -->
        <form class="" action="add-follow_up.php" method="post">
          <div class="form-group">

            <label for="exampleInputEmail1">Name:</label>
            <?php

            $sql = "SELECT Name,Email_ID,Contact_No FROM follow_ups";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo $id;
             ?>


            <label for="exampleInputEmail1">Email</label>
            <?php
            $sql = "SELECT Name,Email_ID,Contact_No FROM follow_ups";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo $row["Email_ID"];
             ?>
            <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->


            <!-- <label for="exampleInputPassword1">Email</label>
            <input type="password" class="form-control" id="exampleInputPassword1"> -->


            <label for="exampleFormControlSelect1">Interest Level</label>
              <select class="form-control" id="exampleFormControlSelect1" name="IL">
                <option>Select</option>
                <option value="hot">Hot</option>
                <option value="warm">Warm</option>
                <option value="cold">Cold</option>
              </select>

            <label for="exampleFormControlSelect1">Follow-up Details</label>
              <select class="form-control" id="exampleFormControlSelect1" name="FD">
                <option>Select</option>
                <option value="call_back">Call Back</option>
                <option value="meeting">Meeting Fixed</option>
                <option value="course">Send Course Details</option>
                <option value="fee">Send Fee Details</option>
                <option value="admission">Ready for Admission</option>
              </select>

            <label for="">Next Follow-up Date</label>
              <input type="date" name="date" value="next_date">
            <label for="">Next Follow-up Time</label>
            <input type="time" id="appt" name="appt" min="09:00" max="18:00" required>


      </div>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" id="buttons" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <a href='follow_ups.php?id=".$row['Email_ID']."'><button type="button" id="buttons" class="btn btn-primary">Save changes</button></a> -->
      <?php
      $sql = "SELECT Name,Email_ID,Contact_No FROM follow_ups";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

      echo '<a href="follow_ups.php?id='.$row['Email_ID'].'">Follow up</a>'?>
      </div>
    </div>
  </div>
</div>

  </body>
</html>
