<?php
include 'db.php';
if (isset($_POST["CourseID"], $_POST["CourseTypeID"], $_POST["CourseName"], $_POST["WhenTrain"])) {

     $CourseID = mysqli_real_escape_string($connect, $_POST["CourseID"]);  
    $CourseTypeID = mysqli_real_escape_string($connect, $_POST["CourseTypeID"]);  
    $CourseName = mysqli_real_escape_string($connect, $_POST["CourseName"]);  
    $WhenTrain = mysqli_real_escape_string($connect, $_POST["WhenTrain"]);  
   
    $query = "INSERT INTO tb_course (CourseID, CourseTypeID, CourseName, WhenTrain) VALUES('$CourseID', '$CourseTypeID', '$CourseName', '$WhenTrain')";
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
