<!-- Logout Modal-->
<div class="modal fade" id="registerTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" 
    data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b><i class="fas fa-user"></i> &nbsp; &nbsp; ASIGNAR
                        TARÉA PARA
                        CIUDADANO</b></h5>
                <button class="close" type="button"  onclick="window.location.reload()" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="status_register_task"></div>
                <br>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="">Describa la taréa</label>
                        <input type="text" class="form-control form-control-user"name="task" id="task"
                            value="esta es una tarea..." placeholder="Nombre">
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="">Seleccione el usuario</label>
                        <select class="form-control" name="citizen_id" id="citizen_id">
                            @foreach ($citizens as $ci)
                                <option value="{{ $ci->id }}">
                                    {{ 'nombre :' . $ci->name . ',Email:' . $ci->email . ',Teléfono:' . $ci->phone }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0 ">
                        <?php $wi = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo']; ?>
                        <label for="">Seleccione día de la semana</label>
                        <select class="form-control" name="day" id="day">
                            <option value="">Selecione día</option>
                            @for ($i = 0; $i < sizeof($wi); $i++)
                                <option value="{{ $wi[$i] }}">
                                    {{ $wi[$i] }}
                                </option>
                            @endfor
                        </select>

                    </div>
                    <hr>
                </div>
                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary btn-block shadow-sm"
                    id="registeredTask">
                    <i class="fas fa-user"></i> &nbsp; &nbsp; Registrar Taréa Para el Ciudadano
                </button>

              @include('sections.dashboard.js_register_task')

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" onclick="window.location.reload()">Cerrar</button>
            </div>
        </div>
    </div>
</div>
