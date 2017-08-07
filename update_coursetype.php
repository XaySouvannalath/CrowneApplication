<?php
include 'db.php';
if(isset($_POST["CourseTypeID"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE tb_coursetype SET ".$_POST["column_name"]."='".$value."' WHERE CourseTypeID = '".$_POST["CourseTypeID"]."'";
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