<nav class="flex-none navbar navbar-vertical navbar-expand-lg show vh-lg-100 bg-custom-color px-0 py-2 navbar-light" id="sidebar">

    <div class="container-fluid flex-lg-column align-items-lg-start">

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation"><i class="bi bi-list bi-2 text-dark cursor-pointer"></i></button>

        <a class="navbar-brand me-0 text-bold" href="index.php">
            <img src="images/NDRS-Logo.svg" class="img-fluid" alt="logo" />
        </a>

        <div class="navbar-user d-lg-none">

            <div class="position-relative">
                <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator" />
                <div class="avatar-sm flex-shrink-0">
                    <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                </div>
            </div>

        </div>

        <div class="offcanvas offcanvas-end bg-main-secondary px-lg-1 px-4" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

            <div class="offcanvas-header">
                <div class="offcanvas-title flex-grow-1">
                    <a class="navbar-brand me-0 text-bold" href="index.php">
                        <img src="images/NDRS-Logo.svg" class="img-fluid" alt="Logo" />
                    </a>
                </div>

                <i class="bi bi-x-lg" data-bs-dismiss="offcanvas" aria-label="Close"></i>
            </div>

            <div class="offcanvas-body flex-column custom-offcanvas-h">

                <ul class="navbar-nav flex-column sidebar-list border-bottom py-3">
                    <li class="nav-item">
                        <a class="nav-link nav-active" aria-current="page" href="dashboard.php"><img src="images/home.svg" class="img-fluid" /> Dashboard</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="disputes.php"><img src="images/suitcase.svg" class="img-fluid" />  Disputes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="discussions.php"><img src="images/chats.svg" class="img-fluid" />  Discussions</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="images/folder.svg" class="img-fluid" />  Documents</a>
                    </li>
                </ul>


                <p class="mb-0 sub-text-sidebar mt-4">Tools</p>

                <ul class="navbar-nav flex-column sidebar-list list-unstyled py-3 flex-grow-1">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="users.php"><img src="images/users.svg" class="img-fluid" />  Users</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="images/branch.svg" class="img-fluid" />  Branches</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="images/bell.svg" class="img-fluid" />  Notification</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="images/clipboard.svg" class="img-fluid" />  Reports</a>
                    </li>
                </ul>

                <div>
                    <ul class="navbar-nav flex-column sidebar-list py-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#"><img src="images/headphones.svg" class="img-fluid" />  Help & Support</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="settings.php"><img src="images/settings.svg" class="img-fluid" />  Settings</a>
                        </li>
                    </ul>

                    <div class="d-flex justify-content-between align-items-center avatar-icon w-100">
                        <div class="d-flex avatar-holder">
                            <div class="position-relative">
                                <img src="images/Avatar-online-indicator.svg" class="img-fluid indicator-avatar" alt="indicator" />
                                <div class="avatar-sm flex-shrink-0">
                                    <img src="images/avatar-2.svg" class="img-fluid object-position-center object-fit-cover w-100 h-100" alt="Avatar" />
                                </div>
                            </div>
                            <div class="ms-2 flex-grow-1">
                                <h5 class="mb-0">Simon Lalong</h5>
                                <p class="mb-0">slalong@ndrs.org</p>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="images/log-out.svg" class="img-fluid" alt="Logout" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</nav>