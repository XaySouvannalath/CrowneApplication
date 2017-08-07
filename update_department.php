<?php
include 'db.php';
if(isset($_POST["DepartmentID"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE tb_department SET ".$_POST["column_name"]."='".$value."' WHERE DepartmentID = '".$_POST["DepartmentID"]."'";
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