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
                            <h2>Discussions</h2>
                        </div>
                    </div>

                    <?php include "./components/discussion.inc.php"; ?>
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
    <div class="modal fade" id="pollModal" tabindex="-1" aria-labelledby="pollModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-header justify-content-between">
                    <h1 class="modal-title fs-5">Create poll</h1>
                   
                    <div class="gap-10 d-flex align-items-center">
                        <button class="btn btn btn-size btn-main-outline-primary px-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>

                        <a href="#" class="btn btn-main-primary btn-size px-3">Save</a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Poll question</label>
                            <input type="text" class="form-control form-control-height" placeholder="Ask a question">
                        </div>
                        <div class="col-lg-12">
                            <p><a href="#" class="text-medium text-main-primary text-decoration-none">Add poll option <i class="bi bi-plus"></i></a></p>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Poll option 1</label>
                            <input type="text" class="form-control form-control-height" placeholder="Type in a poll option">
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="Check1">
                                <label class="form-check-label text-medium" for="=Check1">Enable anonymous voting</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="caseModal" tabindex="-1" aria-labelledby="caseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-header justify-content-between">
                    <h1 class="modal-title fs-5">Change case status</h1>
                   
                    <div class="gap-10 d-flex align-items-center">
                        <button class="btn btn btn-size btn-main-outline-primary px-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>

                        <a href="#" class="btn btn-main-primary btn-size px-3">Save</a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">What is the current state of the dispute?</label>
                        <select class="form-select form-control-height disabled">
                            <option>Concilliation</option>
                            <option>Arbitration Tribunal</option>
                            <option>National Industrial Courts</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Was a resolution successfully reached?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Summary of Concilliation</label>
                        <textarea class="form-control" rows="3" placeholder="Type in your message"></textarea>
                    </div>

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
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="resultsModal" tabindex="-1" aria-labelledby="resultsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-header justify-content-between">
                    <h1 class="modal-title fs-5">View Poll Results</h1>
                   
                    <div class="gap-10 d-flex align-items-center">
                        <button class="btn btn-main-primary btn-size px-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="py-3 border-bottom">
                        <span class="text-medium d-block mb-2">Satisfied - 50%</span>

                        <div class="avatars margin-unset ms-2">

                            <div class="avatars__item">
                                <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                    src="https://randomuser.me/api/portraits/women/65.jpg" alt="">
                            </div>

                            <div class="avatars__item">
                                <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                    src="https://randomuser.me/api/portraits/women/66.jpg" alt="">
                            </div>

                            <div class="avatars__item">
                                <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                    src="https://randomuser.me/api/portraits/women/67.jpg" alt="">
                            </div>

                            <div class="avatars__item">
                                <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                    src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                            </div>


                            <div class="avatars__item">
                                <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                    src="https://randomuser.me/api/portraits/women/69.jpg" alt="">
                            </div>

                            <div class="avatars__item d-flex justify-content-center align-items-center ft-sm text-medium">
                                +10
                            </div>

                        </div>
                    </div>

                    <div class="py-3 border-bottom">
                        <span class="text-medium d-block mb-2">Unsatisfied - 30%</span>

                        <div class="avatars margin-unset ms-2">

                            <div class="avatars__item">
                                <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                    src="https://randomuser.me/api/portraits/women/65.jpg" alt="">
                            </div>

                            <div class="avatars__item">
                                <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                    src="https://randomuser.me/api/portraits/women/66.jpg" alt="">
                            </div>

                            <div class="avatars__item">
                                <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                    src="https://randomuser.me/api/portraits/women/67.jpg" alt="">
                            </div>

                        </div>
                    </div>

                    <div class="py-3 border-bottom">
                        <span class="text-medium d-block mb-2">Not Sure - 20%</span>

                        <div class="avatars margin-unset ms-2">

                            <div class="avatars__item">
                                <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                    src="https://randomuser.me/api/portraits/women/65.jpg" alt="">
                            </div>

                            <div class="avatars__item">
                                <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                    src="https://randomuser.me/api/portraits/women/66.jpg" alt="">
                            </div>

                            <div class="avatars__item">
                                <img class="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                    src="https://randomuser.me/api/portraits/women/67.jpg" alt="">
                            </div>

                        </div>
                    </div>
                </div>
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

                        <a href="#" class="btn btn-main-primary btn-size px-3">Save</a>
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


    <!-- Modal -->
    <div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-lg-4 border-0">
                <div class="modal-header justify-content-between">
                    <h1 class="modal-title fs-5">Schedule meeting</h1>
                   
                    <div class="gap-10 d-flex align-items-center">
                        <button class="btn btn-main-primary btn-size px-3">Post meeting</button>
                    </div>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control form-control-height" placeholder="Type the title of the meeting">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control form-control-height" placeholder="Select a date">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control form-control-height" placeholder="Type the location for offline or link for online meetings">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Start</label>
                                    <select class="form-select form-control-height">
                                        <option>Select a time</option>
                                        <option>10am</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">End</label>
                                    <select class="form-select form-control-height">
                                        <option>Select a time</option>
                                        <option>2pm</option>
                                    </select>
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