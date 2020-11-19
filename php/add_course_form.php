<?php include_once('navbar.php');?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ERP</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
    h4 {
    	font-family: 'Helvetica Neue',Helvetica, Arial, cursive;
    	font-size: 18px;
    }
    .page-header {
        padding-bottom: 5px;
        border-bottom: 3px solid #D2DADA;
        margin-top: -8%;
        margin-left: -5%;
    }
    .btn-secondary{
      display:inline;
      font-size:15px;
      padding:5px;
      margin-left:40%;
    }
    .btn-primary{
      background-color: #8BA7A7;
      border-color: #8BA7A7;
      font-size:15px;
      padding:5px;
    }
    .btn-primary:hover, .btn-primary:active, .btn-primary:focus {
      background-color: #7D9DA1 !important;
      border-color: #7D9DA1 !important;
    }
  </style>
  </head>
  <body>
    <br>
    <div class="jumbotron container">
      <div class="container form-row">
        <div class="col-lg-12">
          <h4 class="page-header">Add New Course</h4>
        </div>
      </div>
      <br>
  <form method="post" action="add_course.php">
  <div class="form-row">
    <div class="form-group required col-md-6">
      <label class='control-label'>Course ID: </label>
      <input type="number" class="form-control quantity" name="course_id" style="width:150px;" required>
    </div>
    <div class="form-group col-md-6 required">
      <label class='control-label'>Course Name: </label>
      <input type="text" class="form-control" name="course_name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Description: </label>
    <textarea class="form-control" rows="4" name="desc"></textarea>
  </div>

  <div class="form-row">
    <div class="form-group required col-md-6 ">
      <label for="inputAddress" class='control-label'>Batch Strength: </label>
      <input type="number" name="batch_strength" value="" class="form-control" style="width:150px;" required>
    </div>

    <div class="form-group required col-md-6 ">
      <label for="inputAddress" class='control-label'>Course Fee: </label>
      <input type="number" name="course_fee" value="" class="form-control" style="width:200px;" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group required col-md-8">
      <label class='control-label'>Number of topics: </label><br>
      <input type="number" min="0" name="member" id="member" class="form-control" style="width:150px;display:inline;">&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="button" onclick="addFields()" class="btn btn-primary" name="button">&nbsp;Add Topics&nbsp;</button>
    </div>
    <!-- <div class="form-group col-md-5">

  </div> -->
  <!-- <br><br> -->

    <div id="container"></div>
  </div>
  <br>

  <br>
  <button type="submit" class="btn btn-secondary">&nbsp;Submit&nbsp;</button>
</form>
</div>

<script src="./src/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>
<script type='text/javascript'>
function addFields(){
    // Number of inputs to create
    var number = document.getElementById("member").value;
    // Container <div> where dynamic content will be placed
    var container = document.getElementById("container");
    // Clear previous contents of the container
    // while (container.hasChildNodes()) {
    //     container.removeChild(container.lastChild);
    // }
    for (i=0;i<number;i++){
        // Append a node with a random text
        var text = container.appendChild(document.createTextNode("Topic " + (i+1) + ": "));
        document.getElementById("container").appendChild(text);
        // Create an <input> element, set its type and name attributes
        var input = document.createElement("input");
        input.type = "text";
        input.name = "topic" + i;
        container.appendChild(input);
        document.getElementById("container").appendChild(input);
        // Append a line break
        container.appendChild(document.createElement("br"));
        container.appendChild(document.createElement("br"));
    }
}
</script>
</body>
</html>
