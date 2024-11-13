<div id="sidebar">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-cogs"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SCM JNP</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Inventory -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('inventories.index') }}">
                <i class="fas fa-fw fa-box"></i>
                <span>Inventory</span>
            </a>
        </li>

        <!-- Nav Item - Shipments -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('shipments.index') }}">
                <i class="fas fa-fw fa-truck"></i>
                <span>Shipments</span>
            </a>
        </li>

        <!-- Nav Item - Shipments -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('suppliers.index') }}">
                <i class="fas fa-fw fa-truck"></i>
                <span>Suppliers</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

    </ul>
</div>
