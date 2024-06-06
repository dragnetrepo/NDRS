import React, { useContext, useEffect, useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import { AppContext } from "../App";
import { Link, useNavigate } from "react-router-dom";
import toast from "react-hot-toast";

const Disputes = () => {
  const navigate = useNavigate();

  const { disputes, setDisputes } = useContext(AppContext);
  const [unionsList, setUnionsList] = useState([]);
  const [getDisputes, setGetDisputes] = useState([]);

  useEffect(() => {
    fetchdata();
    fetchDisputes();
  }, []);
  const fetchdata = async () => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const res = await fetch(baseUrl + "/api/get-unions", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setUnionsList(data.data);
      console.log(data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const onHandleChange = (e) => {
    setDisputes({ ...disputes, [e.target.name]: e.target.value });
  };
  console.log(disputes);

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      // const token = localStorage.getItem('token');

      // if (!token) {
      //     throw new Error('User is not logged in.'); // Handle case where user is not logged in
      // }

      const response = await fetch(baseUrl + "/api/case/create", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify(disputes),
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();
      console.log(data);
      toast.success("Dispute has been created successfully!");
      // navigate("/Disputes2");
      window.location.reload();
    } catch (error) {
      console.error("Error fetching data:", error);
    }
    console.log(disputes);
  };

  const fetchDisputes = async () => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const res = await fetch(baseUrl + "/api/case/disputes", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setGetDisputes(data.data);
      console.log(data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

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
                  <h2>Disputes</h2>
                </div>
              </div>

              <div className="content-main">
                <div className="container">
                  <div className="row">
                    <div className="col-lg-12">
                      <div className="margin-top-negative">
                        <ul
                          className="nav custom-tab nav-underline mb-3"
                          id="pills-tab"
                          role="tablist"
                        >
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link"
                              id="pills-create-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-create"
                              type="button"
                              role="tab"
                              aria-controls="pills-create"
                              aria-selected="false"
                            >
                              Create Disputes
                            </button>
                          </li>
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link active"
                              id="pills-ongoing-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-ongoing"
                              type="button"
                              role="tab"
                              aria-controls="pills-ongoing"
                              aria-selected="true"
                            >
                              All Disputes
                            </button>
                          </li>
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link"
                              id="pills-resolved-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-resolved"
                              type="button"
                              role="tab"
                              aria-controls="pills-resolved"
                              aria-selected="false"
                            >
                              Pending Disputes
                            </button>
                          </li>
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link"
                              id="pills-internal-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-internal"
                              type="button"
                              role="tab"
                              aria-controls="pills-internal"
                              aria-selected="false"
                            >
                              Internal Disputes
                            </button>
                          </li>
                        </ul>
                        <div className="tab-content" id="pills-tabContent">
                          <div
                            className="tab-pane fade"
                            id="pills-create"
                            role="tabpanel"
                            aria-labelledby="pills-create-tab"
                            tabIndex="0"
                          >
                            <div className="row mt-5">
                              <div className="col-lg-7">
                                <div className="card mb-4">
                                  <div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                    <h3 className="mb-lg-0 mb-3">
                                      Create Dispute Case
                                    </h3>
                                    <div className="d-flex align-items-center gap-15">
                                      {/* <a href="disputes-2.php" className="btn btn-size btn-main-primary px-3">Next</a> */}
                                      <a
                                        className="btn btn-size btn-main-primary px-3"
                                        onClick={handleSubmit}
                                      >
                                        Next
                                      </a>
                                    </div>
                                  </div>
                                  <div className="card-body p-4">
                                    <form>
                                      <div className="row mt-4">
                                        {/* <div className="col-lg-12">
                                                                                <div className="mb-4">
                                                                                    <label className="form-label">Dispute ID</label>
                                                                                    <input type="text" className="form-control form-control-height" placeholder="Enter your Dispute ID" value="DS138" disabled/>
                                                                                </div>
                                                                                <div className="mb-4">
                                                                                    <label className="form-label">Filing date</label>
                                                                                    <input type="text" className="form-control form-control-height" placeholder="Feb 1, 2024" value="Chinedu" disabled/>
                                                                                </div>
                                                                                <div className="mb-4">
                                                                                    <label className="form-label">Case title</label>
                                                                                    <input type="text" className="form-control form-control-height" placeholder="Enter Case title" value="Measures Concerning Trading Agricultural Goods"/>
                                                                                </div>
                                                                                <div className="mb-4">
                                                                                    <label className="form-label">Dispute type</label>
                                                                                    <select className="form-select form-control-height">
                                                                                        <option>--Choose--</option>
                                                                                        <option>Wages & Salaries</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div className="mb-4">
                                                                                    <label className="form-label">Initiating party (Claimant)</label>
                                                                                    <input type="text" className="form-control form-control-height" placeholder="Enter Initiating party" value="National Union of Food, Beverage and Tobacco Employees NUFBTE"/>
                                                                                </div>
                                                                                <div className="mb-4">
                                                                                    <label className="form-label">Accused party (Respondents)</label>
                                                                                    <input type="text" className="form-control form-control-height" placeholder="Enter Accused party" value="Federal Road Safety Comission FRSC"/>
                                                                                </div>
                                                                                <div className="mb-4">
                                                                                    <label className="form-label">Summary of Dispute</label>
                                                                                    <textarea className="form-control" rows="3"></textarea>
                                                                                </div>
                                                                                <div className="mb-4">
                                                                                    <label className="form-label">Background Information</label>
                                                                                    <textarea className="form-control" rows="3"></textarea>
                                                                                </div>
                                                                                <div className="mb-4">
                                                                                    <label className="form-label">Relief sought</label>
                                                                                    <textarea className="form-control" rows="3"></textarea>
                                                                                </div>
                                                                                <div className="mb-4">
                                                                                    <label className="form-label">Specific concerns</label>
                                                                                    <textarea className="form-control" rows="3"></textarea>
                                                                                </div>

                                                                                <div className="mb-4">
                                                                                    <label className="form-label">Negotiation terms</label>
                                                                                    <textarea className="form-control" rows="3"></textarea>
                                                                                </div>
                                                                            </div> */}
                                        <div className="col-lg-12">
                                          <div className="mb-4">
                                            <label className="form-label">
                                              Dispute ID
                                            </label>
                                            <input
                                              type="text"
                                              className="form-control form-control-height"
                                              placeholder="Automatically generated by the system"
                                              value=""
                                              disabled
                                            />
                                          </div>
                                          <div className="mb-4">
                                            <label className="form-label">
                                              Filing date
                                            </label>
                                            <input
                                              type="text"
                                              className="form-control form-control-height"
                                              placeholder="Automatically generated by the system"
                                              value=""
                                              disabled
                                            />
                                          </div>
                                          <div className="mb-4">
                                            <label className="form-label">
                                              Case title
                                            </label>
                                            <input
                                              type="text"
                                              className="form-control form-control-height"
                                              name="title"
                                              placeholder="Enter Case title"
                                              onChange={onHandleChange}
                                            />
                                          </div>
                                          <div className="mb-4">
                                            <label className="form-label">
                                              Dispute type
                                            </label>
                                            <select
                                              className="form-select form-control-height"
                                              name="type"
                                              onChange={onHandleChange}
                                            >
                                              <option>--Choose--</option>
                                              <option>Wages & Salaries</option>
                                            </select>
                                          </div>
                                          {/* <div className="mb-4">
                                                                                    <label className="form-label">Initiating party (Claimant)</label>
                                                                                    <input type="text" className="form-control form-control-height" name='initiating_party' placeholder="Enter Initiating party" 
                                                                                    onChange={onHandleChange}/>
                                                                                </div> */}
                                          <div className="mb-4">
                                            <label className="form-label">
                                              Initiating party (Claimant)
                                            </label>
                                            <select
                                              className="form-select form-control-height"
                                              name="initiating_party"
                                              onChange={onHandleChange}
                                            >
                                              <option>--Choose--</option>
                                              {unionsList.map((union) => (
                                                <option
                                                  key={union._id}
                                                  value={union._id}
                                                >
                                                  {union.name}
                                                </option>
                                              ))}
                                            </select>
                                          </div>
                                          <div className="mb-4">
                                            <label className="form-label">
                                              Accused party (Respondents)
                                            </label>
                                            <select
                                              className="form-select form-control-height"
                                              name="accused_party"
                                              onChange={onHandleChange}
                                            >
                                              <option>--Choose--</option>
                                              {unionsList.map((union) => (
                                                <option
                                                  key={union._id}
                                                  value={union._id}
                                                >
                                                  {union.name}
                                                </option>
                                              ))}
                                            </select>
                                          </div>
                                          {/* <div className="mb-4">
                                                                                    <label className="form-label">Accused party (Respondents)</label>
                                                                                    <input type="text" className="form-control form-control-height" name='accused_party' placeholder="Enter Accused party" 
                                                                                    onChange={onHandleChange}/>
                                                                                </div> */}
                                          <div className="mb-4">
                                            <label className="form-label">
                                              Summary of Dispute
                                            </label>
                                            <textarea
                                              className="form-control"
                                              rows="3"
                                              name="summary"
                                              onChange={onHandleChange}
                                            ></textarea>
                                          </div>
                                          <div className="mb-4">
                                            <label className="form-label">
                                              Background Information
                                            </label>
                                            <textarea
                                              className="form-control"
                                              rows="3"
                                              name="background_info"
                                              onChange={onHandleChange}
                                            ></textarea>
                                          </div>
                                          <div className="mb-4">
                                            <label className="form-label">
                                              Relief sought
                                            </label>
                                            <textarea
                                              className="form-control"
                                              rows="3"
                                              name="relief_sought"
                                              onChange={onHandleChange}
                                            ></textarea>
                                          </div>
                                          <div className="mb-4">
                                            <label className="form-label">
                                              Specific concerns
                                            </label>
                                            <textarea
                                              className="form-control"
                                              rows="3"
                                              name="specific_claims"
                                              onChange={onHandleChange}
                                            ></textarea>
                                          </div>

                                          <div className="mb-4">
                                            <label className="form-label">
                                              Negotiation terms
                                            </label>
                                            <textarea
                                              className="form-control"
                                              rows="3"
                                              name="negotiation_terms"
                                              onChange={onHandleChange}
                                            ></textarea>
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div
                            className="tab-pane fade show active"
                            id="pills-ongoing"
                            role="tabpanel"
                            aria-labelledby="pills-ongoing-tab"
                            tabIndex="0"
                          >
                            <div className="mt-5">
                              <div className="row mb-4">
                                <div className="col-lg-9">
                                  <div className="row mb-4">
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
                                          placeholder="Search disputes..."
                                        />
                                      </div>
                                    </div>

                                    <div className="col-lg-6">
                                      <div className="d-flex align-items-center justify-content-between gap-15">
                                        <a
                                          className="btn btn-size btn-outline-light text-medium px-4"
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

                                        <button className="btn btn-size btn-outline-light text-medium px-4">
                                          <img
                                            src="/images/sort.svg"
                                            className="img-fluid me-2"
                                          />{" "}
                                          Sort
                                        </button>

                                        <button className="btn btn-size btn-main-outline-primary px-4 w-100">
                                          Create dispute
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div className="table-responsive">
                                <table className="table table-list">
                                  <thead className="table-light">
                                    <tr>
                                      <th scope="col">Filing Date</th>
                                      <th scope="col">Case Number</th>
                                      <th scope="col">Involved Parties</th>
                                      <th
                                        scope="col"
                                        style={{ width: "200px" }}
                                      >
                                        Case Title
                                      </th>
                                      <th scope="col">Case Status</th>
                                      <th scope="col"></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    {getDisputes.map((dispute) => (
                                      <tr key={dispute._id}>
                                        <td>{dispute.filling_date}</td>
                                        <td scope="row">{dispute.case_no}</td>
                                        <td>
                                          <div className="mb-2">
                                            <div className="d-flex align-items-center avatar-holder">
                                              <div className="position-relative">
                                                <div className="avatar-sm flex-shrink-0">
                                                  <img
                                                    src={
                                                      dispute.involved_parties
                                                        .accused.logo
                                                    }
                                                    className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                    alt="Avatar"
                                                  />
                                                </div>
                                              </div>
                                              <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                                <p className="text-truncate mb-0 max-200">
                                                  {
                                                    dispute.involved_parties
                                                      .accused.name
                                                  }{" "}
                                                </p>
                                                <span>
                                                  (
                                                  {
                                                    dispute.involved_parties
                                                      .accused.acronym
                                                  }
                                                  )
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <div className="mb-2">
                                            <div className="d-flex align-items-center avatar-holder">
                                              <div className="position-relative">
                                                <div className="avatar-sm flex-shrink-0">
                                                  <img
                                                    src={
                                                      dispute.involved_parties
                                                        .claimant.logo
                                                    }
                                                    className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                    alt="Avatar"
                                                  />
                                                </div>
                                              </div>
                                              <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                                <p className="text-truncate mb-0 max-200">
                                                  {
                                                    dispute.involved_parties
                                                      .claimant.name
                                                  }
                                                </p>
                                                <span>
                                                  (
                                                  {
                                                    dispute.involved_parties
                                                      .claimant.acronym
                                                  }
                                                  )
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                        </td>
                                        <td>{dispute.title}</td>
                                        <td>
                                          <img
                                            src="/images/Internally-resolved.svg"
                                            className="img-fluid"
                                            alt="internally resolved"
                                          />
                                        </td>

                                        <td>
                                          <div className="dropdown">
                                            <button
                                              className="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret"
                                              type="button"
                                              data-bs-toggle="dropdown"
                                              aria-expanded="false"
                                            >
                                              <img
                                                src="/images/dots-v.svg"
                                                className="img-fluid"
                                                alt="dot-v"
                                              />
                                            </button>
                                            <ul className="dropdown-menu border-radius action-menu-2">
                                              {/* <li><a className="dropdown-item" href="disputes-details.php">View details</a></li> */}
                                              <li>
                                                <Link
                                                  className="dropdown-item"
                                                  to={`/disputesDetails/${dispute._id}`}
                                                >
                                                  View details
                                                </Link>
                                              </li>
                                            </ul>
                                          </div>
                                        </td>
                                      </tr>
                                    ))}
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>

                          <div
                            className="tab-pane fade"
                            id="pills-resolved"
                            role="tabpanel"
                            aria-labelledby="pills-resolved-tab"
                            tabIndex="0"
                          >
                            Pending
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

export default Disputes;
