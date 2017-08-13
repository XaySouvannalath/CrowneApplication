<?php
  
  $conn = mysqli_connect('localhost','root','','nbs');
  $request=$_POST['request'];
  $query="select * from view_training2 where PositionID='$request'";
  $output=mysqli_query($conn,$query);
echo '<table class="table table-stripe table-border success"';
    echo '<tr>
      <th>TrainingID</th>
      <th>Course</th>
     
    </tr>';
  while($fetch = mysqli_fetch_assoc($output))
  {
    
      echo '<tr>';
      echo '<td align="center">'.$fetch['TrainingID'].'</td>';
      echo '<td>'.$fetch['CourseName'].'</td>';
       echo '<td><input type="button" data-id3="'.$fetch["TrainingID"].'" value="Delete" class="btn btn-danger btn_delete   "></td>';
      echo '</tr>';
    
  };
echo '</table>';

 ?>