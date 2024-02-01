<?php

include("../cnx_database.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $supprimer_voiture = $database->prepare("DELETE FROM voiture WHERE id_voiture=$id ");

    $supprimer_voiture->execute();

    if ($supprimer_voiture->execute()) {
        echo $id;
    }
}
