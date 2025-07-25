<?php
$page = "Dashboard";
include "./components/header.php";
include "./components/modals.php";
?>

    <div class="d-flex flex-column flex-lg-row h-lg-100 gap-1">
        <?php include "./components/side-nav.php"; ?>

        <div class="flex-lg-fill overflow-x-auto ps-lg-1 vstack vh-lg-100 position-relative">
            <?php include "./components/topnav.php"; ?>
            <div class="flex-fill overflow-y-lg-auto scrollbar bg-body rounded-top-4 rounded-top-start-lg-4 rounded-top-end-lg-0 border-top border-lg shadow-2">
                <main class="container-fluid px-3 py-5 p-lg-6 p-xxl-8">
                    <div class="mb-6 mb-xl-10">
                        <div class="row align-items-center">
                            <div class="container">
                                <h3 class="ls-tight">Hey, <?php echo $_SESSION['firstName']; ?></h3>
                                <h5 class="text-dark mt-0 lead" id="greet"></h5>
                            </div>
                            <div class="d-flex">
                                <h2 class="ls-tight"></h2>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row g-3 g-xxl-6">
                        <div class="col-xxl-12">
                            <div class="vstack gap-3 gap-md-6">
                                <div class="row row-cols-xl-4 g-3 g-xl-6">
                                    <div class="col">
                                        <div class="card border-primary-hover">
                                            <div class="card-body p-4">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="icon icon-shape w-rem-15 h-rem-15 bg-danger bg-opacity-25 text-danger" style="font-size: 1.3rem;"><i class="bi bi-receipt-cutoff"></i></div>
                                                    <h5 class="stretched-link">Subscription</h5>
                                                </div>
                                                <?php
                                                    $countSubsciption = mysqli_query($conn, "SELECT id FROM vouchers");
                                                    echo "<div class='text-2xl text-heading ls-tight mt-3 ms-1'>".number_format(mysqli_num_rows($countSubsciption), 0, '.', ',')."</div>"
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card border-primary-hover">
                                            <div class="card-body p-4">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="icon icon-shape w-rem-15 h-rem-15 bg-success bg-opacity-25 text-success" style="font-size: 1.3rem;"><i class="bi bi-cash-stack"></i></div>
                                                    <h5 class="stretched-link">Transaction</h5>
                                                </div>
                                                <?php
                                                    $countTransaction = mysqli_query($conn, "SELECT id FROM transactions");
                                                    echo "<div class='text-2xl text-heading ls-tight mt-3 ms-1'>".number_format(mysqli_num_rows($countTransaction), 0, '.', ',')."</div>"
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card border-primary-hover">
                                            <div class="card-body p-4">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="icon icon-shape w-rem-15 h-rem-15 bg-primary bg-opacity-25 text-primary" style="font-size: 1.3rem;"><i class="bi bi-bank2"></i></div>
                                                    <h5 class="stretched-link">Withdrawal</h5>
                                                </div>
                                                <?php
                                                    $countWithdrawal = mysqli_query($conn, "SELECT id FROM withdrawal");
                                                    echo "<div class='text-2xl text-heading ls-tight mt-3 ms-1'>".number_format(mysqli_num_rows($countWithdrawal), 0, '.', ',')."</div>"
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card border-primary-hover">
                                            <div class="card-body p-4">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="icon icon-shape w-rem-15 h-rem-15 bg-secondary bg-opacity-25 text-secondary" style="font-size: 1.3rem;"><i class="bi bi-people"></i></div>
                                                    <h5 class="stretched-link">Users</h5>
                                                </div>
                                                <?php
                                                    $countUsers = mysqli_query($conn, "SELECT id FROM users");
                                                    echo "<div class='text-2xl text-heading ls-tight mt-3 ms-1'>".number_format(mysqli_num_rows($countUsers), 0, '.', ',')."</div>"
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>


                        <div class="col-xxl-12">
                            <div class="vstack gap-3 gap-md-6">
                                <div class="row g-3 g-xl-6">
                                    <div class="col-xl-7">
                                        <div class="card">
                                            <div class="card-body pb-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h5>Recent Support</h5>
                                                    </div>
                                                    <div class="hstack align-items-center">
                                                        <a href="support" class="text-muted">View all <i class="bi bi-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <?php
                                                $support_id = 1;
                                                $select_query = "SELECT * FROM support ORDER BY requestDate ASC LIMIT 6";
                                                $result = mysqli_query($conn, $select_query);
                                                if (mysqli_num_rows($result) > 0) {
                                                    // output data of each row
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $id = $row['id'];
                                                        $firstName = $row['firstName'];
                                                        $lastName = $row['lastName'];
                                                        $status = $row['status'];
                                                        $comment = $row['comment'];
                                                        $commentlength=25; // Define how many character you want to display.
                                                        $comment = substr($comment, 0, $commentlength);
                                                        $requestDate = $row['requestDate'];
                                                        $date = strtotime($requestDate);
                                                        switch ($status) {
                                                            case "Closed";
                                                                $class  = 'bg-danger';
                                                                $text = 'text-danger';
                                                                break;
                                                            case "Open";
                                                                $class  = 'bg-success';
                                                                $text = 'text-success';
                                                                break;
                                                            default:
                                                                $class  = '';
                                                        }
                                                ?>
                                                <div class="list-group list-group-flush">
                                                    <div class="list-group-item d-flex align-items-center justify-content-between gap-6">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="icon icon-shape rounded-circle icon-sm flex-none w-rem-10 h-rem-10 text-sm bg-danger bg-opacity-25 text-danger">
                                                                <i class="bi bi-headset"></i>
                                                            </div>
                                                            <div class="">
                                                                <span class="d-block text-heading text-sm fw-semibold"><?php echo $firstName; ?></span>
                                                                <span class="d-none d-sm-block text-muted text-xs"><?php echo date('j F Y', $date); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="d-none d-md-block text-sm"><?php echo $comment; ?>...</div>
                                                        <div class="d-none d-md-block">
                                                            <span class="badge <? echo $class; ?> bg-opacity-25 text-xs <? echo $text; ?>"><?php echo $status; ?></span>
                                                        </div>
                                                        <div class="text-end">
                                                            <a href="view-support?id=<?php echo $id; ?>" class='btn btn-dark btn-sm'><i class="bi bi-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                        $support_id++;
                                                    }
                                                }else {
                                                   echo
                                                   "<div class='text-center mb-5 pb-5 mt-4'>
                                                    <img src='./assets/img/empty.png' width='120'>
                                                    <p class='lead'>No Enquiries Yet!</p>
                                                   </div>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-5">
                                        <div class="card">
                                            <div class="card-body pb-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h5>Withdrawal Request</h5>
                                                    </div>
                                                    <div class="hstack align-items-center">
                                                        <a href="withdrawal" class="text-muted">View all <i class="bi bi-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <?php
                                                $quote_id = 1;
                                                $select_query = "SELECT * FROM withdrawal ORDER BY requestDate ASC LIMIT 6";
                                                $result = mysqli_query($conn, $select_query);
                                                if (mysqli_num_rows($result) > 0) {
                                                    // output data of each row
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $id = $row['id'];
                                                        $firstName = $row['firstName'];
                                                        $lastName = $row['lastName'];
                                                        $requestlength=25; // Define how many character you want to display.
                                                        $request = substr($request, 0, $requestlength);
                                                        $requestDate = $row['requestDate'];
                                                        $date = strtotime($requestDate);
                                                        switch ($status) {
                                                            case "Closed";
                                                                $class  = 'bg-danger';
                                                                $text = 'text-danger';
                                                                break;
                                                            case "Open";
                                                                $class  = 'bg-success';
                                                                $text = 'text-success';
                                                                break;
                                                            default:
                                                                $class  = '';
                                                        }
                                                ?>
                                                <div class="list-group list-group-flush">
                                                    <div class="list-group-item d-flex align-items-center justify-content-between gap-6">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="icon icon-shape rounded-circle icon-sm flex-none w-rem-10 h-rem-10 text-sm bg-primary bg-opacity-25 text-primary">
                                                                <i class="bi bi-bank2"></i>
                                                            </div>
                                                            <div class="">
                                                                <span class="d-block text-heading text-sm fw-semibold"><?php echo $firstName; ?></span>
                                                                <span class="d-none d-sm-block text-muted text-xs"><?php echo date('j F Y', $date); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <a href="view-withdrawal?id=<?php echo $id; ?>" class='btn btn-dark btn-sm'><i class="bi bi-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                        $quote_id++;
                                                    }
                                                }else {
                                                   echo
                                                   "<div class='text-center mb-5 pb-5 mt-4'>
                                                    <img src='./assets/img/empty.png' width='120'>
                                                    <p class='lead'>No Quotes Yet!</p>
                                                   </div>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

<?php include "./components/footer.php"; ?>