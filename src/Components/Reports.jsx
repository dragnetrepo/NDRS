import React from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";

const Reports = () => {
  return (
    <>
      <div className="main-admin-container bg-light dark-mode-active">
        <div className="d-flex flex-column flex-lg-row h-lg-100">
          {/* <?php include "./components/main-navbar.inc.php"; ?> */}
          <MainNavbarInc />

          <div className="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">
            {/* 
                    <?php include "./components/top-bar.inc.php"; ?> */}
            <TopBarInc />

            <main className="admin-content">
              <div className="header-box py-5">
                <div className="container">
                  <h2>Reports</h2>
                </div>
              </div>

              <div className="content-main">
                <div className="container">
                  <div className="row my-4">
                    <div className="col-lg-6">
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
                          placeholder="Search any user, group of users, union, branch or sub branch "
                        />
                      </div>
                    </div>

                    <div className="col-lg-6">
                      <div className="d-flex align-items-center justify-content-end gap-15">
                        <div className="d-flex">
                          <a className="btn btn-size btn-outline-light text-medium px-3 me-lg-3">
                            <img
                              src="/images/filter.svg"
                              className="img-fluid" alt=""
                            />{" "}
                            Last 30 days
                          </a>

                          <button className="btn btn-size btn-main-outline-primary px-3">
                            <i className="bi bi-download"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="container">
                  <div className="row mt-4">
                    <div className="col-lg-4 mb-4">
                      <div className="card h-100 p-3">
                        <div className="card-body">
                          <div className="d-flex justify-content-between">
                            <p className="text-muted-3 text-medium">
                              Disputes Approved
                            </p>
                            <img
                              src="/images/report-1.svg"
                              className="img-fluid"
                              alt="report"
                            />
                          </div>

                          <div className="mb-3 d-flex align-items-center gap-10">
                            <h3 className="report-card-count mb-0">64</h3>
                          </div>

                          <div className="d-flex align-items-center gap-15">
                            <div className="badge-custom badge-success">
                              <i className="bi bi-arrow-up"></i> 10
                            </div>

                            <span className="text-medium report-text-sub">
                              Compared to last month
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div className="col-lg-4 mb-4">
                      <div className="card h-100 p-3">
                        <div className="card-body">
                          <div className="d-flex justify-content-between">
                            <p className="text-muted-3 text-medium">
                              Dispute Satisfaction Score
                            </p>
                            <img
                              src="/images/report-1.svg"
                              className="img-fluid"
                              alt="report"
                            />
                          </div>

                          <div className="mb-3 d-flex align-items-center gap-10">
                            <h3 className="report-card-count mb-0">4.3</h3>
                            <span className="report-card-review">
                              (34 reviews)
                            </span>
                          </div>

                          <div className="d-flex align-items-center gap-15">
                            <div className="badge-custom badge-success">
                              <i className="bi bi-arrow-up"></i> 10
                            </div>

                            <span className="text-medium report-text-sub">
                              Compared to last month
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div className="col-lg-4 mb-4">
                      <div className="card h-100 p-3">
                        <div className="card-body">
                          <div className="d-flex justify-content-between">
                            <p className="text-muted-3 text-medium">
                              Document Uploaded
                            </p>
                            <img
                              src="/images/report-1.svg"
                              className="img-fluid"
                              alt="report"
                            />
                          </div>

                          <div className="mb-3 d-flex align-items-center gap-10">
                            <h3 className="report-card-count mb-0">63</h3>
                          </div>

                          <div className="d-flex align-items-center gap-15">
                            <div className="badge-custom badge-success">
                              <i className="bi bi-arrow-up"></i> 10
                            </div>

                            <span className="text-medium report-text-sub">
                              Compared to last month
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div className="col-lg-4 mb-4">
                      <div className="card h-100 p-3">
                        <div className="card-body">
                          <div className="d-flex justify-content-between">
                            <p className="text-muted-3 text-medium">
                              Disputes Resovled
                            </p>
                            <img
                              src="/images/report-1.svg"
                              className="img-fluid"
                              alt="report"
                            />
                          </div>

                          <div className="mb-3 d-flex align-items-center gap-10">
                            <h3 className="report-card-count mb-0">63</h3>
                          </div>

                          <div className="d-flex align-items-center gap-15">
                            <div className="badge-custom badge-success">
                              <i className="bi bi-arrow-up"></i> 10
                            </div>

                            <span className="text-medium report-text-sub">
                              Compared to last month
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div className="col-lg-4 mb-4">
                      <div className="card h-100 p-3">
                        <div className="card-body">
                          <div className="d-flex justify-content-between">
                            <p className="text-muted-3 text-medium">
                              Active Disputes
                            </p>
                            <img
                              src="/images/report-1.svg"
                              className="img-fluid"
                              alt="report"
                            />
                          </div>

                          <div className="mb-3 d-flex align-items-center gap-10">
                            <h3 className="report-card-count mb-0">21</h3>
                          </div>

                          <div className="d-flex align-items-center gap-15">
                            <div className="badge-custom badge-success">
                              <i className="bi bi-arrow-up"></i> 10
                            </div>

                            <span className="text-medium report-text-sub">
                              Compared to last month
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div className="col-lg-4 mb-4">
                      <div className="card h-100 p-3">
                        <div className="card-body">
                          <div className="d-flex justify-content-between">
                            <p className="text-muted-3 text-medium">
                              Avg. Dispute Resolution Time
                            </p>
                            <img
                              src="/images/report-1.svg"
                              className="img-fluid"
                              alt="report"
                            />
                          </div>

                          <div className="mb-3 d-flex align-items-center gap-10">
                            <h3 className="report-card-count mb-0">11 days</h3>
                          </div>

                          <div className="d-flex align-items-center gap-15">
                            <div className="badge-custom badge-danger">
                              <i className="bi bi-arrow-down"></i> 10
                            </div>

                            <span className="text-medium report-text-sub">
                              Compared to last month
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="container">
                  <div className="row mt-4">
                    <div className="col-lg-12">
                      <div className="card p-lg-4 mb-5">
                        <div className="card-body">
                          <div className="row align-items-center">
                            <div className="col-lg-3">
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

                            <div className="col-lg-8 offset-lg-1">
                              <div className="chart-tab d-flex align-items-center gap-10 justify-content-end mb-3">
                                <button className="btn btn-link ft-sm text-decoration-none text-muted-3">
                                  1 week
                                </button>
                                <button className="btn btn-link ft-sm text-decoration-none text-muted-3">
                                  1 month
                                </button>
                                <button className="btn btn-link ft-sm text-decoration-none text-muted-3">
                                  4 months
                                </button>
                                <button className="btn btn-link ft-sm text-decoration-none text-muted-3 active-date">
                                  8 months
                                </button>
                                <button className="btn btn-link ft-sm text-decoration-none text-muted-3">
                                  1 year
                                </button>
                                <button className="btn btn-link ft-sm text-decoration-none text-muted-3">
                                  Max
                                </button>
                              </div>
                              <canvas id="myChart3"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="container">
                  <div className="row mt-4">
                    <div className="col-lg-6 mb-3">
                      <div className="card h-100 p-3">
                        <div className="card-body">
                          <h3 className="heading-2 text-darken mb-4">
                            Top Dispute Types
                          </h3>

                          <div className="heading-box d-flex justify-content-between align-items-center">
                            <p className="ft-sm text-muted-3">Types</p>
                            <p className="ft-sm text-muted-3">No of cases</p>
                          </div>

                          <div className="progress-box">
                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="80"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-1"
                                  style={{ width: "80%" }}
                                >
                                  Wage and Benefit Disputes
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-1"
                                  style={{ width: "40%" }}
                                >
                                  Work Hours and Leave
                                </div>
                              </div>

                              <span>40</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="54"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-1"
                                  style={{ width: "54%" }}
                                >
                                  Workplace Health and Safety
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-1"
                                  style={{ width: "40%" }}
                                >
                                  Discrimination and Harassment
                                </div>
                              </div>

                              <span>40</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="54"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-1"
                                  style={{ width: "54%" }}
                                >
                                  Unfair Dismissals
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-1"
                                  style={{ width: "40%" }}
                                >
                                  Contractual Disputes
                                </div>
                              </div>

                              <span>40</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="54"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-1"
                                  style={{ width: "54%" }}
                                >
                                  Union Representation Issues
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-1"
                                  style={{ width: "40%" }}
                                >
                                  Workplace Restructuring
                                </div>
                              </div>

                              <span>40</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="54"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-1"
                                  style={{ width: "54%" }}
                                >
                                  Employee Rights and Entitlement
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-1"
                                  style={{ width: "40%" }}
                                >
                                  Management and Employee Relation
                                </div>
                              </div>

                              <span>40</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div className="col-lg-6 mb-3">
                      <div className="card h-100 p-3">
                        <div className="card-body">
                          <h3 className="heading-2 text-darken mb-4">
                            Highest Dispute Cases{" "}
                          </h3>

                          <div className="heading-box d-flex justify-content-between align-items-center">
                            <p className="ft-sm text-muted-3">Union</p>
                            <p className="ft-sm text-muted-3">No of cases</p>
                          </div>

                          <div className="progress-box">
                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="80"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-2"
                                  style={{ width: "80%" }}
                                >
                                  National Union of Teachers
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-2"
                                  style={{ width: "40%" }}
                                >
                                  Workplace Health and Safety
                                </div>
                              </div>

                              <span>40</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="54"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-2"
                                  style={{ width: "54%" }}
                                >
                                  Discrimination and Harassment
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-2"
                                  style={{ width: "40%" }}
                                >
                                  Unfair Dismissals
                                </div>
                              </div>

                              <span>40</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="54"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-2"
                                  style={{ width: "54%" }}
                                >
                                  Contractual Disputes
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-2"
                                  style={{ width: "40%" }}
                                >
                                  Contractual Disputes
                                </div>
                              </div>

                              <span>40</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="54"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-2"
                                  style={{ width: "54%" }}
                                >
                                  Union Representation Issues
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-2"
                                  style={{ width: "40%" }}
                                >
                                  Workplace Restructuring
                                </div>
                              </div>

                              <span>40</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="54"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-2"
                                  style={{ width: "54%" }}
                                >
                                  Employee Rights and Entitlement
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-2"
                                  style={{ width: "40%" }}
                                >
                                  Management and Employee Relation
                                </div>
                              </div>

                              <span>40</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="container">
                  <div className="row my-4">
                    <div className="col-lg-12 mb-3">
                      <div className="card h-100 p-3">
                        <div className="card-body">
                          <h3 className="heading-2 text-darken mb-4">
                            Highest Resolution Rate
                          </h3>

                          <div className="heading-box d-flex justify-content-between align-items-center">
                            <p className="ft-sm text-muted-3">Union</p>
                            <p className="ft-sm text-muted-3">No of cases</p>
                          </div>

                          <div className="progress-box">
                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="80"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-3"
                                  style={{ width: "80%" }}
                                >
                                  <div className="d-flex align-items-center justify-content-inherit avatar-holder">
                                    <div className="position-relative">
                                      <div className="avatar-xs flex-shrink-0">
                                        <img
                                          src="/images/nnpc.svg"
                                          className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                          alt="Avatar"
                                        />
                                      </div>
                                    </div>
                                    <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                      <p className="mb-0">
                                        National Union of Petroleum and Natural
                                        Gas Workers
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-3"
                                  style={{ width: "40%" }}
                                >
                                  <div className="d-flex align-items-center justify-content-inherit avatar-holder">
                                    <div className="position-relative">
                                      <div className="avatar-xs flex-shrink-0">
                                        <img
                                          src="/images/nnpc.svg"
                                          className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                          alt="Avatar"
                                        />
                                      </div>
                                    </div>
                                    <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                      <p className="mb-0">
                                        Union Representation Issues
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <span>40</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="54"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-3"
                                  style={{ width: "54%" }}
                                >
                                  <div className="d-flex align-items-center justify-content-inherit avatar-holder">
                                    <div className="position-relative">
                                      <div className="avatar-xs flex-shrink-0">
                                        <img
                                          src="/images/nnpc.svg"
                                          className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                          alt="Avatar"
                                        />
                                      </div>
                                    </div>
                                    <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                      <p className="mb-0">
                                        National Carpenters Guild
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-3"
                                  style={{ width: "40%" }}
                                >
                                  <div
                                    className="progress-bar progress-color-3"
                                    style={{ width: "54%" }}
                                  >
                                    <div className="d-flex align-items-center justify-content-inherit avatar-holder">
                                      <div className="position-relative">
                                        <div className="avatar-xs flex-shrink-0">
                                          <img
                                            src="/images/nnpc.svg"
                                            className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                            alt="Avatar"
                                          />
                                        </div>
                                      </div>
                                      <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                        <p className="mb-0">
                                          National Union Of Teachers
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <span>40</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="54"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-3"
                                  style={{ width: "54%" }}
                                >
                                  <div className="d-flex align-items-center justify-content-inherit avatar-holder">
                                    <div className="position-relative">
                                      <div className="avatar-xs flex-shrink-0">
                                        <img
                                          src="/images/nnpc.svg"
                                          className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                          alt="Avatar"
                                        />
                                      </div>
                                    </div>
                                    <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                      <p className="mb-0">
                                        National Union Of Teachers
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-3"
                                  style={{ width: "40%" }}
                                >
                                  <div className="d-flex align-items-center justify-content-inherit avatar-holder">
                                    <div className="position-relative">
                                      <div className="avatar-xs flex-shrink-0">
                                        <img
                                          src="/images/nnpc.svg"
                                          className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                          alt="Avatar"
                                        />
                                      </div>
                                    </div>
                                    <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                      <p className="mb-0">
                                        National Union Of Teachers
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <span>40</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="54"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-3"
                                  style={{ width: "54%" }}
                                >
                                  <div className="d-flex align-items-center justify-content-inherit avatar-holder">
                                    <div className="position-relative">
                                      <div className="avatar-xs flex-shrink-0">
                                        <img
                                          src="/images/nnpc.svg"
                                          className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                          alt="Avatar"
                                        />
                                      </div>
                                    </div>
                                    <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                      <p className="mb-0">
                                        National Union Of Teachers
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-3"
                                  style={{ width: "40%" }}
                                >
                                  <div className="d-flex align-items-center justify-content-inherit avatar-holder">
                                    <div className="position-relative">
                                      <div className="avatar-xs flex-shrink-0">
                                        <img
                                          src="/images/nnpc.svg"
                                          className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                          alt="Avatar"
                                        />
                                      </div>
                                    </div>
                                    <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                      <p className="mb-0">
                                        National Union Of Teachers
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <span>40</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="54"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-3"
                                  style={{ width: "54%" }}
                                >
                                  <div className="d-flex align-items-center justify-content-inherit avatar-holder">
                                    <div className="position-relative">
                                      <div className="avatar-xs flex-shrink-0">
                                        <img
                                          src="/images/nnpc.svg"
                                          className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                          alt="Avatar"
                                        />
                                      </div>
                                    </div>
                                    <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                      <p className="mb-0">
                                        National Union Of Teachers
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <span>54</span>
                            </div>

                            <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                              <div
                                className="progress progress-height-report bg-white"
                                role="progressbar"
                                aria-valuenow="40"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                <div
                                  className="progress-bar progress-color-3"
                                  style={{ width: "40%" }}
                                >
                                  <div className="d-flex align-items-center justify-content-inherit avatar-holder">
                                    <div className="position-relative">
                                      <div className="avatar-xs flex-shrink-0">
                                        <img
                                          src="/images/nnpc.svg"
                                          className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                          alt="Avatar"
                                        />
                                      </div>
                                    </div>
                                    <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                      <p className="mb-0">
                                        National Union Of Teachers
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <span>40</span>
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

export default Reports;
