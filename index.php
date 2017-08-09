<?php
include 'test.php';
?>
<!DOCTYPE html>
<html>
<head>
    
<style>
body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <scrip src="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css"></scrip> 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div id="mySidenav" class="sidenav">
  <a  href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <a id="department" href="index_department.php" >Department</a>
  <a id="banding" href="index_banding.php">Banding</a>
  <a id="position" href="index_position.php">Position</a>
  <a id="coursetype" href="index_coursetype.php">Course Type</a>
  <a id="course" href="index_course.php">Course</a>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
</div>
    

<div class="container">
<div class="row">
<div class="col col-3 w3-card-4">
<br>
<div >Department <span class="badge"><?php echo getCountAllID("DepartmentID", "tb_department"); ?></span></div><br>
<div >Banding <span class="badge"><?php echo getCountAllID("BandingID", "tb_banding"); ?></span></div><br>
<div >Position <span class="badge"><?php echo getCountAllID("PositionID", "tb_position"); ?></span></div><br>
<div >CourseType <span class="badge"><?php echo getCountAllID("CourseTypeID", "tb_coursetype"); ?></span></div><br>
<div >Course <span class="badge"><?php  echo getCountAllID("CourseID", "tb_course"); ?></span></div><br>

</div>
</div>
</div>







<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
   
</script>
</body>
</html> 
