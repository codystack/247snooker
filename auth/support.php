<?php
$page = "Support";
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
								<h3 class="mb-0">Support</h3>
								<span>Request, complain, and get support.</span>
							</div>
                            <div class="nav btn-group flex-nowrap" role="tablist">
                                <a href="request-support" class="btn btn-outline-primary btn-sm"> Send New Request</a>
                            </div>
						</div>
					</div>

                    <!-- Card -->
                    <div class="card mb-4">
                        <div class="table-responsive card-body mb-4 mt-4">
                            <!-- Table -->
                            <table class="table mb-0" id="allSupport">
                                <!-- Table head -->
                                <thead class="table-light">
                                <tr>
                                    <th scope="col" class="border-0">S/N</th>
                                    <th scope="col" class="border-0">PURPOSE</th>
                                    <th scope="col" class="border-0">COMMENT</th>
                                    <th scope="col" class="border-0">DATE</th>
                                    <th scope="col" class="border-0">Status</th>
                                    <th scope="col" class="border-0 text-end">ACTIONS</th>
                                </tr>
                                </thead>
                                <!-- Table body -->
                                <tbody>
                                <?php
                                $support_id = 1;
                                $select_query = "SELECT * FROM support WHERE userID='".$_SESSION['id']."' ORDER BY requestDate DESC";
                                $result = mysqli_query($conn, $select_query);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $staffID = $row['staffID'];
                                        $purpose = $row['purpose'];
                                        $comment = $row['comment'];
                                        $requestDate = $row['requestDate'];
                                        $date = strtotime($requestDate);
                                        $commentlength=20;
                                        $comment = substr($comment, 0, $commentlength);
                                        $status = $row['status'];
                                        switch ($status) {
                                            case "Open";
                                                $class  = 'bg-warning';
                                                $text = 'text-warning';
                                                break;
                                            case "Answered";
                                                $class  = 'bg-success';
                                                $text = 'text-success';
                                                break;
                                            default:
                                                $class  = '';
                                        }

                                        echo "<tr>";
                                        echo "<td class='border-top-0'>" .$support_id. "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" .$purpose. "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" .$comment."" ."...". "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" .date('j F Y', $date). "</td>";
                                        echo "<td class=\"align-middle border-top-0\">" ."<span class='badge badge-dot $class'></span><span class='$text text-capitalize'> $status </span>". "</td>";
                                        echo "<td class=\"text-muted align-middle text-end border-top-0\">"
                                            ."<a href=\"view-support?id=$id\" class='btn btn-dark btn-sm'><i class=\"fe fe-eye \"></i> View</a>".
                                        "</td>";
                                        "</tr>";
                                        $support_id++;
                                    }

                                }else {
                                    echo "
                                    <tr>
                                        <td colspan='6'>
                                            <div class='d-flex flex-column align-items-center justify-content-center py-5'>
                                                <img src='./assets/images/empty.png' width='120'>
                                                <p class='lead'>No Support Request</p>
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