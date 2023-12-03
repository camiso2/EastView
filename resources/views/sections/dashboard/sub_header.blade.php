 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
 </div>

 <!-- Content Row -->
 <div class="row">

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                             Ciudadanos (Registrados)</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $citizensTotal->count()}}</div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-calendar fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                             Administradores (eastView)</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->count() }}</div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total tareas Asignadas
                         </div>
                         <div class="row no-gutters align-items-center">
                             <div class="col-auto">
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> {{ $tasks->count() }} </div>
                             </div>

                         </div>
                     </div>
                     <div class="col-auto">
                         <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Pending Requests Card Example -->
     <?php $c =  \DB::table('citizens')->where('deleted_at', '!=',null)->get();?>
     <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                             Ciudadanos eliminados</div>
                         <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $c->count() }}

                             <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#listDeletedCitizens" style="width: 50%"><i class="fas fa-trash fa-sm text-white-50"></i> &nbsp; &nbsp; VER <br></a>

                         </div>

                     </div>
                     <div class="col-auto">
                         <i class="fas fa-comments fa-2x text-gray-300"></i>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>


 <!-- Logout Modal-->
 <div class="modal fade" id="listDeletedCitizens" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
     <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel"><b><i class="fas fa-project-diagram"></i> &nbsp; &nbsp;
                         LISTA DE CIUDADANOS DADOS DE BAJA</b></h5>
                 <button class="close" type="button" onclick="window.location.reload()" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 @if (count($citizensDelete) > 0)
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                             <thead style="background-color: #4e73df; color:white;">
                                 <tr>
                                     <th style="width:25%">Nombre</th>
                                     <th style="width:15%">Email</th>
                                     <th>Teléfono</th>
                                     <th><i class="fas fa-check"></i>confirm</th>
                                     <th>Baja de ciudadano</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($citizensDelete as $c)

                                 <tr id={{ "rc_".$c->id }}>
                                     <td>{{ $c->name }}</td>
                                     <td>{{ $c->email }}</td>
                                     <td>{{ $c->phone }}</td>
                                     <td>
                                         <button type="button" class="btn btn-success btn-sm">
                                             <i class="fas fa-check"></i>
                                         </button></td>
                                     <td>{{ $c->deleted_at }}</td>
                                 </tr>
                                 @endforeach
                             </tbody>
                         </table>

                     </div>
                 </div>
                 @else
                 <div class="card-body">
                     <div class="table-responsive">
                         <br><br><br><br><br><br>
                         <h5>No tiene usuarios eliminados en el sistema  ....</h5>
                     </div>
                 </div>

                 @endif
                 <div id="status_list_task"></div>
                 <br>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" onclick="window.location.reload()">Cerrar</button>
             </div>
         </div>
     </div>
 </div>
