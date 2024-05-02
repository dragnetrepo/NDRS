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
                            <h2>Unions & Branches</h2>
                        </div>
                    </div>

                    <div class="content-main">
                        <div class="container">
                            <div class="row py-4">
                                <div class="col-lg-10">
                                    <div class="d-flex gap-15">
                                        <div><a href="#" class="text-muted-4 text-decoration-none"><i class="bi bi-arrow-left"></i> Go back</a></div>

                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="text-main-primary text-decoration-none">All Unions</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Academic Staff Union of Universities</li>
                                            </ol>
                                        </nav>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center avatar-icon w-100 my-5">
                                        <div class="d-flex avatar-holder">
                                            <div class="position-relative">
                                                <div class="avatar-md flex-shrink-0">
                                                    <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                </div>
                                            </div>
                                            <div class="ms-2 flex-grow-1">
                                                <h3 class="mb-2 bold-text">Academic Staff Union Of Universities</h3>
                                                <p class="mb-0 text-muted-3">ASUU</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion accordion-expand" id="accordionUnion">
                                        <div class="accordion-item mb-3">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button heading-4 text-grey" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    ASUU Branches
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionUnion">
                                                <div class="accordion-body">
                                                    <div class="row my-4">
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

                                                                <p class="text-end mb-0 file-count">Unions: 64</p>
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
                                                                        <th scope="col">Unions</th>
                                                                        <th scope="col">Assigned Admin</th>
                                                                        <th scope="col">No of sub branches</th>
                                                                        <th scope="col">Date added</th>
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
                                                                            <div class="d-flex align-items-center avatar-holder">
                                                                                <div class="position-relative">
                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                        <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="ms-2 flex-grow-1">
                                                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                                                        
                                                                                        <div class="mb-0 d-flex align-items-center">
                                                                                            <div class="heading-text">Actors Guild of Nigeria <span class="text-muted-3">(AGN)</span></div> 
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
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
                                                                        <td>Film & Television</td>
                                                                        <td>Feb 4 2023</td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                </button>
                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                    <li><a class="dropdown-item" href="union-branches-3.php">View Admin</a></li>
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
                                                                            <div class="d-flex align-items-center avatar-holder">
                                                                                <div class="position-relative">
                                                                                    <div class="avatar-sm flex-shrink-0">
                                                                                        <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="ms-2 flex-grow-1">
                                                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                                                        
                                                                                        <div class="mb-0 d-flex align-items-center">
                                                                                            <div class="heading-text">Academic Staff Union of Universities<span class="text-muted-3">(ASUU)</span></div> 
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
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
                                                                        
                                                                        <td>Education</td>
                                                                        <td>Feb 4 2023</td>

                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <img src="images/dots-v.svg" class="img-fluid" alt="dot-v" />
                                                                                </button>
                                                                                <ul class="dropdown-menu border-radius action-menu-2">
                                                                                    <li><a class="dropdown-item" href="union-branches-3.php">View Admin</a></li>
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
                                        <div class="accordion-item mb-3">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed heading-4 text-grey" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    ASUU Profile
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionUnion">
                                                <div class="accordion-body">

                                                    <div class="mb-3">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#editModal2" class="btn btn-size btn-main-primary d-inline-flex">Edit Profile</a>
                                                    </div>

                                                    <form>
                                                        <div class="row mt-4">
                                                            <div class="col-lg-3 mb-lg-0 mb-4">
                                                                <label class="form-label d-block">Logo</label>
                                                                <label for="profile" class="position-relative">
                                                                    <input type="file" id="profile" style="display: none;" />

                                                                    <div class="main-avatar mx-auto">
                                                                        <img src="images/user-avatar.svg" class="img-fluid object-fit-cover object-position-center w-100 h-100">
                                                                    </div>

                                                                </label>
                                                            </div>

                                                            <div class="col-lg-9">
                                                                <div class="mb-4">
                                                                    <label class="form-label">Union Name</label>
                                                                    <input type="text" class="form-control form-control-height" value="Academic Staff Union Of Universities" disabled>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label class="form-label">Union Acronym (if applicable)</label>
                                                                    <input type="text" class="form-control form-control-height" value="ASUU" disabled>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label class="form-label">Industry</label>
                                                                    <input type="text" class="form-control form-control-height" disabled value="Educattion">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label class="form-label">Headquarters</label>
                                                                    <input type="email" class="form-control form-control-height" disabled value="X5PH+VMR, Comrade Festus lyayi Complex, University of Abuja, Giri Campus, Airport Rd, Giri, Federal Capital Territory">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label class="form-label">Phone number</label>
                                                                    <input type="text" class="form-control form-control-height" disabled value="0801 392 7263">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label class="form-label">About </label>
                                                                    <textarea class="form-control" rows="4" disabled>Nigeria Union of Journalists (NUJ) is a network of media professionals established to advance the safety and welfare of Nigerian journalists. It is an independent trade organization with no political leaning or ideological disposition. NUJ is founded in the underlying belief that speaking with one voice
                                                                    </textarea>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label class="form-label">Founded in</label>
                                                                    <input type="text" class="form-control form-control-height" value="22 October 1962" disabled>
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb-3">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed heading-4 text-grey" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    ASUU Admins
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionUnion">
                                                <div class="accordion-body">

                                                    <div class="mb-3">
                                                        <a href="#" class="btn btn-size btn-main-primary d-inline-flex">Invite Admins</a>
                                                    </div>

                                                    <table class="table table-list">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Date added</th>
                                                                <th scope="col">Role</th>
                                                                <th scope="col">Actions</th>
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
                                                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeModal">Remove Admin</a></li>
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
                                                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeModal">Remove Admin</a></li>
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
                                                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeModal">Remove Admin</a></li>
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
                                                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeModal">Remove Admin</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item mb-3">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed heading-4 text-grey" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    ASUU Disputes
                                                </button>
                                            </h2>
                                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionUnion">
                                                <div class="accordion-body">
                                                     <div class="table-responsive">
                                                        <table class="table table-list">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th scope="col">Filing Date</th>
                                                                    <th scope="col">Case Number</th>
                                                                    <th scope="col">Involved Parties</th>
                                                                    <th scope="col" style="width: 200px;">Case Title</th>
                                                                    <th scope="col">Case Status</th>
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
                                                                                    <p class="text-truncate mb-0 max-200">ASUU Awka Ibom </p>
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
                                                                                    <p class="text-truncate mb-0 max-200">ASUU Ibadan</p>
                                                                                    <span>(IPMAN)</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Production Sharing Contracts (PSCs) 2024</td>
                                                                    <td>
                                                                        <img src="images/Internally-resolved.svg" class="img-fluid" alt="internally resolved" />
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
                                                                                    <p class="text-truncate mb-0 max-200">ASUU Awka Ibom </p>
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
                                                                                    <p class="text-truncate mb-0 max-200">ASUU Ibadan</p>
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
                                                                                    <p class="text-truncate mb-0 max-200">ASUU Awka Ibom </p>
                                                                                    <span>(NNPC)</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Production Sharing Contracts (PSCs) 2024</td>
                                                                    <td>
                                                                        <img src="images/Internally-resolved.svg" class="img-fluid" alt="internally resolved" />
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
    <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 p-lg-4 p-3">
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="images/delete-icon.svg" class="img-fluid mb-3" alt="delete an account" /> 
                    </div>
                    <h1 class="heading modal-heading text-center mb-3">Are you sure you want to Remove</h1>
                    <p class="mb-4 modal-text text-center">Dorothy Ogenekaro (Union Branch Admin) <span class="text-bold text-darken">as Admin for</span> ASUU </p> 
                    

                    <button class="btn btn-size btn-main-danger w-100">Yes, Remove Admin</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="editModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 p-lg-4 p-3">
                <div class="pb-4 border-bottom heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                    <h3 class="mb-lg-0 mb-3">Edit Branch</h3>
                    <div class="d-flex align-items-center gap-15">
                        <a href="#" class="btn btn-size btn-main-outline-primary">Save Changes</a>
                        <a href="#" class="btn btn-size btn-main-primary">Discard Changes</a>
                    </div>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mt-4">
                            <div class="col-lg-3 mb-lg-0 mb-4">
                                <label class="form-label d-block">Logo</label>
                                <label for="profile" class="position-relative">
                                    <input type="file" id="profile" style="display: none;" />

                                    <div class="main-avatar mx-auto">
                                        <img src="images/user-avatar.svg" class="img-fluid object-fit-cover object-position-center w-100 h-100">
                                    </div>

                                </label>
                            </div>

                            <div class="col-lg-9">
                                <div class="mb-4">
                                    <label class="form-label">Union Name</label>
                                    <input type="text" class="form-control form-control-height" value="Academic Staff Union Of Universities">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Union Acronym (if applicable)</label>
                                    <input type="text" class="form-control form-control-height" value="ASUU">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Industry</label>
                                    <input type="text" class="form-control form-control-height" value="Educattion">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Headquarters</label>
                                    <input type="email" class="form-control form-control-height" value="X5PH+VMR, Comrade Festus lyayi Complex, University of Abuja, Giri Campus, Airport Rd, Giri, Federal Capital Territory">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Phone number</label>
                                    <input type="text" class="form-control form-control-height" value="0801 392 7263">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">About </label>
                                    <textarea class="form-control" rows="4">Nigeria Union of Journalists (NUJ) is a network of media professionals established to advance the safety and welfare of Nigerian journalists. It is an independent trade organization with no political leaning or ideological disposition. NUJ is founded in the underlying belief that speaking with one voice
                                    </textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Founded in</label>
                                    <input type="text" class="form-control form-control-height" value="22 October 1962">
                                </div>
                                
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>