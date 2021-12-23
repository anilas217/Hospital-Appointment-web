<?php 
$username="root";
$password="Berk1997.";
$servername="localhost";
$database="hms";


$conn=mysqli_connect($servername,$username,$password,$database);
if (!$conn) 
{
	die ("Baglantı hatası" .mysqli_connect_error());
}


?>