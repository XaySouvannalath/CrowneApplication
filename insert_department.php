<?php

include 'db.php';
if (isset($_POST["DepartmentID"], $_POST["DepartmentName"])) {
    $DepartmentID = mysqli_real_escape_string($connect, $_POST["DepartmentID"]);
    $DepartmentName = mysqli_real_escape_string($connect, $_POST["DepartmentName"]);
    $query = "INSERT INTO tb_department(DepartmentID, DepartmentName) VALUES('$DepartmentID', '$DepartmentName')";
    if (mysqli_query($connect, $query)) {
        echo 'Data Inserted';
    }
}
?>