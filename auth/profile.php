<?php
$page = "Profile";
include "./components/header.php";
require_once "./auth/profile-query.php";
?>

<div class="pt-5 pb-5">
    <div class="container">
        <?php include "./components/userinfo.php"; ?>
        <!-- Content -->
        <div class="row mt-0 mt-md-4">
            <?php include  "./components/navbar.php"; ?>
            <div class="col-lg-9 col-md-8 col-12">
                <!-- Card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Profile Details</h3>
                        <p class="mb-0">
                            You have full control to manage your own account setting.
                        </p>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="d-lg-flex mb-4 align-items-center justify-content-between">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                                <div class="d-lg-flex align-items-center">
                                    <div class="d-flex align-items-center mb-4 mb-lg-0">
                                        <img src="./<?php echo $picture; ?>" onClick="triggerClick()" id="profileDisplay" class="avatar-xxl rounded-circle"  />
                                        <input type="file" name="picture" onChange="displayImage(this)" required id="picture" class="form-control" style="display: none;">
                                        <div class="ms-3">
                                            <div class="d-flex">
                                                <img src="assets/images/arrow.png" width="50">
                                                <h4 class="mb-0">Click here to select picture.</h4>
                                            </div>
                                            <p class="mb-0">
                                                PNG or JPG no bigger than 800px wide and tall.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ms-15">
                                        <button type="submit" name="profile_picture_btn" class="btn btn-outline-primary btn-sm">Update Profile Picture</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                        if (isset($_SESSION['error_message'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-message text-center">
                                    <?php echo $_SESSION['error_message']; ?>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['error_message']);
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['success_message'])) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <div class="alert-message text-center">
                                    <?php echo $_SESSION['success_message']; ?>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['success_message']);
                        }
                        ?>
                        <hr class="my-5" />
                        <?php

                        $select_query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."'";
                        $result = mysqli_query($conn, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $firstName = $row['firstName'];
                                $lastName = $row['lastName'];
                                $dateOfBirth = $row['dateOfBirth'];
                                $phone = $row['phone'];
                                $email = $row['email'];
                                $address = $row['address'];
                                $nameOfNOK = $row['nameOfNOK'];
                                $nokTel = $row['nokTel'];
                                $nokAddress = $row['nokAddress'];
                                $nokRelationship = $row['nokRelationship'];
                                $date = strtotime($dateOfBirth);

                                ?>
                        <!-- View Details -->
                        <div id="hideshowForm">
                            <h4 class="mb-0">Personal Details</h4>
                            <p class="mb-4">
                                Personal information and address.
                            </p>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            First Name<br />
                                            <strong>
                                                <?php echo $firstName; if ($firstName == null) {
                                                    echo "Not Available";
                                                } ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            Last Name<br />
                                            <strong>
                                                <?php echo $lastName; if ($lastName == null) {
                                                    echo "Not Available";
                                                } ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            Email<br />
                                            <strong><?php echo $email; ?></strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            Phone Number<br />
                                            <strong>
                                                <?php echo $phone; if ($phone == null) {
                                                    echo "Not Available";
                                                } ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            Date of Birth<br />
                                            <strong>
                                                <?php echo date('j F Y', $date); if ($dateOfBirth == null) {
                                                    echo "Not Available";
                                                } ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            Address<br />
                                            <strong>
                                                <?php echo $address; if ($address == null) {
                                                    echo "Not Available";
                                                } ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            Name of Next of Kin<br />
                                            <strong>
                                                <?php echo $nameOfNOK; if ($nameOfNOK == null) {
                                                    echo "Not Available";
                                                } ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            Next of Kin's Phone Number<br />
                                            <strong>
                                                <?php echo $nokTel; if ($nokTel == null) {
                                                    echo "Not Available";
                                                } ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            Next of Kin's Address<br />
                                            <strong>
                                                <?php echo $nokAddress; if ($nokAddress == null) {
                                                    echo "Not Available";
                                                } ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            Relationship with Next of Kin<br />
                                            <strong>
                                                <?php echo $nokRelationship; if ($nokRelationship == null) {
                                                    echo "Not Available";
                                                } ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-grid mt-4 mb-3">
                                <!-- Button -->
                                <button class="btn btn-dark hidebtn">
                                    Edit Profile Information
                                </button>
                            </div>
                        </div>

                        <!-- Details Edit -->
                        <div id="showhideForm" style="display: none">
                            <h4 class="mb-0">Personal Details</h4>
                            <p class="mb-4">
                                Edit your personal information and address.
                            </p>

                            <!-- Form -->
                            <form class="row" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                <!-- First name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="firstName">First Name</label>
                                    <input type="text" name="firstName" class="form-control" value="<?php echo $firstName; ?>" />
                                </div>
                                <!-- Last name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="lname">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" value="<?php echo $lastName; ?>" />
                                </div>
                                <!-- Email -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" />
                                </div>
                                <!-- Phone -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="phone">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control" value="<?php echo $phone; ?>" />
                                </div>
                                <!-- Birthday -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="dateOfBirth">Date of Birth</label>
                                    <input class="form-control flatpickr" type="text" value="<?php echo $dateOfBirth; ?>" id="birth" name="dateOfBirth" />
                                </div>
                                <!-- Address -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="address">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" />
                                </div>
                                <!-- NOK Name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="nameOfNOK">Name of Next of Kin</label>
                                    <input type="text" name="nameOfNOK" class="form-control" value="<?php echo $nameOfNOK; ?>" />
                                </div>
                                <!-- NOK Phone Number -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="nokTel">Next of Kin's Phone Number</label>
                                    <input type="tel" name="nokTel" class="form-control" value="<?php echo $nokTel; ?>" />
                                </div>
                                <!-- NOK Address -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="nokAddress">Next of Kin's Address</label>
                                    <input type="text" name="nokAddress" class="form-control" value="<?php echo $nokAddress; ?>" />
                                </div>
                                <!-- NOK Relationship -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="nokRelationship">Relationship with Next of Kin</label>
                                    <input type="text" name="nokRelationship" class="form-control" value="<?php echo $nokRelationship; ?>" />
                                </div>
                                <div class="col-12 text-center mt-2 mb-1">
                                    <!-- Button -->
                                    <button class="btn btn-primary" type="submit" name="update_profile_btn">
                                        Update Profile Information
                                    </button>
                                    <button class="btn btn-dark showbtn">
                                        View Profile Information
                                    </button>
                                </div>
                            </form>
                        </div>
                        <?php }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "./components/footer.php"; ?>
