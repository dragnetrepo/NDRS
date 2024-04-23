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
                                <img src="images/password.svg" class="img-fluid mb-3" alt="password" /> 
                            </div>
                            <h1 class="heading text-center mb-3">Create your account password</h1>
                            <p class="mb-1 text-muted-2">In order to <strong>protect your account</strong>, make sure your password is</p> 
                            <ul class="text-muted-2">                          
                                <li>at least 8 characters</li>
                                <li>has alphabets, numbers & special characters</li>
                            </ul>

                            <form action="password-set.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label">New password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control border-end-0 form-control-height" placeholder="New password">
                                        <span class="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                                            <img src="images/eye.svg" class="img-fluid" />
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Re-enter New password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control border-end-0 form-control-height is-invalid" placeholder="Re-enter password">
                                        <span class="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                                            <img src="images/eye.svg" class="img-fluid" />
                                        </span>
                                        <div class="invalid-feedback">
                                            Passwords do not match
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-size btn-main-primary w-100">Save password</button>
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