<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('home')}}" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">admin</span>
    </a>

    <!-- this is Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                
            </div>
           
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->


       <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            scolarité
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <!-- here you can create more links like i did -->
                            <a href="{{route('annee.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gérer années</p>
                            </a>
                            <a href="{{route('classe.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Gérer classes</p>
                            </a>

                           
                            <a href="{{route('matiere.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Gérer matières</p>
                            </a>
                        </li>
                  </ul>
                  </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Personne
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <!-- here you can create more links like i did -->
                            <a href="{{route('view.profs')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Gérer Profs</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('view.Parent')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Gérer parents</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('eleve.Student')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Gérer élèves</p>
                            </a>
                        </li>
                       

                    </ul>
                </li>
              
                   <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Seances
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <!-- here you can create more links like i did -->
                            <a href="{{route('seance.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Gérer seances</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('temps.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Emploi de temps</p>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                         Gérer Absences
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <!-- here you can create more links like i did -->
                            <a href="{{route('profsabsents')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profs</p>
                            </a>
                          
                        </li>
                     </ul>
                    </li>
                 <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                         Examen
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{route('examen.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Gérer les examens</p>
                            </a>
                        </li>

                        <li class="nav-item">
                        <a href="{{route('note.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Gérer les notes</p>
                            </a>
                        </li>
                        
                 
                        <li class="nav-item">
                            <a href="{{route('note.affiche')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p> listes des notes</p>
                            </a>
                        </li>
                    </ul>
                </li>

                        </li>

                    </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

   