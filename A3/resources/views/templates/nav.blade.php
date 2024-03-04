<!DOCTYPE html>
<html>
    <body>
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">A3</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider"/>

            <!-- Heading -->
            <div class="sidebar-heading">
                Ordenes
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1"
                   aria-expanded="true" aria-controls="collapse1">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Carreras</span>
                </a>
                <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('career.index') }}">Consultar Carreras</a>
                        <a class="collapse-item" href="{{ route('career.create') }}">Crear Carreras</a>                        
                    </div>
                </div>
            </li> 

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2"
                   aria-expanded="true" aria-controls="collapse2">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Cursos</span>
                </a>
                <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('course.index') }}">Consultar Cursos</a>
                        <a class="collapse-item" href="{{ route('course.create') }}">Crear cursos</a> 
                    </div>
                </div>
            </li> 

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
                   aria-expanded="true" aria-controls="collapse3">
                    <i class="fas fa-fw fa-minus"></i>
                    <span>Ambientes</span>
                </a>
                <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('environment_type.index') }}">Tipo de ambiente</a>
                        <a class="collapse-item" href="{{ route('environment_type.create') }}">Tipo de ambiente</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider"/>

            <!-- Heading -->
            <div class="sidebar-heading">
                Actividades
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4"
                   aria-expanded="true" aria-controls="collapse4">
                    <i class="fas fa-fw fa-hammer"></i>
                    <span>Instructores</span>
                </a>
                <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('instructor.index') }}">Consultar Instructores</a>
                        <a class="collapse-item" href="{{ route('instructor.create') }}">Crear instructor</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5"
                   aria-expanded="true" aria-controls="collapse5">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Tipos de Ambientes</span>
                </a>
                <div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('learning_environment.index') }}">Consultar ambientes</a>
                        <a class="collapse-item" href="{{ route('learning_environment.create') }}">Crear ambiente</a>
                        <a class="collapse-item" href="{{ route('reports.index') }}">Reportes</a>                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider"/>

            <!-- Heading -->
            <div class="sidebar-heading">
                Ubicación
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse6"
                   aria-expanded="true" aria-controls="collapse6">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Ubicaciónes</span>
                </a>
                <div id="collapse6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('location.index') }}">Consultar ubicaciones</a>
                        <a class="collapse-item" href="{{ route('location.create') }}">Crear ubicacion</a>
                    </div>
                </div>
            </li>
                <!-- Divider -->
            <hr class="sidebar-divider"/>

            <!-- Heading -->
            <div class="sidebar-heading">
                Medio ambiente
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse7"
                       aria-expanded="true" aria-controls="collapse7">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Ambientes de programación</span>
                </a>
                    <div id="collapse7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('scheduling_environment.index') }}">Consultar ambientes</a>
                            <a class="collapse-item" href="{{ route('scheduling_environment.create') }}">Crear ambiente</a>
                            <a class="collapse-item" href="{{ route('scheduling_environment.reports') }}">Reportes</a>                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>               

        </ul>

    </body>
</html>

