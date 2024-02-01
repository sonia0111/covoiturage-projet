<?php

include("../cnx_database.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $supprimer_trajet = $database->prepare("DELETE FROM trajet WHERE id_trajet=$id ");

    //$supprimer_trajet->execute();

    if ($supprimer_trajet->execute()) {
        echo $id;
    }
}
