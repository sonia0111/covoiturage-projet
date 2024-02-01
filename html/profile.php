<?php
include('db.php');
if (!empty($_SESSION["users"])) {
    include 'Navbar2.php';
    include 'sidebar.php';
} else {
    header('Location:./home.php');
}
$user = $_SESSION['users'];
$id_user=$user->id_user;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LBR Covoiturage - Modifier le Profil</title>
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <!-- Ajoutez ici vos liens vers les fichiers CSS nécessaires -->
    <!--Favicon-->
    <link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png" />
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
    <!-- Ajoutez d'autres liens CSS si nécessaire -->
    <style>
        /* Styles spécifiques à la page de modification de profil */
        * {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .profile{
            display:flex;
            justify-content:center;
            position: absolute;
            left:78px;
            width:calc(100% - 78px);
            transition: all 0.5s ease
        }
        .profile-opened{
            left:260px;
            width:calc(100% - 260px);
        }

        .profile-modification {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
            background-color: #f4f4f4;
           
        }

        .profile-modification-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        .profile-modification-form h1 {
            text-align: center;
            color: #333;
        }

        .profile-modification-form form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .profile-modification-form label {
            font-weight: 500;
            color: #555;
        }

        .profile-modification-form input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .profile-modification-form button {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
  
            height:25%;
        }

        .profile-modification-form button:hover {
            background-color: #2980b9;
        }
        .profile-pic {
        display:flex;
            justify-content:space-around;
            align-items:center;
}

.img-circle {
    border-radius: 50%;
    width: 150px; /* Ajustez la taille de l'image */
    height: 150px; /* Ajustez la taille de l'image */
    object-fit: cover;
    margin-bottom: 10px;
}

button {
    margin-top: 10px;
}
    </style>
    <!-- Ajoutez ici vos autres scripts ou liens nécessaires -->

</head>

<body>

    <?php
   $query = "SELECT * FROM user WHERE id_user='$id_user'";
   $query_run = $bd->query($query);
   $row = $query_run->fetch(PDO::FETCH_ASSOC);
    ?>
   <div class='profile'>
 
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

    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      /*  $(document).ready(function () {
            $("#profileForm").submit(function (e) {
                e.preventDefault();

                // Ajoutez ici le code pour la modification du profil
                // Utilisez AJAX pour envoyer les données au serveur
                
                Swal.fire({
                    title: 'Profil modifié!',
                    icon: 'success',
                    text: 'Les informations du profil ont été mises à jour!'
                }).then(() => {
                    // Redirigez l'utilisateur vers la page de profil ou une autre page appropriée
                    window.location.href = 'profile.php';
                });
            });
        });*/
    </script>
    <script type="text/javascript"> //JS Alert
let tab = document.getElementsByClassName('croix');
for(let i = 0; i < tab.length;i++){
	tab[i].addEventListener('click', () =>{
		tab[i].parentNode.style.display = 'none';
	})
}
</script>
    <script>
	let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}
let profile =document.querySelector(".profile")
let nav = document.querySelector("nav")
let list =document.querySelector(".list")
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
  nav.classList.toggle("nav-opened")
  profile.classList.toggle("profile-opened")
});
</script>

</body>

</html>
