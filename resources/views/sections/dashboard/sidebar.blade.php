<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('NAME_DASHBOARD') }} <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

   

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#registerUser">
            <i class="fas fa-user"></i>
            <span>Registrar Ciudadanos</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#registerTask">
            <i class="fas fa-fw fa-table"></i>
            <span>Registrar Taréas</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#listTask">
            <i class="fas fa-fw fa-table"></i>
            <span>Lista Taréas</span></a>
    </li>



   





    


    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Lista Herramientas
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="https://crearsoft.co/eastview/images/cs.png" alt="...">
        <p class="text-center mb-2"><strong>EastView</strong> Usted puede cerra la sesión desde aquí!</p>
        <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar sesión</a>
    </div>

</ul>
<!-- End of Sidebar -->
