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
  margin-left: 90%;
  margin-top: 2%;
  padding: 5px;
  font-size: 13px;
}
.fa-cloud-download{
  position: absolute;
  margin-left: 86%;
  margin-top: 2.2%;
}
#dltbtn{
  position: absolute;
  margin-left: -50%;
  margin-top: -3.6%;
}
</style>
</head>
<body>
  <?php

  include_once("config.php");
  // $sql = "SELECT name,Email_ID,contact_no,source,date,Referred_By,Assigned_to FROM leads";
  // $result = $conn->query($sql);
  $query = mysqli_query($conn,"SELECT name,Email_ID,contact_no,source,date,Referred_By,Assigned_to FROM leads"); ?>
  <!-- buttons -->
  <a href="add-contact.php"><input type="button" id="new" name="form" value="ADD NEW LEAD" class="btn btn-success"></a>
  <!-- <button type="submit" class="btn btn-success" name="save">DELETE</button> -->
  <!-- <a href="dlt-multiple.php"><i class="fa fa-trash" title="Delete leads" name='delete' style="font-size:35px;color:grey;"></i></a> -->
  <a href="export_leads.php"><i class="fa fa-cloud-download" title="Download leads table" style="font-size:35px;color:grey;"></i></a>


<div class="table table-striped">
<?php
// $sql = "SELECT name,Email_ID,contact_no,source,date,Referred_By,Assigned_to FROM leads";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
  ?>
  <form name="actionForm" action="action.php" method="post" onsubmit="return deleteConfirm();"/>
    <button type="submit" id="dltbtn" name="btn_delete" class="btn"><i class="fa fa-trash" title="Delete leads" style="font-size:35px;color:grey;"></i></button>
        <table><tr>
          <th width='1%'><input type="checkbox" name="check_all" id="check_all" value=""/></th>
          <th width='20%'>Name</th>
          <th width='25%'>Email</th>
          <th width='10%'>Contact</th>
          <th width='10%'>Source</th>
          <th width='10%'>Date</th>
          <th width='15%'>Referred by</th>
          <th width='15%'>Assigned to</th>
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
        <td width='20%'><?php echo $name; ?></td>
        <td width='25%'><?php echo $Email_ID; ?></td>
        <td width='10%'><?php echo $contact_no; ?></td>
        <td width='10%'><?php echo $source; ?></td>
        <td width='10%'><?php echo $date; ?></td>
        <td width='15%'><?php echo $Referred_By; ?></td>
        <td width='15%'><?php echo $Assigned_to; ?></td>
        <td width='5%'>
          <div class='dropdown'>
            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              Actions
            </button>
            <?php
            echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
              <a class='dropdown-item' href='edit_leads.php?id=".$row['Email_ID']."'>Edit lead</a>
              <a class='dropdown-item MainNavText' href='follow-up-form.php?id=".$row['Email_ID']."'>Follow up</a>
              <a class='dropdown-item' href='delete.php?id=".$row['Email_ID']."'
              onClick=\"javascript: return confirm('Are you sure you want to delete?');\">Delete lead
              </a>
            </div>";
          ?>
          </div>
        </td>
        </tr>
  <?php } }else { ?>
    <tr><td colspan="8" align="center">No leads found. Add a new lead.</td></tr>
  <?php
  }
  // $conn->close();
  ?>
</table>

<!-- <input type="submit" class="btn btn-primary" name="btn_delete" value="Delete"> -->
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
