<?php
require_once './auth/userinfo.php';
?>

<div class="row align-items-center">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
        <!-- Bg -->
        <div class="pt-20 rounded-top-md" style="background: url('assets/images/bg.jpg') no-repeat;background-size: cover;background-position: center;"></div>
        <div
            class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom-md shadow-sm">
            <div class="d-flex align-items-center">
                <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                    <img src="./<?php echo $picture; ?>" class="avatar-xl rounded-circle border border-4 border-white position-relative"
                         alt="" />
                    <a href="profile" class="position-absolute top-0 end-0" data-bs-toggle="tooltip" data-placement="top" title=""
                       data-original-title="Verified">
                        <?php
                            if ($badge == "Manager") {
                                echo "<img src=\"assets/images/svg/checked-mark.svg\" height=\"30\" width=\"30\" />";
                            }else{

                            }
                        ?>

                    </a>
                </div>
                <div class="lh-1">
                    <h2 class="mb-0"><?php echo $firstName;?> <?php echo $lastName;?></h2>
                    <?php
                        $select_query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."'";
                        $result = mysqli_query($conn, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $wallet = $row['wallet'];
                    ?>
                    <p class="mb-0 d-block text-danger">Wallet Balance: <span class="fw-bold text-dark">₦<?php echo number_format($wallet, 0, '.', ','); ?></span></p>
                    <?php }
                    }
                        ?>
                </div>
            </div>
            <div>
                <a href="fund-wallet" class="btn btn-primary btn-sm d-none d-md-block"><i class="bi bi-credit-card"></i> Fund Wallet</a>
            </div>
        </div>
    </div>
</div>
