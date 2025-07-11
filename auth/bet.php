<?php
$page = "Vouchers";
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
								<h3 class="mb-0">Vouchers</h3>
								<span>Buy and sell vouchers.</span>
							</div>
                            <div class="nav btn-group flex-nowrap" role="tablist">
                                <a href="buy-voucher" class="btn btn-outline-primary btn-sm"> Buy Voucher</a>
                            </div>
						</div>
					</div>

					<!-- Card -->
					<div class="card mb-4">
                        <div class="table-responsive card-body mt-4 mb-4">
                            <!-- Table -->
                            <table class="table mb-0" id="allTransactions">
                                <!-- Table head -->
                                <thead class="table-light">
                                <tr>
                                    <th scope="col" class="border-0">SN</th>
                                    <th scope="col" class="border-0">Voucher</th>
                                    <th scope="col" class="border-0">Amount</th>
                                    <th scope="col" class="border-0">Date</th>
                                    <th scope="col" class="border-0">Status</th>
                                    <th scope="col" class="border-0 text-end">Actions</th>
                                </tr>
                                </thead>
                                <!-- Table body -->
                                <tbody>
                                <?php
                                $voucher_id = 1;
                                $select_query = "SELECT * FROM vouchers WHERE userID='".$_SESSION['id']."' ORDER BY transactionDate DESC";
                                $result = mysqli_query($conn, $select_query);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $voucher = $row['voucher'];
                                        $amount = $row['amount'];
                                        $paymentMethod = $row['paymentMethod'];
                                        $transactionDate = $row['transactionDate'];
                                        $date = strtotime($transactionDate);
                                        $status = $row['status'];
                                        switch ($status) {
                                            case "Used";
                                                $class  = 'bg-secondary';
                                                $text = 'text-secondary';
                                                break;
                                            case "Active";
                                                $class  = 'bg-success';
                                                $text = 'text-success';
                                                break;
                                            default:
                                                $class  = '';
                                        }

                                        echo "<tr>";
                                        echo "<td class=\"align-middle border-top-0\">" .$voucher_id. "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" .$voucher. "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" ."₦" .number_format($amount, 2, '.', ','). "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" .date('j F Y', $date). "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" ."<span class='badge badge-dot $class'></span><span class='$text text-capitalize'> $status </span>". "</td>";
                                        echo "<td class=\"text-muted align-middle text-end border-top-0\">"
                                            ."<a href=\"view-voucher?id=$id\" class='btn btn-dark btn-sm'><i class=\"fe fe-eye \"></i> View</a>".
                                        "</td>";
                                    "</tr>";
                                    $voucher_id++;
                                    }
                                }else {
                                    echo "<td><p>No Vouchers Yet!</p></td>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    <!-- Footer -->


<?php include "./components/footer.php"; ?>