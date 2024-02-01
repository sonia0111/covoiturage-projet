<?php

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
    <link href="./css/style.css" rel="stylesheet">

    <!-- sweetalert2 -->
    <link href="./css/sweetalert2.min.css" rel="stylesheet" />

    <!-- dataTables  -->
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- font-awesome -->
    <link href="./font-awesome/css/all.css" type="text/css" rel="stylesheet">

    <!-- ajax script -->
    <script src="./js/jquery.3.6.0.min.js"></script>
    <script src="./js/sweetalert2.min.js"></script>
    <script src="./js/jquery.min.js"></script>



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
            <div class="brand-logo">
                <img class="logo-abbr" src="../../upload/df.jpg">
                <h5 class="brand-title">Administrateur </h5>

            </div>

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
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa-solid fa-list"></i>

                                </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                    <a href="logout.php" class="dropdown-item">
                                        <i class="fa fa-power-off" aria-hidden="true"></i>
                                        <span class="ml-2">Déconnexion</span>
                                    </a>
                                </div>
                            </li>
                        </ul>

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

                    <li><a href="index.php" aria-expanded="false">
                            <i class="fa-sharp fa-solid fa-chart-simple"></i><span class="nav-text">Statistiques & Rapports</span></a>

                    </li>

                    <li><a href="liste_users.php" aria-expanded="false">
                            <i class="fa-solid fa-user"></i><span class="nav-text">Liste D'utilisateurs</span></a>
                    </li>

                    <li><a href="users_bloquèes.php" aria-expanded="false">
                            <i class="fa-solid fa-ban"></i><span class="nav-text">Utilisateurs Bloquèes</span></a>
                    </li>

                    <li><a href="liste_voitures.php" aria-expanded="false">
                            <i class="fa-solid fa-car"></i><span class="nav-text">Liste Des Voitures</span></a>
                    </li>

                    <li><a href="liste_trajets.php" aria-expanded="false">
                            <i class="fa-solid fa-location-dot"></i><span class="nav-text">Liste Des Trajets</span></a>
                    </li>

                    <li><a href="reclamations.php" aria-expanded="false">
                            <i class="fa-solid fa-circle-exclamation"></i><span class="nav-text">Reclamations</span></a>
                    </li>

                    <li><a href="configuration.php" aria-expanded="false">
                            <i class="fa-solid fa-gear"></i><span class="nav-text">Configuration</span></a>
                    </li>

                </ul>
            </div>

        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->