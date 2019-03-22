<?php 
if(isset($_GET['str']) && !empty($_GET['str']))
{
	require 'db_connection.php';
	$str=$_GET['str'];
	$string=explode(" ",$str);
    $update = "UPDATE mini_car_store SET sold_flag='Y' WHERE manufacture_name='".$string[0]."' and registration_number='".$string[5]."' and sold_flag='N';";
    if (mysqli_query($link,$update))
    {
        echo "Selected car has sold successfully";
    } 
    else 
    {
        echo "Error updating record: " . mysqli_error($link);
    }
    die;
}
$link->close(); 
?>