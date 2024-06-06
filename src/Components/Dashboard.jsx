import React, { useState } from "react";
import TopBarInc from "../Bars/TopBarInc";
import MainNavbarInc from "../Bars/MainNavbarInc";

const Dashboard = () => {
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
                  <p>Wednesday, March 6th</p>
                  <h2>Good afternoon, Simon</h2>
                </div>
              </div>

              <div className="content-main py-5">
                <div className="container">
                  <div className="row">
                    <div className="col-lg-8">
                      <div className="row mb-5">
                        <div className="col-lg-4 mb-lg-0 mb-3">
                          <a href="/disputes" className="text-decoration-none">
                            <div className="card dash-card bg-custom-color-2 h-100 border-0">
                              <div className="card-body">
                                <div className="d-flex avatar-holder align-items-center mb-3">
                                  <div className="position-relative flex-shrink-0">
                                    <img
                                      src="/images/dispute-icon.svg"
                                      className="img-fluid"
                                    />
                                  </div>
                                  <div className="ms-2 flex-grow-1">
                                    <h5 className="mb-0">
                                      View Pending Disputes (43)
                                    </h5>
                                  </div>
                                </div>
                                <p className="mb-2">
                                  View all pending dispute requests
                                </p>

                                <p className="action mb-0">View disputes</p>
                              </div>
                            </div>
                          </a>
                        </div>

                        <div className="col-lg-4 mb-lg-0 mb-3">
                          <a
                            href="/unionBranches"
                            className="text-decoration-none"
                          >
                            <div className="card dash-card bg-custom-color-2 h-100 border-0">
                              <div className="card-body">
                                <div className="d-flex avatar-holder align-items-center mb-3">
                                  <div className="position-relative flex-shrink-0">
                                    <img
                                      src="/images/union-icon.svg"
                                      className="img-fluid"
                                    />
                                  </div>
                                  <div className="ms-2 flex-grow-1">
                                    <h5 className="mb-0">Create Unions</h5>
                                  </div>
                                </div>
                                <p className="mb-2">
                                  Create Unions and invite their respective
                                  admins
                                </p>

                                <p className="action mb-0">Create Unions</p>
                              </div>
                            </div>
                          </a>
                        </div>

                        <div className="col-lg-4 mb-lg-0 mb-3">
                          <a href="/users" className="text-decoration-none">
                            <div className="card dash-card bg-custom-color-2 h-100 border-0">
                              <div className="card-body">
                                <div className="d-flex avatar-holder align-items-center mb-3">
                                  <div className="position-relative flex-shrink-0">
                                    <img
                                      src="/images/userz-icon.svg"
                                      className="img-fluid"
                                    />
                                  </div>
                                  <div className="ms-2 flex-grow-1">
                                    <h5 className="mb-0">Invite Users</h5>
                                  </div>
                                </div>
                                <p className="mb-2">
                                  Invite users individually or in bulk to NDRS
                                </p>

                                <p className="action mb-0">Invite users</p>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>

                      <div className="d-flex justify-content-between align-items-center mb-2">
                        <h4 className="mb-0 heading-4">Reports</h4>
                        <a
                          href="/reports"
                          className="text-main-primary text-decoration-none text-medium"
                        >
                          Show all
                        </a>
                      </div>

                      <div className="card p-lg-4 mb-5">
                        <div className="card-body">
                          <div className="row align-items-center">
                            <div className="col-lg-4">
                              <h3 className="chart-text">
                                There has been a{" "}
                                <span className="text-main-primary">
                                  32% decrease
                                </span>{" "}
                                in total time of Dispute Resolutions over the
                                past{" "}
                                <span className="text-main-primary">
                                  1 year
                                </span>
                              </h3>
                            </div>

                            <div className="col-lg-8">
                              <img
                                src="/images/bar-chart.svg"
                                className="img-fluid"
                                alt="bar-chart"
                              />
                            </div>
                          </div>
                        </div>
                      </div>

                      <div className="d-flex justify-content-between align-items-center mb-2">
                        <h4 className="mb-0 heading-4">Notifications</h4>
                        <a
                          href="notifications"
                          className="text-main-primary text-decoration-none text-medium"
                        >
                          Show all
                        </a>
                      </div>

                      <div className="card p-lg-1 mb-5">
                        <div className="card-body p-0">
                          <div className="d-flex avatar-holder bg-custom-color-2 p-3 rounded my-4">
                            <div className="position-relative">
                              <div className="avatar-sm flex-shrink-0">
                                <img
                                  src="/images/ipman-logo.svg"
                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                  alt="Avatar"
                                />
                              </div>
                            </div>
                            <div className="ms-2 flex-grow-1">
                              <div className="mb-2 d-flex align-items-center">
                                <p className="mb-0">
                                  <strong>
                                    Atoyebi Damola (Ministry Admin)
                                  </strong>{" "}
                                  added you as <strong>Concilliator</strong> for{" "}
                                  <strong>Dispute Case 124</strong>
                                </p>
                              </div>

                              <div className="">
                                <p className="mb-0">2 hours ago</p>
                              </div>
                            </div>
                          </div>

                          <div className="d-flex avatar-holder bg-custom-color-2 p-3 rounded my-4">
                            <div className="position-relative">
                              <div className="avatar-sm flex-shrink-0">
                                <img
                                  src="/images/ipman-logo.svg"
                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                  alt="Avatar"
                                />
                              </div>
                            </div>
                            <div className="ms-2 flex-grow-1">
                              <div className="mb-2 d-flex align-items-center">
                                <p className="mb-0">
                                  <strong>John Balami</strong> (IAP/Tribunal)
                                  has given a <strong>Binding Decision</strong>{" "}
                                  for <strong>Dispute Case 124</strong>
                                </p>
                              </div>

                              <div className="">
                                <p className="mb-0">2 hours ago</p>
                              </div>
                            </div>
                          </div>

                          <div className="d-flex avatar-holder bg-custom-color-2 p-3 rounded my-4">
                            <div className="position-relative">
                              <div className="avatar-sm flex-shrink-0">
                                <img
                                  src="/images/ipman-logo.svg"
                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                  alt="Avatar"
                                />
                              </div>
                            </div>
                            <div className="ms-2 flex-grow-1">
                              <div className="mb-2 d-flex align-items-center">
                                <p className="mb-0">
                                  <strong>
                                    Atoyebi Damola (Ministry Admin)
                                  </strong>{" "}
                                  shared a document for{" "}
                                  <strong>Dispute Case 124</strong>
                                </p>
                              </div>

                              <div className="">
                                <p className="mb-0">2 hours ago</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div className="col-lg-4">
                      <div className="mb-4">
                        <div className="d-flex justify-content-between align-items-center mb-2">
                          <h4 className="mb-0 heading-4">Recent Discussions</h4>
                          <a
                            href="#"
                            className="text-main-primary text-decoration-none text-medium"
                          >
                            Show all
                          </a>
                        </div>
                        <div className="card dash-card">
                          <div className="card-body">
                            <div className="d-flex avatar-holder my-4">
                              <div className="position-relative">
                                <div className="avatar-sm flex-shrink-0">
                                  <img
                                    src="/images/user-photo.svg"
                                    className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                    alt="Avatar"
                                  />
                                </div>
                              </div>
                              <div className="ms-2 flex-grow-1">
                                <div className="d-flex justify-content-between align-items-center mb-2">
                                  <div className="mb-0 d-flex align-items-center">
                                    <div className="heading-text text-truncate max-150">
                                      Bala Abdulkareem
                                    </div>
                                    <span className="card-text-sm ms-2">
                                      DS131
                                    </span>
                                  </div>

                                  <span className="text-main-primary ft-sm-only">
                                    12.30
                                  </span>
                                </div>
                                <div className="d-flex justify-content-between align-items-start">
                                  <p className="mb-0 action line-clamp-2">
                                    I'd definitely shoot any discussions to all
                                    discussion in the box
                                  </p>
                                  <span className="badge rounded-pill text-bg-main">
                                    4
                                  </span>
                                </div>
                              </div>
                            </div>

                            <div className="d-flex avatar-holder my-4">
                              <div className="position-relative">
                                <div className="avatar-sm flex-shrink-0">
                                  <img
                                    src="/images/user-photo.svg"
                                    className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                    alt="Avatar"
                                  />
                                </div>
                              </div>
                              <div className="ms-2 flex-grow-1">
                                <div className="d-flex justify-content-between align-items-center mb-2">
                                  <div className="mb-0 d-flex align-items-center">
                                    <div className="heading-text text-truncate max-150">
                                      Bala Abdulkareem
                                    </div>
                                    <span className="card-text-sm ms-2">
                                      DS131
                                    </span>
                                  </div>

                                  <span className="text-main-primary ft-sm-only">
                                    12.30
                                  </span>
                                </div>
                                <div className="d-flex justify-content-between align-items-start">
                                  <p className="mb-0 action line-clamp-2">
                                    I'd definitely shoot any discussions to all
                                    discussion in the box
                                  </p>
                                  <span className="badge rounded-pill text-bg-main">
                                    4
                                  </span>
                                </div>
                              </div>
                            </div>

                            <div className="d-flex avatar-holder my-4">
                              <div className="position-relative">
                                <div className="avatar-sm flex-shrink-0">
                                  <img
                                    src="/images/user-photo.svg"
                                    className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                    alt="Avatar"
                                  />
                                </div>
                              </div>
                              <div className="ms-2 flex-grow-1">
                                <div className="d-flex justify-content-between align-items-center mb-2">
                                  <div className="mb-0 d-flex align-items-center">
                                    <div className="heading-text text-truncate max-150">
                                      Bala Abdulkareem
                                    </div>
                                    <span className="card-text-sm ms-2">
                                      DS131
                                    </span>
                                  </div>

                                  <span className="text-main-primary ft-sm-only">
                                    12.30
                                  </span>
                                </div>
                                <div className="d-flex justify-content-between align-items-start">
                                  <p className="mb-0 action line-clamp-2">
                                    I'd definitely shoot any discussions to all
                                    discussion in the box
                                  </p>
                                  <span className="badge rounded-pill text-bg-main">
                                    4
                                  </span>
                                </div>
                              </div>
                            </div>

                            <div className="d-flex avatar-holder my-4">
                              <div className="position-relative">
                                <div className="avatar-sm flex-shrink-0">
                                  <img
                                    src="/images/user-photo.svg"
                                    className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                    alt="Avatar"
                                  />
                                </div>
                              </div>
                              <div className="ms-2 flex-grow-1">
                                <div className="d-flex justify-content-between align-items-center mb-2">
                                  <div className="mb-0 d-flex align-items-center">
                                    <div className="heading-text text-truncate max-150">
                                      Bala Abdulkareem
                                    </div>
                                    <span className="card-text-sm ms-2">
                                      DS131
                                    </span>
                                  </div>

                                  <span className="text-main-primary ft-sm-only">
                                    12.30
                                  </span>
                                </div>
                                <div className="d-flex justify-content-between align-items-start">
                                  <p className="mb-0 action line-clamp-2">
                                    I'd definitely shoot any discussions to all
                                    discussion in the box
                                  </p>
                                  <span className="badge rounded-pill text-bg-main">
                                    4
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div className="mb-4">
                        <div className="d-flex justify-content-between align-items-center mb-2">
                          <h4 className="mb-0 heading-4">Recent Documents</h4>
                          <a
                            href="#"
                            className="text-main-primary text-decoration-none text-medium"
                          >
                            Show all
                          </a>
                        </div>
                        <div className="card dash-card">
                          <div className="card-body">
                            <div className="d-flex avatar-holder my-4">
                              <div className="position-relative">
                                <div className="flex-shrink-0">
                                  <img
                                    src="/images/pdf-icon.svg"
                                    className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                    alt="PDF"
                                  />
                                </div>
                              </div>
                              <div className="ms-2 flex-grow-1">
                                <div className="mb-2 d-flex align-items-center">
                                  <div className="heading-text text-truncate max-150">
                                    Union Guidelines Union Guidelines
                                  </div>{" "}
                                  <span className="card-text-sm ms-2">
                                    DS131
                                  </span>
                                </div>

                                <div className="d-flex justify-content-between align-items-center">
                                  <p className="mb-0">
                                    11 Sep, 2023 | 12:24pm{" "}
                                    <i className="bi bi-dot"></i>{" "}
                                    <span className="text-medium">13MB</span>
                                  </p>
                                </div>
                              </div>
                              <div className="avatar-sm flex-shrink-0">
                                <img
                                  src="/images/union-3.svg"
                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                  alt="Avatar"
                                />
                              </div>
                            </div>

                            <div className="d-flex avatar-holder my-4">
                              <div className="position-relative">
                                <div className="flex-shrink-0">
                                  <img
                                    src="/images/pdf-icon.svg"
                                    className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                    alt="PDF"
                                  />
                                </div>
                              </div>
                              <div className="ms-2 flex-grow-1">
                                <div className="mb-2 d-flex align-items-center">
                                  <div className="heading-text text-truncate max-150">
                                    Union Guidelines Union Guidelines
                                  </div>{" "}
                                  <span className="card-text-sm ms-2">
                                    DS131
                                  </span>
                                </div>

                                <div className="d-flex justify-content-between align-items-center">
                                  <p className="mb-0">
                                    11 Sep, 2023 | 12:24pm{" "}
                                    <i className="bi bi-dot"></i>{" "}
                                    <span className="text-medium">13MB</span>
                                  </p>
                                </div>
                              </div>
                              <div className="avatar-sm flex-shrink-0">
                                <img
                                  src="/images/union-3.svg"
                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                  alt="Avatar"
                                />
                              </div>
                            </div>

                            <div className="d-flex avatar-holder my-4">
                              <div className="position-relative">
                                <div className="flex-shrink-0">
                                  <img
                                    src="/images/jpg-icon.svg"
                                    className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                    alt="PDF"
                                  />
                                </div>
                              </div>
                              <div className="ms-2 flex-grow-1">
                                <div className="mb-2 d-flex align-items-center">
                                  <div className="heading-text text-truncate max-150">
                                    Union Guidelines Union Guidelines
                                  </div>{" "}
                                  <span className="card-text-sm ms-2">
                                    DS131
                                  </span>
                                </div>

                                <div className="d-flex justify-content-between align-items-center">
                                  <p className="mb-0">
                                    11 Sep, 2023 | 12:24pm{" "}
                                    <i className="bi bi-dot"></i>{" "}
                                    <span className="text-medium">13MB</span>
                                  </p>
                                </div>
                              </div>
                              <div className="avatar-sm flex-shrink-0">
                                <img
                                  src="/images/union-3.svg"
                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                  alt="Avatar"
                                />
                              </div>
                            </div>

                            <div className="d-flex avatar-holder my-4">
                              <div className="position-relative">
                                <div className="flex-shrink-0">
                                  <img
                                    src="/images/png-icon.svg"
                                    className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                    alt="PDF"
                                  />
                                </div>
                              </div>
                              <div className="ms-2 flex-grow-1">
                                <div className="mb-2 d-flex align-items-center">
                                  <div className="heading-text text-truncate max-150">
                                    Union Guidelines Union Guidelines
                                  </div>{" "}
                                  <span className="card-text-sm ms-2">
                                    DS131
                                  </span>
                                </div>

                                <div className="d-flex justify-content-between align-items-center">
                                  <p className="mb-0">
                                    11 Sep, 2023 | 12:24pm{" "}
                                    <i className="bi bi-dot"></i>{" "}
                                    <span className="text-medium">13MB</span>
                                  </p>
                                </div>
                              </div>
                              <div className="avatar-sm flex-shrink-0">
                                <img
                                  src="/images/union-3.svg"
                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                  alt="Avatar"
                                />
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

export default Dashboard;
