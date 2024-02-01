<?php
// Include the database configuration file
include('db.php');
if (!empty($_SESSION['users'])) {
  $user = $_SESSION['users'];
  if ($user->type_user == "Utilisateur") {
    header('Location: ./html/home.php');
  } else {
    header('Location: ./admin panel/admin/index.php');
  }
}
// Handle user registration
if (!empty($_POST['register'])) {
  $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  extract($post);

  // Validate input fields (add your own validation logic)
  if (empty($nom_user) || empty($prenom_user) || empty($email_user) || !filter_var($email_user, FILTER_VALIDATE_EMAIL) || empty($mdp_user) || strlen($mdp_user) < 3) {
    $registerError = 'Invalid input. Please provide valid information.';
  } else {
    // Check if the user already exists
    $stmt = $bd->prepare('SELECT * FROM user WHERE email_user = :email_user');
    $stmt->bindValue(':email_user', $email_user, PDO::PARAM_STR);
    $stmt->execute();
    $existingUser = $stmt->fetch(PDO::FETCH_OBJ);

    if ($existingUser) {
      $registerError = 'This email is already registered.';
    } else {
      $queryBlocked = "SELECT * FROM  user_bloquer WHERE num_tel = :num_tel OR email = :email";
      $stmtBlocked = $bd->prepare($queryBlocked);
      $stmtBlocked->bindParam(':num_tel', $num_tel, PDO::PARAM_STR);
      $stmtBlocked->bindParam(':email', $email_user, PDO::PARAM_STR);
      $stmtBlocked->execute();

      if ($stmtBlocked->rowCount() > 0) {
        // L'utilisateur est bloqué, vous pouvez afficher un message d'erreur
        $registerError = "L'enregistrement de cet utilisateur est bloqué par l'administrateur.";
      } else {
        // Insert user into the database
        $stmt = $bd->prepare('INSERT INTO user (nom_user, prenom_user, num_tel, email_user, type_user, mdp_user) VALUES (:nom, :prenom, :num_tel, :email, :type, :mdp)');
        $stmt->bindValue(':nom', $nom_user, PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $prenom_user, PDO::PARAM_STR);
        $stmt->bindValue(':num_tel', $num_tel, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email_user, PDO::PARAM_STR);
        $stmt->bindValue(':type', 'user', PDO::PARAM_STR);
        $stmt->bindValue(':mdp', $mdp_user, PDO::PARAM_STR);
        $stmt->execute();
        unset($nom_user, $prenom_user, $num_tel, $email_user, $mdp_user);
        $registerSuccess = 'Registration successful. You can now login.';
      }
    }
  }
}

// Handle user login
if (!empty($_POST['login'])) {
  $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  extract($post);

  // Validate input fields (add your own validation logic)
  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password) || strlen($password) < 3) {
    $loginError = 'Invalid input. Please provide valid information.';
  } else {
    // Check if the user exists
    $stmt = $bd->prepare('SELECT * FROM user WHERE email_user = :email AND mdp_user = :password');
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if ($user) {
      $_SESSION['users'] = $user;
      if ($user->type_user == "Administrateur") {
        header('Location: ./admin panel/Admin/index.php');
      } else {
        header('Location: ./html/home.php');
      }
      exit();
    } else {
      $loginError = 'Invalid email or password.';
    }
  }
}
?>
<!-- The HTML form remains the same as in your original code -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style.css?v=4" />
  <title>Sign in & Sign up Form</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="#" class="sign-in-form" method="POST">
          <h2 class="title">Connexion</h2>
          <?php if (isset($loginError)) : ?>
            <p style="background-color: #ffcccc;
    color: #ff0000;
    padding: 10px;
    border: 1px solid #ff0000;
    border-radius: 20px;
    max-width: 380px;
    text-align: center;
  width: 100%;
  
    font-size: 14px;"><?php echo $loginError; ?></p>

          <?php endif; ?>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="text" name="email" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Mot de passe" />
          </div>
          <input type="submit" name="login" value="connecter" class="btn solid" />
          <div class="social-media" style="justify-content:space-between;gap:20px;">
            <a href="index.html" class="float-end text-primary"> go to the web site</a>
            <a href="forgot.php" class="float-end text-primary">mot de passe oublier?</a>

          </div>
        </form>
        <form action="#" class="sign-up-form" method="POST">
          <h2 class="title">Inscription</h2>
          <?php if (isset($registerError)) : ?>
            <p style="background-color: #ffcccc;
    color: #ff0000;
    padding: 10px;
    border: 1px solid #ff0000;
    border-radius: 20px;
    max-width: 380px;
    text-align: center;
  width: 100%;
  
    font-size: 14px;"><?php echo $registerError; ?></p>
          <?php endif; ?>
          <?php if (isset($registerSuccess)) : ?>
            <p style="background-color: #d4edda;
  color: #155724;
  padding: 10px;
  border: 1px solid #155724;
  border-radius: 20px;
  max-width: 380px;
  text-align: center;
  width: 100%;
  font-size: 14px;"><?php echo $registerSuccess; ?></p>
          <?php endif; ?>
          <style>
            .con {
              display: flex !important;

            }

            .div1,
            .div2 {
              height: 100px;
              width: 200px;

            }
          </style>
          <div class="con">
            <div class="div1">
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="prenom_user" placeholder="nom" />
              </div>
            </div>
            <div class="div2">
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="nom_user" placeholder="prenom" />
              </div>
            </div>
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="text" name="email_user" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="num_tel" placeholder="numero de telephone" />
          </div>


          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="mdp_user" placeholder="mot de passe" />
          </div>
          <input type="submit" name="register" class="btn" value=" Inscrire" />

        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Nouveau ici?</h3>
          <p>
            Découvrez tout un monde de possibilités en rejoignant notre communauté !
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Inscrivez-vous
          </button>

        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>un parmis nous?</h3>
          <p>
            un parmis nous, ensemble nous prospérons. Rejoignez notre communauté et explorez d'innombrables possibilités
          </p>
          <button class="btn transparent" id="sign-in-btn">
            connecter
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="app.js"></script>
</body>

</html>