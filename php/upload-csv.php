<?php include_once("navbar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ERP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<style media="screen">
.jumbotron{
  width: 50%;
  background-color: #E8EEEE;
}
</style>
</head>
<body>
  <br>
<div class="jumbotron container">
    <h4 align='center'>Upload Excel(CSV) file</h4>
    <br>
    <form action="upload.php" method="post" enctype="multipart/form-data">
       <div class="form-row">
         <div class="col-md-1"></div>
           <div class="form-group col-md-6">
                   <input type="file" name="excelDoc" id="excelDoc" class="form-control" />
           </div>
           <div class="col-md-4">
               <input type="submit" name="uploadBtn" id="uploadBtn" value="Upload Excel" class="btn btn-secondary" />
           </div>
       </div>
    </form>
</div>
</body>
</html>
