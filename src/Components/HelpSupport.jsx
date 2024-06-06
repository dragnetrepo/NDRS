import React from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";

const HelpSupport = () => {
  return (
    <>
      <div className="main-admin-container bg-light dark-mode-active">
        <div className="d-flex flex-column flex-lg-row h-lg-100">
          {/* <?php include "./components/main-navbar.inc.php"; ?> */}
          <MainNavbarInc />
          <div className="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">
            {/* <?php include "./components/top-bar.inc.php"; ?> */}
            <TopBarInc />
            <main className="admin-content">
              <div className="header-box py-5">
                <div className="container">
                  <h2>Help & Support</h2>
                </div>
              </div>

              <div className="content-main">
                <div className="container">
                  <div className="row">
                    <div className="col-lg-9">
                      <div className="row my-4">
                        <div className="col-lg-12">
                          <div className="input-group">
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
                        </div>
                      </div>
                      <div className="row mt-4">
                        <div className="col-lg-6 mb-4">
                          <a
                            href="help-support-2.php"
                            className="text-decoration-none"
                          >
                            <div className="card h-100 heading-card card-hover p-3">
                              <div className="card-body">
                                <img
                                  src="/images/help.svg"
                                  className="img-fluid mb-3"
                                />

                                <h3>General Questions & Overview</h3>
                                <p className="help-text">
                                  Get all your general questions about using
                                  NDRS answered.
                                </p>

                                <p className="help-text-sub">24 articles</p>
                              </div>
                            </div>
                          </a>
                        </div>

                        <div className="col-lg-6 mb-4">
                          <a
                            href="help-support-2.php"
                            className="text-decoration-none"
                          >
                            <div className="card h-100 heading-card card-hover p-3">
                              <div className="card-body">
                                <img
                                  src="/images/help.svg"
                                  className="img-fluid mb-3"
                                />

                                <h3>Discussions</h3>
                                <p className="help-text">
                                  Learn how to use discussions during and after
                                  a dispute case.
                                </p>

                                <p className="help-text-sub">8 articles</p>
                              </div>
                            </div>
                          </a>
                        </div>

                        <div className="col-lg-6 mb-4">
                          <a
                            href="help-support-2.php"
                            className="text-decoration-none"
                          >
                            <div className="card h-100 heading-card card-hover p-3">
                              <div className="card-body">
                                <img
                                  src="/images/help.svg"
                                  className="img-fluid mb-3"
                                />

                                <h3>Disputes</h3>
                                <p className="help-text">
                                  Learn how create, monitor and track a dispute
                                  from declaration to resolution
                                </p>

                                <p className="help-text-sub">24 articles</p>
                              </div>
                            </div>
                          </a>
                        </div>

                        <div className="col-lg-6 mb-4">
                          <a
                            href="help-support-2.php"
                            className="text-decoration-none"
                          >
                            <div className="card h-100 heading-card card-hover p-3">
                              <div className="card-body">
                                <img
                                  src="/images/help.svg"
                                  className="img-fluid mb-3"
                                />

                                <h3>Documents</h3>
                                <p className="help-text">
                                  Learn how to manage and use your documents
                                </p>

                                <p className="help-text-sub">8 articles</p>
                              </div>
                            </div>
                          </a>
                        </div>

                        <div className="col-lg-6 mb-4">
                          <a
                            href="help-support-2.php"
                            className="text-decoration-none"
                          >
                            <div className="card h-100 heading-card card-hover p-3">
                              <div className="card-body">
                                <img
                                  src="/images/help.svg"
                                  className="img-fluid mb-3"
                                />

                                <h3>Settlement Bodies</h3>
                                <p className="help-text">
                                  Learn how create, monitor and track a dispute
                                  from declaration to resolution
                                </p>

                                <p className="help-text-sub">24 articles</p>
                              </div>
                            </div>
                          </a>
                        </div>

                        <div className="col-lg-6 mb-4">
                          <a
                            href="help-support-2.php"
                            className="text-decoration-none"
                          >
                            <div className="card h-100 heading-card card-hover p-3">
                              <div className="card-body">
                                <img
                                  src="/images/help.svg"
                                  className="img-fluid mb-3"
                                />

                                <h3>Individual Users</h3>
                                <p className="help-text">
                                  Learn how to manage and use your documents
                                </p>

                                <p className="help-text-sub">8 articles</p>
                              </div>
                            </div>
                          </a>
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

export default HelpSupport;
