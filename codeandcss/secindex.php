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
	<?php if ($_GET['ekleme']=="ok") { ?>
		<h4 style="color: red;"> Successfully Added Patient...</h4>
	<?php } ?>
	<?php if ($_GET['ekleme']=="no") { ?>
		<h4 style="color: red;"> Patient Could Not Be Added...</h4>
	<?php } ?>
	<?php if ($_GET['ekleme']=="hatarandevu") { ?>
		<h4 style="color: red;"> The appointment time of the chosen doctor is full..</h4>
	<?php } ?>
	<div class="wrapper" style="width: 35%; float:left">
		<h2>Adding Patients</h2>
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
				<label>Plaint</label>
				<input type="text" name="pat_plaint" class="form-control" value="">
				<span class="help-block"></span>
			</div>      
			<div class="form-group">
				<label>Polyclinic to be referred</label><br>
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
				if($_GET['hasta_ekle']=="")
				{ 
					?>
					<div class="form-group">
						<input type="submit"  name="hasta_ekle" class="btn btn-primary" value="Next">
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
				<input type="hidden" name="pat_plaint" value="<?php echo $_GET['pat_plaint']; ?>">
		
				<?php 
				if(isset($_GET['hasta_ekle']))
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
								else
								{
									?>
									<h4 style="color: red;"> There is no doctor in the department you are looking for.</h4>
									<?php
								}
								?>
								<?php 
							}
							?>
							<div class="form-group">
								<input type="submit"  name="hasta_ekle_saat" class="btn btn-primary" value="Kaydet">
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


<?php //sağa doktor veya resepsiyonist ekleme ?>
<?php
	include "baglan.php";	
	if(isset($_GET['type_of_employee']))
	{
		$type_of_employee = $_GET['type_of_employee'];
		if($type_of_employee == "doctor")
		{
			$sql="INSERT INTO doctor (doc_name,doc_surname,doc_tc,doc_mail,doc_pass,doc_pnum,doc_salaries,dep_id) VALUES (?,?,?,?,?,?,?,?)";

		}
		else
		{
			$sql="INSERT INTO reception (rec_name,rec_surname,rec_tc,rec_mail,rec_pass,rec_pnum,rec_salaries,dep_id) VALUES (?,?,?,?,?,?,?,?)";

		}
	}
	// Validate username
	if(empty(trim($_GET['name']))){
		$name_err = "Please enter a username.";
	} 
	else if(empty(trim($_GET['surname'])))
	{
		$surname_err ="Please enter a surname.";
	}
	else{
		if($stmt = mysqli_prepare($conn, $sql)){
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "ssisiiii",$name, $surname, $tc, $mail, $pass, $pnum,$salary,$dep_id);
			// Set parameters
			$name = ($_GET['name']);
			$surname = ($_GET['surname']);
			$tc = ($_GET['tc']);
			$mail = ($_GET['mail']);
			$pass = ($_GET['password']);
			$pnum = ($_GET['phone']);
			$salary = ($_GET['salary']);
			$dep_id =$_GET['dep_id'];

		
			// Attempt to execute the prepared statement
			if(mysqli_stmt_execute($stmt)){
				/* store result */
				mysqli_stmt_store_result($stmt);
				
				if(mysqli_stmt_num_rows($stmt) == 1){
					$name_err = "This username is already taken.";
				} else{
					$name = trim($_POST["pat_name"]);
				}
			} else{
				echo "Oops! Something went wrong. Please try again later.";
			}

			// Close statement
			mysqli_stmt_close($stmt);
		}
	}
?>


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
<body>
	<?php if ($_GET['']=="ok") { ?>
		<h4 style="color: red;"> Successfully Added Patient...</h4>
	<?php } ?>
	<?php if ($_GET['']=="no") { ?>
		<h4 style="color: red;"> Patient Could Not Be Added...</h4>
	<?php } ?>
	<?php if ($_GET['']=="hatarandevu") { ?>
		<h4 style="color: red;"> The appointment time of the chosen doctor is full..</h4>
	<?php } 
          $type_of_employee;?>
	<div class="wrapper" style="width: 40%; float:right">
		<h2>Add Employeese</h2>
		<form action="" method="GET">

		<div class="radioleft" >
			<label>Choose</label><br>   
			<label>
			<input type="radio" id="doctor" name="type_of_employee" value="doctor" style="text-align:left">Doctor<br>
			</label>
			<label>
			<input type="radio" id="receptionist" name="type_of_employee" value="receptionist" style="text-align:left">Reception<br>
			</label>
			
			<!--<input type="text" name="$pat_gender" class="form-control" value="<?php $type_of_employee?>" >-->
			<span class="help-block"></span>
		</div>

			<div class="form-group">
				<label>Name</label>
				<input type="text" align="right" name="name" class="form-control" value="<?php echo $name; ?>">
				<span class="help-block"></span>
			</div>      
			<div class="form-group">
				<label>Surname</label>
				<input type="text" name="surname" class="form-control" value="<?php echo $surname; ?>">
				<span class="help-block"></span>
			</div>
			<div class="form-group">
				<label>Identification Number</label>
				<input type="number" name="tc" class="form-control" value="<?php echo $tc; ?>">
				<span class="help-block"></span>
			</div>   
			<div class="form-group">
				<label>Mail</label>
				<input type="text" name="mail" class="form-control" value="<?php echo $mail; ?>">
				<span class="help-block"></span>
			</div>  
			<div class="form-group">
				<label>Password</label>
				<input type="number" name="password" class="form-control" value="<?php echo $pass; ?>">
				<span class="help-block"></span>
			</div>   
			<div class="form-group">
				<label>Phone Number</label>
				<input type="number" name="phone" class="form-control" value="<?php echo $pnum; ?>">
				<span class="help-block"></span>
			</div>  
			<div class="form-group">
				<label>Salary</label>
				<input type="number" name="salary" class="form-control" value="<?php echo $salary; ?>">
				<span class="help-block"></span>
			</div>   
			<div class="form-group <?php echo (!empty($bloodType_err)) ? 'has-error' : ''; ?>">
                <label>Department </label><br>
               <!-- <input type="text" name="pat_bloodType" class="form-control" value="<?php echo $dep_id; ?>">-->
               <select name="dep_id" size="3">  
                <option value="1">Oncology</option>  
                <option value="2">Ear</option>  
				<option value="3">Nose</option> 
				<option value="4">Throat</option> 

                </select>  
                <span class="help-block"><?php echo $dep_id_err; ?></span>
            </div>   
			<div class="form-group">
				<input type="submit"  value="Save" name="employee_add" class="btn btn-primary">
				<input type="reset" class="btn btn-default" value="Reset">
			</div>


<html>
<head></head>
<body>


<input type="button" value="Previous Page" onclick="history.back(-1)" />
<?php
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
?>