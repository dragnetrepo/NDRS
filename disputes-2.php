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
                                                <button class="nav-link active" id="pills-create-tab" data-bs-toggle="pill" data-bs-target="#pills-create" type="button" role="tab" aria-controls="pills-create" aria-selected="true">Create Disputes</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-ongoing-tab" data-bs-toggle="pill" data-bs-target="#pills-ongoing" type="button" role="tab" aria-controls="pills-ongoing" aria-selected="false">All Disputes</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-resolved-tab" data-bs-toggle="pill" data-bs-target="#pills-resolved" type="button" role="tab" aria-controls="pills-resolved" aria-selected="false">Pending Disputes</button>
                                            </li>
                                            <!-- <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-internal-tab" data-bs-toggle="pill" data-bs-target="#pills-internal" type="button" role="tab" aria-controls="pills-internal" aria-selected="false">Internal Disputes</button>
                                            </li> -->

                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">

                                            <div class="tab-pane fade show active" id="pills-create" role="tabpanel" aria-labelledby="pills-create-tab" tabindex="0">
                                               <div class="row mt-5">
                                                    <div class="col-lg-7">
                                                        <div class="card mb-4">
                                                            <div class="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                                                <h3 class="mb-lg-0 mb-3">Upload Supporting Documents</h3>
                                                                <div class="d-flex align-items-center gap-15">
                                                                    <a href="disputes.php" class="btn-flat text-main-primary">Back</a>
                                                                    <button class="btn btn-size btn-main-primary submit-dispute">Submit</button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-4">

                                                                <label for="add_doc">
                                                                    <input type="file" name="add_doc" id="add_doc" class="d-none" />
                                                                    <div class="mb-4">
                                                                        <div class="btn-flat text-main-primary text-decoration-none cursor-pointer">Add document <img src="images/button-icon-1.svg" class="img-fluid" alt="add-icon" /></div>
                                                                    </div>
                                                                </label>

                                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="text-center me-2 flex-shrink-0">
                                                                            <img src="images/file_upload_states.svg" class="img-fluid" style="height: 40px;" />
                                                                        </div>
                                                                        <div>
                                                                            <p class="text-bold mb-1">Document Name</p>
                                                                            <p class="font-sm text-muted mb-0">Doc format . Max. 5MB</p>
                                                                        </div>
                                                                    </div>



                                                                    <div>
                                                                        <button class="btn btn-main-primary btn-size">Upload</button>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="text-center me-2 flex-shrink-0">
                                                                            <img src="images/pdf-icon.svg" class="img-fluid" />
                                                                        </div>
                                                                        <div>
                                                                            <p class="text-bold mb-1">Submission Letter.pdf</p>
                                                                            <p class="font-sm text-muted mb-0">11 Sep, 2023 | 12:24pm . 13MB</p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex align-items-center gap-10">
                                                                        <div class="spinner-border text-main-primary" role="status"><span class="visually-hidden">Loading...</span></div>

                                                                        <a href="#">
                                                                            <img src="images/multiply_2.svg" class="img-fluid" alt="close">
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="text-center me-2 flex-shrink-0">
                                                                            <img src="images/pdf-icon.svg" class="img-fluid" />
                                                                        </div>
                                                                        <div>
                                                                            <p class="text-bold mb-1">Submission Letter.pdf</p>
                                                                            <p class="font-sm text-muted mb-0">11 Sep, 2023 | 12:24pm . 13MB</p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex align-items-center gap-10">
                                                                        <div class="spinner-border text-main-primary" role="status"><span class="visually-hidden">Loading...</span></div>

                                                                        <a href="#">
                                                                            <img src="images/multiply_2.svg" class="img-fluid" alt="close">
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="text-center me-2 flex-shrink-0">
                                                                            <img src="images/pdf-icon.svg" class="img-fluid" />
                                                                        </div>
                                                                        <div>
                                                                            <p class="text-bold mb-1">Submission Letter.pdf</p>
                                                                            <p class="font-sm text-muted mb-0">11 Sep, 2023 | 12:24pm . 13MB</p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex align-items-center gap-10">
                                                                        <div class="spinner-border text-main-primary" role="status"><span class="visually-hidden">Loading...</span></div>

                                                                        <a href="#">
                                                                            <img src="images/multiply_2.svg" class="img-fluid" alt="close">
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="text-center me-2 flex-shrink-0">
                                                                            <img src="images/file_upload_states_1.svg" class="img-fluid" style="height: 40px;" />
                                                                        </div>
                                                                        <div>
                                                                            <p class="text-bold mb-1">Submission Letter.pdf</p>
                                                                            <p class="font-sm text-muted mb-0">11 Sep, 2023 | 12:24pm . 13MB</p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex align-items-center gap-10">
                                                                        <a href="#">
                                                                            <img src="images/bin_3.svg" class="img-fluid" alt="bin" />
                                                                        </a>

                                                                        <a href="#">
                                                                            <img src="images/download_2.svg" class="img-fluid" alt="download">
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane fade" id="pills-ongoing" role="tabpanel" aria-labelledby="pills-ongoing-tab" tabindex="0">
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

                                                                        <!-- <button class="btn btn-size btn-main-outline-primary px-4 w-100">Create dispute</button> -->
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

                                            <div class="tab-pane fade" id="pills-resolved" role="tabpanel" aria-labelledby="pills-resolved-tab" tabindex="0">
                                                Pending
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

    <div class="pop-overlay pop-overlay-dispute d-none">
        <div class="card pop-card border-0 py-4">
            <div class="card-body text-center px-lg-5">
                <div class="text-center mb-3">
                    <img src="images/ok-icon.svg" class="img-fluid">
                </div>
                <h3 class="pop-text">You have successfully declared a Dispute Case for</h3>
                <p class="custom-text">Unfulfilled Agreements of 2019.</p>
                <p class="text-muted-3 custom-text-2 mb-0">Approval will be granted by a Ministry Admin.</p>
            </div>
        </div>
    </div>


    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>