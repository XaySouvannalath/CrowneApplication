<?php

include 'db.php';
if (isset($_POST["BandingID"], $_POST["BandingNo"], $_POST["BandingDescription"])) {
    $BandingID = mysqli_real_escape_string($connect, $_POST["BandingID"]);
    $BandingNo = mysqli_real_escape_string($connect, $_POST["BandingNo"]);
    $BandingDescription = mysqli_real_escape_string($connect, $_POST['BandingDescription']);
    $query = "INSERT INTO tb_banding(BandingID, BandingNo, BandingDescription) VALUES('$BandingID', '$BandingNo','$BandingDescription')";
    if (mysqli_query($connect, $query)) {
        echo 'Data Inserted';
    }
}
?>