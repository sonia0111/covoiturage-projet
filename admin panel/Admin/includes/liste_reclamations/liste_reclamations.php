<?php

$affiche_reclamationss = $database->prepare(" SELECT * FROM reclamation ");
$affiche_reclamationss->execute();

foreach ($affiche_reclamationss as $resultat) {
    $id_reclamation = $resultat['id_reclamation'];
    $id_user = $resultat['id_user'];
    $message = $resultat['message'];
    $date_reclamation = $resultat['date_reclamation'];


?>

    <tr>

        <td class='text-center ;' style="cursor: pointer;">
            <a title="cliquer pour afficher le reclamateur"><i class="fa-solid fa-circle-info affiche_reclamateur" value="<?php echo $id_user ?>" style='color:blue'></i></a>
        </td>

        <td class='text-center ;'>
            <div class='col-lg-11 ml-auto'>
                <a value="<?php echo $id_reclamation ?>" class='message_reclamation btn btn-info btn-xs' data-toggle="modal" data-target="#Modaldetails" title='Cliquer pour Afficher'>détail</a>
            </div>
        </td>

        <td class='text-center ;'><?php echo $date_reclamation ?></td>

        <td class='text-center ;' style="cursor: pointer;">

            <a title='Cliquer pour Supprimer'><i class='fa-solid fa-trash supprimer' value="<?php echo $id_reclamation ?>" style='color:red'></i></a>
        </td>

    </tr>

<?php
}
include("ajax_file/liste_reclamations/affiche_reclamateur.php");
include("ajax_file/liste_reclamations/message_reclamation.php");
include("ajax_file/liste_reclamations/supprimer_reclamation.php");

?>