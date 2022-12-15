<?php
include 'components/adminheader.php';
require_once 'auth/profile.php';
?>

    <div class="offcanvas-wrap">

        <section class="py-8 bg-light">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-8 mx-auto">
                        <div class="card overflow-hidden bg-primary mb-5">
                            <div class="card-body inverted level-3">
                                <div class="row mb-5">
                                    <div class="col-lg-10">
                                        <span class="text-white eyebrow mb-1" id="greet"></span>
                                        <h2>Hello, <?php echo $_SESSION['firstName']; ?>!</h2>
                                    </div>
                                </div>
                            </div>
                            <img class="position-absolute top-100 start-100 translate-middle"
                            src="assets/images/svg/pattern.svg" alt="Image">
                        </div>

                        <section>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card bg-opaque-white mb-3">
                                        <div class="card-header">
                                            <div class="row g-2 g-xl-5 align-items-center">
                                                <div class="col-md-6">
                                                    <a href="dashboard" class="btn btn-with-icon btn-dark">
                                                        <i class="bi bi-arrow-left"></i> Go Back
                                                    </a>
                                                </div>
                                                <div class="col-md-6 text-md-end">
                                                    <h3 class="fs-6">Subscription</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card bg-white pt-5 mb-5">
                                        <div class="container">
                                            <div class="row g-3 g-xl-5 mb-5 align-items-end">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="card border">
                                                        <div class="card-body">
                                                            <h2 class="h1 mb-4">₦20,000<span class="small fs-sm">/Month</span></h2>
                                                            <h4 class="text-muted mb-4">Classic</h4>
                                                            <ul class="list-unstyled mb-4">
                                                                <li class="py-1">3 days in a week</li>
                                                                <li class="py-1">12pm till dawn</li>
                                                                <li class="py-1">Membership access card</li>
                                                            </ul>
                                                            <div class="d-grid">
                                                                <a href="membership"
                                                                class="btn btn-outline-black rounded-pill btn-with-icon">Get membership <i
                                                                    class="bi bi-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="card border">
                                                        <div class="card-body">
                                                            <h2 class="h1 mb-4">₦25,000<span class="small fs-sm">/Month</span></h2>
                                                            <h4 class="text-muted mb-4">Premium</h4>
                                                            <ul class="list-unstyled mb-4">
                                                                <li class="py-1">7 days in a week</li>
                                                                <li class="py-1">12pm till dawn</li>
                                                                <li class="py-1">Membership access card</li>
                                                            </ul>
                                                            <div class="d-grid">
                                                                <a href="membership"
                                                                class="btn btn-outline-black rounded-pill btn-with-icon">Get membership <i
                                                                    class="bi bi-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card bg-white">
                                        <div class="card-body bg-white">
                                            
                                            <?php
                                                if (isset($_SESSION['error_message'])) {
                                                    ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <div class="alert-message text-center">
                                                            <?php
                                                            echo $_SESSION['error_message'];
                                                            ?>
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

                                            <?php

                                                $select_query = "SELECT * FROM admin WHERE id ='".$_SESSION['id']."'";
                                                $result = mysqli_query($conn, $select_query);
                                                if (mysqli_num_rows($result) > 0) {
                                                    // output data of each row
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        $id = $row['id'];
                                                        $firstName = $row['firstName'];
                                                        $lastName = $row['lastName'];
                                                        $email = $row['email'];

                                            ?>

                                            <form class="row g-2 g-lg-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                                <div class="col-md-6">
                                                    <label for="inputCity" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" required name="firstName" placeholder="First Name" 
                                                        value="<?php echo $firstName; if ($firstName == null) {
                                                        echo "Not Available";} 
                                                        ?> ">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" required name="lastName" placeholder="Last Name"
                                                    value="<?php echo $lastName; if ($lastName == null) {
                                                        echo "Not Available";} 
                                                        ?> ">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputCity" class="form-label">Email</label>
                                                    <input type="text" class="form-control" required name="email" placeholder="Phone" 
                                                    value="<?php echo $email; if ($email == null) {
                                                        echo "Not Available";} 
                                                        ?> ">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="inputZip" class="form-label">Phone Number</label>
                                                    <input type="text" class="form-control" required name="phone" placeholder="Phone Number"
                                                    value="<?php echo $phone; if ($phone == null) {
                                                        echo "Not Available";} 
                                                        ?>" disabled >
                                                </div>
                                                
                                                <div class="d-grid mb-2">
                                                    <button name="update_profile_btn" type="submit" class="btn btn-lg btn-dark">Update Profile</button>
                                                </div>
                                                
                                            </form>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </section>

    </div>


    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/index.js"></script>

</body>

</html>