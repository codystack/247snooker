<?php
    require_once "./auth/account.php";
?>
<!doctype html>
<html lang="en">

<head>
  
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="ThankGod Okoro">
	<meta name="description" content="You will appreciate our warm and welcoming atmosphere the moment you walk in! At 24/7 Snooker Spot Ball we provide our members with an array of different activities from pool, to chess and the best of snooker; we have it all to offer.">
  <meta name="keywords" content="Port Harcourt, PH, Pitakwa, Ediz, Ediz Winebar, Snooker, Snooker Lounge, Snooker in Port Harcourt, Snooker in Nigeria, Edwin Okolie, CEO, Afro Chao, Rivers State">
  
  <!-- Favicon -->
  <link rel="shortcut icon" href="./assets/images/247Favicon.png" type="image/x-icon" />
  <link rel="stylesheet" href="assets/css/libs.bundle.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/fonts/stylesheet.css">
  
  <!-- Title -->
  <title>Member Registration :: 24/7 Snooker&trade;</title></head>

<body>


  <section class="bg-black overflow-hidden">
    <div class="py-10 py-xl-5 d-flex flex-column container level-3 min-vh-100">
      <div class="row align-items-center justify-content-center my-auto">
        <div class="col-md-10 col-lg-8 col-xl-5">

          <div class="card">
            <div class="card-body bg-white">
                <div class="text-center mb-4">
                    <a href="./">
                        <img src="assets/images/LogoBlack.svg" class="mb-1" alt="" width="100" />
                    </a>
                    <h5 class="fs-4 mb-0">Create Account</h5>
                    <div class="text-muted text-center small">using your correct credentials</div>
                </div>
                <?php
                if (isset($_SESSION['error_message'])) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <div class="alert-message text-center">
                            <?php
                            echo $_SESSION['error_message'];
                            session_destroy();
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" name="firstName" placeholder="John" required>
                        <label for="floatingInput">First Name</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" name="lastName" placeholder="Doe" required>
                        <label for="floatingInput">Last Name</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                        <label for="floatingInput">Email Address</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="tel" class="form-control" name="phone" placeholder="08100200500" required>
                        <label for="floatingInput">Phone Number</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="d-grid mb-2">
                        <button name="register_btn" type="submit" class="btn btn-lg btn-black">Create Account</button>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-opaque-black inverted text-center">
              <p class="text-secondary">Already have an account? <a href="membership" class="underline">Sign In</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <figure class="background background-overlay" style="background-image: url('assets/images/pic9.jpg')"></figure>
  </section>


  <!-- script -->
  <script src="assets/js/vendor.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>