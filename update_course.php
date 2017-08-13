<?php
include 'db.php';
 
      $output = '';  
      $message = '';  
      $CourseID = mysqli_real_escape_string($connect, $_POST["CourseID"]);  
      $CourseTypeID = mysqli_real_escape_string($connect, $_POST["CourseTypeID"]);  
      $CourseName = mysqli_real_escape_string($connect, $_POST["CourseName"]);  
      $WhenTrain = mysqli_real_escape_string($connect, $_POST["WhenTrain"]); 
           $query = "  
           UPDATE tb_course   
           SET CourseTypeID='$CourseTypeID',   
           CourseName='$CourseName',   
           WhenTrain = '$WhenTrain'        
           WHERE PositionID='".$_POST["CourseID"]."'";  
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