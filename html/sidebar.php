<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-LyHuIkCImtYGEny48afEpsU7W+PVZ13JFE6Z/S9q26z7Zl/NZByPXBnuYQ1sJNA3+5NV7l/gS/O8wlpY0ktmvA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
</head>

<body>
	<div class="sidebar close">
		<div class="logo-details">
			<i class='bx bxl-bitcoin'></i>
			<span class="logo_name">Menu</span>
		</div>
		<ul class="nav-links">
			<li>
				<a href="./home.php">
					<i class='bx bx-home'></i>
					<span class="link_name">Home</span>
				</a>
				<ul class="sub-menu blank">
					<li><a class="link_name" href="home.php">Home</a></li>
				</ul>
			</li>
			<li>
				<div class="icon-link">
					<a href="../user_trajet\user_trajet/liste_trajets.php">
						<i class="bx bx-car"></i>
						<span class="link_name"> Mes trajectoire</span>
					</a>
					<ul class="sub-menu blank">
						<li><a class="link_name" href="../user_trajet\user_trajet/liste_trajets.php">Mes trajectoire</a></li>
					</ul>
				</div>

			</li>
			
			<li>
				<div class="icon-link">
					<a href="../user_trajet\user_trajet/liste_reservation.php">
						<i class="bx bx-calendar-check"></i>
						<span class="link_name">Mes Réservation</span>
					</a>
					<ul class="sub-menu blank">
						<li><a class="link_name" href="../user_trajet\user_trajet/liste_reservation.php">Mes Réservation</a></li>
					</ul>
				</div>

			</li>
			<li>
				<div class="icon-link">
					<a href="./reclamation.php">

						<i class='bx bx-file-find'></i>
						<span class="link_name"> Réclamation</span>
					</a>
					<ul class="sub-menu blank">
						<li><a class="link_name" href="reclamation.php">Réclamation</a></li>
					</ul>
				</div>

			</li>





			<div class="profile-details">
				<div class="profile-content">
					<?php

					$user = $_SESSION['users'];
					$id_user = $user->id_user;
					$query = "SELECT * FROM user WHERE id_user='$id_user'";
					$query_run = $bd->query($query);
					$row = $query_run->fetch(PDO::FETCH_ASSOC);
					$profilePicture = $row['pdp'] ? '../upload/' . $row['pdp'] : '../upload/df.jpg';

					?>
					<a href="profile.php"><img src="<?= $profilePicture ?>" alt="profileImg"></a>
				</div>
				<div class="name-job">
					<div class="profile_name"><?php echo $row["nom_user"] . " " . $row["prenom_user"]  ?></div>
				</div>
				<form class="logout" action="logout.php" method="post">
					<button type="submit" class="btn-primary" onclick="return confirm('Confirmez-vous la déconnexion ?');">
						<i class='bx bx-log-out'></i>
					</button>
				</form>
			</div>
			</li>
		</ul>
	</div>

	
</body>

</html>