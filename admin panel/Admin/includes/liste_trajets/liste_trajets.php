<?php

$affiche_trajets = $database->prepare(" SELECT * FROM trajet ");
$affiche_trajets->execute();

foreach ($affiche_trajets as $resultat) {
    $id = $resultat['id_trajet'];
    $lieu_depart = $resultat['lieu_dep'];
    $lieu_destination = $resultat['lieu_dest'];
    $nb_places_dispo = $resultat['nbplacedispo'];
    $conducteur = $resultat['conducteur'];
    $latitude_depart = $resultat['latitude_depart'];
    $longeture_depart = $resultat['longeture_depart'];
    $date_depart = $resultat['date_depart'];
    $heure_depart = $resultat['heure_depart'];
    $prix = $resultat['prix'];

?>

    <tr>

        <td class='text-center ;' style="cursor: pointer;">
            <a title="cliquer pour afficher le conducteur"><i class="fa-solid fa-circle-info affiche_conducteur" value="<?php echo $conducteur ?>" style='color:blue'></i></a>
        </td>
        <td class='text-center ;'><?php echo $lieu_depart ?></td>
        <td class='text-center ;'><?php echo $lieu_destination ?></td>
        <td class='text-center ;'><?php echo $nb_places_dispo ?></td>
        <td class='text-center ;'><?php echo $latitude_depart ?></td>
        <td class='text-center ;'><?php echo $longeture_depart  ?></td>
        <td class='text-center ;'><?php echo $date_depart ?></td>
        <td class='text-center ;'><?php echo $heure_depart ?></td>
        <td class='text-center ;'><?php echo $prix ?></td>
        <td class='text-center ;' style="cursor: pointer;">
            <a title='Cliquer pour Supprimer'><i class='fa-solid fa-trash supprimer' value="<?php echo $id ?>" style='color:red'></i></a>
        </td>

    </tr>

<?php
}
include("ajax_file/liste_trajets/conducteur_infos.php");
include("ajax_file/liste_trajets/supprimer_trajet.php");

?>