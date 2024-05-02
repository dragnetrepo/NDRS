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
                            <h2>Users & Groups </h2>
                        </div>
                    </div>

                    <div class="content-main">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="margin-top-negative">
                                        <ul class="nav custom-tab nav-underline mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-invite-tab" data-bs-toggle="pill" data-bs-target="#pills-invite" type="button" role="tab" aria-controls="pills-invite" aria-selected="true">Invite</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-individual-tab" data-bs-toggle="pill" data-bs-target="#pills-individual" type="button" role="tab" aria-controls="pills-individual" aria-selected="false">Individual Users</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-settlement-tab" data-bs-toggle="pill" data-bs-target="#pills-settlement" type="button" role="tab" aria-controls="pills-settlement" aria-selected="false">Settlement Management Bodies</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">

                                            <div class="tab-pane fade show active" id="pills-invite" role="tabpanel" aria-labelledby="pills-invite-tab" tabindex="0">
                                                <div class="row mt-5">
                                                    <div class="col-lg-3">

                                                        <div class="nav flex-column tab-item nav-pills gap-10" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                                            <button class="nav-link tab-v text-start active" id="v-pills-bulk-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bulk" type="button" role="tab" aria-controls="v-pills-bulk" aria-selected="true">Bulk Union upload</button>

                                                            <button class="nav-link tab-v text-start" id="v-pills-single-tab" data-bs-toggle="pill" data-bs-target="#v-pills-single" type="button" role="tab" aria-controls="v-pills-single" aria-selected="false">Single Union upload</button>


                                                        </div>

                                                    </div>

                                                    <div class="col-lg-9">
                                                        <div class="tab-content" id="v-pills-tabContent">

                                                             <div class="tab-pane fade show active" id="v-pills-bulk" role="tabpanel" aria-labelledby="v-pills-bulk-tab" tabindex="0">
                                                                <div class="card mb-4">
                                                                    <div class="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                                                        <h3 class="mb-lg-0 mb-3">Bulk Invites</h3>
                                                                    </div>
                                                                    <div class="card-body p-4">
                                                                       
                                                                        <div class="row mb-4">
                                                                            <div class="col-lg-5 mb-lg-0 mb-3">
                                                                                <h6 class="step-text">Step 1.</h6>
                                                                                <p class="text-muted-3">Download the CSV template for any user type or settlement bodies</p>
                                                                            </div>
                                                                            <div class="col-lg-5 offset-lg-2">
                                                                                <button class="btn btn-main-outline-primary btn-size">Download CSV template</button>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-4">
                                                                            <div class="col-lg-5 mb-lg-0 mb-3">
                                                                                <h6 class="step-text">Step 2.</h6>
                                                                                <p class="text-muted-3">Fill in the users details into the CSV file</p>
                                                                            </div>
                                                                            <div class="col-lg-5 offset-lg-2">
                                                                                <img src="images/csv.png" class="img-fluid" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-4">
                                                                            <div class="col-lg-5 mb-lg-0 mb-3">
                                                                                <h6 class="step-text">Step 3.</h6>
                                                                                <p class="text-muted-3">Upload the filled CSV file</p>
                                                                            </div>
                                                                            <div class="col-lg-5 offset-lg-2">
                                                                               <div class="upload-box text-center px-3 py-4">
                                                                                    <div class="text-center mb-2">
                                                                                        <img src="images/file_upload_states.svg" class="img-fluid" />
                                                                                    </div>
                                                                                    <p class="text-muted-3 mb-1">Drag and drop to upload</p>
                                                                                    <p class="font-sm text-muted">CSV (max. 50mb)</p>

                                                                                    <img src="images/or-line.svg" class="img-fluid" />

                                                                                    <div class="mt-3">
                                                                                        <button class="btn btn-main-primary btn-size mx-auto"><i class="bi bi-upload me-2"></i> Upload filled CSV</button>
                                                                                    </div>
                                                                               </div>
                                                                               <div class="upload-box upload-box-success text-center px-3 py-4">
                                                                                    <div class="text-center mb-2">
                                                                                        <img src="images/uploaded.svg" class="img-fluid" />
                                                                                    </div>
                                                                                    <p class="text-dark text-medium mb-1">Ministry Admins</p>
                                                                                    <p class="font-sm text-muted">CSV 2.63mb</p>

                                                                                    <p class="text-medium"><a href="#" data-bs-toggle="modal" data-bs-target="#previewModal" class="text-decoration-none text-main-primary"><img src="images/eyes.svg" class="img-fluid"> Preview Sent Invites</a></p>

                                                                                    <p class="text-medium"><a href="#" class="text-decoration-none text-muted-3"><img src="images/trash-bin.svg" class="img-fluid"> Clear Upload</a></p>

                                                                               </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                             </div>

                                                             <div class="tab-pane fade" id="v-pills-single" role="tabpanel" aria-labelledby="v-pills-single-tab" tabindex="0">
                                                                <div class="card mb-4">
                                                                    <div class="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                                                        <h3 class="mb-lg-0 mb-3">Single Invite</h3>

                                                                        <a href="#" class="btn btn-size btn-main-primary">Send Invite</a>
                                                                    </div>
                                                                    <div class="card-body p-4">
                                                                       
                                                                        <form>
                                                                            <div class="row mt-4">
                                                                                <div class="col-lg-12">
                                                                                    <div class="mb-4">
                                                                                        <label class="form-label">User’s email</label>
                                                                                        <input type="email" class="form-control form-control-height" placeholder="Enter User’s email" value="Joshephmakinde@gmail.com">
                                                                                    </div>

                                                                                    <div class="mb-4">
                                                                                        <label class="form-label">User’s role</label>
                                                                                        <select class="form-select form-control-height">
                                                                                            <option>Type or select a user type</option>
                                                                                            <option>Ministry Admin</option>
                                                                                            <option>National Union Admin</option>
                                                                                            <option>Union Branch Admin</option>
                                                                                            <option>Employers (Companies & Organizations) </option>
                                                                                            <option>Staff (Employees & Union Members)  </option>
                                                                                            <option>Conciliators & Arbitrators</option>
                                                                                            <option>Mediators</option>
                                                                                            <option>Industrial Arbitration Panel (Tribunal)</option>
                                                                                            <option>Board of Enquiry</option>
                                                                                            <option>National Industrial Courts</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    
                                                                                    <div class="mb-4">
                                                                                        <label class="form-label">Invite to a dispute case <span class="text-muted-3">(optional)</span></label>
                                                                                        <select class="form-select form-control-height">
                                                                                            <option>Type or select a dispute case</option>
                                                                                            <option>DS123</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </form>

                                                                    </div>

                                                                </div>
                                                             </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="pills-individual" role="tabpanel" aria-labelledby="pills-individual-tab" tabindex="0">

                                                <div class="row mt-5">
                                                    <div class="col-lg-3">

                                                        <div class="nav flex-column tab-item nav-pills gap-10" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                                            <button class="nav-link tab-v text-start active" id="v-pills-ministry-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ministry" type="button" role="tab" aria-controls="v-pills-ministry" aria-selected="true">Ministry Admins</button>

                                                            <button class="nav-link tab-v text-start" id="v-pills-national-tab" data-bs-toggle="pill" data-bs-target="#v-pills-national" type="button" role="tab" aria-controls="v-pills-national" aria-selected="false">National Union Admins</button>

                                                            <button class="nav-link tab-v text-start" id="v-pills-branch-tab" data-bs-toggle="pill" data-bs-target="#v-pills-branch" type="button" role="tab" aria-controls="v-pills-branch" aria-selected="false">Union Branch Admins</button>

                                                            <button class="nav-link tab-v text-start" id="v-pills-employers-tab" data-bs-toggle="pill" data-bs-target="#v-pills-employers" type="button" role="tab" aria-controls="v-pills-employers" aria-selected="false">Employers </button>

                                                            <button class="nav-link tab-v text-start" id="v-pills-staff-tab" data-bs-toggle="pill" data-bs-target="#v-pills-staff" type="button" role="tab" aria-controls="v-pills-staff" aria-selected="false">Staff (Employees)</button>
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-9">
                                                        <div class="tab-content" id="v-pills-tabContent">

                                                             <div class="tab-pane fade show active" id="v-pills-ministry" role="tabpanel" aria-labelledby="v-pills-ministry-tab" tabindex="0">
                                                                <div class="card mb-4">
                                                        
                                                                    <div class="card-body p-4">
                                                                        <div class="row mt-2 mb-4">
                                                                            <div class="col-lg-5">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-text bg-transparent">
                                                                                        <img src="images/search.svg" class="img-fluid" alt="search">
                                                                                    </span>
                                                                                    <input type="search" class="form-control border-start-0 form-control-height" placeholder="Search here...">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-7">
                                                                                <div class="d-flex align-items-center justify-content-between gap-15">

                                                                                    <div class="d-flex">

                                                                                        <a class="btn btn-size btn-outline-light text-medium px-3 me-lg-3"><img src="images/filter.svg" class="img-fluid"> A-Z</a>

                                                                                        <button class="btn btn-size btn-main-outline-primary px-3"><i class="bi bi-cloud-download me-2"></i> Export CSV</button>

                                                                                    </div>

                                                                                    <p class="text-end mb-0 file-count">Ministry Admins: 64</p>
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
                                                                                            <th scope="col">Ministry Admins</th>
                                                                                            <th scope="col">Assigned Cases</th>
                                                                                            <th scope="col">Status</th>
                                                                                            <th scope="col">Date added</th>
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
                                                                                                <div class="d-flex align-items-center avatar-holder">
                                                                                                    <div class="position-relative">
                                                                                                        <div class="avatar-sm flex-shrink-0">
                                                                                                            <img src="images/user-photo.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="ms-2 flex-grow-1">
                                                                                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                                                                                            
                                                                                                            <div class="mb-0 d-flex align-items-center">
                                                                                                                <div class="heading-text text-truncate max-150">Bala Abdulkareem</div> 
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>12</td>
                                                                                            <td><img src="images/active.svg" class="img-fluid"/></td>
                                                                                            <td>Feb 4 2023</td>
                                                                                            <td>
                                                                                                <div class="dropdown">
                                                                                                    <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                                                                                        <img src="images/dots-v.svg" class="img-fluid" alt="dots" />
                                                                                                    </button>
                                                                                                    <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#disputeModal">Refer to dispute case</a></li>
                                                                                                        <li><h6 class="dropdown-header">Change Status</h6></li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="active">
                                                                                                                    <label class="form-check-label" for="active">
                                                                                                                        Active
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="suspended">
                                                                                                                    <label class="form-check-label" for="suspended">
                                                                                                                        Suspended
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="deactivated">
                                                                                                                    <label class="form-check-label" for="deactivated">
                                                                                                                        Deactivated
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="pending">
                                                                                                                    <label class="form-check-label" for="pending">
                                                                                                                       Pending
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
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

                                                             <div class="tab-pane fade" id="v-pills-national" role="tabpanel" aria-labelledby="v-pills-national-tab" tabindex="0">
                                                                
                                                             </div>

                                                             <div class="tab-pane fade" id="v-pills-branch" role="tabpanel" aria-labelledby="v-pills-branch-tab" tabindex="0">
                                                                
                                                             </div>

                                                             <div class="tab-pane fade" id="v-pills-employer" role="tabpanel" aria-labelledby="v-pills-employer-tab" tabindex="0">
                                                                
                                                             </div>

                                                             <div class="tab-pane fade" id="v-pills-staff" role="tabpanel" aria-labelledby="v-pills-staff-tab" tabindex="0">
                                                                
                                                             </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="pills-settlement" role="tabpanel" aria-labelledby="pills-settlement-tab" tabindex="0">
                                                <div class="row mt-5">
                                                    <div class="col-lg-3">

                                                        <div class="nav flex-column tab-item nav-pills gap-10" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                                            <button class="nav-link tab-v text-start" id="v-pills-con-tab" data-bs-toggle="pill" data-bs-target="#v-pills-con" type="button" role="tab" aria-controls="v-pills-con" aria-selected="false">Conciliators & Arbitrators</button>

                                                            <button class="nav-link tab-v text-start" id="v-pills-med-tab" data-bs-toggle="pill" data-bs-target="#v-pills-med" type="button" role="tab" aria-controls="v-pills-med" aria-selected="false">Mediators</button>

                                                            <button class="nav-link tab-v text-start" id="v-pills-int-tab" data-bs-toggle="pill" data-bs-target="#v-pills-int" type="button" role="tab" aria-controls="v-pills-int" aria-selected="false">Internal Arbitration Panel </button>

                                                            <button class="nav-link tab-v text-start active" id="v-pills-board-tab" data-bs-toggle="pill" data-bs-target="#v-pills-board" type="button" role="tab" aria-controls="v-pills-board" aria-selected="true">Board of Enquiry</button>

                                                            <button class="nav-link tab-v text-start" id="v-pills-ind-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ind" type="button" role="tab" aria-controls="v-pills-ind" aria-selected="false">National Industrial Courts</button>
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-9">
                                                        <div class="tab-content" id="v-pills-tabContent">

                                                             <div class="tab-pane fade" id="v-pills-con" role="tabpanel" aria-labelledby="v-pills-con-tab" tabindex="0">
                                                                
                                                             </div>

                                                             <div class="tab-pane fade" id="v-pills-med" role="tabpanel" aria-labelledby="v-pills-med-tab" tabindex="0">
                                                                
                                                             </div>

                                                             <div class="tab-pane fade" id="v-pills-int" role="tabpanel" aria-labelledby="v-pills-int-tab" tabindex="0">
                                                                
                                                             </div>

                                                             <div class="tab-pane fade show active" id="v-pills-board" role="tabpanel" aria-labelledby="v-pills-board-tab" tabindex="0">
                                                                <div class="card mb-4">
                                                        
                                                                    <div class="card-body p-4">
                                                                        <div class="row mt-2 mb-4">
                                                                            <div class="col-lg-5">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-text bg-transparent">
                                                                                        <img src="images/search.svg" class="img-fluid" alt="search">
                                                                                    </span>
                                                                                    <input type="search" class="form-control border-start-0 form-control-height" placeholder="Search here...">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-7">
                                                                                <div class="d-flex align-items-center justify-content-between gap-15">

                                                                                    <div class="d-flex">

                                                                                        <a class="btn btn-size btn-outline-light text-medium px-3 me-lg-3"><img src="images/filter.svg" class="img-fluid"> A-Z</a>

                                                                                        <button class="btn btn-size btn-main-outline-primary px-3"><i class="bi bi-cloud-download me-2"></i> Export CSV</button>

                                                                                    </div>

                                                                                    <p class="text-end mb-0 file-count">Board of Enquires: 42</p>
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
                                                                                            <th scope="col">Board of Enquiry</th>
                                                                                            <th scope="col">Name</th>
                                                                                            <th scope="col">Assigned Cases</th>
                                                                                            <th scope="col">Status</th>
                                                                                            <th scope="col">Date added</th>
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
                                                                                                <div class="avatars">
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/65.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/65.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/66.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/66.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/67.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/67.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/68.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/69.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/69.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>Health</td>
                                                                                            <td>12</td>
                                                                                            <td><img src="images/active.svg" class="img-fluid"/></td>
                                                                                            <td>Feb 4 2023</td>
                                                                                            <td>
                                                                                                <div class="dropdown">
                                                                                                    <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                                                                                        <img src="images/dots-v.svg" class="img-fluid" alt="dots" />
                                                                                                    </button>
                                                                                                    <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#disputeModal">Refer to dispute case</a></li>
                                                                                                        <li><h6 class="dropdown-header">Change Status</h6></li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="active">
                                                                                                                    <label class="form-check-label" for="active">
                                                                                                                        Active
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="suspended">
                                                                                                                    <label class="form-check-label" for="suspended">
                                                                                                                        Suspended
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="deactivated">
                                                                                                                    <label class="form-check-label" for="deactivated">
                                                                                                                        Deactivated
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="pending">
                                                                                                                    <label class="form-check-label" for="pending">
                                                                                                                       Pending
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
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
                                                                                                <div class="avatars">
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/65.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/65.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/66.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/66.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/67.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/67.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/68.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/69.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/69.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>Health</td>
                                                                                            <td>12</td>
                                                                                            <td><img src="images/pending-icon.svg" class="img-fluid"/></td>
                                                                                            <td>Feb 4 2023</td>
                                                                                            <td>
                                                                                                <div class="dropdown">
                                                                                                    <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                                                                                        <img src="images/dots-v.svg" class="img-fluid" alt="dots" />
                                                                                                    </button>
                                                                                                    <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#disputeModal">Refer to dispute case</a></li>
                                                                                                        <li><h6 class="dropdown-header">Change Status</h6></li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="active">
                                                                                                                    <label class="form-check-label" for="active">
                                                                                                                        Active
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="suspended">
                                                                                                                    <label class="form-check-label" for="suspended">
                                                                                                                        Suspended
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="deactivated">
                                                                                                                    <label class="form-check-label" for="deactivated">
                                                                                                                        Deactivated
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="pending">
                                                                                                                    <label class="form-check-label" for="pending">
                                                                                                                       Pending
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
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
                                                                                                <div class="avatars">
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/65.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/65.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/66.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/66.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/67.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/67.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/68.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/69.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/69.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>Health</td>
                                                                                            <td>12</td>
                                                                                            <td><img src="images/deactivated.svg" class="img-fluid"/></td>
                                                                                            <td>Feb 4 2023</td>
                                                                                            <td>
                                                                                                <div class="dropdown">
                                                                                                    <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                                                                                        <img src="images/dots-v.svg" class="img-fluid" alt="dots" />
                                                                                                    </button>
                                                                                                    <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#disputeModal">Refer to dispute case</a></li>
                                                                                                        <li><h6 class="dropdown-header">Change Status</h6></li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="active">
                                                                                                                    <label class="form-check-label" for="active">
                                                                                                                        Active
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="suspended">
                                                                                                                    <label class="form-check-label" for="suspended">
                                                                                                                        Suspended
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="deactivated">
                                                                                                                    <label class="form-check-label" for="deactivated">
                                                                                                                        Deactivated
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="pending">
                                                                                                                    <label class="form-check-label" for="pending">
                                                                                                                       Pending
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
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
                                                                                                <div class="avatars">
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/65.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/65.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/66.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/66.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/67.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/67.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/68.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <div class="dropdown">
                                                                                                        <a href="#" class="avatars__item dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                            <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100" src="https://randomuser.me/api/portraits/women/69.jpg" alt="">
                                                                                                        </a>
                                                                                                        <ul class="dropdown-menu action-menu border-radius">
                                                                                                            <img src="images/pointer.svg" class="img-fluid pointer" />
                                                                                                            <div class="d-flex avatar-holder border-bottom py-4">
                                                                                                                <div class="position-relative">
                                                                                                                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator">
                                                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                                                        <img src="https://randomuser.me/api/portraits/women/69.jpg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <h5 class="mb-0">Stephen Ejiro</h5>
                                                                                                                    <p class="mb-0 text-main-primary">View profile</p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/users.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Role in dispute</p>
                                                                                                                    <img src="images/claim.svg" class="img-fluid" alt="claimant" />
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/user.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Name & Organization</p>
                                                                                                                    <p class="mb-0">Stephen Ejiro (Shafa Abuja)</p>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/mail.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Email</p>
                                                                                                                    <p class="mb-0">stepheneji@nnpc.com</p>
                                                                                                                </div>

                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                            <div class="d-flex align-items-center py-2">
                                                                                                                <img src="images/call.svg" class="img-fluid" alt="users" />
                                                                                                                <div class="ms-2 flex-grow-1">
                                                                                                                    <p class="mb-1 ft-sm">Phone Number</p>
                                                                                                                    <p class="mb-0">08168141116</p>
                                                                                                                </div>
                                                                                                                <img src="images/copy.svg" class="img-fluid" alt="copy" />
                                                                                                            </div>

                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>Health</td>
                                                                                            <td>12</td>
                                                                                            <td><img src="images/suspending.svg" class="img-fluid"/></td>
                                                                                            <td>Feb 4 2023</td>
                                                                                            <td>
                                                                                                <div class="dropdown">
                                                                                                    <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                                                                                        <img src="images/dots-v.svg" class="img-fluid" alt="dots" />
                                                                                                    </button>
                                                                                                    <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#disputeModal">Refer to dispute case</a></li>
                                                                                                        <li><h6 class="dropdown-header">Change Status</h6></li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="active">
                                                                                                                    <label class="form-check-label" for="active">
                                                                                                                        Active
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="suspended">
                                                                                                                    <label class="form-check-label" for="suspended">
                                                                                                                        Suspended
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="deactivated">
                                                                                                                    <label class="form-check-label" for="deactivated">
                                                                                                                        Deactivated
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="dropdown-item" href="#">
                                                                                                                <div class="form-check">
                                                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="pending">
                                                                                                                    <label class="form-check-label" for="pending">
                                                                                                                       Pending
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
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

                                                             <div class="tab-pane fade" id="v-pills-ind" role="tabpanel" aria-labelledby="v-pills-ind-tab" tabindex="0">
                                                                
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
    <div class="modal fade" id="disputeModal" tabindex="-1" aria-labelledby="disputeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Refer to dispute case</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-5">

                        <div class="row mb-4">
                            <div class="col-lg-9">
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-text bg-transparent">
                                                <img src="images/search.svg" class="img-fluid" alt="search" />
                                            </span>
                                            <input type="search" class="form-control border-start-0 form-control-height" placeholder="Search disputes...">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center justify-content-between gap-15">

                                            <a class="btn btn-size btn-outline-light text-medium px-4" data-bs-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter"><img src="images/filter.svg" class="img-fluid me-2" /> Filters</a>

                                            <button class="btn btn-size btn-outline-light text-medium px-4"><img src="images/sort.svg" class="img-fluid me-2" /> Most Recent</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-list">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Filing Date</th>
                                        <th scope="col">Case Number</th>
                                        <th scope="col">Involved Parties</th>
                                        <th scope="col" style="width: 200px;">Case Title</th>
                                        <th scope="col">Case Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Feb 4 2023</td>
                                        <td scope="row">DS139</td>
                                        <td>
                                            <div class="mb-2">
                                                <div class="d-flex align-items-center avatar-holder">
                                                    <div class="position-relative">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                        </div>
                                                    </div>
                                                    <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                        <p class="text-truncate mb-0 max-200">Nigerian National Petroleum Com </p>
                                                        <span>(NNPC)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <div class="d-flex align-items-center avatar-holder">
                                                    <div class="position-relative">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <img src="images/ipman.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                        </div>
                                                    </div>
                                                    <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                        <p class="text-truncate mb-0 max-200">Independent Petroleum Marketer</p>
                                                        <span>(IPMAN)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Production Sharing Contracts (PSCs) 2024</td>
                                        <td>
                                            <img src="images/Internally-resolved.svg" class="img-fluid" alt="internally resolved" />
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
                                        <td>Feb 4 2023</td>
                                        <td scope="row">DS139</td>
                                        <td>
                                            <div class="mb-2">
                                                <div class="d-flex align-items-center avatar-holder">
                                                    <div class="position-relative">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                        </div>
                                                    </div>
                                                    <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                        <p class="text-truncate mb-0 max-200">Nigerian National Petroleum Com </p>
                                                        <span>(NNPC)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <div class="d-flex align-items-center avatar-holder">
                                                    <div class="position-relative">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <img src="images/ipman.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                        </div>
                                                    </div>
                                                    <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                        <p class="text-truncate mb-0 max-200">Independent Petroleum Marketer</p>
                                                        <span>(IPMAN)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <div class="d-flex align-items-center avatar-holder">
                                                    <div class="position-relative">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                        </div>
                                                    </div>
                                                    <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                        <p class="text-truncate mb-0 max-200">Nigerian National Petroleum Com </p>
                                                        <span>(NNPC)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Production Sharing Contracts (PSCs) 2024</td>
                                        <td>
                                            <img src="images/Internally-resolved.svg" class="img-fluid" alt="internally resolved" />
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


    <!-- Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Preview Sent Invites</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-list">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">
                                    <div>
                                        <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                    </div>
                                </th>
                                <th scope="col">Email address</th>
                                <th scope="col">Role</th>
                                <th scope="col">Dispute invited to</th>
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
                                    josshnikara@email.com
                                </td>
                                <td>
                                    <img src="images/ministry-admin.svg" class="img-fluid" />
                                </td>
                                <td>DS133</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer d-flex justify-content-between align-items-center">
                    <p class="mb-0 text-muted">Page 1 of 30</p>

                    <nav aria-label="...">
                        <ul class="pagination pager mb-0">
                            <li class="page-item active" aria-current="page">
                            <span class="page-link">1</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul>
                    </nav>

                    <div class="d-flex align-items-center gap-10">
                        <button class="btn btn-outline-light text-medium"><img src="images/prev.svg" class="img-fluid"> Previous</button>
                        <button class="btn btn-outline-light text-medium">Next <img src="images/next.svg" class="img-fluid"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>