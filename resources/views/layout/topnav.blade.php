<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav d-flex w-100 justify-content-between">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item dropdown mr-0">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user mr-2"></i>
                <i>{{ $users['name'] }}</i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><a href="{{ route('admin.logout') }}"> <button
                            class="btn btn-secondary">Sign
                            Out</button></a></span>
            </div>
        </li>
    </ul>
</nav>
