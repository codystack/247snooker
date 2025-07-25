<?php
$page = "Wallet";
include "./config/db.php";
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
                <div class="card border-0" id="invoice">
                    <?php
                        $id = $_GET['id'];
                            $select_query = "SELECT * FROM transactions WHERE id ='$id'";
                            $result = mysqli_query($conn, $select_query);
                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $transactionRef = $row['transactionRef'];
                                $firstName = $row['firstName'];
                                $lastName = $row['lastName'];
                                $paidAmount = $row['paidAmount'];
                                $transactionDate = $row['transactionDate'];
                                $paymentMethod = $row['paymentMethod'];
                                $status = $row['status'];
                                $invoiceID = $row['invoiceID'];
                                $date = strtotime($transactionDate);
                                switch ($status) {
                                    case "failed";
                                        $class  = 'bg-danger';
                                        $text  = 'text-danger';
                                        break;
                                    case "success";
                                        $class  = 'bg-success';
                                        $text  = 'text-success';
                                        break;
                                    case "pending";
                                        $class  = 'bg-warning';
                                        $text  = 'text-warning';
                                        break;
                                    default:
                                        $class  = '';
                                }
                    ?>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-6">
                            <div>
                                <!-- Img -->
                                <img src="./assets/images/weblogo.svg" alt="" class="mb-4 avatar-xxl">
                            </div>
                            <div>
                                <a href="#" class="print-link no-print"><i class="fe fe-printer"></i></a>
                            </div>
                        </div>
                        
                        <div class="text-center mb-5">
                            <div class="mb-3">
                                <img alt="" src="./assets/images/svg/bill.svg" class="img-responsive" width="80" height="80">
                            </div>
                            <h4 class="mb-n3">Transaction Reference</h4>
                            <div class="d-flex justify-content-center mt-4">
                                <div>
                                    <img src="./assets/images/barcode.png">
                                </div>
                                &nbsp;
                                <div style="margin-top: 2px;">
                                    <span><?php echo $transactionRef; ?></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-3 col-md-3 col-4 mx-auto d-flex justify-content-center mt-3 bg-light-primary px-1 py-2 wallet-border">
                                <div>
                                    <span class="fs-6">PAYMENT STATUS:</span>
                                </div>
                                &nbsp;
                                <div style="">
                                    <span class='badge badge-dot <?php echo $class; ?>'></span><span class='<?php echo $text; ?> text-capitalize'> <?php echo $status; ?> </span>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <p class="mb-0 mt-3"><b>Thank you for your payment!</b></p>
                                <p class="mb-0">A successful payment was made for Wallet Topup.<br>See purchase details below.</p>
                            </div>
                        </div>
                        
                        <hr />
                        <div class="container">
                            <div class="row mt-4 mb-3">
                                <div class="col-md-8 col-lg-6 col-12">
                                    <span class="fs-6">INVOICE FROM</span>
                                    <h5>24/7 Snooker SpotBall</h5>
                                </div>

                                <div class="col-md-4 col-lg-6 col-12 text-right">
                                    <div class="text-end">
                                        <span class="fs-6 text-end">INVOICE TO</span>
                                        <h5><?php echo $firstName; ?> <?php echo $lastName; ?></h5>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-8 col-lg-6">
                                    <span class="fs-6">INVOICED ID</span>
                                    <h6><?php echo $invoiceID; ?></h6>
                                </div>
                                <div class="col-md-4 col-lg-6 text-right">
                                    <div class="text-end">
                                        <span class="fs-6">PAYMENT DATE</span>
                                        <h6><?php echo date('j F Y', $date); ?> </h6>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6 col-lg-6 col-12">
                                    <span class="fs-6">PAID AMOUNT</span>
                                    <h5>₦<?php echo number_format($paidAmount, 2, '.', ','); ?></h5>
                                </div>

                                <div class="col-md-6 col-lg-6 col-12 text-right">
                                    <div class="text-end">
                                        <span class="fs-6 text-end">MODE OF PAYMENT</span>
                                        <h5 class="text-capitalize"><?php echo $paymentMethod; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <h4 class="mb-0">Need help? Got questions to ask?</h4>
                            <span>Contact us our support team via: <a href="mailto:support@247snooker.com.ng">support@247snooker.com.ng</a></span>
                        </div>
                        <div class="row mt-4 no-print">
                            <div class="text-center mx-auto">
                                <button class="btn btn-primary" id="cmd"><i class="bi bi-download"></i> Download Invoice </button>             
                                <button class="btn btn-dark" onclick="goBack()"><i class="bi bi-arrow-left"></i> Go back</button>
                            </div>
                        </div>
                        <hr />
                        <p class="mt-5 mb-0 text-center">Notes: Invoice was created on a computer and is valid
                            without the signature and seal.</p>
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
<!-- Footer -->


<?php include "./components/footer.php"; ?>