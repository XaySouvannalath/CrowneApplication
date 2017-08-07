
<?php

//fetch.php
include 'db.php';
$columns = array('CourseID', 'CourseTypeName', 'CourseName', 'WhenTrain');

$query = "SELECT * FROM view_course1 ";
//Search
if (isset($_POST["search"]["value"])) {
    $query .= '
 WHERE CourseID LIKE "%' . $_POST["search"]["value"] . '%" 
 OR CourseName LIKE "%' . $_POST["search"]["value"] . '%" 
 ';
}
//Set Order
if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY CourseID DESC ';
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
    $sub_array[] = '<div  class="update" data-id="' . $row["CourseID"] . '" data-column="CourseName">' . $row["CourseID"] . '</div>';
    $sub_array[] = '<div  class="update" data-id="' . $row["CourseID"] . '" data-column="CourseName">' . $row["CourseTypeName"] . '</div>';
    $sub_array[] = '<div  class="update" data-id="' . $row["CourseID"] . '" data-column="CourseName">' . $row["CourseName"] . '</div>';
    $sub_array[] = '<div  class="update" data-id="' . $row["CourseID"] . '" data-column="CourseName">' . $row["WhenTrain"] . '</div>';
    $sub_array[] = '<button type="button" name="view" class="btn btn-info btn-xs view" id="' . $row["CourseID"] . '">View</button>';
    $sub_array[] = '<button type="button" name="edit" class="btn btn-success btn-xs edit" data-toggle="modal" data-target="#add_data_Modal" id="' . $row["CourseID"] . '">Edit</button>';
    $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row["CourseID"] . '">Delete</button>';
    $data[] = $sub_array;
}

function get_all_data($connect) {
    $query = "SELECT * FROM view_course1";
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
