<script>
    $('.message_reclamation').click(function(e) {
        e.preventDefault();
        var reclamation_id = $(this).attr("value");
        // AJAX request
        $.ajax({
            url: 'includes/liste_reclamations/affiche_message.php',
            type: 'post',
            data: {
                reclamation_id: reclamation_id
            },
            success: function(response) {
                // Add response in Modal body
                $('#modal-details').html(response);

                // Display Modal
                $('#Modal').modal('show');
            }
        });
    });
</script>