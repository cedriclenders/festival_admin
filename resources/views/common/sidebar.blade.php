<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3">{{$festival->name}}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-info"></i>
            <span>Festival Info</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Overview
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Types:</h6>
                <a class="collapse-item" href="/users-list">Users</a>
                <a class="collapse-item" href="/admins-list">Admins</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/stages">
            <i class="fas fa-fw fa-map-marker-alt"></i>
            <span>Stages</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/performances">
            <i class="fas fa-fw fa-music"></i>
            <span>Performances</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/faqs">
            <i class="fas fa-fw fa-question-circle"></i>
            <span>FAQs</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/genres">
            <i class="fas fa-fw fa-compact-disc"></i>
            <span>Genres</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>