<?php
    session_start();
    include_once('config1.php');
    if (count($_POST["selected_id"]) > 0 ) {
      $all = implode("", $_POST["selected_id"]);
      // $temp = array();
      // echo $_POST["selected_id"];
      $cnt = count($_POST["selected_id"]);
      // // echo $temp;
      // $query="DELETE FROM leads WHERE Email_ID IN($all)";
      for($i=0;$i<$cnt;$i++){
        $id = $_POST["selected_id"][$i];
        $query="DELETE FROM leads WHERE Email_ID='$id'";
        mysqli_query($conn,$query);
      }

    }
    header("Location:leads.php");
?>
