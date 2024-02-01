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
                            url: 'includes/liste_voitures/supprimer_voiture.php',
                            type: 'POST',
                            data: {
                                id: id
                            },
                        })
                        .done(function() {
                            swal.fire({
                                    icon: "success",
                                    text: 'voiture a été supprimé avec succés !'
                                })
                                .then(function() {
                                    window.location = "liste_voitures.php";
                                });
                        })
                }
            });
        });
    });
</script>