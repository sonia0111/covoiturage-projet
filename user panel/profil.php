<?php

require_once('../db.php');
?>

<section id="main-content">
      <section class="wrapper">
        
          <div class="col-lg-12">
            <div class="row content-panel">
              
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
              </div>
              <?php
        

        
        $user = $_SESSION['user'];
    $id = $user->id_user;
        
        $query = "SELECT * FROM user WHERE id_user='$id' ";
        $query_run = mysqli_query($connection, $query);
        
        foreach($query_run as $row)
        {
            ?>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="<?php echo '../upload/df.png';?>" class="img-circle"></p>
                  <br> <br>
                  <h3><?php echo $row['nom_user']." ".$row['prenom_user']?></h3>
                  <br>
                <h6><?php echo "email ".$row['email_user'];?></h6>
                <br>
                
                
                <div style="display: flex;justify-content: space-between;gap: 20px;color: white;">
                <button class="btn btn-theme"><i class="fa  fa-edit"></i><a href="profile.php"  style="color: white;"  > modifier mon profile</a></button>
                <button class="btn btn-theme04"><i class="fa  fa-edit"></i><a href="password.php" style="color: white;" > modifier mon mot de passe</a></button>
        </div>
                <br><br><br><br>
                  <?php }?>
                </div>
                <style>        
        textarea[name=note_aff] {
  height: 40vh;
  width: 80vw;
  max-height: 150px;
  max-width: 500px;
  font-size: 16px;
  line-height: 1.5;
  resize: none;
}

@media screen and (max-width: 768px) {
  textarea[name=note_aff] {
    width: 90%;
    min-height: 100px; /* Réduire la hauteur minimale sur les écrans plus petits */
  }
}                         
         </style>
              <br>
               <!-- /col-md-4 -->
            </div>
            <!-- /row -->
            <button class="btn btn-theme04 pull-right" ><i class="fa  fa-delete"></i><a href="delete.php" style="color: white;" > supprimer mon compte</a></button>
        
          </div>
          
          







          <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>




<?php
    include_once('script.php');
    include_once('footer.php');
    ?>