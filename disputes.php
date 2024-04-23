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
                                        <ul class="nav custom-tab nav-underline border-bottom mb-3" id="pills-tab" role="tablist">
                                            
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-ongoing-tab" data-bs-toggle="pill" data-bs-target="#pills-ongoing" type="button" role="tab" aria-controls="pills-ongoing" aria-selected="true">All Disputes</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-resolved-tab" data-bs-toggle="pill" data-bs-target="#pills-resolved" type="button" role="tab" aria-controls="pills-resolved" aria-selected="false">Pending Disputes</button>
                                            </li>
                                            <!-- <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-internal-tab" data-bs-toggle="pill" data-bs-target="#pills-internal" type="button" role="tab" aria-controls="pills-internal" aria-selected="false">Internal Disputes</button>
                                            </li> -->

                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            
                                            <div class="tab-pane fade show active" id="pills-ongoing" role="tabpanel" aria-labelledby="pills-ongoing-tab" tabindex="0">
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
                                                                    <div class="d-flex align-items-center justify-ccontent-between gap-15">

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

                                            <!-- <div class="tab-pane fade" id="pills-internal" role="tabpanel" aria-labelledby="pills-internal-tab" tabindex="0">
                                               INTER
                                            </div> -->
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