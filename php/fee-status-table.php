<?php include_once('navbar.php');
include_once('config.php');
include_once('update_fee.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ERP</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
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
  /* tr:hover {background-color:#8a8883;} */
  .dropdown-menu{
    font-size: 12px;
  }
  #dropdownMenuButton{
    padding: 3px;
    font-size: 10px;
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
.searchbar{
  margin-left: 6%;
  margin-top: 2%;
  font-family: Verdana;
}
.modal input,select{
  font-size: 13px;
  padding: 5px;
  font-family: Verdana;
  text-align: center;
  border-radius: 2px;

}
.modal{
  font-family: Verdana;
  font-size: 15px;
}
.page-header {
    padding-bottom: 5px;
    margin: auto;
    border-bottom: 2px solid #eee;
}
h5 {
  text-align: left;
	font-family: 'Helvetica Neue',Helvetica, Arial, cursive;
	font-size: 15px;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.form-group.required .control-label:after {
   content:"*";
   color:red;
}
  </style>
  </head>
  <body>

    <div class="modal fade" id="update_modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document" style="max-width: 65%;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-group" action="update_fee.php" method="POST">
              <div class='form-group'>
              <div class="row">
              <div class="col-md-6">
                <label class='control-label'>Student Details: </label>
                <input type="text" id='studentdetails' name="student_details" class="form-control" style='width: 70%;' readonly>
              </div>
              <div class="col-md-6">
                <label class='control-label'>Course Details:</label>
                <input type="text" id='coursedetails' name="course_details" class="form-control" style='width: 70%;' disabled>
              </div>
            </div>
            <br>
            <div class="row">
              <!-- <div class="col-md-1"></div> -->
              <div class="col-md-6">
                <label class='control-label'>Amount Due:</label>
                <input type="number" name="fee_due" id='feedue' class="form-control" style='width: 40%;' disabled>
              </div>
              <div class="col-md-6">
                <label class='control-label'>Status:</label>
                <input type="text" name="status" id='status' class="form-control" style='color:black;width: 40%;' disabled>
              </div>
              <!-- <div class="col-md-1"></div> -->
            </div>
            <br><br>
            <div class="row">
              <div class="col-lg-12">
                <h5 class="page-header">Add New Payment</h5>
              </div>
            </div>
            <br>
            <div class="row">
              <!-- <div class='form-group required'> -->
              <div class="col-md-6">
                Amount:
                <input type="number" class="form-control" name="new_payment" id='amount' style='width:40%;display:inline;' required>
              </div>
              <div class="col-md-6">
                Payment Method:
                <select name="payment_method" class='myInput' style='width:40%;' required>
                    <option>Select</option>
                    <option value="Cash">Cash</option>
                    <option value="Cheque">Cheque</option>
                    <option value="DD">DD</option>
                    <option value="NEFT / IMPS">NEFT / IMPS</option>
                  </select>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                Date:&nbsp;&nbsp;&nbsp;<input id="date-field" class="form-control" type="date" name="date" style='width:45%;display:inline;'>

              </div>
              <div class="col-md-6">
                Payment Type: <input type="text" class="form-control" name="payment_type" value="Student Fee" style="width:40%;display:inline;" readonly>
              </div>
            </div>
          </div>
            <!-- </form> -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name='updatedata' class="btn btn-primary">Update</button>
          </div>
        </form>
        </div>
      </div>
    </div>


    <div class="searchbar">
      Search by student name: <input type="text" id='search' class="myInput" onkeyup="myFunction()" placeholder="&#x1F50D; Search for names.." title="Type Student Name">
    </div>

    <div class="table table-striped">
      <table id="myTable">
        <tr>
        <th width='5%'>Student ID</th>
        <th width='20%'>Student Name</th>
        <th width='20%'>Course Details</th>
        <th width='10%'>Total Fees</th>
        <th width='10%'>Fees Paid</th>
        <th width='10%'>Fees Due</th>
        <th width='20%'>Status</th>
        <th width='25%'>Actions</th>
        </tr>

    <?php
        $sql = "SELECT * FROM fee_status";
        $result = $conn->query($sql);
        $i = 1;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                <td width='5%'><?php echo $row["student_id"]; ?></td>
                <td width='20%'><?php echo $row["student_name"]; ?></td>
                <td width='20%'><?php echo $row["course_id"]; ?><br><?php echo $row["course_name"]; ?></td>
                <td width='10%'><?php echo $row["total_fee"]; ?></td>
                <td width='10%'><?php echo $row["fee_paid"]; ?></td>
                <td width='10%'><?php echo $row["fee_due"]; ?></td>
                <?php if(strcmp($row['status'],"Paid") === 0){
                        $color = 'green';
                      }
                      if(strcmp($row['status'],"Due") === 0){
                        $color = 'orange';
                      }
                      if(strcmp($row['status'],"Not Initiated") === 0){
                        $color = 'red';
                      }
                ?>
                <td width='20%' style="color:<?php echo $color;?>"><?php echo $row["status"]; ?></td>
                <td width='25%'>
                  <div class='dropdown'>
                    <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                      Actions
                    </button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                      <a class='dropdown-item updatebtn' data-toggle='modal' data-target="#update_modal<?php echo $row['student_id']; ?>">Update Payment</a>
                    </div>
                  </div>
                </td>
              </tr>

                <!-- Update Payment Modal -->


      <?php
      // include 'update_modal.php';
            }
          }
    ?>

</table>
</div>
<!-- Search bar -->
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
<script>
// document.getElementById('date-field').value = new Date().toISOString().slice(0, 10);
document.getElementById('date-field').valueAsDate = new Date();
</script>
<script type="text/javascript">
  $(document).ready( function () {
    $('.updatebtn').on('click', function() {
      $('#update_modal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();

      console.log(data);
      var temp = data[0] + "-" + data[1];
      $('#studentdetails').val(temp);
      $('#coursedetails').val(data[2]);
      $('#feedue').val(data[5]);
      $('#status').val(data[6]);
      $('#amount').attr("placeholder", data[5]);
      if(data[6]=='Paid'){
        $('#status').css({"background-color":"#7fed7b"});
      }
      else if(data[6]=='Not Initiated') {
        $('#status').css({"background-color":"#fa4343"});
      }
      else if(data[6]=='Due') {
        $('#status').css({"background-color":"#f5bc49"});
      }
    });
  });
</script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>
