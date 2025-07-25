<?php
$page = "Bet";
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
								<h3 class="mb-0">Bet</h3>
								<span>Bet for your favourite player.</span>
							</div>
                            <div class="nav btn-group flex-nowrap" role="tablist">
                                <a href="place-bet" class="btn btn-outline-primary btn-sm"> Place Bet</a>
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
                                    <th scope="col" class="border-0">Bet Amount</th>
                                    <th scope="col" class="border-0">Odd</th>
                                    <th scope="col" class="border-0">Potential Win</th>
                                    <th scope="col" class="border-0">Stake Date</th>
                                </tr>
                                </thead>
                                <!-- Table body -->
                                <tbody>
                                <?php
                                $bet_id = 1;
                                $select_query = "SELECT * FROM bet WHERE userID='".$_SESSION['id']."'";
                                $result = mysqli_query($conn, $select_query);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $odd = $row['odd'];
                                        $bet_amount = $row['bet_amount'];
                                        $potential_win = $row['potential_win'];
                                        $dateCreated = $row['dateCreated'];
                                        $date = strtotime($dateCreated);

                                        echo "<tr>";
                                        echo "<td class=\"align-middle border-top-0\">" .$bet_id. "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" ."₦" .number_format($bet_amount, 2, '.', ','). "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" .$odd. "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" ."₦" .number_format($potential_win, 2, '.', ','). "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" .date('j F Y', $date). "</td>";
                                    "</tr>";
                                    $bet_id++;
                                    }
                                }else {
                                    echo "<td><p>No Bet Yet!</p></td>";
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