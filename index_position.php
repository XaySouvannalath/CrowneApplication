
<?php
include './classQuery.php';
myDatabase();
//echo getAutoID("Course", "tb_course", "CSE", -3);
include 'db.php';
$sqldepartment = "select * from tb_department";
$sqlbanding = 'select * from tb_banding';
$objDepartment = mysqli_query($connect, $sqldepartment);
$objBanding = mysqli_query($connect, $sqlbanding);
?>
<html>
    <head>
        <title>Position</title>
        
        <style>
            body
            {
                margin:0;
                padding:0;
                background-color:#f1f1f1;
            }
            .box
            {
                width:1270px;
                padding:20px;
                background-color:#fff;
                border:1px solid #ccc;
                border-radius:5px;
                margin-top:25px;
                box-sizing:border-box;
            }
        </style>
    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

        <div class="container box w3-card-4">
            <h1 align="center">Live Add Edit Delete Datatables Records of Position</h1>
            <br />
            <div class="table-responsive ">
                <br />
                <div align="right">
                    <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-info">Add</button>
                    
                    <a class="btn btn-info" href="index.php">Home</a>
                </div>
                <br />

                <table id="user_data" class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>Position ID.</th>
                            <th>Department Name</th>
                            <th>Position Name</th>
                            <th>Banding No.</th>
                            <th></th>
                            <th width="100"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </body>
</html>


<div id="add_data_Modal" class="modal fade">  
    <div class="modal-dialog">  
        <div class="modal-content">  
            <div class="modal-header">  
                <div id="alert_message"></div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                <h4 class="modal-title">PHP Ajax Update MySQL Data Through Bootstrap Modal</h4>  
            </div>  
            <div class="modal-body">  
                <form method="post" name="insert_form" id="insert_form" enctype="multipart/form-data">  
                    <label>Auto ID. Has Been Set.</label>  
                    <input type="text" name="PositionID" id="PositionID" class="form-control" readonly="true" />  
                    <br />  
                    <label>Select Department</label>  
                    <select name="DepartmentID" id="DepartmentID" class="form-control">  
                        <?php while ($row = mysqli_fetch_array($objDepartment)) { ?>
                            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>  
                        <?php } ?> 
                    </select>  
                    <br />  
                    <label>Enter Position Name</label>  
                    <input type="text" name="PositionName" id="PositionName" class="form-control" />  
                    <br />  
                    <label>Select Banding</label>  
                    <select name="BandingID" id="BandingID" class="form-control">  
                        <?php while ($row2 = mysqli_fetch_array($objBanding)) { ?>
                            <option value="<?php echo $row2[0]; ?>"><?php echo $row2[1]; ?></option>  
                        <?php } ?> 
                    </select>    
                    <br />  
                    <input type="hidden" name="course_id" id="course_id" />  
                    <input type="submit" value="Insert"  name="insert" id="insert" class="btn btn-success insert"/>
                </form>  
            </div>  
            <div class="modal-footer">  
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
            </div>  
        </div>  
    </div>  
</div> 
<script type="text/javascript">
    $(document).ready(function () {
        $('#add').click(function () {
            var newid = '<?php echo getAutoID("PositionID", "tb_position", "PST", -3); ?>';
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
            $('#PositionID').val(newid);
        });
        fetch_data();
        function fetch_data()
        {

            var dataTable = $('#user_data').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "fetch_position.php",
                    type: "POST"
                }
            });
        }
        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
           // alert(id);
            if (confirm("Are you sure you want to remove this ID. = '" + id + "'?"))
            {
                $.ajax({
                    url: "delete_position.php",
                    method: "POST",
                    data: {id: id},
                    success: function (data) {
                        $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                        $('#user_data').DataTable().destroy();
                        fetch_data();
                    }
                });
                setInterval(function () {
                    $('#alert_message').html('');
                }, 5000);
            }
        });


       $('#insert').click(function(event){

           
            var PositionID = $('#PositionID').val();
            var DepartmentID = $('#DepartmentID').val();
            var PositionName = $('#PositionName').val();
            var BandingID = $('#BandingID').val();
          //  alert(CourseName + CourseID + CourseTypeID + WhenTrain);
        //  alert(CourseID);
        alert(PositionID + ' ' + DepartmentID + ' ' + PositionName + ' ' + BandingID);
            if (PositionName != '')
            {
                $.ajax({
                    url: "insert_position.php",
                    method: "POST",
                    data:{PositionID: PositionID, DepartmentID: DepartmentID,PositionName: PositionName,BandingID: BandingID},                   
                    beforeSend: function () {
                        $('#insert').val("Inserting");
                    },  
                    success: function (data)
                    {
                        $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                         $('#add_data_Modal').modal('hide');
                        $('#insert_form')[0].reset();   
                        $('#user_data').DataTable().destroy();
                        fetch_data();
                    }
                    
                });
                setInterval(function () {

                    $('#alert_message').html('');
                }, 5000);

            }
            else
            {
                 event.preventDefault();
               
                alert("Position Name is required");
            }
        });


        //Update
        $(document).on('click', '.edit', function () {
            var course_id = $(this).attr("id");
            $.ajax({
                url: "update_course.php",
                method: "POST",
                data: {course_id: course_id},
                dataType: "json",
                success: function (data) {
                    $('#courseid').val(data.CourseID);
                    $('#coursetypeid').val(data.CourseTypeID);
                    $('#coursetypeid').text(data.CourseTypeName);
                    $('#coursename').val(data.CourseName);
                    $('#when').val(data.WhenTraing);
                    $('#course_id').val(data.id);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });
    });
</script>