<?php
$page = "Bank";
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
								<h3 class="mb-0">Bank Details</h3>
								<span>The is a list of all your bank account you can use to receive funds into.</span>
							</div>
						</div>
					</div>
					<!-- Tab content -->
					<div class="tab-content">
						<div class="tab-pane fade show active pb-4" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                            <div class="card">
                                <div class="card-body mt-5 mb-5 text-center">
                                    <?php
                                        if (isset($_SESSION['errors_message'])) {
                                            ?>
                                            <div class="alert alert-danger" role="alert">
                                                <div class="alert-message text-center">
                                                    <?php echo $_SESSION['error_message']; ?>
                                                </div>
                                            </div>
                                            <?php
                                            unset($_SESSION['errors_message']);
                                        }
                                    ?>

                                    <?php
                                        if (isset($_SESSION['successx_message'])) {
                                            ?>
                                            <div class="alert alert-success" role="alert">
                                                <div class="alert-message text-center">
                                                    <?php echo $_SESSION['success_message']; ?>
                                                </div>
                                            </div>
                                            <?php
                                            unset($_SESSION['successx_message']);
                                        }
                                    ?>
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-sm-6 col-md-6 text-center mb-4">
                                            <a href="add-account">
                                                <div class="bankcard">
                                                    <div class="bankcardtext">
                                                        <i class="fe fe-plus text-primary"></i>
                                                        <p class="text-primary">Add Bank Account</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                            $select_query = "SELECT users.id, banks.bankCode, banks.bankName, bankaccounts.userID, bankaccounts.bankCode, bankaccounts.accountName, bankaccounts.accountNumber FROM bankaccounts 
                                                            INNER JOIN banks ON bankaccounts.bankCode = banks.bankCode 
                                                            INNER JOIN users ON bankaccounts.userID = users.id WHERE users.id = '$id'";
                                            $result = mysqli_query($conn, $select_query);
                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                                
                                        ?>
                                        <div class="col-12 col-lg-6 col-sm-6 col-md-6 mb-4">
                                            <div class="addedbankcard">
                                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                                    <div></div>
                                                    <div class="bg-white bankcarddelete">
                                                        <a type="button">
                                                            <i class="bi bi-trash fs-3 text-primary" data-id="<?php $id; ?>" onclick="confirmDelete(this);" ></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                                <div class='drow mobile-text addedbankcardtext'>
                                                    <div class='text-center mb-4'>
                                                        <h2 class='text-white fw-bold'> <?php echo $row['accountName']; ?> </h2>
                                                    </div>
                                                    <div class='d-md-flex d-lg-flex justify-content-between mt-3'>
                                                        <div class='col-md-7 col-12 text-start'>
                                                            <p class='text-white'><?php echo $row['bankName']; ?></p>
                                                        </div>
                                                        <div class='col-md-5 col-12 text-end'>
                                                            <p class='text-white fw-bold'><?php echo $row['accountNumber']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
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