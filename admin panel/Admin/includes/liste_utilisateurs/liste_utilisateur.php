<?php

$affiche_utilisateurs = $database->prepare(" SELECT * FROM user ");
$affiche_utilisateurs->execute();

foreach ($affiche_utilisateurs as $resultat) {
    $id = $resultat['id_user'];
    $nom = $resultat['nom_user'];
    $prenom = $resultat['prenom_user'];
    $num_tlf = $resultat['num_tel'];
    $email = $resultat['email_user'];
    $type = $resultat['type_user'];
?>

    <tr>

        <td class='text-center ;'><?php echo $id ?></td>
        <td class='text-center ;'><?php echo $nom ?></td>
        <td class='text-center ;'><?php echo $prenom ?></td>
        <td class='text-center ;'><?php echo $num_tlf ?></td>
        <td class='text-center ;'><?php echo $email  ?></td>
        <td class='text-center ;'><?php echo $type ?></td>
        <td class='text-center ;' style="cursor: pointer;">

            <a class='mr-3' title='Cliquer pour Modifier'><i class='fa-solid fa-pen-to-square modif_user' value="<?php echo $id ?>" style='color:blue'></i></a>

            <a title='Cliquer pour bloquer'><i class='fa-solid fa-ban bloquer' value="<?php echo $id ?>" style='color:red'></i></a>
        </td>

    </tr>

<?php
}
include("ajax_file/liste_utilisateurs/modifier_user.php");
include("ajax_file/liste_utilisateurs/bloquer_user.php");

?>