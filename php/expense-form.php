<?php include_once("navbar.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>ERP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="wileadsh=device-wileadsh, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<style>
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
.form-group.required .control-label:after {
   content:"*";
   color:red;
}
#container{
  columns: 2;
  -webkit-columns: 2;
  -moz-columns: 2;
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
</style>
</head>
<body>
<br>

<div class="jumbotron container">
  <div class="container form-row">
    <div class="col-lg-12">
      <h4 class="page-header">Add Expense Details</h4>
    </div>
  </div>
  <br>
  <form action="add-expense.php" method="post">
    <div class="form-row">
    <div class="form-group required col-md-4">
      <label for="PayDate" class='control-label'>Date of Payment: </label>
      <input type="date" class="form-control" name="paydate" required>
    </div>
    <div class="col-md-1"></div>
    <div class="form-group required col-md-7">
      <label for="Payee" class='control-label'>Payee Name: </label>
      <input type="text" class="form-control" name="payeename" required>
    </div>
  </div>
  <br>
  <div class="form-group required">
    <label for="PayeeCat">Payee Category: </label> &nbsp;&nbsp;&nbsp;
    <input type="radio" name="payeecat" value="Individual">&nbsp;&nbsp;Individual&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="payeecat" value="Organisation" checked>&nbsp;&nbsp;Organisation
  </div>
  <div class="form-row">
    <div class="form-group required col-md-4">
      <label for="" class='control-label'>Amount (Rs.): </label>
      <input type="number" name="amount" class="form-control" step="0.01" placeholder="0.00" required>
    </div>
    <div class="col-md-2"></div>
    <div class="form-group required col-md-6">
      <label for="category" class='control-label'>Payment Category: </label>
      <select class="form-control" name="category">
          <option>Select</option>
          <option value="Salary">Salary</option>
          <option value="Rent">Rent</option>
          <option value="Electricity">Electricity</option>
          <option value="Maintainance">Maintainance</option>
          <option value="Marketing">Marketing</option>
        </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group required col-md-6">
    <label for="" class='control-label'>Mode of payment: </label>
    <select class="form-control" name="mode" required>
        <option>Select</option>
        <option value="Cash">Cash</option>
        <option value="Cheque">Cheque</option>
        <option value="NEFT / IMPS">NEFT / IMPS</option>
        <option value="DD">DD</option>
      </select>
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
    <a href='expense-table.php'><input type="button" style="width:80px;font-size:16px;" value="Cancel" class="btn btn-secondary"></a>
  </div>
  <div class="col-md-4"></div>
</div>
</form>
</div>
<!-- </div> -->
</body>
</html>
