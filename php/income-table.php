<?php include_once("navbar.php");
 include_once("config.php");?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ERP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<style>
body{
  background-color: #f8f9fa;
}
.table{
  color: black;
  margin-left: 2%;
  position: absolute;
  width: 1200px;
  top: 20%; bottom: 0; left: 0; right: 0;
  font-family: Helvetica;
  text-align: center;
}
#add{
  position: absolute;
  margin-left: 90.5%;
  margin-top: 2%;
  padding: 3px;
  font-size: 16px;
}
.dropdown-menu{
  font-size: 12px;
}
.fa-download{
  position: absolute;
  margin-left: 86%;
  margin-top: 2.2%;
}
h6{
  margin-left: 2%;
  margin-top: 2.5%;
}
#filter_btn{
  position: absolute;
  margin-left: 82%;
  margin-top: 2%;
  padding: 3px;
  font-size: 16px;
}
#clear{
  position: absolute;
  margin-left: 75%;
  margin-top: 2.6%;
  padding: 3px;
  font-size: 16px;
  text-decoration: underline;
}
button{
  padding: 3px;
  font-size: 16px;
}
</style>
</head>

<body>
  <div>
  <a id="clear" href="income-table.php">Clear Filter</a>
  <a href='#' data-toggle="modal" data-target="#exampleModal"><i class="fa fa-calendar" title="Filter Date" id="filter_btn" aria-hidden="true" style="font-size:30px;color:black;"></i></a>
  <!-- <button type="button" id="filter_btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Filters</button> -->
  <a href="income-form.php"><input type="button" id="add" name="form" value="Add Income" class="btn btn-success"></a>
  <a href="export_income.php"><i class="fa fa-download" title="Download Income List" style="font-size:35px;color:grey;"></i></a>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Dates</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form name="filter-action" id="search_form" action="income-table.php" methon="post">

        <!-- <label for="category" class='control-label'>Filter by: </label>
        <select class="form-control" name="category">
            <option>Select</option>
            <option value="date">Date</option>
            <option value="type">Payment Type</option>
          </select> -->

        <div class="date filter">
          <label for="PayDate" class='control-label'>From: </label>
          <input type="date" class="form-control" name="fromdate" required><br>
          <label for="PayDate" class='control-label'>To: </label>
          <input type="date" class="form-control" name="todate" required>
        </div>

        <!-- <div class="type filter">
          <br>
          <label for="PayeeCat" class='control-label'>Payment Type: </label>
          <select class="form-control" name="category">
              <option>Select</option>
              <option value="Cash">Cash</option>
              <option value="Cheque">Cheque</option>
              <option value="DD">DD</option>
              <option value="NEFT / IMPS">NEFT / IMPS</option>
            </select>
        </div>
        <br><br> -->
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name='filter-action' class="btn btn-primary">Save</button>
  </div>
</form>
</div>
</div>
</div>

<div class="table table-striped">
  <table>
    <tr>
    <th width='2%'>Sr. No.</th>
    <th width='30%'>Payer Details</th>
    <th width='10%'>Amount</th>
    <th width='20%'>Payment Method</th>
    <th width='20%'>Payment Type</th>
    <th width='20%'>Date</th>
    </tr>
    <!-- </table> -->
<?php
  $total = 0;
  if(isset($_GET['filter-action'])){

    if(isset($_GET['filter-action']) and isset($_GET['fromdate']) and isset($_GET['todate'])){
    $fromdate=$_GET['fromdate'];
    $todate=$_GET['todate'];

    $date = date_create($fromdate);
    $fromdate = date_format($date,"Y-m-d");

    $date = date_create($todate);
    $todate = date_format($date,"Y-m-d");

    $sql = "SELECT * FROM income WHERE payment_date BETWEEN '$fromdate' and '$todate'";
    }

    elseif(isset($_GET['type'])){
      $type = $_GET['type'];
      $sql = "SELECT * FROM income WHERE payment_type='$type'";
    }

    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
      $total = $total + (double)$row['amount'];
       echo "<table>
       <tr>
           <td width='8%'>". $row['sr_no']."</td>
           <td width='20%'>". $row['payer_details']."</td>
           <td width='15%'>". $row['amount']."</td>
           <td width='20%'>".$row['payment_method']."</td>
           <td width='20%'>". $row['payment_type']."</td>
           <td width='20%'>". $row['payment_date']."</td>
        </tr>
        </table>";
   }
  }

  else{
    $sql = "SELECT * FROM income";

    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
      $total = $total + (double)$row['amount'];
       echo "<tr>
           <td width='2%'>". $row['sr_no']."</td>
           <td width='30%'>". $row['payer_details']."</td>
           <td width='10%'>". $row['amount']."</td>
           <td width='20%'>".$row['payment_method']."</td>
           <td width='20%'>". $row['payment_type']."</td>
           <td width='20%'>". $row['payment_date']."</td>
        </tr>";
   }
 }
?>

</table>
</div>
<h6>Total Income Amount:&nbsp;&nbsp;Rs. <?php echo $total; ?></h6>

<!-- Add Filters -->
<script>
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".filter").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".filter").hide();
            }
        });
    }).change();
});
</script>
<script type="text/javascript">
  function form_submit() {
    document.getElementById("search_form").submit();
   }
  </script>
</body>
</html>
<!-- " .$row['sr_no']." -->
