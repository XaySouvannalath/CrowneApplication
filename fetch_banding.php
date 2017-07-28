<?php

//fetch.php
$connect1 = mysqli_connect("localhost", "root", "", "nbs");
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

$number_filter_row = mysqli_num_rows(mysqli_query($connect1, $query));

$result = mysqli_query($connect1, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["BandingID"] . '" data-column="BandingID">' . $row["BandingID"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["BandingID"] . '" data-column="BandingNo">' . $row["BandingNo"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="' . $row["BandingID"] . '" data-column="BandingDescription">' . $row["BandingDescription"] . '</div>';
    $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row["BandingID"] . '">Delete</button>';
    $data[] = $sub_array;
}

function get_all_data($connect1) {
    $query = "SELECT * FROM tb_banding";
    $result = mysqli_query($connect1, $query);
    return mysqli_num_rows($result);
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => get_all_data($connect1),
    "recordsFiltered" => $number_filter_row,
    "data" => $data
);

echo json_encode($output);
?>
