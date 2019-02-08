<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$name=$_POST['name'];
$idnumber=$_POST['idnumber'];
$pertition=$_POST['pertition'];
//move_uploaded_file($_FILES["img"]["tmp_name"],"img/voterimage/".$_FILES["img"]["name"]);
$sql="INSERT INTO pertition (name,idnumber,pertition) VALUES(:name,:idnumber,:pertition)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':idnumber',$idnumber,PDO::PARAM_STR);
$query->bindParam(':pertition',$pertition,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Successfully Filled A Pertition Please Wait For Its Approval ";
}
else 
{
$error="Something went wrong. Please try again";
}

}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Online Voting  Portal | Polititcian File A Pertition</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">File  A Pertition</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">File A Pertition</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Politician Full Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="name" class="form-control" required>
</div>
<!--
<label class="col-sm-2 control-label">Select Gender<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="gender" required>
<option value=""> Select </option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>
-->
<div class="form-group">
<label class="col-sm-2 control-label">National ID Number<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="idnumber" class="form-control" required>
</div>
<!--
<label class="col-sm-2 control-label">County<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="county" required>
<option value=""> Select </option>

<option value="machakos">Machakos</option>
<option value="kitui">Kitui</option>
<option value="makueni">Makueni</option>
<option value="mombasa">Mombasa</option>
<option value="murang`a">Murang`a</option>
<option value="Laikipia">Laikipia</option>
<option value="Siaya">Siaya</option>
<option value="Kwale">Kwale</option>
<option value="Meru">Meru</option>
<option value="Kiambu">Kiambu</option>
<option value="Nakuru">Nakuru</option>
<option value="Kisumu">Kisumu</option>
<option value="Kilifi">Kilifi</option>
<option value="Tharaka-Nithi">Tharaka-Nithi</option>
<option value="Turkana">Turkana</option>
<option value="Narok">Narok</option>
<option value="Homa Bay">Homa Bay</option>
<option value="Tana River">Tana River</option>
<option value="Embu">Embu</option>
<option value="West Pokot">West Pokot</option>
<option value="Kajiado">Kajiado</option>
<option value="Migori">Migori</option>
<option value="Lamu">Lamu</option>
<option value="Samburu">Samburu</option>
<option value="Kericho">Kericho</option>
<option value="Kisii">Kisii</option>
<option value="Taita-Taveta">Taita-Taveta</option>
<option value="Trans-Nzoia">Trans-Nzoia</option>
<option value="Bomet">Bomet</option>
<option value="Nyamira">Nyamira</option>
<option value="Garissa">Garissa</option>
<option value="Uasin Gishu">Uasin-Gishu</option>
<option value="Kakamega">Kakamega</option>
<option value="Nairobi">Nairobi</option>
<option value="Wajir">Wajir</option>
<option value="Nyandarua">Nyandarua</option>
<option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option>
<option value="Vihiga">Vihiga</option>
<option value="Mandera">Mandera</option>
<option value="Nyeri">Nyeri</option>
<option value="Nandi">Nandi</option>
<option value="Bugoma">Bugoma</option>
<option value="Marsabit">Marsabit</option>
<option value="Kirinyaga">Kirinyaga</option>
<option value="Baringo">Baringo</option>
<option value="Busia">Busia</option>
	</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Sub County<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="subcounty" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Ward<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="ward" class="form-control" required>
</div>-->
</div>

<div class="form-group">
<label class="col-sm-2 control-label">File A Pertition<span style="color:red">*</span></label>
<div class="col-sm-9">
<input type="text" name="pertition" class="form-control" required>
</div>

</div> 

<div class="hr-dashed"></div>

<!--
<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Voter Image</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image <span style="color:red">*</span><input type="file" name="img" required>
</div>

<div class="col-sm-4">
Image 2<span style="color:red">*</span><input type="file" name="img2" required>
</div>
<div class="col-sm-4">
Image 3<span style="color:red">*</span><input type="file" name="img3" required>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 4<span style="color:red">*</span><input type="file" name="img4" required>
</div>
<div class="col-sm-4">
Image 5<input type="file" name="img5">
</div>-->

</div>
<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
							
<!--
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Accessories</div>
<div class="panel-body">


<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="airconditioner" name="airconditioner" value="1">
<label for="airconditioner"> Air Conditioner </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">
<label for="powerdoorlocks"> Power Door Locks </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1">
<label for="antilockbrakingsys"> AntiLock Braking System </label>
</div></div>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="brakeassist" name="brakeassist" value="1">
<label for="brakeassist"> Brake Assist </label>
</div>
</div>



<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powersteering" name="powersteering" value="1">
<input type="checkbox" id="powersteering" name="powersteering" value="1">
<label for="inlineCheckbox5"> Power Steering </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="driverairbag" name="driverairbag" value="1">
<label for="driverairbag">Driver Airbag</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="passengerairbag" name="passengerairbag" value="1">
<label for="passengerairbag"> Passenger Airbag </label>
</div></div>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powerwindow" name="powerwindow" value="1">
<label for="powerwindow"> Power Windows </label>
</div>
</div>


<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="cdplayer" name="cdplayer" value="1">
<label for="cdplayer"> CD Player </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox h checkbox-inline">
<input type="checkbox" id="centrallocking" name="centrallocking" value="1">
<label for="centrallocking">Central Locking</label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="crashcensor" name="crashcensor" value="1">
<label for="crashcensor"> Crash Sensor </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="leatherseats" name="leatherseats" value="1">
<label for="leatherseats"> Leather Seats </label>
</div>
</div>
</div>
-->



											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">File Pertition</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>