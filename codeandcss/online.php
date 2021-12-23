<?php include "baglan.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<link rel="stylesheet" href="stylesecindex.css" type="text/css">
	<style type="text/css">
		body{ font: 14px sans-serif; }
		.wrapper{ width: 350px; padding: 20px; }
	</style>
</head>
<body style="background-image: url(hospital.jpg); background-repeat:no-repeat; background-attachment: fixed;
    background-size: 100% 100%;">
	<?php if ($_GET['ekleme_onli']=="ok") { ?>
		<h4 style="color: red;"> Your Appointment Has Been Created Successfully. Healthy days..</h4>
	<?php } ?>
	<?php if ($_GET['ekleme_onli']=="no") { ?>
		<h4 style="color: red;"> An error was encountered while creating your appointment. Please try again later...</h4>
	<?php } ?>
	<?php if ($_GET['ekleme_onli']=="hatarandevu") { ?>
		<h4 style="color: red;"> The appointment time of the chosen doctor is full..</h4>
	<?php } ?>
	<div class="wrapper" style="width: 35%; float:left">
		<h2>Making An Appointment </h2>
		<p>Please fill this form to create an appointment.</p>
		<form action="" method="GET">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="pat_name" class="form-control" value="">
				<span class="help-block"></span>
			</div>      
			<div class="form-group">
				<label>Surname</label>
				<input type="text" name="pat_surname" class="form-control" value="">
				<span class="help-block"></span>
			</div>
			<div class="form-group">
				<label>Identification Number</label>
				<input type="number" name="pat_tc" class="form-control" value="">
				<span class="help-block"></span>
			</div>   
			<div class="radioleft">
				<label>Gender</label>
				<label>
				<input type="radio" id="male" name="pat_gender"  value="male" style="text-align:left">MALE<br>
				</label>
				<label>
				<input type="radio" id="female" name="pat_gender" value="female" style="text-align:left">FEMALE<br>
				</label>
				<label>
				<input type="radio" id="other" name="pat_gender" value="other" style="text-align:left">OTHER<br>
				</label>
				<!--<input type="text" name="$pat_gender" class="form-control" value="<?php echo $pat_gender; ?>" >-->
				<span class="help-block"></span>
			</div>

			<div class="form-group">
				<label>Phone Number</label>
				<input type="number" name="pat_phone" class="form-control" value="">
				<span class="help-block"></span>
			</div>   
			<div class="form-group">
				<label>Address</label>
				<input type="text" name="pat_address" class="form-control" value="">
				<span class="help-block"></span>
			</div>   
			<div class="form-group">
				<label>Blood type</label><br>
				<!-- <input type="text" name="pat_bloodType" class="form-control" value="<?php echo $pat_bloodType; ?>">-->
				<select name="pat_bloodType" size="6">  
					<option value="ARh+"> ARh+ </option>  
					<option value="ARh-"> ARh- </option>  
					<option value="BRh+"> BRh+ </option>  
					<option value="BRh-"> BRh- </option>  
					<option value="ABRh+"> ABRh+ </option>  
					<option value="0"> 0 </option>  
				</select>  

			</div>  
			<div class="form-group">
				<label>Selecet a Department</label><br>
				<!-- <input type="text" name="pat_bloodType" class="form-control" value="<?php echo $pat_bloodType; ?>">-->
				<select name="pat_dep" size="4">  
					<option value="onkoloji"> Oncology </option>  
					<option value="kulak"> Ear </option>  
					<option value="burun"> Nose </option>  
					<option value="bogaz"> Throat </option>  


				</select>  

			</div>   
			<div>
				<?php	
				if($_GET['hasta_ekle_onli']=="")
				{ 
					?>
					<div class="form-group">
						<input type="submit"  name="hasta_ekle_onli" class="btn btn-primary" value="Next">
						<input type="reset" class="btn btn-default" value="Reset">
					</div>

				<?php } ?>
			</form>
			<form action="islem.php" method="POST">
				<input type="hidden" name="pat_name" value="<?php echo $_GET['pat_name']; ?>">
				<input type="hidden" name="pat_surname" value="<?php echo $_GET['pat_surname']; ?>">
				<input type="hidden" name="pat_tc" value="<?php echo $_GET['pat_tc']; ?>">
				<input type="hidden" name="pat_gender" value="<?php echo $_GET['pat_gender']; ?>">
				<input type="hidden" name="pat_phone" value="<?php echo $_GET['pat_phone']; ?>">
				<input type="hidden" name="pat_address" value="<?php echo $_GET['pat_address']; ?>">
				<input type="hidden" name="pat_bloodType" value="<?php echo $_GET['pat_bloodType']; ?>">
				<input type="hidden" name="pat_dep" value="<?php echo $_GET['pat_dep']; ?>">

				<?php 
				if(isset($_GET['hasta_ekle_onli']))
				{ 
					if(isset($_GET['pat_dep']))
					{ 
						$departman=$_GET['pat_dep'];	
						?>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Doctor Name</th>
									<th scope="col">Appointment Time</th>

								</tr>
							</thead>
							<tbody>
								<?php 
								$barsor2 ="SELECT department.dep_name,doctor.doc_name FROM doctor,department where department.dep_name='$departman' AND department.dep_id=doctor.dep_id";

								$result2 = $conn->query($barsor2);
								if ($result2->num_rows > 0) {
									while($row = $result2->fetch_assoc()) 
									{ 
										?> 
										<tr>
											<th scope="row"><input type="radio" name="doc_name" value="<?php echo $row['doc_name']; ?>"><label><?php echo $row['doc_name']; ?></label></th>
											<td><input type="radio" name="pat_appointment" value="10.30"><label>10.30</label><br><input type="radio" name="pat_appointment" value="12.30"><label>12.30</label><br><input type="radio" name="pat_appointment" value="14.30"><label>14.30</label>
											</td>

										</tr>
									<?php }
								}
								?>
								<?php 
							}
							?>
							<div class="form-group">
								<input type="submit"  name="hasta_ekle_saat_onli" class="btn btn-primary" value="Kaydet">
								<input type="reset" class="btn btn-default" value="Reset">
							</div>
						<?php } ?>
					</form>
				</tbody>
			</table>
		</div>
	</div>    
</body>
</html>





