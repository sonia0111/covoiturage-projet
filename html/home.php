<?php
include('db.php');

if (isset($_GET['derniers'])) {
	$query = "SELECT * FROM trajet WHERE date_depart > NOW() ORDER BY date_depart ASC ";
} elseif (!empty($_POST['latitude'])) {

	$lat = $_POST['latitude'];
	$lon = $_POST['longitude'];
	$distanceLimit = 1.5; // Limite de distance en kilomètres

    // Calcul des latitudes et longitudes minimales et maximales
    $latMin = $lat - ($distanceLimit / 111.32);
    $latMax = $lat + ($distanceLimit / 111.32);

    // Approximation : 1 degré de longitude équivaut à environ 111.32 km (à l'équateur)
    $lonMin = $lon - ($distanceLimit / (111.32 * cos(deg2rad($lat))));
    $lonMax = $lon + ($distanceLimit / (111.32 * cos(deg2rad($lat))));

    // Requête SQL modifiée pour sélectionner les trajets à proximité
    $query = "SELECT * FROM trajet 
              WHERE latitude_depart BETWEEN $latMin AND $latMax 
                AND longeture_depart BETWEEN $lonMin AND $lonMax 
                AND date_depart > NOW() 
              ORDER BY date_depart ASC";
	//$query = "SELECT * FROM trajet WHERE latitude_depart = $lat AND longeture_depart = $lon ORDER BY date_depart ASC ";
} else {


	$query = "SELECT * FROM trajet WHERE date_depart > NOW()";
}
$result = $bd->query($query);
if (!$result) {
    die('Erreur SQL : ' . $bd->errorInfo()[2]);
}


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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




	<!--********************-->
	<!--	STYLE HOME		-->
	<!--********************-->



	<?php
	if (!empty($_SESSION["users"])) {
		include 'Navbar2.php';
		include 'sidebar.php';
	} else {
		include 'Navbar.php';
	}	//ajout de la navbar
	?>
	<?php

	?>



	<div class="home">
		<div class="hero-section">
			<div class="hero">
				<h1>
					Choisissez Des Trajets à Des Prix Bas
				</h1>
			</div>

			<div class="title">
				<form class="form" method="post" id="locform" action="home.php">

					<div class="form-item">
						<img class="icon" src="../images/icon/free-location-pointer-icon-2961-thumb 1.png">
						<input placeholder="Leaving from my position " type="text" name="lieu" required>
					</div>
					<hr>
					<div class="form-item">
						<img class="icon" src="../images/icon/free-location-pointer-icon-2961-thumb 1.png">
						<input placeholder="Going to.." type="text" name="lieu" required>
					</div>
					<hr>
					<div class="form-item">
						<img class="icon" src="../images/icon/calendar.png">
						<input id="inputDate" type="date" min="2023-12-25" max="2024-01-03" name="date" required>
					</div>
					<hr>
					<div class="form-item">
						<img class="icon" src="../images/icon/1077114 1.png">
						<input value="1" min="0" step="1" max="7" type="number" name="nbPlaces">
					</div>
					<input type="hidden" name="latitude" id="latitude">

					<input type="hidden" name="longitude" id="longitude">
					<input type="button" value="Rechercher" id='getLocation' name="getLocation">

				</form>

				<div class="scrolldown">
					<button><a href="?derniers">Voir Les Derniers Covoiturages</a></button>
				</div>
			</div>
		</div>

		<div class="list" id="list">
			<div class="header">

				<h1>Listes de Covoiturages</h1>
			</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reserve'])) {
    $id_trajet = $_POST['id_trajet']; 
    $id_user =  $_SESSION['users']->id_user ;

    // Vérifiez d'abord si l'utilisateur a déjà réservé ce trajet
    $query_check_reservation = "SELECT * FROM reservation WHERE id_user = $id_user AND id_trajet = $id_trajet";
    $result_check_reservation = $bd->query($query_check_reservation);

    if ($result_check_reservation->rowCount() == 0) {
        $query_check_places = "SELECT nbplacedispo FROM trajet WHERE id_trajet = $id_trajet";
        $result_check_places = $bd->query($query_check_places);

        if ($result_check_places) {
            $row = $result_check_places->fetch(PDO::FETCH_ASSOC);
            $nb_places_dispo = $row['nbplacedispo'];

            if ($nb_places_dispo > 0 && $id_user) {
                // Décrémentez le nombre de places disponibles dans la table trajet
                $query_update_places = "UPDATE trajet SET nbplacedispo = nbplacedispo - 1 WHERE id_trajet = $id_trajet";
                $bd->query($query_update_places);

                // Insérez une nouvelle réservation dans la table reservation
                $query_insert_reservation = "INSERT INTO reservation (id_user, id_trajet) VALUES ($id_user, $id_trajet)";
                $bd->query($query_insert_reservation);

                // Ajoutez d'autres actions ou redirections si nécessaire
                echo ' <script>alert("Réservation réussie !");  </script>';
            } else {
                echo "Désolé, vous ne pouvez pas réserver pour ce trajet.";
            }
        } else {
            echo "Erreur lors de la vérification des places disponibles.";
        }
    } else {
        echo '.<script>alert("Vous avez déjà réservé ce trajet");</script>';
    }
}



?>

			<div class="card-wrapper swiper-wrapper">
				<?php

				foreach ($result as $row) {

					$heureDep = date('H:i', strtotime($row->heure_depart));
				?>
					<div class="item swiper-slide">
						<div class="data-group">
							<span class="horaire"><?= $heureDep ?></span>
							<span class="place"><?= $row->lieu_dep ?> </span>
							<span class="date"><?= $row->date_depart ?></span>
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
								$id_cond = $row->conducteur;

								$query = "SELECT * FROM user WHERE id_user='$id_cond'";
								$query_run = $bd->query($query);
								$row2 = $query_run->fetch(PDO::FETCH_ASSOC);

								?>
								<span class="name"><?= $row2['nom_user'] . ' ' . $row2['prenom_user'] ?></span>
								<div class="available">
									<?= $row->nbplacedispo ?> places restantes
								</div>
								<div class="available" id="placesRestantes">
									<span id="DisplayTel"><?= $row2['num_tel'] ?></span>
								</div>
							</div>
							<div class="book-container"><?php if ($row->nbplacedispo > 0 && isset($_SESSION['users'])) : ?>
        <form method="post">
            <!-- Ajoutez un champ caché pour l'ID du trajet -->
            <input type="hidden" name="id_trajet" value="<?= $row->id_trajet ?>">
            <!-- Ajoutez un bouton submit pour la réservation -->
            <input type="submit" name="reserve" value="Réserver" class="book">
        </form>
    <?php else : ?>
        <button class="book" disabled>Réservation </button>
    <?php endif; ?></div>
						</div>
					</div>
				<?php
				}
				?>





			</div>

		</div>
		<br><br><br><br><br><br><br><br><br><br><br>
		<script type="text/javascript">
			//JS Alert
			let tab = document.getElementsByClassName('croix');
			for (let i = 0; i < tab.length; i++) {
				tab[i].addEventListener('click', () => {
					tab[i].parentNode.style.display = 'none';
				})
			}
		</script>
		<script>
			let arrow = document.querySelectorAll(".arrow");
			for (var i = 0; i < arrow.length; i++) {
				arrow[i].addEventListener("click", (e) => {
					let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
					arrowParent.classList.toggle("showMenu");
				});
			}
			let home = document.querySelector(".home")
			let nav = document.querySelector("nav")
			let list = document.querySelector(".list")
			let sidebar = document.querySelector(".sidebar");
			let sidebarBtn = document.querySelector(".bx-menu");
			let reclamation = document.querySelector(".reclamation");
			sidebarBtn.addEventListener("click", () => {
				sidebar.classList.toggle("close");
				nav.classList.toggle("nav-opened");
				home.classList.toggle("home-opened");
				Trajets.classList.toggle("list-opened");
				reclamation.classList.toogle("reclamation-opened");
			});
		</script>
		<script type="text/javascript">
			document.getElementById('getLocation').addEventListener('click', function() {

				if (navigator.geolocation) {

					navigator.geolocation.getCurrentPosition(function(position) {
						var lat = position.coords.latitude;
						var lon = position.coords.longitude;

						// Affiche les coordonnées dans une alerte (à des fins de test)
						alert('Latitude: ' + lat + ', Longitude: ' + lon);

						// Remplissez les champs de latitude et de longitude dans votre formulaire
						document.getElementById('latitude').value = lat;
						document.getElementById('longitude').value = lon;

						// Soumettez automatiquement le formulaire après avoir obtenu les coordonnées
						document.getElementById('locform').submit();
					}, function(error) {
						alert('Erreur de géolocalisation : ' + error.message);
					});
				} else {
					alert('La géolocalisation n\'est pas prise en charge par votre navigateur.');
				}
			});
		</script>
</body>

</html>