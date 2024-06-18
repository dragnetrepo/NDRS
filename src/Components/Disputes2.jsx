import React, { useEffect, useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";

import toast from "react-hot-toast";
import { useParams } from "react-router-dom";

const Disputes2 = () => {
  const { id } = useParams();
  const [disputeId, setDisputeId] = useState([]);
  const [uploaddocuments, setUploadDocuments] = useState({
    documents: "",
    folder_id: "",
  });
  const [sidebar, setsidebar] = useState(true)

  const toggleSideBar = () => {
    setsidebar(!sidebar)
  }


  useEffect(() => {
    fetchdata();
    fetchSingleDisputes(id);
  }, []);
  const fetchdata = async () => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const res = await fetch(baseUrl + "/api/case/disputes", {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setDisputeId(data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const fetchSingleDisputes = async (id) => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const res = await fetch(baseUrl + `/api/case/read/${id}`, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setDisputeId(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const handleFileChange = (e) => {
    const file = e.target.files[0];
    const formData = new FormData();
    formData.append("file", file);
    setUploadDocuments(formData);
  };

  const handleSubmit = async (
    e,
    id

    // disputeId,
    // setDisputeId,
    // uploaddocuments,
    // setUploadDocuments
  ) => {
    e.preventDefault();
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + `/api/case/${id}/add-document`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          // Accept: "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify(uploaddocuments), // Pass FormData object as the body
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();
      // setDisputeId(data);
      toast.success("Document has been uploaded successfully!");
    } catch (error) {
      console.error("Error fetching data:", error);
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
                              className="nav-link active"
                              id="pills-create-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-create"
                              type="button"
                              role="tab"
                              aria-controls="pills-create"
                              aria-selected="true"
                            >
                              Create Disputes
                            </button>
                          </li>
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link"
                              id="pills-ongoing-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-ongoing"
                              type="button"
                              role="tab"
                              aria-controls="pills-ongoing"
                              aria-selected="false"
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
                            className="tab-pane fade show active"
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
                                      Upload Supporting Documents
                                    </h3>
                                    {/* {disputeId.map((item) => (
                                      <div
                                        className="d-flex align-items-center gap-15"
                                        key={item.id}
                                      >
                                      //   {/* <a href="disputes.php" className="btn-flat text-main-primary">Back</a> */}
                                    {/* <a */}
                                    {/* //     href="/Disputes"
                                      //     className="btn-flat text-main-primary"
                                      //   >
                                      //     Back
                                      //   </a>
                                      //   <button */}
                                    {/* //     className="btn btn-size btn-main-primary submit-dispute"
                                      //     onClick={(e) => */}
                                    {/* //       handleSubmit( */}
                                    {/* //         e,
                                      //         item.id,
                                      //         disputeId,
                                      //         setDisputeId
                                      //       )
                                      //     }
                                      //   > */}
                                    {/* //     Submit
                                      //   </button>
                                      // </div>
                                    // ))} */}
                                    <div className="d-flex align-items-center gap-15">
                                      {/* <a href="disputes.php" className="btn-flat text-main-primary">Back</a> */}
                                      <a
                                        href="/Disputes"
                                        className="btn-flat text-main-primary"
                                      >
                                        Back
                                      </a>
                                      <button
                                        className="btn btn-size btn-main-primary submit-dispute"
                                        onClick={(e) => handleSubmit(e, id)}
                                      >
                                        Submit
                                      </button>
                                    </div>
                                  </div>
                                  <div className="card-body p-4">
                                    <label for="add_doc">
                                      <input
                                        type="file"
                                        // name="add_doc"
                                        id="add_doc"
                                        className="d-none"
                                        onChange={handleFileChange}
                                        name="documents"
                                      />
                                      <div className="mb-4">
                                        <div className="btn-flat text-main-primary text-decoration-none cursor-pointer">
                                          Add document{" "}
                                          <img
                                            src="/images/button-icon-1.svg"
                                            className="img-fluid"
                                            alt="add-icon"
                                          />
                                        </div>
                                      </div>
                                    </label>

                                    <div className="d-flex align-items-center justify-content-between mb-4">
                                      <div className="d-flex align-items-center">
                                        <div className="text-center me-2 flex-shrink-0">
                                          <img
                                            src="/images/file_upload_states.svg"
                                            className="img-fluid" alt=""
                                            style={{ height: "40px" }}
                                          />
                                        </div>
                                        <div>
                                          <p className="text-bold mb-1">
                                            Document Name
                                          </p>
                                          <p className="font-sm text-muted mb-0">
                                            Doc format . Max. 5MB
                                          </p>
                                        </div>
                                      </div>

                                      <div>
                                        <button className="btn btn-main-primary btn-size">
                                          Upload
                                        </button>
                                      </div>
                                    </div>

                                    <div className="d-flex align-items-center justify-content-between mb-4">
                                      <div className="d-flex align-items-center">
                                        <div className="text-center me-2 flex-shrink-0">
                                          <img
                                            src="/images/pdf-icon.svg"
                                            className="img-fluid" alt=""
                                          />
                                        </div>
                                        <div>
                                          <p className="text-bold mb-1">
                                            Submission Letter.pdf
                                          </p>
                                          <p className="font-sm text-muted mb-0">
                                            11 Sep, 2023 | 12:24pm . 13MB
                                          </p>
                                        </div>
                                      </div>

                                      <div className="d-flex align-items-center gap-10">
                                        <div
                                          className="spinner-border text-main-primary"
                                          role="status"
                                        >
                                          <span className="visually-hidden">
                                            Loading...
                                          </span>
                                        </div>

                                        <a href="#">
                                          <img
                                            src="/images/multiply_2.svg"
                                            className="img-fluid"
                                            alt="close"
                                          />
                                        </a>
                                      </div>
                                    </div>

                                    <div className="d-flex align-items-center justify-content-between mb-4">
                                      <div className="d-flex align-items-center">
                                        <div className="text-center me-2 flex-shrink-0">
                                          <img
                                            src="/images/pdf-icon.svg"
                                            className="img-fluid" alt=""
                                          />
                                        </div>
                                        <div>
                                          <p className="text-bold mb-1">
                                            Submission Letter.pdf
                                          </p>
                                          <p className="font-sm text-muted mb-0">
                                            11 Sep, 2023 | 12:24pm . 13MB
                                          </p>
                                        </div>
                                      </div>

                                      <div className="d-flex align-items-center gap-10">
                                        <div
                                          className="spinner-border text-main-primary"
                                          role="status"
                                        >
                                          <span className="visually-hidden">
                                            Loading...
                                          </span>
                                        </div>

                                        <a href="#">
                                          <img
                                            src="/images/multiply_2.svg"
                                            className="img-fluid"
                                            alt="close"
                                          />
                                        </a>
                                      </div>
                                    </div>

                                    <div className="d-flex align-items-center justify-content-between mb-4">
                                      <div className="d-flex align-items-center">
                                        <div className="text-center me-2 flex-shrink-0">
                                          <img
                                            src="/images/pdf-icon.svg"
                                            className="img-fluid" alt=""
                                          />
                                        </div>
                                        <div>
                                          <p className="text-bold mb-1">
                                            Submission Letter.pdf
                                          </p>
                                          <p className="font-sm text-muted mb-0">
                                            11 Sep, 2023 | 12:24pm . 13MB
                                          </p>
                                        </div>
                                      </div>

                                      <div className="d-flex align-items-center gap-10">
                                        <div
                                          className="spinner-border text-main-primary"
                                          role="status"
                                        >
                                          <span className="visually-hidden">
                                            Loading...
                                          </span>
                                        </div>

                                        <a href="#">
                                          <img
                                            src="/images/multiply_2.svg"
                                            className="img-fluid"
                                            alt="close"
                                          />
                                        </a>
                                      </div>
                                    </div>

                                    <div className="d-flex align-items-center justify-content-between mb-4">
                                      <div className="d-flex align-items-center">
                                        <div className="text-center me-2 flex-shrink-0">
                                          <img
                                            src="/images/file_upload_states_1.svg"
                                            className="img-fluid" alt=""
                                            style={{ height: "40px" }}
                                          />
                                        </div>
                                        <div>
                                          <p className="text-bold mb-1">
                                            Submission Letter.pdf
                                          </p>
                                          <p className="font-sm text-muted mb-0">
                                            11 Sep, 2023 | 12:24pm . 13MB
                                          </p>
                                        </div>
                                      </div>

                                      <div className="d-flex align-items-center gap-10">
                                        <a href="#">
                                          <img
                                            src="/images/bin_3.svg"
                                            className="img-fluid"
                                            alt="bin"
                                          />
                                        </a>

                                        <a href="#">
                                          <img
                                            src="/images/download_2.svg"
                                            className="img-fluid"
                                            alt="download"
                                          />
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div
                            className="tab-pane fade"
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
                                            className="img-fluid me-2" alt=""
                                          />{" "}
                                          Filters
                                        </a>

                                        <button className="btn btn-size btn-outline-light text-medium px-4">
                                          <img
                                            src="/images/sort.svg"
                                            className="img-fluid me-2"
                                            alt=""
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
                                    <tr>
                                      <td>Feb 4 2023</td>
                                      <td scope="row">DS139</td>
                                      <td>
                                        <div className="mb-2">
                                          <div className="d-flex align-items-center avatar-holder">
                                            <div className="position-relative">
                                              <div className="avatar-sm flex-shrink-0">
                                                <img
                                                  src="/images/nnpc.svg"
                                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                  alt="Avatar"
                                                />
                                              </div>
                                            </div>
                                            <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                              <p className="text-truncate mb-0 max-200">
                                                Nigerian National Petroleum Com{" "}
                                              </p>
                                              <span>(NNPC)</span>
                                            </div>
                                          </div>
                                        </div>
                                        <div className="mb-2">
                                          <div className="d-flex align-items-center avatar-holder">
                                            <div className="position-relative">
                                              <div className="avatar-sm flex-shrink-0">
                                                <img
                                                  src="/images/ipman.svg"
                                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                  alt="Avatar"
                                                />
                                              </div>
                                            </div>
                                            <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                              <p className="text-truncate mb-0 max-200">
                                                Independent Petroleum Marketer
                                              </p>
                                              <span>(IPMAN)</span>
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        Production Sharing Contracts (PSCs) 2024
                                      </td>
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
                                              <a
                                                className="dropdown-item"
                                                href="/DisputesDetails"
                                              >
                                                View details
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>Feb 4 2023</td>
                                      <td scope="row">DS139</td>
                                      <td>
                                        <div className="mb-2">
                                          <div className="d-flex align-items-center avatar-holder">
                                            <div className="position-relative">
                                              <div className="avatar-sm flex-shrink-0">
                                                <img
                                                  src="/images/nnpc.svg"
                                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                  alt="Avatar"
                                                />
                                              </div>
                                            </div>
                                            <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                              <p className="text-truncate mb-0 max-200">
                                                Nigerian National Petroleum Com{" "}
                                              </p>
                                              <span>(NNPC)</span>
                                            </div>
                                          </div>
                                        </div>
                                        <div className="mb-2">
                                          <div className="d-flex align-items-center avatar-holder">
                                            <div className="position-relative">
                                              <div className="avatar-sm flex-shrink-0">
                                                <img
                                                  src="/images/ipman.svg"
                                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                  alt="Avatar"
                                                />
                                              </div>
                                            </div>
                                            <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                              <p className="text-truncate mb-0 max-200">
                                                Independent Petroleum Marketer
                                              </p>
                                              <span>(IPMAN)</span>
                                            </div>
                                          </div>
                                        </div>
                                        <div className="mb-2">
                                          <div className="d-flex align-items-center avatar-holder">
                                            <div className="position-relative">
                                              <div className="avatar-sm flex-shrink-0">
                                                <img
                                                  src="/images/nnpc.svg"
                                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                  alt="Avatar"
                                                />
                                              </div>
                                            </div>
                                            <div className="ms-2 d-flex flex-grow-1 text-muted-3">
                                              <p className="text-truncate mb-0 max-200">
                                                Nigerian National Petroleum Com{" "}
                                              </p>
                                              <span>(NNPC)</span>
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        Production Sharing Contracts (PSCs) 2024
                                      </td>
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
                                              <a
                                                className="dropdown-item"
                                                href="/DisputesDetails"
                                              >
                                                View details
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </td>
                                    </tr>
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

      <div className="pop-overlay pop-overlay-dispute d-none">
        <div className="card pop-card border-0 py-4">
          <div className="card-body text-center px-lg-5">
            <div className="text-center mb-3">
              <img src="/images/ok-icon.svg" className="img-fluid" alt="" />
            </div>
            <h3 className="pop-text">
              You have successfully declared a Dispute Case for
            </h3>
            <p className="custom-text">Unfulfilled Agreements of 2019.</p>
            <p className="text-muted-3 custom-text-2 mb-0">
              Approval will be granted by a Ministry Admin.
            </p>
          </div>
        </div>
      </div>
    </>
  );
};

export default Disputes2;
