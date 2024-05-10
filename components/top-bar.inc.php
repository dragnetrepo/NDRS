<div class="bg-white d-lg-block d-none py-3">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- <div class="d-flex align-items-center">
            <i class="bi bi-list bi-2 text-dark cursor-pointer arrow-box me-3"></i>
            <div class="input-group">
                <span class="input-group-text border-0 bg-transparent">
                    <img src="images/search.svg" class="img-fluid" alt="search" />
                </span>
                <input type="search" class="form-control border-0" placeholder="Search NDRS...">
            </div>
        </div> -->

        <div class="d-flex align-items-center">
            <i class="bi bi-list bi-2 text-dark cursor-pointer arrow-box me-3"></i>

            <div class="d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#searchModal">
                <div class="input-group align-items-center">
                    <span class="input-group-text border-0 bg-transparent">
                        <img src="images/search.svg" class="img-fluid" alt="search" />
                    </span>
                    <span class="text-muted-3">Search NDRS...</span>
                </div>
            </div>
        </div>


        <div class="d-lg-flex align-items-center d-none" style="gap: 30px;">

            <a href="notifications.php" class="bell-box position-relative">
                <img src="images/dott.svg" class="img-fluid indicator-red" alt="indicator" />
                <img src="images/bell-green.svg" class="img-fluid" alt="bell" />
            </a>

            <!-- <button class="btn btn-main-primary">Create new <i class="bi bi-plus"></i></button> -->

            <div class="d-flex avatar-holder">
                <div class="position-relative">
                    <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator" />
                    <div class="avatar-sm flex-shrink-0">
                        <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                    </div>
                </div>
                <div class="ms-2 flex-grow-1">
                    <h5 class="mb-0">Simon Lalong</h5>
                    <p class="mb-0 text-muted-3">slalong@ndrs.org</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content p-lg-4 border-0">
        <div class="text-end">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row mb-4">
                <div class="col-lg-7">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent">
                            <img src="images/search.svg" class="img-fluid" alt="search" />
                        </span>
                        <input type="search" class="form-control border-start-0 form-control-height" placeholder="Search disputes...">
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="d-flex align-items-center justify-content-between gap-15">

                        <a class="btn btn-size btn-outline-light w-100 text-medium px-3" data-bs-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter"><img src="images/filter.svg" class="img-fluid me-2" /> Filters</a>

                        <button class="btn btn-size btn-outline-light w-100 text-medium px-3"><img src="images/sort.svg" class="img-fluid me-2" /> Sort</button>

                        <button class="btn btn-size btn-link w-100 text-main-primary text-medium text-decoration-none px-3">Clear all</button>
                    </div>
                </div>
            </div>

            <div class="collapse" id="collapseFilter">
                <div class="filter-option mb-4">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="text-underline">Document type</p>
                                    <ul class="list-unstyled filter-list">
                                        <li>All</li>
                                        <li>PNG</li>
                                        <li class="text-main-primary">PDF</li>
                                        <li>XLS</li>
                                        <li class="text-main-primary">JPEG</li>
                                        <li>MP3</li>
                                        <li>GIF</li>
                                    </ul>
                                </div>

                                <div class="col-lg-4">
                                    <p class="text-underline">Case status</p>
                                    <ul class="list-unstyled filter-list">
                                        <li class="text-main-primary">All</li>
                                        <li>Open</li>
                                        <li>On Hold</li>
                                        <li>Closed</li>
                                    </ul>
                                </div>

                                <div class="col-lg-4">
                                    <p class="text-underline">Date picker</p>
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label text-main-primary">From</label>
                                            <input type="date" class="form-control form-control-height" placeholder="">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-main-primary">To</label>
                                            <input type="date" class="form-control form-control-height" placeholder="">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="filter-selected d-flex align-items-center gap-15 mb-4">
                <button class="btn btn-size btn-outline-light text-medium text-muted-3 px-3">AAWUN <img src="images/x.svg" class="img-fluid ms-2" /></button>

                <button class="btn btn-size btn-outline-light text-medium text-muted-3 px-3">PDF <img src="images/x.svg" class="img-fluid ms-2" /></button>

                <button class="btn btn-size btn-outline-light text-medium text-muted-3 px-3">JPEG <img src="images/x.svg" class="img-fluid ms-2" /></button>

                <button class="btn btn-size btn-outline-light text-medium text-muted-3 px-3">1 Jan 2024 - 20 Mar 2024  <img src="images/x.svg" class="img-fluid ms-2" /></button>
            </div>

            <ul class="nav custom-tab nav-underline mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All <span class="badge badge-main rounded-pill">24</span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-disputes-tab" data-bs-toggle="pill" data-bs-target="#pills-disputes" type="button" role="tab" aria-controls="pills-disputes" aria-selected="false">Disputes <span class="badge badge-main rounded-pill">6</span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-doc-tab" data-bs-toggle="pill" data-bs-target="#pills-doc" type="button" role="tab" aria-controls="pills-doc" aria-selected="false">Documents <span class="badge badge-main rounded-pill">4</span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-users-tab" data-bs-toggle="pill" data-bs-target="#pills-users" type="button" role="tab" aria-controls="pills-users" aria-selected="false">Users <span class="badge badge-main rounded-pill">2</span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-union-tab" data-bs-toggle="pill" data-bs-target="#pills-union" type="button" role="tab" aria-controls="pills-union" aria-selected="false">Unions <span class="badge badge-main rounded-pill">2</span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-companies-tab" data-bs-toggle="pill" data-bs-target="#pills-companies" type="button" role="tab" aria-controls="pills-companies" aria-selected="false">Companies <span class="badge badge-main rounded-pill">2</span></button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">

                    <div class="mt-4 overflow-auto" style="height: 300px;">
                        <div class="d-flex avatar-holder py-4 border-bottom">
                            <div class="position-relative">
                                <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator" />
                                <div class="avatar-sm flex-shrink-0">
                                    <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                </div>
                            </div>
                            <div class="ms-2 flex-grow-1">
                                <h5 class="mb-0">AAWUN</h5>
                                <p class="mb-0 text-muted-3">in Unions & Branches / AAWUN </p>
                            </div>
                        </div>

                        <div class="d-flex avatar-holder py-4 border-bottom">
                            <div class="position-relative">
                                <img src="images/offline-icon.svg" class="img-fluid indicator-avatar" alt="indicator" />
                                <div class="avatar-sm flex-shrink-0">
                                    <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                </div>
                            </div>
                            <div class="ms-2 flex-grow-1">
                                <h5 class="mb-0">Agro Allied International</h5>
                                <p class="mb-0 text-muted-3">in Unions & Branches / AAWUN / Lagos / Companies</p>
                            </div>
                        </div>

                        <div class="d-flex avatar-holder py-4 border-bottom">
                            <div class="position-relative">
                                <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator" />
                                <div class="avatar-sm flex-shrink-0">
                                    <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                </div>
                            </div>
                            <div class="ms-2 flex-grow-1">
                                <h5 class="mb-0">DS231 - Anti land pollution measures </h5>
                                <p class="mb-0 text-muted-3">in Disputes / Agro Alllied International / <img src="images/resolved.svg" class="img-fluid" alt="resolved"/></p>
                            </div>
                        </div>

                        <div class="d-flex avatar-holder py-4 border-bottom">
                            <div class="position-relative">
                                <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator" />
                                <div class="avatar-sm flex-shrink-0">
                                    <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                </div>
                            </div>
                            <div class="ms-2 flex-grow-1">
                                <h5 class="mb-0">Form TD3 for DS231 - Agricultural products for relief fund</h5>
                                <p class="mb-0 text-muted-3">in Documents / DS231 / Edited 2wks ago </p>
                            </div>
                        </div>

                        <div class="d-flex avatar-holder py-4 border-bottom">
                            <div class="position-relative">
                                <img src="images/offline-icon.svg" class="img-fluid indicator-avatar" alt="indicator" />
                                <div class="avatar-sm flex-shrink-0">
                                    <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                </div>
                            </div>
                            <div class="ms-2 flex-grow-1">
                                <h5 class="mb-0">Agnes Chinagorom</h5>
                                <p class="mb-0 text-muted-3">Active</p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="tab-pane fade" id="pills-disputes" role="tabpanel" aria-labelledby="pills-disputes-tab" tabindex="0">...</div>

                <div class="tab-pane fade" id="pills-doc" role="tabpanel" aria-labelledby="pills-doc-tab" tabindex="0">...</div>

                <div class="tab-pane fade" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab" tabindex="0">...</div>

                <div class="tab-pane fade" id="pills-union" role="tabpanel" aria-labelledby="pills-union-tab" tabindex="0">...</div>

                <div class="tab-pane fade" id="pills-companies" role="tabpanel" aria-labelledby="pills-companies-tab" tabindex="0">...</div>

            </div>
        </div>
    </div>
  </div>
</div>