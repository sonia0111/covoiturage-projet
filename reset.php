<?php

require 'db.php';


if(empty($_GET['token'])){
  header('Location: index2.php');
}

$token = $_GET['token'];

$req = $bd->prepare('SELECT * FROM password_resets WHERE token=:token');
$req->bindValue(':token', $token, PDO::PARAM_STR);
$req->execute();

if(!$req->rowCount()){
  header('Location: index2.php');
}
else{
  $password_reset = $req->fetch();
}

if(!empty($_POST))
{
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    extract($post);

    $errors = [];

    if($password_reset->email !== $email){
      array_push($errors, 'Cette adresse email est invalide.');
    }

    if(empty($password) || strlen($password) < 4){
      array_push($errors, 'Le mot de passe est requis et doit contenir au moins 6 caractères.');
    }

    if(!empty($password) && $password != $password_confirmation){
      array_push($errors, 'Les mots de passe ne correspondent pas.');
    }

    //optionnelement vérifier si l'email existe toujours dans la table  users

    if(empty($errors)){
      $req = $bd->prepare('UPDATE user SET mdp_user:password WHERE email_user=:email');
      $req->bindValue(':password', $password, PDO::PARAM_STR);
      $req->bindValue(':email', $email, PDO::PARAM_STR);
      $req->execute();

      $success = 'Mot de passe mise à jour. <a href="login.php">Me connecter</a>';

      $req = $bd->prepare('DELETE FROM password_resets WHERE email=:email');
      $req->bindValue(':email', $email, PDO::PARAM_STR);
      $req->execute();

      unset($email, $password);
    }
}

$title = 'Réinitialiser mon mot de passe';

?>

<!doctype html>
<html lang="fr" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title><?= $title ?? '';?></title>

    <!-- Bootstrap CSS -->
  	
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>

    <!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="style.css" />
    <style>
    	#container{
    		padding-top: 75px;
    	}
    </style>
    
  </head>
  <body class="d-flex flex-column h-100">
    <header>
  <!-- Fixed navbar -->
  
</header>
<style>
  .flex-shrink-0{
    margin-top: 100px!important;
  }
</style>
<br><br><br>
<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  
        <div class="forms-container">
        
    

   

    <form action="reset.php?token=<?=$token?>" method="post" class="sign-in-form">
    <h2><?=$title;?></h2>

    <?php if(!empty($errors)):?>
        <div style="background-color: #ffcccc;
    color: #ff0000;
    padding: 10px;
    border: 1px solid #ff0000;
    border-radius: 20px;
    max-width: 380px;
    text-align: center;
  width: 100%;
  
    font-size: 14px;">
        <?php foreach ($errors as $error):?>
          <?=$error?>
          <br>
        <?php endforeach;?>
        </div>
        <?php endif;
        ?>
         <?php if(!empty($success)):?>
          <div style="background-color: #d4edda;
  color: #155724;
  padding: 10px;
  border: 1px solid #155724;
  border-radius: 20px;
  max-width: 380px;
  text-align: center;
  width: 100%;
  font-size: 14px;">
          <?=$success?>
          </div>
          <?php endif;
        ?>
    
    <div class="input-field">
       <i class="fas fa-envelope"></i>
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $email ?? '';?>">
      </div>
      <div class="input-field">
      <i class="fas fa-lock"></i>
       <input type="password" name="password" class="form-control" placeholder="Mot de passe">
      </div>
      <div class="input-field">
      <i class="fas fa-lock"></i>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmez le mot de passe">
      </div>
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    </div>
    
</main>

<footer class="footer mt-auto py-3">

</footer>
</body>
</html>