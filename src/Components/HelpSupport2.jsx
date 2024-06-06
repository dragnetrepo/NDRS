import React from "react";

const HelpSsupport2 = () => {
  return (
    <>
      <div className="main-admin-container bg-light dark-mode-active">
        <div className="d-flex flex-column flex-lg-row h-lg-100">
          {/* <?php include "./components/main-navbar.inc.php"; ?> */}

          <div className="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">
            {/* <?php include "./components/top-bar.inc.php"; ?> */}

            <main className="admin-content">
              <div className="header-box py-5">
                <div className="container">
                  <h2>Help & Support</h2>
                </div>
              </div>

              <div className="content-main">
                <div className="container">
                  <div className="row">
                    <div className="col-lg-7">
                      <div className="d-flex align-items-center gap-20 mt-4 ">
                        <a
                          href="help-support.php"
                          className="text-muted-4 text-decoration-none"
                        >
                          <i className="bi bi-arrow-left"></i> Go back
                        </a>

                        <nav
                          style="--bs-breadcrumb-divider: '/';"
                          aria-label="breadcrumb"
                        >
                          <ol className="breadcrumb mb-0">
                            <li className="breadcrumb-item">
                              <a
                                href="help-support.php"
                                className="text-main-primary text-decoration-none"
                              >
                                Help & Support
                              </a>
                            </li>
                            <li
                              className="breadcrumb-item text-muted-3 active"
                              aria-current="page"
                            >
                              Discussions
                            </li>
                          </ol>
                        </nav>
                      </div>

                      <div className="heading-card mt-4">
                        <img
                          src="/images/help.svg"
                          className="img-fluid mb-3"
                        />

                        <h3>Discussions</h3>
                        <p className="help-text">
                          Learn how to use discussions during and after a
                          dispute case
                        </p>

                        <p className="help-text-sub">24 articles</p>
                      </div>

                      <div className="accordion mt-4" id="accordionHelp">
                        <div className="accordion-item">
                          <h2 className="accordion-header">
                            <button
                              className="accordion-button"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#collapseOne"
                              aria-expanded="true"
                              aria-controls="collapseOne"
                            >
                              How to send messages?
                            </button>
                          </h2>
                          <div
                            id="collapseOne"
                            className="accordion-collapse collapse show"
                            data-bs-parent="#accordionHelp"
                          >
                            <div className="accordion-body">
                              Lorem ipsum, dolor sit amet consectetur
                              adipisicing elit. Voluptate nulla nisi sit
                              distinctio. Odit sapiente nobis perferendis
                              cupiditate aperiam quam maiores corrupti vitae.
                              Natus, enim voluptatibus exercitationem animi
                              omnis aliquam.
                            </div>
                          </div>
                        </div>

                        <div className="accordion-item">
                          <h2 className="accordion-header">
                            <button
                              className="accordion-button collapsed"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#collapseTwo"
                              aria-expanded="false"
                              aria-controls="collapseTwo"
                            >
                              How do I create a poll for voting within
                              discussions
                            </button>
                          </h2>
                          <div
                            id="collapseTwo"
                            className="accordion-collapse collapse"
                            data-bs-parent="#accordionHelp"
                          >
                            <div className="accordion-body">
                              Lorem ipsum, dolor sit amet consectetur
                              adipisicing elit. Voluptate nulla nisi sit
                              distinctio. Odit sapiente nobis perferendis
                              cupiditate aperiam quam maiores corrupti vitae.
                              Natus, enim voluptatibus exercitationem animi
                              omnis aliquam.
                            </div>
                          </div>
                        </div>

                        <div className="accordion-item">
                          <h2 className="accordion-header">
                            <button
                              className="accordion-button collapsed"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#collapseThree"
                              aria-expanded="false"
                              aria-controls="collapseThree"
                            >
                              How to pass judgedment or key decisions as a
                              settlement body
                            </button>
                          </h2>
                          <div
                            id="collapseThree"
                            className="accordion-collapse collapse"
                            data-bs-parent="#accordionHelp"
                          >
                            <div className="accordion-body">
                              Lorem ipsum, dolor sit amet consectetur
                              adipisicing elit. Voluptate nulla nisi sit
                              distinctio. Odit sapiente nobis perferendis
                              cupiditate aperiam quam maiores corrupti vitae.
                              Natus, enim voluptatibus exercitationem animi
                              omnis aliquam.
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
              <div className="container">
                <div className="row">
                  <div className="col-lg-12"></div>
                </div>
              </div>
            </footer>
          </div>
        </div>
      </div>
    </>
  );
};

export default HelpSsupport2;
