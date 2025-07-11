<div class="row">
    <div class="col-lg-4 col-md-12 col-12">
        <!-- Card -->
        <div class="card mb-4">
            <!-- Card body -->
            <div class="p-3">
                <div class="d-flex mb-2">
                    <span class="icon-shape icon-lg bg-light-primary me-2 text-dark-primary rounded-3">
                        <i class="bi bi-wallet2"></i>
                    </span>
                    <?php
                        $select_query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."'";
                        $result = mysqli_query($conn, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $wallet = $row['wallet'];
                    ?>
                    <h2 class="h3 fw-bold mb-0 mt-3 lh-1">₦<?php echo number_format($wallet, 2, '.', ','); ?></h2>
                    <?php }
                    }
                        ?>
                </div>
                <p>Wallet Balance</p>
                <div class="progress bg-light-primary" style="height: 2px">
                    <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12">
        <!-- Card -->
        <div class="card mb-4">
            <!-- Card body -->
            <div class="p-3">
                <div class="d-flex mb-2">
                    <span class="icon-shape icon-lg bg-light-success me-2 text-dark-success rounded-3">
                        <i class="bi bi-cash-stack"></i>
                    </span>
                    <?php
                        $select_query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."'";
                        $result = mysqli_query($conn, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $bonus = $row['bonus'];
                    ?>
                    <h2 class="h3 fw-bold mb-0 mt-3 lh-1">₦<?php echo number_format($bonus, 2, '.', ','); ?></h2>
                    <?php }
                    }
                        ?>
                </div>
                <p>Earning</p>
                <div class="progress bg-light-success" style="height: 2px">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12">
        <!-- Card -->
        <div class="card mb-4">
            <!-- Card body -->
            <div class="p-3">
                <div class="d-flex mb-2">
                    <span class="icon-shape icon-lg bg-light-danger me-2 text-dark-danger rounded-3">
                        <i class="bi bi-receipt"></i>
                    </span>
                    <?php
                    $id = $_SESSION['id'];
                    $countVouchers = mysqli_query($conn, "SELECT users.id, vouchers.id, vouchers.userID FROM vouchers INNER JOIN users ON vouchers.userID=users.id WHERE users.id = '$id'");

                    echo "<h2 class=\"h3 fw-bold mb-0 mt-3 lh-1\">" .number_format(mysqli_num_rows($countVouchers), 0, '.', ','). "</h2>";
                    ?>
                </div>
                <p>Total Subscription</p>
                <div class="progress bg-light-danger" style="height: 2px">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-3 col-md-12 col-12">
        <div class="card mb-4">
          
            <div class="p-3">
                <div class="d-flex mb-2">
                    <span class="icon-shape icon-lg bg-light-warning me-2 text-dark-warning rounded-3">
                        <i class="fe fe-send"></i>
                    </span>
                    <?php
                    $id = $_SESSION['id'];
                    $countTransactions = mysqli_query($conn, "SELECT users.id, transactions.id, transactions.userID FROM transactions INNER JOIN users ON transactions.userID=users.id WHERE users.id = '$id'");

                    echo "<h2 class=\"h3 fw-bold mb-0 mt-3 lh-1\">" .number_format(mysqli_num_rows($countTransactions), 0, '.', ','). "</h2>";
                    ?>
                </div>
                <p>Total Transactions</p>
                <div class="progress bg-light-warning" style="height: 2px">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div> -->
</div>