<script>
    
    $('.annuler').click(function() {
        $(document).on('click', '.annuler', function(e) {
            e.preventDefault();
            console.log("annuler !!");
            var id = $(this).attr("value");
            swal.fire({
                text: "Êtes-vous sur de vouloir annuler cette reservation ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'oui, annuler !',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'non',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                            url: 'includes/liste_reservation/annuler_reservation.php',
                            type: 'POST',
                            data: {
                                id: id
                                
                            },
                        })
                        .done(function() {
                            swal.fire({
                                    icon: "success",
                                    text: 'Reservation a été annuler avec succés !'
                                })
                                .then(function() {
                                    window.location = "liste_reservation.php";
                                });
                        })
                }
            });
        });
    });
</script>