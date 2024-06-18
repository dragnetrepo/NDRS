import React, { useEffect, useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import { useNavigate } from "react-router-dom";
import toast from "react-hot-toast";


const Documents = () => {
  const navigate = useNavigate();

  const [folders, setFolders] = useState([])
  const [documents, setDocuments] = useState([])
  const [caseFolder, setcaseFolder] = useState({
    name: "",
  });

  const [getDisputes, setGetDisputes] = useState({
    title: "",
    type: "",
    summary: "",
    background_info: "",
    relief_sought: "",
    specific_claims: "",
    negotiation_terms: "",
    accused_party: "",
    initiating_party: "",
  });

  useEffect(() => {
    fetchFolder()
    fetchDocuments()
  }, []);

  const onHandleChange = (e) => {
    setcaseFolder({ ...caseFolder, [e.target.name]: e.target.value });
  };

  const fetchFolder = async () => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const res = await fetch(baseUrl + "/api/documents/folders", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setFolders(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const fetchDocuments = async () => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const res = await fetch(baseUrl + "/api/documents/all", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setDocuments(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const handleSubmit = async (
    e,
    id,
    getDisputes,
    setGetDisputes,
    setcaseFolder
  ) => {
    e.preventDefault();
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + `/api/case/${id}/create-folder`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify(caseFolder),
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();

      navigate("/documents2");
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  const handleDelete = async (e, id) => {
    e.preventDefault();

    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + `/api/case/${id}/delete-document`, {
        method: "DELETE",
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify({
          document_id: ''
        })

      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();
      setDocuments((prevUnionsList) =>
        prevUnionsList.filter((document) => document.id !== id)
      );
      toast.success('document has been deleted!')
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  const handleDownload = async (e, url) => {
    e.preventDefault()

    const a = document.createElement("a");
    a.href = url;
    a.download = url; // Specify the file name
    document.body.appendChild(a);
    a.click();
    a.remove(); // Clean up and remove the element


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
                            <div className="row mt-5">
                              <div className="col-lg-10">
                                <div className="card mb-4">
                                  <div className="card-header p-4 heading-card bg-white d-flex justify-content-between align-items-center">
                                    <div>
                                      <h3>Case Folders</h3>
                                      <p className="text-muted-3 font-sm mb-0">
                                        Each dispute case automatically creates
                                        a new folder
                                      </p>
                                    </div>

                                    <button
                                      className="btn btn-size btn-main-primary px-3"
                                      data-bs-toggle="modal"
                                      data-bs-target="#folderModal"
                                    >
                                      Create Folder
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
                                              className="img-fluid me-2"
                                            />{" "}
                                            Sort
                                          </a>

                                          <p className="text-end mb-0 file-count">
                                            Folders: {folders.length}
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
                                              <th scope="col">No of Docs</th>
                                              <th scope="col">Filing Date</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            {folders.map((item) =>
                                              <tr key={item._id}>
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
                                                    {item.name}
                                                  </div>
                                                </td>
                                                <td>{item.size}</td>
                                                <td>{item.number_of_files}</td>
                                                {/* <td>Feb 4 2019</td> */}
                                                <td>{item.last_modified}</td>
                                              </tr>
                                            )}
                                          </tbody>
                                        </table>
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
                                            Files: {documents.length}
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
                                            {documents.map((item) =>
                                              <tr key={item._id}>
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
                                                    {item.name}
                                                  </div>
                                                </td>
                                                <td>{item.size}</td>
                                                <td>{item.type}</td>
                                                {/* <td>{item.last_modified}</td> */}
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
                                                          href=""
                                                        >
                                                          View
                                                        </a>
                                                      </li>
                                                      <li>
                                                        <button
                                                          className="dropdown-item"

                                                          onClick={(e) => handleDownload(e, item.file_path)}
                                                        >
                                                          Download
                                                        </button>
                                                      </li>
                                                      <li>
                                                        <a
                                                          className="dropdown-item"
                                                          href=""
                                                        // onClick={(e) => handleDelete(e, item._id)}
                                                        >
                                                          Print
                                                        </a>
                                                      </li>
                                                    </ul>
                                                  </div>
                                                </td>
                                              </tr>
                                            )}
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
        id="folderModal"
        tabIndex="-1"
        aria-labelledby="folderModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header justify-content-between">
              <h1 className="modal-title fs-5">Create Folder</h1>

              <div className="gap-10 d-flex align-items-center">
                <button
                  className="btn btn btn-size btn-main-outline-primary px-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  Cancel
                </button>

                <a
                  href="/documents2"
                  className="btn btn-main-primary btn-size px-3"
                  onClick={handleSubmit}
                >
                  Save Folder
                </a>
              </div>
            </div>
            <div className="modal-body">
              <div className="row">
                <div className="col-lg-12">
                  <label className="form-label">Folder name</label>
                  <input
                    type="text"
                    className="form-control form-control-height"
                    placeholder="Type in the folder name"
                    name="name"
                    onChange={onHandleChange}
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default Documents;
