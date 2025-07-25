<nav class="flex-none navbar navbar-vertical navbar-expand-lg navbar-light bg-transparent show vh-lg-100 px-0 py-2" id="sidebar">
    <div class="container-fluid px-3 px-md-4 px-lg-6">
        <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand d-inline-block py-lg-1 mb-lg-5" href="./">
            <img src="./assets/img/LogoBlack.svg" class="logo-dark h-rem-24 h-rem-md-24 mx-auto" alt="Logo">
            <img src="./assets/img/LogoWhite.svg" class="logo-light h-rem-24 h-rem-md-24 mx-auto" alt="Logo">
        </a>
        <div class="navbar-user d-lg-none">
            <div class="dropdown">
                <a class="d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                    <div class="avatar avatar-sm text-bg-secondary rounded-circle">
                        <img src="assets/img/memoji-2.svg">
                    </div>
                    <div class="d-none d-sm-block ms-3"><span class="h6"><?php echo $_SESSION['firstName']; ?></span></div>
                    <div class="d-none d-md-block ms-md-2"><i class="bi bi-chevron-down text-muted text-xs"></i></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="dropdown-header">
                        <span class="d-block text-sm text-muted mb-1">Signed in as</span> 
                        <span class="d-block text-heading fw-semibold"><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></span>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="profile"><i class="bi bi-person me-3"></i>Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-left me-3"></i>Logout</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse overflow-x-hidden" id="sidebarCollapse">

            <ul class="navbar-nav">
                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center rounded-pill <?php if($page=='Dashboard'){echo 'active';}?>" href="dashboard">
                        <i class="bi bi-grid-1x2-fill"></i> 
                        <span>Overview</span>
                    </a>
                </li>

                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center rounded-pill <?php if($page=='Subscriptions'){echo 'active';}?>" href="subscriptions">
                        <i class="bi bi-credit-card-fill"></i> 
                        <span>Subscriptions</span> 
                    </a>
                </li>

                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center rounded-pill <?php if($page=='Transactions'){echo 'active';}?>" href="transactions">
                        <i class="bi bi-currency-exchange"></i> 
                        <span>Transactions</span> 
                    </a>
                </li>

                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center rounded-pill <?php if($page=='Withdrawals'){echo 'active';}?>" href="withdrawals">
                        <i class="bi bi-bank2"></i> 
                        <span>Withdrawals</span>
                    </a>
                </li>


                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center rounded-pill <?php if($page=='Bets'){echo 'active';}?>" href="bets">
                        <i class="bi bi-receipt-cutoff"></i> 
                        <span>Bets</span>
                    </a>
                </li>

                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center rounded-pill <?php if($page=='Contestants'){echo 'active';}?>" href="contestants">
                        <i class="bi bi-person-workspace"></i> 
                        <span>Contestants</span>
                    </a>
                </li>

                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center rounded-pill <?php if($page=='Users'){echo 'active';}?>" href="users">
                        <i class="bi bi-person-fill-check"></i> 
                        <span>Users</span>
                    </a>
                </li>

                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center rounded-pill <?php if($page=='Support'){echo 'active';}?>" href="support">
                        <i class="bi bi-headset"></i> <span>Support</span> 
                        <?php
                            $countEnquiries = mysqli_query($conn, "SELECT id FROM support WHERE status='Open'");
                            echo "<span class='badge badge-sm rounded-pill me-n2 bg-danger-subtle text-danger ms-auto'>".number_format(mysqli_num_rows($countEnquiries), 0, '.', ',')."</span>"
                        ?>
                    </a>
                </li>

            </ul>

            <hr class="navbar-divider my-5 opacity-70">

            <ul class="navbar-nav">
                <li>
                    <span class="nav-link text-xs fw-semibold text-uppercase text-muted ls-wide">Settings</span>
                </li>
                
                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center rounded-pill <?php if($page=='Admins'){echo 'active';}?>" href="admins">
                        <i class="bi bi-people-fill"></i> <span>Admins</span> 
                    </a>
                </li>

                <li class="nav-item my-1">
                    <a class="nav-link d-flex align-items-center rounded-pill <?php if($page=='Profile'){echo 'active';}?>" href="profile">
                        <i class="bi bi-person-fill"></i> <span>Profile</span> 
                    </a>
                </li>
            </ul>

            <div class="mt-auto"></div>

            <div class="card bg-dark border-0 mt-5 mb-3">
                <div class="card-body">
                    <a href="logout" class="btn btn-sm btn-danger w-100">Log Out<i class="bi bi-box-arrow-left ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</nav>