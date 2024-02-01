<?php

include("../cnx_database.php");

$affiche_message_reclamation = $database->prepare(" SELECT message FROM reclamation WHERE id_reclamation=" . $_POST['reclamation_id'] . "");
$affiche_message_reclamation->execute();

$response = "<table border='0' width='100%'>";

foreach ($affiche_message_reclamation as $resultat) {

    $message = $resultat['message'];

    $response .= '
            <textarea class="form-control" readonly rows="4">' .  $message . '
            </textarea>';
}

$response .= "</table>";

echo $response;
exit;
