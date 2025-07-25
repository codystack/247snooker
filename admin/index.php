<?php require_once "./auth/account.php"; ?>

<!doctype html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">
    <title>247Snooker :: Admin Dashboard</title>
    <link rel="icon" type="image/png" href="assets/img/247Favicon.png">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/utility.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f=satoshi@900,700,500,300,401,400&amp;display=swap">
    <script defer="defer" data-domain="satoshi.webpixels.io" src="https://plausible.io/js/script.outbound-links.js"></script>
</head>

<body>
    <div class="row g-0 justify-content-center" style="background-image: url('./assets/img/bg01.jpg');background-size: cover;background-position: center;">
        <div class="col-md-6 col-lg-5 col-xl-5 position-fixed start-0 top-0 vh-100 overflow-y-hidden d-none d-lg-flex flex-lg-column">
            <div class="p-12 py-xl-10 px-xl-20">
                <a class="d-block" href="./">
                    <img src="./assets/img/LogoWhite.svg" class="h-rem-24" alt="logo">
                </a>
            </div>
            <div class="mt-auto ps-16 ps-xl-20">
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7 offset-lg-5 min-vh-100 overflow-y-auto d-flex flex-column justify-content-center position-relative bg-body rounded-top-start-lg-4 border-start-lg shadow-soft-5">
            <div class="w-md-50 mx-auto px-10 px-md-0 py-10">
                <div class="mb-5">
                    <a class="d-inline-block d-lg-none mb-10" href="./">
                        <img src="assets/img/Giolee-logo.png" class="h-rem-10" alt="...">
                    </a>
                    <h1 class="ls-tight fw-bolder h3">Welcome Back!</h1>
                    <div class="mt-3 text-sm text-muted">Sign in to your account using the correct details.</div>
                </div>
                <?php
                    if (isset($_SESSION['error_message'])) {
                        ?>
                        <div class="alert alert-danger mb-5" role="alert">
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
                        <div class="alert alert-success mb-5" role="alert">
                            <div class="alert-message text-center">
                                <?php echo $_SESSION['success_message']; ?>
                            </div>
                        </div>
                        <?php
                        unset($_SESSION['success_message']);
                    }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="mb-5">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    
                    <div class="mb-5">
                        <label class="form-label mb-0" for="password">Password</label> 
                        <input type="password" class="form-control" name="password" autocomplete="current-password">
                    </div>
                    
                    <div><button type="submit" name="login_btn" class="btn btn-dark w-100">Sign in</button></div>
                </form>
        </div>
    </div>
    </div>

    <script src="assets/js/main.js"></script>

</body>

</html>