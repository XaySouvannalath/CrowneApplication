   <?php  
 //fetch.php  
include 'db.php' ;
 if(isset($_POST["course_id"]))  
 {  
      $query = "SELECT * FROM tb_course WHERE CourseID = '".$_POST["course_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>