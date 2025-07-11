<meta http-equiv="refresh" content="5;url=wallet" />

<?php
if ($_GET['status'] !== "success") {
    header("location:javascript://history.go(-1)");
}

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
                        <div class=card-body>
                            <div class="mt-6 mb-6 text-center">
                                <img src="./assets/images/svg/check.svg" alt="payment successful" width="150px">
                                <h3 class="mt-3 mb-3">Payment Successful</h3>
                                <a href="wallet" class="text-primary mt-4"><i class="bi bi-arrow-left-circle-fill"></i> Go back to transactions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->


<?php include "./components/footer.php"; ?>