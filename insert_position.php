<?php
include 'db.php';
if (isset($_POST["PositionID"], $_POST["DepartmentID"], $_POST["PositionName"], $_POST["BandingID"])) {

    $PositionID = mysqli_real_escape_string($connect, $_POST["PositionID"]);  
    $DepartmentID = mysqli_real_escape_string($connect, $_POST["DepartmentID"]);  
    $PositionName = mysqli_real_escape_string($connect, $_POST["PositionName"]);  
    $BandingID = mysqli_real_escape_string($connect, $_POST["BandingID"]);  
   
    $query = "INSERT INTO tb_position (PositionID, DepartmentID, PositionName, BandingID) VALUES('$PositionID', '$DepartmentID', '$PositionName', '$BandingID')";
    if(mysqli_query($connect, $query))
    {
        echo 'success';
    }
    else
    {
        echo 'error';
        echo '<br>'. $query;
    }
}
?>
