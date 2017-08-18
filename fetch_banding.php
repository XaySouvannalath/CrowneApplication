<?php

//fetch.php
include 'db.php';
$columns = array('BandingID', 'BandingNo', 'BandingDescription');

$query = "SELECT * FROM tb_banding ";
//Search

if (isset($_POST["search"]["value"])) {
    $query .= '
 WHERE BandingID LIKE "%' . $_POST["search"]["value"] . '%" 
 OR BandingNo LIKE "%' . $_POST["search"]["value"] . '%" 
 ';
}
//Set Order

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY BandingID DESC ';
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
    $sub_array[] = '<div id="whitefont" contenteditable class="update" data-id="' . $row["BandingID"] . '" data-column="BandingID">' . $row["BandingID"] . '</div>';
    $sub_array[] = '<div id="whitefont"  contenteditable class="update" data-id="' . $row["BandingID"] . '" data-column="BandingNo">' . $row["BandingNo"] . '</div>';
    $sub_array[] = '<div id="whitefont"  contenteditable class="update" data-id="' . $row["BandingID"] . '" data-column="BandingDescription">' . $row["BandingDescription"] . '</div>';
    $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row["BandingID"] . '">Delete</button>';
    $data[] = $sub_array;
}

function get_all_data($connect) {
    $query = "SELECT * FROM tb_banding";
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
