       
<?php
function getCountAllID($columnName, $tablename)
{
    $connect = mysqli_connect("localhost", "root", "","nbs");
    $sql = "select count(". $columnName .") as all_count from ". $tablename ."";
    $objResult = mysqli_query($connect, $sql);
    $objVal = mysqli_fetch_assoc($objResult);
   $AllCount = $objVal["all_count"];
   return $AllCount; 
}
?>


