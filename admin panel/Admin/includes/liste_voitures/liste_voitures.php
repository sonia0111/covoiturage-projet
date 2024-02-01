<?php

$affiche_reclamationss = $database->prepare(" SELECT * FROM voiture ");
$affiche_reclamationss->execute();

foreach ($affiche_reclamationss as $resultat) {
    $id_voiture = $resultat['id_voiture'];
    $type = $resultat['type_v'];
    $id_conducteur = $resultat['id_user'];
    $photo = $resultat['photo_v'];
    $nb_places = $resultat['nbPlace'];


?>

    <tr>

        <td class='text-center ;' style="cursor: pointer;">
            <a title="cliquer pour afficher le conducteur"><i class="fa-solid fa-circle-info affiche_conducteur" value="<?php echo $id_conducteur ?>" style='color:blue'></i></a>
        </td>

        <td class='text-center ;'><?php echo $type ?></td>

        <td class='text-center ;'>
            <div class='col-lg-11 ml-auto'>
                <a value="<?php echo $id_voiture ?>" class='afficher_photo btn btn-info btn-xs' data-toggle="modal" data-target="#Modaldetails" title='Cliquer pour Afficher'>Afficher</a>
            </div>
        </td>

        <td class='text-center ;'><?php echo $nb_places ?></td>

        <td class='text-center ;' style="cursor: pointer;">

            <a title='Cliquer pour Supprimer'><i class='fa-solid fa-trash supprimer' value="<?php echo $id_voiture ?>" style='color:red'></i></a>
        </td>

    </tr>

<?php
}
include("ajax_file/liste_voitures/conducteur_infos.php");
include("ajax_file/liste_voitures/photo_voiture.php");
include("ajax_file/liste_voitures/supprimer_voitures.php");

?>