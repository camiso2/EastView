<!-- Logout Modal-->
<div class="modal fade" id="registerUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" 
    data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b><i class="fas fa-user"></i> &nbsp; &nbsp; REGISTRAR
                        CIUDADANO</b></h5>
                <button class="close" type="button"  aria-label="Close">
                    <span aria-hidden="true" >×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="status_register" ></div>
                <br>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user"name="name" id="name" value=""
                            placeholder="Ingrese nombre" onKeyDown="kotoba_titlea_name()" onKeyUp="kotoba_titlea_name()">
                            <small  class="form-text text-muted"><div id="car_name" readonly>---</div>
                            </small>
                    </div>
                    <script >
                        function kotoba_titlea_name() {
                            if ($("#name").val().length=="40") {
                                $( "#car_name" ).text("Máximo Dígitos Permitidos (40)");
                                $(document).on('keypress','input[type="text"][maxlength]', function(){
                                    return this.value.length < +this.attributes.maxlength.value;
                                });
                                return;
                            }else{
                                $("#car_name").text($("#name").val().length +" Carácteres "); 
                            }
                        } 
                    </script>
                    <div class="col-sm-6">
                        <input type="number" class="form-control form-control-user" name="phone" id="phone" value="" maxlength="10"
                            placeholder="ingrese teléfono" onKeyDown="kotoba_titlea()" onKeyUp="kotoba_titlea()">
                            <small  class="form-text text-muted"><div id="car_" readonly>---</div>
                            </small>
                    </div>
                    <script >
                        function kotoba_titlea() {
                            if ($("#phone").val().length=="10") {
                                $( "#car_" ).text("Máximo Dígitos Permitidos (10)");
                                $(document).on('keypress','input[type="number"][maxlength]', function(){
                                    return this.value.length < +this.attributes.maxlength.value;
                                });
                                return;
                            }else{
                                $("#car_").text($("#phone").val().length +" Carácteres "); 
                            }
                        } 
                    </script>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" name="email" id="email" value=""
                        placeholder="nombre@gmail.com" onKeyDown="kotoba_titlea_email()" onKeyUp="kotoba_titlea_email()">
                        <small  class="form-text text-muted"><div id="car_email" readonly>----</div>
                        </small>

                        <script >
                            function kotoba_titlea_email() {
                                if ($("#email").val().length=="40") {
                                    $( "#car_email" ).text("Máximo Dígitos Permitidos (40)");
                                    $(document).on('keypress','input[type="text"][maxlength]', function(){
                                        return this.value.length < +this.attributes.maxlength.value;
                                    });
                                    return;
                                }else{
                                    $("#car_email").text($("#email").val().length +" Carácteres "); 
                                }
                            } 
                        </script>
                </div>
                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary btn-block shadow-sm"
                    id="registered">
                    <i class="fas fa-user"></i> &nbsp; &nbsp; Registrar Ciudadano
                </button>
                @include('sections.dashboard.js_register_user')
            </div>
            <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" onclick="window.location.reload()" >Cerrar</button>
            </div>
        </div>
    </div>
</div>
