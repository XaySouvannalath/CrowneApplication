<?php
include './classQuery.php';
?>
<html>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
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
            }
            body
            {
                background-image: url('pic/blur.jpg');
                // background-image: url("pic/welcome-to-crowne-plaza.jpg");
                background-repeat: round    ;
                background-attachment: fixed;


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
            .prev, .next {
                cursor: pointer;
                position: absolute;
                top: 50%;
                width: auto;
                margin-top: -22px;
                padding: 16px;
                color: white;
                font-weight: bold;
                font-size: 18px;
                transition: 0.6s ease;
                border-radius: 0 3px 3px 0;
            }

            /* Position the "next button" to the right */
            .next {
                right: 0;
                border-radius: 3px 0 0 3px;
            }

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
        </style>
    </head>
    <a href="../../../Users/Doflamingo/AppData/Local/Temp/menu.url"></a>
    <body>
       <nav class="navbar navbar-default navbar-static-top top-bar fixed" id="navcolor">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            <!-- Collection of nav links and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php" id="whitefont" class="active"  >Home</a></li>
                    <li><a href="index_department.php" id="whitefont"  >Department</a></li>
                    <li><a href="index_banding.php"   id="whitefont">Banding</a></li>
                    <li><a href="index_position.php" id="whitefont"  >Position</a></li>
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
    <br>
        <br>
        <div class="container">
            <br>
            <div class="row">
               
                <div class="col col-sm-8 card" id="panelbody">
                     <br>
                    <div class="col s12 m4">

                        <div class="card">
                            <div class="card-image">
                                <a href="index_department.php">
                                    <img border="0" alt="W3Schools" src="pic/Department.png" >
                                <span class="card-title">Department</span>
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">

                                    <a href="#!" class="collection-item"><span class="new badge"><?php echo getCountAllID("DepartmentID", "tb_department"); ?></span>All Department</a>
                                    
                                </div>
                                <div class="card-action">
                                    <a href="index_department.php">View All Department's Data</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col s12 m4">
                        <div class="card">
                            
                            <div class="card-image">
                                <a href="index_banding.php">
                                    <img src="pic/banding.png">
                                <span class="card-title">Banding</span>
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                   <a href="#!" class="collection-item"><span class="new badge"><?php echo getCountAllID("BandingID", "tb_banding"); ?></span>All Banding</a>
                                </div>
                                <div class="card-action">
                                    <a href="index_position.php">View All Banding</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="card">
                            
                            <div class="card-image">
                                <a href="index_position.php">
                                <img src="pic/position.png">
                                <span class="card-title">Position</span>
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                   <a href="#!" class="collection-item"><span class="new badge"><?php echo getCountAllID("PositionID", "tb_position"); ?></span>All Positions</a>
                                </div>
                                <div class="card-action">
                                    <a href="index_position.php">View All Position</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">

                        <div class="card">
                            <div class="card-image">
                                <a href="index_coursetype.php">
                                <img src="pic/Coursetype.png">
                                <span class="card-title">Course Type</span>
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                   <a href="#!" class="collection-item"><span class="new badge"><?php echo getCountAllID("CourseTypeID", "tb_coursetype"); ?></span>All Course Types</a>
                                </div>
                                <div class="card-action">
                                    <a href="index_coursetype.php">View All Course Type</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                <a href="index_course.php">
                                <img src="pic/Course.png">
                                <span class="card-title">Course</span>
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                <a href="#!" class="collection-item"><span class="new badge"><?php echo getCountAllID("CourseID", "tb_course"); ?></span>All Courses</a>
                                </div>
                                <div class="card-action">
                                    <a href="index_course.php">View All Course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                <a href="index_training.php">
                                <img src="pic/Trainning.png">
                                <span class="card-title">Training</span>
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                  <a href="#!" class="collection-item"><span class="new badge"><?php echo getCountAllID("TrainingID", "tb_training"); ?></span>All Training</a>
                                </div>
                                <div class="card-action">
                                    <a href="index_training.php">View All Training</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <footer class="page-footer"  style="background-color: #A00062;">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">LIFE AT CROWNE PLAZA</h5>
                <p class="grey-text text-lighten-4">All my experience at Crowne Plaza Vientiane is here!</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            Coded by Saiyavong
            <a class="grey-text text-lighten-4 right" href="#!"></a>
            </div>
          </div>
        </footer>
        <script>
            $(document).ready(function(){
                 $(".button-collapse").sideNav();
            });
           </script>
    </body>

</html>