<script>
    $('.debloquer').click(function() {
        $(document).on('click', '.debloquer', function(e) {
            e.preventDefault();

            var id = $(this).attr("value");
            swal.fire({
                text: "Êtes-vous sur de vouloir debloquer ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'green',
                confirmButtonText: 'oui, debloquer !',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'annuler',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                            url: 'includes/liste_utilisateurs_bloquèes/debloquer_user.php',
                            type: 'POST',
                            data: {
                                id: id
                            },
                        })
                        .done(function() {
                            swal.fire({
                                    icon: "success",
                                    text: 'utilisateur a été debloquée avec succés !'
                                })
                                .then(function() {
                                    window.location = "liste_users.php";
                                });
                        })
                }
            });
        });
    });
</script>