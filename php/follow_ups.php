<?php session_start();
 include_once("navbar.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="css/pop-up-form.css"> -->
<style>
body{
  background-color: #f8f9fa;
}
.table{
  color: black;
  margin-left: 1%;
  position: absolute;
  width: 98%;
  top: 20%; bottom: 0; left: 0; right: 0;
  text-align: center;
  word-wrap: break-word;
  font-size: 15px;
  font-family: 'Helvetica Neue',Helvetica, Arial, cursive;
}
.btn{
  padding: 3px;
  font-size: 10px;
}
.dropdown-menu{
  font-size: 12px;
}
#new{
  position: absolute;
  margin-left: 93%;
  margin-top: 2%;
  padding: 5px;
  font-size: 13px;
}
.fa-cloud-download{
  position: absolute;
  margin-left: 89%;
  margin-top: 2.2%;
}
#dltbtn{
  position: absolute;
  margin-left: -50%;
  margin-top: -3.6%;
}
.yellow_circle {
    margin-right: 2px;
    background: url(/images/yellow_circle.png);
    background-repeat: no-repeat;
    height: 25px;
    width: 25px;
    float: left;
}
</style>
</head>
<body>
  <?php

  include_once("config.php");
  // $sql = "SELECT name,Email_ID,contact_no,source,date,Referred_By,Assigned_to FROM leads";
  // $result = $conn->query($sql);
  $query = mysqli_query($conn,"SELECT Name,Email_ID,Contact_No,Date,Interest_Level,Next_Follow_up,Follow_up_details,Assigned_To FROM follow_ups"); ?>
  <a href="leads.php"><input type="button" id="new" name="form" value="ADD NEW" class="btn btn-success"></a>
  <a href="export_follow-ups.php"><i class="fa fa-cloud-download" title="Download follow_ups" style="font-size:35px;color:grey;"></i></a>


<div class="table table-striped">
  <form name="actionForm" action="action2.php" method="post" onsubmit="return deleteConfirm();"/>
    <button type="submit" id="dltbtn" name="btn_delete" class="btn"><i class="fa fa-trash" title="Delete leads" style="font-size:35px;color:grey;"></i></button>
        <table><tr>
          <th width='1%'><input type="checkbox" name="check_all" id="check_all" value=""/></th>
          <th width='20%'>Name</th>
          <th width='20%'>Contact Details</th>
          <th width='10%'>Date</th>
          <th width='15%'>Interest Level</th>
          <th width='10%'>Next Follow-up</th>
          <th width='10%'>Details</th>
          <th width='10%'>Assigned To</th>
          <th width='5%'></th>
          </tr>
    <?php
    // output data of each row
    // while($row = $result->fetch_assoc()) {
    //     $id = $row["Email_ID"];
    if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    extract($row);
        ?>
        <tr>
        <td width='1%'><input type="checkbox" name="selected_id[]" class="checkbox" value="<?php echo $Email_ID; ?>"/></td>
        <td width='20%'><?php echo $Name; ?></td>
        <td width='20%'><?php echo $Email_ID."<br>".$Contact_No; ?></td>
        <td width='10%'><?php echo $Date; ?></td>
        <?php
          $emoji="";
          if($Interest_Level == 'Warm'){
            $emoji = '&#128993;';
          }
          elseif($Interest_Level == 'Hot') {
            $emoji = '&#128992;';
          }
          elseif($Interest_Level == 'Cold') {
            $emoji = '&#128309;';
          }
        ?>
        <td width='15%'><?php echo $emoji." ".$Interest_Level; ?></td>
        <td width='10%'><?php echo $Next_Follow_up; ?></td>
        <td width='10%'><?php echo $Follow_up_details; ?></td>
        <td width='10%'><?php echo $Assigned_To; ?></td>
        <td width='5%'></td>
        </tr>
  <?php } }else { ?>
    <tr><td colspan="8" align="center">No follow-ups scheduled.</td></tr>
  <?php
  }
  ?>
</table>

</form>

</div>
<script type="text/javascript">
function deleteConfirm(){
    var result = confirm("Do you really want to delete records?");
    if(result){
        return true;
    }else{
        return false;
    }
}
$(document).ready(function(){
    $('#check_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });

    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#check_all').prop('checked',true);
        }else{
            $('#check_all').prop('checked',false);
        }
    });
});
</script>
</body>
</html>
