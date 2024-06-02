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
                            <h2>Users & Groups </h2>
                        </div>
                    </div>

                    <div class="content-main">
                        <div class="container">
                            <div class="row py-4">
                                <div class="col-lg-10">
                                    <div class="d-flex gap-15">
                                        <div><a href="users.php" class="text-muted-4 text-decoration-none"><i class="bi bi-arrow-left"></i> Go back</a></div>

                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="text-main-primary text-decoration-none">Users</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">View members</li>
                                            </ol>
                                        </nav>
                                    </div>

                                    <table class="table table-list mt-4">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date added</th>
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
                                                <td>Pending</td>
                                            </tr>

                                        </tbody>
                                    </table>
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