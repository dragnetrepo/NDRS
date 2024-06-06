import React, { useEffect, useState } from "react";

const TopBarInc = () => {
  const [user, setuser] = useState({});

  useEffect(() => {
    fetchdata();
  }, []);
  const fetchdata = async () => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const res = await fetch(baseUrl + "/api/user-profile", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setuser(data.data);
      console.log(data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  // fetchdata()
  return (
    <div>
      <div className="bg-white d-lg-block d-none py-3">
        <div className="container d-flex align-items-center justify-content-between">
          {/* <div className="d-flex align-items-center">
            <i className="bi bi-list bi-2 text-dark cursor-pointer arrow-box me-3"></i>
            <div className="input-group">
              <span className="input-group-text border-0 bg-transparent">
                <img src="/images/search.svg" className="img-fluid" alt="search" />
              </span>
              <input type="search" className="form-control border-0" placeholder="Search NDRS..." />
            </div>
          </div> */}

          <div className="d-flex align-items-center">
            <i className="bi bi-list bi-2 text-dark cursor-pointer arrow-box me-3"></i>

            <div
              className="d-flex align-items-center"
              data-bs-toggle="modal"
              data-bs-target="#searchModal"
            >
              <div className="input-group align-items-center">
                <span className="input-group-text border-0 bg-transparent">
                  <img
                    src="/images/search.svg"
                    className="img-fluid"
                    alt="search"
                  />
                </span>
                <span className="text-muted-3">Search NDRS...</span>
              </div>
            </div>
          </div>

          <div
            className="d-lg-flex align-items-center d-none"
            style={{ gap: "30px" }}
          >
            <a href="/notifications" className="bell-box position-relative">
              <img
                src="/images/dott.svg"
                className="img-fluid indicator-red"
                alt="indicator"
              />
              <img
                src="/images/bell-green.svg"
                className="img-fluid"
                alt="bell"
              />
            </a>

            {/* <button className="btn btn-main-primary">Create new <i className="bi bi-plus"></i></button> */}

            <div className="d-flex avatar-holder">
              <div className="position-relative">
                <img
                  src="/images/Avatar-online-indicator.svg"
                  className="img-fluid indicator-avatar"
                  alt="indicator"
                />
                <div className="avatar-sm flex-shrink-0">
                  {user.display_picture ? (
                    <img
                      src={user.display_picture}
                      className="img-fluid object-position-center object-fit-cover w-100 h-100"
                      alt="Avatar"
                    />
                  ) : (
                    <img
                      src="/images/avatar-2.svg"
                      className="img-fluid object-position-center object-fit-cover w-100 h-100"
                      alt="Default Avatar"
                    />
                  )}
                </div>
              </div>
              <div className="ms-2 flex-grow-1">
                <h5 className="mb-0">
                  {user.first_name} {user.last_name}
                </h5>
                <p className="mb-0 text-muted-3">{user.email}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* <!-- Modal --> */}
      <div
        className="modal fade"
        id="searchModal"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabIndex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-lg">
          <div className="modal-content p-lg-4 border-0">
            <div className="text-end">
              <button
                type="button"
                className="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div className="modal-body">
              <div className="row mb-4">
                <div className="col-lg-7">
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
                      placeholder="Search disputes..."
                    />
                  </div>
                </div>

                <div className="col-lg-5">
                  <div className="d-flex align-items-center justify-content-between gap-15">
                    <a
                      className="btn btn-size btn-outline-light w-100 text-medium px-3"
                      data-bs-toggle="collapse"
                      href="#collapseFilter"
                      role="button"
                      aria-expanded="false"
                      aria-controls="collapseFilter"
                    >
                      <img
                        src="/images/filter.svg"
                        className="img-fluid me-2"
                      />{" "}
                      Filters
                    </a>

                    <button className="btn btn-size btn-outline-light w-100 text-medium px-3">
                      <img src="/images/sort.svg" className="img-fluid me-2" />{" "}
                      Sort
                    </button>

                    <button className="btn btn-size btn-link w-100 text-main-primary text-medium text-decoration-none px-3">
                      Clear all
                    </button>
                  </div>
                </div>
              </div>

              <div className="collapse" id="collapseFilter">
                <div className="filter-option mb-4">
                  <div className="row">
                    <div className="col-lg-7">
                      <div className="row">
                        <div className="col-lg-4">
                          <p className="text-underline">Document type</p>
                          <ul className="list-unstyled filter-list">
                            <li>All</li>
                            <li>PNG</li>
                            <li className="text-main-primary">PDF</li>
                            <li>XLS</li>
                            <li className="text-main-primary">JPEG</li>
                            <li>MP3</li>
                            <li>GIF</li>
                          </ul>
                        </div>

                        <div className="col-lg-4">
                          <p className="text-underline">Case status</p>
                          <ul className="list-unstyled filter-list">
                            <li className="text-main-primary">All</li>
                            <li>Open</li>
                            <li>On Hold</li>
                            <li>Closed</li>
                          </ul>
                        </div>

                        <div className="col-lg-4">
                          <p className="text-underline">Date picker</p>
                          <form>
                            <div className="mb-3">
                              <label className="form-label text-main-primary">
                                From
                              </label>
                              <input
                                type="date"
                                className="form-control form-control-height"
                                placeholder=""
                              />
                            </div>
                            <div className="mb-3">
                              <label className="form-label text-main-primary">
                                To
                              </label>
                              <input
                                type="date"
                                className="form-control form-control-height"
                                placeholder=""
                              />
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div className="filter-selected d-flex align-items-center gap-15 mb-4">
                <button className="btn btn-size btn-outline-light text-medium text-muted-3 px-3">
                  AAWUN <img src="/images/x.svg" className="img-fluid ms-2" />
                </button>

                <button className="btn btn-size btn-outline-light text-medium text-muted-3 px-3">
                  PDF <img src="/images/x.svg" className="img-fluid ms-2" />
                </button>

                <button className="btn btn-size btn-outline-light text-medium text-muted-3 px-3">
                  JPEG <img src="/images/x.svg" className="img-fluid ms-2" />
                </button>

                <button className="btn btn-size btn-outline-light text-medium text-muted-3 px-3">
                  1 Jan 2024 - 20 Mar 2024{" "}
                  <img src="/images/x.svg" className="img-fluid ms-2" />
                </button>
              </div>

              <ul
                className="nav custom-tab nav-underline mb-3"
                id="pills-tab"
                role="tablist"
              >
                <li className="nav-item" role="presentation">
                  <button
                    className="nav-link active"
                    id="pills-all-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-all"
                    type="button"
                    role="tab"
                    aria-controls="pills-all"
                    aria-selected="true"
                  >
                    All{" "}
                    <span className="badge badge-main rounded-pill">24</span>
                  </button>
                </li>
                <li className="nav-item" role="presentation">
                  <button
                    className="nav-link"
                    id="pills-disputes-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-disputes"
                    type="button"
                    role="tab"
                    aria-controls="pills-disputes"
                    aria-selected="false"
                  >
                    Disputes{" "}
                    <span className="badge badge-main rounded-pill">6</span>
                  </button>
                </li>
                <li className="nav-item" role="presentation">
                  <button
                    className="nav-link"
                    id="pills-doc-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-doc"
                    type="button"
                    role="tab"
                    aria-controls="pills-doc"
                    aria-selected="false"
                  >
                    Documents{" "}
                    <span className="badge badge-main rounded-pill">4</span>
                  </button>
                </li>
                <li className="nav-item" role="presentation">
                  <button
                    className="nav-link"
                    id="pills-users-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-users"
                    type="button"
                    role="tab"
                    aria-controls="pills-users"
                    aria-selected="false"
                  >
                    Users{" "}
                    <span className="badge badge-main rounded-pill">2</span>
                  </button>
                </li>
                <li className="nav-item" role="presentation">
                  <button
                    className="nav-link"
                    id="pills-union-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-union"
                    type="button"
                    role="tab"
                    aria-controls="pills-union"
                    aria-selected="false"
                  >
                    Unions{" "}
                    <span className="badge badge-main rounded-pill">2</span>
                  </button>
                </li>
                <li className="nav-item" role="presentation">
                  <button
                    className="nav-link"
                    id="pills-companies-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-companies"
                    type="button"
                    role="tab"
                    aria-controls="pills-companies"
                    aria-selected="false"
                  >
                    Companies{" "}
                    <span className="badge badge-main rounded-pill">2</span>
                  </button>
                </li>
              </ul>
              <div className="tab-content" id="pills-tabContent">
                <div
                  className="tab-pane fade show active"
                  id="pills-all"
                  role="tabpanel"
                  aria-labelledby="pills-all-tab"
                  tabIndex="0"
                >
                  <div
                    className="mt-4 overflow-auto"
                    style={{ height: "300px" }}
                  >
                    <div className="d-flex avatar-holder py-4 border-bottom">
                      <div className="position-relative">
                        <img
                          src="/images/Avatar-online-indicator.svg"
                          className="img-fluid indicator-avatar"
                          alt="indicator"
                        />
                        <div className="avatar-sm flex-shrink-0">
                          <img
                            src="/images/avatar-2.svg"
                            className="img-fluid object-position-center object-fit-cover w-100 h-100"
                            alt="Avatar"
                          />
                        </div>
                      </div>
                      <div className="ms-2 flex-grow-1">
                        <h5 className="mb-0">AAWUN</h5>
                        <p className="mb-0 text-muted-3">
                          in Unions & Branches / AAWUN{" "}
                        </p>
                      </div>
                    </div>

                    <div className="d-flex avatar-holder py-4 border-bottom">
                      <div className="position-relative">
                        <img
                          src="/images/offline-icon.svg"
                          className="img-fluid indicator-avatar"
                          alt="indicator"
                        />
                        <div className="avatar-sm flex-shrink-0">
                          <img
                            src="/images/avatar-2.svg"
                            className="img-fluid object-position-center object-fit-cover w-100 h-100"
                            alt="Avatar"
                          />
                        </div>
                      </div>
                      <div className="ms-2 flex-grow-1">
                        <h5 className="mb-0">Agro Allied International</h5>
                        <p className="mb-0 text-muted-3">
                          in Unions & Branches / AAWUN / Lagos / Companies
                        </p>
                      </div>
                    </div>

                    <div className="d-flex avatar-holder py-4 border-bottom">
                      <div className="position-relative">
                        <img
                          src="/images/Avatar-online-indicator.svg"
                          className="img-fluid indicator-avatar"
                          alt="indicator"
                        />
                        <div className="avatar-sm flex-shrink-0">
                          <img
                            src="/images/avatar-2.svg"
                            className="img-fluid object-position-center object-fit-cover w-100 h-100"
                            alt="Avatar"
                          />
                        </div>
                      </div>
                      <div className="ms-2 flex-grow-1">
                        <h5 className="mb-0">
                          DS231 - Anti land pollution measures{" "}
                        </h5>
                        <p className="mb-0 text-muted-3">
                          in Disputes / Agro Alllied International /{" "}
                          <img
                            src="/images/resolved.svg"
                            className="img-fluid"
                            alt="resolved"
                          />
                        </p>
                      </div>
                    </div>

                    <div className="d-flex avatar-holder py-4 border-bottom">
                      <div className="position-relative">
                        <img
                          src="/images/Avatar-online-indicator.svg"
                          className="img-fluid indicator-avatar"
                          alt="indicator"
                        />
                        <div className="avatar-sm flex-shrink-0">
                          <img
                            src="/images/avatar-2.svg"
                            className="img-fluid object-position-center object-fit-cover w-100 h-100"
                            alt="Avatar"
                          />
                        </div>
                      </div>
                      <div className="ms-2 flex-grow-1">
                        <h5 className="mb-0">
                          Form TD3 for DS231 - Agricultural products for relief
                          fund
                        </h5>
                        <p className="mb-0 text-muted-3">
                          in Documents / DS231 / Edited 2wks ago{" "}
                        </p>
                      </div>
                    </div>

                    <div className="d-flex avatar-holder py-4 border-bottom">
                      <div className="position-relative">
                        <img
                          src="/images/offline-icon.svg"
                          className="img-fluid indicator-avatar"
                          alt="indicator"
                        />
                        <div className="avatar-sm flex-shrink-0">
                          <img
                            src="/images/avatar-2.svg"
                            className="img-fluid object-position-center object-fit-cover w-100 h-100"
                            alt="Avatar"
                          />
                        </div>
                      </div>
                      <div className="ms-2 flex-grow-1">
                        <h5 className="mb-0">Agnes Chinagorom</h5>
                        <p className="mb-0 text-muted-3">Active</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div
                  className="tab-pane fade"
                  id="pills-disputes"
                  role="tabpanel"
                  aria-labelledby="pills-disputes-tab"
                  tabIndex="0"
                >
                  ...
                </div>

                <div
                  className="tab-pane fade"
                  id="pills-doc"
                  role="tabpanel"
                  aria-labelledby="pills-doc-tab"
                  tabIndex="0"
                >
                  ...
                </div>

                <div
                  className="tab-pane fade"
                  id="pills-users"
                  role="tabpanel"
                  aria-labelledby="pills-users-tab"
                  tabIndex="0"
                >
                  ...
                </div>

                <div
                  className="tab-pane fade"
                  id="pills-union"
                  role="tabpanel"
                  aria-labelledby="pills-union-tab"
                  tabIndex="0"
                >
                  ...
                </div>

                <div
                  className="tab-pane fade"
                  id="pills-companies"
                  role="tabpanel"
                  aria-labelledby="pills-companies-tab"
                  tabIndex="0"
                >
                  ...
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default TopBarInc;
