<?php

//fetch.php
include 'db.php';
$columns = array('DepartmentID', 'DepartmentName');

$query = "SELECT * FROM tb_department ";
//Search
if (isset($_POST["search"]["value"])) {
    $query .= '
 WHERE DepartmentID LIKE "%' . $_POST["search"]["value"] . '%" 
 OR DepartmentName LIKE "%' . $_POST["search"]["value"] . '%" 
 ';
}
//Set Order
if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY DepartmentID DESC ';
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
    $sub_array[] = '<div   contenteditable class="update white1" data-id="' . $row["DepartmentID"] . '" data-column="DepartmentName">' . $row["DepartmentID"] . '</div>';
    $sub_array[] = '<div   contenteditable class="update white1" data-id="' . $row["DepartmentID"] . '" data-column="DepartmentName">' . $row["DepartmentName"] . '</div>';
    $sub_array[] = '<button align="center" type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row["DepartmentID"] . '">Delete</button>';
    $data[] = $sub_array;
}

function get_all_data($connect) {
    $query = "SELECT * FROM tb_department";
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
