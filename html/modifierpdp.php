<?php
require_once('db.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$num_tel = $_POST['num_tel'];
$old_pp = $_POST['old_pp'];
$user = $_SESSION['users'];

try {
   
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        // Vérification que le fichier est bien une image
        $file_info = getimagesize($_FILES['image']['tmp_name']);

        if ($file_info === false) {
            // Affichage d'un message d'erreur si le fichier n'est pas une image valide
            echo "Le fichier téléchargé n'est pas une image valide.";
        } else {
            $file_name = uniqid('user', true) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $file_dest = '../upload/' . $file_name;

            // Suppression de l'ancienne photo de profil
            $old_pp_des = "../upload/$old_pp";
            if (file_exists($old_pp_des)) {
                unlink($old_pp_des);
            }

            move_uploaded_file($_FILES['image']['tmp_name'], $file_dest);

            // Mise à jour du chemin de la nouvelle photo de profil dans la base de données
            $id = $user->id_user;
            $stmt = $bd->prepare("UPDATE user SET pdp = :file_name WHERE id_user = :id");
            $stmt->bindParam(':file_name', $file_name);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
    }

    // Mise à jour des autres informations du profil
    $id = $user->id_user;
    $stmt = $bd->prepare("UPDATE user SET nom_user = :nom, prenom_user = :prenom, num_tel = :num_tel WHERE id_user = :id");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':num_tel', $num_tel);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

   

    header('location:profile.php');
} catch (Exception $e) {
    $bd->rollBack();
    die("Erreur lors de la mise à jour des données : " . $e->getMessage());
}
?>
