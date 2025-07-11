<?php
$page = "Withdrawal";
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
								<h3 class="mb-0">Withdraw</h3>
								<span>Make withdrawal of profits and bonuses.</span>
							</div>
                            <div class="nav btn-group flex-nowrap" role="tablist">
                                <a href="buy-voucher" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#withdrawalModal"> Withdraw Funds</a>
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
                                    <th scope="col" class="border-0 text-center">SN</th>
                                    <th scope="col" class="border-0 text-center">Amount</th>
                                    <th scope="col" class="border-0 text-center">Date</th>
                                    <th scope="col" class="border-0 text-center">Account Details</th>
                                </tr>
                                </thead>
                                <!-- Table body -->
                                <tbody>
                                <?php
                                $withdrawal_id = 1;
                                $select_query = "SELECT * FROM withdrawal WHERE userID='".$_SESSION['id']."' ORDER BY requestDate DESC";
                                $result = mysqli_query($conn, $select_query);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $amount = $row['amount'];
                                        $accountInfo = $row['accountInfo'];
                                        $requestDate = $row['requestDate'];
                                        $date = strtotime($requestDate);

                                        echo "<tr>";
                                        echo "<td class=\"align-middle border-top-0 text-center\">" .$withdrawal_id. "</td>";
                                        echo "<td class=\"align-middle border-top-0 text-center\">" ."₦" .number_format($amount, 2, '.', ','). "</td>";
                                        echo "<td class=\"align-middle border-top-0 text-center\">" .date('j F Y', $date). "</td>";
                                        echo "<td class=\"align-middle border-top-0 text-center\">" .$accountInfo. "</td>";
                                    "</tr>";
                                    $withdrawal_id++;
                                    }
                                }else {
                                    echo "
                                    <tr>
                                        <td colspan='6'>
                                            <div class='d-flex flex-column align-items-center justify-content-center py-5'>
                                                <img src='./assets/images/empty.png' width='120'>
                                                <p class='lead'>No Withdrawals</p>
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
    <!-- Footer -->


<?php include "./components/footer.php"; ?>