<?php
include_once('config.php');
include_once('navbar.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <title>ERP</title>
    <style>
    body{
      background-color: #f8f9fa;
    }
    .table{
      color: black;
      /* margin-left: ; */
      position: absolute;
      width: 1100px;
      top: 24%; bottom: 0; left: 6%; right: 0;
      font-family: 'Helvetica Neue',Helvetica, Arial, cursive;
      text-align: center;
    }
    .btn{
      padding: 3px;
      font-size: 10px;
    }
    .dropdown-menu{
      font-size: 12px;
    }
    .img-with-text {
    text-align: center;
    width: 150px;
    margin-left: 35%;
    font-family: 'Helvetica Neue',Helvetica, Arial, cursive;
    }
    label{
      font-size: 14px;
      color: grey;
      /* line-height: 0.5; */
    }
    p{
      font-size: 16px;
      color: black;
      /* line-height: 0.7; */
    }
    div {
    /* white-space: normal; */
    word-wrap: break-word;
    }
    .showid{
      margin-left: 40%;
      font-size:15px;
      padding:5px;
      display:block;
    }
    .viewid{
      margin-left: 18%;
      display: none;
    }
    .searchbar{
      margin-left: 6%;
      margin-top: 2%;
      font-family: Verdana;
    }
    .myInput {
    /* background-image: url('search-icon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat; */
    width: 20%;
    font-size: 14px;
    padding: 10px 10px 12px 12px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
    border-radius: 6px;
  }
    </style>
  </head>
  <body>
    <div class="searchbar">
      Search by student name: <input type="text" id='search' class="myInput" onkeyup="myFunction()" placeholder="&#x1F50D; Search for names.." title="Type Student Name">
    </div>
    <br>
    <table class="table table-striped" id="myTable">
    <?php
    $sql='SELECT student_id,doe,student_name,email,contact,dob,education,course_name,course_id,gender,school,state,batch,photo,id from students';
    $result = $conn->query($sql);
    ?>
    <tr>
          <th>Student ID</th>
          <th>Date of Enrollment</th>
          <th>Name</th>
          <th>Course Details</th>
          <th></th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        ?>
          <tr>
          <td><?php echo $row["student_id"]; ?></td>
          <td><?php echo $row["doe"]; ?></td>
          <td><?php echo $row["student_name"]; ?></td>
          <td><?php echo $row["course_id"]; ?><br><?php echo $row["course_name"]; ?></td>
          <td><button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal<?php echo $row["student_id"]; ?>' style="font-size:15px;padding:5px;">View Details</button></td>
          </tr>

          <div class="modal fade" tabindex="-1" role="dialog" id="myModal<?php echo $row['student_id'] ?>">
            <div class="modal-dialog" role="document" style="max-width: 55%;">
              <div class="modal-content">
                <div class="modal-header" style="background-color: #f8f9fa;">
                  <h5 class="modal-title">Student Information Card</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="background-color: #f8f9fa;">
                  <div class="img-with-text">
                  <img src="<?php echo $row["photo"]; ?>" class="rounded-circle" alt="Photo" width="150" height="150">
                    <h5><?php echo $row['student_name']; ?></h5>
                  </div>
                  <br>
                  <div class="container row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                      <label>DOB&nbsp;<i class="fa fa-birthday-cake" aria-hidden="true" style="font-size:14px;"></i></label>
                      <p><?php
                      $temp = explode("-",$row["dob"]);
                      $dob = $temp[2]."-".$temp[1]."-".$temp[0];
                      echo $dob; ?></p>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                      <label>Gender&nbsp;<i class="fa fa-venus-mars" aria-hidden="true" style="font-size:14px;"></i></label>
                      <p><?php echo $row['gender']; ?></p>
                    </div>
                    <div class="col-md-1"></div>
                  </div>
                  <br>
                  <div class="container row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                      <label>Education&nbsp;<i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:14px;"></i></label>
                      <p><?php echo $row['education']; ?></p>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                      <label>School/College&nbsp;<i class="fas fa-school" aria-hidden="true" style="font-size:14px;"></i></label>
                      <p>International Institute of Information Technology</p>
                    </div>
                    <div class="col-md-1"></div>
                  </div>
                  <br>
                  <div class="container row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                      <label>State&nbsp;<i class="fas fa-map-marker-alt" aria-hidden="true"  style="font-size:14px;"></i></label>
                      <p><?php echo $row['state']; ?></p>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                      <label>Contact Details</label>
                      <p><i class="fa fa-phone" aria-hidden="true" style="font-size:14px;color:grey;"></i>&nbsp;<?php echo $row['contact']; ?></p>
                      <p><i class="fa fa-envelope" aria-hidden="true" style="font-size:14px;display:inline;color:grey;"></i>&nbsp;<?php echo $row['email']; ?></p>
                    </div>
                  </div>
                  <br>
                  <button type="button" class="btn btn-secondary showid" onclick="showimg()">View ID</button><br><br>
                  <img src="<?php echo $row["id"]; ?>" class="rounded viewid" alt="ID" width="400" height="200">

                </div>
                <div class="modal-footer" style="background-color: #f8f9fa;">
                  <button type="button" class="btn btn-secondary" onclick="refreshPage()" style="font-size:15px;padding:5px;" data-dismiss="modal">Close</button>
                  <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
              </div>
            </div>
        </div>
    <?php
        }
    }
     ?>

</table>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script type="text/javascript">
  function showimg(){
    var img = document.getElementsByClassName('viewid');
    var btn = document.getElementsByClassName('showid');
    for(var i=0;i<img.length;i++){
      img[i].style.display='block';
    }
    for(var i=0;i<btn.length;i++){
      btn[i].style.display='none';
    }
  }

function refreshPage(){
    window.parent.location = window.parent.location.href;
}

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</body>
</html>
