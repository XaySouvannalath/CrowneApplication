<?php
//fetch.php
include 'db.php';
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT * FROM tb_position WHERE PositionName LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["PositionName"];
 }
 echo json_encode($data);
}

?>