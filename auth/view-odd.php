<?php
$page = "Bet";
include "./components/header.php";
require_once "./auth/query.php";
?>


    <div class="pt-5 pb-5">
        <div class="container">
            <?php include "./components/userinfo.php"; ?>
            <!-- Content -->

            <div class="row mt-0 mt-md-4">
                <?php include "./components/navbar.php"; ?>
                <div class="col-lg-9 col-md-8 col-12">
					<?php

                        $id = $_GET['id'];
                                    
                        $select_query = "SELECT * FROM contestant WHERE id ='$id'";
                        $result = mysqli_query($conn, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $fullName = $row['fullName'];
                                $odd = $row['odd'];
                                $picture = $row['picture'];
                                $status = $row['status'];
                                switch ($status) {
                                    case "0";
                                        $class  = 'bg-danger';
                                        $text  = 'text-danger';
                                        $meaning = 'Inactive';
                                        break;
                                    case "1";
                                        $class  = 'bg-success';
                                        $text  = 'text-success';
                                        $meaning = 'Active';
                                        break;
                                    default:
                                        $class  = '';
                                }
                            }
                        }

                        $odds = $odd;
                        $walletBalance = $wallet;
                    ?>
					<div class="card mb-4">
						<!-- Card body -->
						<div class="p-4 d-flex justify-content-between align-items-center">
							<div>
								<h3 class="mb-0"><?php echo $fullName; ?></h3>
							</div>
                            <div class="nav btn-group flex-nowrap">
                                <button onclick="goBack()" class="btn btn-outline-dark btn-sm"><i class="bi bi-arrow-left"></i> Go Back</button>
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
                                        <div class="col-12 col-lg-12 col-sm-6 col-md-6 mb-4">
                                            <div class="">
                                                <img src="http://247snooker.com.ng/backoffice<?php echo $picture; ?>" class="avatar-xxl rounded-circle"  style="height: 13rem;width: 13rem;object-fit: cover;object-position: center;border-radius: 1rem;"/>
                                                <div class="mt-3">
                                                    <h3 class="mb-0"><?php echo $fullName; ?></h3>
                                                    <span class="text-danger">Odd: <?php echo $odd; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="betForm">
                                            <div class="col-lg-6 col-md-8 col-12 mx-auto">
                                                <input type="hidden" id="userId" name="userID" value="<?php echo $_SESSION['id']; ?>">
                                                <input type="hidden" id="contestantId" name="contestantID" value="<?php echo $id; ?>">
                                                <input type="hidden" id="oddsValue" name="odd" value="<?php echo $odds; ?>">
                                                <input type="hidden" id="walletBalance" value="<?php echo $walletBalance; ?>">

                                                <!-- BET INPUT -->
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">₦</span>
                                                    <input type="text" class="form-control" id="betAmountNaira" name="bet_amount_display" placeholder="1,000" aria-label="amount" aria-describedby="amount-button" required>
                                                    <span class="input-group-text">.00</span>
                                                </div>

                                                <!-- REAL HIDDEN VALUES TO BE SUBMITTED -->
                                                <input type="hidden" id="betAmountRaw" name="bet_amount">
                                                <input type="hidden" id="potentialWinValue" name="potential_win">

                                                <!-- DISPLAYED WIN -->
                                                <div class="mb-3">
                                                    <h4 class="mb-0">Potential Win: <span id="potentialWin">₦0.0</span></h4>
                                                </div>

                                                <div class="col-lg-8 col-md-8 col-12 mx-auto">
                                                    <div class="alert alert-danger" role="alert" id="winWarning" style="display: none;">
                                                    </div>
                                                </div>

                                                <button class="btn btn-primary" name="place_bet_btn" type="submit">Place Bet</button>
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
    <!-- Footer -->


<?php include "./components/footer.php"; ?>


<script>
    const input = document.getElementById("betAmountNaira");
    const odds = parseFloat(document.getElementById("oddsValue").value);
    const walletBalance = parseFloat(document.getElementById("walletBalance").value);
    const winDisplay = document.getElementById("potentialWin");
    const warningMsg = document.getElementById("winWarning");
    const betAmountRaw = document.getElementById("betAmountRaw");
    const potentialWinInput = document.getElementById("potentialWinValue");

    const maxWin = 1_000_000;
    const minStake = 100;

    function formatWithCommas(value) {
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function calculateWin() {
        const raw = input.value.replace(/,/g, '').replace(/[^\d]/g, '');
        const amount = parseFloat(raw) || 0;

        input.value = formatWithCommas(raw);
        betAmountRaw.value = amount;

        const potential = amount * odds;
        potentialWinInput.value = potential.toFixed(2);

        if (amount < minStake) {
            winDisplay.innerText = "₦0.00";
            warningMsg.innerHTML = `<i class="bi bi-exclamation-triangle-fill"></i> Minimum stake is ₦${formatWithCommas(minStake)}.`;
            warningMsg.style.display = "block";
            return;
        }

        if (amount > walletBalance) {
            winDisplay.innerText = "₦0.00";
            warningMsg.innerHTML = `<i class="bi bi-exclamation-triangle-fill"></i> Your stake cannot exceed your wallet balance of ₦${formatWithCommas(walletBalance)}.`;
            warningMsg.style.display = "block";
            return;
        }

        if (potential > maxWin) {
            winDisplay.innerText = "₦0.00";
            warningMsg.innerHTML = `<i class="bi bi-exclamation-triangle-fill"></i> Potential win cannot exceed ₦${formatWithCommas(maxWin)}.`;
            warningMsg.style.display = "block";
            return;
        }

        winDisplay.innerText = "₦" + formatWithCommas(potential.toFixed(2));
        warningMsg.style.display = "none";
    }

    input.addEventListener("input", calculateWin);
</script>
