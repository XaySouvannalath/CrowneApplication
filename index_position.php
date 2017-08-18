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


            .cpanelhead{
                background-color: #C71585;
                color: #C71585;
            }
            /* The side navigation menu */
            .sidenav {
                height: 100%; /* 100% Full-height */
                width: 0; /* 0 width - change this with JavaScript */
                position: fixed; /* Stay in place */
                z-index: 1; /* Stay on top */
                top: 0;
                left: 0;
                background-color: #111; /* Black*/
                overflow-x: hidden; /* Disable horizontal scroll */
                padding-top: 60px; /* Place content 60px from the top */
                transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
            }

            /* The navigation menu links */
            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
                transition: 0.3s
            }

            /* When you mouse over the navigation links, change their color */
            .sidenav a:hover, .offcanvas a:focus{

                // color: #f1f1f1;
                color: #FF69B4;

            }

            /* Position and style the close button (top right corner) */
            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }

            /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
            #main {
                transition: margin-left .5s;
                padding: 20px;
            }

            /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
            @media screen and (max-height: 450px) {
                .sidenav {padding-top: 15px;}
                .sidenav a {font-size: 18px;}
            }
            #panelhead{
                //color: #FF1493;
                background-color: 	#FF69B4; 
                background: rgba(255, 105, 108, 0.6)!important;
            }
            #panelbody
            {
                background-color: #C71585;
                background: rgba(122, 130, 136, 0.6)!important;
            }
            #whitefont,#data2
            {
                color: white;
                font-size: 120%;
                alignment-adjust: central;
                 font-weight: bold;
            }
            body
            {
                background-image: url('pic/blur.jpg');
                // background-image: url("pic/welcome-to-crowne-plaza.jpg");
                background-repeat: round    ;
                background-attachment: fixed;
                position: relative;


            }
            #jumbotron
            {
                background-image: url('pic/Crowne Plaza.jpg');
                // background-image: url("pic/welcome-to-crowne-plaza.jpg");
                background-repeat: round    ;
                background-attachment: fixed;
            }
            .content1 {
                position: fixed;
                left: 0;
                right: 0;
                z-index: 9999;
                margin-left: 20px;
                margin-right: 20px;
            }
            .panel-transparent {
                background: none;
            }

            .panel-transparent .panel-heading{
                background: rgba(122, 130, 136, 0.6)!important;
            }

            .panel-transparent .panel-body{
                background: rgba(46, 51, 56, 0.6)!important;
            }
            .glyphicon {
                font-size: 30px;
            }
            #navcolor{
                background-color: #C71585;   
            }
            .glyphicon.glyphicon-lock{
                font-size: 100%;
            }
            * {box-sizing:border-box}

            /* Slideshow container */
            .slideshow-container {
                max-width: 1000px;
                position: relative;
                margin: auto;
            }

            .mySlides {
                display: none;
            }

            /* Next & previous buttons */

            /* On hover, add a black background color with a little bit see-through */
            .prev:hover, .next:hover {
                background-color: rgba(0,0,0,0.8);
            }

            /* Caption text */
            .text {
                color: #f2f2f2;
                font-size: 15px;
                padding: 8px 12px;
                position: absolute;
                bottom: 8px;
                width: 100%;
                text-align: center;
            }

            /* Number text (1/3 etc) */
            .numbertext {
                color: #f2f2f2;
                font-size: 12px;
                padding: 8px 12px;
                position: absolute;
                top: 0;
            }

            /* The dots/bullets/indicators */
            .dot {
                cursor:pointer;
                height: 13px;
                width: 13px;
                margin: 0 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
                transition: background-color 0.6s ease;
            }

            .active, .dot:hover {
                background-color: #FF69B4;
            }

            /* Fading animation */
            .fade {
                -webkit-animation-name: fade;
                -webkit-animation-duration: 1.5s;
                animation-name: fade;
                animation-duration: 1.5s;
            }

            @-webkit-keyframes fade {
                from {opacity: .4} 
                to {opacity: 1}
            }

            @keyframes fade {
                from {opacity: .4} 
                to {opacity: 1}
            }
            #ncontent{
                background-color: white;
            }
             body
            {
                background-image: url('pic/blur.jpg');
                // background-image: url("pic/welcome-to-crowne-plaza.jpg");
                background-repeat: round    ;
                background-attachment: fixed;


            }
                        #panelbody
            {
                
            }
            .white1{
                 color: white;
                font-size: 120%;
            }
            .tablehead
            {
                font-weight: bolder;
                font-size: 25px;
                 color: white;
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
        />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <nav class="navbar navbar-default navbar-static-top top-bar fixed" id="navcolor">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar" id="whitefont"></span>
                    <span class="icon-bar" id="whitefont"></span>
                    <span class="icon-bar" id="whitefont"></span>
                </button>
                <a href="#" class="navbar-brand"><img class="modal-content" src="pic/crowneplazaicon.jpg" width="70"/></a>
            </div>
            <!-- Collection of nav links and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php" id="whitefont"  >Home</a></li>
                    <li><a href="index_department.php"  id="whitefont"  >Department</a></li>
                    <li><a href="index_banding.php" id="whitefont">Banding</a></li>
                    <li><a href="index_position.php" id="whitefont"  class="active">Position</a></li>
                    <li><a href="index_coursetype.php" id="whitefont">Course Type</a></li>
                    <li><a href="index_course.php" id="whitefont" >Course</a></li>
                    <li><a href="index_training.php" id="whitefont" >Training</a></li>
                     <li><a href="index_search.php" id="whitefont" >Search</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"  id="whitefont"><span class="glyphicon glyphicon-lock"></span>&nbsp;Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
        <div class="container w3-card-4 " id="panelbody">
             <br>
             <img class="panel" align="center" src="pic/position.png" alt="position" width="100">
             <label class="" style="font-size: xx-large;" id="whitefont">Position</label> 
            <div class="table-responsive ">
                <br />
                <div align="right">
                    <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-info">Add</button>

                    <a class="btn btn-info" href="index.php">Home</a>
                </div>
                <br />

                <table id="user_data" class="table  table-responsive">
                    <thead>
                        <tr>
                            <th  class="tablehead">Position ID.</th>
                            <th class="tablehead">Department Name</th>
                            <th class="tablehead">Position Name</th>
                            <th class="tablehead">Banding No.</th>
                            <th class="tablehead">Option</th>
                            <th width="100"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <br>
         <footer class="page-footer"  style="background-color: #A00062;">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text" id="whitefont">LIFE AT CROWNE PLAZA</h5>
                    <p class="grey-text text-lighten-4" id="whitefont">All my experience at Crowne Plaza Vientiane is here!</p>
                </div>
                
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <h5 id="whitefont">Coded by Saiyavong</h5>
                <a class="grey-text text-lighten-4 right" href="#!"></a>
            </div>
        </div>
    </footer>
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
                        <input type="hidden" name="position_id" id="position_id" />
                        <input type="submit" value="Insert" name="insert" id="insert" class="btn btn-success insert" />
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

            function fetch_data() {

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
                if (confirm("Are you sure you want to remove this ID. = '" + id + "'?")) {
                    $.ajax({
                        url: "delete_position.php",
                        method: "POST",
                        data: {
                            id: id
                        },
                        success: function (data) {
                            $('#alert_message').html('<div class="alert alert-success">' +
                                data + '</div>');
                            $('#user_data').DataTable().destroy();
                            fetch_data();
                        }
                    });
                    setInterval(function () {
                        $('#alert_message').html('');
                    }, 5000);
                }
            });


            $('#insert').click(function (event) {
                if ($('#insert').val()=='Insert') {
                var PositionID = $('#PositionID').val();
                var DepartmentID = $('#DepartmentID').val();
                var PositionName = $('#PositionName').val();
                var BandingID = $('#BandingID').val();
               // alert(PositionID + ' ' + DepartmentID + ' ' + PositionName + ' ' + BandingID);
                if (PositionName != '') {
                    $.ajax({
                        url: "insert_position.php",
                        method: "POST",
                        data: {
                            PositionID: PositionID,
                            DepartmentID: DepartmentID,
                            PositionName: PositionName,
                            BandingID: BandingID
                        },
                        beforeSend: function () {
                            $('#insert').val("Inserting");
                        },
                        success: function (data) {
                            $('#alert_message').html('<div class="alert alert-success">' +
                                data + '</div>');
                            $('#add_data_Modal').modal('hide');
                            $('#insert_form')[0].reset();
                            $('#user_data').DataTable().destroy();
                            fetch_data();
                        }

                    });
                    setInterval(function () {

                        $('#alert_message').html('');
                    }, 5000);

                } else {
                    event.preventDefault();

                    alert("Position Name is required");
                }
            }
            else if($('#insert').val()=="Update")
            {
                var position_id = $(this).attr("id");
                var PositionID = $('#PositionID').val();
                var DepartmentID = $('#DepartmentID').val();
                var PositionName = $('#PositionName').val();
                var BandingID = $('#BandingID').val();
              //  alert('this is update');
                $.ajax({
                url: "update_position.php",
                method: "POST",
                data: {PositionID: PositionID, DepartmentID: DepartmentID, PositionName: PositionName,BandingID: BandingID},
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


            });


            //Update
            $(document).on('click', '.edit', function () {
                var position_id = $(this).attr("id");
                $('#insert').val("Update");
                //   $('#PositionID').val(position_id);
                //   alert(position_id);
                $.ajax({
                    url: "fetch_position_for_update.php",
                    method: "POST",
                    data: {
                        position_id: position_id
                    },
                    dataType: "json",
                    success: function (data) {
                        $('#PositionID').val(data.PositionID);
                        $('#DepartmentID').val(data.DepartmentID);
                        $('#PositionName').val(data.PositionName);
                        $('#BandingID').val(data.BandingID);
                        $('#course_id').val(data.id);
                        $('#insert').val("Update");
                        $('#add_data_Modal').modal('show');
                    }
                });
            });
        });
    </script>