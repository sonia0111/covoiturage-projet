<?php

include("header/header.php");


?>
<!--**********************************
            Content body start
        ***********************************-->

<div class="content-body">
    <div class="container-fluid">

        <div class="container">

            <!-- ############################################################################################### -->
            <!-- View Data(MATERIEL) Modal-->
            <div class="modal fade" id="reclamateur" role="dialog">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Informations De Reclamateur' : </h4>
                        </div>
                        <div class="modal-body" id="reclamateur-infos">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary " data-dismiss="modal">fermer</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ############################################################################################### -->
            <!-- View Data(observation) Modal-->
            <div class="modal fade" id="Modaldetails" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Message de reclamation : </h4>
                        </div>
                        <div class="modal-body" id="modal-details">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary " data-dismiss="modal"> Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ############################################################################################### -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fa fa-certificate fa-xs"></i> Liste Des Reclamations :</h3>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">

                                <table id="example" class="display" style="min-width: 845px">

                                    <thead>
                                        <tr style="background-color:#419949;">
                                            <th class="text-center">UTILISATEUR </th>
                                            <th class="text-center">RECLAMATION</th>
                                            <th class="text-center">DATE RECLAMATION</th>
                                            <th class="text-center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include("includes/liste_reclamations/liste_reclamations.php");
                                        ?>
                                    </tbody>
                                </table>
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