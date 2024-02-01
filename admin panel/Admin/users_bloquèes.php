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

            <!-- update Data Modal-->
            <div class="modal fade" id="EditModal" role="dialog">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Formulaire Modification :</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="fa-solid fa-xmark fa-sm"></i></button>
                        </div>
                        <div class="modal-body" style="padding-bottom:0px;" id="user">
                        </div>
                    </div>
                </div>
            </div>
            <!-- ############################################################################################### -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fa fa-certificate fa-xs"></i> Liste D'Utilisateurs Bloquèes :</h3>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">

                                <table id="example" class="display" style="min-width: 845px">

                                    <thead>
                                        <tr style="background-color:#419949;">
                                            <th class="text-center">ID </th>
                                            <th class="text-center">N° TELEPHONE</th>
                                            <th class="text-center">EMAIL</th>
                                            <th class="text-center">DEBLOQUER</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include("includes/liste_utilisateurs_bloquèes/liste_utilisateurs_bloquèes.php");
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