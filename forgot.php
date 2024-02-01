<?php
require 'db.php';

$title = 'Mot de passe oublié';
require_once 'vendor/autoload.php';
if(!empty($_POST))
{
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    extract($post);

    $errors = [];


    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
      array_push($errors, 'Cette email est invalide.');
    }
    else{
      $req = $bd->prepare('SELECT * FROM user WHERE email_user=:email');
      $req->bindValue(':email', $email, PDO::PARAM_STR);
      $req->execute();

      if(!$req->rowCount()){
        array_push($errors, 'Cet email ne correspond à aucun membre du site.');
      }
      else{
        $user = $req->fetch();
      }

      if(empty($errors))
      {
        $token = uniqid();

        $req = $bd->prepare('INSERT INTO password_resets (email, token, create_at) VALUES (:email, :token, NOW())');
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':token', $token, PDO::PARAM_STR);
        $req->execute();

        $link = 'Bonjour, veuillez cliquer sur <a href="http://localhost/all/covoiturage//reset.php?token='.$token.'">ce lien</a> pour réinitialiser votre mote de passe.';

        // Create the Transport
        
 // Create the Transport
 $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 465))
 ->setUsername('9b9c85075c2303')
 ->setPassword('9edf5221ba36b6')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Mot de passe oublié'))
 ->setFrom(['belsonia167@gmail.com' => 'sonia'])
 ->setTo([$email => 'user'])
 ->addPart($link, 'text/html');
 ;

// Send the message
$result = $mailer->send($message);

if($result){
 $success = 'Un email vous a été envoyé avec des instructions.';
 unset($email);
}
        
        

        
      }
    }
}

?>

<!doctype html>
<html lang="fr" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
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

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
<div class="container">
      <div class="forms-container">
        <div class="signin-signup">
    
        

    <form action="forgot.php" method="post" class="sign-in-form">
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
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <br>

    
    </div>
    </div></div>
    
    
</main>
<div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Do You Remember Your Password??</h3>
            <p>
            You can now join our community and experience endless possibilities!
            </p>
            <button class="btn transparent" id="sign-up-btn">
             <a href="index2.php" style="text-decoration:none;"> Sign in</a>
            </button>
          
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        
      </div>
    </div>

    
<footer class="footer mt-auto py-3">

</footer>
</body>
</html>