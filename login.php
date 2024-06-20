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
                                <img src="images/user-icon.svg" class="img-fluid mb-3" alt="create an account" /> 
                            </div>
                            <h1 class="heading text-center mb-3">Welcome to the Nigerian Dispute Resolution System</h1>
                            <p class="mb-4 text-muted-2">We’ll send a code for to your provided email or mobile number for verification.</p> 
                            

                            <form action="dashboard.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Email or Mobile number</label>
                                    <input type="text" class="form-control form-control-height" placeholder="Type in your email or mobile number">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control border-end-0 form-control-height" placeholder="Type in your password">
                                        <span class="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                                            <img src="images/eye.svg" class="img-fluid" />
                                        </span>
                                    </div>
                                    <p class="mb-0 mt-2 text-muted-3">Forgot password? <a href="recovery.php" class="text-main-primary text-medium text-decoration-none">Recover it</a></p>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-size btn-main-primary w-100">Log in <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    </button>
                                </div>
                            </form>

                            <p class="mt-4 text-center text-muted-3 mb-0">Are you new here? <a href="create-account.php" class="text-main-primary text-medium text-decoration-none">Create account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>