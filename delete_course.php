<?php
include 'db.php';
if (isset($_POST["id"])) {
    $query = "DELETE FROM tb_course WHERE CourseID = '" . $_POST["id"] . "'";
    if (mysqli_query($connect, $query)) {
        echo 'Data Deleted';
    }
}
?>