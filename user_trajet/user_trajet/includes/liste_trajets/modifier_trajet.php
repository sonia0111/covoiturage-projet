<?php
include("../cnx_database.php");

// ##################################################################
// View Data


if (isset($_POST['trajet_id'])) {

    $id = $_POST["trajet_id"];

    $affiche_trajet = $database->prepare(" SELECT * FROM trajet WHERE id_trajet= $id ");

    $affiche_trajet->execute();
    $output = '';

    foreach ($affiche_trajet as $resultat) {

        $id = $resultat['id_trajet'];
        $lieu_dep = $resultat['lieu_dep'];
        $lieu_dest = $resultat['lieu_dest'];
        $nbplacedispo = $resultat['nbplacedispo'];
        $latitude_depart = $resultat['latitude_depart'];
        $longeture_depart = $resultat['longeture_depart'];
        $date_depart = $resultat['date_depart'];
        $heure_depart = $resultat['heure_depart'];
        $prix = $resultat['prix'];

        $output .= '
        <div class="col-lg-12">
            <div class="card ">
    
                <div class="card-body " style="padding-bottom:0px;">
                    <form method="POST">
                        <div class="col-xl-6 ">
                                <input type="hidden" class="form-control" id="val-ID_trajet" name="val-ID_trajet" value="' . $id . '">
    
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">ID
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" readonly value="' . $id . '">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Lieu dep
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-lieu_dep" name="val-lieu_dep" value="' . $lieu_dep . '" placeholder="Entrer le lieu de depart" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">lieu dest
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-lieu_dest" name="val-lieu_dest" value="' . $lieu_dest . '" placeholder="Enter le lieu de destination." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Nombre de place dispo
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control" id="val-nb_place_dispo" name="val-nb_place_dispo" value="' . $nbplacedispo . '" placeholder="Enter le nombre disponible." required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">latitude depart
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control" id="val-latitude_depart" name="val-latitude_depart" value="' . $latitude_depart . '" placeholder="Enter la latitude de depart." required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">longeture depart
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control" id="val-longeture_depart" name="val-longeture_depart" value="' . $longeture_depart . '" placeholder="Enter la longeture de depart" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Date De Départ
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" id="val-date_depart" name="val-date_depart" value="' . $date_depart . '" placeholder="Enter la date de depart." required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Date De Départ
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="heure" class="form-control" id="val-heure_depart" name="val-heure_depart" value="' . $heure_depart . '" placeholder="Enter l heure de depart " required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Prix
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control" id="val-prix" name="val-prix" value="' . $prix . '" placeholder="Enter le prix de trajet" required>
                                    </div>
                                </div>
    
                                <label class="col-lg-6 text-danger">*
                                    <span class="text-dark"> :</span>
                                    Champs obligatoires
                                </label>
    
                        </div>
                        <div class="modal-footer col-xl-12" style="padding-bottom:10px;">
    
                                <button type="submit" class="btn btn-primary" id="update_data_trajet" title="cliquer pour modifier">
                                    <i class="fa-solid fa-rotate"></i> Modifier</button>
    
                                
    
                        </div>
                        
    
                    </form>
                </div>
            </div>
        </div>
    ';
        
        
        }

        echo $output;
    }


    // ##################################################################
    // update Data

    if (isset($_POST['id_trajet'])) {

        $id = $_POST['id_trajet'];
        $lieu_dep = $_POST['lieu_dep'];
        $lieu_dest = $_POST['lieu_dest'];
        $nbplacedispo = $_POST['nb_place_dispo'];
        $latitude_depart = $_POST['latitude_depart'];
        $longeture_depart = $_POST['longeture_depart'];
        $date_dep = $_POST['date_depart'];
        $heure_dep = $_POST['heure_depart'];
        $prix = $_POST['prix'];


        if ((empty($lieu_dep)) || (empty($lieu_dest)) || (empty($nbplacedispo)) || (empty($latitude_depart)) || (empty($longeture_depart)) || (empty($date_dep)) || (empty($heure_dep)) || (empty($prix))) {

            $response = "Les champs Qui ont ce symbol(*) sont obligatoire de remplir !!";

            echo  $response;
        } else {

            $modifier_trajet = $database->prepare(" UPDATE trajet SET
            lieu_dep=:lieu_dep , lieu_dest=:dieu_dest, nbplacedispo=:nbplacedispo , latitude_depart=:latitude_depart ,longeture_depart =:longeture_depart ,date_depart =:date_depart, heure_depart =:heure_depart , prix =:prix 
            WHERE id_trajet=$id");

            $modifier_trajet->bindparam("lieu_dep", $lieu_dep);
            $modifier_trajet->bindparam("dieu_dest", $lieu_dest);
            $modifier_trajet->bindparam("nbplacedispo", $nbplacedispo);
            $modifier_trajet->bindparam("latitude_depart", $latitude_depart);
            $modifier_trajet->bindparam("longeture_depart", $longeture_depart);
            $modifier_trajet->bindparam("date_depart", $date_dep);
            $modifier_trajet->bindparam("heure_depart", $heure_dep);
            $modifier_trajet->bindparam("prix", $prix);

            $modifier_trajet->execute();

            if ($modifier_trajet->execute()) {

                $response =  "Trajet a été modifié avec succés !";

                echo  $response;
            }
        }
    }
?>
