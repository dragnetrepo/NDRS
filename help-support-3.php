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
                            <h2>Help & Support</h2>
                        </div>
                    </div>

                    <div class="content-main">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h4 class="mt-4 bold-text">How can we help you today?</h4>

                                    <div class="input-group mt-4">
                                        <span class="input-group-text bg-transparent">
                                            <img src="images/search.svg" class="img-fluid" alt="search">
                                        </span>
                                        <input type="search" class="form-control border-start-0 form-control-height" placeholder="Search for articles">
                                    </div>

                                    <p class="help-text mt-4">Search Results for: <strong>Creating Unions</strong></p>

                                    <div class="heading-card mt-4">
                                        <img src="images/help.svg" class="img-fluid mb-3" />

                                        <h3>Discussions</h3>
                                        <p class="help-text">Learn how to use discussions during and after a dispute case</p>

                                        <p class="help-text-sub">24 articles</p>
                                    </div>

                                    <div class="accordion mt-4" id="accordionHelp">

                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    How to send messages? 
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionHelp">
                                                <div class="accordion-body">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate nulla nisi sit distinctio. Odit sapiente nobis perferendis cupiditate aperiam quam maiores corrupti vitae. Natus, enim voluptatibus exercitationem animi omnis aliquam.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    How do I create a poll for voting within discussions
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionHelp">
                                                <div class="accordion-body">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate nulla nisi sit distinctio. Odit sapiente nobis perferendis cupiditate aperiam quam maiores corrupti vitae. Natus, enim voluptatibus exercitationem animi omnis aliquam.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    How to pass judgedment or key decisions as a settlement body
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionHelp">
                                                <div class="accordion-body">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate nulla nisi sit distinctio. Odit sapiente nobis perferendis cupiditate aperiam quam maiores corrupti vitae. Natus, enim voluptatibus exercitationem animi omnis aliquam.
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