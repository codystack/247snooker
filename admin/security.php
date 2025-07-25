<?php
    $page = "Profile";
    include "./components/header.php";
    include "./components/modals.php";
    require_once "./auth/password.php";
?>
    <div class="d-flex flex-column flex-lg-row h-lg-100 gap-1">
        <?php include "./components/side-nav.php"; ?>
        <div class="flex-lg-fill overflow-x-auto ps-lg-1 vstack vh-lg-100 position-relative">
            <?php include "./components/topnav.php"; ?>
            <div class="flex-fill overflow-y-lg-auto scrollbar bg-body rounded-top-4 rounded-top-start-lg-4 rounded-top-end-lg-0 border-top border-lg shadow-2">
                <main class="container-fluid px-3 py-5 p-lg-6 p-xxl-8">
                    <header class="border-bottom mb-10">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12">
                                <h3 class="ls-tight">Account Settings</h3>
                            </div>
                        </div>
                        <ul class="nav nav-tabs nav-tabs-flush gap-6 overflow-x border-0 mt-4">
                            <li class="nav-item"><a href="profile" class="nav-link">General</a></li>
                            <li class="nav-item"><a href="security" class="nav-link active">Password</a></li>
                        </ul>
                    </header>

                    <div class="d-flex align-items-end justify-content-between">
                        <div>
                            <h4 class="fw-semibold mb-1">Password Reset</h4>
                            <p class="text-sm text-muted">By filling the form below, you will be able to change your password.</p>
                        </div>
                    </div>
                    <?php
                        if (isset($_SESSION['error_message'])) {
                            ?>
                            <div class="alert alert-danger mt-5" role="alert">
                                <div class="alert-message text-center">
                                    <?php
                                    echo $_SESSION['error_message'];
                                    ?>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['error_message']);
                        }
                    ?>
                    <?php
                        if (isset($_SESSION['success_message'])) {
                            ?>
                            <div class="alert alert-success mt-5" role="alert">
                                <div class="alert-message text-center">
                                    <?php echo $_SESSION['success_message']; ?>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['success_message']);
                        }
                    ?>
                    <hr class="my-6">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="vstack gap-5">
                            <div class="row align-items-center g-3">
                                <div class="col-md-2">
                                    <label class="form-label mb-0">Current password</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <input type="password" class="form-control" required id="currentpassword" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center g-3">
                                <div class="col-md-2">
                                    <label class="form-label mb-0">New password</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <input type="password" class="form-control" required id="newpassword" name="newPassword">
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center g-3">
                                <div class="col-md-2">
                                    <label class="form-label mb-0">Confirm password</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <input type="password" class="form-control" required name="confirmpassword" id="confirmpassword">
                                    </div>
                                </div>
                                <span id="message"></span>
                            </div>
                        </div>
                        <div class="row justify-content-end g-3 mb-6">
                            <div class="col-md-6">
                                <button type="submit" name="password_change_btn" class="button btn btn-lg btn-dark" onclick="this.classList.toggle('button--loading')">
                                    <span class="button__text">Update Password</span>
                                </button>
                            </div>
                        </div>
                        <hr class="my-6 ">
                    </form>
                </main>
            </div>
        </div>
    </div>

<?php include "./components/footer.php"; ?>