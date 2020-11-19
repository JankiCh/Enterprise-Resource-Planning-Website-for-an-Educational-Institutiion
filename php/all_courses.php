<?php
session_start();

include_once("config.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $_SESSION['course'] = $row['course_name'];
    $_SESSION['course_batch'] = $_POST['batch'];
    if($_SESSION['course_batch']) {
        header('location: course_update.php');
    }
}
include_once('navbar.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ERP</title>
    <link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
<style>
body{
  background-color: #f8f9fa;
}
.square {
  word-wrap: break-word;
  padding: 20px;
  height: 250px;
  width: 300px;
  color: #b0320c;
  font-family: 'Averia Serif Libre', cursive;
  font-size: 13px;
  margin-bottom: 50px;
  border-radius: 20px;
  background: #f8f9fa;
  box-shadow:  25px 25px 50px #d3d4d5,
             -25px -25px 50px #ffffff;
}
h3{
  color: #281633;
  font-family: 'Averia Serif Libre', cursive;
}
#grid {
  margin-left: 6%;
  display: grid;
  width: 90%;
  grid-template-columns: 30% 30% 30%;
  grid-gap: 50px;
  padding: 20px;
}
.form-control{
  font-size: 13px;
  width: 130px;
  font-family: 'Averia Serif Libre', cursive;
}
.page-header {
    padding-bottom: 5px;
    margin: 5% 10% 0% 10%;
    border-bottom: 1px solid #eee;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
}
#header{
	font-family: 'Helvetica Neue',Helvetica, Arial, cursive;
	font-size: 18px;
  /* display: inline-block; */
  margin-left: 15%;
  margin-top: 3%;
}
.btn-success{
  margin-left: 48%;
  /* display: inline-block; */
  margin-top: -1%;
  background-color: #567376;
  border-color: #567376;
  /* 7D9DA1 */
  /* #596B7D */
}
.btn-success:hover, .btn-success:active, .btn-success:focus {
  background-color: #567376 !important;
  border-color: #567376 !important;
}
hr{
  padding-top: 2px;
  width: 75%;
  margin-left: 12%;
  background-color: #D2DADA;
}
</style>
</head>
<body>
  <div class="">
    <p id='header'> ONGOING COURSES
    <a href="add_course_form.php"><button type="button" class="btn btn-success" name="button">Add Course</button></a>
    <hr>
    </p>
  </div>
  <div id="grid">
<?php
$sql='SELECT * FROM courses';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      ?>
      <div class='square'>
        <div style="height:120px">
          <?php $cn=$row['course_name'];
         $cn=str_replace('_', ' ', $cn);
         $cn=strtoupper($cn);

           ?>
      <h3 align="center"><?php echo $cn; ?></h3><br><p align="center" style='color:#596B7D;'><?php echo $row['description']; ?></p>
    </div>
      <br><br>
      <form method="POST" action="all_courses.php" style="margin-left:50px;">
      <select class="form-control" name="batch" style="display:inline-grid;" oninvalid="this.setCustomValidity('Please select a batch first')" oninput="setCustomValidity('')" required >
        <option value="">Select Batch</option>
        <?php
        for ($i = 1; $i <= $row['batches']; $i++) {
          $temp = $row['course_name'] . "-" . $i;
          ?>
          <option value="<?php echo $temp; ?>">Batch <?php echo $i; ?></option>
        <?php } ?>
      </select>
    <button type="submit" id='go' class="btn" style="display:inline-grid;">
      <i class="fa fa-arrow-circle-o-right" title="View Progress" style="font-size:26px"></i>
    </button>
    </form>
    </div>
    <?php
        }
      }
    ?>
<br><br><br>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/angular-material-icons/0.7.1/angular-material-icons.min.js"></script>
</body>
</html>
