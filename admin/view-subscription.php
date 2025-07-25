<?php
    $page = "Subscriptions";
    include "./components/header.php";
    include "./components/modals.php";
    require_once "./auth/delete.php";
?>
    <div class="d-flex flex-column flex-lg-row h-lg-100 gap-1">
        <?php include "./components/side-nav.php"; ?>
        <div class="flex-lg-fill overflow-x-auto ps-lg-1 vstack vh-lg-100 position-relative">
            <?php include "./components/topnav.php"; ?>
            <div class="flex-fill overflow-y-lg-auto scrollbar bg-body rounded-top-4 rounded-top-start-lg-4 rounded-top-end-lg-0 border-top border-lg shadow-2">
                <main class="container-fluid px-3 py-5 p-lg-6 p-xxl-8">
                    <?php

                        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

                        // Only proceed if ID is valid
                        if ($id > 0) {
                            $select_query = "SELECT 
                                    vouchers.id AS voucherid, 
                                    vouchers.userID, 
                                    vouchers.voucher, 
                                    vouchers.amount,
                                    vouchers.status,
                                    vouchers.transactionDate,
                                    users.id AS userid, 
                                    users.firstName, 
                                    users.lastName
                                FROM vouchers INNER JOIN users ON vouchers.userID = users.id WHERE vouchers.id = $id";

                            $result = mysqli_query($conn, $select_query);

                            if (!$result) {
                                    // Display the SQL error
                                    echo "Query error: " . mysqli_error($conn);
                                } elseif (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    $voucherid      = $row['voucherid'];
                                    $userID         = $row['userID'];
                                    $voucher        = $row['voucher'];
                                    $amount         = $row['amount'];
                                    $dateCreated    = $row['dateCreated'];
                                    $status         = $row['status'];
                                    $firstName      = $row['firstName'];
                                    $lastName       = $row['lastName'];
                                    $transactionDate = $row['transactionDate'];
                                    $date = strtotime($transactionDate);
                                    switch ($status) {
                                        case "Used";
                                            $class  = 'bg-danger';
                                            $text  = 'text-danger';
                                            $meaning = 'Expired';
                                            break;
                                        case "Active";
                                            $class  = 'bg-success';
                                            $text  = 'text-success';
                                            $meaning = 'Active';
                                            break;
                                        default:
                                            $class  = '';
                                    }
                                }
                            }
                        }
                    ?>

                    <div class="mb-6 mb-xl-10">
                        <div class="row g-3 align-items-center">
                            <div class="col">
                                <h3 class="ls-tight"><?php echo $voucher; ?> Subscription</h3>
                            </div>
                            <div class="col">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" onclick="goBack()" class="btn btn-sm btn-neutral d-sm-inline-flex"><span class="pe-2"><i class="bi bi-arrow-left"></i> </span><span>Go Back</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row align-items-center mb-10">
                        <div class="col-md-2"><label class="form-label">Subscriber</label></div>
                        <div class="col-md-8 col-xl-5">
                            <div class=""><input type="text" value="<?php echo $firstName; ?> <?php echo $lastName; ?>" class="form-control" disabled></div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-10">
                        <div class="col-md-2"><label class="form-label">Subscription Plan</label></div>
                        <div class="col-md-8 col-xl-5">
                            <div class=""><input type="text" value="<?php echo $voucher; ?>" class="form-control" disabled></div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-10">
                        <div class="col-md-2"><label class="form-label">Amount</label></div>
                        <div class="col-md-8 col-xl-5">
                            <div class=""><input type="text" value="₦<?php echo number_format($amount, 0, '.', ','); ?>" class="form-control" disabled></div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-10">
                        <div class="col-md-2"><label class="form-label">Transaction Date</label></div>
                        <div class="col-md-8 col-xl-5">
                            <div class=""><input type="text" value="<?php echo date('j F Y', $date); ?>" class="form-control" disabled></div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-10">
                        <div class="col-md-2"><label class="form-label">Status</label></div>
                        <div class="col-md-8 col-xl-5">
                            <span class="badge <? echo $class; ?> bg-opacity-25 text-xs <? echo $text; ?>"><?php echo $meaning; ?></span>
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