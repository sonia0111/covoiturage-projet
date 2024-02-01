<script>
    $('.affiche_conducteur').click(function(e) {
        e.preventDefault();
        var conducteur_id = $(this).attr("value");

        // AJAX request
        $.ajax({
            url: 'includes/liste_trajets/conducteur_infos.php',
            type: 'post',
            data: {
                conducteur_id: conducteur_id
            },
            success: function(response) {
                // Add response in Modal body
                $('#conducteur-infos').html(response);

                // Display Modal
                $('#conducteur').modal('show');
            }
        });
    });
</script>