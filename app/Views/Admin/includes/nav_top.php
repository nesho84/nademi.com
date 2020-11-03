<nav class="navbar sticky-top navbar-expand-xl navbar-light">
    <div class="container-fluid">
        <!-- Main SideBar Button left -->
        <button type="button" id="mainSidebarBtn" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Sidebar</span>
        </button>
        <!-- Main SideBar Logo on mobile -->
        <a class="navbar-brand" id="adminMobileLogo" href="<?php echo APPURL; ?>/admin">
            <img src="<?php echo APPURL; ?>/public/img/logo2.png" height="50" alt="NADEMI Logo">
            <span class="align-middle text-secondary mx-auto">Dashboard</span>
        </a>
        <!-- Second Nav Button right -->
        <button class="btn btn-info d-inline-block d-xl-none ml-auto" type="button" data-toggle="collapse" data-target="#rightSidebarNav" aria-controls="rightSidebarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
        <!-- RIGHT SIDEBAR Navigation LINKS -->
        <div class="collapse navbar-collapse" id="rightSidebarNav">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item <?php activePage('/admin'); ?>">
                    <a class="nav-link" href="<?php echo APPURL . '/admin'; ?>"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li class="nav-item <?php activePage('/admin/categories'); ?>">
                    <a class="nav-link" href="<?php echo APPURL . '/admin/categories'; ?>" id="categories"><i class="fas fa-tasks"></i> Categories</a>
                </li>
                <li class="nav-item <?php activePage('/admin/projects'); ?>">
                    <a class="nav-link" href="<?php echo APPURL . '/admin/projects'; ?>" id="pages"><i class="fas fa-archive"></i> Projects</a></li>
                </li>
                <li class="nav-item <?php activePage('/admin/users'); ?>">
                    <a class="nav-link" href="<?php echo APPURL . '/admin/users'; ?>" id="users"><i class="fas fa-id-card-alt"></i> Users</a></li>
                </li>
                <li class="nav-item <?php activePage('/admin/demo'); ?>">
                    <a class="nav-link" href="<?php echo APPURL . '/admin/demo'; ?>" id="demo"><i class="fas fa-laptop-code"></i> Demo</a></li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo APPURL . '/admin/logout'; ?>"><i class="fas fa-door-open"></i> Logout</a></li>
                </li>
            </ul>
        </div>
    </div>
</nav>