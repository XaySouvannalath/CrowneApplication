<?php
include 'db.php';
$query_select_course = "select CourseID, CourseName from tb_course";
$query_select_position = "select PositionID, PositionName from tb_position";
$query_selet_positionName = "select PositionName, COUNT(PositionID) as Total_Course FROM view_training2 
group by PositionID";


$objResult = mysqli_query($connect, $query_select_course);
$objResultPosition = mysqli_query($connect, $query_select_position);
$objResultPositionName = mysqli_query($connect, $query_selet_positionName);


?>
<html>
    <head>
        <title>Training Management</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
        <style>
        </style>
    </head>
    <body>


        <div class="container">

            <br>
            <div class="row">


                <div class="col-sm-4">
                    <div class="w3-card-4">
                        <div class="panel panel-body">
                            <?php while($row2 =  mysqli_fetch_array($objResultPositionName)){ ?>
                            <a href="#"><?php echo $row2['PositionName']; ?>&nbsp;<span class="badge label label-danger"><?php echo $row2['Total_Course'] ?></span></a><br>
                            <?php } ?>
                        </div>

                    </div>

                </div>
                <div class="col-sm-8 ">


                   
                    <div class="w3-card-4">

                        <div class="panel panel-body">
                            <br>
                            <form method="post" id="framework_form">
                                <div class="form-group">
                                    <div >
                                        <br>
                                        <div class="panel panel-body">
                                            <label>Select Position</label>  
                                            <select name="PositionID" id="PositionID" class="form-control">  
                                                <?php while ($row1 = mysqli_fetch_array($objResultPosition)) { ?>
                                                    <option value="<?php echo $row1['PositionID']; ?>"><?php echo $row1['PositionName']; ?></option>
                                                    
                                                <?php } ?> 
                                            </select>  
                                            <br>
                                        </div>
                                        <br>
                                    </div>
                                    <label>Select which Course To Train</label>
                                    <div class="form-group">
                                        <select id="framework" name="framework[]" multiple class="form-control " >
                                            <?php while ($row = mysqli_fetch_array($objResult)) { ?>
                                                <option value="<?php echo $row['CourseID']; ?>"><?php echo $row['CourseName']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-info" name="submit" value="Submit" />
                                </div>
                            </form>

                        </div>

                    </div>
                    <br>
                    <div class="w3-card-4">
                        
                        <div id="table-container">
                            <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'nbs');
                            $query = "select * from view_training1";
                            $output = mysqli_query($conn, $query);
                            echo '<table class="table table-stripe table-border success">';
                            echo '<tr>
                                 <th>TrainingID</th>
                                    <th>Course</th>
                                    </tr>';
                            while ($fetch = mysqli_fetch_assoc($output)) {

                                echo '<tr>';
                                echo '<td>' . $fetch['TrainingID'] . '</td>';
                                echo '<td>' . $fetch['CourseName'] . '</td>';
                                echo '<td><input type="button" data-id3="'.$fetch["TrainingID"].'" value="Delete" class="btn btn-danger btn_delete"></td>';
                                echo '</tr>';
                            };
                            echo '</table>';
                            ?>

                        </div>
                    </div>
                </div>
            </div>




        </div>
    <body>
        <script>

            $(document).ready(function () {

                //$('#btadd').click(function () {
                //      var cc = $('#getcourse').val();
                //   alert(cc);
                //   });
                //   
                // 
                $(document).on('click', '#btadd1', function () {
                    var cc = $('#btadd1').val();
                    alert(cc);
                });

                $('#PositionID').change(function () {
                    var getPositionID = $('#PositionID').val();
                      //    var p =$('#hh').val()
                   // $('#getPosition1').val(p);
                    
                   
                    // var kkk = $('#ok').val();
                  //       alert(kkk) ;
                   //  $('#kk').val(kkk);
                     
    
                           
                         var keyword = $(this).val();
                    $.ajax(
                            {
                                url: 'fetch_training.php',
                                type: 'POST',
                                data: 'request=' + keyword,
                                beforeSend: function ()
                                {
                                    $("#table-container").html('Working...');

                                },
                                success: function (data)
                                {
                                    $("#table-container").html(data);
                                },
                            });   
                });




      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           alert(id);
           {  
                $.ajax({  
                     url:"delete_training.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });






                //    $('#yourid').attr('id')
                /**
                 //  $('#Course').change(function () {
                 var cc = $('#Course').val();
                 alert(cc);
                 });
                 $('input[name=Course]').click(function () {
                 
                 //    var courseName =   $("input[name=Course]").val();
                 // alert(courseName);
                 // alert($('#getCourse').text());
                 //  alert($('#getCourse1').val());
                 //     alert(courseName);
                 //  allert($("input[name=Course]").text());
                 // alert($("input[name=Course]").val().toString());
                 
                 
                 
                 
                 });
                 
                 $('#course_id').click(function(){
                 alert($('#course_id').val());
                 });
                 
                 //Materialize.updateTextFields();
                 //  Mater
                 
                 
                 **/
                $('#framework').multiselect({
                    nonSelectedText: 'Select Framework',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '400px'
                });

                $('#framework_form').on('submit', function (event) {
                    event.preventDefault();
                    var form_data = $(this).serialize();
                    //  alert(form_data);
                    $.ajax({
                        url: "insert.php",
                        method: "POST",
                        data: form_data,
                        success: function (data)
                        {
                            $('#framework option:selected').each(function () {
                                $(this).prop('selected', false);
                            });
                            $('#framework').multiselect('refresh');
                            alert(data);
                        }
                    });
                });




                $("#fetchval").on('change', function ()
                {
                   
                    
                    
                    
                    var keyword = $(this).val();
                    $.ajax(
                            {
                                url: 'fetch.php',
                                type: 'POST',
                                data: 'request=' + keyword,
                                beforeSend: function ()
                                {
                                    $("#table-container").html('Working...');

                                },
                                success: function (data)
                                {
                                    $("#table-container").html(data);
                                },
                            });
                });

            });

        </script>
</html>