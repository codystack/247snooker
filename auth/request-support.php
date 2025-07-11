<?php
$page = "Support";
include "./components/header.php";
include_once ('auth/support.php');
?>


    <div class="pt-5 pb-5">
        <div class="container">
            <?php include "./components/userinfo.php"; ?>
            <!-- Content -->

            <div class="row mt-0 mt-md-4">
                <?php include "./components/navbar.php"; ?>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header d-lg-flex align-items-center justify-content-between">
                                <div class="mb-3 mb-lg-0">
                                    <h3 class="mb-0">Support Request</h3>
                                    <span>Please send support request below.</span>
                                </div>
                                <div>
                                    <button onclick="goBack()" class="btn btn-outline-primary btn-sm"><i class="bi bi-arrow-left"></i> Go Back</button>
                                </div>
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
                                <div class="mt-1">
                                    <form class="row" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

                                        <div class="row">
                                            <div class="mb-3 col-lg-6" style="display: none;">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="inputstaffID">User ID</label>
                                                    <input type="text" name="userID" class="form-control" value="<?php echo $_SESSION['id']; ?>" readonly />
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-6" style="display: none;">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="inputfirstName">First Name</label>
                                                    <input type="text" name="firstName" class="form-control" value="<?php echo $_SESSION['firstName']; ?>" readonly />
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-6" style="display: none;">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="inputlastName">Last Name</label>
                                                    <input type="text" name="lastName" class="form-control" value="<?php echo $_SESSION['lastName']; ?>" readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="input-purpose">Purpose</label>
                                                <select class="form-control" name="purpose" required id="purpose">
                                                    <option data-display="Select Purpose">Select Purpose</option>
                                                    <option value="Enquiries">Enquiries</option>
                                                    <option value="Complains">Complains</option>
                                                    <option value="Support">Support</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-12 col-md-12">
                                            <label class="form-label" for="comment">Request</label>
                                            <textarea type="text" name="comment" class="form-control" rows="7" placeholder="How can we help you?"></textarea>
                                        </div>

                                        <div class="col-12 text-center mt-2 mb-1">
                                            <!-- Button -->
                                            <button class="btn btn-primary" type="submit" name="support_request_btn">
                                                Send Request
                                            </button>
                                            <button class="btn btn-dark" onclick="goBack()">
                                                Cancel
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->


<?php include "./components/footer.php"; ?>