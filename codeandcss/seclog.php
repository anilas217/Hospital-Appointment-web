<?php include'baglan.php'; ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="styleseclogin.css">
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown" style="background-image: url(hospital.jpg); background-repeat:no-repeat; background-attachment: fixed;
  background-size: 100% 100%;">
	<label>PERSONEL LOGIN</label>
	<div id="formContent">
		<!-- Tabs Titles -->

		<!-- Icon -->


		<!-- Login Form -->

		<form action="islem.php" method="post">
			<?php if ($_GET['login']=="no") { ?>
				<h4 style="color: red;">Hatalı giriş yaptınız...</h4>
			<?php }?>
			<input type="text" class="fadeIn second" name="secmail" placeholder="mail">
			<input type="text"  class="fadeIn third" name="secpass" placeholder="password">
			<input type="submit" class="fadeIn fourth" value="Log In" name="seclog">

		</form>



	</div>
</div>