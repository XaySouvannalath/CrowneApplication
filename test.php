      
<?php
 /**
function getCountAllID($columnName, $tablename)
{
    $connect = mysqli_connect("localhost", "root", "","nbs");
    $sql = "select count(". $columnName .") as all_count from ". $tablename ."";
    $objResult = mysqli_query($connect, $sql);
    $objVal = mysqli_fetch_assoc($objResult);
   $AllCount = $objVal["all_count"];
   return $AllCount; 
   $qury = "";

}
**/
include 'db.php';
$query_select_course = "select CourseID, CourseName from tb_course";
$query_select_position = "select PositionID, PositionName from tb_position";

$objResult = mysqli_query($connect, $query_select_course);
?>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

<?php
                    while ($row = mysqli_fetch_array($objResult)) {
                        ?>
                 

                                
                              <input id="<?php echo $row['CourseID'];?>" type="checkbox" name="" > 
                              <label id="cc" name="cc" for="<?php echo $row['CourseID'];?>"><?php echo $row['CourseName']; ?></label><br>
                     
                        <?php
                    }
                    ?>
                              
                              <button name="ok" id="ok">ok</button>
                              <script>
                                  $(document).ready(function(){
                                      $("#cc").click(function(){
                                         alert('hello'); 
                                      });
                                      
                                    
                                  });
                                    $('#ok').click(function (){
                                          alert('hello'); 
                                      });
                                  
                              </script>