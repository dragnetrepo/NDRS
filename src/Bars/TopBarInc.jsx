import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";

const TopBarInc = ({ toggleSideBar }) => {
  const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
  const [user, setuser] = useState([]);
  const [search, setsearch] = useState([]);
  const [query, setQuery] = useState("");
  const [docType, setDocType] = useState("");
  const [caseStatus, setCaseStatus] = useState("");
  const [startDate, setStartDate] = useState("");
  const [endDate, setEndDate] = useState("");
  const [orderBy, setOrderBy] = useState("");
  const [error, setError] = useState("");
  const [searchResults, setSearchResults] = useState({
    branches: { count: 0, data: [] },
    disputes: { count: 0, data: [] },
    documents: { count: 0, data: [] },
    "sub branches": { count: 0, data: [] },
    unions: { count: 0, data: [] },
    users: { count: 0, data: [] },
  });

  useEffect(() => {
    fetchdata();
    fetchSearch();
  }, [query, docType, caseStatus, startDate, endDate, orderBy]);
  const fetchdata = async () => {
    try {
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
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const fetchSearch = async () => {
    try {
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const searchParams = new URLSearchParams();
      if (query) searchParams.append("q", query);
      if (docType) searchParams.append("doc_type[]", docType);
      if (caseStatus) searchParams.append("case_status", caseStatus);
      if (startDate) searchParams.append("start_date", startDate);
      if (endDate) searchParams.append("end_date", endDate);
      if (orderBy) searchParams.append("order_by", orderBy);

      const res = await fetch(
        `${baseUrl}/api/search?${searchParams.toString()}`,
        {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        }
      );

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setSearchResults(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

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
            <i
              className="bi bi-list bi-2 text-dark cursor-pointer arrow-box me-3"
              onClick={toggleSideBar}
            ></i>

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
            <Link to="/notifications" className="bell-box position-relative">
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
            </Link>

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
                      src="/images/download.png"
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
                      placeholder="Search..."
                      value={query}
                      onClick={fetchSearch}
                      onChange={(e) => setQuery(e.target.value)}
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
                        alt=""
                      />{" "}
                      Filters
                    </a>

                    <button className="btn btn-size btn-outline-light w-100 text-medium px-3">
                      <img
                        src="/images/sort.svg"
                        className="img-fluid me-2"
                        alt=""
                      />{" "}
                      Sort
                    </button>

                    <button
                      className="btn btn-size btn-link w-100 text-main-primary text-medium text-decoration-none px-3"
                      onClick={() => {
                        setQuery("");
                        setDocType("");
                        setCaseStatus("");
                        setStartDate("");
                        setEndDate("");
                        setOrderBy("");
                        setSearchResults([]);
                      }}
                    >
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
                            <li onClick={() => setDocType("")}>All</li>
                            <li onClick={() => setDocType("PNG")}>PNG</li>
                            <li
                              onClick={() => setDocType("PDF")}
                              className="text-main-primary"
                            >
                              PDF
                            </li>
                            <li onClick={() => setDocType("XLS")}>XLS</li>
                            <li
                              onClick={() => setDocType("JPEG")}
                              className="text-main-primary"
                            >
                              JPEG
                            </li>
                            <li onClick={() => setDocType("MP3")}>MP3</li>
                            <li onClick={() => setDocType("GIF")}>GIF</li>
                          </ul>
                        </div>

                        <div className="col-lg-4">
                          <p className="text-underline">Case status</p>
                          <ul className="list-unstyled filter-list">
                            <li
                              onClick={() => setCaseStatus("")}
                              className="text-main-primary"
                            >
                              All
                            </li>
                            <li onClick={() => setCaseStatus("Open")}>Open</li>
                            <li onClick={() => setCaseStatus("On Hold")}>
                              On Hold
                            </li>
                            <li onClick={() => setCaseStatus("Closed")}>
                              Closed
                            </li>
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
                                value={startDate}
                                onChange={(e) => setStartDate(e.target.value)}
                              />
                            </div>
                            <div className="mb-3">
                              <label className="form-label text-main-primary">
                                To
                              </label>
                              <input
                                type="date"
                                className="form-control form-control-height"
                                value={endDate}
                                onChange={(e) => setEndDate(e.target.value)}
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
                {query && (
                  <button
                    className="btn btn-size btn-outline-light text-medium text-muted-3 px-3"
                    onClick={() => setQuery("")}
                  >
                    {query}{" "}
                    <img
                      src="/images/x.svg"
                      className="img-fluid ms-2"
                      alt=""
                    />
                  </button>
                )}
                {docType && (
                  <button
                    className="btn btn-size btn-outline-light text-medium text-muted-3 px-3"
                    onClick={() => setDocType("")}
                  >
                    {docType}{" "}
                    <img
                      src="/images/x.svg"
                      className="img-fluid ms-2"
                      alt=""
                    />
                  </button>
                )}
                {caseStatus && (
                  <button
                    className="btn btn-size btn-outline-light text-medium text-muted-3 px-3"
                    onClick={() => setCaseStatus("")}
                  >
                    {caseStatus}{" "}
                    <img
                      src="/images/x.svg"
                      className="img-fluid ms-2"
                      alt=""
                    />
                  </button>
                )}
                {(startDate || endDate) && (
                  <button
                    className="btn btn-size btn-outline-light text-medium text-muted-3 px-3"
                    onClick={() => {
                      setStartDate("");
                      setEndDate("");
                    }}
                  >
                    {startDate} - {endDate}{" "}
                    <img
                      src="/images/x.svg"
                      className="img-fluid ms-2"
                      alt=""
                    />
                  </button>
                )}
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
                    <span className="badge badge-main rounded-pill">
                      {searchResults.disputes.count +
                        searchResults.documents.count +
                        searchResults.users.count +
                        searchResults.documents.count +
                        searchResults.branches.count +
                        searchResults.users.count +
                        searchResults.unions.count +
                        searchResults["sub branches"].count}
                    </span>
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
                    <span className="badge badge-main rounded-pill">
                      {searchResults.disputes.count}
                    </span>
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
                    <span className="badge badge-main rounded-pill">
                      {searchResults.documents.count}
                    </span>
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
                    <span className="badge badge-main rounded-pill">
                      {searchResults.users.count}
                    </span>
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
                    <span className="badge badge-main rounded-pill">
                      {searchResults.unions.count}
                    </span>
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
                    <span className="badge badge-main rounded-pill">
                      {searchResults.branches.count +
                        searchResults["sub branches"].count +
                        searchResults.unions.count}
                    </span>
                  </button>
                </li>
              </ul>

              <div
                className="tab-content"
                id="pills-tabContent"
                style={{ height: "300px", overflow: "auto" }}
              >
                {Object.entries(searchResults).map(([category, results]) => (
                  <div
                    className="tab-pane fade show active"
                    id={`pills-${category}`}
                    role="tabpanel"
                    aria-labelledby={`pills-${category}-tab`}
                    key={category}
                  >
                    <div className="mt-4 overflow-auto">
                      {Array.isArray(results.data) &&
                        results.data.length > 0 &&
                        results.data.map((result, index) => (
                          <div
                            className="d-flex avatar-holder py-4 border-bottom"
                            key={index}
                          >
                            <div className="position-relative">
                              <div className="avatar-sm flex-shrink-0">
                                <img
                                  src={
                                    result.logo ||
                                    result.photo ||
                                    "/images/pdf-icon.svg"
                                  }
                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                  alt="Avatar"
                                />
                              </div>
                            </div>
                            <div className="ms-2 flex-grow-1">
                              <h5 className="mb-0">
                                {result.name || result.document_name}
                              </h5>
                              <p className="mb-0 text-muted-3">
                                in {category.replace("_", " ")}
                              </p>
                            </div>
                          </div>
                        ))}
                    </div>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default TopBarInc;
