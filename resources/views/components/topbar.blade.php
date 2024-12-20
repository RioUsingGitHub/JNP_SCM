<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Left Side: Shipping Button -->
        <div class="sidebar-brand d-flex align-items-center">
            <a href="{{ route('shipments.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-shipping-fast"></i> Shipping
            </a>
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3 ml-3">
                <i class="fas fa-user-plus"></i> Supplier
            </a>
        </div>
        <!-- Right Side: User Profile -->
        <ul class="navbar-nav">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        Welcome, {{ auth()->user()->name }}
                    </span>
                    <i class="fas fa-user-circle fa-2x text-gray-600"></i>
                </a>
                <!-- Dropdown Menu -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
</nav>