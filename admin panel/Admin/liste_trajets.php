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
            <div class="modal fade" id="conducteur" role="dialog">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Informations du conducteur : </h4>
                        </div>
                        <div class="modal-body" id="conducteur-infos">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary " data-dismiss="modal">fermer</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ############################################################################################### -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fa fa-certificate fa-xs"></i> Liste Des Trajets :</h3>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">

                                <table id="example" class="display" style="min-width: 845px">

                                    <thead>
                                        <tr style="background-color:#419949;">
                                            <th class="text-center">CONDUCTEUR </th>
                                            <th class="text-center">LIEU DEPART</th>
                                            <th class="text-center">LIEU DESTINATION</th>
                                            <th class="text-center">PLACES DISPONIBLES</th>
                                            <th class="text-center">L'ATITUDE DEPART</th>
                                            <th class="text-center">LONGETURE DEPART</th>
                                            <th class="text-center">DATE DEPART</th>
                                            <th class="text-center">HEURE DEPART</th>
                                            <th class="text-center">Prix(DA)</th>
                                            <th class="text-center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include("includes/liste_trajets/liste_trajets.php");
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