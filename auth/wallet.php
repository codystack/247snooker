<?php
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
						<!-- Card body -->
						<div class="p-4 d-flex justify-content-between align-items-center">
							<div>
								<h3 class="mb-0">Fund Wallet</h3>
								<span>Fund your wallet to enable you buy and sell vouchers.</span>
							</div>
							<!-- Nav -->
                            <div class="nav btn-group flex-nowrap" role="tablist">
                                <a href="fund-wallet" class="btn btn-outline-primary btn-sm"> Fund Wallet</a>
                            </div>
						</div>
					</div>
					
                    <div class="card mb-4">
                        <div class="table-responsive table-body mb-4 mt-4">
                            <table class="table mb-0" id="allTransactions">
                                <!-- Table head -->
                                <thead class="table-light">
                                <tr>
                                    <th scope="col" class="border-0">S/N</th>
                                    <th scope="col" class="border-0">Invoice ID</th>
                                    <th scope="col" class="border-0">Date</th>
                                    <th scope="col" class="border-0">Reference</th>
                                    <th scope="col" class="border-0">Status</th>
                                    <th scope="col" class="border-0 text-end">Actions</th>
                                </tr>
                                </thead>
                                <!-- Table body -->
                                <tbody>
                                <?php
                                $topup_id = 1;
                                $select_query = "SELECT * FROM transactions WHERE userEmail='".$_SESSION['email']."' ORDER BY transactionDate DESC";
                                $result = mysqli_query($conn, $select_query);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $invoiceID = $row['invoiceID'];
                                        $transactionRef = $row['transactionRef'];
                                        $paymentMethod = $row['paymentMethod'];
                                        $transactionDate = $row['transactionDate'];
                                        $date = strtotime($transactionDate);
                                        $status = $row['status'];
                                        switch ($status) {
                                            case "failed";
                                                $class  = 'bg-warning';
                                                $text = 'text-warning';
                                                break;
                                            case "success";
                                                $class  = 'bg-success';
                                                $text = 'text-success';
                                                break;
                                            default:
                                                $class  = '';
                                        }

                                        echo "<tr>";
                                        echo "<td class=\"align-middle border-top-0\">" .$topup_id. "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" .$invoiceID. "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" .date('j F Y', $date). "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" .$transactionRef. "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" ."<span class='badge badge-dot $class'></span><span class='$text text-capitalize'> $status </span>". "</td>";
                                        echo "<td class=\"text-muted align-middle text-end border-top-0\">"
                                            ."<a href=\"view-transaction?id=$id\" class='btn btn-dark btn-sm'><i class=\"fe fe-eye \"></i></a>".
                                        "</td>";
                                    "</tr>";
                                    $topup_id++;
                                    }
                                }else {
                                    echo "
                                    <tr>
                                        <td colspan='6'>
                                            <div class='d-flex flex-column align-items-center justify-content-center py-5'>
                                                <img src='./assets/images/empty.png' width='120'>
                                                <p class='lead'>No Transactions</p>
                                            </div>
                                        </td>
                                    </tr>
                                    ";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
				</div>

            </div>
        </div>
    </div>
    <!-- Footer -->


<?php include "./components/footer.php"; ?>