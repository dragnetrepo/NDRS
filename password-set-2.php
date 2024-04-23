<!doctype html>
<html lang="en">
 <?php include "./components/head.inc.php"; ?>
  <body>

   <?php include "./components/auth-nav.inc.php"; ?>

    <div class="auth-container d-flex align-items-center justify-content-center vh-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="text-center">
                        <img src="images/success-icon.svg" class="img-fluid mb-3" alt="password" /> 
                    </div>
                    <div class="text-center">
                        <h1 class="heading">Password Reset Link has been sent</h1>
                        <p class="text-muted-2">We’ve sent a reset link to bala***********</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="mt-4">
                        <a href="create-password.php" class="btn btn-size btn-main-primary w-100">Got it</a>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-size btn-main-outline-primary w-100">Resend Link</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>