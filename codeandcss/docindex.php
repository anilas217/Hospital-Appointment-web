<?php 
include'baglan.php';
$referer = $_SERVER['HTTP_REFERER'];  

if ($referer == "")  
{  
  die(header("Location:../HMS/doclog.php"));  #elle sayfaya gitmyeyi önler sadece buton
} 

?>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container">
  <div class="row">
    <div class="col">
      <?php
      session_start();
      $doc_id =  $_SESSION['doc_id']; 
      $doc_name =  $_SESSION['doc_name']; 
      ?>
<?php #EKRAN SABİTİ#EKRAN SABİTİ#EKRAN SABİTİ#EKRAN SABİTİ#EKRAN SABİTİ#EKRAN SABİTİ#EKRAN SABİTİ#EKRAN SABİTİ#EKRAN SABİTİ#EKRAN SABİTİ#EKRAN SABİTİ
?>
<table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Patient ID</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Gender</th>
            <th scope="col">Blood Type</th>
            <th scope="col">Department</th>
            <th scope="col">Appointment Time</th>
            <th scope="col">Plaint</th>
          </tr>
        </thead>
        <tbody>
          <form method="get">
            <?php 
            $pat_idd=($_GET["pat_id"]);
            if($pat_idd=="")
            {
              $barsor5 ="SELECT * FROM patient,doctor,department where patient.pat_docname='$doc_name' AND doctor.doc_name='$doc_name' and patient.pat_dep=department.dep_name AND department.dep_id=doctor.dep_id";
            }
            else{
                echo "There is no patient";
            }
            $result5 = $conn->query($barsor5);
            if ($result5->num_rows > 0) {
              while($row = $result5->fetch_assoc()) 
              { 
                ?> 
                <tr>
                 <td>
                  <?php echo $row['pat_id']; ?>
                </td>
                <td>
                  <?php echo $row['pat_name']; ?>
                </td>
                <td>
                  <?php echo $row['pat_sname']; ?>
                </td>
                <td>
                  <?php echo $row['pat_gender']; ?>
                </td>
                <td>
                 <?php echo $row['pat_blood_gp']; ?>
               </td>
               <td>
                <?php echo $row['pat_dep']; ?>
              </td>
              <td>
                <?php echo $row['pat_appointment']; ?>
              </td>
              <td>
                <?php echo $row['pat_plaint']; ?>
              </td>
               


            <?php   
          }
         }
          else
          {
            ?>
                <div class="kontrolürün" class="col-md-12">
                  <h1>You Have No Patient!</h1>
                </div>
            <?php 
          } 
          ?> 
</form>
</tbody>
</table>
          <form method="GET">
          <div class="col">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
          </div>
          <input type="text" class="form-control" name="kan" placeholder="Enter Blood Type" aria-label="" aria-describedby="basic-addon1">


        </div>
      </div>


      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Patient ID</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Gender</th>
            <th scope="col">Blood Type</th>
            <th scope="col">Department</th>
            <th scope="col">Appointment Time</th>
            <th scope="col">Plaint</th>
          </tr>
        </thead>

        <tbody>
          
            <?php 

            $kangrubu=($_GET["kan"]);
            

            if($kangrubu=="")
            {
            }
            else{
              $barsor2 ="SELECT * FROM patient,doctor,department where patient.pat_docname='$doc_name' AND doctor.doc_name='$doc_name' and patient.pat_dep=department.dep_name AND department.dep_id=doctor.dep_id and pat_blood_gp='$kangrubu'";
            }
            $result2 = $conn->query($barsor2);
            if ($result2->num_rows > 0) {


              while($row = $result2->fetch_assoc()) 
              { 
                ?> 
                <tr>
                 <td>
                  <?php echo $row['pat_id']; ?>
                </td>
                <td>
                  <?php echo $row['pat_name']; ?>
                </td>
                <td>
                  <?php echo $row['pat_sname']; ?>
                </td>
                <td>
                  <?php echo $row['pat_gender']; ?>
                </td>
                <td>
                 <?php echo $row['pat_blood_gp']; ?>
               </td>

               <td>
                <?php echo $row['pat_dep']; ?>
              </td>
              <td>
                <?php echo $row['pat_appointment']; ?>
              </td>
                 <td>
                  <?php echo $row['pat_plaint']; ?>
                </td>

             


            <?php   
          } }

          else{
            ?>
            
            <?php 
          } ?> 


        </tbody>
      </table>
     
      <div class="col">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <button class="btn btn-outline-secondary"  type="submit">Search</button>
          </div>
          <input type="text" class="form-control" name="patient_id" placeholder="Patient ID" aria-label="" aria-describedby="basic-addon1">
        </form>
      </div>
      





      
      <?php  $patient_id=($_GET["patient_id"]); 
       
     
      if($patient_id!="")
      {         
        $barsor3 ="SELECT * FROM patient,doctor,department where patient.pat_docname='$doc_name' AND doctor.doc_name='$doc_name' and patient.pat_dep=department.dep_name AND department.dep_id=doctor.dep_id and patient.pat_id='$patient_id'";   
        $result3 = $conn->query($barsor3);
        if ($result3->num_rows > 0) {
          $row2 = $result3->fetch_assoc()
          ?>

          <form method="post" action="islem.php">  
            <table bgcolor="#C4C4C4" align="center" width="380" border="0">   

              <tr>    
                <td  align="center"colspan="2"><font color="#0000FF" size="5"> Patient number <?php echo $patient_id; ?> </font></td>    
              </tr>   

              <tr>    
                <td width="612"></td>   
                <td width="672"> </td>    
              </tr>   
              <tr>    

                <td>  Enter the treatment method ! </td>    
                <td><textarea name="pat_diagnose" value ="" ></textarea></td>    
              </tr> 
              <td align="center" colspan="2">

                <input type="submit" value="Save" name="hasta_diagnose_kaydet" />
                <input type="hidden"  value="<?php echo $row2['pat_id']; ?>" name="pat_id">
                <input type="hidden"  value="<?php echo $row2['pat_name']; ?>" name="pat_name">
                <input type="hidden"  value="<?php echo $row2['pat_sname']; ?>" name="pat_sname">
                <input type="hidden"  value="<?php echo $row2['pat_gender']; ?>" name="pat_gender">
                <input type="hidden"  value="<?php echo $row2['pat_blood_gp']; ?>" name="pat_blood_gp">
                <input type="hidden"  value="<?php echo $row2['pat_plaint']; ?>" name="pat_plaint">





              </td>   
            </table>
          </form> 
        </body>

        <?php 
      }}
      ?>
<style>
.container {
  height: 200px;
  position: relative;
  border: 3px ;
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>

<div class="container">
  <div class="center">
  <input type="button" value="Return to the previous operation" onclick="history.back(-1)" />
<?php
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
?>
  </div>
</div>
  
    
    
    
    </div>
  </div>


