<?php
include('db.php');

if (isset($_GET['derniers'])) {
    echo "hello 1";
    $query = "SELECT * FROM trajet WHERE date_dep > NOW() ORDER BY date_dep ASC ";
} elseif(!empty($_POST['latitude'])) {
   
    $lat = $_POST['latitude'];
    $lon = $_POST['longitude'];
    echo $lat.'valeur'.$lon;
    $query = "SELECT * FROM trajet WHERE latitude_depart = $lat AND longeture_depart = $lon ORDER BY date_dep ASC ";
} else {
    
    echo "hello 3";
    $query = "SELECT * FROM trajet ";
}
$result = $bd->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LBR Covoiturage</title>
    <!--CSS files-->
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/alert.css">
    <!--Favicon-->
    <link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png" />
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.6.4.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
   
</head>

<body>

    <?php
    if (!empty($_SESSION["users"])) {
        include 'Navbar2.php';
        include 'sidebar.php';
    } else {
        include 'Navbar.php';
    }
    ?>

    <div class="home">
        <div class="hero-section">
            <div class="hero">
                <h1>Pick Rides At Low Prices</h1>
            </div>

            <div class="title">
                <div class="form-item">
                        <img class="icon" src="../images/icon/free-location-pointer-icon-2961-thumb 1.png">
                        <input placeholder="Leaving from.." type="text" name="lieu" required>
                    </div>
                    <hr>
                    <div class="form-item">
                        <img class="icon" src="../images/icon/free-location-pointer-icon-2961-thumb 1.png">
                        <input placeholder="Going to.." type="text" name="lieu" required>
                    </div>
                    <hr>
                    <div class="form-item">
                        <input id="inputDate" type="date" min="2023-12-25" max="2024-01-03" name="date" required>
                    </div>
                    <hr>
                    <div class="form-item">
                        <img class="icon" src="../images/icon/1077114 1.png">
                        <input value="1" min="0" step="1" max="7" type="number" name="nbPlaces">
                    </div>
                    <!-- Ajout des champs pour la latitude et la longitude -->
                    
    <!-- ... (vos champs de formulaire existants) -->
     <!--<form method="post" name="loc" onsubmit="searchTrajets(event)">
     ... (vos champs de formulaire existants) 
    <input type="text" name="latitude" id="latitude">
    <input type="text" name="longitude" id="longitude">
    <input type="text" id="hidden" name="allerRetour" value="aller">
    <input type="submit" value="Rechercher" id='getLocation'>
</form>-->
<form method="post" id="locform" action="home2.php" >

  <input type="text" name="latitude" id="latitude">
   
    <input type="text" name="longitude" id="longitude">
    <input type="button" value="Rechercher" id='getLocation' name="getLocation">
  
     </form>
                <div class="scrolldown">
                    <button><a href="?derniers">Voir Les Derniers Covoiturages</a></button>
                </div>
            </div>
        </div>

        <div class="list" id="list">
          
<div class="container3">
	<img src="../images/earth.png" data-aos="fade-down"  data-aos-easing="linear"
data-aos-duration="600"   data-aos-delay="500"> 

	<div class="text" data-aos="fade-down"  data-aos-easing="linear"
data-aos-duration="600"   data-aos-delay="500">
		<h3>PROTÉGER LA PLANÈTE</h3>
		<p>Faire du covoiturage, c’est aussi penser à la planète. En partageant le trajet à plusieurs, tu réduis tes émissions de CO2 et le risque d’embouteillages !</p>
	</div>
</div>

</div>

<!--********************************************-->
<!--	Liste des 5 derniers covoiturages		   -->
<!--********************************************-->
<div class="list" id="list">
	<div class="header">
		
		<h1>Listes de Covoiturages</h1>	
	</div>



		<div class="card-wrapper swiper-wrapper">
		<?php
               
                foreach ($result as $row) {
					
					$heureDep = date('H:i', strtotime($row->heur_dep));
                ?>
			<div class="item swiper-slide">
				<div class="data-group">
					<span class="horaire"><?= $heureDep ?></span>
					<span class="place"><?= $row->lieu_dep ?> </span>
					<span class="date"><?= $row->date_dep ?></span>
				</div>

				<div class="data-group">
					<span class="horaire"> ??:??</span>
					<span class="place"><?= $row->lieu_dest ?></span>
					<span class="price"><?= $row->prix ?>DA</span>
				</div>

				<div class="account-info">
					<img class="profile-picture" src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
					<div class="profile-info">
						<?php
						$id_cond=$row->conducteur;
		 
						$query = "SELECT * FROM user WHERE id_user='$id_cond'";
						$query_run = $bd->query($query);
						$row2 = $query_run->fetch(PDO::FETCH_ASSOC);
						
						?>
						<span class="name"><?=$row2['nom_user'].' '.$row2['prenom_user']?></span>
						<div class="available">
						<?= $row->nbplacedispo ?> places restantes
						</div>
						<div class="available" id="placesRestantes">
							<span id="DisplayTel"><?=$row2['num_tel']?></span>
						</div>
					</div>
					<div class="book-container"><a class="book" href="#" class="button">Réserver</a></div>
				</div>
			</div>
			<?php
                }
                ?>
			
			
			
			
	
</div>

</div>  <!-- ... Le reste de votre code pour afficher la liste de covoiturages -->
        </div>

        <br><br><br><br><br><br><br><br><br><br><br>
        <script type="text/javascript">
    document.getElementById('getLocation').addEventListener('click', function () {
        alert('hello' );
        if (navigator.geolocation) {
            
            navigator.geolocation.getCurrentPosition(function (position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                
                // Affiche les coordonnées dans une alerte (à des fins de test)
                alert('Latitude: ' + lat + ', Longitude: ' + lon);

                // Remplissez les champs de latitude et de longitude dans votre formulaire
               document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lon;

                // Soumettez automatiquement le formulaire après avoir obtenu les coordonnées
                document.getElementById('locform').submit();
            }, function (error) {
                alert('Erreur de géolocalisation : ' + error.message);
            });
        } else {
            alert('La géolocalisation n\'est pas prise en charge par votre navigateur.');
        }
    });
</script>

    </div>
</body>

</html>
