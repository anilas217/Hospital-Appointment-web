<?php
include 'baglan.php';



?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" type="text/css" href="styleedoclogin.css">
<div class="wrapper fadeInDown" style="background-image: url(hosp_backg.jpg); background-repeat:no-repeat; background-attachment: fixed;
  background-size: 100% 100%;">

	<label >DOCTOR LOGIN</label>
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    

    <!-- Login Form -->
    <form action="islem.php" method="post">
      <?php if ($_GET['login']=="no") { ?>
        <h4 style="color: red;">You entered incorrectly...</h4>
      <?php }?>
      <input type="text" class="fadeIn second" name="docmail" placeholder="Mail">
      <input type="text"  class="fadeIn third" name="docpass" placeholder="Password">
      <input type="submit" class="fadeIn fourth" value="Log In" name="doclog">
    </form>

    <!-- Remind Passowrd -->
    
  </div>
</div>