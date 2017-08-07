<?php
include 'db.php';
if(isset($_POST["BandingID"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE tb_banding SET ".$_POST["column_name"]."='".$value."' WHERE BandingID = '".$_POST["BandingID"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
 else
 {
     echo 'error';
 }
}
?>