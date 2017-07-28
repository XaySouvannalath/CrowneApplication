<?php
$con = mysqli_connect("localhost", "root", "", "nbs");

if($con)
{
    echo "connected";
    
}
else
{
    echo "error";
}

?>