<!doctype html>
<html lang="en">
 <?php include "./components/head.inc.php"; ?>
  <body>

   <?php include "./components/auth-nav.inc.php"; ?>

    <div class="auth-container d-flex align-items-center justify-content-center vh-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <div class="text-center">
                        <img src="images/success-icon.svg" class="img-fluid mb-3" alt="password" /> 
                    </div>
                    <div class="text-center">
                        <h1 class="heading">Password Set</h1>
                        <p class="text-muted-2">Your password has been successfully set.Click below to enter your account</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <div class="mt-5">
                        <a href="profile-setup.php" class="btn btn-size btn-main-primary w-100">Go to account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>