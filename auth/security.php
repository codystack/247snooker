<?php
$page = "Security";
include "./components/header.php";
require_once "./auth/security-query.php";
?>

<div class="pt-5 pb-5">
    <div class="container">
        <?php include "./components/userinfo.php"; ?>

        <div class="row mt-0 mt-md-4">
            <?php include "./components/navbar.php"; ?>
            <div class="col-lg-9 col-md-8 col-12">
                <!-- Card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Security</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['error_message'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-message text-center">
                                    <?php echo $_SESSION['error_message']; ?>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['error_message']);
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['success_message'])) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <div class="alert-message text-center">
                                    <?php echo $_SESSION['success_message']; ?>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['success_message']);
                        }
                        ?>
                        <div>
                            <h4 class="mb-0">Change Password</h4>
                            <p>
                                Login using the new password after successful password change.
                            </p>
                            <!-- Form -->
                            <form class="row" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <!-- Current password -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="currentpassword">Current password</label>
                                        <input id="currentpassword" type="password" name="password" class="form-control"
                                               placeholder="" required />
                                    </div>
                                    <div class="row">
                                        <!-- New password -->
                                        <div class="mb-3 password-field col-12 col-md-6">
                                            <label class="form-label" for="newpassword">New password</label>
                                            <input id="newpassword" type="password" name="newPassword" class="form-control mb-2"
                                                   placeholder="" required />
                                            <div class="row align-items-center g-0">
                                                <div class="col-6">
													<span data-bs-toggle="tooltip" data-placement="right" title="Test it by typing a password in the field below. To reach full strength, use at least 6 characters, a capital letter and a digit, e.g. 'Test01'">Password strength <i class="fas fa-question-circle ms-1"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <!-- Confirm new password -->
                                            <label class="form-label" for="confirmpassword">Confirm New Password</label>
                                            <input id="confirmpassword" type="password" name="confirmpassword" class="form-control mb-2" placeholder="" required />
                                            <div class="mt-4"><span id='message'></span></div>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <button type="submit" name="password_change_btn" class="btn btn-dark">
                                        Change Password
                                    </button>
                                    <div class="col-6"></div>
                                </div>
                                <div class="col-12 mt-4">
                                    <p class="mb-0">
                                        Can't remember your current password?
                                        <a href="password-reset">Reset your password via email</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./components/footer.php"; ?>