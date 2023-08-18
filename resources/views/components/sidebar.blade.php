@php
    $route = Route::current()->getName();
@endphp
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Todo App</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ in_array($route, ['todos', 'add', 'edit']) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-home"></i>
            <span>Todos</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ in_array($route, ['todos', 'add']) ? 'show' : '' }}"
            aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ $route == 'todos' ? 'active' : '' }}" href="{{ route('todos') }}">All
                    Todos</a>
                <a class="collapse-item {{ $route == 'add' ? 'active' : '' }}" href="{{ route('add') }}">Add new</a>
            </div>
        </div>
    </li>
</ul>
<!-- End of Sidebar -->
