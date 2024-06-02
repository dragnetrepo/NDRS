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
                                                <button class="nav-link" id="pills-individual-tab" data-bs-toggle="pill" data-bs-target="#pills-individual" type="button" role="tab" aria-controls="pills-individual" aria-selected="false">All Individual Users</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-claimants-tab" data-bs-toggle="pill" data-bs-target="#pills-claimants" type="button" role="tab" aria-controls="pills-claimants" aria-selected="false">Admins & Claimants</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-settlement-tab" data-bs-toggle="pill" data-bs-target="#pills-settlement" type="button" role="tab" aria-controls="pills-settlement" aria-selected="false">Settlement Management Bodies</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-role-tab" data-bs-toggle="pill" data-bs-target="#pills-role" type="button" role="tab" aria-controls="pills-role" aria-selected="false">Roles & Permissions</button>
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

                                                            <button class="nav-link tab-v text-start" id="v-pills-nonstaff-tab" data-bs-toggle="pill" data-bs-target="#v-pills-nonstaff" type="button" role="tab" aria-controls="v-pills-nonstaff" aria-selected="false">Non Union Members</button>
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
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#disputeModal">Refer to Dispute Case</a></li>
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#permissionModal2">Edit permission level</a></li>
                                                                                                        <li><a href="view-members.php" class="dropdown-item">View Members</a></li>
                                                                                                        <li><a href="" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#dissolveModal">Dissolve Board </a></li>
                                                                                                        <li><a class="dropdown-item d-flex align-items-center justify-content-between" data-bs-toggle="collapse" data-bs-target="#collapseStatus" aria-expanded="false" aria-controls="collapseStatus">Change Status <i class="bi bi-chevron-down"></i></a></li>
                                                                                                        <div class="collapse" id="collapseStatus">
                                                                                                            <ul class="list-unstyled">
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
                                                                                                        <!-- <li><h6 class="dropdown-header">Change Status</h6></li>
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
                                                                                                        </li> -->
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

                                                             <div class="tab-pane fade" id="v-pills-nonstaff" role="tabpanel" aria-labelledby="v-pills-nonstaff-tab" tabindex="0">
                                                                
                                                             </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="pills-claimants" role="tabpanel" aria-labelledby="pills-claimants-tab" tabindex="0">
                                                <div class="row mt-5">
                                                    <div class="col-lg-3"></div>

                                                    <div class="col-lg-9"></div>
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

                                                                        <div class="row mb-4">
                                                                            <div class="col-lg-3 offset-lg-9">
                                                                                <button class="btn btn-main-primary btn-size w-100" data-bs-toggle="modal" data-bs-target="#boardModal">Create Board Profile</button>
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
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#disputeModal">Refer to Dispute Case</a></li>
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#permissionModal2">Edit permission level</a></li>
                                                                                                        <li><a href="view-members.php" class="dropdown-item">View Members</a></li>
                                                                                                        <li><a href="" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#dissolveModal">Dissolve Board </a></li>
                                                                                                        <li><a class="dropdown-item d-flex align-items-center justify-content-between" data-bs-toggle="collapse" data-bs-target="#collapseStatus" aria-expanded="false" aria-controls="collapseStatus">Change Status <i class="bi bi-chevron-down"></i></a></li>
                                                                                                        <div class="collapse" id="collapseStatus">
                                                                                                            <ul class="list-unstyled">
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
                                                                                                        <!-- <li><h6 class="dropdown-header">Change Status</h6></li>
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
                                                                                                        </li> -->
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
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#disputeModal">Refer to Dispute Case</a></li>
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#permissionModal2">Edit permission level</a></li>
                                                                                                        <li><a href="view-members.php" class="dropdown-item">View Members</a></li>
                                                                                                        <li><a href="" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#dissolveModal">Dissolve Board </a></li>
                                                                                                        <li><a class="dropdown-item d-flex align-items-center justify-content-between" data-bs-toggle="collapse" data-bs-target="#collapseStatus" aria-expanded="false" aria-controls="collapseStatus">Change Status <i class="bi bi-chevron-down"></i></a></li>
                                                                                                        <div class="collapse" id="collapseStatus">
                                                                                                            <ul class="list-unstyled">
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
                                                                                                        <!-- <li><h6 class="dropdown-header">Change Status</h6></li>
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
                                                                                                        </li> -->
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
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#disputeModal">Refer to Dispute Case</a></li>
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#permissionModal2">Edit permission level</a></li>
                                                                                                         <li><a href="view-members.php" class="dropdown-item">View Members</a></li>
                                                                                                        <li><a href="" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#dissolveModal">Dissolve Board </a></li>
                                                                                                        <li><a class="dropdown-item d-flex align-items-center justify-content-between" data-bs-toggle="collapse" data-bs-target="#collapseStatus" aria-expanded="false" aria-controls="collapseStatus">Change Status <i class="bi bi-chevron-down"></i></a></li>
                                                                                                        <div class="collapse" id="collapseStatus">
                                                                                                            <ul class="list-unstyled">
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
                                                                                                        <!-- <li><h6 class="dropdown-header">Change Status</h6></li>
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
                                                                                                        </li> -->
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
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#disputeModal">Refer to Dispute Case</a></li>
                                                                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#permissionModal2">Edit permission level</a></li>
                                                                                                        <li><a href="view-members.php" class="dropdown-item">View Members</a></li>
                                                                                                        <li><a href="" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#dissolveModal">Dissolve Board </a></li>
                                                                                                        <li><a class="dropdown-item d-flex align-items-center justify-content-between" data-bs-toggle="collapse" data-bs-target="#collapseStatus" aria-expanded="false" aria-controls="collapseStatus">Change Status <i class="bi bi-chevron-down"></i></a></li>
                                                                                                        <div class="collapse" id="collapseStatus">
                                                                                                            <ul class="list-unstyled">
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
                                                                                                        <!-- <li><h6 class="dropdown-header">Change Status</h6></li>
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
                                                                                                        </li> -->
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

                                            <div class="tab-pane fade" id="pills-role" role="tabpanel" aria-labelledby="pills-role-tab" tabindex="0">
                                                <div class="row mt-5">
                                                   <div class="col-lg-5">
                                                        <p>All NDRS roles and their permissions</p>

                                                        <button class="btn btn-main-primary btn-size" data-bs-toggle="modal" data-bs-target="#customModal">Create custom role</button>
                                                   </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <div class="accordion accordion-expand mt-4" id="accordionHelp2">

                                                            <div class="accordion-item mb-3">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button custom-text-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Ministry Admin
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionHelp2">
                                                                     <div class="mb-3 py-3 px-4 bg-light">
                                                                        <a href="#" class="btn btn-size btn-outline-danger d-inline-flex">Restore default</a>
                                                                    </div>
                                                                    <div class="accordion-body">
                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Disputes</h4>
                                                                                            <p class="mb-0 text-muted-3">All permission relating to disputes</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_1" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_1">Create dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_2">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_2">Approve dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_3">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_3">Invite dispute participants</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_4">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_4">Change dispute case status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_5">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_5">Participate in resolution</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_6">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_6">View dispute notifications</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Union & Branches</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to creating and editing unions, branches or sub branches</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_7" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_7">Create unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_8">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_8">Create branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_9">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_9">Create sub branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_10">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_10">Edit unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_11">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_11">Edit branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_12">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_12">Edit sub branches</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Users & Groups</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to users and groups</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_13" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_13">Invite users</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_14">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_14">Edit users status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_15">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_15">Assign users cases</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_16">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_16">Edit roles & permissions</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Reports</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions regarding the reporting feature</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_17" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_17">View & download reports</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="accordion-item mb-3">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button custom-text-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        National Union Admin
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionHelp2">
                                                                     <div class="mb-3 py-3 px-4 bg-light">
                                                                        <a href="#" class="btn btn-size btn-outline-danger d-inline-flex">Restore default</a>
                                                                    </div>
                                                                    <div class="accordion-body">
                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Disputes</h4>
                                                                                            <p class="mb-0 text-muted-3">All permission relating to disputes</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_1" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_1">Create dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_2">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_2">Approve dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_3">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_3">Invite dispute participants</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_4">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_4">Change dispute case status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_5">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_5">Participate in resolution</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_6">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_6">View dispute notifications</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Union & Branches</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to creating and editing unions, branches or sub branches</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_7" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_7">Create unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_8">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_8">Create branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_9">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_9">Create sub branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_10">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_10">Edit unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_11">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_11">Edit branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_12">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_12">Edit sub branches</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Users & Groups</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to users and groups</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_13" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_13">Invite users</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_14">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_14">Edit users status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_15">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_15">Assign users cases</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_16">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_16">Edit roles & permissions</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Reports</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions regarding the reporting feature</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_17" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_17">View & download reports</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="accordion-item mb-3">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button custom-text-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Employers (Organization Admins)
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionHelp2">
                                                                     <div class="mb-3 py-3 px-4 bg-light">
                                                                        <a href="#" class="btn btn-size btn-outline-danger d-inline-flex">Restore default</a>
                                                                    </div>
                                                                    <div class="accordion-body">
                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Disputes</h4>
                                                                                            <p class="mb-0 text-muted-3">All permission relating to disputes</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_1" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_1">Create dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_2">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_2">Approve dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_3">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_3">Invite dispute participants</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_4">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_4">Change dispute case status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_5">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_5">Participate in resolution</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_6">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_6">View dispute notifications</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Union & Branches</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to creating and editing unions, branches or sub branches</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_7" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_7">Create unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_8">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_8">Create branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_9">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_9">Create sub branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_10">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_10">Edit unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_11">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_11">Edit branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_12">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_12">Edit sub branches</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Users & Groups</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to users and groups</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_13" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_13">Invite users</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_14">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_14">Edit users status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_15">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_15">Assign users cases</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_16">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_16">Edit roles & permissions</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Reports</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions regarding the reporting feature</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_17" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_17">View & download reports</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="accordion-item mb-3">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button custom-text-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                       Staff (Union Members)
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionHelp2">
                                                                     <div class="mb-3 py-3 px-4 bg-light">
                                                                        <a href="#" class="btn btn-size btn-outline-danger d-inline-flex">Restore default</a>
                                                                    </div>
                                                                    <div class="accordion-body">
                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Disputes</h4>
                                                                                            <p class="mb-0 text-muted-3">All permission relating to disputes</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_1" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_1">Create dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_2">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_2">Approve dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_3">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_3">Invite dispute participants</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_4">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_4">Change dispute case status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_5">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_5">Participate in resolution</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_6">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_6">View dispute notifications</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Union & Branches</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to creating and editing unions, branches or sub branches</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_7" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_7">Create unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_8">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_8">Create branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_9">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_9">Create sub branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_10">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_10">Edit unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_11">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_11">Edit branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_12">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_12">Edit sub branches</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Users & Groups</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to users and groups</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_13" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_13">Invite users</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_14">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_14">Edit users status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_15">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_15">Assign users cases</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_16">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_16">Edit roles & permissions</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Reports</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions regarding the reporting feature</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_17" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_17">View & download reports</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="accordion-item mb-3">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button custom-text-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                       Non Union Claimants
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionHelp2">
                                                                     <div class="mb-3 py-3 px-4 bg-light">
                                                                        <a href="#" class="btn btn-size btn-outline-danger d-inline-flex">Restore default</a>
                                                                    </div>
                                                                    <div class="accordion-body">
                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Disputes</h4>
                                                                                            <p class="mb-0 text-muted-3">All permission relating to disputes</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_1" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_1">Create dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_2">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_2">Approve dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_3">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_3">Invite dispute participants</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_4">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_4">Change dispute case status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_5">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_5">Participate in resolution</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_6">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_6">View dispute notifications</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Union & Branches</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to creating and editing unions, branches or sub branches</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_7" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_7">Create unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_8">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_8">Create branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_9">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_9">Create sub branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_10">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_10">Edit unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_11">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_11">Edit branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_12">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_12">Edit sub branches</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Users & Groups</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to users and groups</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_13" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_13">Invite users</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_14">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_14">Edit users status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_15">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_15">Assign users cases</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_16">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_16">Edit roles & permissions</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Reports</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions regarding the reporting feature</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_17" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_17">View & download reports</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="accordion-item mb-3">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button custom-text-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                       Concilliators & Arbitrators
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionHelp2">
                                                                     <div class="mb-3 py-3 px-4 bg-light">
                                                                        <a href="#" class="btn btn-size btn-outline-danger d-inline-flex">Restore default</a>
                                                                    </div>
                                                                    <div class="accordion-body">
                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Disputes</h4>
                                                                                            <p class="mb-0 text-muted-3">All permission relating to disputes</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_1" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_1">Create dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_2">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_2">Approve dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_3">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_3">Invite dispute participants</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_4">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_4">Change dispute case status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_5">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_5">Participate in resolution</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_6">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_6">View dispute notifications</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Union & Branches</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to creating and editing unions, branches or sub branches</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_7" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_7">Create unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_8">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_8">Create branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_9">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_9">Create sub branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_10">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_10">Edit unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_11">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_11">Edit branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_12">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_12">Edit sub branches</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Users & Groups</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to users and groups</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_13" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_13">Invite users</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_14">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_14">Edit users status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_15">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_15">Assign users cases</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_16">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_16">Edit roles & permissions</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Reports</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions regarding the reporting feature</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_17" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_17">View & download reports</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="accordion-item mb-3">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button custom-text-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                       Mediators
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionHelp2">
                                                                     <div class="mb-3 py-3 px-4 bg-light">
                                                                        <a href="#" class="btn btn-size btn-outline-danger d-inline-flex">Restore default</a>
                                                                    </div>
                                                                    <div class="accordion-body">
                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Disputes</h4>
                                                                                            <p class="mb-0 text-muted-3">All permission relating to disputes</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_1" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_1">Create dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_2">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_2">Approve dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_3">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_3">Invite dispute participants</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_4">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_4">Change dispute case status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_5">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_5">Participate in resolution</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_6">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_6">View dispute notifications</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Union & Branches</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to creating and editing unions, branches or sub branches</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_7" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_7">Create unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_8">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_8">Create branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_9">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_9">Create sub branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_10">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_10">Edit unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_11">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_11">Edit branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_12">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_12">Edit sub branches</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Users & Groups</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to users and groups</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_13" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_13">Invite users</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_14">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_14">Edit users status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_15">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_15">Assign users cases</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_16">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_16">Edit roles & permissions</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Reports</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions regarding the reporting feature</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_17" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_17">View & download reports</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="accordion-item mb-3">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button custom-text-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                       Industrial Arbitration Panel (Tribunal)
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionHelp2">
                                                                     <div class="mb-3 py-3 px-4 bg-light">
                                                                        <a href="#" class="btn btn-size btn-outline-danger d-inline-flex">Restore default</a>
                                                                    </div>
                                                                    <div class="accordion-body">
                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Disputes</h4>
                                                                                            <p class="mb-0 text-muted-3">All permission relating to disputes</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_1" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_1">Create dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_2">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_2">Approve dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_3">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_3">Invite dispute participants</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_4">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_4">Change dispute case status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_5">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_5">Participate in resolution</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_6">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_6">View dispute notifications</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Union & Branches</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to creating and editing unions, branches or sub branches</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_7" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_7">Create unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_8">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_8">Create branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_9">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_9">Create sub branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_10">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_10">Edit unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_11">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_11">Edit branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_12">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_12">Edit sub branches</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Users & Groups</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to users and groups</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_13" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_13">Invite users</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_14">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_14">Edit users status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_15">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_15">Assign users cases</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_16">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_16">Edit roles & permissions</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Reports</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions regarding the reporting feature</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_17" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_17">View & download reports</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="accordion-item mb-3">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button custom-text-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                                       Board of Enquiry
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionHelp2">
                                                                     <div class="mb-3 py-3 px-4 bg-light">
                                                                        <a href="#" class="btn btn-size btn-outline-danger d-inline-flex">Restore default</a>
                                                                    </div>
                                                                    <div class="accordion-body">
                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Disputes</h4>
                                                                                            <p class="mb-0 text-muted-3">All permission relating to disputes</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_1" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_1">Create dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_2">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_2">Approve dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_3">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_3">Invite dispute participants</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_4">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_4">Change dispute case status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_5">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_5">Participate in resolution</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_6">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_6">View dispute notifications</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Union & Branches</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to creating and editing unions, branches or sub branches</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_7" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_7">Create unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_8">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_8">Create branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_9">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_9">Create sub branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_10">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_10">Edit unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_11">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_11">Edit branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_12">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_12">Edit sub branches</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Users & Groups</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to users and groups</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_13" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_13">Invite users</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_14">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_14">Edit users status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_15">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_15">Assign users cases</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_16">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_16">Edit roles & permissions</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Reports</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions regarding the reporting feature</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_17" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_17">View & download reports</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="accordion-item mb-3">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button custom-text-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                                       National Industrial Courts
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionHelp2">
                                                                     <div class="mb-3 py-3 px-4 bg-light">
                                                                        <a href="#" class="btn btn-size btn-outline-danger d-inline-flex">Restore default</a>
                                                                    </div>
                                                                    <div class="accordion-body">
                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Disputes</h4>
                                                                                            <p class="mb-0 text-muted-3">All permission relating to disputes</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_1" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_1">Create dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_2">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_2">Approve dispute</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_3">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_3">Invite dispute participants</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_4">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_4">Change dispute case status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_5">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_5">Participate in resolution</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_6">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_6">View dispute notifications</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Union & Branches</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to creating and editing unions, branches or sub branches</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_7" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_7">Create unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_8">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_8">Create branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_9">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_9">Create sub branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_10">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_10">Edit unions</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_11">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_11">Edit branches</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_12">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_12">Edit sub branches</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Users & Groups</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions related to users and groups</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_13" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_13">Invite users</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_14">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_14">Edit users status</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_15">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_15">Assign users cases</label>
                                                                                            </div>

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_16">
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_16">Edit roles & permissions</label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card card-box-view mb-4">
                                                                            <div class="card-body p-4">
                                                                                <div class="row align-items-center">

                                                                                    <div class="col-lg-7">
                                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                                            <h4>Reports</h4>
                                                                                            <p class="mb-0 text-muted-3">Permissions regarding the reporting feature</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <div class="d-flex flex-column gap-10">

                                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_17" checked>
                                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_17">View & download reports</label>
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
                <div class="modal-header justify-content-between d-flex align-items-center">
                    <h1 class="modal-title fs-5">Refer to dispute case</h1>
                    <div class="gap-10 d-flex align-items-center">
                        <button class="btn btn btn-size btn-main-outline-primary px-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>

                        <button class="btn btn-main-primary btn-size px-3">Refer case</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="">

                        <div class="d-flex avatar-holder mb-5">
                            <div class="position-relative">
                                
                                <div class="avatar-sm flex-shrink-0">
                                    <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                </div>
                            </div>
                            <div class="ms-2 flex-grow-1">
                                <h5 class="mb-0">Salim Mustapha</h5>
                            </div>
                        </div>

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

     <!-- Modal -->
    <div class="modal fade" id="boardModal" tabindex="-1" aria-labelledby="boardModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-header justify-content-between">
                    <h1 class="modal-title fs-5">Create Board of Enquiry Profile</h1>
                   
                    <div class="gap-10 d-flex align-items-center">
                        <button class="btn btn btn-size btn-main-outline-primary px-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>

                        <button class="btn btn-main-primary btn-size px-3">Finish</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <label class="form-label">Name of Board of Enquiry</label>
                            <input type="text" class="form-control form-control-height" placeholder="Enter Board of Enquiry">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-lg-7">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent">
                                    <img src="images/search.svg" class="img-fluid" alt="search">
                                </span>
                                <input type="search" class="form-control border-start-0 form-control-height" placeholder="Type an email to invite">
                            </div>
                        </div>

                        <div class="col-lg-2 offset-lg-3">
                            <div class="d-flex align-items-center justify-content-between gap-15">
                                <a href="#" class="btn btn-size btn-main-primary">Send Invite</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-list">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date added</th>
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
                                        <td>Pending</td>
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
                                        <h4 class="">No board members</h4>

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

     <!-- Modal -->
    <div class="modal fade" id="customModal" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-header justify-content-between">
                    <h1 class="modal-title fs-5">Create custom role & permissions</h1>
                   
                    <div class="gap-10 d-flex align-items-center">
                        <button class="btn btn btn-size btn-main-outline-primary px-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>

                        <button class="btn btn-main-primary btn-size px-3" data-bs-target="#permissionModal" data-bs-toggle="modal">Next</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <input type="text" class="form-control form-control-height" placeholder="Enter custom role">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="permissionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-header justify-content-between">
                    <div>
                        <h1 class="modal-title fs-5">Create custom role & permissions</h1>
                        <p>Ministry Liason</p>
                    </div>
                   
                    <div class="gap-10 d-flex align-items-center">
                        <button class="btn btn btn-size btn-main-outline-primary px-3" data-bs-target="#customModal" data-bs-toggle="modal">Back</button>

                        <button class="btn btn-main-primary btn-size px-3">Finish</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="card card-box-view mb-4">
                            <div class="card-body p-4">
                                <div class="row align-items-center">

                                    <div class="col-lg-7">
                                        <div class="text-start mb-lg-0 mb-3">
                                            <h4>Disputes</h4>
                                            <p class="mb-0 text-muted-3">All permission relating to disputes</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="d-flex flex-column gap-10">

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_1" checked>
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_1">Create dispute</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_2">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_2">Approve dispute</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_3">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_3">Invite dispute participants</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_4">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_4">Change dispute case status</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_5">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_5">Participate in resolution</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_6">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_6">View dispute notifications</label>
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="card card-box-view mb-4">
                            <div class="card-body p-4">
                                <div class="row align-items-center">

                                    <div class="col-lg-7">
                                        <div class="text-start mb-lg-0 mb-3">
                                            <h4>Union & Branches</h4>
                                            <p class="mb-0 text-muted-3">Permissions related to creating and editing unions, branches or sub branches</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="d-flex flex-column gap-10">

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_7" checked>
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_7">Create unions</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_8">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_8">Create branches</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_9">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_9">Create sub branches</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_10">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_10">Edit unions</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_11">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_11">Edit branches</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_12">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_12">Edit sub branches</label>
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="card card-box-view mb-4">
                            <div class="card-body p-4">
                                <div class="row align-items-center">

                                    <div class="col-lg-7">
                                        <div class="text-start mb-lg-0 mb-3">
                                            <h4>Users & Groups</h4>
                                            <p class="mb-0 text-muted-3">Permissions related to users and groups</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="d-flex flex-column gap-10">

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_13" checked>
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_13">Invite users</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_14">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_14">Edit users status</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_15">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_15">Assign users cases</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_16">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_16">Edit roles & permissions</label>
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="card card-box-view mb-4">
                            <div class="card-body p-4">
                                <div class="row align-items-center">

                                    <div class="col-lg-7">
                                        <div class="text-start mb-lg-0 mb-3">
                                            <h4>Reports</h4>
                                            <p class="mb-0 text-muted-3">Permissions regarding the reporting feature</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="d-flex flex-column gap-10">

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_17" checked>
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_17">View & download reports</label>
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

      <!-- Modal -->
    <div class="modal fade" id="permissionModal2" tabindex="-1" aria-labelledby="permissionModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-header justify-content-between">
                    <div>
                        <h1 class="modal-title fs-5">Edit permission level for Ministry Admin</h1>
                        <p class="mb-0">maryblessing@gmail.com</p>
                    </div>
                   
                    <div class="gap-10 d-flex align-items-center">
                        <button class="btn btn btn-size btn-outline-danger px-3">Restore to default</button>

                        <button class="btn btn-main-primary btn-size px-3">Save changes</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="card card-box-view mb-4">
                            <div class="card-body p-4">
                                <div class="row align-items-center">

                                    <div class="col-lg-7">
                                        <div class="text-start mb-lg-0 mb-3">
                                            <h4>Disputes</h4>
                                            <p class="mb-0 text-muted-3">All permission relating to disputes</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="d-flex flex-column gap-10">

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_1" checked>
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_1">Create dispute</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_2">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_2">Approve dispute</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_3">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_3">Invite dispute participants</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_4">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_4">Change dispute case status</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_5">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_5">Participate in resolution</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_6">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_6">View dispute notifications</label>
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="card card-box-view mb-4">
                            <div class="card-body p-4">
                                <div class="row align-items-center">

                                    <div class="col-lg-7">
                                        <div class="text-start mb-lg-0 mb-3">
                                            <h4>Union & Branches</h4>
                                            <p class="mb-0 text-muted-3">Permissions related to creating and editing unions, branches or sub branches</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="d-flex flex-column gap-10">

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_7" checked>
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_7">Create unions</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_8">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_8">Create branches</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_9">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_9">Create sub branches</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_10">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_10">Edit unions</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_11">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_11">Edit branches</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_12">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_12">Edit sub branches</label>
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="card card-box-view mb-4">
                            <div class="card-body p-4">
                                <div class="row align-items-center">

                                    <div class="col-lg-7">
                                        <div class="text-start mb-lg-0 mb-3">
                                            <h4>Users & Groups</h4>
                                            <p class="mb-0 text-muted-3">Permissions related to users and groups</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="d-flex flex-column gap-10">

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_13" checked>
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_13">Invite users</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_14">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_14">Edit users status</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_15">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_15">Assign users cases</label>
                                            </div>

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_16">
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_16">Edit roles & permissions</label>
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="card card-box-view mb-4">
                            <div class="card-body p-4">
                                <div class="row align-items-center">

                                    <div class="col-lg-7">
                                        <div class="text-start mb-lg-0 mb-3">
                                            <h4>Reports</h4>
                                            <p class="mb-0 text-muted-3">Permissions regarding the reporting feature</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="d-flex flex-column gap-10">

                                            <div class="form-check d-flex align-items-center form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked_17" checked>
                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked_17">View & download reports</label>
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


      <!-- Modal -->
    <div class="modal fade" id="dissolveModal" tabindex="-1" aria-labelledby="dissolveLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-body">
                    <div class="text-center">
                        <img src="images/delete-icon.svg" class="img-fluid mb-3" alt="delete an account"> 
                    </div>
                    <p class="mb-4 modal-text text-center text-black custom-text">Are you sure you want to Remove Dorothy Ogenekaro (Board or Enquiry) from <span class="text-bold">Health issues in South South Board of enquiry </span></p> 
                    
                    <button class="btn btn-size btn-main-danger w-100 mb-3">Remove admin</button>

                    <button class="btn btn btn-size w-100 btn-main-outline-primary px-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>