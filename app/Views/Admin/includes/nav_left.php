<nav id="sidebar">
    <div class="sidebar-header text-center">
        <a href="<?php echo APPURL . '/admin'; ?>">
            <img src="<?php echo APPURL; ?>/public/img/logo2.png" height="80" alt="NADEMI Logo">
        </a>
        <h5 class="mt-3 mb-1"><strong><?php echo SITE_NAME; ?></strong></h5>
        <hr class="my-0 bg-light w-50">
        <h4 class="mt-1">Administration</h4>
    </div>
    <!-- SIDEBAR Navigation LINKS -->
    <ul class="list-unstyled components">
        <li class="<?php activePage('/admin'); ?>">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-home"></i> Dashboard</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
            </ul>
        </li>
        <li class="<?php activePage('/admin/categories'); ?>"><a href="<?php echo APPURL . '/admin/categories'; ?>" id="categories"><i class="fas fa-tasks"></i> Categories</a></li>
        <li class="<?php activePage('/admin/projects'); ?>"><a href="<?php echo APPURL . '/admin/projects'; ?>" id="pages"><i class="fas fa-archive"></i> Projects</a></li>
        <li class="<?php activePage('/admin/users'); ?>"><a href="<?php echo APPURL . '/admin/users'; ?>" id="users"><i class="fas fa-id-card-alt"></i> Users</a></li>
        <li class="<?php activePage('/admin/demo'); ?>"><a href="<?php echo APPURL . '/admin/demo'; ?>" id="test"><i class="fas fa-laptop-code"></i> Demo</a></li>
    </ul>
    <div class="author mx-auto">
        <div class="card bg-info mx-2 mb-2">
            <div class="card-body">
                <h5 class="card-title mb-1"><?php echo $_SESSION['userName']; ?></h5>
                <hr class="bg-light mb-3 mt-2">
                <p class="card-text text-light"><?php echo $_SESSION['userEmail']; ?></p>
                <p class="card-text text-muted">
                    <!-- Show the last user visit -->
                    <?php
                    if (isset($_SESSION['last_login'])) {
                        echo '<small><strong>Last login:</strong> ' . date('d/m/Y H:i:s', $_SESSION['last_login']) . '</small>';
                    } else {
                        echo '<small>Welcome back</small>';
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
    <ul class="list-unstyled CTAs">
        <li>
            <a href="<?php echo APPURL; ?>" class="article"><i class="far fa-arrow-alt-circle-left fa-lg"></i> Back to <?php echo SITE_NAME; ?></a>
        </li>
        <li>
            <a href="<?php echo APPURL . '/admin/logout'; ?>" class="logout"><i class="fas fa-door-open"></i> Logout</a>
        </li>
    </ul>
</nav>