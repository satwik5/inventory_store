<?php
require 'db_connection.php';

$image = "SELECT url from image_uploads;";
    if ($result=mysqli_query($link,$image))
    {
        $url=mysqli_fetch_row($result);
		$url=$url[0];
    } 
?>