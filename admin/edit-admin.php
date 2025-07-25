<?php
    $page = "Admins";
    include "./components/header.php";
    include "./components/modals.php";
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
                                    
                        $select_query = "SELECT * FROM admin WHERE id ='$id'";
                        $result = mysqli_query($conn, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $firstName = $row['firstName'];
                                $lastName = $row['lastName'];
                                $email = $row['email'];
                                $designation = $row['designation'];
                                $dateCreated = $row['dateCreated'];
                                $status = $row['status'];
                                $date = strtotime($dateCreated);
                                switch ($status) {
                                    case "0";
                                        $class  = 'bg-danger';
                                        $text  = 'text-danger';
                                        $meaning = 'Not Active';
                                        break;
                                    case "1";
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
                    
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="row align-items-center mb-10" style="display: none;">
                            <div class="col-md-2">
                                <label class="form-label">Admin ID</label>
                            </div>
                            <div class="col-md-8 col-xl-5">
                                <div class="">
                                    <input type="number" value="<?php echo $id; ?>" name="id" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-10">
                            <div class="col-md-2">
                                <label class="form-label">First Name</label>
                            </div>
                            <div class="col-md-8 col-xl-5">
                                <div class="">
                                    <input type="text" value="<?php echo $firstName; ?>" name="firstName" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-10">
                            <div class="col-md-2">
                                <label class="form-label">Last Name</label>
                            </div>
                            <div class="col-md-8 col-xl-5">
                                <div class="">
                                    <input type="text" value="<?php echo $lastName; ?>" name="lastName" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-10">
                            <div class="col-md-2">
                                <label class="form-label">Email</label>
                            </div>
                            <div class="col-md-8 col-xl-5">
                                <div class="">
                                    <input type="text" value="<?php echo $email; ?>" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-10">
                            <div class="col-md-2">
                                <label class="form-label">Designation</label>
                            </div>
                            <div class="col-md-8 col-xl-5">
                                <div class="">
                                    <select class="form-select" name="designation" required aria-label="Designation">
                                        <option selected value="<?php echo $designation; ?>"><?php echo $designation; ?></option>
                                        <option value="Admin">Admin</option>
                                        <option value="Super-Admin">Super-Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-10">
                            <div class="col-md-2">
                                <label class="form-label">Status</label>
                            </div>
                            <div class="col-md-8 col-xl-5">
                                <div class="">
                                    <select class="form-select" name="status" required aria-label="Designation">
                                        <option selected value="<?php echo $status; ?>"><?php echo $meaning; ?></option>
                                        <option value="1">Activate</option>
                                        <option value="0">Deactivate</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-5 text-end">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                    <div class="row align-items-center mb-10" style="display: none;">
                                        <div class="col-md-2">
                                            <label class="form-label">Admin ID</label>
                                        </div>
                                        <div class="col-md-8 col-xl-5">
                                            <div class="">
                                                <input type="number" value="<?php echo $id; ?>" name="id" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="update_admin_password_btn" class="btn btn-danger">Change password</button>
                                </form>
                                <button type="submit" name="update_admin_btn" class="btn btn-success text-white">Update Account</button>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

<?php include "./components/footer.php"; ?>