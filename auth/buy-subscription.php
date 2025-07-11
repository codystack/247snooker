<?php
$page = "Subscription";
include "./components/header.php";
require_once "./auth/voucher-query.php";
?>


    <div class="pt-5 pb-5">
        <div class="container">
            <?php include "./components/userinfo.php"; ?>
            <!-- Content -->

            <div class="row mt-0 mt-md-4">
                <?php include "./components/navbar.php"; ?>
                <div class="col-lg-9 col-md-8 col-12">
					<!-- Card -->
					<div class="card mb-4">
						<!-- Card body -->
						<div class="p-4 d-flex justify-content-between align-items-center">
							<div>
								<h3 class="mb-0">Purchase Subscription</h3>
								<span>Buy and renew subscription with ease.</span>
							</div>
                            <div class="nav btn-group flex-nowrap">
                                <button onclick="goBack()" class="btn btn-outline-dark btn-sm"><i class="bi bi-arrow-left"></i> Go Back</button>
                            </div>
						</div>
					</div>
					<!-- Tab content -->
					<div class="tab-content">
						<div class="tab-pane fade show active pb-4" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card mb-4">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img src="./assets/images/png/card5.png" class="rounded-circle avatar-xl mb-3" alt="voucher">
                                                <h4 class="mb-1">₦1,500 <br>Happy Hour Plan</h4>
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6" style="display: none">
                                                            <div class="form-group">
                                                                <label class="form-control-label">User ID</label>
                                                                <input class="form-control" type="text" name="userID" value="<?php echo $_SESSION['id'] ?>" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6" style="display: none">
                                                            <div class="form-group">
                                                                <label class="form-control-label">Amount</label>
                                                                <input class="form-control" type="text" name="amount" value="1500" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <button type=submit name="happy_hour_plan_btn" class="btn btn-sm btn-outline-dark"> Subscribe </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card mb-4">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img src="./assets/images/png/card4.png" class="rounded-circle avatar-xl mb-3" alt="voucher">
                                                <h4 class="mb-1">₦20,000<br>Classic Plan</h4>
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6" style="display: none">
                                                            <div class="form-group">
                                                                <label class="form-control-label">User ID</label>
                                                                <input class="form-control" type="text" name="userID" value="<?php echo $_SESSION['id'] ?>" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6" style="display: none">
                                                            <div class="form-group">
                                                                <label class="form-control-label">Amount</label>
                                                                <input class="form-control" type="text" name="amount" value="20000" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <button type=submit name="classic_plan_btn" class="btn btn-sm btn-outline-dark"> Subscribe </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card mb-4">
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img src="./assets/images/png/card6.png" class="rounded-circle avatar-xl mb-3" alt="voucher">
                                                <h4 class="mb-1">₦25,000<br> Premium Plan</h4>
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6" style="display: none">
                                                            <div class="form-group">
                                                                <label class="form-control-label">User ID</label>
                                                                <input class="form-control" type="text" name="userID" value="<?php echo $_SESSION['id'] ?>" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6" style="display: none">
                                                            <div class="form-group">
                                                                <label class="form-control-label">Amount</label>
                                                                <input class="form-control" type="text" name="amount" value="25000" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <button type=submit name="premium_plan_btn" class="btn btn-sm btn-outline-dark"> Subscribe </button>
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

            </div>
        </div>
    </div>
    <!-- Footer -->


<?php include "./components/footer.php"; ?>