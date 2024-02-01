<script>
    $(document).on('click', '.modif_user', function(e) {
        e.preventDefault();
        var user_id = $(this).attr("value");
        $.ajax({
            url: "includes/liste_utilisateurs/modifier_user.php",
            method: "POST",
            data: {
                user_id: user_id
            },
            success: function(output) {
                // Add response in Modal body
                $('#user').html(output);

                // Display Modal
                $('#EditModal').modal('show');

            }
        });
    });



    $(document).on("click", "#update_data", function() {

        var id_user = $("#val-ID").val();
        var nom = $("#val-nom").val();
        var prenom = $("#val-prenom").val();
        var type = $("#val-type").val();
        var num_tlf = $("#val-num_tlf").val();
        var email = $("#val-email").val();


        $.ajax({
            url: "includes/liste_utilisateurs/modifier_user.php",
            method: "POST",
            data: {
                id_user: id_user,
                nom: nom,
                prenom: prenom,
                type: type,
                num_tlf: num_tlf,
                email: email

            },
            success: function(response) {
                alert(response);

            }
        });
    });
</script>