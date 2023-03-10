<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Clinic
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                
                <ul class="nav nav-treeview">
                    @if(Auth::user()->role_id !== 3 and Auth::user()->role_id !== 1)
                    <li class="nav-item">
                        <a href="/clinic/doctor" class="nav-link">
                            <i class="fas fa-user"></i>
                            <p>Doctor</p>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->role_id !== 2 and Auth::user()->role_id !== 1)
                    <li class="nav-item">
                        <a href="/clinic/lab" class="nav-link">
                            <i class="fas fa-user"></i>
                            <p>Lab Assistant</p>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="/clinic/reception" class="nav-link">
                            <i class="fas fa-phone"></i>
                            <p>Receptionist</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/clinic/queue" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Queues</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/clinic/labqueue" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lab Queues</p>
                        </a>
                    </li>

                </ul>
            </li>

            @if(Auth::user()->role_id == 2)

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-user"></i>
                    <p>
                    Doctor
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/clinic/doctor/list" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Patient List</p>
                    </a>
                </ul>
              </li>
              @endif
        </ul>
        
    </nav>
    
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->


