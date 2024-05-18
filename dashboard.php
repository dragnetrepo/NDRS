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
                            <p>Wednesday, March 6th</p>
                            <h2>Good afternoon, Simon</h2>
                        </div>
                    </div>

                    <div class="content-main py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row mb-5">
                                        <div class="col-lg-4 mb-lg-0 mb-3">
                                            <a href="#" class="text-decoration-none">
                                                <div class="card dash-card bg-custom-color-2 h-100 border-0">
                                                    <div class="card-body d-flex flex-column">
                                                        <div class="d-flex avatar-holder align-items-center mb-3">
                                                            <div class="position-relative flex-shrink-0">
                                                                <img src="images/dispute-icon.svg" class="img-fluid" />
                                                            </div>
                                                            <div class="ms-2 flex-grow-1">
                                                                <h5 class="mb-0">View Pending Disputes (43)</h5>
                                                            </div>
                                                        </div>
                                                        <p class="mb-2 flex-grow-1">View all pending dispute requests</p>

                                                        <p class="action mb-0">View disputes</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-4 mb-lg-0 mb-3">
                                            <a href="#" class="text-decoration-none">
                                                <div class="card dash-card bg-custom-color-2 h-100 border-0">
                                                    <div class="card-body d-flex flex-column">
                                                        <div class="d-flex avatar-holder align-items-center mb-3">
                                                            <div class="position-relative flex-shrink-0">
                                                                <img src="images/union-icon.svg" class="img-fluid" />
                                                            </div>
                                                            <div class="ms-2 flex-grow-1">
                                                                <h5 class="mb-0">Create Unions</h5>
                                                            </div>
                                                        </div>
                                                        <p class="mb-2 flex-grow-1">Create Unions and invite their respective admins</p>

                                                        <p class="action mb-0">Create Unions</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-4 mb-lg-0 mb-3">
                                            <a href="#" class="text-decoration-none">
                                                <div class="card dash-card bg-custom-color-2 h-100 border-0">
                                                    <div class="card-body d-flex flex-column">
                                                        <div class="d-flex avatar-holder align-items-center mb-3">
                                                            <div class="position-relative flex-shrink-0">
                                                                <img src="images/userz-icon.svg" class="img-fluid" />
                                                            </div>
                                                            <div class="ms-2 flex-grow-1">
                                                                <h5 class="mb-0">Invite Users</h5>
                                                            </div>
                                                        </div>
                                                        <p class="mb-2 flex-grow-1">Invite users individually or in bulk to NDRS</p>

                                                        <p class="action mb-0">Invite users</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h4 class="mb-0 heading-4">Reports</h4>
                                        <a href="#" class="text-main-primary text-decoration-none text-medium">Show all</a>
                                    </div>
                                    
                                    <div class="card p-lg-4 mb-5">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4">
                                                    <h3 class="chart-text">There has been a <span class="text-main-primary">32% decrease</span> in total time of Dispute Resolutions over the past <span class="text-main-primary">1 year</span></h3>
                                                </div>

                                                <div class="col-lg-8">
                                                    <!-- <img src="images/bar-chart.svg" class="img-fluid" alt="bar-chart" /> -->

                                                    <canvas id="myChart3"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h4 class="mb-0 heading-4">Notifications</h4>
                                        <a href="notifications.php" class="text-main-primary text-decoration-none text-medium">Show all</a>
                                    </div>
                                    
                                    <div class="card p-lg-1 mb-5">
                                        <div class="card-body p-0">
                                            
                                            <div class="d-flex avatar-holder bg-custom-color-2 p-3 rounded my-4">
                                                <div class="position-relative">
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <img src="images/ipman-logo.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                    </div>
                                                </div>
                                                <div class="ms-2 flex-grow-1">

                                                    <div class="mb-2 d-flex align-items-center">
                                                    <p class="mb-0"><strong>Atoyebi Damola (Ministry Admin)</strong> added you as <strong>Concilliator</strong> for <strong>Dispute Case 124</strong></p>
                                                    </div>

                                                    <div class="">
                                                        <p class="mb-0">2 hours ago</p>
                                                    </div>

                                                </div>
                                            
                                            </div>
                                            
                                            <div class="d-flex avatar-holder bg-custom-color-2 p-3 rounded my-4">
                                                <div class="position-relative">
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <img src="images/ipman-logo.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                    </div>
                                                </div>
                                                <div class="ms-2 flex-grow-1">

                                                    <div class="mb-2 d-flex align-items-center">
                                                    <p class="mb-0"><strong>John Balami</strong> (IAP/Tribunal) has given a <strong>Binding Decision</strong> for <strong>Dispute Case 124</strong></p>
                                                    </div>

                                                    <div class="">
                                                        <p class="mb-0">2 hours ago</p>
                                                    </div>

                                                </div>
                                            
                                            </div>
                                            
                                            <div class="d-flex avatar-holder bg-custom-color-2 p-3 rounded my-4">
                                                <div class="position-relative">
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <img src="images/ipman-logo.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                    </div>
                                                </div>
                                                <div class="ms-2 flex-grow-1">

                                                    <div class="mb-2 d-flex align-items-center">
                                                    <p class="mb-0"><strong>Atoyebi Damola (Ministry Admin)</strong> shared a document for <strong>Dispute Case 124</strong></p>
                                                    </div>

                                                    <div class="">
                                                        <p class="mb-0">2 hours ago</p>
                                                    </div>

                                                </div>
                                            
                                            </div>
                                           
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h4 class="mb-0 heading-4">Recent Discussions</h4>
                                            <a href="#" class="text-main-primary text-decoration-none text-medium">Show all</a>
                                        </div>
                                        <div class="card dash-card">
                                            <div class="card-body">
                                                <div class="d-flex avatar-holder my-4">
                                                    <div class="position-relative">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <img src="images/user-photo.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                                        </div>
                                                    </div>
                                                    <div class="ms-2 flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-center mb-2">

                                                            <div class="mb-0 d-flex align-items-center">
                                                                <div class="heading-text text-truncate max-150">Bala Abdulkareem</div> 
                                                                <span class="card-text-sm ms-2">DS131</span>
                                                            </div>

                                                            <span class="text-main-primary ft-sm-only">12.30</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-start">
                                                            <p class="mb-0 action line-clamp-2">I'd definitely shoot any discussions to all discussion in the box</p>
                                                            <span class="badge rounded-pill text-bg-main">4</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex avatar-holder my-4">
                                                    <div class="position-relative">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <img src="images/user-photo.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                                        </div>
                                                    </div>
                                                    <div class="ms-2 flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                                            
                                                            <div class="mb-0 d-flex align-items-center">
                                                                <div class="heading-text text-truncate max-150">Bala Abdulkareem</div> 
                                                                <span class="card-text-sm ms-2">DS131</span>
                                                            </div>

                                                            <span class="text-main-primary ft-sm-only">12.30</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-start">
                                                            <p class="mb-0 action line-clamp-2">I'd definitely shoot any discussions to all discussion in the box</p>
                                                            <span class="badge rounded-pill text-bg-main">4</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex avatar-holder my-4">
                                                    <div class="position-relative">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <img src="images/user-photo.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                                        </div>
                                                    </div>
                                                    <div class="ms-2 flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                                            
                                                            <div class="mb-0 d-flex align-items-center">
                                                                <div class="heading-text text-truncate max-150">Bala Abdulkareem</div> 
                                                                <span class="card-text-sm ms-2">DS131</span>
                                                            </div>

                                                            <span class="text-main-primary ft-sm-only">12.30</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-start">
                                                            <p class="mb-0 action line-clamp-2">I'd definitely shoot any discussions to all discussion in the box</p>
                                                            <span class="badge rounded-pill text-bg-main">4</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex avatar-holder my-4">
                                                    <div class="position-relative">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <img src="images/user-photo.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                                        </div>
                                                    </div>
                                                    <div class="ms-2 flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                                            
                                                            <div class="mb-0 d-flex align-items-center">
                                                                <div class="heading-text text-truncate max-150">Bala Abdulkareem</div> 
                                                                <span class="card-text-sm ms-2">DS131</span>
                                                            </div>

                                                            <span class="text-main-primary ft-sm-only">12.30</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-start">
                                                            <p class="mb-0 action line-clamp-2">I'd definitely shoot any discussions to all discussion in the box</p>
                                                            <span class="badge rounded-pill text-bg-main">4</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h4 class="mb-0 heading-4">Recent Documents</h4>
                                            <a href="#" class="text-main-primary text-decoration-none text-medium">Show all</a>
                                        </div>
                                        <div class="card dash-card">
                                            <div class="card-body">

                                                <div class="d-flex avatar-holder my-4">
                                                    <div class="position-relative">
                                                        <div class="flex-shrink-0">
                                                            <img src="images/pdf-icon.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="PDF" />
                                                        </div>
                                                    </div>
                                                    <div class="ms-2 flex-grow-1">

                                                        <div class="mb-2 d-flex align-items-center">
                                                            <div class="heading-text text-truncate max-150">Union Guidelines Union Guidelines</div> <span class="card-text-sm ms-2">DS131</span>
                                                        </div>

                                                        <div class="d-flex justify-content-between align-items-center">

                                                            <p class="mb-0">11 Sep, 2023 | 12:24pm <i class="bi bi-dot"></i> <span class="text-medium">13MB</span></p>

                                                        </div>

                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <img src="images/union-3.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                                    </div>
                                                </div>

                                                <div class="d-flex avatar-holder my-4">
                                                    <div class="position-relative">
                                                        <div class="flex-shrink-0">
                                                            <img src="images/pdf-icon.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="PDF" />
                                                        </div>
                                                    </div>
                                                    <div class="ms-2 flex-grow-1">

                                                        <div class="mb-2 d-flex align-items-center">
                                                            <div class="heading-text text-truncate max-150">Union Guidelines Union Guidelines</div> <span class="card-text-sm ms-2">DS131</span>
                                                        </div>

                                                        <div class="d-flex justify-content-between align-items-center">

                                                            <p class="mb-0">11 Sep, 2023 | 12:24pm <i class="bi bi-dot"></i> <span class="text-medium">13MB</span></p>

                                                        </div>

                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <img src="images/union-3.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                                    </div>
                                                </div>

                                                <div class="d-flex avatar-holder my-4">
                                                    <div class="position-relative">
                                                        <div class="flex-shrink-0">
                                                            <img src="images/jpg-icon.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="PDF" />
                                                        </div>
                                                    </div>
                                                    <div class="ms-2 flex-grow-1">

                                                        <div class="mb-2 d-flex align-items-center">
                                                            <div class="heading-text text-truncate max-150">Union Guidelines Union Guidelines</div> <span class="card-text-sm ms-2">DS131</span>
                                                        </div>

                                                        <div class="d-flex justify-content-between align-items-center">

                                                            <p class="mb-0">11 Sep, 2023 | 12:24pm <i class="bi bi-dot"></i> <span class="text-medium">13MB</span></p>

                                                        </div>

                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <img src="images/union-3.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                                    </div>
                                                </div>

                                                <div class="d-flex avatar-holder my-4">
                                                    <div class="position-relative">
                                                        <div class="flex-shrink-0">
                                                            <img src="images/png-icon.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="PDF" />
                                                        </div>
                                                    </div>
                                                    <div class="ms-2 flex-grow-1">

                                                        <div class="mb-2 d-flex align-items-center">
                                                            <div class="heading-text text-truncate max-150">Union Guidelines Union Guidelines</div> <span class="card-text-sm ms-2">DS131</span>
                                                        </div>

                                                        <div class="d-flex justify-content-between align-items-center">

                                                            <p class="mb-0">11 Sep, 2023 | 12:24pm <i class="bi bi-dot"></i> <span class="text-medium">13MB</span></p>

                                                        </div>

                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <img src="images/union-3.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
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