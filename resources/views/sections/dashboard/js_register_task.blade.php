<script type="text/javascript">
    $("#registeredTask").click(function(e) {
        Swal.fire({
            title: 'Asignar Taréa !',
            text: "Se dispone a asignar una tarea para el usuario",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#00a6d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Esta seguro/a de asignar esta taréa/a ?'
        }).then((result) => {
            if (result.isConfirmed) {

                if ($('#day').val() === "") {
                    Swal.fire({
                        title: "Seleccionar Día",
                        text: "Debe seleccionar un día de la semana",
                        icon: "warning"
                    });
                } else {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'post',
                        dataType: 'json',
                        url: "{{ route('registerTask') }}",
                        data: {
                            'day': $('#day').val(),
                            'task': $('#task').val(),
                            'citizen_id': $('#citizen_id').val(),
                        },
                        beforeSend: function() {
                            $('#loadPageM').show();
                        },
                        complete: function() {
                            $('#loadPageM').hide();
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                $('#status_register_task').text('El registro fué exitoso.');
                                $('#status_register_task').css("color", "green");
                            } else {
                                $('#status_register_task').text(
                                    'La asinación no se pudo realizar, por favor verifique los datos.'
                                    );
                                $('#status_register_task').css("color", "red");
                            }
                        },
                        error: function(jqXHR) {
                            console.log('Error el intentar registrar usuario');
                            $('#status_register').text(
                                'El registro no se pudo realizar, Al perecer hay problemas con el servidor !'
                                );
                            $('#status_register').css("color", "red");
                        }
                    });
                }
            }
        });

    });
</script>
