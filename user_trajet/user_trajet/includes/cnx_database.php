<?php

$username = "root";
$password = "";

//creation de connexion dans la base de donnée
$database = new PDO("mysql:host=localhost;dbname=covoiturage;", $username, $password);
