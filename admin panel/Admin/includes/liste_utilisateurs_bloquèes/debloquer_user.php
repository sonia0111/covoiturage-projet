<?php

include("../cnx_database.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $debloquer_user = $database->prepare("DELETE FROM user_bloquer WHERE id=$id ");

    $debloquer_user->execute();

    if ($debloquer_user->execute()) {
        echo $id;
    }
}
