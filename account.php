<?php
include 'components/adminheader.php';
require_once 'auth/profile.php';
?>

    <div class="offcanvas-wrap">

        <section class="py-8 bg-light">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-8 mx-auto">
                        <div class="card overflow-hidden bg-primary mb-5">
                            <div class="card-body inverted level-3">
                                <div class="row mb-5">
                                    <div class="col-lg-10">
                                        <span class="text-white eyebrow mb-1" id="greet"></span>
                                        <h2>Hello, <?php echo $_SESSION['firstName']; ?>!</h2>
                                    </div>
                                </div>
                            </div>
                            <img class="position-absolute top-100 start-100 translate-middle"
                            src="assets/images/svg/pattern.svg" alt="Image">
                        </div>

                        <section>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card bg-opaque-white">
                                        <div class="card-header">
                                            <div class="row g-2 g-xl-5 align-items-center">
                                                <div class="col-md-6">
                                                    <a href="dashboard" class="btn btn-with-icon btn-black">
                                                        <i class="bi bi-arrow-left"></i> Go Back
                                                    </a>
                                                </div>
                                                <div class="col-md-6 text-md-end">
                                                    <h3 class="fs-6">My Account</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body bg-white">
                                            <?php
                                                if (isset($_SESSION['error_message'])) {
                                                    ?>
                                                    <div class="alert alert-danger" role="alert">
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
                                                    <div class="alert alert-success" role="alert">
                                                        <div class="alert-message text-center">
                                                            <?php echo $_SESSION['success_message']; ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    unset($_SESSION['success_message']);
                                                }
                                            ?>
                                            <form class="row g-2 g-lg-3" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                                <div class="col-md-12" style="display: none;">
                                                    <label for="first_name" class="form-label">User ID</label>
                                                    <input type="text" class="form-control" required value="<?php echo $_SESSION['id']; ?>">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" required name="firstName" value="<?php echo $_SESSION['firstName']; ?>">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input type="text" name="newPassword" required class="form-control" name="lastName" value="<?php echo $_SESSION['lastName']; ?>">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" required name="email" value="<?php echo $_SESSION['email']; ?>">
                                                </div>
                                                <div class="d-grid mb-2">
                                                    <button class="btn btn-black" name="update_profile_btn" type="submit">Update my info</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </section>

    </div>


    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/index.js"></script>

</body>

</html>