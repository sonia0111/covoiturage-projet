<?php
//pour avoir recuperer le id_trajet et faut ouvrir une session lors de la reservation,

include("../cnx_database.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $recherche_id_trajet = $database->prepare("SELECT id_trajet from reservation where id_reservation = $id;   ");
    $recherche_id_trajet->execute();
    $id_trajet = $recherche_id_trajet->fetchColumn();
    $annuler_reservation = $database->prepare("DELETE FROM reservation
                                                WHERE id_reservation = $id; ");

    //$supprimer_trajet->execute();
    $update_nbplacedispo = $database->prepare("UPDATE trajet
                                                SET nbplacedispo = nbplacedispo + 1
                                                WHERE id_trajet =$id_trajet ;");
    if ($annuler_reservation->execute()) {
        $update_nbplacedispo->execute();
        echo $id;
    }
}
