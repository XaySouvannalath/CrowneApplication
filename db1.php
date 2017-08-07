<?php

$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=testing', $username, $password );
if($connection)
{
    echo 'success';
}
else
{
    echo 'error';
}
?>
