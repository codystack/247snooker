<?php
$page = "Bet";
include "./components/header.php";
require_once "./auth/voucher-query.php";
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
								<h3 class="mb-0">Contestants</h3>
								<span>Bet on your favourite contestant.</span>
							</div>
                            <div class="nav btn-group flex-nowrap">
                                <button onclick="goBack()" class="btn btn-outline-dark btn-sm"><i class="bi bi-arrow-left"></i> Go Back</button>
                            </div>
						</div>
					</div>
					<!-- Tab content -->
					<div class="tab-content">
						<div class="tab-pane fade show active pb-4" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                            <div class="row">
                                <?php

                                    $select_query = "SELECT * FROM contestant";

                                    $result = mysqli_query($conn, $select_query);

                                    // Check for query errors
                                    if (!$result) {
                                        die("Query failed: " . mysqli_error($conn));
                                    }

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            $fullName = $row['fullName'];
                                            $odd = $row['odd'];
                                            $picture = $row['picture'];
                                        
                                ?>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card mb-4">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img src="http://247snooker.com.ng/backoffice/<?php echo $picture; ?>" class="rounded-circle avatar-xxl mb-3" alt="contestant" style="height: 13rem;width: 13rem;object-fit: cover;object-position: center;border-radius: 1rem;">
                                                <h4 class="mb-0"><?php echo $fullName; ?></h4>
                                                <p class="text-danger mt-0 pt-0 mb-2">Odd: <?php echo $odd; ?></p>
                                                <a href="view-odd?id=<?php echo $id; ?>" class="btn btn-dark"> Place Bet </a>
                                            </div>
                                        </div>
                                    </div>
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
        </div>
    </div>
    <!-- Footer -->


<?php include "./components/footer.php"; ?>