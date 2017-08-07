<?php

include 'db.php';
if (isset($_POST["id"])) {
    $query = "DELETE FROM tb_department WHERE DepartmentID = '" . $_POST["id"] . "'";
    if (mysqli_query($connect, $query)) {
        echo 'Data Deleted';
    }
}
?>