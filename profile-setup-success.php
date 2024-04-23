<!doctype html>
<html lang="en">
 <?php include "./components/head.inc.php"; ?>
  <body>
    <div class="pop-overlay">
        <div class="card pop-card border-0 py-4">
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="images/ok-icon.svg" class="img-fluid" />
                </div>
                <h3 class="pop-text">Your NDRS account has been created successfully.</h3>
            </div>
        </div>
    </div>
    <div class="split-grid">
        <div class="split-grid-1 py-5 d-flex align-items-center justify-content-center bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">

                        <div class="mb-5 d-flex justify-content-between align-items-center">
                            <img src="images/NDRS-Logo.svg" class="img-fluid" />

                            <div class="progress w-50 progress-height" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-success" style="width: 50%"></div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h1 class="heading">Welcome</h1>
                            <p class="sub-text">Let’s have a couple of details to create your profile.</p>
                        </div>

                        <form action="profile-setup-2.php" method="post">
                            <div class="mb-4">
                                <label class="form-label">Organization name</label>
                                <select class="form-control form-control-height">
                                    <option>Type or select an option</option>
                                    <option selected>University of Lagos</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Union Branch</label>
                                <select class="form-control form-control-height">
                                    <option>Type or select an option</option>
                                    <option selected>ASUU</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Union</label>
                                <select class="form-control form-control-height">
                                    <option>Type or select an option</option>
                                    <option selected>Lagos</option>
                                </select>
                            </div>
                            
                            <div class="mt-4">
                                <button class="btn btn-size btn-main-primary w-100">Finish</button>
                            </div>

                            <div class="mt-4">
                                <a href="profile-setup.php" class="btn btn-size btn-main-outline-primary w-100">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="split-grid-2 d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="text-center mb-4">
                            <img src="images/setup-banner.png" class="img-fluid" />
                        </div>
                        <h2 class="bold-text mb-4">We’re making dispute resolutions <span class="text-main-primary">3x easier</span></h2>

                        <img src="images/partners.png" class="img-fluid" style="height: 100px;" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>