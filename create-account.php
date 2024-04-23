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
                            <h1 class="heading text-center mb-3">Welcome to the Nigerian Dispute Resolution System</h1>
                            <p class="mb-4 text-muted-2">We’ll send a code for to your provided email or mobile number for verification.</p> 
                            

                            <form action="verification.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Email or Mobile number</label>
                                    <input type="text" class="form-control form-control-height" placeholder="Type in your email or mobile number">
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-size btn-main-primary w-100">Verify</button>
                                </div>
                            </form>

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