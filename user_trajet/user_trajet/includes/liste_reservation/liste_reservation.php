<?php
//$id_user=$_SESSION['id_user'];
$user=$_SESSION['users'];
$id_user=$user->id_user;
$affiche_trajets = $database->prepare(" SELECT t.*,id_reservation
                                        FROM reservation r
                                        JOIN trajet t ON r.id_trajet = t.id_trajet
                                        WHERE r.id_user =$id_user;");
$affiche_trajets->execute();

foreach ($affiche_trajets as $resultat) {
    $id = $resultat['id_reservation'];
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
        <td class='text-center ;'><?php echo $latitude_depart ?></td>
        <td class='text-center ;'><?php echo $longeture_depart  ?></td>
        <td class='text-center ;'><?php echo $date_depart  ?></td>
        <td class='text-center ;'><?php echo $heure_depart  ?></td>
        <td class='text-center ;'><?php echo $prix  ?></td>
        <td class='text-center ;' style="cursor: pointer;">
                
            <a title='Cliquer pour Annuler'><i class='fa-solid fa-trash annuler' value="<?php echo $id ?>" style='color:red'></i></a>
        
        </td>

    </tr>

<?php
}
include("ajax_file/liste_reservation/conducteur_infos.php");
include("ajax_file/liste_reservation/annuler_reservation.php");

?>