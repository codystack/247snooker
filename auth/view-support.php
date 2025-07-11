<?php
$page = "Support";
include "./components/header.php";
include_once ('auth/query.php');
?>


    <div class="pt-5 pb-5">
        <div class="container">
            <?php include "./components/userinfo.php"; ?>
            <!-- Content -->

            <div class="row mt-0 mt-md-4">
                <?php include "./components/navbar.php"; ?>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header d-lg-flex align-items-center justify-content-between">
                                <div class="mb-3 mb-lg-0">
                                    <h3 class="mb-0">Support Request & Response</h3>
                                </div>
                                <div>
                                    <button onclick="goBack()" class="btn btn-outline-primary btn-sm"><i class="bi bi-arrow-left"></i> Go Back</button>
                                </div>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">

                                <?php
                                $id = isset($_GET['id']) ? $_GET['id'] : '';
                                $sql = "SELECT * FROM support WHERE id='$id'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <ul class="list-group list-group-flush" style="display: <?php if($row['comment'] == false){echo 'none';} ?>">
                                            <li class="list-group-item px-0 py-4">
                                                <div class="d-flex">
                                                    <img src="./<?php echo $picture; ?>" alt="" class="rounded-circle avatar-lg" />
                                                    <div class="ms-3 mt-2">

                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h4 class="mb-0"><?php echo $firstName;?> <?php echo $lastName;?></h4>
                                                                <span class="text-muted fs-6">Request</span>
                                                            </div>
                                                        </div>
                                                        <div class="mt-2">

                                                            <p> <?php echo $row['comment'];?> </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="list-group list-group-flush" style="display: <?php if($row['response'] == false){echo 'none';} ?>">
                                            <li class="list-group-item px-0 py-4">
                                                <div class="d-flex">
                                                    <img src="assets/images/favicon.png" alt="" class="rounded-circle avatar-lg" />
                                                    <div class="ms-3 mt-2">

                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h4 class="mb-0">Customer Care</h4>
                                                                <span class="text-muted fs-6">Response</span>
                                                            </div>
                                                        </div>
                                                        <div class="mt-2">
                                                            <span class="h5 mb-2"><?php echo $row['title'];?></span>

                                                            <?php echo $row['response'];?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
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