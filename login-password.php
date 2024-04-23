<!doctype html>
<html lang="en">
 <?php include "./components/head.inc.php"; ?>
  <body>

   <?php include "./components/auth-nav.inc.php"; ?>

    <div class="auth-container d-flex align-items-center justify-content-center vh-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="card border-0 custom-card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="images/password.svg" class="img-fluid mb-3" alt="password" /> 
                            </div>
                            <h1 class="heading text-center mb-3">Enter your password</h1>

                            <form action="dashboard.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control border-end-0 form-control-height" placeholder="Enter your password">
                                        <span class="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                                            <img src="images/check-tick.svg" class="img-fluid" />
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-size btn-main-primary w-100">Login</button>
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