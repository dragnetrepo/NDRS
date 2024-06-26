import React, { useEffect, useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import MyChartComponent from "../Bars/MyChartComponent";
import { ClipLoader } from "react-spinners";

const Reports = () => {
  const [sidebar, setsidebar] = useState(true);
  const [reports, setReports] = useState([]);
  const [isLoading, setIsLoading] = useState(true);

  const toggleSideBar = () => {
    setsidebar(!sidebar);
  };

  useEffect(() => {
    fetchReports();
  }, []);

  const fetchReports = async () => {
    try {
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const res = await fetch(baseUrl + "/api/reports", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setReports(data.data);
      console.log(data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    } finally {
      setIsLoading(false);
    }
  };

  return (
    <>
      <div className="main-admin-container bg-light dark-mode-active">
        <div className="d-flex flex-column flex-lg-row h-lg-100">
          {/* <?php include "./components/main-navbar.inc.php"; ?> */}
          <MainNavbarInc sidebar={sidebar} />

          <div className="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">
            <TopBarInc toggleSideBar={toggleSideBar} />

            <main className="admin-content">
              <div className="header-box py-5">
                <div className="container">
                  <h2>Reports</h2>
                </div>
              </div>
              {isLoading ? (
                <div
                  className="d-flex justify-content-center align-items-center"
                  style={{ minHeight: "80vh" }}
                >
                  <ClipLoader color="#36D7B7" loading={isLoading} size={50} />
                </div>
              ) : (
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
                                className="img-fluid"
                                alt=""
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
                              <h3 className="report-card-count mb-0">
                                {reports.disputes_approved?.current}
                              </h3>
                            </div>

                            <div className="d-flex align-items-center gap-15">
                              <div className="badge-custom badge-success">
                                <i className="bi bi-arrow-up"></i>{" "}
                                {reports.disputes_approved?.prev_month}
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
                              <h3 className="report-card-count mb-0">
                                {" "}
                                {reports.disputes_satisfaction_score?.current}
                              </h3>
                              <span className="report-card-review">
                                (34 reviews)
                              </span>
                            </div>

                            <div className="d-flex align-items-center gap-15">
                              <div className="badge-custom badge-success">
                                <i className="bi bi-arrow-up"></i>{" "}
                                {
                                  reports.disputes_satisfaction_score
                                    ?.prev_month
                                }
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
                              <h3 className="report-card-count mb-0">
                                {reports.document_uploaded?.current}
                              </h3>
                            </div>

                            <div className="d-flex align-items-center gap-15">
                              <div className="badge-custom badge-success">
                                <i className="bi bi-arrow-up"></i>{" "}
                                {reports.document_uploaded?.prev_month}
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
                              <h3 className="report-card-count mb-0">
                                {reports.disputes_resolved?.current}
                              </h3>
                            </div>

                            <div className="d-flex align-items-center gap-15">
                              <div className="badge-custom badge-success">
                                <i className="bi bi-arrow-up"></i>{" "}
                                {reports.disputes_resolved?.prev_month}
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
                              <h3 className="report-card-count mb-0">
                                {reports.active_disputes?.current}
                              </h3>
                            </div>

                            <div className="d-flex align-items-center gap-15">
                              <div className="badge-custom badge-success">
                                <i className="bi bi-arrow-up"></i>{" "}
                                {reports.active_disputes?.prev_month}
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
                              <h3 className="report-card-count mb-0">
                                {reports.avg_dispute_resolution_time?.current}
                              </h3>
                            </div>

                            <div className="d-flex align-items-center gap-15">
                              <div className="badge-custom badge-danger">
                                <i className="bi bi-arrow-down"></i>{" "}
                                {
                                  reports.avg_dispute_resolution_time
                                    ?.prev_month
                                }
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
                                {/* <canvas id="myChart3"></canvas> */}
                                <MyChartComponent />
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
                            {Object.entries(reports.top_dispute_types).length >
                            0 ? (
                              Object.entries(reports.top_dispute_types).map(
                                ([key, value], index) => (
                                  <div
                                    className="d-flex justify-content-between align-items-center mb-2 gap-20"
                                    key={key}
                                  >
                                    <div
                                      className="progress progress-height-report bg-white"
                                      role="progressbar"
                                      aria-valuenow="20"
                                      aria-valuemin="0"
                                      aria-valuemax="100"
                                    >
                                      <div
                                        className="progress-bar progress-color-1"
                                        style={{ width: "80%" }}
                                      >
                                        {key}
                                      </div>
                                    </div>

                                    <span>{value}</span>
                                  </div>
                                )
                              )
                            ) : (
                              <h4 className="d-flex align-items-center justify-content-center">
                                No Reports Yet
                              </h4>
                            )}
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
                            {Object.entries(reports.highest_dispute_cases)
                              .length > 0 ? (
                              Object.entries(reports.highest_dispute_cases).map(
                                ([key, value], index) => (
                                  <div className="progress-box" key={key}>
                                    <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                                      <div
                                        className="progress progress-height-report bg-white"
                                        role="progressbar"
                                        aria-valuenow={
                                          (value /
                                            Math.max(
                                              ...Object.values(
                                                reports.highest_dispute_cases
                                              )
                                            )) *
                                          100
                                        }
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                      >
                                        <div
                                          className="progress-bar progress-color-2"
                                          style={{ width: "80%" }}
                                        >
                                          {key}
                                        </div>
                                      </div>

                                      <span>{value}</span>
                                    </div>
                                  </div>
                                )
                              )
                            ) : (
                              <h4 className="d-flex align-items-center justify-content-center">
                                No Reports Yet
                              </h4>
                            )}
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
                              {Object.entries(reports.highest_resolution_rate)
                                .length > 0 ? (
                                Object.entries(
                                  reports.highest_resolution_rate
                                ).map(([key, value], index) => (
                                  <div className="progress-box" key={key}>
                                    <div className="d-flex justify-content-between align-items-center mb-2 gap-20">
                                      <div
                                        className="progress progress-height-report bg-white"
                                        role="progressbar"
                                        aria-valuenow={
                                          (value /
                                            Math.max(
                                              ...Object.values(
                                                reports.highest_resolution_rate
                                              )
                                            )) *
                                          100
                                        }
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                      >
                                        <div
                                          className="progress-bar progress-color-2"
                                          style={{ width: "80%" }}
                                        >
                                          {key}
                                        </div>
                                      </div>

                                      <span>{value}</span>
                                    </div>
                                  </div>
                                ))
                              ) : (
                                <h4 className="d-flex align-items-center justify-content-center">
                                  No Reports Yet
                                </h4>
                              )}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              )}
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
