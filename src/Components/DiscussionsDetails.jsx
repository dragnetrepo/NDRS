import { type } from "@testing-library/user-event/dist/type";
import React, { useEffect, useState } from "react";
import { Link, useParams } from "react-router-dom";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";




const DiscussionIinc = () => {
  const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev"
  const { id } = useParams()
  const [discussion, setDiscussions] = useState([]);
  const [discussionMessages, setDiscussionsMessages] = useState([]);
  const [messages, setMessages] = useState({
    type: "text",
    message: "",
  });
  const [selectedFile, setSelectedFile] = useState({
    document: "", // This will store the object URL of the selected file for preview
    file: null, // This will store the actual file object
    reply_to: "2" // Example initial value for reply_to
  });



  useEffect(() => {
    fetchDiscussions();
    fetchDiscussionsMessages(id);
  }, [id]);

  const fetchDiscussions = async () => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const res = await fetch(baseUrl + "/api/case/discussions", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setDiscussions(data.data);
      console.log(data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const fetchDiscussionsMessages = async (id) => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const res = await fetch(
        baseUrl + `/api/case/discussions/${id}/messages`,
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
      setDiscussionsMessages(data.data);
      console.log(data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const onHandleChange = (e) => {
    setMessages({ ...messages, [e.target.name]: e.target.value });
    console.log(messages);
  };

  const handleSendMessages = async (e, id) => {
    e.preventDefault();
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const res = await fetch(
        baseUrl + `/api/case/discussions/${id}/send-message`,
        {
          method: "POST",
          headers: {
            "content-Type": "application/json",
            Authorization: `Bearer ${localStorage.getItem("token")}`,
          },
          body: JSON.stringify(messages),
        }
      );

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();

      setDiscussionsMessages((prevMessages) => [
        ...prevMessages,
        {
          _id: data.data?._id || `local-${Date.now()}`,
          sender: { sender: 'You' }, // Assuming 'You' is the current user
          message: messages.message,
          time_sent: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: false }),
        },
      ]);

      setMessages({
        type: "text",
        message: "",
      });



      // setDiscussionsMessages(data.data);
      console.log(data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const handleFileChange = (e) => {
    const file = e.target.files[0]; // Get the file from input

    // Create object URL for previewing the file
    const doc = URL.createObjectURL(file);
    setSelectedFile({
      document: doc,

      reply_to: selectedFile.reply_to // Keep reply_to from previous state
    });

    console.log(selectedFile); // Log the selectedFile state for information
  };


  console.log(selectedFile);

  const handleUpload = async (e, id) => {
    e.preventDefault();

    try {
      // Ensure that e.target.files is defined and contains at least one file
      if (!e.target.files || e.target.files.length === 0) {
        throw new Error("No file uploaded");
      }

      const file = e.target.files[0];
      const formData = new FormData();
      formData.append('file', file);

      const response = await fetch(baseUrl + `/api/case/discussions/${id}/upload-document`, {
        method: "POST",
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: formData,
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const result = await response.json();
      console.log(result);
      alert("File uploaded successfully!");
    } catch (error) {
      console.error("There was a problem with the upload:", error);
      alert("File upload failed!");
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
                  <h2>Discussions</h2>
                </div>
              </div>
            </main>

            <div className="discussion-section d-flex">
              <div className="discuss-1 flex-shrink-0 border-end px-2 pt-3">
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
                    placeholder="Search"
                  />
                </div>

                <div className="chat-height">
                  {discussion.map((item) => (
                    <Link to={`/discussionsDetails/${item._id}`} className="text-decoration-none" key={item._id}>
                      <div className="d-flex avatar-holder py-4 border-bottom">
                        <div className="position-relative">
                          <div className="avatar-sm flex-shrink-0">
                            <img
                              src={item.sender.photo}
                              className="img-fluid object-position-center object-fit-cover w-100 h-100"
                              alt="Avatar"
                            />
                          </div>
                        </div>
                        <div className="ms-2 flex-grow-1">
                          <div className="d-flex justify-content-between align-items-center mb-2">
                            <div className="mb-0 d-flex align-items-center">
                              <div className="heading-text text-truncate max-150">
                                {item.title}
                              </div>
                            </div>

                            <span className="text-main-primary ft-sm-only">
                              {item.time_sent}
                            </span>
                          </div>
                          <div className="d-flex justify-content-between align-items-start">
                            <p className="mb-0 text-muted-3 line-clamp-2">
                              {item.sender.sender}{` : `}
                              {item.
                                last_message
                              }
                            </p>
                            <span className="badge rounded-pill text-bg-main">4</span>
                          </div>
                        </div>
                      </div>
                    </Link>
                  ))}

                </div>
              </div>
              <div className="discuss-2 flex-grow-1 border-end">
                <div className="chat-box d-flex flex-column h-100">
                  <div className="chat-header sticky-top bg-custom-color-2 px-3 py-2">
                    <div className="d-flex align-items-center avatar-holder avatar-chat cursor-pointer">
                      <div className="position-relative">
                        <div className="avatar-sm flex-shrink-0">
                          <img
                            src="/images/avatar-2.svg"
                            className="img-fluid object-position-center object-fit-cover w-100 h-100"
                            alt="Avatar"
                          />
                        </div>
                      </div>
                      <div className="ms-2 flex-grow-1">
                        <h5 className="mb-0">Stephen Ejiro</h5>
                      </div>
                    </div>
                  </div>


                  <div className="chat-body flex-grow-1" >
                    <div className="container-fluid">
                      <div className="messages-container py-5">
                        {discussionMessages.map((item) =>
                          <div key={item._id} className={item.sender.sender === 'You' ? 'd-flex justify-content-end' : ''}>
                            <div className={`message-box message-width ${item.sender.sender === 'You' ? 'message-right' : 'message-left'} mb-3`}>
                              <div className="message-inner">
                                <p className="mb-0" >
                                  {item.message}
                                </p>
                              </div>
                            </div>
                            <p className="message-user mt-1">
                              {item.sender.sender} <i className="bi bi-dot"></i> {item.time_sent}
                            </p>

                          </div>
                        )}


                      </div>
                    </div>
                  </div>

                  <div className="chat-footer d-flex align-items-center justify-content-between bg-custom-color-2 px-3 gap-15 py-2">
                    <a href="#">
                      <img src="/images/file-upload.svg" className="img-fluid" />
                    </a>

                    <div className="dropdown">
                      <div
                        className="dropdown-toggle cursor-pointer no-caret"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <img src="/images/plus.svg" className="img-fluid" />
                      </div>
                      <ul className="dropdown-menu shadow-box p-3">
                        <li>
                          <a
                            className="dropdown-item d-flex align-items-center"
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#caseModal"
                          >
                            <img
                              src="/images/pencil.svg"
                              className="img-fluid me-2"
                              alt="pencil"
                            />{" "}
                            Change case status
                          </a>
                        </li>
                        <li>
                          <a
                            className="dropdown-item d-flex align-items-center"
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#pollModal"
                          >
                            <img
                              src="/images/signal.svg"
                              className="img-fluid me-2"
                              alt="pencil"
                            />{" "}
                            Create poll
                          </a>
                        </li>
                        <li>
                          <a
                            className="dropdown-item d-flex align-items-center"
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#folderModal2"
                          >
                            <img
                              src="/images/file.svg"
                              className="img-fluid me-2"
                              alt="pencil"
                            />{" "}
                            Upload document
                          </a>
                        </li>
                        <li>
                          <a
                            className="dropdown-item d-flex align-items-center"
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#scheduleModal"
                          >
                            <img
                              src="/images/calendar-alt.svg"
                              className="img-fluid me-2"
                              alt="pencil"
                            />{" "}
                            Schedule meeting
                          </a>
                        </li>
                      </ul>
                    </div>

                    <div className="input-group">
                      <span className="input-group-text bg-white">😀</span>
                      <input
                        type="text"
                        className="form-control border-start-0 form-control-height"
                        placeholder="Type a message"
                        name="message"
                        value={messages.message}
                        onChange={onHandleChange}
                      />
                    </div>

                    <a onClick={(e) => handleSendMessages(e, id)}>
                      <img src="/images/send.svg" className="img-fluid" />
                    </a>
                  </div>
                </div >
              </div >
              <div className="discuss-3 flex-shrink-0 p-3">
                <div className="d-flex justify-content-between align-items-center avatar-icon w-100 mb-4">
                  <div className="d-flex avatar-holder">
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
                      <h5 className="mb-0">Stephen Ejiro</h5>
                      <p className="mb-0 text-main-primary">View profile</p>
                    </div>
                  </div>
                  <div>
                    <a href="">
                      <img
                        src="/images/multiply.svg"
                        className="img-fluid close-grid-3"
                        alt="close"
                      />
                    </a>
                  </div>
                </div>

                <div className="d-flex justify-content-between align-items-center avatar-icon w-100 mb-3">
                  <div className="d-flex avatar-holder">
                    <div className="position-relative">
                      <img src="/images/users-2.svg" className="img-fluid" />
                    </div>
                    <div className="ms-2 flex-grow-1">
                      <p className="mb-1 ft-sm">Role in dispute</p>
                      <img src="/images/claimant.svg" className="img-fluid" />
                    </div>
                  </div>
                  <div>
                    <a href="">
                      <img
                        src="/images/multiply.svg"
                        className="img-fluid"
                        alt="close"
                      />
                    </a>
                  </div>
                </div>

                <div className="d-flex justify-content-between align-items-center avatar-icon w-100 mb-3">
                  <div className="d-flex avatar-holder">
                    <div className="position-relative">
                      <img src="/images/user.svg" className="img-fluid" />
                    </div>
                    <div className="ms-2 flex-grow-1">
                      <p className="mb-1 ft-sm">Name & Organization</p>
                      <p className="text-darken mb-0">Stephen Ejiro (Shafa Abuja)</p>
                    </div>
                  </div>
                  <div>
                    <a href="">
                      <img
                        src="/images/multiply.svg"
                        className="img-fluid"
                        alt="close"
                      />
                    </a>
                  </div>
                </div>

                <div className="d-flex justify-content-between align-items-center avatar-icon w-100 mb-3">
                  <div className="d-flex avatar-holder">
                    <div className="position-relative">
                      <img src="/images/mail.svg" className="img-fluid" />
                    </div>
                    <div className="ms-2 flex-grow-1">
                      <p className="mb-1 ft-sm">Email</p>
                      <p className="text-darken mb-0">stepheneji@nnpc.com</p>
                    </div>
                  </div>
                  <div>
                    <a href="">
                      <img src="/images/copy.svg" className="img-fluid" alt="close" />
                    </a>
                  </div>
                </div>

                <div className="d-flex justify-content-between align-items-center avatar-icon w-100 mb-3">
                  <div className="d-flex avatar-holder">
                    <div className="position-relative">
                      <img src="/images/call.svg" className="img-fluid" />
                    </div>
                    <div className="ms-2 flex-grow-1">
                      <p className="mb-1 ft-sm">Phone Number</p>
                      <p className="text-darken mb-0">08168141116</p>
                    </div>
                  </div>
                  <div>
                    <a href="">
                      <img src="/images/copy.svg" className="img-fluid" alt="close" />
                    </a>
                  </div>
                </div>

                <ul
                  className="nav custom-tab nav-underline border-bottom mb-3"
                  id="pills-tab"
                  role="tablist"
                >
                  <li className="nav-item" role="presentation">
                    <button
                      className="nav-link active"
                      id="pills-shared-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#pills-shared"
                      type="button"
                      role="tab"
                      aria-controls="pills-shared"
                      aria-selected="true"
                    >
                      Shared Files
                    </button>
                  </li>
                  <li className="nav-item" role="presentation">
                    <button
                      className="nav-link"
                      id="pills-link-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#pills-link"
                      type="button"
                      role="tab"
                      aria-controls="pills-link"
                      aria-selected="true"
                    >
                      Link
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
                    id="pills-shared"
                    role="tabpanel"
                    aria-labelledby="pills-shared-tab"
                    tabIndex="0"
                  >
                    <div className="d-flex align-items-center mb-4">
                      <div className="text-center me-2 flex-shrink-0">
                        <img src="/images/pdf-icon.svg" className="img-fluid" />
                      </div>
                      <div>
                        <p className="text-bold mb-1">Submission Letter.pdf</p>
                        <p className="font-sm text-muted mb-0">
                          11 Sep, 2023 | 12:24pm . 13MB
                        </p>
                      </div>
                    </div>

                    <div className="d-flex align-items-center mb-4">
                      <div className="text-center me-2 flex-shrink-0">
                        <img src="/images/pdf-icon.svg" className="img-fluid" />
                      </div>
                      <div>
                        <p className="text-bold mb-1">Submission Letter.pdf</p>
                        <p className="font-sm text-muted mb-0">
                          11 Sep, 2023 | 12:24pm . 13MB
                        </p>
                      </div>
                    </div>

                    <div className="d-flex align-items-center mb-4">
                      <div className="text-center me-2 flex-shrink-0">
                        <img src="/images/pdf-icon.svg" className="img-fluid" />
                      </div>
                      <div>
                        <p className="text-bold mb-1">Submission Letter.pdf</p>
                        <p className="font-sm text-muted mb-0">
                          11 Sep, 2023 | 12:24pm . 13MB
                        </p>
                      </div>
                    </div>
                  </div>

                  <div
                    className="tab-pane fade"
                    id="pills-link"
                    role="tabpanel"
                    aria-labelledby="pills-link-tab"
                    tabIndex="0"
                  >
                    Pending
                  </div>
                </div>
              </div>
            </div>
          </div >
        </div>
      </div >

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
                      className="img-fluid"
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

                <button className="btn btn-main-primary btn-size px-3" onClick={(e) => handleUpload(e, id)}>
                  Save
                </button>
              </div>
            </div>
            <div className="modal-body">
              <div className="">
                <label htmlFor="add_doc">
                  <input
                    type="file"
                    name="document"
                    onChange={handleFileChange}
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
                        className="img-fluid"
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
                      <img src="/images/pdf-icon.svg" className="img-fluid" />
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
                      <img src="/images/pdf-icon.svg" className="img-fluid" />
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
                      <img src="/images/pdf-icon.svg" className="img-fluid" />
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
                        className="img-fluid"
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
    </>
  );
};

export default DiscussionIinc;
