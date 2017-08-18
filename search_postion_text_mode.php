<?php
include 'db.php';
include './classQuery.php';
$sql = "select T.TrainingID, C.CourseName, P.PositionName from tb_training T, tb_course C, tb_position P where T.CourseID = C.CourseID and T.PositionID = P.PositionID and T.PositionID = '" . $_GET["PositionID"] . "'";
$sql2 = "select T.TrainingID, C.CourseName, P.PositionName from tb_training T, tb_course C, tb_position P where T.CourseID = C.CourseID and T.PositionID = P.PositionID and T.PositionID = '" . $_GET["PositionID"] . "'";
//$sql = "select T.TrainingID, C.CourseName, P.PositionName from tb_training T, tb_course C, tb_position P where T.CourseID = C.CourseID and T.PositionID = P.PositionID and T.PositionID = 'PST001'";
$result = mysqli_query($connect, $sql);
$result5 = mysqli_query($connect, $sql2);
//echo $sql;        
$row5 = mysqli_fetch_array($result5);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <title><?php echo $row5['PositionName']; ?></title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
       
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
        <style>



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
            #blackfont
            {
                color: #111;
                font-size: 200%;
                alignment-adjust: central;
                font-weight: bold;
            }
            body
            {


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
            .tableheadblack
            {
                font-weight: bolder;
                font-size: 25px;
                color: black;
            }
            .boldfont
            {
                font-weight: bold;
            }
        </style>
    </head>
    <body>

        <div class="container" id="content">
            <br>
            <center> <img class="panel"  align="middle" src="pic/cpvtelogo.png" alt="logo" width="300px"></center> 
            <center><h1>All Course for <?php echo $row5['PositionName']; ?></h1> </center> <hr>
            <br>

            <br>

            <div class="row">
                <div class="">
                    <table align="center" class="table table-bordered table-striped" >
                        <th align="center" class="tableheadblack" width="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No.</th>
                        <th class="tableheadblack" width="500px">Course Name</th>
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td align="center" class="boldfont"><?php echo $i; ?></td>
                                <td class="boldfont"><?php echo $row['CourseName']; ?></td>
                            </tr>
                            <?php
                            $i = $i + 1;
                        }
                        ?>
                    </table>
                </div>
                <label id="blackfont">Total is: <?php echo $i - 1; ?> courses</label>
            </div>
            <div id="printsection">
                <button name="print" href=""   class="btn btn-danger" id="print">Print</button><br>
               
            </div>
            <br>
        </div>

        <footer class="page-footer"  style="background-color: #A00062;">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <center></center><h5 class="white-text" id="whitefont">LIFE AT CROWNE PLAZA</h5></center>
                        <center></center>  <p class="grey-text text-lighten-4" id="whitefont">All my experience at Crowne Plaza Vientiane is here!</p></center>  
                    </div>

                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <h5 id="whitefont"></h5>
                    <a class="grey-text text-lighten-4 right" href="#!"></a>
                </div>
            </div>
        </footer>
 <!--<div id="editor"></div>
                <button id="cmd" class="btn btn-danger">generate PDF</button>-->
    </body>
</html>
<script>
    $(document).ready(function () {
     /**  var doc = new jsPDF();
        var specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
        };
        $('#cmd').click(function () {
             
            // alert('Hello');
            doc.fromHTML($('body').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
            doc.save('LiveAtCrownePlaza.pdf');

        });
**/
        $('#print').click(function () {
            $('#printsection').hide();
            window.print();
            setInterval(function () {
                $('#printsection').show();
            }, 500);
        });

    });
</script>

