<?php
    $page = "Transactions";
    include "./components/header.php";
    include "./components/modals.php";
    require_once "./auth/delete.php";
    require_once "./auth/update.php";
?>
    <div class="d-flex flex-column flex-lg-row h-lg-100 gap-1">
        <?php include "./components/side-nav.php"; ?>
        <div class="flex-lg-fill overflow-x-auto ps-lg-1 vstack vh-lg-100 position-relative">
            <?php include "./components/topnav.php"; ?>
            <div class="flex-fill overflow-y-lg-auto scrollbar bg-body rounded-top-4 rounded-top-start-lg-4 rounded-top-end-lg-0 border-top border-lg shadow-2">
                <main class="container-fluid px-3 py-5 p-lg-6 p-xxl-8">

                    <div class="mb-6 mb-xl-10">
                        <div class="row g-3 align-items-center">
                            <div class="col">
                            </div>
                            <div class="col">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" onclick="goBack()" class="btn btn-sm btn-neutral d-sm-inline-flex"><span class="pe-2"><i class="bi bi-arrow-left"></i> </span><span>Go Back</span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-5">
                        <div class="col-lg-10 col-md-8 col-12 mx-auto">
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
                                                    $text = 'text-danger';
                                                    $meaning = 'Failed';
                                                    break;
                                                case "success";
                                                    $class  = 'bg-success';
                                                    $text = 'text-success';
                                                    $meaning = 'Successful';
                                                    break;
                                                case "pending";
                                                    $class  = 'bg-warning';
                                                    $text  = 'text-warning';
                                                    $meaning = 'Pending';
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
                                            <img alt="" src="./assets/img/bill.svg" class="img-responsive" width="100" height="100">
                                        </div>
                                        <h4 class="mb-n3 fw-normal">Transaction Reference</h4>
                                        <div class="d-flex justify-content-center mt-4">
                                            <div>
                                                <img src="./assets/img/barcode.png">
                                            </div>
                                            &nbsp;
                                            <div style="margin-top: 2px;">
                                                <span><?php echo $transactionRef; ?></span>
                                            </div>
                                        </div>
                                        <div class="alert alert-light col-lg-5 mx-auto d-flex justify-content-center mt-4" role="alert">
                                            <div>
                                                <span class="fs-6">PAYMENT STATUS:</span>
                                            </div>
                                            &nbsp;
                                            <div style="">
                                                <span class="badge <? echo $class; ?> bg-opacity-25 text-xs <? echo $text; ?>"><?php echo $meaning; ?></span>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <p class="mb-0 mt-3"><b>Thank you for your payment!</b></p>
                                            <p class="mb-0">A successful payment was made for Wallet Topup.<br>See purchase details below.</p>
                                        </div>
                                    </div>
                                    
                                    <hr />
                                    <div class="container mb-4">
                                        <div class="row mt-5 mb-5">
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
                                        
                                        <div class="row mb-5">
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
                                    <hr />
                                    <p class="mt-5 mb-0 text-center"><strong>Notes:</strong> Invoice was created on a computer and is valid
                                        without the signature and seal.</p>
                                </div>
                                <?php 
                                    }
                                        }
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

<?php 
include "./components/delete-modals.php";
include "./components/footer.php"; 
?>