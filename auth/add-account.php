<?php
$page = "Bank";
include "./components/header.php";
include_once "./auth/bank-query.php";
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
								<h3 class="mb-0">Add bank account</h3>
								<span>Disbursed funds are paid into your bank account.</span>
							</div>
							<div class="nav btn-group flex-nowrap">
                                <button onclick="goBack()" class="btn btn-outline-primary btn-sm"><i class="bi bi-arrow-left"></i> Go Back</button>
                            </div>
						</div>
					</div>
					<!-- Tab content -->
					<div class="tab-content">
						<div class="tab-pane fade show active pb-4" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                            <div class="card">
                                <div class="card-body mt-5 mb-5">
                                    <div class="container">
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
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12 col-12 mx-auto">
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                                    <div class="form-floating mb-4">
                                                        <input type="text" class="form-control" name="userID" placeholder="GDIS47538A" value="<?php echo $_SESSION['id']; ?>" readonly hidden/>
                                                        <!-- <label for="email">Email Address</label> -->
                                                    </div>
                                                    <div class="form-floating mb-4">
                                                        <input type="text" class="form-control" name="accountName" placeholder="John Doe"/>
                                                        <label for="accountName">Account Name</label>
                                                    </div>
                                                    <div class="form-floating mb-4">
                                                        <input type="text" class="form-control" name="accountNumber" placeholder="0123456789" />
                                                        <label for="accountNumber">Account Number</label>
                                                    </div>
                                                    <div class="form-floating mb-4">
                                                        <select class="form-select" name="bankCode" id="floatingSelect" aria-label="Floating label select example">
                                                            <option disabled="disabled" value="null" selected>Select Bank</option>
                                                            <option value="044" >Access Bank Plc</option>
                                                            <option value="323">Access Money</option>
                                                            <option value="401">Aso Savings and Loans</option>
                                                            <option value="50931">Bowen Microfinance Bank</option>
                                                            <option value="317">Cellulant</option>
                                                            <option value="303">ChamsMobile</option>
                                                            <option value="023">Citi Bank</option>
                                                            <option value="551">Convenant Microfinance Bank</option>
                                                            <option value="559">Coronation Merchant Bank</option>
                                                            <option value="063">Diamond Bank Plc</option>
                                                            <option value="302">Eartholeum</option>
                                                            <option value="050">EcoBank Nigeria Plc</option>
                                                            <option value="307">EcoMobile</option>
                                                            <option value="084">Enterprise Bank</option>
                                                            <option value="306">Etranzact</option>
                                                            <option value="314">FET</option>
                                                            <option value="070">Fidelity Bank Plc</option>
                                                            <option value="318">Fidelity Mobile</option>
                                                            <option value="011">First Bank of Nigeria Plc</option>
                                                            <option value="214">First City Monument Bank</option>
                                                            <option value="948">Fortis Microfinance Bank</option>
                                                            <option value="308">FortisMobile</option>
                                                            <option value="601">FSDH</option>
                                                            <option value="315">GTMobile</option>
                                                            <option value="058">Guaranty Trust Bank</option>
                                                            <option value="324">Hedonmark</option>
                                                            <option value="030">Heritage Bank</option>
                                                            <option value="301">JAIZ Bank plc</option>
                                                            <option value="402">Jubilee Life Mortgage Bank</option>
                                                            <option value="082">Keystone Bank plc</option>
                                                            <option value="50211">Kuda Bank</option>
                                                            <option value="313">MKudi</option>
                                                            <option value="325">MoneyBox</option>
                                                            <option value="999">NIP Virtual Bank</option>
                                                            <option value="552">NPF Microfinance Bank</option>
                                                            <option value="100002">PagaTech</option>
                                                            <option value="526">Parralex</option>
                                                            <option value="329">PayAttitude Online</option>
                                                            <option value="304">Paycom</option>
                                                            <option value="076">Polaris (Skye) Bank</option>
                                                            <option value="101">Providus Bank</option>
                                                            <option value="311">ReadyCash Parkway</option>
                                                            <option value="403">SafeTrust Mortgage Bank</option>
                                                            <option value="221">Stanbic IBTC Bank</option>
                                                            <option value="304">Stanbic Mobile Money</option>
                                                            <option value="068">Standard Chartered Bank of Nigeria</option>
                                                            <option value="232">Sterling Bank</option>
                                                            <option value="326">Sterling Mobile</option>
                                                            <option value="100">SunTrust Bank</option>
                                                            <option value="328">TagPay</option>
                                                            <option value="319">Teasy Mobile</option>
                                                            <option value="523">TrustBond</option>
                                                            <option value="032">Union Bank of Nigeria Plc</option>
                                                            <option value="033">United Bank for Africa</option>
                                                            <option value="215">Unity Bank Plc</option>
                                                            <option value="566">VFD Bank</option>
                                                            <option value="566">VFD Microfinance Bank Limited</option>
                                                            <option value="320">VTNetworks</option>
                                                            <option value="035">Wema Bank Plc</option>
                                                            <option value="057">Zenith Bank Plc</option>
                                                            <option value="322">ZenithMobile</option>
                                                        </select>
                                                        <label for="floatingSelect">Bank Name</label>
                                                    </div>
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-primary" type="submit" name="add-account-btn">Add Bank Account</button>
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