<link rel="stylesheet" href="style.css">
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"-->
<?php 
require 'db_connection.php';
$full_car_details=[];
$total_details ="Select distinct manufacture_name, model from mini_car_store where color<>'' and sold_flag='N' order by manufacture_name;";
$car_count=0;
$series=1;
$count=0;
?>
<div class="container">
<center><h2>Details of all models </h2>
    <table class="table table-border table-hover">
	<thead>
        <tr>
			<th>Series</th>
			<th>Manufacture</th>
			<th>Model</th>
			<th>Count</th>
			<th>Image</th>
		</tr>
    </thead>
		<tbody id="tableId">
			<?php
			if ($result=mysqli_query($link,$total_details))
			{ 
				if($result->num_rows === 0){						
				echo "<tr><td colspan='5'>No Cars exists</td></tr>";
				}
				else{
				  while ($row=mysqli_fetch_row($result))
					{ 
						echo "<tr>";
						echo "<td>$series</td>";
						echo "<td>$row[0]</td>";
						echo "<td>$row[1]</td>";
						$car_count = "SELECT count(1) FROM mini_car_store WHERE manufacture_name='".$row[0]."' AND model='".$row[1]."' and sold_flag='N';";
						
						$total_cars ="Select manufacture_name, model,color,price,manufacturing_year,registration_number from mini_car_store WHERE manufacture_name='".$row[0]."' AND model='".$row[1]."' and sold_flag='N';";
						if ($results = mysqli_query($link,$car_count) and $car_results = mysqli_query($link,$total_cars))
						{
						  while ($car = mysqli_fetch_row($results))
							{
								echo "<td>$car[0]</td>";
							}
								
						   while ($all_cars = mysqli_fetch_row($car_results))
							{
								$full_car_details[$count]= "$all_cars[0] $all_cars[1] $all_cars[2] Rs.$all_cars[3] $all_cars[4] $all_cars[5]";
								echo "<span class='fullCarDetails' hidden>".json_encode($full_car_details[$count])."</span>";
								$count++;
							}
						}
						$image_details="SELECT url FROM mini_car_store WHERE manufacture_name='".$row[0]."' AND model='".$row[1]."';";
						$image_result=mysqli_query($link,$image_details);
						$image_url=mysqli_fetch_row($image_result);
						echo "<td><img id='previewImage' src=".$image_url[0]." /></td>";
						echo "</tr>";
					$series++;
					}
				}
			}
			  mysqli_free_result($result);

			?>
		 </tbody>
	</table>
	</center>
</div>


<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
		<ul id="menu">
		  <li>Manufature</li>
		  <li>Model</li>
		  <li>Color</li>
		  <li>Price</li>
		  <li>Model-Year</li>
		  <li>Registration-number</li>
		</ul> 
	</div>
    <div class="modal-body"> 
    </div>
    <div class="modal-footer"><p></p></div>
	</div>
</div>


<script type="text/javascript" src="functions.js"></script>