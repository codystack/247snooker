<?php
$page = "Fund Wallet";
include "./components/header.php";
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
								<h3 class="mb-0">Fund Wallet</h3>
								<span>Fund your wallet to enable you bet and pay for subscription.</span>
							</div>
							<!-- Nav -->
                            <div class="nav btn-group flex-nowrap" role="tablist">
                                <button onclick="goBack()" class="btn btn-outline-primary btn-sm"><i class="bi bi-arrow-left"></i> Go Back</button>
                            </div>
						</div>
					</div>
					<!-- Tab content -->
					<div class="tab-content">
						<div class="tab-pane fade show active pb-4" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                            <div class="card">
                                <div class="card-body mt-5 mb-5 text-center mx-auto">
                                    <div class="col-lg-12 col-md-8 col-12">
                                        <div class="mb-3">
                                            <h2 class="mb-0">Debit/Credit Card</h2>
                                            <p>Fund your wallet via debit or credit card</p>
                                        </div>
                                        
                                        <form id="paymentForm">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="userID" placeholder="name@example.com" value="<?php echo $_SESSION['id']; ?>" disabled hidden />
                                                <!-- <label for="email">Email Address</label> -->
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="email-address" placeholder="name@example.com" value="<?php echo $_SESSION['email']; ?>" disabled hidden/>
                                                <!-- <label for="email">Email Address</label> -->
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="first-name" placeholder="John" value="<?php echo $_SESSION['firstName']; ?>" disabled hidden />
                                                <!-- <label for="first-name">First Name</label> -->
                                            </div>
                                            <div class="form-floating mb-3" style="display: hidden">
                                                <input type="text" class="form-control" id="last-name" placeholder="Doe" value="<?php echo $_SESSION['lastName']; ?>" disabled hidden />
                                                <!-- <label for="last-name">Last Name</label> -->
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">₦</span>
                                                <input type="number" class="form-control" id="amount" placeholder="1000" aria-label="amount" aria-describedby="amount-button">
                                                <button class="btn btn-primary" type="submit" onclick="payWithPaystack()">Fund Wallet</button>
                                            </div>
                                        </form>

                                        <div class="mt-5">
                                            <img src="./assets/images/SBP_Tag_-_Payment_Channels_-_NG.png" alt="secured by paystack" width="300px">
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