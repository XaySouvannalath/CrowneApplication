<?php
$connect1 = mysqli_connect("localhost", "root", "", "nbs");
if(isset($_POST["BandingID"]))
{
 $value = mysqli_real_escape_string($connect1, $_POST["value"]);
 $query = "UPDATE tb_banding SET ".$_POST["column_name"]."='".$value."' WHERE BandingID = '".$_POST["BandingID"]."'";
 if(mysqli_query($connect1, $query))
 {
  echo 'Data Updated';
 }
 else
 {
     echo 'error';
 }
}
?>