<?php
//echo 1;
session_start();
include("../cnx_database.php");
$user = $_SESSION['users'];
$conducteur= $user->id_user;;
if (isset($_POST['submit'])) {
    $lieu_dep = $_POST['lieu_dep'];
    $lieu_dest = $_POST['lieu_dest'];
    $nb_place_dispo = $_POST['nbplacedispo'];
    $latitude_dep = $_POST['latitude_dep'];
    $longitude_dep = $_POST['longeture_dep'];
    
    $inserer_trajet = $database->prepare("INSERT INTO trajet (lieu_dep, lieu_dest, nbplacedispo, conducteur, latitude_depart, longeture_depart) 
    VALUES (:lieu_dep, :lieu_dest, :nbplacedispo, :conducteur, :latitude_depart, :longitude_depart)");
    
    // Liaison des valeurs aux paramètres
    $inserer_trajet->bindParam(':lieu_dep', $lieu_dep);
    $inserer_trajet->bindParam(':lieu_dest', $lieu_dest);
    $inserer_trajet->bindParam(':nbplacedispo', $nb_place_dispo);
    $inserer_trajet->bindParam(':conducteur', $conducteur); 
    $inserer_trajet->bindParam(':latitude_depart', $latitude_dep);
    $inserer_trajet->bindParam(':longitude_depart', $longitude_dep);
    
    // Exécution de la requête
    $inserer_trajet->execute();

    if ($inserer_trajet->execute()) {
        // Les données ont été insérées avec succès
        $_SESSION['status'] = "Bien enregistré !";
        header('location:ajouter_trajet.php');
    } else {
        // Il y a eu une erreur lors de l'insertion des données
        $_SESSION['status'] = "Erreur d'enregistrement! " . mysqli_error($connexion);
        header('location:ajouter_trajet.php');
    }

    exit;
}
