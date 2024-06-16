<!doctype html>
<html lang="en">
 <?php include "./components/head.inc.php"; ?>
  <body class="bg-white">

    <nav class="navbar bg-white py-4">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/NDRS-Logo.svg" class="img-fluid" alt="logo" style="height: 30px;">
            </a>

            <a href="index.php" class="btn btn-size btn-main-primary px-3">Go back</a>
        </div>
    </nav>


    <div class="error d-flex justify-content-center align-items-center" style="height: 75vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="text-center" style="font-size: 5rem;">404</h1>
                        <h1 class="hero-text text-center mb-4">Sorry, the page not found</h1>
                        <p class="hero-para text-center">The link you followed probably broken or the page has been removed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>