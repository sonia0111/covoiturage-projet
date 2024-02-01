<?php
session_start();
try{
$bd= new PDO('mysql:host=localhost;dbname=covoiturage',"root","", [

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,// récupérer l'errer

    PDO::ATTR_PERSISTENT => true, //une connection plus rapide

    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,//récupérer les récultat en object

]);

}catch(Exception $e){
   die("Error:".$e->getMessage());
}





?>