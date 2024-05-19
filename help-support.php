<!DOCTYPE html>
<html lang="en">

<?php include "./components/head.inc.php";?>
  <body>
    <div class="main-admin-container bg-light dark-mode-active">

        <div class="d-flex flex-column flex-lg-row h-lg-100">

            <?php include "./components/main-navbar.inc.php"; ?>
            
            <div class="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">

                <?php include "./components/top-bar.inc.php"; ?>

                <main class="admin-content">

                    <div class="header-box py-5">
                        <div class="container">
                            <h2>Help & Support</h2>
                        </div>
                    </div>

                    <div class="content-main">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10">

                                    <div class="margin-top-negative">
                                        <ul class="nav custom-tab nav-underline mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-help-tab" data-bs-toggle="pill" data-bs-target="#pills-help" type="button" role="tab" aria-controls="pills-help" aria-selected="true">Help</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-support-tab" data-bs-toggle="pill" data-bs-target="#pills-support" type="button" role="tab" aria-controls="pills-support" aria-selected="false">Support</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content mb-4" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-help" role="tabpanel" aria-labelledby="pills-help-tab" tabindex="0">

                                                <h3 class="text-medium my-4">How can we help you today?</h3>

                                                <div class="row my-4">
                                                    <div class="col-lg-12">
                                                        <div class="input-group">
                                                            <span class="input-group-text bg-transparent">
                                                                <img src="images/search.svg" class="img-fluid" alt="search">
                                                            </span>
                                                            <input type="search" class="form-control border-start-0 form-control-height" placeholder="Search for articles">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    
                                                    <div class="col-lg-6 mb-4">
                                                        <a href="help-support-2.php"  class="text-decoration-none">
                                                            <div class="card h-100 heading-card card-hover p-3">
                                                                <div class="card-body">

                                                                    <img src="images/help.svg" class="img-fluid mb-3" />

                                                                    <h3>General Questions & Overview</h3>
                                                                    <p class="help-text">Get all your general questions about using NDRS answered.</p>

                                                                    <p class="help-text-sub">24 articles</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="col-lg-6 mb-4">
                                                        <a href="help-support-2.php" class="text-decoration-none">
                                                            <div class="card h-100 heading-card card-hover p-3">
                                                                <div class="card-body">

                                                                    <img src="images/help.svg" class="img-fluid mb-3" />

                                                                    <h3>Discussions</h3>
                                                                    <p class="help-text">Learn how to use discussions during and after a dispute case.</p>

                                                                    <p class="help-text-sub">8 articles</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="col-lg-6 mb-4">
                                                        <a href="help-support-2.php"  class="text-decoration-none">
                                                            <div class="card h-100 heading-card card-hover p-3">
                                                                <div class="card-body">

                                                                    <img src="images/help.svg" class="img-fluid mb-3" />

                                                                    <h3>Disputes</h3>
                                                                    <p class="help-text">Learn how create, monitor and track a dispute from declaration to resolution</p>

                                                                    <p class="help-text-sub">24 articles</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="col-lg-6 mb-4">
                                                        <a href="help-support-2.php" class="text-decoration-none">
                                                            <div class="card h-100 heading-card card-hover p-3">
                                                                <div class="card-body">

                                                                    <img src="images/help.svg" class="img-fluid mb-3" />

                                                                    <h3>Documents</h3>
                                                                    <p class="help-text">Learn how to manage and use your documents</p>

                                                                    <p class="help-text-sub">8 articles</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="col-lg-6 mb-4">
                                                        <a href="help-support-2.php"  class="text-decoration-none">
                                                            <div class="card h-100 heading-card card-hover p-3">
                                                                <div class="card-body">

                                                                    <img src="images/help.svg" class="img-fluid mb-3" />

                                                                    <h3>Settlement Bodies</h3>
                                                                    <p class="help-text">Learn how create, monitor and track a dispute from declaration to resolution</p>

                                                                    <p class="help-text-sub">24 articles</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="col-lg-6 mb-4">
                                                        <a href="help-support-2.php" class="text-decoration-none">
                                                            <div class="card h-100 heading-card card-hover p-3">
                                                                <div class="card-body">

                                                                    <img src="images/help.svg" class="img-fluid mb-3" />

                                                                    <h3>Individual Users</h3>
                                                                    <p class="help-text">Learn how to manage and use your documents</p>

                                                                    <p class="help-text-sub">8 articles</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-support" role="tabpanel" aria-labelledby="pills-support-tab" tabindex="0">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <h3 class="text-medium mt-4">Send us a message</h3>

                                                        <p class="text-muted mb-5">We usually send replies within 7 working days</p>

                                                        <form>

                                                             <div class="mb-4">
                                                                <label class="form-label">Full name</label>
                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your full name" value="">
                                                            </div>

                                                            <div class="mb-4">
                                                                <label class="form-label">Email</label>
                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your email address" value="">
                                                            </div>

                                                            <div class="mb-4">
                                                                <label class="form-label">User type</label>
                                                                <select class="form-select form-control-height">
                                                                    <option>--Choose your role / permission level--</option>
                                                                    <option>Minsitry Admin</option>
                                                                    <option>National Union Admin</option>
                                                                    <option>Union Branch Admin</option>
                                                                    <option>Employers (Organization Admin) </option>
                                                                    <option>Staff (Union Members)</option>
                                                                    <option>Non Union Member</option>
                                                                    <option>Conciliators & Arbitrators</option>
                                                                    <option>Mediators</option>
                                                                    <option>Industrial Arbitration Panel (Tribunal)</option>
                                                                    <option>Board of Enquiry</option>
                                                                    <option>National Industrial Courts</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-4">
                                                                <label class="form-label">Union</label>
                                                                <select class="form-select form-control-height">
                                                                    <option>--Choose--</option>
                                                                    <option>Academic Staff Union Of Universities (ASUU)</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-4">
                                                                <label class="form-label">Branch</label>
                                                                <select class="form-select form-control-height">
                                                                    <option>--Choose--</option>
                                                                    <option>ASUU Lagos</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-4">
                                                                <label class="form-label">Sub Branch</label>
                                                                <select class="form-select form-control-height">
                                                                    <option>--Choose--</option>
                                                                    <option>University of Lagos (UNILAG)</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-4">
                                                                <label class="form-label">Your message</label>
                                                                <textarea class="form-control" rows="4"></textarea>
                                                            </div>

                                                            <button class="btn btn-main-primary btn-size">Send message</button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </main>

                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">

                            </div>
                        </div>
                    </div>
                </footer>

            </div>

        </div>

    </div>


    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>