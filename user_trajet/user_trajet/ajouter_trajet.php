<?php

include("header/header.php");

session_start();
?>
<!--**********************************
            Content body start
        ***********************************-->

<div class="content-body">
    <div class="container-fluid">

        <div class="container">


            <!-- ############################################################################################### -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <h3><i class="fa fa-certificate fa-xs"></i> Ajouter Un Trajet :</h3>

                        </div>
                        <div class="card-body">


                            <div class="card-body" style="padding-bottom:0px;">
                                <form method="post" action="ajouter_trajet_db.php">
                                    <div class="row">
                                        <div class="col-xl-10">
                                            <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">lieu de depart
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control " id="val-lieu_dep" name="lieu_dep"  placeholder="Entrer le lieu de depart.." required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">lieu de destination
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="val-lieu_dest" name="lieu_dest"  placeholder="Enter le lieu de destination.." required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Nombre de place disponible
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="number" class="form-control" id="val-nb_place_dispo" name="nb_place_dispo"  placeholder="Enter le nombre de place disponible durant le trajet" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">La Latitude De Départ
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type=" hidden" class="form-control" id="val-latitude_dep" name="latitude_dep" placeholder="Enter  la latitude de depart" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">La Longeture De Départ
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="number hidden" class="form-control" id="val-longeture_dep" name="longeture_dep"  placeholder="Enter la longeture de depart" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Date De Départ
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="date" class="form-control" id="val-date_dep" name="date_dep"  placeholder="Enter la date de depart" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Heure De Départ
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="time" class="form-control" id="val-heure_dep" name="heure_dep"  placeholder="Enter l'heure de depart" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Prix
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="number" class="form-control" id="val-prix" name="prix"  placeholder="Enter le prix de trajet" required>
                                                </div>
                                            </div>




                                        </div>


                                    </div>


                                    <label class="col-lg-4 text-danger">*
                                        <span class="text-dark"> :</span>
                                        Champs obligatoires
                                    </label>

                                    <div class="modal-footer col-xl-12" style="padding-bottom:0px;">
                                    <button class="btn btn-primary"> <a href="localisation.php">Localiser Votre Position</a></button>

                                        <button type="submit" class="btn btn-primary" id="submit" name="submit" title="cliquer pour modifier">
                                            <i class="fa-solid fa-save"></i> Enregistrer</button>

                                    </div>


                                </form>
                            </div>

                        </div>



                    </div>
                </div>
            </div>

        </div>
    </div>


</div>



<?php
include("footer/footer.php");
?>