<?php
include_once('navbar.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "erp"; ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
    <div class="jumbotron">


   <div class="form-group">
    <div class="form-group">
    <form class="" action="add-follow_up.php?id=$id" method="post">
        <label for="exampleInputEmail1">Name:</label>
           <b>
        <?php
        $id = $_GET['id'];
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT Name FROM leads where Email_ID='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

          // echo $row['Name'];
          $n= $row['Name'];
        // echo "<input type='text' name="name" value=$n disabled>";
         ?>
         <input type="text" name="name" value="<?php echo $n;?> "  >
     </b>
       <br>
        <label for="exampleInputEmail1">Email</label>
        <b>
        <?php
        $sql = "SELECT Email_ID FROM leads where Email_ID='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        // echo $row["Email_ID"];
        $em= $row["Email_ID"];
        // echo "<input type='email' name='email' value=$em disabled>";
         ?>
         <input type="email" name="email" value="<?php echo $em;?> " >
         </b>
        <br>
        <label for="exampleFormControlSelect1">Interest Level</label>
        <?php
        $sql = "SELECT Interest_Level FROM follow_ups where Email_ID='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        // echo $row["Email_ID"];
        $il= $row["Interest_Level"];
        ?>
          <select class="form-control" id="exampleFormControlSelect1" name="IL" >
            <option value="none" selected disabled hidden>
           <?php echo $il;?>
      </option>
            <option value="Hot">Hot</option>
            <option value="Warm">Warm</option>
            <option value="Cold">Cold</option>
          </select>
          <br>

        <label for="exampleFormControlSelect1">Follow-up Details</label>
        <?php
        $sql = "SELECT Follow_up_details FROM follow_ups where Email_ID='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        // echo $row["Email_ID"];
        $fd= $row["Follow_up_details"];
        ?>
          <select class="form-control" id="exampleFormControlSelect1" name="FD" >
            <!-- <option>Select</option> -->
            <option value="none" selected disabled hidden>
           <?php echo $fd;?>
      </option>
            <option value="call_back">Call Back</option>
            <option value="meeting">Meeting Fixed</option>
            <option value="course">Send Course Details</option>
            <option value="fee">Send Fee Details</option>
            <option value="admission">Ready for Admission</option>
          </select>

          <br>

        <label for="">Next Follow-up Date</label>
        <?php
        $sql = "SELECT Date FROM follow_ups where Email_ID='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        // echo $row["Email_ID"];
        $d= $row["Date"];
        ?>
          <input type="date" name="date" value="<?php echo $d;?> ">
          <br>
        <label for="">Next Follow-up Time</label>
        <input type="time" id="appt" name="appt" min="09:00" max="18:00" required>
        <br>
        <input type="submit" name="submit" value="submit" class="btn btn-primary">


  </div>
  </form>
    </div>
  </body>
</html>
