<script>

    
    $(document).on('click', '.modif_trajet', function(e) {
        e.preventDefault();
       //console.log("well done");
        var trajet_id = $(this).attr("value");
        $.ajax({
            url: 'includes/liste_trajets/modifier_trajet.php',
            method: 'POST',
            data: {
                trajet_id: trajet_id
            },
            success: function(output) {
               // console.log(output);
                // Add response in Modal body
               $('#trajet').html(output);

                // Display Modal
                $('#EditTrajetModal').modal('show');

            }
        });
    });

   

    $(document).on("click", "#update_data_trajet", function() {
       // e.preventDefault();
        //console.log("well done 22")
        var id_trajet = $("#val-ID_trajet").val();
        var lieu_dep = $("#val-lieu_dep").val();
        var lieu_dest = $("#val-lieu_dest").val();
        var nb_place_dispo = $("#val-nb_place_dispo").val();
        var latitude_depart = $("#val-latitude_depart").val();
        var longeture_depart = $("#val-longeture_depart").val();
        var date_depart = $("#val-date_depart").val();
        var heure_depart = $("#val-heure_depart").val();
        var prix = $("#val-prix").val();

        //console.log(id_trajet,lieu_dep,lieu_dest,nb_place_dispo,latitude_depart,longeture_depart);
        
        $.ajax({
            url: 'includes/liste_trajets/modifier_trajet.php',
            method: 'POST',
            data: {
                id_trajet: id_trajet,
                lieu_dep: lieu_dep,
                lieu_dest: lieu_dest,
                nb_place_dispo: nb_place_dispo,
                latitude_depart: latitude_depart,
                longeture_depart: longeture_depart,
                date_depart: date_depart,
                heure_depart: heure_depart,
                prix: prix
            },
            success: function(response) {
               alert(response);
               // console.log(response);
            }
        });
    });
    
</script>