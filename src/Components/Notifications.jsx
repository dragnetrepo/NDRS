import React, { useEffect, useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";

const Notifications = () => {
  useEffect(() => {
    fetchNotifications();
    fetchCaseNotifications();
    fetchPendingNotifications();
  }, []);

  const [selectedApi, setSelectedApi] = useState("notifications");
  const [notifications, setNotifications] = useState([]);
  const [caseNotifications, setCaseNotifications] = useState([]);
  const [pendingNotifications, setPendingNotifications] = useState([]);
  const [data, setData] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);
  const [sidebar, setsidebar] = useState(true)

  const toggleSideBar = () => {
    setsidebar(!sidebar)
  }


  const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
  const token = localStorage.getItem("token");

  const fetchNotifications = async () => {
    try {
      setLoading(true);
      setError(null);
      const res = await fetch(`${baseUrl}/api/notifications`, {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      if (!res.ok) throw new Error("Failed to fetch data.");
      const data = await res.json();
      setNotifications(data.data);
      setData(data.data);
    } catch (error) {
      setError(error.message);
    } finally {
      setLoading(false);
    }
  };

  const fetchCaseNotifications = async () => {
    try {
      setLoading(true);
      setError(null);
      const res = await fetch(`${baseUrl}/api/notifications/cases/all`, {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      if (!res.ok) throw new Error("Failed to fetch data.");
      const data = await res.json();
      setCaseNotifications(data.data);
      setData(data.data);
    } catch (error) {
      setError(error.message);
    } finally {
      setLoading(false);
    }
  };

  const fetchPendingNotifications = async () => {
    try {
      setLoading(true);
      setError(null);
      const res = await fetch(`${baseUrl}/api/notifications/status/pending`, {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      if (!res.ok) throw new Error("Failed to fetch data.");
      const data = await res.json();
      setPendingNotifications(data.data);
      setData(data.data);
    } catch (error) {
      setError(error.message);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    if (!token) {
      setError("User is not logged in.");
      return;
    }

    switch (selectedApi) {
      case "notifications":
        fetchNotifications();
        break;
      case "caseNotifications":
        fetchCaseNotifications();
        break;
      case "pendingNotifications":
        fetchPendingNotifications();
        break;
      default:
        break;
    }
  }, [selectedApi]);

  return (
    <>
      {/* <?php include "./components/head.inc.php";?> */}
      <div>
        <div className="main-admin-container bg-light dark-mode-active">
          <div className="d-flex flex-column flex-lg-row h-lg-100">
            {/* <?php include "./components/main-navbar.inc.php"; ?> */}
            <MainNavbarInc sidebar={sidebar} />

            <div className="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">

              <TopBarInc toggleSideBar={toggleSideBar} />
              <main className="admin-content">
                <div className="header-box py-5">
                  <div className="container">
                    <h2>Notifications & Request</h2>
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
                                id="pills-all-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-all"
                                type="button"
                                role="tab"
                                aria-controls="pills-all"
                                aria-selected="true"
                              >
                                All
                              </button>
                            </li>
                            <li className="nav-item" role="presentation">
                              <button
                                className="nav-link"
                                id="pills-pending-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-pending"
                                type="button"
                                role="tab"
                                aria-controls="pills-pending"
                                aria-selected="false"
                              >
                                Pending
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
                              <div className="row mt-5">
                                <div className="col-lg-4 mb-4">
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

                                <div className="col-lg-4 mb-4">
                                  <div className="d-flex align-items-center justify-content-between">
                                    <button className="btn btn-size btn-outline-light text-medium">
                                      <img
                                        src="/images/sort.svg"
                                        className="img-fluid me-2"
                                      />{" "}
                                      Most Recent
                                    </button>
                                  </div>
                                </div>

                                <div className="col-lg-12">
                                  <div className="form-check form-check-inline">
                                    <input
                                      className="form-check-input"
                                      type="radio"
                                      value="notifications"
                                      checked={selectedApi === "notifications"}
                                      onChange={() =>
                                        setSelectedApi("notifications")
                                      }
                                    />
                                    <label
                                      className="form-check-label"
                                      htmlFor="inlineRadio1"
                                    >
                                      All
                                    </label>
                                  </div>
                                  <div className="form-check form-check-inline">
                                    <input
                                      className="form-check-input"
                                      type="radio"
                                      name="api"
                                      id="inlineRadio2"
                                      value="caseNotifications"
                                      checked={
                                        selectedApi === "caseNotifications"
                                      }
                                      onChange={() =>
                                        setSelectedApi("caseNotifications")
                                      }
                                    />
                                    <label
                                      className="form-check-label"
                                      htmlFor="inlineRadio2"
                                    >
                                      Notifications
                                    </label>
                                  </div>
                                  <div className="form-check form-check-inline">
                                    <input
                                      className="form-check-input"
                                      type="radio"
                                      name="api"
                                      id="inlineRadio3"
                                      // value="option3"
                                      value="pendingNotifications"
                                      checked={
                                        selectedApi === "pendingNotifications"
                                      }
                                      onChange={() =>
                                        setSelectedApi("pendingNotifications")
                                      }
                                    />
                                    <label
                                      className="form-check-label"
                                      htmlFor="inlineRadio3"
                                    >
                                      Case Activity
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div>
                                {Object.entries(data).map(([date, items]) => (
                                  <div key={date}>
                                    <div className="row mt-4">
                                      <div className="col-lg-12">
                                        <div className="d-flex align-items-center justify-content-between w-100">
                                          <div className="border-bottom w-100"></div>
                                          <div className="notification-badge text-medium">
                                            {date}
                                          </div>
                                          <div className="border-bottom w-100"></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div className="row">
                                      <div className="col-lg-8">
                                        {items.map((notification) => (
                                          <div
                                            className="d-flex avatar-holder bg-custom-color-2 p-3 rounded my-4"
                                            key={notification._id}
                                          >
                                            <div className="position-relative">
                                              <div className="avatar-sm flex-shrink-0">
                                                <img
                                                  src="/images/ipman-logo.svg"
                                                  className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                  alt="Avatar"
                                                />
                                              </div>
                                            </div>
                                            <div className="ms-2 flex-grow-1">
                                              <div className="mb-2 d-flex align-items-center">
                                                <p className="mb-0">
                                                  <strong style={{ fontWeight: 'bold' }}>
                                                    {notification.message}
                                                  </strong>
                                                </p>
                                              </div>
                                              <div>
                                                <p className="mb-0">
                                                  {notification.date}
                                                </p>
                                              </div>
                                            </div>
                                          </div>
                                        ))}
                                      </div>
                                    </div>
                                  </div>
                                ))}
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

        {/* 
            <!-- Modal --> */}
        <div
          className="modal fade"
          id="roleModal"
          tabIndex="-1"
          aria-labelledby="roleModalLabel"
          aria-hidden="true"
        >
          <div className="modal-dialog modal-dialog-centered">
            <div className="modal-content border-0 p-lg-4 p-3">
              <div className="text-end">
                <button
                  type="button"
                  className="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div className="modal-body">
                <div className="text-center">
                  <img
                    src="/images/user-icon.svg"
                    className="img-fluid mb-3"
                    alt="create an account"
                  />
                </div>
                <h1 className="heading modal-heading text-center mb-3">
                  What role are you requesting for?
                </h1>
                <p className="mb-4 modal-text text-center">
                  Current role - Organization Admin
                </p>

                <form>
                  <p className="text-bold">Select new role</p>

                  <ul className="list-group new-role">
                    <li className="list-group-item d-flex justify-content-between active p-3">
                      National Union Admin{" "}
                      <i className="bi bi-check-circle-fill text-main-primary"></i>
                    </li>
                    <li className="list-group-item d-flex justify-content-between p-3">
                      Ministry Admin
                    </li>
                    <li className="list-group-item d-flex justify-content-between p-3">
                      Organization Member
                    </li>
                  </ul>

                  <div className="mt-4">
                    <button className="btn btn-size btn-main-primary w-100">
                      Send Request
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        {/* <!-- Modal --> */}
        <div
          className="modal fade"
          id="orgModal"
          tabIndex="-1"
          aria-labelledby="orgModalLabel"
          aria-hidden="true"
        >
          <div className="modal-dialog modal-dialog-centered">
            <div className="modal-content border-0 p-lg-4 p-3">
              <div className="text-end">
                <button
                  type="button"
                  className="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div className="modal-body">
                <div className="text-center">
                  <img
                    src="/images/org-icon.svg"
                    className="img-fluid mb-3"
                    alt="create an account"
                  />
                </div>
                <h1 className="heading modal-heading text-center mb-3">
                  Which organization do you currently work for?
                </h1>
                <p className="mb-4 modal-text text-center">
                  Previous organization - UNILAG
                </p>

                <form>
                  <div className="mb-4">
                    <label className="form-label">Current organization</label>
                    <select
                      className="form-control form-control-height"
                      defaultValue=""
                    >
                      <option value="">Type or select an option</option>
                      <option value="">UNIBEN</option>
                    </select>
                  </div>
                  <div className="">
                    <button className="btn btn-size btn-main-primary w-100">
                      Send Request
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        {/* <!-- Modal --> */}
        <div
          className="modal fade"
          id="deleteModal"
          tabIndex="-1"
          aria-labelledby="deleteModalLabel"
          aria-hidden="true"
        >
          <div className="modal-dialog modal-dialog-centered">
            <div className="modal-content border-0 p-lg-4 p-3">
              <div className="text-end">
                <button
                  type="button"
                  className="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div className="modal-body">
                <div className="text-center">
                  <img
                    src="/images/delete-icon.svg"
                    className="img-fluid mb-3"
                    alt="delete an account"
                  />
                </div>
                <h1 className="heading modal-heading text-center mb-3">
                  Are you sure you want to delete your NDRS account?
                </h1>
                <p className="mb-4 modal-text text-center">
                  You will lose access to all disputes, documents,organizations
                  & discussions on your account.
                </p>

                <form>
                  <div className="mb-4">
                    <label className="form-label">Current password</label>
                    <input
                      type="password"
                      className="form-control form-control-height"
                      placeholder="Type your password"
                    />
                  </div>
                  <div className="">
                    <button className="btn btn-size btn-main-danger w-100">
                      Yes, Delete My Account
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        {/* <!-- Modal --> */}
        <div
          className="modal fade"
          id="deleteModal2"
          tabIndex="-1"
          aria-labelledby="deleteModalLabel"
          aria-hidden="true"
        >
          <div className="modal-dialog modal-dialog-centered">
            <div className="modal-content border-0 p-lg-4 p-3">
              <div className="text-end">
                <button
                  type="button"
                  className="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div className="modal-body">
                <div className="text-center">
                  <img
                    src="/images/delete-icon.svg"
                    className="img-fluid mb-3"
                    alt="delete an account"
                  />
                </div>
                <h1 className="heading modal-heading text-center mb-3">
                  Why are you requesting to delete “University of Lagos” ?
                </h1>
                <p className="mb-4 modal-text text-center">
                  You will lose access to all disputes, documents,organizations
                  & discussions associated with your organization if approved.
                </p>

                <form>
                  <div className="mb-4">
                    <label className="form-label">Reason for request</label>
                    <textarea
                      className="form-control"
                      rows="4"
                      placeholder="Type your reason"
                    ></textarea>
                  </div>
                  <div className="">
                    <button className="btn btn-size btn-main-danger w-100">
                      Send Delete Request
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        {/* <!-- Modal --> */}
        <div
          className="modal fade"
          id="passwordModal"
          tabIndex="-1"
          aria-labelledby="passwordModalLabel"
          aria-hidden="true"
        >
          <div className="modal-dialog modal-dialog-centered">
            <div className="modal-content border-0 p-lg-4 p-3">
              <div className="text-end">
                <button
                  type="button"
                  className="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div className="modal-body">
                <div className="text-center">
                  <img
                    src="/images/password.svg"
                    className="img-fluid mb-3"
                    alt="password"
                  />
                </div>
                <h1 className="heading text-center mb-3">
                  Create your account password
                </h1>
                <p className="mb-1 text-muted-2">
                  In order to <strong>protect your account</strong>, make sure
                  your password is
                </p>
                <ul className="text-muted-2">
                  <li>at least 8 characters</li>
                  <li>has alphabets, numbers & special characters</li>
                </ul>

                <form action="" method="post">
                  <div className="mb-3">
                    <label className="form-label">Current password</label>
                    <div className="input-group">
                      <input
                        type="password"
                        className="form-control border-end-0 form-control-height"
                        placeholder="Current password"
                      />
                      <span className="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                        <img src="/images/eye.svg" className="img-fluid" alt="" />
                      </span>
                    </div>
                  </div>
                  <div className="mb-3">
                    <label className="form-label">New password</label>
                    <div className="input-group">
                      <input
                        type="password"
                        className="form-control border-end-0 form-control-height"
                        placeholder="New password"
                      />
                      <span className="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                        <img src="/images/eye.svg" className="img-fluid" alt="" />
                      </span>
                    </div>
                  </div>
                  <div className="mb-3">
                    <label className="form-label">Re-enter New password</label>
                    <div className="input-group">
                      <input
                        type="password"
                        className="form-control border-end-0 form-control-height is-invalid"
                        placeholder="Re-enter password"
                      />
                      <span className="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                        <img src="/images/eye.svg" className="img-fluid" alt="" />
                      </span>
                      <div className="invalid-feedback">
                        Passwords do not match
                      </div>
                    </div>
                  </div>

                  <div className="mt-4">
                    <button className="btn btn-size btn-main-primary w-100">
                      Change password
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default Notifications;
