import { type } from "@testing-library/user-event/dist/type";
import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";


const DiscussionIinc = () => {
  const [discussion, setDiscussions] = useState([]);
  const [discussionMessages, setDiscussionsMessages] = useState([]);
  const [messages, setMessages] = useState({
    type: "",
    message: "",
  });

  useEffect(() => {
    fetchDiscussions();
    fetchDiscussionsMessages();
  }, []);

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

    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const onHandleChange = (e) => {
    setMessages({ ...messages, [e.target.name]: e.target.value });

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
          body: JSON.stringify({ message: messages, type: messages }),
        }
      );

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      fetchDiscussionsMessages();

      const data = await res.json();
      // setDiscussionsMessages(data.data);

    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  return (
    <>
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
                        src={item.sender.photo || '/images/download.png'}
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
                      src="/images/download.png"
                      className="img-fluid object-position-center object-fit-cover w-100 h-100"
                      alt="Avatar"
                    />
                  </div>
                </div>

              </div>
            </div>

            <div className="chat-body flex-grow-1">
              <div className="container-fluid">
                <div className="d-flex align-items-center justify-content-center" style={{
                  height: '400px'
                }}
                >
                  <h3>Start a conversation
                  </h3>
                </div>
              </div>
            </div>

            {/* <div className="chat-footer d-flex align-items-center justify-content-between bg-custom-color-2 px-3 gap-15 py-2">
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
                  onChange={onHandleChange}
                />
              </div>

              <a onClick={(e) => handleSendMessages(e)}>
                <img src="/images/send.svg" className="img-fluid" />
              </a>
            </div> */}
          </div>
        </div>
        {/* <div className="discuss-3 flex-shrink-0 p-3">
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
        </div> */}
      </div>


    </>
  );
};

export default DiscussionIinc;
