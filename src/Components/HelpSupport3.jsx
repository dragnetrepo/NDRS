import React from "react";

const HelpSupport3 = () => {
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
                      <h4 className="mt-4 bold-text">
                        How can we help you today?
                      </h4>

                      <div className="input-group mt-4">
                        <span className="input-group-text bg-transparent">
                          <img
                            src="/images/search.svg"
                            className="img-fluid"
                            alt="search"
                          />
                        </span>
                        <input
                          type="search"
                          className="form-control border-start-0 form-control-height"
                          placeholder="Search for articles"
                        />
                      </div>

                      <p className="help-text mt-4">
                        Search Results for: <strong>Creating Unions</strong>
                      </p>

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

export default HelpSupport3;
