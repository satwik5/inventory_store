<?php 
require 'db_connection.php';
$manu_fac_name = "select distinct manufacture_name from mini_car_store where manufacture_name<>'' order by manufacture_name asc;";
?>
<link rel="stylesheet" href="style.css">
<center class='content'>
<h2>Enter all Car details in the below section</h2>
<form onsubmit="submitForm(event);" id='image-input' ></form>
<form enctype="multipart/form-data" method="post" id='input-texts'></form>
	<div id="toolbar">
		<input name="model" type="text"  placeholder="Model" form='input-texts'/>
		<select name='manufac_name' form='input-texts'> <option  value='select'>Select manufacture</option>
			<?php 
			if ($result=mysqli_query($link,$manu_fac_name))
			{
			  while ($row=mysqli_fetch_row($result))
				{echo "<option value='$row[0]' >".ucfirst(strtolower($row[0]))."</option>";}
			  mysqli_free_result($result);
			}
			?>
		</select><br><br>
		<input name="color" type="text"  placeholder="Color" form='input-texts' />
		<input name="manufac_year" type="text" onkeypress='validate(event)' placeholder="Manufacturing Year-YYYY" form='input-texts'  />
		<input name="price"  type="text" onkeypress='validate(event)' placeholder="Price" form='input-texts'  />
		<input name="regist_state"  class='registry' type="text" maxlength="4" placeholder="4 digit code 'AB12'"  form='input-texts' />
		<input name="regist_code"  class='registry' type="text" maxlength="6" placeholder="AB1234" form='input-texts' />
		<input type="file" name="image" id="image-selecter" accept="image/*" value='select'form='image-input' >
		<input type="submit" name="image_submit" value="Upload Image" form='image-input'> 
		<p id="uploading-text" style="display:none;">Uploading...</p>
		<p id="uploaded-text" style="display:none;" >Uploaded</p>
		<input name="submit" id='car_details_submit' type="submit" value="Submit" form='input-texts'  />
	</div>
</center>
<?php
if (isset($_POST['submit']))
{
$model=strtoupper($_POST['model']);
$manufac_year=$_POST['manufac_year'];
$regist_number=strtoupper($_POST['regist_state']."-".$_POST['regist_code']);
$color=strtoupper($_POST['color']);
$price=$_POST['price'];
$manufac_name=strtoupper($_POST['manufac_name']);
	if($manufac_name=='SELECT'){
		echo "<center><h3>Please select manufacture</h3></center>";
	}
	elseif($manufac_year=='' or $manufac_year=='' or  $regist_number=='-' or $color=='' or $price=='' or $manufac_name=='' or $price=0)
	{
		echo "<center><h3>Sorry!!! Please enter correct details.</h3></center>";
	}
	else{
		$car_dup_check="select manufacture_name from mini_car_store
						WHERE sold_flag='N' and registration_number='".$regist_number."';";
		if($results=mysqli_query($link,$car_dup_check)){
			$car = mysqli_fetch_row($results);
			echo $car[0];
			if($car[0]!=''){
				echo "<center><h3>Registration Number already exists.</h3></center>";
				}
			else{
				require 'image_table.php';
				if($url[0]==''){
					echo "<center><h3>Please select and upload Image.</h3></center>";
				}
				else{
					$car_details="INSERT INTO mini_car_store(manufacture_name,model,color,price,manufacturing_year,registration_number,sold_flag,url)
									VALUES ('".$manufac_name."','".$model."','".$color."',".$price.",".$manufac_year.",'".$regist_number."','N','".$url."')";
					if(mysqli_query($link,$car_details)){
						echo "<center><h3>Records Stored successfully.</h3></center>";
						$delete_duplicate="DELETE FROM mini_car_store where manufacture_name='".$manufac_name."' and color='' ;";
						mysqli_query($link,$delete_duplicate);
						require 'delete_images.php';
						header( "refresh:3; url=view_inventory.php" );
					}
					else{
						echo "<center><h3>Sorry!!! Could not able to store the records.</h3></center>";
					}
				}
			}
		}
	}

$link->close(); 	
}

?>
<script type="text/javascript" src="functions.js"></script>
