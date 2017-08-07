<?php

//fetch.php
include 'db.php';
$columns = array('CourseTypeID', 'CourseTypeName');

$query = "SELECT * FROM tb_coursetype ";
//Search
if (isset($_POST["search"]["value"])) {
    $query .= '
 WHERE CourseTypeID LIKE "%' . $_POST["search"]["value"] . '%" 
 OR CourseTypeName LIKE "%' . $_POST["search"]["value"] . '%" 
 ';
}
//Set Order
if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY CourseTypeID DESC ';
}

$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["CourseTypeID"] . '" data-column="CourseTypeName">' . $row["CourseTypeID"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["CourseTypeID"] . '" data-column="CourseTypeName">' . $row["CourseTypeName"] . '</div>';
    $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row["CourseTypeID"] . '">Delete</button>';
    $data[] = $sub_array;
}

function get_all_data($connect) {
    $query = "SELECT * FROM tb_coursetype";
    $result = mysqli_query($connect, $query);
    return mysqli_num_rows($result);
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => get_all_data($connect),
    "recordsFiltered" => $number_filter_row,
    "data" => $data
);

echo json_encode($output);
?>
