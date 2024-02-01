<?php
session_start();
include("includes/cnx_database.php");

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>covoiturage</title>

    <link rel="icon" type="image/png" sizes="15x15" href="img/logo.png">

    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- sweetalert2 -->
    <link href="css/sweetalert2.min.css" rel="stylesheet" />

    <!-- dataTables  -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- font-awesome -->
    <link href="font-awesome/css/all.css" type="text/css" rel="stylesheet">

    <!-- ajax script -->
    <script src="js/jquery.3.6.0.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/jquery.min.js"></script>



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">

                    <div class="collapse navbar-collapse justify-content-between">

                        <div class="header-left"></div>
                        
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                <li><a href="../../html/home.php" aria-expanded="false">
                   <i class="fa-solid fa-rotate-left"></i><span class="nav-text">Retour</span></a>
                    </li>
                    <li><a href="liste_trajets.php" aria-expanded="false">
                            <i class="fa-solid fa-list"></i><span class="nav-text">Liste Des Trajets</span></a>
                    </li>
                    <li><a href="Ajouter_trajet.php" aria-expanded="false">
                            <i class="fa-solid fa-add"></i><span class="nav-text">Ajouter un Trajet</span></a>
                    </li>
                    
                    <li><a href="liste_reservation.php" aria-expanded="false">
                            <i class="fa-solid fa-list"></i><span class="nav-text">Liste des Réservation</span></a>
                    </li>
                    <!--*****************************
                    <li><a href="localisation.php" aria-expanded="false">
                            <i class="fa fa-map-marker"></i><span class="nav-text">Afficher la localisation</span></a>
                    </li>
                    *************** -->

                </ul>
            </div>

        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->