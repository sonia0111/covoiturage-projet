<?php

include_once('db.php');
$id = $_POST['id'];
 $msg = $_POST['message'];
  $sujet= $_POST['sujet'];    
  
  $req = $bd->prepare('INSERT INTO reclamation ( id_user,sujet ,message)VALUES (:id,:sujet ,:message)');
  $req->bindValue(':id', $id, PDO::PARAM_STR);
  $req->bindValue(':sujet', $sujet, PDO::PARAM_STR);
  $req->bindValue(':message', $msg, PDO::PARAM_STR);
  $req->execute();
  if (!$req) {
    die("Erreur lors de la mise à jour des données : " );
  }


       
?>