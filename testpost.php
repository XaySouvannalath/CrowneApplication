<?php
include './classQuery.php';
myDatabase();
echo getAutoID("CourseTypeID", "tb_coursetype", "CT", -3);
?>
<html>
    <head>
        <title>Test Component</title>
    </head>    
    <body>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

        <div id="data_user">

        </div>
        <button id="bttest">Set Focus</button><br><br>
        <button id="btbanding">Load Department</button><br><br>
        <input type="text" id="txtfocus">
    </body>
</html>
<script>
    $(document).ready(function () {
        $('#bttest').click(function () {
            $('#txtfocus').focus();
        });
    ///    $('#btbanding').click(function () {
   ////         $('#data_user').empty();
     // //      $('#data_user').load('index_banding.php');
     //   });
        $('$btbanding').blur(function(){
             $('#data_user').load('index_banding.php');
        });
    });


</script>

<?php
$connect = mysqli_connect("localhost", "root", "", "nbs");
$getDepartment = mysqli_query($connect, "SELECT DepartmentID, DepartmentName FROM tb_department");
?>

<select>
    <?php
    while ($row = mysqli_fetch_array($getDepartment))
    {
        ?>
    <option id="dep" value="<?php echo $row["DepartmentID"]; ?>"><?php echo $row["DepartmentName"]; ?></option>
        <?php
    }
    ?>
</select>




