<?php

include("../cnx_database.php");

if (isset($_POST['conducteur_id'])) {

    $conducteur_infos = $database->prepare(" SELECT * FROM user WHERE id_user=" . $_POST['conducteur_id'] . "");
    $conducteur_infos->execute();

    $response = '<table border="1" class="table table-bordered text-dark">';

    foreach ($conducteur_infos as $resultat) {

        $nom = $resultat['nom_user'];
        $prenom = $resultat['prenom_user'];
        $num_tlf = $resultat['num_tel'];
        $email = $resultat['email_user'];

        $response .= "<tr>";
        $response .= "<th>NOM</th>";
        $response .= "<td>" . $nom . "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
        $response .= "<th>PRENOM</th>";
        $response .= "<td>" . $prenom . "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
        $response .= "<th>N° TELEPHONE</th>";
        $response .= "<td>" . $num_tlf . "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
        $response .= "<th>EMAIL</th>";
        $response .= "<td>" . $email . "</td>";
        $response .= "</tr>";
    }

    $response .= "</table>";

    echo $response;
    exit;
}
