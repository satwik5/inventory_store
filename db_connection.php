<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "test";
// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>