<?php
include './classQuery.php';
myDatabase();
echo getAutoID("DepartmentID", "tb_department", "DEP", -3);
?>
<html>
    <head>
        <title>Department</title>
       
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
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <scrip src="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css"></scrip> 
    <div class="container box">
        <h1 align="center">Live Add Edit Delete Datatables Records of Department</h1>
        <br />
        <div class="table-responsive">
            <br />
            <div align="right">
                <button type="button" name="add" id="add" class="btn btn-info">Add</button>
                <a class="btn btn-info" href="index.php">Home</a>
            </div>
            <br />
            <div id="alert_message"></div>
            <table id="user_data" class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Department ID.</th>
                        <th>Department Name</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        //fetch_data();
        fetch_data();
        function fetch_data()
        {

            var dataTable = $('#user_data').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "fetch_department.php",
                    type: "POST"
                }
            });
        }
        // fetch_data();
        // // function update_data(DepartmentID, column_name, value)
        //  {

        //   }

        $(document).on('blur', '.update', function () {
            var DepartmentID = $(this).data("id");
            var column_name = $(this).data("column");
            var value = $(this).text();
            //update_data(DepartmentID, column_name, value);
            $.ajax({
                url: "update_department.php",
                method: "POST",
                data: {DepartmentID: DepartmentID, column_name: column_name, value: value},
                success: function (data)
                {
                    $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                    $('#user_data').DataTable().destroy();
                    fetch_data();
                }
            });
            setInterval(function () {
                $('#alert_message').html('');
            }, 5000);
        });

        $('#add').click(function () {
            var html = '<tr>';
            html += '<td  id="data1"><?php echo getAutoID("DepartmentID", "tb_department", "DEP", -3); ?></td>';
            html += '<td contenteditable id="data2"></td>';
            html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
            html += '<td><button type="button" name="cancel" id="cancel" class="btn btn-danger btn-xs">Cancel</button></td>';
            html += '</tr>';
            $('#user_data tbody').prepend(html);
        });
        $(document).on('click', '#cancel', function () {
            $('#user_data').DataTable().destroy();
            fetch_data();
        });
        $(document).on('click', '#insert', function () {
            var DepartmentID = $('#data1').text();
            var DepartmentName = $('#data2').text();
            if (DepartmentID != '' && DepartmentName != '')
            {
                $.ajax({
                    url: "insert_department.php",
                    method: "POST",
                    data: {DepartmentID: DepartmentID, DepartmentName: DepartmentName},
                    success: function (data)
                    {
                        $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
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
                alert("Both Fields is required");
            }
        });

        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to remove this?"))
            {
                $.ajax({
                    url: "delete_department.php",
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
    });
</script>