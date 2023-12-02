<script type="text/javascript">
    $("#registered").click(function(e) {

        Swal.fire({
            title: 'Registrar Usuario !',
            text: "Se dispone al registro de un nuevo usuario/a",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#00a6d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Esta seguro/a de registrar este usuario/a ?'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    dataType: 'json',
                    url: "{{ route('registerCitizens') }}",
                    data: {
                        'name': $('#name').val(),
                        'phone': $('#phone').val(),
                        'email': $('#email').val(),
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
                            $('#status_register').text('El registro fué exitoso.');
                            $('#status_register').css("color", "green");

                        }else{

                            if ("email" in response.data ) {
                                $('#status_register').text(string(response.data.error.email[0]));
                                $('#status_register').css("color", "red");Z
                            } else {

                                if ("phone" in response.data){
                                    $('#status_register').text(string(response.data.error.phone[0]));
                                    $('#status_register').css("color", "red");
                                }else{
                                    $('#status_register').text('El registro no se pudo realizar, intentelo de nuevo, posibles causas, El email puede estar registrado. Número Teléfono puede estar ya registrado. por favor verifique');
                                    $('#status_register').css("color", "red");

                                }
                            }
                        }
                    },
                    error: function(jqXHR) {
                        console.log('Error el intentar registrar usuario');
                        $('#status_register').text('El registro no se pudo realizar, Al perecer hay problemas con el servidor !');
                        $('#status_register').css("color", "red");
                    }
                });

            }
        });

    });
</script>
