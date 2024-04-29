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
                            <h2>Settings</h2>
                        </div>
                    </div>

                    <div class="content-main">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="margin-top-negative">
                                        <ul class="nav custom-tab nav-underline mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-personal-tab" data-bs-toggle="pill" data-bs-target="#pills-personal" type="button" role="tab" aria-controls="pills-personal" aria-selected="true">Personal profile</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-organization-tab" data-bs-toggle="pill" data-bs-target="#pills-organization" type="button" role="tab" aria-controls="pills-organization" aria-selected="false">Organization profile</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-notification-tab" data-bs-toggle="pill" data-bs-target="#pills-notification" type="button" role="tab" aria-controls="pills-notification" aria-selected="false">Notifications</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-password-tab" data-bs-toggle="pill" data-bs-target="#pills-password" type="button" role="tab" aria-controls="pills-password" aria-selected="false">Password & Security</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab" tabindex="0">
                                                <div class="row mt-5">
                                                    <div class="col-lg-8">
                                                        <div class="card mb-4">
                                                            <div class="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                                                <h3 class="mb-lg-0 mb-3">Personal profile</h3>
                                                                <div class="d-flex align-items-center gap-15">
                                                                    <a href="#" class="btn-flat">Discard changes</a>
                                                                    <a href="#" class="btn btn-size btn-main-primary" disabled>Save changes</a>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-4">
                                                                <form>
                                                                    <div class="row mt-4">
                                                                        <div class="col-lg-3 mb-lg-0 mb-4">
                                                                            <label for="profile" class="position-relative">
                                                                                <input type="file" id="profile" style="display: none;" />

                                                                                <div class="main-avatar mx-auto">
                                                                                    <img src="images/user-avatar.svg" class="img-fluid object-fit-cover object-position-center w-100 h-100">
                                                                                </div>

                                                                                <img src="images/close-x.svg" class="img-fluid remove-profile cursor-pointer" />
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-lg-9">
                                                                            <div class="mb-4">
                                                                                <label class="form-label">First name</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your first name" value="Bayo Danladi">
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Surname</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your surname" value="Chinedu">
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Phone Number</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your phone number" value="080226648364">
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Email address</label>
                                                                                <input type="email" class="form-control form-control-height" placeholder="Enter your phone number" value="bayodanladi@gmail.com">
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Contact address</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your phone number" value="No 64, Sura Mogaji Street, Ilupeju, Lagos.">
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Union</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your phone number" value="ASUU" disabled>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Union branch</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your phone number" value="Lagos" disabled>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Sub branch</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your phone number" value="University of Lagos" disabled>
                                                                                <a href="#" class="text-main-primary" data-bs-toggle="modal" data-bs-target="#orgModal"><p class="mb-0 mt-1">Request to change organization</p></a>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Role</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your phone number" value="Organization Admin" disabled>
                                                                                <a href="#" class="text-main-primary" data-bs-toggle="modal" data-bs-target="#roleModal"><p class="mb-0 mt-1">Request new role</p></a>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-lg-4 offset-lg-8">
                                                                                    <button class="btn btn-size w-100 btn-main-outline-primary"><img src="images/button-icon.svg" class="img-fluid" /> View Profile</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="card delete-card">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                                    <div class="text-start mb-lg-0 mb-3">
                                                                        <h4>Delete account</h4>
                                                                        <p class="mb-0">Delete your account from the NDRS database?</p>
                                                                    </div>

                                                                    <button class="btn btn-outline-danger btn-size" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete account</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-organization" role="tabpanel" aria-labelledby="pills-organization-tab" tabindex="0">
                                                 <div class="row mt-5">
                                                    <div class="col-lg-8">
                                                        <div class="card mb-4">
                                                            <div class="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                                                <h3 class="mb-lg-0 mb-3">Organization profile</h3>
                                                                <div class="d-flex align-items-center gap-15">
                                                                    <a href="#" class="btn-flat text-main-primary">Discard changes</a>
                                                                    <a href="#" class="btn btn-size btn-main-primary" disabled>Save changes</a>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-4">
                                                                <form>
                                                                    <div class="row mt-4">
                                                                        <div class="col-lg-3 mb-lg-0 mb-4">
                                                                            <label for="profile" class="position-relative">
                                                                                <input type="file" id="profile" style="display: none;" />

                                                                                <div class="main-avatar mx-auto">
                                                                                    <img src="images/org-logo.png" class="img-fluid object-fit-cover object-position-center w-100 h-100">
                                                                                </div>

                                                                                <img src="images/close-x.svg" class="img-fluid remove-profile cursor-pointer" />
                                                                            </label>
                                                                        </div>

                                                                        <div class="col-lg-9">
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Organization name</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your first name" value="University of Lagos">
                                                                            </div>

                                                                            <div class="mb-4">
                                                                                <label class="form-label">Union</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your phone number" value="ASUU" disabled>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Union branch</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your phone number" value="Lagos" disabled>
                                                                            </div>
                                                                            
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Organization phone number</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your phone number" value="080226648364">
                                                                            </div>

                                                                            <div class="mb-4">
                                                                                <label class="form-label">Email address</label>
                                                                                <input type="email" class="form-control form-control-height" placeholder="Enter your phone number" value="info@unilag.edu.ng">
                                                                            </div>

                                                                            <div class="mb-4">
                                                                                <label class="form-label">Organization address</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your phone number" value="University of Lagos, Akoka, Yaba, Lagos, Nigeria.">
                                                                            </div>
                                                                            
                                                                           <div class="mb-4">
                                                                                <label class="form-label">Organization detail</label>
                                                                                <textarea class="form-control" rows="4"></textarea>
                                                                            </div>

                                                                            <div class="mb-4">
                                                                                <label class="form-label">Organization admins</label>
                                                                                <input type="email" class="form-control form-control-height" placeholder="Enter your phone number" value="University of Lagos, Akoka, Yaba, Lagos, Nigeria.">
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-lg-4 offset-lg-8">
                                                                                    <button class="btn btn-size w-100 btn-main-outline-primary"><img src="images/button-icon.svg" class="img-fluid" /> View Profile</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="card delete-card">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                                    <div class="text-start mb-lg-0 mb-3">
                                                                        <h4>Request to Delete organization </h4>
                                                                        <p class="mb-0">Delete this organization from the NDRS database?</p>
                                                                    </div>

                                                                    <button class="btn btn-outline-danger btn-size" data-bs-toggle="modal" data-bs-target="#deleteModal2">Delete account</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab" tabindex="0">
                                                <div class="mt-5">

                                                    <div class="mb-4">
                                                        <h4 class="text-medium">Notification settings</h4>
                                                        <p class="mb-0 text-muted-3">We may still send you important notifcations about your account outside of your notification settings </p>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            
                                                            <div class="card card-box-view mb-4">
                                                                <div class="card-body p-4">
                                                                    <div class="d-flex justify-content-between align-items-center flex-lg-nowrap flex-wrap">
                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                            <h4>Mentions</h4>
                                                                            <p class="mb-0 text-muted-3">Notifications about any mentions in any discussions on the platform</p>
                                                                        </div>

                                                                        <div class="d-flex flex-column gap-10">

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">Email</label>
                                                                            </div>

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">Whatsapp</label>
                                                                            </div>

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">SMS</label>
                                                                            </div>

                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card card-box-view mb-4">
                                                                <div class="card-body p-4">
                                                                    <div class="d-flex justify-content-between align-items-center flex-lg-nowrap flex-wrap">
                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                            <h4>Requests</h4>
                                                                            <p class="mb-0 text-muted-3">Specific notifications about case verdicts requiring your review, polls etc</p>
                                                                        </div>

                                                                        <div class="d-flex flex-column gap-10">

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">Email</label>
                                                                            </div>

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">Whatsapp</label>
                                                                            </div>

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">SMS</label>
                                                                            </div>

                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card card-box-view mb-4">
                                                                <div class="card-body p-4">
                                                                    <div class="d-flex justify-content-between align-items-center flex-lg-nowrap flex-wrap">
                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                            <h4>Case Updates</h4>
                                                                            <p class="mb-0 text-muted-3">General updates about a case, like document updates and discussions</p>
                                                                        </div>

                                                                        <div class="d-flex flex-column gap-10">

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">Email</label>
                                                                            </div>

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">Whatsapp</label>
                                                                            </div>

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">SMS</label>
                                                                            </div>

                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card card-box-view mb-4">
                                                                <div class="card-body p-4">
                                                                    <div class="d-flex justify-content-between align-items-center flex-lg-nowrap flex-wrap">
                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                            <h4>Invites</h4>
                                                                            <p class="mb-0 text-muted-3">Notifications when you get invited to a new dispute case or branch</p>
                                                                        </div>

                                                                        <div class="d-flex flex-column gap-10">

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">Email</label>
                                                                            </div>

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">Whatsapp</label>
                                                                            </div>

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">SMS</label>
                                                                            </div>

                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card card-box-view mb-4">
                                                                <div class="card-body p-4">
                                                                    <div class="d-flex justify-content-between align-items-center flex-lg-nowrap flex-wrap">
                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                            <h4>Password & Security</h4>
                                                                            <p class="mb-0 text-muted-3">Receive a code on your registered email or phone number before you log in to confirm that it’s really you</p>
                                                                        </div>

                                                                        <div class="d-flex flex-column gap-10">

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">Email</label>
                                                                            </div>

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">Whatsapp</label>
                                                                            </div>

                                                                            <div class="form-check d-flex align-items-center form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                                                <label class="form-check-label ms-4" for="flexSwitchCheckChecked">SMS</label>
                                                                            </div>

                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab" tabindex="0">
                                                <div class="mt-5">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <div class="card card-box-view mb-4">
                                                                <div class="card-body p-4">
                                                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                            <h4 class="mb-0">Change password </h4>
                                                                        </div>

                                                                        <button class="btn btn-size btn-main-primary" data-bs-toggle="modal" data-bs-target="#passwordModal">Change password</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card card-box-view mb-4">
                                                                <div class="card-body p-4">
                                                                    <div class="d-flex justify-content-between align-items-center flex-lg-nowrap flex-wrap">
                                                                        <div class="text-start mb-lg-0 mb-3">
                                                                            <h4>2 Step Authentication</h4>
                                                                            <p class="mb-0 text-muted-2">Receive a code on your registered email or phone number before you log in to confirm that it’s really you</p>
                                                                        </div>

                                                                        <div class="form-check form-switch ms-lg-5">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
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