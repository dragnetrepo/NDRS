<!doctype html>
<html lang="en">
 <?php include "./components/head.inc.php"; ?>
  <body>

    <div class="split-grid">
        <div class="split-grid-1 py-5 d-flex align-items-center justify-content-center bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">

                        <div class="mb-5 d-flex justify-content-between align-items-center">
                            <img src="images/NDRS-Logo.svg" class="img-fluid" />

                            <div class="progress w-50 progress-height" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: 0%"></div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h1 class="heading">Welcome</h1>
                            <p class="sub-text">Let’s have a couple of details to create your profile.</p>
                        </div>

                        <form action="profile-setup-2.php" method="post">
                            <div class="mb-4">
                                <label class="form-label">First name</label>
                                <input type="text" class="form-control form-control-height" placeholder="Enter your first name">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Surname</label>
                                <input type="text" class="form-control form-control-height" placeholder="Enter your surname">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control form-control-height" placeholder="Enter your phone number">
                               <p class="text-muted-2 font-sm mb-0 mt-1">Additional recovery option</p>
                            </div>

                            <div class="mb-4">
                                <p class="form-label mb-4">Click to upload a display picture</p>
                                
                                <label for="profile" class="position-relative">
                                    <input type="file" id="profile" style="display: none;" />

                                    <div class="main-avatar mx-auto">
                                        <img src="images/user-avatar.svg" class="img-fluid object-fit-cover object-position-center w-100 h-100">
                                    </div>

                                    <img src="images/close-x.svg" class="img-fluid remove-profile cursor-pointer" />
                                </label>
                            </div>
                            

                            <div class="mt-4">
                                <button class="btn btn-size btn-main-primary w-100">Next</button>
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