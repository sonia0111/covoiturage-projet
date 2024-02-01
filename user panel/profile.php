<?php
require_once('db.php');

$user = $_SESSION['user'];
$id = $user->id_user;
$email = $user->email_user;

$query = "SELECT * FROM user WHERE id_user=:id";
$stmt = $bd->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Vos autres balises meta, styles, etc. peuvent être ajoutées ici -->

</head>
<body>
    <section id="main-content">
        <section class="wrapper">
            <div id="edit" class="tab-pane">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 detailed">
                        <br>  
                        <h4 class="mb">Personal Information</h4>
                    </div>
                </div>
            </div>
            <form role="form" class="form-horizontal" action="code.php" method="post" enctype="multipart/form-data">
                <div class="col-md-5 centered">
                    <div class="profile-pic">
                        <div class="d-flex justify-content-center align-items-center rounded">
                            <img src="<?php echo './upload/df.png';?>" class="img-circle" style="max-width: 50%; max-height: 100px;">
                        </div>
                    </div>
                </div>
                <div class="col d-flex flex-column">
                    <div class="text-center  mb-2 mb-sm-0">
                        <br>
                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $row['nom_user'] ?></h4>
                        <p class="mb-0"><?php echo $email ?></p>
                        <br>
                        <div class="mt-2">
                            <button class="btn btn-primary" type="button" onclick="document.getElementById('photoInput').click()">
                                <i class="fa fa-fw fa-camera"></i>
                                <span>Change Photo</span>
                            </button>
                            <input type="file" id="photoInput" style="display:none;" name="image">
                        </div>
                    </div>
                </div>
                <div class="form-horizontal">
                    <!-- ... Vos autres champs de formulaire ... -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nom</label>
                        <div class="col-lg-6">
                            <input type="text" name="name" value="<?php echo $row['nom_user']; ?>" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Prénom</label>
                        <div class="col-lg-6">
                            <input type="text" name="cname" value="<?php echo $row['prenom_user']; ?>" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Numéro de téléphone</label>
                        <div class="col-lg-6">
                            <input type="text" name="num_tel" value="<?php echo $row['num_tel']; ?>" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-6">
                            <input type="text" name="email" value="<?php echo $row['email_user']; ?>" class="form-control">
                        </div>
                    </div>
                    <!-- ... Vos autres champs de formulaire ... -->
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="profile.php" class="btn btn-theme04"> CANCEL </a>
                            <button class="btn btn-theme" name="updatbtn" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </section>

    <!-- Ajoutez vos scripts JavaScript ici si nécessaire -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<!-- Le reste de votre code HTML -->
