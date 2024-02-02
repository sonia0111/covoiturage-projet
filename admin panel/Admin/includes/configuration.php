<?php

if (isset($_POST['modifier'])) {

    $nv_nb_max_places = $_POST['val-nb_max_places'];
    $duree_reservation = $_POST['val-duree_reservation'];
    $proximite = $_POST['val-proximite'];

    $modifier_nb_max_places = $database->prepare("UPDATE configuration SET valeur_config=:nv_nb_places 
    where nom_config='nb max de places' ");

    $modifier_nb_max_places->bindparam("nv_nb_places", $nv_nb_max_places);


    if ($modifier_nb_max_places->execute()) {

        $modifier_duree_reservation = $database->prepare("UPDATE configuration SET valeur_config=:duree_reservation 
        where nom_config='duree reservation' ");

        $modifier_duree_reservation->bindparam("duree_reservation", $duree_reservation);

        if ($modifier_duree_reservation->execute()) {

            $modifier_proximité = $database->prepare("UPDATE configuration SET valeur_config=:proximite 
        where nom_config='proximite' ");

            $modifier_proximité->bindparam("proximite", $proximite);

            if ($modifier_proximité->execute()) {
?>

                <script src="js/sweetalert.js"></script>

                <script>
                    swal({
                        text: "configuration a été modifié avec succés !",
                        icon: "success",
                    }).then(function() {
                        window.location = "configuration.php";
                    });
                </script>


<?php
            }
        }
    }
}
