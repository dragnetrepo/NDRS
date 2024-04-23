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
                                <img src="images/recovery.svg" class="img-fluid mb-3" alt="password" /> 
                            </div>
                            <h1 class="heading text-center mb-3">Select a recovery method</h1>

                            <form action="password-set-2.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control form-control-height" placeholder="Type in your email address">
                                </div>

                                <div class="border-text my-4">
                                    <div class="border"></div>
                                    <div class="text">Or</div>
                                    <div class="border"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone number</label>
                                    <input type="text" class="form-control form-control-height" placeholder="Type in your registered phone number">
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-size btn-main-primary w-100">Send recovery link</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>