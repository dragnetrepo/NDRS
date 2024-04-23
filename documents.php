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
                            <h2>Documents</h2>
                        </div>
                    </div>

                    <div class="content-main">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="margin-top-negative">
                                        <ul class="nav custom-tab nav-underline mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-folder-tab" data-bs-toggle="pill" data-bs-target="#pills-folder" type="button" role="tab" aria-controls="pills-folder" aria-selected="true">Case Folders</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-document-tab" data-bs-toggle="pill" data-bs-target="#pills-document" type="button" role="tab" aria-controls="pills-document" aria-selected="false">All Documents</button>
                                            </li>
                            
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-folder" role="tabpanel" aria-labelledby="pills-folder-tab" tabindex="0">
                                                <div class="row mt-5">
                                                    <div class="col-lg-10">
                                                        <div class="card mb-4">
                                                            <div class="card-header p-4 heading-card bg-white">
                                                                <h3>Case Folders</h3>
                                                                <p class="text-muted-3 font-sm mb-0">Each dispute case automatically creates a new folder</p>
                                                            </div>
                                                            <div class="card-body p-4">

                                                                <div class="row mt-2 mb-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="input-group">
                                                                            <span class="input-group-text bg-transparent">
                                                                                <img src="images/search.svg" class="img-fluid" alt="search">
                                                                            </span>
                                                                            <input type="search" class="form-control border-start-0 form-control-height" placeholder="Search here...">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <div class="d-flex align-items-center justify-content-between gap-15">

                                                                            <a class="btn btn-size btn-outline-light text-medium px-3"><img src="images/sort.svg" class="img-fluid me-2"> Sort</a>

                                                                            <p class="text-end mb-0 file-count">Folders: 134</p>
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
                                                                                    <th scope="col">Name</th>
                                                                                    <th scope="col">Size</th>
                                                                                    <th scope="col">No of Docs</th>
                                                                                    <th scope="col">Filing Date</th>
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
                                                                                        <div title="Shalom Winner - Solar Sales Receipt Installation" class="text-truncate max-200">Shalom Winner - Solar Sales Receipt Installation</div>
                                                                                    </td>
                                                                                    <td>1.2 MB</td>
                                                                                    <td>12</td>
                                                                                    <td>Feb 4 2019</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <div>
                                                                                            <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div title="Shalom Winner - Solar Sales Receipt Installation" class="text-truncate max-200">Shalom Winner - Solar Sales Receipt Installation</div>
                                                                                    </td>
                                                                                    <td>1.2 MB</td>
                                                                                    <td>12</td>
                                                                                    <td>Feb 4 2019</td>
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

                                            <div class="tab-pane fade" id="pills-document" role="tabpanel" aria-labelledby="pills-document-tab" tabindex="0">
                                                <div class="row mt-5">
                                                    <div class="col-lg-10">
                                                        <div class="card mb-4">
                                                            <div class="card-header p-4 heading-card bg-white">
                                                                <h3>All Documents</h3>
                                                            </div>
                                                            <div class="card-body p-4">

                                                                <div class="row mt-2 mb-4">
                                                                    <div class="col-lg-6">
                                                                        <div class="input-group">
                                                                            <span class="input-group-text bg-transparent">
                                                                                <img src="images/search.svg" class="img-fluid" alt="search">
                                                                            </span>
                                                                            <input type="search" class="form-control border-start-0 form-control-height" placeholder="Search here...">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <div class="d-flex align-items-center justify-content-between gap-15">

                                                                            <a class="btn btn-size btn-outline-light text-medium px-3"><img src="images/sort.svg" class="img-fluid me-2"> Sort</a>

                                                                            <p class="text-end mb-0 file-count">Files: 134</p>
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
                                                                                    <th scope="col">Name</th>
                                                                                    <th scope="col">Size</th>
                                                                                    <th scope="col">File Type</th>
                                                                                    <th scope="col">Filing Date</th>
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
                                                                                        <div title="Shalom Winner - Solar Sales Receipt Installation" class="text-truncate max-200">Shalom Winner - Solar Sales Receipt Installation</div>
                                                                                    </td>
                                                                                    <td>1.2 MB</td>
                                                                                    <td>PDF</td>
                                                                                    <td>Feb 4 2019</td>
                                                                                    <td>
                                                                                        <div class="dropdown">
                                                                                            <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                <img src="images/dots-v.svg" class="img-fluid" alt="dots" />
                                                                                            </button>
                                                                                            <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                <li><a class="dropdown-item" href="#">Download</a></li>
                                                                                                <li><a class="dropdown-item" href="#">Copy</a></li>
                                                                                                <li><a class="dropdown-item" href="#">Delete</a></li>
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
                                                                                        <div title="Shalom Winner - Solar Sales Receipt Installation" class="text-truncate max-200">Shalom Winner - Solar Sales Receipt Installation</div>
                                                                                    </td>
                                                                                    <td>1.2 MB</td>
                                                                                    <td>JPEG</td>
                                                                                    <td>Feb 4 2019</td>
                                                                                    <td>
                                                                                        <div class="dropdown">
                                                                                            <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                <img src="images/dots-v.svg" class="img-fluid" alt="dots" />
                                                                                            </button>
                                                                                            <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                <li><a class="dropdown-item" href="#">Download</a></li>
                                                                                                <li><a class="dropdown-item" href="#">Copy</a></li>
                                                                                                <li><a class="dropdown-item" href="#">Delete</a></li>
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