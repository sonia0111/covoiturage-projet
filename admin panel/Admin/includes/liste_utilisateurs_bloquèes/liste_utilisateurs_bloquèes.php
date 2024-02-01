<?php

$affiche_utilisateurs_bloquèes = $database->prepare(" SELECT * FROM user_bloquer ");
$affiche_utilisateurs_bloquèes->execute();

foreach ($affiche_utilisateurs_bloquèes as $resultat) {
    $id = $resultat['id'];
    $num_tlf = $resultat['num_tel'];
    $email = $resultat['email'];
?>

    <tr>

        <td class='text-center ;'><?php echo $id ?></td>
        <td class='text-center ;'><?php echo $num_tlf ?></td>
        <td class='text-center ;'><?php echo $email  ?></td>
        <td class='text-center ;' style="cursor: pointer;">
            <a title='Cliquer pour debloquer'><i class='fa-solid fa-lock-open debloquer' value="<?php echo $id ?>" style='color:green'></i></a>
        </td>

    </tr>

<?php
}
include("ajax_file/liste_utilisateurs_bloquèes/debloquer_user.php");

?>