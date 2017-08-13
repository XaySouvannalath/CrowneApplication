<?php  
 $connect = mysqli_connect("localhost", "root", "", "nbs");  
 $sql = "DELETE FROM tb_training WHERE TrainingID = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>