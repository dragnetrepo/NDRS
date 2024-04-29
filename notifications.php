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
                            <h2>Notifications & Request</h2>
                        </div>
                    </div>

                    <div class="content-main">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="margin-top-negative">
                                        <ul class="nav custom-tab nav-underline mb-3" id="pills-tab" role="tablist">
                                            
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending" aria-selected="false">Pending</button>
                                            </li>

                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">

                                            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">

                                                <div class="row mt-5">
                                                    <div class="col-lg-4 mb-4">
                                                        <div class="input-group">
                                                            <span class="input-group-text bg-transparent">
                                                                <img src="images/search.svg" class="img-fluid" alt="search" />
                                                            </span>
                                                            <input type="search" class="form-control border-start-0 form-control-height" placeholder="Search disputes...">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 mb-4">
                                                        <div class="d-flex align-items-center justify-content-between">

                                                            <button class="btn btn-size btn-outline-light text-medium"><img src="images/sort.svg" class="img-fluid me-2" /> Most Recent</button>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                            <label class="form-check-label" for="inlineRadio1">All</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="inlineRadio2">Notifications</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                            <label class="form-check-label" for="inlineRadio3">Case Activity</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-lg-12">
                                                        <div class="d-flex align-items-center justify-content-between w-100">
                                                            <div class="border-bottom w-100"></div>
                                                            <div class="notification-badge text-medium">Today</div>
                                                            <div class="border-bottom w-100"></div>
                                                        <div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-8">
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

                                                <div class="row mt-4">
                                                    <div class="col-lg-12">
                                                        <div class="d-flex align-items-center justify-content-between w-100">
                                                            <div class="border-bottom w-100"></div>
                                                            <div class="notification-badge text-medium">Yesterday</div>
                                                            <div class="border-bottom w-100"></div>
                                                        <div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-8">
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

                                            <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab" tabindex="0">
                                                <div class="row mt-5">
                                                    <div class="col-lg-4 mb-4">
                                                        <div class="input-group">
                                                            <span class="input-group-text bg-transparent">
                                                                <img src="images/search.svg" class="img-fluid" alt="search" />
                                                            </span>
                                                            <input type="search" class="form-control border-start-0 form-control-height" placeholder="Search disputes...">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 mb-4">
                                                        <div class="d-flex align-items-center justify-content-between">

                                                            <button class="btn btn-size btn-outline-light text-medium"><img src="images/sort.svg" class="img-fluid me-2" /> Most Recent</button>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                            <label class="form-check-label" for="inlineRadio1">All</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="inlineRadio2">Notifications</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                            <label class="form-check-label" for="inlineRadio3">Case Activity</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-lg-12">
                                                        <div class="d-flex align-items-center justify-content-between w-100">
                                                            <div class="border-bottom w-100"></div>
                                                            <div class="notification-badge text-medium">Today</div>
                                                            <div class="border-bottom w-100"></div>
                                                        <div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-8">
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

                                                <div class="row mt-4">
                                                    <div class="col-lg-12">
                                                        <div class="d-flex align-items-center justify-content-between w-100">
                                                            <div class="border-bottom w-100"></div>
                                                            <div class="notification-badge text-medium">Yesterday</div>
                                                            <div class="border-bottom w-100"></div>
                                                        <div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-8">
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
    <div class="modal fade" id="orgModal" tabindex="-1" aria-labelledby="orgModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 p-lg-4 p-3">
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="images/org-icon.svg" class="img-fluid mb-3" alt="create an account" /> 
                    </div>
                    <h1 class="heading modal-heading text-center mb-3">Which organization do you currently work for?</h1>
                    <p class="mb-4 modal-text text-center">Previous organization - UNILAG</p> 
                    

                    <form>

                        <div class="mb-4">
                            <label class="form-label">Current organization</label>
                            <select class="form-control form-control-height">
                                <option>Type or select an option</option>
                                <option selected>UNIBEN</option>
                            </select>
                        </div>
                        <div class="">
                            <button class="btn btn-size btn-main-primary w-100">Send Request</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 p-lg-4 p-3">
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="images/delete-icon.svg" class="img-fluid mb-3" alt="delete an account" /> 
                    </div>
                    <h1 class="heading modal-heading text-center mb-3">Are you sure you want to delete your NDRS account?</h1>
                    <p class="mb-4 modal-text text-center">You will lose access to all disputes, documents,organizations & discussions on your account.</p> 
                    

                    <form>

                        <div class="mb-4">
                            <label class="form-label">Current password</label>
                            <input type="password" class="form-control form-control-height" placeholder="Type your password">
                        </div>
                        <div class="">
                            <button class="btn btn-size btn-main-danger w-100">Yes, Delete My Account</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal2" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 p-lg-4 p-3">
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="images/delete-icon.svg" class="img-fluid mb-3" alt="delete an account" /> 
                    </div>
                    <h1 class="heading modal-heading text-center mb-3">Why are you requesting to delete “University of Lagos” ?</h1>
                    <p class="mb-4 modal-text text-center">You will lose access to all disputes, documents,organizations & discussions associated with your organization if approved.</p> 
                    

                    <form>

                        <div class="mb-4">
                            <label class="form-label">Reason for request</label>
                            <textarea class="form-control" rows="4" placeholder="Type your reason"></textarea>
                        </div>
                        <div class="">
                            <button class="btn btn-size btn-main-danger w-100">Send Delete Request</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 p-lg-4 p-3">
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="images/password.svg" class="img-fluid mb-3" alt="password" /> 
                    </div>
                    <h1 class="heading text-center mb-3">Create your account password</h1>
                    <p class="mb-1 text-muted-2">In order to <strong>protect your account</strong>, make sure your password is</p> 
                    <ul class="text-muted-2">                          
                        <li>at least 8 characters</li>
                        <li>has alphabets, numbers & special characters</li>
                    </ul>

                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Current password</label>
                            <div class="input-group">
                                <input type="password" class="form-control border-end-0 form-control-height" placeholder="Current password">
                                <span class="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                                    <img src="images/eye.svg" class="img-fluid" />
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New password</label>
                            <div class="input-group">
                                <input type="password" class="form-control border-end-0 form-control-height" placeholder="New password">
                                <span class="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                                    <img src="images/eye.svg" class="img-fluid" />
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Re-enter New password</label>
                            <div class="input-group">
                                <input type="password" class="form-control border-end-0 form-control-height is-invalid" placeholder="Re-enter password">
                                <span class="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                                    <img src="images/eye.svg" class="img-fluid" />
                                </span>
                                <div class="invalid-feedback">
                                    Passwords do not match
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-size btn-main-primary w-100">Change password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>