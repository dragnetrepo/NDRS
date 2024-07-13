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
                                                <button class="nav-link" id="pills-create-tab" data-bs-toggle="pill" data-bs-target="#pills-create" type="button" role="tab" aria-controls="pills-create" aria-selected="false">Create Disputes</button>
                                            </li>
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

                                            <div class="tab-pane fade" id="pills-create" role="tabpanel" aria-labelledby="pills-create-tab" tabindex="0">
                                               <div class="row mt-5">
                                                    <div class="col-lg-7">
                                                        <div class="card mb-4">
                                                            <div class="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                                                <h3 class="mb-lg-0 mb-3">Create Dispute Case</h3>
                                                                <div class="d-flex align-items-center gap-15">
                                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#confirmModal" class="btn btn-size btn-main-primary px-3">Next</button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-4">
                                                                <form>
                                                                    <div class="row mt-4">
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Dispute ID</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter your Dispute ID" value="DS138" disabled>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Filing date</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Feb 1, 2024" value="Feb 1, 2024" disabled>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Case title</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter Case title" value="Measures Concerning Trading Agricultural Goods">
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Dispute type</label>
                                                                                <select class="form-select form-control-height">
                                                                                    <option>--Choose--</option>
                                                                                    <option>Wages & Salaries</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Initiating party (Claimant)</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter Initiating party" value="National Union of Food, Beverage and Tobacco Employees NUFBTE">
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Accused party (Respondents)</label>
                                                                                <input type="text" class="form-control form-control-height" placeholder="Enter Accused party" value="Federal Road Safety Comission FRSC">
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Summary of Dispute</label>
                                                                                <textarea class="form-control" rows="3"></textarea>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Background Information</label>
                                                                                <textarea class="form-control" rows="3"></textarea>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Relief sought</label>
                                                                                <textarea class="form-control" rows="3"></textarea>
                                                                            </div>
                                                                            <div class="mb-4">
                                                                                <label class="form-label">Specific concerns</label>
                                                                                <textarea class="form-control" rows="3"></textarea>
                                                                            </div>

                                                                            <div class="mb-4">
                                                                                <label class="form-label">Negotiation terms</label>
                                                                                <textarea class="form-control" rows="3"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
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

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Create a dispute confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <p class="form-label mb-0">Dispute ID</p>
                        <p class="mb-0 ft-sm">DS138</p>
                    </div>
                    <div class="mb-3">
                        <p class="form-label mb-0">Filing date</p>
                        <p class="mb-0 ft-sm">Feb 1, 2024</p>
                    </div>
                    <div class="mb-3">
                        <p class="form-label mb-0">Case title</p>
                        <p class="mb-0 ft-sm">Measures Concerning Trading Agricultural Goods</p>
                    </div>
                    <div class="mb-3">
                        <p class="form-label mb-0">Dispute type</p>
                        <p class="mb-0 ft-sm">Wages & Salaries</p>
                    </div>
                    <div class="mb-3">
                        <p class="form-label mb-0">Initiating party (Claimant)</p>
                        <p class="mb-0 ft-sm">National Union of Food, Beverage and Tobacco Employees NUFBTE</p>
                    </div>
                    <div class="mb-3">
                        <p class="form-label mb-0">Accused party (Respondents)</p>
                        <p class="mb-0 ft-sm">Federal Road Safety Commission FRSC</p>
                    </div>
                    <div class="mb-3">
                        <p class="form-label mb-0">Summary of Dispute</p>
                        <p class="mb-0 ft-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio laudantium deserunt fugit totam rem magnam, iusto impedit vero reprehenderit incidunt molestias. Sit, illum incidunt cupiditate placeat sed beatae voluptate accusantium.</p>
                    </div>
                    <div class="mb-3">
                        <p class="form-label mb-0">Background information</p>
                        <p class="mb-0 ft-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio laudantium deserunt fugit totam rem magnam, iusto impedit vero reprehenderit incidunt molestias. Sit, illum incidunt cupiditate placeat sed beatae voluptate accusantium.</p>
                    </div>
                    <div class="mb-3">
                        <p class="form-label mb-0">Relief sought</p>
                        <p class="mb-0 ft-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio laudantium deserunt fugit totam rem magnam, iusto impedit vero reprehenderit incidunt molestias. Sit, illum incidunt cupiditate placeat sed beatae voluptate accusantium.</p>
                    </div>
                    <div class="mb-3">
                        <p class="form-label mb-0">Specific concerns</p>
                        <p class="mb-0 ft-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio laudantium deserunt fugit totam rem magnam, iusto impedit vero reprehenderit incidunt molestias. Sit, illum incidunt cupiditate placeat sed beatae voluptate accusantium.</p>
                    </div>
                    <div class="mb-3">
                        <p class="form-label mb-0">Negotiation terms</p>
                        <p class="mb-0 ft-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio laudantium deserunt fugit totam rem magnam, iusto impedit vero reprehenderit incidunt molestias. Sit, illum incidunt cupiditate placeat sed beatae voluptate accusantium.</p>
                    </div>

                    <div class="mt-4 mb-3">
                        <a href="disputes-2.php" class="btn btn-size btn-main-primary px-3 w-100">Proceed</a>
                    </div>
                    <div class="text-center">
                        <a href="#" class="text-main-primary text-medium text-decoration-none" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>