<?php
include 'db.php';
 
      $output = '';  
      $message = '';  
      $PositionID = mysqli_real_escape_string($connect, $_POST["PositionID"]);  
      $DepartmentID = mysqli_real_escape_string($connect, $_POST["DepartmentID"]);  
      $PositionName = mysqli_real_escape_string($connect, $_POST["PositionName"]);  
      $BandingID = mysqli_real_escape_string($connect, $_POST["BandingID"]); 
           $query = "  
           UPDATE tb_position   
           SET DepartmentID='$DepartmentID',   
           PositionName='$PositionName',   
           BandingID = '$BandingID'        
           WHERE PositionID='".$_POST["PositionID"]."'";  
        if(mysqli_query($connect,$query)){
            echo 'Data Updated';
           // echo $query;
        }
        else
        {
            echo 'fail to update';
           // echo $query;
        }

?>