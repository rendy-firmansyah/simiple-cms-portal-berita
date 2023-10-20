<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashbord-author">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ui News<sup>*</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashbord-author') ? 'active' : '' }}">
        <a class="nav-link" href="/dashbord-author">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
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
