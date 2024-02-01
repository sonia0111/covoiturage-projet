<?php

include("../cnx_database.php");

$affiche_photo_voiture = $database->prepare(" SELECT photo_v FROM voiture WHERE id_voiture=" . $_POST['voiture_id'] . "");
$affiche_photo_voiture->execute();

$response = "";

foreach ($affiche_photo_voiture as $resultat) {

    $photo = $resultat['photo_v'];

    $response .= "<img height='100%' width='100%' src='../img_voitures/" . $photo . "'>";
}


echo $response;
exit;
