<!doctype html>
<html lang="en">
 <?php include "./components/head.inc.php"; ?>
  <body>

   <?php include "./components/auth-nav.inc.php"; ?>

    <div class="auth-container d-flex align-items-center justify-content-center vh-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card border-0 custom-card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="images/user-icon.svg" class="img-fluid mb-3" alt="create an account" /> 
                            </div>
                            <h1 class="heading text-center mb-1">Input the 6 digit code sent to</h1>
                            <p class="mb-4 text-detail">balamihu@gmail.com</p> 
                            

                            <form action="verification-success.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label">6 digit code</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control border-end-0 form-control-height" placeholder="">
                                        <span class="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                                            <img src="images/check-tick.svg" class="img-fluid" />
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-size btn-main-primary w-100">Continue</button>
                                </div>
                            </form>

                            <div class="text-muted-2 mt-4">
                                <p>Didn’t get a verification code?</p>
                                <ul class="mb-0">
                                    <li>Make sure you entered details correctly</li>
                                    <li>Check your spam folder</li>
                                    <li><a href="#" class="text-main-primary">Resend verification code</a></li>
                                </ul>
                            </div>

                            <p class="mt-4 text-center text-muted-3 mb-0">Already have an account? <a href="index.php" class="text-main-primary text-medium text-decoration-none">Log in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>