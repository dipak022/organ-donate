@php
    $user = Auth::guard('admin')->user();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.dashboard') }}" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if ($user->can('dashboard.admin'))
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @endif

                @php
                    $isActive = routeCheck(['admin.customer.*', 'admin.customer-trash']);
                @endphp
                {{-- Customer --}}
                <li class="nav-item {{ $isActive ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hospital-user"></i>
                        <p>
                            Customer
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.customer.index') }}"
                                class="nav-link {{ routeCheck(['admin.customer.*', 'admin.customer-trash']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer List</p>
                            </a>
                        </li>
                    </ul>
                </li>

               
                @php
                    $isActive = routeCheck(['admin.confused.*', 'admin.confused-status', 'admin.confused-trash', 'admin.confused-restore', 'admin.confused.force-delete', 'admin.confused.multi-delete']);
                @endphp
                {{-- confused --}}
                <li class="nav-item {{ $isActive ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Confused
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.confused.index') }}"
                                class="nav-link {{ routeCheck(['admin.confused.*', 'admin.confused-trash']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Confused</p>
                            </a>
                            
                        </li>
                    </ul>
                </li>


                @php
                    $isActive = routeCheck(['admin.department.*', 'admin.department-status', 'admin.department-trash', 'admin.department-restore', 'admin.department.force-delete', 'admin.department.multi-delete']);
                @endphp
                {{-- xray Rate --}}
                <li class="nav-item {{ $isActive ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Department
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.department.index') }}"
                                class="nav-link {{ routeCheck(['admin.department.*', 'admin.department-trash']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department</p>
                            </a>
                            
                        </li>
                    </ul>
                </li>


                @php
                    $isActive = routeCheck(['admin.designation.*', 'admin.designation-status', 'admin.designation-trash', 'admin.designation-restore', 'admin.designation.force-delete', 'admin.designation.multi-delete']);
                @endphp
                {{-- xray Rate --}}
                <li class="nav-item {{ $isActive ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Designation
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.designation.index') }}"
                                class="nav-link {{ routeCheck(['admin.designation.*', 'admin.designation-trash']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Designation</p>
                            </a>
                            
                        </li>
                    </ul>
                </li>


               
                @php
                    $isActive = routeCheck(['admin.doctor.*', 'admin.doctor-status', 'admin.doctor-trash', 'admin.doctor-restore', 'admin.doctor.force-delete', 'admin.doctor.multi-delete']);
                @endphp
                {{-- xray Rate --}}
                <li class="nav-item {{ $isActive ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isActive ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Doctor
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.doctor.index') }}"
                                class="nav-link {{ routeCheck(['admin.doctor.*', 'admin.doctor-trash']) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Doctor</p>
                            </a>
                            
                        </li>
                    </ul>
                </li>


                

                

                


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
