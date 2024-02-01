<?php

include("../cnx_database.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];


    $affiche_utilisateur = $database->prepare("SELECT num_tel,email_user FROM user WHERE id_user=$id ");
    $affiche_utilisateur->execute();

    foreach ($affiche_utilisateur as $resultat) {
        $num_tlf = $resultat['num_tel'];
        $email = $resultat['email_user'];

        $bloque_utilisateur = $database->prepare("INSERT INTO user_bloquer (`num_tel` ,`email`)
    VALUES(:numtlf ,:email )");

        $bloque_utilisateur->bindparam("numtlf", $num_tlf);
        $bloque_utilisateur->bindparam("email", $email);

        if ($bloque_utilisateur->execute()) {

            // $id_user = $_POST['id'];

            $supprimer_user = $database->prepare("DELETE FROM user WHERE id_user=$id");
            $supprimer_user->execute();

            if ($supprimer_user->execute()) {
                echo $id;
            }
        }
    }
}
