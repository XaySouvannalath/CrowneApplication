<?php

//insert.php
$connect = mysqli_connect("localhost", "root", "", "nbs");
if (isset($_POST["framework"])) {
    $framework = '';
    $p = $_POST["PositionID"];
    foreach ($_POST["framework"] as $row) {
        $framework = $row;
       
    $query = "INSERT INTO tb_training(PositionID, CourseID) VALUES('" . $p . "', '". $framework ."')";
    if (mysqli_query($connect, $query)) {
        echo $framework. ' ';
    }
   
    }
}
?>