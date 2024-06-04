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

                                                <div class="d-flex align-items-center gap-20 mt-4 ">
                                                    <a href="help-support.php" class="text-muted-4 text-decoration-none"><i class="bi bi-arrow-left"></i> Go back</a>

                                                    <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                                                        <ol class="breadcrumb mb-0">
                                                            <li class="breadcrumb-item"><a href="documents.php" class="text-main-primary text-decoration-none">Case Folders</a></li>
                                                            <li class="breadcrumb-item text-muted-3 active" aria-current="page">Random Docs</li>
                                                        </ol>
                                                    </nav>
                                                </div>

                                                <div class="row mt-5">
                                                    <div class="col-lg-10">
                                                        <div class="card mb-4">
                                                            <div class="card-header p-4 heading-card bg-white d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <h3>Random Docs</h3>
                                                                </div>

                                                                <button class="btn btn-size btn-main-primary px-3" data-bs-toggle="modal" data-bs-target="#folderModal2">Add Documents</button>
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

                                                                            <p class="text-end mb-0 file-count">Document: 0</p>
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
                                                                                       Submission letter
                                                                                    </td>
                                                                                    <td>3 MB</td>
                                                                                    <td>PDF</td>
                                                                                    <td>Feb 4 2019</td>
                                                                                    <td>
                                                                                        <div class="dropdown">
                                                                                            <button class="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                <img src="images/dots-v.svg" class="img-fluid" alt="dot-v">
                                                                                            </button>
                                                                                            <ul class="dropdown-menu border-radius action-menu-2">
                                                                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                                                                <li><a class="dropdown-item" href="#">Print</a></li>
                                                                                                <li><a class="dropdown-item" href="#">Download</a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                            </tbody>
                                                                        </table>
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
                                                                        </table>
                                                                        <div class="card no-admin-card rounded-0">
                                                                            <div class="card-body d-flex align-items-center justify-content-center">
                                                                                <div class="text-center">

                                                                                    <div class="text-center mb-4">
                                                                                        <img src="images/no-document.svg" class="img-fluid" />
                                                                                    </div>

                                                                                    <h4 class="">No documents here</h4>

                                                                                    <div class="row">
                                                                                        <div class="col-lg-7 mx-auto">
                                                                                            <p class="text-muted-3 text-center">You don’t have any documents here.Upload some by clicking the button below</p>
                                                                                        </div>
                                                                                    </div>

                                                                                    <button class="btn btn-size btn-main-primary px-3 mx-auto" data-bs-toggle="modal" data-bs-target="#folderModal2">Add Documents</button>

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

     <!-- Modal -->
    <div class="modal fade" id="folderModal2" tabindex="-1" aria-labelledby="folderModal2Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-header justify-content-between">
                    <h1 class="modal-title fs-5">Upload Documents</h1>
                   
                    <div class="gap-10 d-flex align-items-center">
                        <button class="btn btn btn-size btn-main-outline-primary px-3" data-bs-dismiss="modal" aria-label="Close">Back</button>

                        <a href="documents-2.php" class="btn btn-main-primary btn-size px-3">Save</a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="">

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


    <?php include "./components/javascript.inc.php"; ?>
  </body>
</html>