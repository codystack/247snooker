<?php
    $page = "Users";
    include "./components/header.php";
    include "./components/modals.php";
    require_once "./auth/delete.php";
    require_once "./auth/update.php";
?>
    <div class="d-flex flex-column flex-lg-row h-lg-100 gap-1">
        <?php include "./components/side-nav.php"; ?>
        <div class="flex-lg-fill overflow-x-auto ps-lg-1 vstack vh-lg-100 position-relative">
            <?php include "./components/topnav.php"; ?>
            <div class="flex-fill overflow-y-lg-auto scrollbar bg-body rounded-top-4 rounded-top-start-lg-4 rounded-top-end-lg-0 border-top border-lg shadow-2">
                <main class="container-fluid px-3 py-5 p-lg-6 p-xxl-8">
                    <?php

                        $id = $_GET['id'];
                                    
                        $select_query = "SELECT * FROM users WHERE id ='$id'";
                        $result = mysqli_query($conn, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $firstName = $row['firstName'];
                                $lastName = $row['lastName'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $dateOfBirth = $row['dateOfBirth'];
                                $dob = strtotime($dateOfBirth);
                                $address = $row['address'];
                                $nameOfNOK = $row['nameOfNOK'];
                                $nokTel = $row['nokTel'];
                                $nokAddress = $row['nokAddress'];
                                $nokRelationship = $row['nokRelationship'];
                                $agentID = $row['agentID'];
                                $wallet = $row['wallet'];
                                $bonus = $row['bonus'];
                                $dateCreated = $row['dateCreated'];
                                $status = $row['status'];
                                $date = strtotime($dateCreated);
                                switch ($status) {
                                    case "Inactive";
                                        $class  = 'bg-danger';
                                        $text  = 'text-danger';
                                        $meaning = 'Blocked';
                                        break;
                                    case "Active";
                                        $class  = 'bg-success';
                                        $text  = 'text-success';
                                        $meaning = 'Active';
                                        break;
                                    default:
                                        $class  = '';
                                }
                            }
                        }

                    ?>

                    <div class="mb-6 mb-xl-10">
                        <div class="row g-3 align-items-center">
                            <div class="col">
                                <h3 class="ls-tight"><?php echo $firstName; ?>'s Profile</h3>
                            </div>
                            <div class="col">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" onclick="goBack()" class="btn btn-sm btn-neutral d-sm-inline-flex"><span class="pe-2"><i class="bi bi-arrow-left"></i> </span><span>Go Back</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-5">
                        <div class="col-sm-4">
                            <label class="form-label">Full Name</label> 
                            <input type="text" class="form-control" value="<?php echo $firstName; ?> <?php echo $lastName; ?>" disabled>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" value="<?php echo $email; ?>" disabled>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" value="<?php echo $phone; ?>" disabled>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Support ID</label>
                            <input type="text" class="form-control" value="<?php echo $agentID; ?>" disabled>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Wallet Balance</label>
                            <input type="text" class="form-control" value="₦<?php echo number_format($wallet, 2, '.', ','); ?>" disabled>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Winings</label>
                            <input type="text" class="form-control" value="₦<?php echo number_format($bonus, 2, '.', ','); ?>" disabled>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Date of Birth</label>
                            <input type="text" class="form-control" value="<?php echo date('j F Y', $dob); ?>" disabled>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" value="<?php echo $address; ?>" disabled>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Name of Next of Kin</label>
                            <input type="text" class="form-control" value="<?php echo $nameOfNOK; ?>" disabled>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Next of Kin's Phone Number</label>
                            <input type="text" class="form-control" value="<?php echo $nokTel; ?>" disabled>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Next of Kin's Address</label>
                            <input type="text" class="form-control" value="<?php echo $nokAddress; ?>" disabled>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">Relationship with Next of Kin</label>
                            <input type="text" class="form-control" value="<?php echo $nokRelationship; ?>" disabled>
                        </div>
                    </div>
                    <div class="row align-items-center mb-10 mt-10">
                        <div class="col-md-2"><label class="form-label">Status</label></div>
                        <div class="col-md-8 col-xl-5">
                            <span class="badge <? echo $class; ?> bg-opacity-25 text-xs <? echo $text; ?>"><?php echo $meaning; ?></span>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-md-12 text-end" style="display: <?php if ($status == 'Active'){ echo 'unset';}else{ echo 'none';}?>">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                <div class="row align-items-center" style="display: none;">
                                    <div class="col-md-8 col-xl-5">
                                        <div class="">
                                            <input type="number" value="<?php echo $id; ?>" name="id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-xl-5">
                                        <div class="">
                                            <input type="text" value="Inactive" name="status" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="update_user_status_btn" class="btn btn-danger">Block User</button>
                            </form>             
                        </div>
                        <div class="col-md-12 text-end" style="display: <?php if ($status == 'Inactive'){ echo 'unset';}else{ echo 'none';}?>">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                <div class="row align-items-center" style="display: none;">
                                    <div class="col-md-8 col-xl-5">
                                        <div class="">
                                            <input type="number" value="<?php echo $id; ?>" name="id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-xl-5">
                                        <div class="">
                                            <input type="text" value="Active" name="status" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="update_user_status_active_btn" class="btn btn-success text-white">Unblock User</button>
                            </form>             
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

<?php 
include "./components/delete-modals.php";
include "./components/footer.php"; 
?>