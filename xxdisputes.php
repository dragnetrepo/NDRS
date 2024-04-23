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
                            <h2>Disputes</h2>
                        </div>
                    </div>

                    <div class="content-main">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="margin-top-negative">
                                        <ul class="nav custom-tab nav-underline mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All Disputes</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending" aria-selected="false">Pending Requests</button>
                                            </li>
                                            <!-- <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-ongoing-tab" data-bs-toggle="pill" data-bs-target="#pills-ongoing" type="button" role="tab" aria-controls="pills-ongoing" aria-selected="false">Ongoing Disputes</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-resolved-tab" data-bs-toggle="pill" data-bs-target="#pills-resolved" type="button" role="tab" aria-controls="pills-resolved" aria-selected="false">Resolved Disputes</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-internal-tab" data-bs-toggle="pill" data-bs-target="#pills-internal" type="button" role="tab" aria-controls="pills-internal" aria-selected="false">Internal Disputes</button>
                                            </li> -->
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">

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

                                                                        <button class="btn btn-size btn-outline-light text-medium px-4"><img src="images/sort.svg" class="img-fluid me-2" /> Sort</button>

                                                                        <button class="btn btn-size btn-main-outline-primary px-4 w-100">Create dispute</button>
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
                                                                    <th scope="col">Case Title</th>
                                                                    <th scope="col">Case Status</th>
                                                                    <th scope="col">Involved Parties</th>
                                                                    <th scope="col"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td scope="row">DS139</td>
                                                                    <td>Measures concerning trading goods</td>
                                                                    <td>
                                                                        <img src="images/Internally-resolved.svg" class="img-fluid" alt="internally resolved" />
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
                                                                    <td>Feb 4 2023</td>
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
                                                                    <td scope="row">DS139</td>
                                                                    <td>Measures concerning trading goods</td>
                                                                    <td>
                                                                        <img src="images/conc.svg" class="img-fluid" alt="internally resolved" />
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
                                                                    <td>Feb 4 2023</td>
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
                                                                    <td scope="row">DS139</td>
                                                                    <td>Measures concerning trading goods</td>
                                                                    <td>
                                                                        <img src="images/internal-resolution.svg" class="img-fluid" alt="internally resolved" />
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
                                                                    <td>Feb 4 2023</td>
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
                                                                    <td scope="row">DS139</td>
                                                                    <td>Measures concerning trading goods</td>
                                                                    <td>
                                                                        <img src="images/voting-for-panel.svg" class="img-fluid" alt="Voting" />
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
                                                                    <td>Feb 4 2023</td>
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
                                                                    <td scope="row">DS139</td>
                                                                    <td>Measures concerning trading goods</td>
                                                                    <td>
                                                                        <img src="images/resolved-1.svg" class="img-fluid" alt="Voting" />
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
                                                                    <td>Feb 4 2023</td>
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
                                                                    <td scope="row">DS139</td>
                                                                    <td>Measures concerning trading goods</td>
                                                                    <td>
                                                                        <img src="images/arbitation.svg" class="img-fluid" alt="Voting" />
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
                                                                    <td>Feb 4 2023</td>
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
                                                                    <td scope="row">DS139</td>
                                                                    <td>Measures concerning trading goods</td>
                                                                    <td>
                                                                        <img src="images/pending.svg" class="img-fluid" alt="Voting" />
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
                                                                    <td>Feb 4 2023</td>
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
                                                                    <td scope="row">DS139</td>
                                                                    <td>Measures concerning trading goods</td>
                                                                    <td>
                                                                        <img src="images/court-decision.svg" class="img-fluid" alt="Voting" />
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
                                                                    <td>Feb 4 2023</td>
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
                                            <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab" tabindex="0">
                                                
                                            </div>
                                            <div class="tab-pane fade" id="pills-ongoing" role="tabpanel" aria-labelledby="pills-ongoing-tab" tabindex="0">...</div>

                                            <div class="tab-pane fade" id="pills-resolved" role="tabpanel" aria-labelledby="pills-resolved-tab" tabindex="0">
                                               
                                            </div>

                                            <div class="tab-pane fade" id="pills-internal" role="tabpanel" aria-labelledby="pills-internal-tab" tabindex="0">
                                               
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