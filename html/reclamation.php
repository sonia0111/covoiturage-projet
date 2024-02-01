<?php
include('db.php');

if (!empty($_SESSION["users"])) {
    include 'Navbar2.php';
    include 'sidebar.php';
} else {
    header('Location: ./home.php');
}

$user = $_SESSION['users'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LBR Covoiturage - Réclamation</title>

    <!-- Ajoutez ici vos liens vers les fichiers CSS nécessaires -->
    <!--Favicon-->
    <link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png" />
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.6.4.js"></script>
    
    <!-- Ajoutez d'autres liens CSS si nécessaire -->
    <style>
        /* Styles spécifiques à la page de réclamation */
        * {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        

        .reclamation {
            display: flex;
            position:absolute;
            justify-content: center;
            align-items: center;
            left:78px;
            width: calc(100% - 78px);
            height: calc(100vh - 68px);
            background-color: #fbfbfb;
            transition: all 0.5s ease;
        }
        .reclamation-opened {
	        left: 260px;
	        width: calc(100% - 260px);
        }


        .reclamation-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        .reclamation-form h1 {
            text-align: center;
            color: #333;
        }

        .reclamation-form form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .reclamation-form label {
            font-weight: 500;
            color: #555;
        }

        .reclamation-form input,
        .reclamation-form textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .reclamation-form button {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .reclamation-form button:hover {
            background-color: #2980b9;
        }
    </style>
    <!-- Ajoutez ici vos autres scripts ou liens nécessaires -->

</head>

<body>

    <?php
    // Ajout de la navbar
    
    ?>

    <div class="reclamation">
        <div class="reclamation-form">
            <h1>envoyer  une Réclamation</h1>
            <form id="envrec">
                <!-- Ajoutez ici vos champs de formulaire pour la réclamation -->
                <label for="subject">Sujet :</label>
                <input type="text" id="sujet" name="sujet">
                <input type="hidden" name="id" value="<?= $user->id_user; ?>">

                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="4"></textarea>

                <button type="submit">Envoyer la Réclamation</button>
                
                </form>
        </div>
    </div>
    <script>
    let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}
let reclamation =document.querySelector(".reclamation")
let nav = document.querySelector("nav")
let list =document.querySelector(".list")
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
  nav.classList.toggle("nav-opened")
  reclamation.classList.toggle("reclamation-opened")

});
</script>
    <script src="jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $("#envrec").submit(function (e) {
                e.preventDefault();

                var msg = $("#message").val();
                var sujet = $("#sujet").val();

                if (msg == ''|| sujet== '') {
                    Swal.fire({
                        title: 'Error',
                        text: 'Les champs sont vides, veuillez remplir puis envoyer!',
                        icon: 'warning'
                    })
                } else {
                    Swal.fire({
                        title: 'Envoyer la réclamation?',
                        text: "Voulez-vous vraiment envoyer cette réclamation?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#28a745',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oui, envoyer!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: 'contactform.php',
                                type: 'POST',
                                cache: false,
                                data: $(this).serialize(),
                                success: function () {
                                    Swal.fire({
                                        title: 'Success',
                                        icon: 'success',
                                        text: 'Réclamation envoyée!'
                                    }).then(() => {
                                        window.location.reload();
                                    })
                                }
                            })
                        }
                    })
                }
            })
        })
    </script>

</body>

</html>
