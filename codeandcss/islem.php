<?php 

include'baglan.php';
ob_start(); 
session_start(); 
#Sekreter Login baglantı kısmı/#Sekreter Login baglantı kısmı/#Sekreter Login baglantı kısmı/#Sekreter Login baglantı kısmı/#Sekreter Login baglantı kısmı/ Başlangıç
if(isset($_POST['seclog']))
{
	//değişken atama
	$login_mail = $_POST['secmail'];
	$login_pass = $_POST['secpass'];

	//sorgu yeri gösterimi
	$query = "SELECT * FROM reception WHERE rec_mail = '$login_mail' and rec_pass='$login_pass' ";
	
	//baglantıyla sorguyu ilişkilendiriyor
	$result = $conn->query($query); 
	
	//sonucların dogrulugunu kontrol ediyor
	$row = $result->fetch_assoc();
	
	if($row['rec_mail']=="$login_mail" && $row['rec_pass']=="$login_pass")
	{
		$_SESSION['secmail']= $login_mail;
		
		header("Location:../HMS/secindex.php");
	} 
	else{
		header('Location:../HMS/seclog.php?login=no');
	} 
} 
#Sekreter Login baglantı kısmı/#Sekreter Login baglantı kısmı/#Sekreter Login baglantı kısmı/#Sekreter Login baglantı kısmı/#Sekreter Login baglantı kısmı/  Bitiş


#Doctor Login baglantı kısmı/#Doctor Login baglantı kısmı/#Doctor Login baglantı kısmı/#Doctor Login baglantı kısmı/#Doctor Login baglantı kısmı/ Başlangıç
if(isset($_POST['doclog']))
{
	//değişken atama
	$login_mail = $_POST['docmail'];
	$login_pass = $_POST['docpass'];

	//sorgu yeri gösterimi
	$query = "SELECT * FROM doctor WHERE doc_mail = '$login_mail' and doc_pass='$login_pass' ";
	
	//baglantıyla sorguyu ilişkilendiriyor
	$result = $conn->query($query); 
	
	//sonucların dogrulugunu kontrol ediyor
	$row = $result->fetch_assoc();
	
	if($row['doc_mail']=="$login_mail" && $row['doc_pass']=="$login_pass")
	{

		$_SESSION['doc_id']= $row['doc_id'];
		$_SESSION['doc_name']= $row['doc_name'];
		$doc_id = $_SESSION['doc_id'];
		$doc_name = $_SESSION['doc_name'];
		
		header("Location:../HMS/docindex.php?doc_id=$doc_id&doc_name=$doc_name");
	} 
	else{
		header('Location:../HMS/doclog.php?login=no');
	} 
} 
#Doctor Login baglantı kısmı/#Doctor Login baglantı kısmı/#Doctor Login baglantı kısmı/#Doctor Login baglantı kısmı/#Doctor Login baglantı kısmı/  Bitiş

#Hasta ekleme sekreter/ #Hasta ekleme sekreter #Hasta ekleme sekreter #Hasta ekleme sekreter #Hasta ekleme sekreter #Hasta ekleme sekreter /Başlangıç


if (isset($_POST['hasta_ekle_saat']))
{
	$pat_name=$_POST['pat_name'];
	$pat_surname=$_POST['pat_surname'];
	$pat_tc=$_POST['pat_tc'];
	$pat_gender=$_POST['pat_gender'];
	$pat_phone=$_POST['pat_phone'];
	$pat_address=$_POST['pat_address'];
	$pat_bloodType=$_POST['pat_bloodType'];
	$pat_dep=$_POST['pat_dep'];
	$pat_appointment=$_POST['pat_appointment'];
	$doc_name=$_POST['doc_name'];

	$query ="SELECT * FROM patient WHERE  patient.pat_appointment='$pat_appointment' and patient.pat_docname='$doc_name'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0) 
	{
		header("Location:../HMS/secindex.php?ekleme=hatarandevu");

	}
	else{



		$hastaekle="INSERT INTO patient (pat_name,pat_sname,pat_tc,pat_gender,pat_blood_gp,pat_dep,pat_adress,pat_phone,pat_appointment,pat_docname) VALUES ('$pat_name','$pat_surname','$pat_tc','$pat_gender','$pat_bloodType','$pat_dep','$pat_address','$pat_phone','$pat_appointment','$doc_name')";

		if (mysqli_query($conn, $hastaekle)) 
		{
			header("Location:../HMS/secindex.php?ekleme=ok");

		}
		else {
			header("Location:../HMS/secindex.php?ekleme=no");
		}
	}
}

#Hasta ekleme sekreter/ #Hasta ekleme sekreter #Hasta ekleme sekreter #Hasta ekleme sekreter #Hasta ekleme sekreter #Hasta ekleme sekreter /Bitiş


#Hasta diagnose ekleme ve silme/ #Hasta diagnose ekleme ve silme/Hasta diagnose ekleme ve silme/Hasta diagnose ekleme ve silme/Hasta diagnose ekleme ve silme/basla


if (isset($_POST['hasta_diagnose_kaydet']))
{
	$pat_id=$_POST['pat_id'];
	$pat_name=$_POST['pat_name'];
	$pat_sname=$_POST['pat_sname'];
	$pat_gender=$_POST['pat_gender'];
	$pat_blood_gp=$_POST['pat_blood_gp'];
	$pat_diagnose=$_POST['pat_diagnose'];
	
	$diagnoseekle="INSERT INTO pat_diagnoses (pat_id,pat_name,pat_sname,pat_gender,pat_blood_gp,pat_diagnose) VALUES ('$pat_id','$pat_name','$pat_sname','$pat_gender','$pat_blood_gp','$pat_diagnose')";
	if (mysqli_query($conn, $diagnoseekle)) 
	{
		$hastasil="DELETE FROM patient WHERE pat_id='$pat_id'";

		if (mysqli_query($conn, $hastasil)) 
		{
			header("Location:../HMS/docindex.php?hastasil=ok");

		}
		else {
			header("Location:../HMS/docindex.php?hastasil=no");
		}
	}
	else {
		header("Location:../HMS/docindex.php?diagnoseekleme=no");
	}
}
#Hasta diagnose ekleme ve silme/ #Hasta diagnose ekleme ve silme/Hasta diagnose ekleme ve silme/Hasta diagnose ekleme ve silme/Hasta diagnose ekleme ve silme/Bitiş

if (isset($_POST['hasta_ekle_saat_onli']))
{
	$pat_name=$_POST['pat_name'];
	$pat_surname=$_POST['pat_surname'];
	$pat_tc=$_POST['pat_tc'];
	$pat_gender=$_POST['pat_gender'];
	$pat_phone=$_POST['pat_phone'];
	$pat_address=$_POST['pat_address'];
	$pat_bloodType=$_POST['pat_bloodType'];
	$pat_dep=$_POST['pat_dep'];
	$pat_appointment=$_POST['pat_appointment'];
	$doc_name=$_POST['doc_name'];
	$pat_plaint=$_POST['pat_plaint'];

	$query ="SELECT * FROM patient WHERE  patient.pat_appointment='$pat_appointment' and patient.pat_docname='$doc_name'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0) 
	{
		header("Location:../HMS/online.php?ekleme_onli=hatarandevu");
	}
	else{



		$hastaekle="INSERT INTO patient (pat_name,pat_sname,pat_tc,pat_gender,pat_blood_gp,pat_dep,pat_adress,pat_phone,pat_appointment,pat_docname,pat_plaint) VALUES ('$pat_name','$pat_surname','$pat_tc','$pat_gender','$pat_bloodType','$pat_dep','$pat_address','$pat_phone','$pat_appointment','$doc_name','$pat_plaint')";

		if (mysqli_query($conn, $hastaekle)) 
		{
			header("Location:../HMS/online.php?ekleme_onli=ok");
		}
		else {
			header("Location:../HMS/online.php?ekleme_onli=no");
		}
	}
}

#Online Randevu#Online Randevu#Online Randevu#Online Randevu#Online Randevu#Online Randevu#Online Randevu#Online Randevu#Online Randevu#Online Randevu#Online Randevu







?>