<?php

include './classQuery.php';
myDatabase();
//echo ;
include 'db.php';
if (isset($_POST["CourseName"], $_POST["CourseTypeID"], $_POST["CourseID"])) 
                {
    $CourseID = mysqli_real_escape_string($connect, $_POST["CourseID"]);
    $CourseTypeID = mysqli_real_escape_string($connect, $_POST["CourseTypeID"]);
    $CourseName = mysqli_real_escape_string($connect, $_POST["CourseName"]);
    $When = mysqli_real_escape_string($connect, $_POST["When"]);
    $query = "INSERT INTO tb_course(CourseID, CourseTypeID,CourseName, When) VALUES('$CourseID', '$CourseTypeID','$CourseName','$When');";
    
    if (mysqli_query($connect, $query)) 
                {
        echo 'Data Inserted';
    } 
    else 
        {
        echo 'error'. '<br>';
        echo $query;
    }
}
?>