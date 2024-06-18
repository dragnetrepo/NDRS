import React, { useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import DiscussionInc from "../Bars/DiscussionInc";



const Discussions = () => {
  const [sidebar, setsidebar] = useState(true)

  const toggleSideBar = () => {
    setsidebar(!sidebar)
  }


  // const [messages, setMessages] = useState([])

  // useEffect(() => {
  //   fetchMessages()
  // }, [])

  // const fetchMessages = async () => {
  //   try {
  //     const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
  //     const token = localStorage.getItem("token");

  //     if (!token) {
  //       throw new Error("User is not logged in."); // Handle case where user is not logged in
  //     }

  //     const res = await fetch(baseUrl + "/api/case/discussions", {
  //       headers: {
  //         Authorization: `Bearer ${token}`,
  //       },
  //     });

  //     if (!res.ok) {
  //       throw new Error("Failed to fetch data."); // Handle failed request
  //     }

  //     const data = await res.json();
  //     setMessages(data.data);
  //     console.log(data);
  //   } catch (error) {
  //     console.error("Error fetching data:", error.message);
  //   }
  // };

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
                  <h2>Discussions</h2>
                </div>
              </div>

              {/* <?php include "./components/discussion.inc.php"; ?> */}
              <DiscussionInc />
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
        id="pollModal"
        tabIndex="-1"
        aria-labelledby="pollModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-lg">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header justify-content-between">
              <h1 className="modal-title fs-5">Create poll</h1>

              <div className="gap-10 d-flex align-items-center">
                <button
                  className="btn btn btn-size btn-main-outline-primary px-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  Cancel
                </button>

                <a href="#" className="btn btn-main-primary btn-size px-3">
                  Save
                </a>
              </div>
            </div>
            <div className="modal-body">
              <div className="row">
                <div className="col-lg-12 mb-3">
                  <label className="form-label">Poll question</label>
                  <input
                    type="text"
                    className="form-control form-control-height"
                    placeholder="Ask a question"
                  />
                </div>
                <div className="col-lg-12">
                  <p>
                    <a
                      href="#"
                      className="text-medium text-main-primary text-decoration-none"
                    >
                      Add poll option <i className="bi bi-plus"></i>
                    </a>
                  </p>
                </div>
                <div className="col-lg-12 mb-3">
                  <label className="form-label">Poll option 1</label>
                  <input
                    type="text"
                    className="form-control form-control-height"
                    placeholder="Type in a poll option"
                  />
                </div>
                <div className="col-lg-12">
                  <div className="mb-3 form-check">
                    <input
                      type="checkbox"
                      className="form-check-input"
                      id="Check1"
                    />
                    <label
                      className="form-check-label text-medium"
                      htmlFor="=Check1"
                    >
                      Enable anonymous voting
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* <!-- Modal --> */}
      <div
        className="modal fade"
        id="caseModal"
        tabIndex="-1"
        aria-labelledby="caseModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-lg">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header justify-content-between">
              <h1 className="modal-title fs-5">Change case status</h1>

              <div className="gap-10 d-flex align-items-center">
                <button
                  className="btn btn btn-size btn-main-outline-primary px-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  Cancel
                </button>

                <a href="#" className="btn btn-main-primary btn-size px-3">
                  Save
                </a>
              </div>
            </div>
            <div className="modal-body">
              <div className="mb-3">
                <label className="form-label">
                  What is the current state of the dispute?
                </label>
                <select className="form-select form-control-height disabled">
                  <option>Concilliation</option>
                  <option>Arbitration Tribunal</option>
                  <option>National Industrial Courts</option>
                </select>
              </div>

              <div className="mb-3">
                <label className="form-label d-block">
                  Was a resolution successfully reached?
                </label>
                <div className="form-check form-check-inline">
                  <input
                    className="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="inlineRadio1"
                    value="option1"
                  />
                  <label className="form-check-label" htmlFor="inlineRadio1">
                    Yes
                  </label>
                </div>
                <div className="form-check form-check-inline">
                  <input
                    className="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="inlineRadio2"
                    value="option2"
                  />
                  <label className="form-check-label" htmlFor="inlineRadio2">
                    No
                  </label>
                </div>
              </div>

              <div className="mb-3">
                <label className="form-label">Summary of Concilliation</label>
                <textarea
                  className="form-control"
                  rows="3"
                  placeholder="Type in your message"
                ></textarea>
              </div>

              <label htmlFor="add_doc">
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
            </div>
          </div>
        </div>
      </div>

      {/* <!-- Modal --> */}
      <div
        className="modal fade"
        id="resultsModal"
        tabIndex="-1"
        aria-labelledby="resultsModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-lg">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header justify-content-between">
              <h1 className="modal-title fs-5">View Poll Results</h1>

              <div className="gap-10 d-flex align-items-center">
                <button
                  className="btn btn-main-primary btn-size px-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  Cancel
                </button>
              </div>
            </div>
            <div className="modal-body">
              <div className="py-3 border-bottom">
                <span className="text-medium d-block mb-2">
                  Satisfied - 50%
                </span>

                <div className="avatars margin-unset ms-2">
                  <div className="avatars__item">
                    <img
                      className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                      src="https://randomuser.me/api/portraits/women/65.jpg"
                      alt=""
                    />
                  </div>

                  <div className="avatars__item">
                    <img
                      className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                      src="https://randomuser.me/api/portraits/women/66.jpg"
                      alt=""
                    />
                  </div>

                  <div className="avatars__item">
                    <img
                      className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                      src="https://randomuser.me/api/portraits/women/67.jpg"
                      alt=""
                    />
                  </div>

                  <div className="avatars__item">
                    <img
                      className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                      src="https://randomuser.me/api/portraits/women/68.jpg"
                      alt=""
                    />
                  </div>

                  <div className="avatars__item">
                    <img
                      className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                      src="https://randomuser.me/api/portraits/women/69.jpg"
                      alt=""
                    />
                  </div>

                  <div className="avatars__item d-flex justify-content-center align-items-center ft-sm text-medium">
                    +10
                  </div>
                </div>
              </div>

              <div className="py-3 border-bottom">
                <span className="text-medium d-block mb-2">
                  Unsatisfied - 30%
                </span>

                <div className="avatars margin-unset ms-2">
                  <div className="avatars__item">
                    <img
                      className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                      src="https://randomuser.me/api/portraits/women/65.jpg"
                      alt=""
                    />
                  </div>

                  <div className="avatars__item">
                    <img
                      className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                      src="https://randomuser.me/api/portraits/women/66.jpg"
                      alt=""
                    />
                  </div>

                  <div className="avatars__item">
                    <img
                      className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                      src="https://randomuser.me/api/portraits/women/67.jpg"
                      alt=""
                    />
                  </div>
                </div>
              </div>

              <div className="py-3 border-bottom">
                <span className="text-medium d-block mb-2">Not Sure - 20%</span>

                <div className="avatars margin-unset ms-2">
                  <div className="avatars__item">
                    <img
                      className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                      src="https://randomuser.me/api/portraits/women/65.jpg"
                      alt=""
                    />
                  </div>

                  <div className="avatars__item">
                    <img
                      className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                      src="https://randomuser.me/api/portraits/women/66.jpg"
                      alt=""
                    />
                  </div>

                  <div className="avatars__item">
                    <img
                      className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                      src="https://randomuser.me/api/portraits/women/67.jpg"
                      alt=""
                    />
                  </div>
                </div>
              </div>
            </div>
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
        <div className="modal-dialog modal-dialog-centered modal-lg">
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

                <a href="#" className="btn btn-main-primary btn-size px-3">
                  Save
                </a>
              </div>
            </div>
            <div className="modal-body">
              <div className="">
                <label htmlFor="add_doc">
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
                    <div
                      className="spinner-border text-main-primary"
                      role="status"
                    >
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
                    <div
                      className="spinner-border text-main-primary"
                      role="status"
                    >
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
                    <div
                      className="spinner-border text-main-primary"
                      role="status"
                    >
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

      {/* <!-- Modal --> */}
      <div
        className="modal fade"
        id="scheduleModal"
        tabIndex="-1"
        aria-labelledby="scheduleModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header justify-content-between">
              <h1 className="modal-title fs-5">Schedule meeting</h1>

              <div className="gap-10 d-flex align-items-center">
                <button className="btn btn-main-primary btn-size px-3">
                  Post meeting
                </button>
              </div>
            </div>
            <div className="modal-body">
              <form>
                <div className="mb-3">
                  <label className="form-label">Title</label>
                  <input
                    type="text"
                    className="form-control form-control-height"
                    placeholder="Type the title of the meeting"
                  />
                </div>
                <div className="mb-3">
                  <label className="form-label">Date</label>
                  <input
                    type="date"
                    className="form-control form-control-height"
                    placeholder="Select a date"
                  />
                </div>
                <div className="mb-3">
                  <label className="form-label">Location</label>
                  <input
                    type="text"
                    className="form-control form-control-height"
                    placeholder="Type the location for offline or link for online meetings"
                  />
                </div>
                <div className="row">
                  <div className="col-lg-6">
                    <div className="mb-3">
                      <label className="form-label">Start</label>
                      <select className="form-select form-control-height">
                        <option>Select a time</option>
                        <option>10am</option>
                      </select>
                    </div>
                  </div>
                  <div className="col-lg-6">
                    <div className="mb-3">
                      <label className="form-label">End</label>
                      <select className="form-select form-control-height">
                        <option>Select a time</option>
                        <option>2pm</option>
                      </select>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      {/* <?php include "./components/javascript.inc.php"; ?> */}
    </>
  );
};

export default Discussions;
