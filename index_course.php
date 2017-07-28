<?php
include './classQuery.php';
myDatabase();
//echo getAutoID("Course", "tb_course", "CSE", -3);
$connect = mysqli_connect("localhost", "root", "", "nbs");
$sql = "select * from tb_coursetype";
$objResult = mysqli_query($connect, $sql);
?>
<html>
    <head>
        <title>Course</title>
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
        
        <div class="container box w3-card-4">
            <h1 align="center">Live Add Edit Delete Datatables Records of Course</h1>
            <br />
            <div class="table-responsive ">
                <br />
                <div align="right">
                    <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-info">Add</button>
                </div>
                <br />
                <div id="alert_message"></div>
                <table id="user_data" class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>Course ID.</th>
                            <th>Course Type Name</th>
                            <th>Course Name</th>
                            <th>When</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </body>
</html>
<div id="dataModal" class="modal fade">  
    <div class="modal-dialog">  
        <div class="modal-content">  
            <div class="modal-header">  
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                <h4 class="modal-title">Course Details</h4>  
            </div>  
            <div class="modal-body" id="course_detail">  
            </div>  
            <div class="modal-footer">  
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
            </div>  
        </div>  
    </div>  
</div>

<div id="add_data_Modal" class="modal fade">  
    <div class="modal-dialog">  
        <div class="modal-content">  
            <div class="modal-header">  
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                <h4 class="modal-title">PHP Ajax Update MySQL Data Through Bootstrap Modal</h4>  
            </div>  
            <div class="modal-body">  
                <form method="post" id="insert_form">  
                    <label>Auto ID. Has Been Set.</label>  
                    <input type="text" name="courseid" id="courseid" class="form-control" />  
                    <br />  
                    <label>Select Course Type</label>  
                    <select name="coursetypeid" id="coursetypeid" class="form-control">  
                        <?php while ($row = mysqli_fetch_array($objResult)){?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>  
                        <?php } ?> 
                    </select>  
                    <br />  
                    <label>Enter Course Name</label>  
                    <input type="text" name="coursename" id="coursename" class="form-control" />  
                    <br />  
                    <label>Enter When to train</label>  
                    <input type="text" name="when" id="when" class="form-control" />  
                    <br />  
                    <input type="hidden" name="course_id" id="course_id" />  
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                    <input type="button" id="test" value="click">
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
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });

        //fetch_data();
        fetch_data();
        function fetch_data()
        {

            var dataTable = $('#user_data').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "fetch_course.php",
                    type: "POST"
                }
            });
        }
        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            alert(id);
            if (confirm("Are you sure you want to remove this ID. = '" + id + "'?"))
            {
                $.ajax({
                    url: "delete_course.php",
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
           $(document).on('click', '#test',function(){
               var cid = $('#course_id').text();
               alert(cid);
           });


    });
</script>