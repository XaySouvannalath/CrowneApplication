
<?php

//fetch.php
include 'db.php';
$columns = array('PositionID', 'DepartmentName', 'PositionName', 'BandingNo');

$query = "SELECT * FROM view_position ";
//Search
if (isset($_POST["search"]["value"])) {
    $query .= '
 WHERE PositionID LIKE "%' . $_POST["search"]["value"] . '%" 
 OR PositionName LIKE "%' . $_POST["search"]["value"] . '%" 
 ';
}
//Set Order
if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY PositionID DESC ';
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
    $sub_array[] = '<div id="whitefont" class="update" data-id="' . $row["PositionID"] . '" data-column="CourseName">' . $row["PositionID"] . '</div>';
    $sub_array[] = '<div id="whitefont" class="update" data-id="' . $row["PositionID"] . '" data-column="CourseName">' . $row["DepartmentName"] . '</div>';
    $sub_array[] = '<div id="whitefont"  class="update" data-id="' . $row["PositionID"] . '" data-column="CourseName">' . $row["PositionName"] . '</div>';
    $sub_array[] = '<div id="whitefont" class="update" data-id="' . $row["PositionID"] . '" data-column="CourseName">' . $row["BandingNo"] . '</div>';
    $sub_array[] = '<button type="button" name="edit" class="btn btn-success btn-xs edit" data-toggle="modal" data-target="#add_data_Modal" id="' . $row["PositionID"] . '">Edit</button>';
    $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row["PositionID"] . '">Delete</button>';
    $data[] = $sub_array;
}

function get_all_data($connect) {
    $query = "SELECT * FROM view_position";
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
