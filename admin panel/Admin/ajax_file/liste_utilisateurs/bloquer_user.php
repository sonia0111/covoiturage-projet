<script>
    $('.bloquer').click(function() {
        $(document).on('click', '.bloquer', function(e) {
            e.preventDefault();

            var id = $(this).attr("value");
            swal.fire({
                text: "Êtes-vous sur de vouloir bloquer ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'oui, bloquer !',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'annuler',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                            url: 'includes/liste_utilisateurs/bloquer_user.php',
                            type: 'POST',
                            data: {
                                id: id
                            },
                        })
                        .done(function() {
                            swal.fire({
                                    icon: "success",
                                    text: 'utilisateur a été bloquée avec succés !'
                                })
                                .then(function() {
                                    window.location = "users_bloquèes.php";
                                });
                        })
                }
            });
        });
    });
</script>