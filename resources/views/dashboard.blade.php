@extends('root.dashboard')
@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('sections.dashboard.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('sections.dashboard.header')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @include('sections.dashboard.sub_header')

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                        href="#" data-toggle="modal" data-target="#registerUser"><i
                                            class="fas fa-users fa-sm text-white-50"></i> REGISTRAR CIUDADANOS</a>
                                    @include('sections.dashboard.modal_register')
                                    

                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                @if (count($citizens) > 0)
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead style="background-color: #4e73df; color:white;">
                                                    <tr>
                                                        <th style="width:25%">Nombre</th>
                                                        <th style="width:15%">Email</th>
                                                        <th>Teléfono</th>
                                                        <th><i class="fas fa-edit"></i>editar</th>
                                                        <th><i class="fas fa-trash"></i>eliminar</th>
                                                        <th>creación</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($citizens as $c)

                                                        <tr id={{ "rc_".$c->id }}>
                                                            <td>{{ $c->name }}</td>
                                                            <td>{{ $c->email }}</td>
                                                            <td>{{ $c->phone }}</td>
                                                            <td>
                                                                <button 
                                                                type="button" 
                                                                class="btn btn-success btn-sm" 
                                                                data-toggle="modal" 
                                                                data-target="#editCitizen"
                                                                data-id="{{ $c->id }}"
                                                                data-name="{{ $c->name }}"
                                                                data-phone="{{ $c->phone }}"
                                                                data-email="{{ $c->email }}"
                                                                >
                                                                    <i class="fas fa-edit"></i>
                                                                </button></td>
                                                            <td><button class="btn btn-danger btn-sm" id={{ "rc".$c->id }} onclick='deleteCitizen(this)'><i class="fas fa-trash"></i></button></td>
                                                            <td>{{ $c->created_at }}</td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>

                                            @include('sections.dashboard.js_delete_citizen')

                                        </div>
                                        {{ $citizens->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                    @include('sections.dashboard.modal_edit_citizen')
                                
                                    

                                    <script>
                                        $(document).ready(function (e) {
                                          $('#editCitizen').on('show.bs.modal', function(e) {    
                                             var id = $(e.relatedTarget).data().id;
                                             var name = $(e.relatedTarget).data().name;
                                             var email = $(e.relatedTarget).data().email;
                                             var phone = $(e.relatedTarget).data().phone;
                                             
                                              $(e.currentTarget).find('#e_id').val(id);
                                              $(e.currentTarget).find('#e_name').val(name);
                                              $(e.currentTarget).find('#e_email').val(email);
                                              $(e.currentTarget).find('#e_phone').val(phone);
                                          });
                                        });
                                        </script>
                                    
                                @else
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <br><br><br><br><br><br>
                                            <h5>No tiene usuarios registrados en el sistema ....</h5>
                                        </div>
                                    </div>

                            @endif



                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-3">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Lista de tareas asignadas
                                    ({{ $tasks->count() }})</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>

                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                @if ($tasks->count() > 0)
                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"
                                        data-toggle="modal" data-target="#listTask" style="width: 50%"><i
                                            class="fas fa-project-diagram fa-sm text-white-50"></i> &nbsp; &nbsp; VER
                                        LISTA
                                        DE TAREAS <br>(eliminar o editar)</a>
                                @else
                                    <h6>Usted no tiene ninguna tarea registrada, puede crear una lista de tareas
                                        personalida
                                        a cada usuario</h6>
                                @endif
                                @include('sections.dashboard.modal_list_task')


                                <hr>

                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                    data-toggle="modal" data-target="#registerTask" style="width: 50%"><i
                                        class="fas fa-project-diagram fa-sm text-white-50"></i> &nbsp; &nbsp; REGISTRAR
                                    TARÉA PARA <br>CIUDADANO</a>

                                @include('sections.dashboard.modal_register_task')
                            </div>
                        </div>
                    </div>
                </div>

                
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Full Stack Developer &copy;Jaiver Ocampo 2023</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesión ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Usted seleccionó "cerrar sesión" esta seguro ?.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('/logout') }}" onclick="preload()">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>
@endsection
