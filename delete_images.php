<?php
require 'db_connection.php';

$image_url = "delete from image_uploads;";
mysqli_query($link,$image_url);

?>