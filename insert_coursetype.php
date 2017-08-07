<?php
include './classQuery.php';
myDatabase();
//echo ;
include 'db.php';
if (isset($_POST["CourseTypeID"], $_POST["CourseTypeName"])) {
    $CourseTypeID = mysqli_real_escape_string($connect, $_POST["CourseTypeID"]);
    $CourseTypeName = mysqli_real_escape_string($connect, $_POST["CourseTypeName"]);
    $query = "INSERT INTO tb_coursetype(CourseTypeID, CourseTypeName) VALUES('$CourseTypeID', '$CourseTypeName')";
    if (mysqli_query($connect, $query)) {
        echo 'Data Inserted';
    }
}
?>