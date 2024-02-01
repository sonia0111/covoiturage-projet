<script>
    $('.supprimer').click(function() {
        $(document).on('click', '.supprimer', function(e) {
            e.preventDefault();

            var id = $(this).attr("value");
            swal.fire({
                text: "Êtes-vous sur de vouloir supprimer ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'oui, supprimer !',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'annuler',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                            url: 'includes/liste_reclamation/supprimer_reclamation.php',
                            type: 'POST',
                            data: {
                                id: id
                            },
                        })
                        .done(function() {
                            swal.fire({
                                    icon: "success",
                                    text: 'reclamation a été supprimé avec succés !'
                                })
                                .then(function() {
                                    window.location = "reclamations.php";
                                });
                        })
                }
            });
        });
    });
</script>