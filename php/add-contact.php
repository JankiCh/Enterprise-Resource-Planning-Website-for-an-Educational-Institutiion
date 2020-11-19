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
<style media="screen">
body{
  background-color: #f8f9fa;
  font-family: 'Helvetica Neue',Helvetica, Arial, cursive;
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
.form-group.required .control-label:after {
   content:"*";
   color:red;
}
.jumbotron{
  width: 50%;
  background-color: #E8EEEE;
}
</style>
</head>
<body>
<br>
<div class="container jumbotron">
  <div class="container form-row">
    <div class="col-lg-12">
      <h4 class="page-header">&nbsp;Add Contact Details</h4>
    </div>
  </div>
  <br>
  <form class="" action="contact-add.php" method="post">
    <div class="form-row">
      <div class="form-group required col-md-6">
        <label class='control-label'>Name</label>
        <input type="text" name="name" value="" class="form-control" required>
      </div>
      <div class="col-md-1"></div>
      <div class="form-group required col-md-4">
        <label class='control-label'>Date</label>
        <input type="date" name="date" class="form-control" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group required col-md-8">
        <label class='control-label'>Email</label>
        <input type="email" name="email" value="" class="form-control" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group required col-md-5">
        <label class='control-label'>Contact</label>
        <input type="mobile" name="mobile" value="" class="form-control" required>
      </div>
      <div class="col-md-1">
      </div>
      <div class="form-group col-md-5">
        <label class='control-label'>Source</label>
        <input type="text" name="source" value="" class="form-control">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-5">
        <label class='control-label'>Referred by</label>
        <input type="text" name="rb" value="" class="form-control">
      </div>
      <div class="col-md-1"></div>
      <div class="form-group required col-md-5">
        <label class='control-label'>Assigned to</label>
        <input type="text" name="at" value="" class="form-control" required>
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

    </div>
  </form>
<!-- </div> -->

</body>
</html>
