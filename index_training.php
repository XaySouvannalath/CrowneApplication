<?php
include 'db.php';
$query_select_course = "select CourseID, CourseName from tb_course";
$query_select_position = "select PositionID, PositionName from tb_position";
$query_selet_positionName = "select PositionID,PositionName, COUNT(PositionID) as Total_Course FROM view_training2 
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
                    <li><a href="index_position.php" id="whitefont"  >Position</a></li>
                    <li><a href="index_coursetype.php" id="whitefont">Course Type</a></li>
                    <li><a href="index_course.php" id="whitefont" >Course</a></li>
                    <li><a href="index_training.php" id="whitefont" class="active">Training</a></li>
                     <li><a href="index_search.php" id="whitefont" >Search</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"  id="whitefont"><span class="glyphicon glyphicon-lock"></span>&nbsp;Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

        <div class="container">

            <br>
            <div class="row">


                <div class="col-sm-4" >
                    <div class=""  >
                        <div class="panel panel-body" id="panelbody">
                            <?php while($row2 =  mysqli_fetch_array($objResultPositionName)){ ?>
                            <a id="whitefont" href="search_postion_text_mode.php?PositionID=<?php echo $row2['PositionID']; ?>"><?php echo $row2['PositionName']; ?>&nbsp;<span class="badge label label-danger"><?php echo $row2['Total_Course'] ?></span></a><br>
                            <?php } ?>
                        </div>

                    </div>

                </div>
                <div class="col-sm-8 ">


                   
                    <div class="w3-card-4">

                        <div class="panel panel-body" id="panelbody">
                            <br>
                            <form method="post" id="framework_form">
                                <div class="form-group">
                                    <div >
                                        <br>
                                        <div class="panel panel-body" id="panelbody">
                                            <label class="tablehead">Select Position</label>  
                                            <select name="PositionID" id="PositionID" class="form-control">  
                                                <?php while ($row1 = mysqli_fetch_array($objResultPosition)) { ?>
                                                    <option value="<?php echo $row1['PositionID']; ?>"><?php echo $row1['PositionName']; ?></option>
                                                    
                                                <?php } ?> 
                                            </select>  
                                            <br>
                                        </div>
                                        <br>
                                    </div>
                                    <label class="tablehead">Select which Course To Train</label>
                                    <div class="form-group">
                                        <select id="framework" name="framework[]" multiple class="form-control " >
                                            <?php while ($row = mysqli_fetch_array($objResult)) { ?>
                                                <option value="<?php echo $row['CourseID']; ?>"><?php echo $row['CourseName'] ; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-info btn-block" name="submit" value="Submit" />
                                   
                                </div>
                                  
                            </form>

                        </div>

                    </div>
                    <br>
                    
                    <div id="panelbody">
                        
                        <div id="table-container">
                            <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'nbs');
                            $query = "select * from view_training1";
                            $output = mysqli_query($conn, $query);
                            echo '<table class="table table-stripe table-border success">';
                            echo '<tr>
                                 <th class="tablehead">TrainingID</th>
                                    <th class="tablehead">Course</th>
                                    </tr>';
                            while ($fetch = mysqli_fetch_assoc($output)) {

                                echo '<tr>';
                                echo '<td id="whitefont" align="center">' . $fetch['TrainingID'] . '</td>';
                                echo '<td id="whitefont">' . $fetch['CourseName'] . '</td>';
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
                    buttonWidth: '720px'
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