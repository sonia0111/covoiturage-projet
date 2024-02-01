<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body" style="padding-bottom:0px;">
                <form method="POST">

                    <div class="row">
                        <div class="col-xl-6">
                            <input type="hidden" class="form-control" id="val-ID_trajet" name="val-ID_trajet" value="' . $id . '">

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">ID
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" readonly value="' . $id . '">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6">


                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Lieu dep
                                    <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-lieu_dep" name="val-lieu_dep" value="' . $lieu_dep . '" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">lieu dest
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-lieu_dest" name="val-lieu_dest" value="' . $lieu_dest . '" placeholder="Enter .." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Nombre de place dispo
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" id="val-nb_place_dispo" name="val-nb_place_dispo" value="' . $nbplacedispo . '" placeholder="Enter .." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">latitude depart
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" id="val-latitude_depart" name="val-latitude_depart" value="' . $latitude_depart . '" placeholder="Enter .." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">longeture depart
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" id="val-longeture_depart" name="val-longeture_depart" value="' . $longeture_depart . '" placeholder="Enter .." required>
                                </div>
                            </div>

                            <label class="col-lg-4 text-danger">*
                                <span class="text-dark"> :</span>
                                Champs obligatoires
                            </label>

                        </div>
                        <div class="modal-footer col-xl-12" style="padding-bottom:0px;">

                            <button type="submit" class="btn btn-primary" id="update_data_trajet" title="cliquer pour modifier">
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