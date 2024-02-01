<?php

include("../cnx_database.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $supprimer_reclamation = $database->prepare("DELETE FROM reclamation WHERE id_reclamation=$id ");

    $supprimer_reclamation->execute();

    if ($supprimer_reclamation->execute()) {
        echo $id;
    }
}
