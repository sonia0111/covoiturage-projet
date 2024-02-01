<script>
    $('.affiche_reclamateur').click(function(e) {
        e.preventDefault();
        var reclamateur_id = $(this).attr("value");

        // AJAX request
        $.ajax({
            url: 'includes/liste_reclamations/reclamateur_infos.php',
            type: 'post',
            data: {
                reclamateur_id: reclamateur_id
            },
            success: function(response) {
                // Add response in Modal body
                $('#reclamateur-infos').html(response);

                // Display Modal
                $('#reclamateur').modal('show');
            }
        });
    });
</script>