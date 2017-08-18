<?php
include 'db.php';
include './classQuery.php';
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "nbs");
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
  SELECT * FROM tb_position 
  WHERE PositionID LIKE '%" . $search . "%'
  OR PositionName LIKE '%" . $search . "%' 
 
 ";
} else {
    $query = "
  SELECT * FROM tb_position ORDER BY PositionID
 ";
}
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {
        $output .= '
           <div class="container">
            <br>
            <div class="row">
               
                <div class="col col-sm-12 card horizontal" id="panelbody" >
                    <br>
                                 <div class="card-image">
                                <a href="index_department.php">
                                    <img border="1" class="card" alt="W3Schools" src="pic/Position.png" >
                                <span class="card-title">' . $row["PositionName"] . '</span>
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">

                                    <label class="tablehead">Position: </label><a href="#!" id="whitefont" class="collection-item">' . $row["PositionName"] . '</a><br>
                                     <label class="tablehead">All Course To Train: </label><a href="#!" id="whitefont" class="collection-item">' .   getPositionCourse( $row["PositionID"] )   . '</a>

                                    
                                </div>
                                <div class="card-action">
                                    
                                  
                                    <a href="search_postion_text_mode.php?PositionID='. $row['PositionID'] .'" class="waves-effect waves-light btn">Show Course List</a>

                                </div>
                            </div>
                            </div>
                    </div>
         </div>
   `     
   
   
  ';
    }
    echo $output;
} else {
    echo 'Data Not Found';
}
?>