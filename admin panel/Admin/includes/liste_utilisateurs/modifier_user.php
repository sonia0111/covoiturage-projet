<?php
include("../cnx_database.php");

// ##################################################################
// View Data


if (isset($_POST['user_id'])) {

    $id = $_POST["user_id"];

    $affiche_user = $database->prepare(" SELECT * FROM user WHERE id_user= $id ");

    $affiche_user->execute();
    $output = '';

    foreach ($affiche_user as $resultat) {

        $id = $resultat['id_user'];
        $nom = $resultat['nom_user'];
        $prenom = $resultat['prenom_user'];
        $num_tlf = $resultat['num_tel'];
        $email = $resultat['email_user'];
        $type = $resultat['type_user'];

        $output .= '
     
     <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    
                    <div class="card-body" style="padding-bottom:0px;">
                            <form method="post">

                                <div class="row">
                                    <div class="col-xl-6">
                                    <input type="hidden" class="form-control" id="val-ID" name="val-ID" value="' . $id . '" >
                                    
                                    <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">ID
                                    </label>
                                     <div class="col-lg-6">
                                    <input type="text" class="form-control" readonly value="' . $id . '" >
                                    </div>
                                     </div>

                                    </div>
                                </div>      
                                
                                

                                <div class="row">
                                    <div class="col-xl-6">

                                        
                                            <div class="form-group row">
                                             <label class="col-lg-4 col-form-label">Nom
                                                <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                     <input type="text" class="form-control" id="val-nom" name="val-nom" value="' . $nom . '" placeholder="Enter le nom.." required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">N° telephone
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val-num_tlf" name="val-num_tlf" value="' . $num_tlf . '" placeholder="Enter le numero de telephone.." required>
                                                </div>
                                                 </div>

                                            

                                                 <div class="form-group row">
                                                                   
                                                 <label class="col-lg-4 col-form-label">Type
                                                 <span class="text-danger">*</span>
                                                 </label>
                                                 <div class="col-lg-6">
                                                     <select class="form-control" id="val-type" name="val-type">
                                                         <option value="' . $type . '" selected hidden>' . $type . '</option>
                                                         <option value="Utilisateur">Utilisateur</option>
                                                         <option value="Administrateur">Administrateur</option>
                                                     </select>
                                                 </div>
                                             </div>                                         
                                        

                                    </div>

                            <div class="col-xl-6">

                                          <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">prenom
                                                   <span class="text-danger">*</span></label>
                                                   <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="val-prenom" name="val-prenom" value="' . $prenom . '" placeholder="Enter le prenom.." required>
                                                       </div>
                                            </div>
          


                                 <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Email
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-email" name="val-email" value="' . $email . '" placeholder="Enter email.." required>
                                </div>
                                 </div>

                                

                            </div>
                            
                            <label class="col-lg-4 text-danger">*
                            <span class="text-dark"> :</span>
                                        Champs obligatoires
                                            </label>
                                            
                                        <div class="modal-footer col-xl-12" style="padding-bottom:0px;">
                                                             
                                            <button type="submit" class="btn btn-primary" id="update_data" title="cliquer pour modifier">
                                            <i class="fa-solid fa-rotate"></i> Modifier</button>
                                            
                                            <button type="reset" class="btn btn-secondary" title="cliquer pour annuler">
                                            <i class="fa-solid fa-xmark fa-lg"></i> Annuler</button>

                                        </div>
                                        
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
     ';
    }

    echo $output;
}


// ##################################################################
// update Data

if (isset($_POST['id_user'])) {

    $id = $_POST['id_user'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $type = $_POST['type'];
    $num_tlf = $_POST['num_tlf'];
    $email = $_POST['email'];


    if ((empty($nom)) || (empty($prenom)) || (empty($type)) || (empty($num_tlf)) || (empty($email))) {

        $response = "Les champs Qui ont ce symbol(*) sont obligatoire de remplir !!";

        echo  $response;
    } else {

        $modifier_user = $database->prepare("UPDATE user SET
	 nom_user=:nom , prenom_user=:prenom, num_tel=:numtel , email_user=:email ,type_user =:type  
    WHERE id_user=$id");

        $modifier_user->bindparam("nom", $nom);
        $modifier_user->bindparam("prenom", $prenom);
        $modifier_user->bindparam("numtel", $num_tlf);
        $modifier_user->bindparam("email", $email);
        $modifier_user->bindparam("type", $type);

        $modifier_user->execute();

        if ($modifier_user->execute()) {

            $response =  "Utilisateur a été modifié avec succés !";

            echo  $response;
        }
    }
}
