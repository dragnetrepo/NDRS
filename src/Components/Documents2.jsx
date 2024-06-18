import React from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";

const Documents2 = () => {
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
                  <h2>Documents</h2>
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
                              id="pills-folder-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-folder"
                              type="button"
                              role="tab"
                              aria-controls="pills-folder"
                              aria-selected="true"
                            >
                              Case Folders
                            </button>
                          </li>
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link"
                              id="pills-document-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-document"
                              type="button"
                              role="tab"
                              aria-controls="pills-document"
                              aria-selected="false"
                            >
                              All Documents
                            </button>
                          </li>
                        </ul>
                        <div className="tab-content" id="pills-tabContent">
                          <div
                            className="tab-pane fade show active"
                            id="pills-folder"
                            role="tabpanel"
                            aria-labelledby="pills-folder-tab"
                            tabIndex="0"
                          >
                            <div className="d-flex align-items-center gap-20 mt-4 ">
                              <a
                                href="/HelpSupport"
                                className="text-muted-4 text-decoration-none"
                              >
                                <i className="bi bi-arrow-left"></i> Go back
                              </a>

                              <nav
                                style={{ "--bs-breadcrumb-divider": "/" }}
                                aria-label="breadcrumb"
                              >
                                <ol className="breadcrumb mb-0">
                                  <li className="breadcrumb-item">
                                    <a
                                      href="/documents"
                                      className="text-main-primary text-decoration-none"
                                    >
                                      Case Folders
                                    </a>
                                  </li>
                                  <li
                                    className="breadcrumb-item text-muted-3 active"
                                    aria-current="page"
                                  >
                                    Random Docs
                                  </li>
                                </ol>
                              </nav>
                            </div>

                            <div className="row mt-5">
                              <div className="col-lg-10">
                                <div className="card mb-4">
                                  <div className="card-header p-4 heading-card bg-white d-flex justify-content-between align-items-center">
                                    <div>
                                      <h3>Random Docs</h3>
                                    </div>

                                    <button
                                      className="btn btn-size btn-main-primary px-3"
                                      data-bs-toggle="modal"
                                      data-bs-target="#folderModal2"
                                    >
                                      Add Documents
                                    </button>
                                  </div>
                                  <div className="card-body p-4">
                                    <div className="row mt-2 mb-4">
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
                                            placeholder="Search here..."
                                          />
                                        </div>
                                      </div>

                                      <div className="col-lg-6">
                                        <div className="d-flex align-items-center justify-content-between gap-15">
                                          <a className="btn btn-size btn-outline-light text-medium px-3">
                                            <img
                                              src="/images/sort.svg"
                                              className="img-fluid me-2" alt=""
                                            />{" "}
                                            Sort
                                          </a>

                                          <p className="text-end mb-0 file-count">
                                            Document: 0
                                          </p>
                                        </div>
                                      </div>
                                    </div>

                                    <div className="row">
                                      <div className="col-lg-12">
                                        <table className="table table-list">
                                          <thead className="table-light">
                                            <tr>
                                              <th scope="col">
                                                <div>
                                                  <input
                                                    className="form-check-input"
                                                    type="checkbox"
                                                    id="checkboxNoLabel"
                                                    value=""
                                                    aria-label="..."
                                                  />
                                                </div>
                                              </th>
                                              <th scope="col">Name</th>
                                              <th scope="col">Size</th>
                                              <th scope="col">File Type</th>
                                              <th scope="col">Filing Date</th>
                                              <th scope="col">Actions</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>
                                                <div>
                                                  <input
                                                    className="form-check-input"
                                                    type="checkbox"
                                                    id="checkboxNoLabel"
                                                    value=""
                                                    aria-label="..."
                                                  />
                                                </div>
                                              </td>
                                              <td>Submission letter</td>
                                              <td>3 MB</td>
                                              <td>PDF</td>
                                              <td>Feb 4 2019</td>
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
                                                    <li>
                                                      <a
                                                        className="dropdown-item"
                                                        href="#"
                                                      >
                                                        View
                                                      </a>
                                                    </li>
                                                    <li>
                                                      <a
                                                        className="dropdown-item"
                                                        href="#"
                                                      >
                                                        Print
                                                      </a>
                                                    </li>
                                                    <li>
                                                      <a
                                                        className="dropdown-item"
                                                        href="#"
                                                      >
                                                        Download
                                                      </a>
                                                    </li>
                                                  </ul>
                                                </div>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table className="table table-list">
                                          <thead className="table-light">
                                            <tr>
                                              <th scope="col">
                                                <div>
                                                  <input
                                                    className="form-check-input"
                                                    type="checkbox"
                                                    id="checkboxNoLabel"
                                                    value=""
                                                    aria-label="..."
                                                  />
                                                </div>
                                              </th>
                                              <th scope="col">Name</th>
                                              <th scope="col">Size</th>
                                              <th scope="col">File Type</th>
                                              <th scope="col">Filing Date</th>
                                              <th scope="col">Actions</th>
                                            </tr>
                                          </thead>
                                        </table>
                                        <div className="card no-admin-card rounded-0">
                                          <div className="card-body d-flex align-items-center justify-content-center">
                                            <div className="text-center">
                                              <div className="text-center mb-4">
                                                <img
                                                  src="/images/no-document.svg"
                                                  className="img-fluid" alt=""
                                                />
                                              </div>

                                              <h4 className="">
                                                No documents here
                                              </h4>

                                              <div className="row">
                                                <div className="col-lg-7 mx-auto">
                                                  <p className="text-muted-3 text-center">
                                                    You don’t have any documents
                                                    here.Upload some by clicking
                                                    the button below
                                                  </p>
                                                </div>
                                              </div>

                                              <button
                                                className="btn btn-size btn-main-primary px-3 mx-auto"
                                                data-bs-toggle="modal"
                                                data-bs-target="#folderModal2"
                                              >
                                                Add Documents
                                              </button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div
                            className="tab-pane fade"
                            id="pills-document"
                            role="tabpanel"
                            aria-labelledby="pills-document-tab"
                            tabIndex="0"
                          >
                            <div className="row mt-5">
                              <div className="col-lg-10">
                                <div className="card mb-4">
                                  <div className="card-header p-4 heading-card bg-white">
                                    <h3>All Documents</h3>
                                  </div>
                                  <div className="card-body p-4">
                                    <div className="row mt-2 mb-4">
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
                                            placeholder="Search here..."
                                          />
                                        </div>
                                      </div>

                                      <div className="col-lg-6">
                                        <div className="d-flex align-items-center justify-content-between gap-15">
                                          <a className="btn btn-size btn-outline-light text-medium px-3">
                                            <img
                                              src="/images/sort.svg"
                                              className="img-fluid me-2"
                                            />{" "}
                                            Sort
                                          </a>

                                          <p className="text-end mb-0 file-count">
                                            Files: 134
                                          </p>
                                        </div>
                                      </div>
                                    </div>

                                    <div className="row">
                                      <div className="col-lg-12">
                                        <table className="table table-list">
                                          <thead className="table-light">
                                            <tr>
                                              <th scope="col">
                                                <div>
                                                  <input
                                                    className="form-check-input"
                                                    type="checkbox"
                                                    id="checkboxNoLabel"
                                                    value=""
                                                    aria-label="..."
                                                  />
                                                </div>
                                              </th>
                                              <th scope="col">Name</th>
                                              <th scope="col">Size</th>
                                              <th scope="col">File Type</th>
                                              <th scope="col">Filing Date</th>
                                              <th scope="col">Actions</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>
                                                <div>
                                                  <input
                                                    className="form-check-input"
                                                    type="checkbox"
                                                    id="checkboxNoLabel"
                                                    value=""
                                                    aria-label="..."
                                                  />
                                                </div>
                                              </td>
                                              <td>
                                                <div
                                                  title="Shalom Winner - Solar Sales Receipt Installation"
                                                  className="text-truncate max-200"
                                                >
                                                  Shalom Winner - Solar Sales
                                                  Receipt Installation
                                                </div>
                                              </td>
                                              <td>1.2 MB</td>
                                              <td>PDF</td>
                                              <td>Feb 4 2019</td>
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
                                                      alt="dots"
                                                    />
                                                  </button>
                                                  <ul className="dropdown-menu border-radius action-menu-2">
                                                    <li>
                                                      <a
                                                        className="dropdown-item"
                                                        href="#"
                                                      >
                                                        Download
                                                      </a>
                                                    </li>
                                                    <li>
                                                      <a
                                                        className="dropdown-item"
                                                        href="#"
                                                      >
                                                        Copy
                                                      </a>
                                                    </li>
                                                    <li>
                                                      <a
                                                        className="dropdown-item"
                                                        href="#"
                                                      >
                                                        Delete
                                                      </a>
                                                    </li>
                                                  </ul>
                                                </div>
                                              </td>
                                            </tr>

                                            <tr>
                                              <td>
                                                <div>
                                                  <input
                                                    className="form-check-input"
                                                    type="checkbox"
                                                    id="checkboxNoLabel"
                                                    value=""
                                                    aria-label="..."
                                                  />
                                                </div>
                                              </td>
                                              <td>
                                                <div
                                                  title="Shalom Winner - Solar Sales Receipt Installation"
                                                  className="text-truncate max-200"
                                                >
                                                  Shalom Winner - Solar Sales
                                                  Receipt Installation
                                                </div>
                                              </td>
                                              <td>1.2 MB</td>
                                              <td>JPEG</td>
                                              <td>Feb 4 2019</td>
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
                                                      alt="dots"
                                                    />
                                                  </button>
                                                  <ul className="dropdown-menu border-radius action-menu-2">
                                                    <li>
                                                      <a
                                                        className="dropdown-item"
                                                        href="#"
                                                      >
                                                        Download
                                                      </a>
                                                    </li>
                                                    <li>
                                                      <a
                                                        className="dropdown-item"
                                                        href="#"
                                                      >
                                                        Copy
                                                      </a>
                                                    </li>
                                                    <li>
                                                      <a
                                                        className="dropdown-item"
                                                        href="#"
                                                      >
                                                        Delete
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
                                </div>
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

      {/* <!-- Modal --> */}
      <div
        className="modal fade"
        id="folderModal2"
        tabIndex="-1"
        aria-labelledby="folderModal2Label"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header justify-content-between">
              <h1 className="modal-title fs-5">Upload Documents</h1>

              <div className="gap-10 d-flex align-items-center">
                <button
                  className="btn btn btn-size btn-main-outline-primary px-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  Back
                </button>

                <a
                  href="/documents2"
                  className="btn btn-main-primary btn-size px-3"
                >
                  Save
                </a>
              </div>
            </div>
            <div className="modal-body">
              <div className="">
                <label for="add_doc">
                  <input
                    type="file"
                    name="add_doc"
                    id="add_doc"
                    className="d-none"
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
                      <p className="text-bold mb-1">Document Name</p>
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
                      <img src="/images/pdf-icon.svg" className="img-fluid" alt="" />
                    </div>
                    <div>
                      <p className="text-bold mb-1">Submission Letter.pdf</p>
                      <p className="font-sm text-muted mb-0">
                        11 Sep, 2023 | 12:24pm . 13MB
                      </p>
                    </div>
                  </div>

                  <div className="d-flex align-items-center gap-10">
                    <div className="spinner-border text-main-primary" role="status">
                      <span className="visually-hidden">Loading...</span>
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
                      <img src="/images/pdf-icon.svg" className="img-fluid" alt="" />
                    </div>
                    <div>
                      <p className="text-bold mb-1">Submission Letter.pdf</p>
                      <p className="font-sm text-muted mb-0">
                        11 Sep, 2023 | 12:24pm . 13MB
                      </p>
                    </div>
                  </div>

                  <div className="d-flex align-items-center gap-10">
                    <div className="spinner-border text-main-primary" role="status">
                      <span className="visually-hidden">Loading...</span>
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
                      <img src="/images/pdf-icon.svg" className="img-fluid" alt="" />
                    </div>
                    <div>
                      <p className="text-bold mb-1">Submission Letter.pdf</p>
                      <p className="font-sm text-muted mb-0">
                        11 Sep, 2023 | 12:24pm . 13MB
                      </p>
                    </div>
                  </div>

                  <div className="d-flex align-items-center gap-10">
                    <div className="spinner-border text-main-primary" role="status">
                      <span className="visually-hidden">Loading...</span>
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
                      <p className="text-bold mb-1">Submission Letter.pdf</p>
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
    </>
  );
};

export default Documents2;
