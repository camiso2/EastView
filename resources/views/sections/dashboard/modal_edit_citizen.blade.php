<!-- Logout Modal-->
<div class="modal fade" id="editCitizen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b><i class="fas fa-project-diagram"></i> &nbsp; &nbsp;
                        LISTA DE ASIGNACIONES</b></h5>
                <button class="close" type="button" onclick="window.location.reload()" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="status_edit"></div>
                <input type="hidden" name="id" id="e_id">
                <br>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="name" id="e_name" value="" placeholder="Nombre" onKeyDown="kotoba_edit_name()" onKeyUp="kotoba_edit_name()">
                        <small class="form-text text-muted">
                            <div id="ecar_name" readonly>---</div>
                        </small>
                    </div>
                    <script>
                        function kotoba_edit_name() {
                            if ($("#e_name").val().length == "40") {
                                $("#ecar_name").text("Máximo Dígitos Permitidos (40)");
                                $(document).on('keypress', 'input[type="text"][maxlength]', function() {
                                    return this.value.length < +this.attributes.maxlength.value;
                                });
                                return;
                            } else {
                                $("#ecar_name").text($("#e_name").val().length + " Carácteres ");
                            }
                        }

                    </script>
                    <div class="col-sm-6">
                        <input type="number" class="form-control form-control-user" name="phone" id="e_phone" value="" maxlength="10" placeholder="Teléfono" onKeyDown="edit_titlea()" onKeyUp="edit_titlea()">
                        <small class="form-text text-muted">
                            <div id="ncar_" readonly>---</div>
                        </small>
                    </div>
                    <script>
                        function edit_titlea() {
                            if ($("#e_phone").val().length == "10") {
                                $("#ncar_").text("Máximo Dígitos Permitidos (10)");
                                $(document).on('keypress', 'input[type="number"][maxlength]', function() {
                                    return this.value.length < +this.attributes.maxlength.value;
                                });
                                return;
                            } else {
                                $("#ncar_").text($("#e_phone").val().length + " Carácteres ");
                            }
                        }

                    </script>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" name="email" id="e_email" value="" placeholder="Email" onKeyDown="email_titlea_email()" onKeyUp="email_titlea_email()">
                    <small class="form-text text-muted">
                        <div id="ecar_email" readonly>----</div>
                    </small>

                    <script>
                        function email_titlea_email() {
                            if ($("#e_email").val().length == "40") {
                                $("#ecar_email").text("Máximo Dígitos Permitidos (40)");
                                $(document).on('keypress', 'input[type="text"][maxlength]', function() {
                                    return this.value.length < +this.attributes.maxlength.value;
                                });
                                return;
                            } else {
                                $("#ecar_email").text($("#e_email").val().length + " Carácteres ");
                            }
                        }

                    </script>
                </div>

                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary btn-block shadow-sm" id="editCitizenButton">
                    <i class="fas fa-user"></i> &nbsp; &nbsp; ACTUALIZAR LOS DATOS DEL CIUDADANO
                </button>

                <script type="text/javascript">
                    $("#editCitizenButton").click(function(e) {

                        Swal.fire({
                            title: 'editar datos ciudadano !'
                            , text: "Se dispone ACTUALIZAR los datos de un ciudadano/a"
                            , icon: 'info'
                            , showCancelButton: true
                            , confirmButtonColor: '#00a6d6'
                            , cancelButtonColor: '#d33'
                            , confirmButtonText: 'Esta seguro/a ACTUALIZAR los datos del ciudadano /a ?'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                    , type: 'post'
                                    , dataType: 'json'
                                    , url: "{{ route('editCitizen') }}"
                                    , data: {
                                        'name': $('#e_name').val()
                                        , 'phone': $('#e_phone').val()
                                        , 'email': $('#e_email').val()
                                        , 'id': $('#e_id').val()
                                    , }
                                    , beforeSend: function() {
                                        $('#loadPageM').show();
                                    }
                                    , complete: function() {
                                        $('#loadPageM').hide();
                                    }
                                    , success: function(response) {

                                        console.log(response);
                                        if (response.success) {
                                            $('#status_edit').text('La ACTUALIZACIÓN fué exitosa.');
                                            $('#status_edit').css("color", "green");

                                        } else {

                                            if ("email" in response.data) {
                                                $('#status_edit').text(string(response.data.error.email[0]));
                                                $('#status_edit').css("color", "red");
                                                Z
                                            } else {

                                                if ("phone" in response.data) {
                                                    $('#status_edit').text(string(response.data.error.phone[0]));
                                                    $('#status_edit').css("color", "red");
                                                } else {
                                                    $('#status_edit').text('lA ACTUALIZZACIÓN no se pudo realizar, intentelo de nuevo, posibles causas, El email puede estar registrado. Número Teléfono puede estar ya registrado. por favor verifique');
                                                    $('#status_edit').css("color", "red");

                                                }
                                            }
                                        }
                                    }
                                    , error: function(jqXHR) {
                                        console.log('Error el intentar registrar usuario');
                                        $('#status_edit').text('la edicion no se pudo realizar, Al perecer hay problemas con el servidor !');
                                        $('#status_edit').css("color", "red");
                                    }
                                });

                            }
                        });

                    });

                </script>





            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" onclick="window.location.reload()"">Cerrar</button>
            </div>
        </div>
    </div>
</div>
