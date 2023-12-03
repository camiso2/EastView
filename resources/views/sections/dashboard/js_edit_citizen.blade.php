<script type="text/javascript">
    $("#editCitizenButton").click(function(e) {

        Swal.fire({
            title: 'editar datos ciudadano !',
            text: "Se dispone ACTUALIZAR los datos de un ciudadano/a",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#00a6d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Esta seguro/a ACTUALIZAR los datos del ciudadano /a ?'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    dataType: 'json',
                    url: "{{ route('editCitizen') }}",
                    data: {
                        'name': $('#e_name').val(),
                        'phone': $('#e_phone').val(),
                        'email': $('#e_email').val(),
                        'id': $('#e_id').val(),
                    },
                    beforeSend: function() {
                        $('#loadPageM').show();
                    },
                    complete: function() {
                        $('#loadPageM').hide();
                    },
                    success: function(response) {

                        console.log(response);
                        if(response.success){
                            $('#status_edit').text('La ACTUALIZACIÓN fué exitosa.');
                            $('#status_edit').css("color", "green");

                        }else{

                            if ("email" in response.data ) {
                                $('#status_edit').text(string(response.data.error.email[0]));
                                $('#status_edit').css("color", "red");Z
                            } else {

                                if ("phone" in response.data){
                                    $('#status_edit').text(string(response.data.error.phone[0]));
                                    $('#status_edit').css("color", "red");
                                }else{
                                    $('#status_edit').text('lA ACTUALIZZACIÓN no se pudo realizar, intentelo de nuevo, posibles causas, El email puede estar registrado. Número Teléfono puede estar ya registrado. por favor verifique');
                                    $('#status_edit').css("color", "red");

                                }
                            }
                        }
                    },
                    error: function(jqXHR) {
                        console.log('Error el intentar registrar usuario');
                        $('#status_edit').text('la edicion no se pudo realizar, Al perecer hay problemas con el servidor !');
                        $('#status_edit').css("color", "red");
                    }
                });

            }
        });

    });
</script>
