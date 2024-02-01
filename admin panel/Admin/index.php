<?php
include("header/header.php");
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text"><i class="fa-solid fa-user fa-lg" style="color:brown"></i>&nbsp;&nbsp;<u>Nombre D'Utilisateurs :</u> </div>
                                    <div class="stat-digit">
                                        <?php
                                        $nombre_utilisateurs = $database->prepare("SELECT * FROM user ");

                                        $nombre_utilisateurs->execute();

                                        echo $nombre_utilisateurs->rowCount();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text"> <i class='fa-solid fa-location-dot fa-lg' style="color:brown"></i>&nbsp;&nbsp;<u>Nombre Des Trajets :</u> </div>
                                    <div class="stat-digit">

                                        <?php

                                        $nombre_trajets = $database->prepare("SELECT * FROM trajet ");

                                        $nombre_trajets->execute();

                                        echo $nombre_trajets->rowCount();
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text"><i class="fa-solid fa-car fa-lg" style="color:brown"></i>&nbsp;&nbsp;<u>Nombre Des Voitures :</u></div>
                                    <div class="stat-digit">

                                        <?php
                                        $nombre_voitures = $database->prepare("SELECT * FROM voiture ");

                                        $nombre_voitures->execute();

                                        echo $nombre_voitures->rowCount();
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text"><i class="fa-solid fa-circle-exclamation fa-lg" style="color:brown"></i>&nbsp;&nbsp;<u>Nombre Des Reclamations :</u></div>
                                    <div class="stat-digit">

                                        <?php
                                        $nombre_voitures = $database->prepare("SELECT * FROM reclamation ");

                                        $nombre_voitures->execute();

                                        echo $nombre_voitures->rowCount();
                                        ?>

                                    </div>
                                </div>
                            </div>
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
include("footer/footer.php");
?>