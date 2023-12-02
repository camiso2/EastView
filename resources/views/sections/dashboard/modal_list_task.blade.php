<!-- Logout Modal-->
<div class="modal fade" id="listTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" 
data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b><i class="fas fa-project-diagram"></i> &nbsp; &nbsp;
                        LISTA DE ASIGNACIONES</b></h5>
                <button class="close" type="button" onclick="window.location.reload()" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Topbar Search -->
                <div class="form-group row" style="margin: 10px;">
                    <div class="col-sm-5 mb-3 mb-sm-0 ">
                        <?php $wi = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo']; ?>
                        <label for=""><b>Buscar :: Seleccione día de la semana</b></label>
                        <select class="form-control" name="searchTask" id="searchTask" value="">
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
                <div class="output"></div>
                @include('sections.dashboard.js_delete_task')
                <div id="status_list_task"></div>
                <br>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" onclick="window.location.reload()">Cerrar</button>
            </div>
        </div>
    </div>
</div>
