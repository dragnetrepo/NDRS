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
                            <h2>DS138 <img src="images/conc.svg" class="img-fluid" alt="Conc" /></h2>
                            <p>Measures Concerning Trading Agricultural Goods</p>
                        </div>
                    </div>

                    <div class="content-main">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="margin-top-negative">
                                        <ul class="nav custom-tab nav-underline mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="true">Case Details</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-discussion-tab" data-bs-toggle="pill" data-bs-target="#pills-discussion" type="button" role="tab" aria-controls="pills-discussion" aria-selected="false">Case Discussions</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-document-tab" data-bs-toggle="pill" data-bs-target="#pills-document" type="button" role="tab" aria-controls="pills-document" aria-selected="false">Case Documents</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-notification-tab" data-bs-toggle="pill" data-bs-target="#pills-notification" type="button" role="tab" aria-controls="pills-notification" aria-selected="false">Case Notifications</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">

                                            <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab" tabindex="0">

                                                <div class="row mt-5">
                                                    <div class="col-lg-2">

                                                        <div class="nav flex-column tab-item nav-pills gap-10" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                                            <button class="nav-link tab-v text-start active" id="v-pills-overview-tab" data-bs-toggle="pill" data-bs-target="#v-pills-overview" type="button" role="tab" aria-controls="v-pills-overview" aria-selected="true">Overview</button>

                                                            <button class="nav-link tab-v text-start" id="v-pills-involved-tab" data-bs-toggle="pill" data-bs-target="#v-pills-involved" type="button" role="tab" aria-controls="v-pills-involved" aria-selected="false">Involved parties</button>

                                                        </div>

                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tab-content" id="v-pills-tabContent">

                                                             <div class="tab-pane fade show active" id="v-pills-overview" role="tabpanel" aria-labelledby="v-pills-overview-tab" tabindex="0">
                                                                <div class="card mb-4">
                                                                    <div class="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                                                        <h3 class="mb-lg-0 mb-3">Overview</h3>
                                                                        <div class="d-flex align-items-center gap-15">
                                                                        
                                                                            <a href="#" class="btn btn-size btn-main-primary" disabled>Approved case</a>

                                                                            <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                            </button>
                                                                            <ul class="dropdown-menu border-radius action-menu-2">
                                                                                <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body p-4">
                                                                        <form>
                                                                            <div class="">
                                                                                <div class="mb-4">
                                                                                    <label class="form-label">Case ID</label>
                                                                                    <input type="text" class="form-control form-control-height" value="Case ID" disabled>
                                                                                </div>
                                                                                <div class="mb-4">
                                                                                    <label class="form-label">Case title</label>
                                                                                    <input type="text" class="form-control form-control-height" value="Measures Concerning Trading Agricultural Goods" disabled>
                                                                                </div>
                                                                                <div class="mb-4">
                                                                                    <label class="form-label">Dispute type</label>
                                                                                    <input type="text" class="form-control form-control-height" value="Union Representation Issues" disabled>
                                                                                </div>
                                                                                <div class="mb-4">
                                                                                    <label class="form-label">Dispute status</label>
                                                                                    <div><span class="text-muted-3">Ongoing</span> <img src="images/conc.svg" class="img-fluid" /></div>
                                                                                </div>
                                                                                <div class="mb-4">
                                                                                    <label class="form-label">Filing date</label>
                                                                                    <input type="text" class="form-control form-control-height" value="Feb 1, 2024" disabled>
                                                                                </div>
                                                                                <div class="mb-4">
                                                                                    <label class="form-label">Cause of dispute</label>
                                                                                    <textarea class="form-control" rows="4" value="" disabled>The University of Lagos, popularly known as UNILAG, is a public research university located in Lagos, Nigeria and was founded in 1962. UNILAG is one of the first generation universities in Nigeria and is ranked among the top universities in the country in major education publications.
                                                                                    </textarea>
                                                                                </div>
                                                                                <div class="mb-4">
                                                                                    <label class="form-label">Relief Sought</label>
                                                                                    <textarea class="form-control" rows="4" value="" disabled>1.  Declare a specific measure (e.g., import ban) violates trade rules.2. Withdraw the measure or bring it into compliance with agreements.3. Compensate for damages caused by the measure.
                                                                                    </textarea>
                                                                                </div>
                                                                                <div class="mb-4">
                                                                                    <label class="form-label">Settlement Offers</label>
                                                                                    <textarea class="form-control" rows="4" value="" disabled> 1.  Declare a specific measure (e.g., import ban) violates trade rules.2. Withdraw the measure or bring it into compliance with agreements.3. Compensate for damages caused by the measure.
                                                                                    </textarea>
                                                                                </div>
                                                                                <div class="mb-4">
                                                                                    <label class="form-label">Awards & Rulings</label>
                                                                                    <textarea class="form-control" rows="4" value="" disabled> 1.  Declare a specific measure (e.g., import ban) violates trade rules.2. Withdraw the measure or bring it into compliance with agreements.
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                             </div>

                                                             <div class="tab-pane fade" id="v-pills-involved" role="tabpanel" aria-labelledby="v-pills-involved-tab" tabindex="0">

                                                                <div class="card mb-4">
                                                                    <div class="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                                                        <h3 class="mb-lg-0 mb-3">Involved parties</h3>
                                                                        <div class="d-flex align-items-center gap-15">
                                                                        
                                                                            <a href="#" class="btn btn-size btn-main-primary" data-bs-toggle="modal" data-bs-target="#inviteModal">Invite users</a>

                                                                            <!-- <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                            </button>
                                                                            <ul class="dropdown-menu border-radius action-menu-2">
                                                                                <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                            </ul> -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body p-4">

                                                                        <div class="py-4">
                                                                            <h4 class="heading-4 mb-4">Claimants</h4>

                                                                            <table class="table table-list">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th scope="col">Name</th>
                                                                                        <th scope="col">Joined</th>
                                                                                        <th scope="col">Role</th>
                                                                                        <th scope="col"></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/claimant.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/claimant.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/claimant.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/claimant.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>

                                                                        <div class="py-4">
                                                                            <h4 class="heading-4 mb-4">Respondents</h4>

                                                                            <table class="table table-list">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th scope="col">Name</th>
                                                                                        <th scope="col">Joined</th>
                                                                                        <th scope="col">Role</th>
                                                                                        <th scope="col"></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/respond.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/respond.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/respond.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/respond.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>

                                                                        <div class="py-4">
                                                                            <h4 class="heading-4 mb-4">Concilliators</h4>

                                                                            <table class="table table-list">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th scope="col">Name</th>
                                                                                        <th scope="col">Joined</th>
                                                                                        <th scope="col">Role</th>
                                                                                        <th scope="col"></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/conc.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/conc.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/conc.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/conc.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>

                                                                        <div class="py-4">
                                                                            <h4 class="heading-4 mb-4">Arbitration Tribunal</h4>

                                                                            <table class="table table-list">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th scope="col">Name</th>
                                                                                        <th scope="col">Joined</th>
                                                                                        <th scope="col">Role</th>
                                                                                        <th scope="col"></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/arbitation.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/arbitation.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/arbitation.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            <div class="d-flex avatar-holder">
                                                                                                <div class="position-relative">
                                                                                                    
                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>Feb 4 2023</td>
                                                                                        <td>
                                                                                            <img src="images/arbitation.svg" class="img-fluid" alt="claimant" />
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="dropdown">
                                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                                </button>
                                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                             </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="pills-discussion" role="tabpanel" aria-labelledby="pills-discussion-tab" tabindex="0">

                                                <?php include "./components/discussion.inc.php"; ?>

                                            </div>
                                            <div class="tab-pane fade" id="pills-document" role="tabpanel" aria-labelledby="pills-document-tab" tabindex="0">
                                            <div class="row mt-5">
                                                    <div class="col-lg-2">

                                                        <div class="nav flex-column tab-item nav-pills gap-10" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                                            <button class="nav-link tab-v text-start active" id="v-pills-doc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-doc" type="button" role="tab" aria-controls="v-pills-doc" aria-selected="true">DS138 Documents</button>

                                                            <button class="nav-link tab-v text-start" id="v-pills-folder-tab" data-bs-toggle="pill" data-bs-target="#v-pills-folder" type="button" role="tab" aria-controls="v-pills-folder" aria-selected="false">All Folders</button>

                                                        </div>

                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="tab-content" id="v-pills-tabContent">

                                                             <div class="tab-pane fade show active" id="v-pills-doc" role="tabpanel" aria-labelledby="v-pills-doc-tab" tabindex="0">
                                                                <div class="card mb-4">
                                                                    <div class="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                                                        <h3 class="mb-lg-0 mb-3">DS138 Documents</h3>
                                                                        <div class="d-flex align-items-center gap-15">
                                                                        
                                                                            <a href="#" class="btn btn-size btn-main-primary">Create Document</a>

                                                                            <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                            </button>
                                                                            <ul class="dropdown-menu border-radius action-menu-2">
                                                                                <li><a class="dropdown-item" href="#">A-Z</a></li>
                                                                                <li><a class="dropdown-item" href="#">Most Recent</a></li>
                                                                                <li><a class="dropdown-item" href="#">Oldest</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body p-4">
                                                                        <div class="row mt-2 mb-4">
                                                                            <div class="col-lg-6">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-text bg-transparent">
                                                                                        <img src="images/search.svg" class="img-fluid" alt="search">
                                                                                    </span>
                                                                                    <input type="search" class="form-control border-start-0 form-control-height" placeholder="Search here...">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-6">
                                                                                <div class="d-flex align-items-center justify-content-between gap-15">

                                                                                    <a class="btn btn-size btn-outline-light text-medium px-3"><img src="images/filter.svg" class="img-fluid me-2"> A-Z</a>

                                                                                    <p class="text-end mb-0 file-count">Files: 927</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <table class="table table-list">
                                                                                    <thead class="table-light">
                                                                                        <tr>
                                                                                            <th scope="col">
                                                                                                <div>
                                                                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                                                                                </div>
                                                                                            </th>
                                                                                            <th scope="col">Name</th>
                                                                                            <th scope="col">Size</th>
                                                                                            <th scope="col">File Type</th>
                                                                                            <th scope="col">Last Modified</th>
                                                                                            <th scope="col">Actions</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>

                                                                                        <tr>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div title="Shalom Winner - Solar Sales Receipt Installation" class="text-truncate max-200">Shalom Winner - Solar Sales Receipt Installation</div>
                                                                                            </td>
                                                                                            <td>1.2 MB</td>
                                                                                            <td>PDF</td>
                                                                                            <td>12/07/23</td>
                                                                                            <td>
                                                                                                <div class="dropdown">
                                                                                                    <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                        <img src="images/dots-v.svg" class="img-fluid" alt="dots" />
                                                                                                    </button>
                                                                                                    <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                        <li><a class="dropdown-item" href="#">Download</a></li>
                                                                                                        <li><a class="dropdown-item" href="#">Copy</a></li>
                                                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div title="Matthews Jack - Solar Utility Approval - Dawn Solar Lv1" class="text-truncate max-200">Matthews Jack - Solar Utility Approval - Dawn Solar Lv1</div>
                                                                                            </td>
                                                                                            <td>1.2 MB</td>
                                                                                            <td>JPG</td>
                                                                                            <td>12/07/23</td>
                                                                                            <td>
                                                                                                <div class="dropdown">
                                                                                                    <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                        <img src="images/dots-v.svg" class="img-fluid" alt="dots" />
                                                                                                    </button>
                                                                                                    <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                        <li><a class="dropdown-item" href="#">Download</a></li>
                                                                                                        <li><a class="dropdown-item" href="#">Copy</a></li>
                                                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div title="Hillary Wilton - Solar Sales Receipt Installation" class="text-truncate max-200">Hillary Wilton - Solar Sales Receipt Installation</div>
                                                                                            </td>
                                                                                            <td>1.2 MB</td>
                                                                                            <td>GIF</td>
                                                                                            <td>12/07/23</td>
                                                                                            <td>
                                                                                                <div class="dropdown">
                                                                                                    <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                        <img src="images/dots-v.svg" class="img-fluid" alt="dots" />
                                                                                                    </button>
                                                                                                    <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                        <li><a class="dropdown-item" href="#">Download</a></li>
                                                                                                        <li><a class="dropdown-item" href="#">Copy</a></li>
                                                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                             </div>

                                                             <div class="tab-pane fade" id="v-pills-folder" role="tabpanel" aria-labelledby="v-pills-folder-tab" tabindex="0">

                                                             <div class="card mb-4">
                                                                    <div class="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">

                                                                        <div class="mb-lg-0 mb-3">
                                                                            <h3>Folders</h3>
                                                                            <p class="mb-0 text-muted-3">Each dispute case automatically creates a new folder</p>
                                                                        </div>

                                                                        <div class="d-flex align-items-center gap-15">
                                                                        
                                                                            <a href="#" class="btn btn-size btn-main-primary">Create Folder</a>

                                                                            <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                            </button>
                                                                            <ul class="dropdown-menu border-radius action-menu-2">
                                                                                <li><a class="dropdown-item" href="#">A-Z</a></li>
                                                                                <li><a class="dropdown-item" href="#">Most Recent</a></li>
                                                                                <li><a class="dropdown-item" href="#">Oldest</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body p-4">
                                                                        <div class="row mt-2 mb-4">
                                                                            <div class="col-lg-6">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-text bg-transparent">
                                                                                        <img src="images/search.svg" class="img-fluid" alt="search">
                                                                                    </span>
                                                                                    <input type="search" class="form-control border-start-0 form-control-height" placeholder="Search here...">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-6">
                                                                                <div class="d-flex align-items-center justify-content-between gap-15">

                                                                                    <a class="btn btn-size btn-outline-light text-medium px-3"><img src="images/filter.svg" class="img-fluid me-2"> A-Z</a>

                                                                                    <p class="text-end mb-0 file-count">Folders: 927</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <table class="table table-list">
                                                                                    <thead class="table-light">
                                                                                        <tr>
                                                                                            <th scope="col">
                                                                                                <div>
                                                                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                                                                                </div>
                                                                                            </th>
                                                                                            <th scope="col">Name</th>
                                                                                            <th scope="col">Size</th>
                                                                                            <th scope="col">No of Docs</th>
                                                                                            <th scope="col">Last Modified</th>
                                                                                            <th scope="col"></th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>

                                                                                        <tr>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div title="DS138" class="text-truncate max-200">DS138</div>
                                                                                            </td>
                                                                                            <td>1.2 MB</td>
                                                                                            <td>12</td>
                                                                                            <td>12/07/23</td>
                                                                                            <td>
                                                                                                <div class="dropdown">
                                                                                                    <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                        <img src="images/dots-v.svg" class="img-fluid" alt="dots" />
                                                                                                    </button>
                                                                                                    <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                        <li><a class="dropdown-item" href="#">Download</a></li>
                                                                                                        <li><a class="dropdown-item" href="#">Copy</a></li>
                                                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div title="DS138" class="text-truncate max-200">DS138</div>
                                                                                            </td>
                                                                                            <td>1.2 MB</td>
                                                                                            <td>12</td>
                                                                                            <td>12/07/23</td>
                                                                                            <td>
                                                                                                <div class="dropdown">
                                                                                                    <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                        <img src="images/dots-v.svg" class="img-fluid" alt="dots" />
                                                                                                    </button>
                                                                                                    <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                        <li><a class="dropdown-item" href="#">Download</a></li>
                                                                                                        <li><a class="dropdown-item" href="#">Copy</a></li>
                                                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div title="DS138" class="text-truncate max-200">DS138</div>
                                                                                            </td>
                                                                                            <td>1.2 MB</td>
                                                                                            <td>12</td>
                                                                                            <td>12/07/23</td>
                                                                                            <td>
                                                                                                <div class="dropdown">
                                                                                                    <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                        <img src="images/dots-v.svg" class="img-fluid" alt="dots" />
                                                                                                    </button>
                                                                                                    <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                        <li><a class="dropdown-item" href="#">Download</a></li>
                                                                                                        <li><a class="dropdown-item" href="#">Copy</a></li>
                                                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                             </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab" tabindex="0">
                                               
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


    <!-- Modal -->
    <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 p-lg-4 p-3">
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="images/user-icon.svg" class="img-fluid mb-3" alt="create an account" /> 
                    </div>
                    <h1 class="heading modal-heading text-center mb-3">What role are you requesting for?</h1>
                    <p class="mb-4 modal-text text-center">Current role - Organization Admin</p> 
                    

                    <form>

                        <p class="text-bold">Select new role</p>

                        <ul class="list-group new-role">
                            <li class="list-group-item d-flex justify-content-between active p-3">National Union Admin <i class="bi bi-check-circle-fill text-main-primary"></i></li>
                            <li class="list-group-item d-flex justify-content-between p-3">Ministry Admin</li>
                            <li class="list-group-item d-flex justify-content-between p-3">Organization Member</li>
                        </ul>
                        
                        <div class="mt-4">
                            <button class="btn btn-size btn-main-primary w-100">Send Request</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="inviteModal" tabindex="-1" aria-labelledby="inviteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-header py-4">
                    <h1 class="modal-title fs-5">Send invites</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row my-4">
                        <div class="col-lg-7">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent">
                                    <img src="images/search.svg" class="img-fluid" alt="search">
                                </span>
                                <input type="search" class="form-control border-start-0 form-control-height" placeholder="Type an email to send an invite">
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="d-flex align-items-center justify-content-between gap-15">

                                <select class="form-control form-control-height w-50">
                                    <option selected hidden>Select role</option>
                                    <option>Claimants</option>
                                    <option>Respondents</option>
                                    <option>Minsitry Admin</option>
                                    <option>National Union Admin</option>
                                    <option>Union Branch Admin</option>
                                    <option>Employers (Companies & Organizations) </option>
                                    <option>Staff (Union Members) </option>
                                    <option>Conciliators & Arbitrators</option>
                                    <option>Mediators</option>
                                    <option>Industrial Arbitration Panel (Tribunal)</option>
                                    <option>Board of Enquiry</option>
                                    <option>National Industrial Courts</option>
                                </select>

                                <a href="#" class="btn btn-size btn-main-primary" disabled>Send Invite</a>
                            </div>
                        </div>
                    </div>

                    <p class="text-medium">Union Admins</p>

                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-list">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date added</th>
                                        <th scope="col">Role</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">
                                            <div class="d-flex avatar-holder">
                                                <div class="position-relative">
                                                    
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                    </div>
                                                </div>
                                                <div class="ms-2 flex-grow-1">
                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Feb 4 2023</td>
                                        <td>
                                            <img src="images/claimant.svg" class="img-fluid" alt="claimant" />
                                        </td>
                                        
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img src="images/bin.svg" class="img-fluid" alt="bin" />
                                                </button>
                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td scope="row">
                                            <div class="d-flex avatar-holder">
                                                <div class="position-relative">
                                                    
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                    </div>
                                                </div>
                                                <div class="ms-2 flex-grow-1">
                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Feb 4 2023</td>
                                        <td>
                                            <img src="images/claimant.svg" class="img-fluid" alt="claimant" />
                                        </td>
                                        
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img src="images/bin.svg" class="img-fluid" alt="bin" />
                                                </button>
                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td scope="row">
                                            <div class="d-flex avatar-holder">
                                                <div class="position-relative">
                                                    
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                    </div>
                                                </div>
                                                <div class="ms-2 flex-grow-1">
                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Feb 4 2023</td>
                                        <td>
                                            <img src="images/claimant.svg" class="img-fluid" alt="claimant" />
                                        </td>
                                        
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img src="images/bin.svg" class="img-fluid" alt="bin" />
                                                </button>
                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td scope="row">
                                            <div class="d-flex avatar-holder">
                                                <div class="position-relative">
                                                    
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                    </div>
                                                </div>
                                                <div class="ms-2 flex-grow-1">
                                                    <h5 class="mb-0">Salim Mustapha</h5>
                                                    <p class="mb-0 text-muted-3">salimmusty@gmail.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Feb 4 2023</td>
                                        <td>
                                            <img src="images/claimant.svg" class="img-fluid" alt="claimant" />
                                        </td>
                                        
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img src="images/bin.svg" class="img-fluid" alt="bin" />
                                                </button>
                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                    <li><a class="dropdown-item" href="disputes-details.php">View details</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-list">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date added</th>
                                        <th scope="col">Role</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="card no-admin-card rounded-0">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <div class="text-center">
                                        <h4 class="">No admins found</h4>

                                        <p class="text-muted-3">Enter an admins email and role to send invite</p>

                                        <div class="text-center">
                                            <img src="images/no-found.svg" class="img-fluid" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>