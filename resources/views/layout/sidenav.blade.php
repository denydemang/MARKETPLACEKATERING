<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
        <h4>Marketplace Katering</h4>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{-- <li class="nav-header">MULTI LEVEL EXAMPLE</li> --}}
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}"
                        class="nav-link {{ $sessionRoute == 'admin.index' ? 'active' : '' }}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Profile Merchant</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.mastermenu') }}"
                        class="nav-link {{ $sessionRoute == 'admin.mastermenu' || $sessionRoute == 'admin.mastermenuedit' ? 'active' : '' }}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Master Menu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.orders') }}"
                        class="nav-link {{ $sessionRoute == 'admin.orders' ? 'active' : '' }}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Orders</p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>
