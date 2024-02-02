<?php
include("header/header.php");

$affiche_configuration = $database->prepare(" SELECT valeur_config FROM configuration ");

$affiche_configuration->execute();

$i = 1;
$arr[$i] = array();

foreach ($affiche_configuration as $resultat) {

    $val_configue = $resultat['valeur_config'];
    $arr[$i] = $val_configue;
    $i++;
}

$nb_max_places = $arr[1];
$duree_reservation = $arr[2];
$proximité = $arr[3];

?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa fa-certificate fa-xs"></i> Configuration d'application :</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-validation ">
                            <form class="form-valide" method="post">

                                <div class="row">

                                    <div class="col-xl-8">


                                        <div class="form-group row">
                                            <label class="col-lg-10 col-form-label">Nombre max de place
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-11">

                                                <input type="text" class="form-control" name="val-nb_max_places" value=<?php echo "$nb_max_places" ?> placeholder="Enter le nombre maximal de places.." required>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-10 col-form-label">Durèe de reservation avant le depart du trajet / heure(s)
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-11">

                                                <input type="text" class="form-control" name="val-duree_reservation" value=<?php echo $duree_reservation ?> placeholder="Enter la durèe de reservation avant le depart du trajet.." required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-12 col-form-label">la proximité maximale pour une recherche ciblée de trajets à proximité / kilomètres
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-11">

                                                <input type="text" class="form-control" name="val-proximite" value=<?php echo $proximité ?> placeholder="Enter la durèe de reservation avant le depart du trajet.." required>
                                            </div>
                                        </div>

                                    </div>

                                    <label class="col-lg-8 text-danger">*
                                        <span class="text-dark"> :</span>
                                        Champs obligatoires
                                    </label>

                                    <div class="modal-footer col-xl-12" style='padding-bottom:0px;'>

                                        <button type="submit" name="modifier" class="btn btn-primary" title="cliquer pour modifier">
                                            <i class="fa-solid fa-rotate"></i> Modifier</button>

                                        <button type="reset" class="btn btn-secondary" title="cliquer pour annuler">
                                            <i class="fa-solid fa-xmark fa-lg"></i> Annuler</button>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<?php
include("includes/configuration.php");
include("footer/footer.php");
?>