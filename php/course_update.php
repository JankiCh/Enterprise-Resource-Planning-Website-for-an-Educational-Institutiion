<?php
session_start();
include_once("navbar.php");
include_once("config.php");
// $id = $_GET['id1'];
$id = $_SESSION['course_batch'];

$id = explode("-",$id);
$course = $id[0];
$batch = $id[1];
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/checkbox.css">
    <link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.17.1/bootstrap-table-locale-all.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  body{
    background-color: #f8f9fa;
  }
  .table{
    color: black;
    /* margin-left: ; */
    position: absolute;
    width: 1100px;
    top: 16%; bottom: 0; left: 6%; right: 0;
    font-family: 'Helvetica Neue',Helvetica, Arial, cursive;
    text-align: center;
  }
  .btn{
    padding: 5px;
    font-size: 15px;
  }
  input.largerCheckbox {
    width: 30px;
    height: 30px;
  }
  #header{
  	font-family: 'Helvetica Neue',Helvetica, Arial, cursive;
  	font-size: 18px;
    font-weight: bold;
  }
  .row {
    width: 85%;
    margin-top: 1%;
    margin-left: 6%;
    height: 5%;
  }
  .col-lg-6,.col-lg-4,.col-lg-2,.col-lg-1{
  	float:left;
    margin-top: 1.5%;
    word-wrap: break-word;
  }

  .batch_strength{
    width:50px;
    height: 30px;
    display:inline-grid;
    border-radius: 3px;
  }
  hr{
    margin-top: 0.5%;
    padding-top: 1px;
    width: 85%;
    margin-left: 7%;
    background-color: #D2DADA;
  }
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
</style>
</head>
<body>
  <?php
  $i=2;
  $c=0;

  $sql="SELECT student_id FROM $course";
  $count= $conn->query($sql);

  while($row = $count->fetch_assoc()){
    $c++;
  }
  $sql="SELECT * from courses where course_name='$course'";
  $result = $conn->query($sql);
$row = $result->fetch_assoc();
$batch_strength=$row['batch_strength'];
 $num_topics=$row['num_topics'];
 $topics=$row['topics'];
 // echo $topics;
 $topic_a= explode(",",$topics);
// echo $id;
if ($c!=0) {

$sql="SELECT * FROM $course";
$count= $conn->query($sql);
  $x=1;
    while($row = $count->fetch_assoc()){
      {
      if(isset($_POST['submit'.$x.''])){
        if(!empty($_POST['lang'.$x.''])) {
          $lang = implode(",",$_POST['lang'.$x.'']);
          $checkEntries = mysqli_query($conn,"SELECT * FROM $course where student_id=$x ");
          if(mysqli_num_rows($checkEntries) == 0){
            mysqli_query($conn,"INSERT INTO $course(topics) VALUES('".$lang."') where student_id=$x");
          }
          else{
            mysqli_query($conn,"UPDATE $course SET topics='".$lang."' where student_id=$x");
          }
        }
        elseif (empty($_POST['lang'.$x.''])) {
          break;
        }
      }
      $x++;
    }
  }
}
else {
  echo "No entries on this course";
}
?>
<form action="change_strength.php" method="post">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <div class="col-lg-6">
          <label id="header">
            <?php
            $cn=str_replace('_', ' ', $course);
            $cn=strtoupper($cn);
            echo $cn; ?>&nbsp;&nbsp;&nbsp;Batch <?php echo $batch; ?>
          </label>
        </div>
        <!-- <div class="col-lg-2"></div> -->
        <div class="col-lg-6" style="display:flex;justify-content:flex-end;">
          <label>Batch Strength:</label>&nbsp;&nbsp;&nbsp;
          <input type="number" class="batch_strength" name="batch_strength" value="<?php echo $batch_strength;?>">
          <input type="text" name="course" value=<?php echo $course; ?> hidden>&nbsp;&nbsp;&nbsp;
          <button type="submit" name="submit" class="btn" style="height:32px;">
            <i class="fas fa-edit" title="Change Batch Strength" style="font-size:26px;line-height:50%;"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</form>
<hr>
<div class="table table-striped">
<form method="post" action="">
<br><br>
<?php

if ($c!=0){
    $checked_arr = array();
    echo "<table><tr>";
    echo "<th width='10%'>Student Name</th>";
    for ($i=0; $i <$num_topics ; $i++) {
      echo "<th width='10%'>$topic_a[$i]</th>";
    }
    echo "<th width='10%'>Action</th>
          </tr>";
    echo "<tr>";
    $count=1;
    $sql="SELECT * FROM $course";
    $count= $conn->query($sql);  $x=1;
    while($row = $count->fetch_assoc()){
    $fetchLang = mysqli_query($conn,"SELECT * FROM $course  where student_id=$x  ");
    if($row['batch']==$batch){
      $name=$row['student_name'];
      echo "<td width='10%'>$name</td>";}
    if(mysqli_num_rows($fetchLang) > 0){
      $result = mysqli_fetch_assoc($fetchLang);
      $checked_arr = explode(",",$result['topics']);
      echo "</br>";
    }
    // Create checkboxes
    for ($i=0; $i <$num_topics ; $i++) {
      // $languages_arr[$i]="Topic".$i."";
      // code...
      $languages_arr[$i]=$topic_a[$i];
    }
    foreach($languages_arr as $language){
      $checked = "";
      if(in_array($language,$checked_arr)){
        $checked = "checked";
      }
  if($row['batch']==$batch){
      echo '<td width="10%"><input type="checkbox" name="lang'.$x.'[]" value="'.$language.'" '.$checked.'  class="largerCheckbox" > </td>';}

    }
    if($row['batch']==$batch){
    echo '<td width="10%"><input type="submit" value="Save" class="btn btn-success" name="submit'.$x.'"></td>';}
    echo "</tr>";
    $x++;
  }
    echo "</table> ";
  }?>

</form>
</div>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/angular-material-icons/0.7.1/angular-material-icons.min.js"></script>
</body>
</html>
