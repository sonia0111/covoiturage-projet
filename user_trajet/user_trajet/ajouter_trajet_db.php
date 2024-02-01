<?php
include('includes\cnx_database.php');
session_start();
//echo $_POST['lieu_dep'],'', $_POST['lieu_dest'],'', $_POST['nb_place_dispo'],'',$_POST['latitude_dep'],'', $_POST['longeture_dep'];
$conducteur=7;
if (isset($_POST['submit'])) {
    $lieu_dep = $_POST['lieu_dep'];
    $lieu_dest = $_POST['lieu_dest'];
    $nb_place_dispo = $_POST['nb_place_dispo'];
    $latitude_dep = $_POST['latitude_dep'];
    $longitude_dep = $_POST['longeture_dep'];
    $date_dep = $_POST['date_dep'];
    $heure_dep = $_POST['heure_dep'];
    $prix = $_POST['prix'];
    
    $inserer_trajet = $database->prepare("INSERT INTO trajet (lieu_dep, lieu_dest, nbplacedispo, conducteur, latitude_depart, longeture_depart, date_depart, heure_depart, prix) 
    VALUES (:lieu_dep, :lieu_dest, :nbplacedispo, :conducteur, :latitude_depart, :longitude_depart, :date_dep, :heure_dep,:prix)");
    
    // Liaison des valeurs aux paramètres
    $inserer_trajet->bindParam(':lieu_dep', $lieu_dep);
    $inserer_trajet->bindParam(':lieu_dest', $lieu_dest);
    $inserer_trajet->bindParam(':nbplacedispo', $nb_place_dispo);
    $inserer_trajet->bindParam(':conducteur', $conducteur); 
    $inserer_trajet->bindParam(':latitude_depart', $latitude_dep);
    $inserer_trajet->bindParam(':longitude_depart', $longitude_dep);
    $inserer_trajet->bindParam(':date_dep', $date_dep);
    $inserer_trajet->bindParam(':heure_dep', $heure_dep);
    $inserer_trajet->bindParam(':prix', $prix);
    
    // Exécution de la requête
    //$inserer_trajet->execute();
    

    if ($inserer_trajet->execute()) {
        // Les données ont été insérées avec succès
        echo "Bien enregistré !";
       header('location:ajouter_trajet.php');
    } else {
        // Il y a eu une erreur lors de l'insertion des données
        echo "Erreur d'enregistrement! " . implode(" | ", $inserer_trajet->errorInfo());
        header('location:ajouter_trajet.php');
    }


}
?>