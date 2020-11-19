<?php

class Common
{
  public function uploadData($connection,$name,$email,$contact,$source,$referred,$assigned)
  {
      $mainQuery = "INSERT INTO leads SET Name='$name',Email_ID='$email',Contact_No='$contact',Source='$source',Referred_By='$referred',Assigned_To='$assigned'";
      $result1 = $connection->query($mainQuery) or die("Error in main Query".$connection->error);
      return $result1;
  }
}
