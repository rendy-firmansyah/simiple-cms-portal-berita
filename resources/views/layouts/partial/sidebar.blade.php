<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashbord-admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ui News<sup>*</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashbord-admin') ? 'active' : '' }}">
        <a class="nav-link" href="/dashbord-admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Accounts
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->is('user*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Users</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Users:</h6>
                <a class="collapse-item {{ request()->is('user/admin*') ? 'active' : '' }}" href="{{ route('user.index', ['choice' => 'admin']) }}">Admin</a>
                <a class="collapse-item {{ request()->is('user/author*') ? 'active' : '' }}" href="{{ route('user.index', ['choice' => 'author']) }}">Authors</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        News Portal
    </div>

    <!-- Nav Item - Cateories -->
    <li class="nav-item {{ request()->is('categories') ? 'active' : '' }}">
        <a class="nav-link" href="/categories">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Categories</span></a>
    </li>

    <!-- Nav Item - News content -->
    <li class="nav-item {{ request()->is('news-content') ? 'active' : '' }}">
        <a class="nav-link" href="/news-content">
            <i class="fas fa-fw fa-table"></i>
            <span>News Content</span></a>
    </li>
</ul>
<!-- End of Sidebar -->
