   <?php  
 //fetch.php  
include 'db.php' ;
 if(isset($_POST["position_id"]))  
 {  
      $query = "SELECT * FROM tb_position WHERE PositionID = '".$_POST["position_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>