<script>
    $('.afficher_photo').click(function(e) {
        e.preventDefault();
        var voiture_id = $(this).attr("value");

        // AJAX request
        $.ajax({
            url: 'includes/liste_voitures/photo_voiture.php',
            type: 'post',
            data: {
                voiture_id: voiture_id
            },
            success: function(response) {
                // Add response in Modal body
                $('#modal-details').html(response);

                // Display Modal
                $('#Modaldetails').modal('show');
            }
        });
    });
</script>