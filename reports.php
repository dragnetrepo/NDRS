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
                            <h2>Reports</h2>
                        </div>
                    </div>

                    <div class="content-main">
                        <div class="container">
                            <div class="row my-4">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent">
                                            <img src="images/search.svg" class="img-fluid" alt="search">
                                        </span>
                                        <input type="search" class="form-control border-start-0 form-control-height" placeholder="Search any user, group of users, union, branch or sub branch ">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center justify-content-end gap-15">

                                        <div class="d-flex">

                                            <a class="btn btn-size btn-outline-light text-medium px-3 me-lg-3"><img src="images/filter.svg" class="img-fluid"> Last 30 days</a>

                                            <button class="btn btn-size btn-main-outline-primary px-3"><i class="bi bi-download"></i></button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row mt-4">
                                <div class="col-lg-4 mb-4">
                                    <div class="card h-100 p-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <p class="text-muted-3 text-medium">Disputes Approved</p>
                                                <img src="images/report-1.svg" class="img-fluid" alt="report" />
                                            </div>

                                            <div class="mb-3 d-flex align-items-center gap-10">
                                                <h3 class="report-card-count mb-0">64</h3>
                                            </div>

                                            <div class="d-flex align-items-center gap-15">
                                                <div class="badge-custom badge-success"><i class="bi bi-arrow-up"></i> 10</div>

                                                <span class="text-medium report-text-sub">Compared to last month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <div class="card h-100 p-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <p class="text-muted-3 text-medium">Dispute Satisfaction Score</p>
                                                <img src="images/report-1.svg" class="img-fluid" alt="report" />
                                            </div>

                                            <div class="mb-3 d-flex align-items-center gap-10">
                                                <h3 class="report-card-count mb-0">4.3</h3>
                                                <span class="report-card-review">(34 reviews)</span>
                                            </div>

                                            <div class="d-flex align-items-center gap-15">
                                                <div class="badge-custom badge-success"><i class="bi bi-arrow-up"></i> 10</div>

                                                <span class="text-medium report-text-sub">Compared to last month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <div class="card h-100 p-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <p class="text-muted-3 text-medium">Document Uploaded</p>
                                                <img src="images/report-1.svg" class="img-fluid" alt="report" />
                                            </div>

                                            <div class="mb-3 d-flex align-items-center gap-10">
                                                <h3 class="report-card-count mb-0">63</h3>
                                            </div>

                                            <div class="d-flex align-items-center gap-15">
                                                <div class="badge-custom badge-success"><i class="bi bi-arrow-up"></i> 10</div>

                                                <span class="text-medium report-text-sub">Compared to last month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <div class="card h-100 p-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <p class="text-muted-3 text-medium">Disputes Resovled</p>
                                                <img src="images/report-1.svg" class="img-fluid" alt="report" />
                                            </div>

                                            <div class="mb-3 d-flex align-items-center gap-10">
                                                <h3 class="report-card-count mb-0">63</h3>
                                            </div>

                                            <div class="d-flex align-items-center gap-15">
                                                <div class="badge-custom badge-success"><i class="bi bi-arrow-up"></i> 10</div>

                                                <span class="text-medium report-text-sub">Compared to last month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <div class="card h-100 p-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <p class="text-muted-3 text-medium">Active Disputes</p>
                                                <img src="images/report-1.svg" class="img-fluid" alt="report" />
                                            </div>

                                            <div class="mb-3 d-flex align-items-center gap-10">
                                                <h3 class="report-card-count mb-0">21</h3>
                                            </div>

                                            <div class="d-flex align-items-center gap-15">
                                                <div class="badge-custom badge-success"><i class="bi bi-arrow-up"></i> 10</div>

                                                <span class="text-medium report-text-sub">Compared to last month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <div class="card h-100 p-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <p class="text-muted-3 text-medium">Avg. Dispute Resolution Time</p>
                                                <img src="images/report-1.svg" class="img-fluid" alt="report" />
                                            </div>

                                            <div class="mb-3 d-flex align-items-center gap-10">
                                                <h3 class="report-card-count mb-0">11 days</h3>
                                            </div>

                                            <div class="d-flex align-items-center gap-15">
                                                <div class="badge-custom badge-danger"><i class="bi bi-arrow-down"></i> 10</div>

                                                <span class="text-medium report-text-sub">Compared to last month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <div class="card p-lg-4 mb-5">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-lg-3">
                                                    <h3 class="chart-text">There has been a <span class="text-main-primary">32% decrease</span> in total time of Dispute Resolutions over the past <span class="text-main-primary">1 year</span></h3>
                                                </div>

                                                <div class="col-lg-8 offset-lg-1">
                                                    <div class="chart-tab d-flex align-items-center gap-10 justify-content-end mb-3">
                                                        <button class="btn btn-link ft-sm text-decoration-none text-muted-3">1 week</button>
                                                        <button class="btn btn-link ft-sm text-decoration-none text-muted-3">1 month</button>
                                                        <button class="btn btn-link ft-sm text-decoration-none text-muted-3">4 months</button>
                                                        <button class="btn btn-link ft-sm text-decoration-none text-muted-3 active-date">8 months</button>
                                                        <button class="btn btn-link ft-sm text-decoration-none text-muted-3">1 year</button>
                                                        <button class="btn btn-link ft-sm text-decoration-none text-muted-3">Max</button>
                                                    </div>
                                                    <canvas id="myChart3"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row mt-4">
                                <div class="col-lg-6 mb-3">
                                    <div class="card h-100 p-3">
                                        <div class="card-body">
                                            <h3 class="heading-2 text-darken mb-4">Top Dispute Types</h3>

                                            <div class="heading-box d-flex justify-content-between align-items-center">
                                                <p class="ft-sm text-muted-3">Types</p>
                                                <p class="ft-sm text-muted-3">No of cases</p>
                                            </div>

                                            <div class="progress-box">
                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-1" style="width: 80%">Wage and Benefit Disputes</div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-1" style="width: 40%">Work Hours and Leave</div>
                                                    </div>

                                                    <span>40</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-1" style="width: 54%">Workplace Health and Safety</div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-1" style="width: 40%">Discrimination and Harassment</div>
                                                    </div>

                                                    <span>40</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-1" style="width: 54%">Unfair Dismissals</div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-1" style="width: 40%">Contractual Disputes</div>
                                                    </div>

                                                    <span>40</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-1" style="width: 54%">Union Representation Issues</div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-1" style="width: 40%">Workplace Restructuring</div>
                                                    </div>

                                                    <span>40</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-1" style="width: 54%">Employee Rights and Entitlement</div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-1" style="width: 40%">Management and Employee Relation</div>
                                                    </div>

                                                    <span>40</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <div class="card h-100 p-3">
                                        <div class="card-body">
                                            <h3 class="heading-2 text-darken mb-4">Highest Dispute Cases </h3>

                                            <div class="heading-box d-flex justify-content-between align-items-center">
                                                <p class="ft-sm text-muted-3">Union</p>
                                                <p class="ft-sm text-muted-3">No of cases</p>
                                            </div>

                                            <div class="progress-box">
                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-2" style="width: 80%">National Union of Teachers</div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-2" style="width: 40%">Workplace Health and Safety</div>
                                                    </div>

                                                    <span>40</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-2" style="width: 54%">Discrimination and Harassment</div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-2" style="width: 40%">Unfair Dismissals</div>
                                                    </div>

                                                    <span>40</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-2" style="width: 54%">Contractual Disputes</div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-2" style="width: 40%">Contractual Disputes</div>
                                                    </div>

                                                    <span>40</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-2" style="width: 54%">Union Representation Issues</div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-2" style="width: 40%">Workplace Restructuring</div>
                                                    </div>

                                                    <span>40</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-2" style="width: 54%">Employee Rights and Entitlement</div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-2" style="width: 40%">Management and Employee Relation</div>
                                                    </div>

                                                    <span>40</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row my-4">
                                <div class="col-lg-12 mb-3">
                                    <div class="card h-100 p-3">
                                        <div class="card-body">
                                            <h3 class="heading-2 text-darken mb-4">Highest Resolution Rate</h3>

                                            <div class="heading-box d-flex justify-content-between align-items-center">
                                                <p class="ft-sm text-muted-3">Union</p>
                                                <p class="ft-sm text-muted-3">No of cases</p>
                                            </div>

                                            <div class="progress-box">
                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-3" style="width: 80%">
                                                            <div class="d-flex align-items-center justify-content-inherit avatar-holder">
                                                                <div class="position-relative">
                                                                    <div class="avatar-xs flex-shrink-0">
                                                                        <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                    </div>
                                                                </div>
                                                                <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                                    <p class="mb-0">National Union of Petroleum and Natural Gas Workers</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-3" style="width: 40%">
                                                            <div class="d-flex align-items-center justify-content-inherit avatar-holder">
                                                                <div class="position-relative">
                                                                    <div class="avatar-xs flex-shrink-0">
                                                                        <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                    </div>
                                                                </div>
                                                                <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                                    <p class="mb-0">Union Representation Issues</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <span>40</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-3" style="width: 54%">
                                                            <div class="d-flex align-items-center justify-content-inherit avatar-holder">
                                                                <div class="position-relative">
                                                                    <div class="avatar-xs flex-shrink-0">
                                                                        <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                    </div>
                                                                </div>
                                                                <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                                    <p class="mb-0">National Carpenters Guild</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-3" style="width: 40%">
                                                            <div class="progress-bar progress-color-3" style="width: 54%">
                                                                <div class="d-flex align-items-center justify-content-inherit avatar-holder">
                                                                    <div class="position-relative">
                                                                        <div class="avatar-xs flex-shrink-0">
                                                                            <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                                        <p class="mb-0">National Union Of Teachers</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <span>40</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-3" style="width: 54%">
                                                            <div class="d-flex align-items-center justify-content-inherit avatar-holder">
                                                                <div class="position-relative">
                                                                    <div class="avatar-xs flex-shrink-0">
                                                                        <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                    </div>
                                                                </div>
                                                                <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                                    <p class="mb-0">National Union Of Teachers</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-3" style="width: 40%">
                                                            <div class="d-flex align-items-center justify-content-inherit avatar-holder">
                                                                <div class="position-relative">
                                                                    <div class="avatar-xs flex-shrink-0">
                                                                        <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                    </div>
                                                                </div>
                                                                <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                                    <p class="mb-0">National Union Of Teachers</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <span>40</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-3" style="width: 54%">
                                                            <div class="d-flex align-items-center justify-content-inherit avatar-holder">
                                                                <div class="position-relative">
                                                                    <div class="avatar-xs flex-shrink-0">
                                                                        <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                    </div>
                                                                </div>
                                                                <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                                    <p class="mb-0">National Union Of Teachers</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-3" style="width: 40%">
                                                            <div class="d-flex align-items-center justify-content-inherit avatar-holder">
                                                                <div class="position-relative">
                                                                    <div class="avatar-xs flex-shrink-0">
                                                                        <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                    </div>
                                                                </div>
                                                                <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                                    <p class="mb-0">National Union Of Teachers</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <span>40</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-3" style="width: 54%">
                                                            <div class="d-flex align-items-center justify-content-inherit avatar-holder">
                                                                <div class="position-relative">
                                                                    <div class="avatar-xs flex-shrink-0">
                                                                        <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                    </div>
                                                                </div>
                                                                <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                                    <p class="mb-0">National Union Of Teachers</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <span>54</span>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-20">
                                                    <div class="progress progress-height-report bg-white" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-color-3" style="width: 40%">
                                                            <div class="d-flex align-items-center justify-content-inherit avatar-holder">
                                                                <div class="position-relative">
                                                                    <div class="avatar-xs flex-shrink-0">
                                                                        <img src="images/nnpc.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar">
                                                                    </div>
                                                                </div>
                                                                <div class="ms-2 d-flex flex-grow-1 text-muted-3">
                                                                    <p class="mb-0">National Union Of Teachers</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <span>40</span>
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


    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>