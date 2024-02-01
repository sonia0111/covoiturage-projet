
    <?php
   $query = "SELECT * FROM user WHERE id_user='$id_user'";
   $query_run = $bd->query($query);
   $row = $query_run->fetch(PDO::FETCH_ASSOC);
    ?>
   <div class='profile'>
    <div class="profile-modification" style="widht:300px;">
        <div class="profile-modification-form">
            <h1>Modifier le Profil</h1>
            <form method="post" id="profileForm" action="modifierpdp.php" enctype="multipart/form-data">
                <!-- Ajoutez ici vos champs de formulaire pour la modification de profil -->
                
                <label for="pdp">Photo de profil :</label>
                <div class="profile-pic">
                    <?php if (!empty($row['pdp'])) { ?>
                        <img src="<?php echo '../upload/' . $row['pdp']; ?>" class="img-circle" id="profileImage">
                    <?php } else { ?>
                        <img src="../upload/df.jpg" class="img-circle" id="profileImage">
                    <?php } ?>
                    <input type="text" hidden="hidden" name="old_pp" value="<?php echo $row['pdp']; ?>">
                    <input type="file" id="photoInput" style="display:none;" name="image">
 
                    <button type="button" onclick="document.getElementById('photoInput').click()">Modifier la Photo</button>
                    </div>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?= $row['nom_user']; ?>">

                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="<?= $row['prenom_user']; ?>">

                <label for="num_tel">Numéro de téléphone :</label>
                <input type="text" id="num_tel" name="num_tel" value="<?= $row['num_tel']; ?>">

                <label for="email">Email :</label>
                <input type="text" id="email" name="email" value="<?= $row['email_user']; ?>" readonly>

                <button type="submit">Enregistrer</button>
            </form>
        </div>
       

        
* {
    margin:0;
    padding:0;

  box-sizing: border-box;
}
.editprofile{
    display: flex;
    position:absolute;
    width: calc(100% - 78px);
    height: calc(100vh - 68px);
    align-items:center;
    justify-content:center;
    left:78px;
    bottom:0;
    transition: all 0.5s ease;
}
.editprofile-opened{
    width: calc(100% - 260px);
    left:260px;
}
.container {
  background: #fff;
  width: 540px;
  height: 420px;
  margin: 0 auto;
  position: relative;
  margin-top: 10%;
  box-shadow: 2px 5px 20px rgba(119, 119, 119, 0.5);
}

.logo {
  float: right;
  margin-right: 12px;
  margin-top: 12px;
  font-family: "Nunito Sans", sans-serif;
  color: #3dbb3d;
  font-weight: 900;
  font-size: 1.5rem;
  letter-spacing: 1px;
}

.CTA {
  width: 80px;
  height: 40px;
  right: -20px;
  bottom: 0;
  margin-bottom: 90px;
  position: absolute;
  z-index: 1;
  background: #7ed386;
  font-size: 1em;
  transform: rotate(-90deg);
  transition: all 0.5s ease-in-out;
  cursor: pointer;
}

.CTA h1 {
  color: #fff;
  margin-top: 10px;
  margin-left: 9px;
}

.CTA:hover {
  background: #3fb6a8;
  transform: scale(1.1);
}

.leftbox {
  float: left;
  top: -5%;
  left: 5%;
  position: absolute;
  width: 15%;
  height: 110%;
  background: #7ed386;
  box-shadow: 3px 3px 10px rgba(119, 119, 119, 0.5);
}

nav a {
  list-style: none;
  padding: 35px;
  color: #fff;
  font-size: 1.1em;
  display: block;
  transition: all 0.3s ease-in-out;
}

nav a:hover {
  color: #3fb6a8;
  transform: scale(1.2);
  cursor: pointer;
}

nav a:first-child {
  margin-top: 7px;
}

.active {
  color: #3fb6a8;
}

.rightbox {
  float: right;
  width: 75%;
  height: 100%;
}

.profile {
  position: absolute;
  width: 70%;
}

h1 {
  font-family: "Montserrat", sans-serif;
  color: #7ed386;
  font-size: 1em;
  margin-top: 40px;
  margin-bottom: 35px;
}

h2 {
  color: #777;
  font-family: "Roboto", sans-serif;
  width: 80%;
  text-transform: uppercase;
  font-size: 12px;
  letter-spacing: 2px;
  margin-left: 2px;
}

p {
  border-width: 1px;
  border-style: solid;
  border-image: linear-gradient(to right, #3fb6a8, rgba(126, 211, 134, 0.5)) 1
    0%;
  border-top: 0;
  width: 80%;
  font-family: "Montserrat", sans-serif;
  font-size: 16px;
  padding: 7px 0;
  color: #070707;
}

.button {
  float: right;
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  font-size: 16px;
  border: none;
  color: #3fb6a8;
  cursor:pointer;
}

.button:hover {

  font-weight: 900;
}
    </style>
 