import React, { useEffect, useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import DiscussionInc from "../Bars/DiscussionInc";
import { Link, useParams } from "react-router-dom";
import Disputes from "./Disputes";
import { ClipLoader } from "react-spinners";
import toast from "react-hot-toast";

const DisputesDetails = () => {
  const baseUrl = "https://ndrs.ng/dev";
  const [getDisputes, setGetDisputes] = useState([]);
  const [getInvolvedParties, setGetInvolvedParties] = useState([]);
  const [getCaseDocuments, setGetCaseDocuments] = useState([]);
  const [disputeId, setDisputeId] = useState([]);
  const [roles, setRoles] = useState([]);
  const [sendMessage, setSendMessage] = useState({
    type: "",
    message: "",
  });
  const [isLoading, setIsLoading] = useState(true);
  const [user, setuser] = useState({
    permissions: [],
  });

  const [caseFolder, setcaseFolder] = useState({
    name: "",
  });

  const [casePermissions, setCasePermissions] = useState([]);

  const [changeStatus, setChangeStatus] = useState({
    status: "concilliation",
  });

  const [users, setUsers] = useState({
    email: "",
    role: "",
  });

  const [documentsUpload, setDocumentsUpload] = useState({
    documents: "",
    folder_id: "",
  });
  const [sidebar, setsidebar] = useState(true);

  const toggleSideBar = () => {
    setsidebar(!sidebar);
  };

  const { id } = useParams();

  useEffect(() => {
    fetchSingleDisputes(id);
    fetchDisputeInvolvedParties(id);
    fetchDisputeDocuments(id);
    fetchroles();
    fetchCasePermissions();
    fetchProfile();
  }, []);

  const onHandleChangeUser = (e) => {
    setUsers({ ...users, [e.target.name]: e.target.value });
  };

  const fetchroles = async () => {
    try {
      const res = await fetch(baseUrl + "/api/users/get-roles", {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setRoles(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const onHandleChange = (e) => {
    setGetDisputes({ ...getDisputes, [e.target.name]: e.target.value });
  };

  const fetchSingleDisputes = async (id) => {
    try {
      const res = await fetch(baseUrl + `/api/case/read/${id}`, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setGetDisputes(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    } finally {
      setIsLoading(false);
    }
  };

  const fetchDisputeInvolvedParties = async (id) => {
    try {
      const res = await fetch(baseUrl + `/api/case/involved-parties/${id}`, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setGetInvolvedParties(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const fetchDisputeDocuments = async (id) => {
    try {
      const res = await fetch(baseUrl + `/api/case/${id}/documents`, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      let result = data.data;
      setGetCaseDocuments(result);

      if (!result.length) {
        document
          .getElementById("document-not-found")
          .classList.remove("d-none");
      }
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const fetchProfile = async () => {
    try {
      const baseUrl = "https://ndrs.ng/dev";

      const res = await fetch(baseUrl + "/api/user-profile", {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
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

  const handleApproveCase = async (e, id) => {
    try {
      const res = await fetch(baseUrl + `/api/case/approve-case/${id}`, {
        method: "POST",
        headers: {
          "content-Type": "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify(changeStatus), // Pass FormData object as the body
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      fetchSingleDisputes(id);
      toast.success("Case has been Approved!");
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const handleInviteParty = async (e, id, roles, setRoles, users, setUsers) => {
    e.preventDefault();
    try {
      const res = await fetch(baseUrl + `/api/case/invite-party/${id}`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify(users),
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setUsers({
        email: "",
        role: "",
      });
      toast.success(data.message);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const onHandleChangeFolder = (e) => {
    setcaseFolder({ ...caseFolder, [e.target.name]: e.target.value });
  };

  const handleSubmitFolder = async (e, id, getDisputes, setGetDisputes) => {
    e.preventDefault();
    try {
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
      toast.success("Folder has been created!");
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  // const handleSendMessage = async (e, id) => {
  // 	e.preventDefault();
  // 	try {
  // 		const res = await fetch(baseUrl + `/api/case/discussions/${id}/send-message`, {
  // 			method: "POST",
  // 			headers: {
  // 				"Content-Type": "application/json",
  // 				Accept: "application/json",
  // 				Authorization: `Bearer ${localStorage.getItem("token")}`,
  // 			},
  // 			body: JSON.stringify(sendMessage),
  // 		});

  // 		if (!res.ok) {
  // 			throw new Error("Failed to fetch data."); // Handle failed request
  // 		}

  // 		const data = await res.json();
  // 		// setUsers({
  // 		// 	email: '',
  // 		// 	role: ''
  // 		// })
  // 		toast.success('message sent');
  // 	} catch (error) {
  // 		console.error("Error fetching data:", error.message);
  // 	}
  // };

  // const handleDocument = (e) => {
  // 	const file = e.target.files[0];
  // 	const formData = new FormData();
  // 	formData.append("file", file);

  // 	const image = URL.createObjectURL(file);
  // 	// setAvatarImage(image);

  // 	setDocumentsUpload((prevFormData) => ({
  // 		...prevFormData,
  // 		documents: file,
  // 	}));
  // };

  const handleSubmitDocuments = async (e, id, getDisputes, setGetDisputes) => {
    e.preventDefault();
    try {
      const response = await fetch(baseUrl + `/api/case/${id}/add-document`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify(documentsUpload),
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();
      toast.success("Document has been added!");
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  const fetchCasePermissions = async () => {
    try {
      const res = await fetch(baseUrl + `/api/case/permissions/${id}`, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setuser(data.data);
      setCasePermissions(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  getCaseDocuments.map((item) => {});

  return (
    <>
      <div className="main-admin-container bg-light dark-mode-active">
        <div className="d-flex flex-column flex-lg-row h-lg-100">
          {user.permissions && (
            <MainNavbarInc sidebar={sidebar} profileUser={user} />
          )}

          <div className="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">
            <TopBarInc toggleSideBar={toggleSideBar} />

            {isLoading ? (
              <div
                className="d-flex justify-content-center align-items-center"
                style={{ minHeight: "80vh" }}
              >
                <ClipLoader color="#36D7B7" loading={isLoading} size={50} />
              </div>
            ) : (
              <main className="admin-content">
                <div className="header-box py-5">
                  <div className="container">
                    <h2>
                      {getDisputes.case_no}{" "}
                      <img
                        src={getDisputes.status_img}
                        className="img-fluid"
                        alt="Conc"
                      />
                    </h2>
                    <p>{getDisputes.title}</p>
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
                                id="pills-details-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-details"
                                type="button"
                                role="tab"
                                aria-controls="pills-details"
                                aria-selected="true"
                              >
                                Case Details
                              </button>
                            </li>
                            {casePermissions &&
                              casePermissions.includes(
                                "participate in resolution"
                              ) && (
                                <>
                                  <li className="nav-item" role="presentation">
                                    <button
                                      className="nav-link"
                                      id="pills-discussion-tab"
                                      data-bs-toggle="pill"
                                      data-bs-target="#pills-discussion"
                                      type="button"
                                      role="tab"
                                      aria-controls="pills-discussion"
                                      aria-selected="false"
                                    >
                                      Case Discussions
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
                                      Case Documents
                                    </button>
                                  </li>
                                </>
                              )}

                            {casePermissions &&
                              casePermissions.includes(
                                "view dispute notifications"
                              ) && (
                                <li className="nav-item" role="presentation">
                                  <button
                                    className="nav-link"
                                    id="pills-notification-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-notification"
                                    type="button"
                                    role="tab"
                                    aria-controls="pills-notification"
                                    aria-selected="false"
                                  >
                                    Case Notifications
                                  </button>
                                </li>
                              )}
                          </ul>
                          <div className="tab-content" id="pills-tabContent">
                            <div
                              className="tab-pane fade show active"
                              id="pills-details"
                              role="tabpanel"
                              aria-labelledby="pills-details-tab"
                              tabindex="0"
                            >
                              <div className="row mt-5">
                                <div className="col-lg-2">
                                  <div
                                    className="nav flex-column tab-item nav-pills gap-10"
                                    id="v-pills-tab"
                                    role="tablist"
                                    aria-orientation="vertical"
                                  >
                                    <button
                                      className="nav-link tab-v text-start active"
                                      id="v-pills-overview-tab"
                                      data-bs-toggle="pill"
                                      data-bs-target="#v-pills-overview"
                                      type="button"
                                      role="tab"
                                      aria-controls="v-pills-overview"
                                      aria-selected="true"
                                    >
                                      Overview
                                    </button>

                                    {casePermissions &&
                                      casePermissions.includes(
                                        "invite dispute participants"
                                      ) && (
                                        <button
                                          className="nav-link tab-v text-start"
                                          id="v-pills-involved-tab"
                                          data-bs-toggle="pill"
                                          data-bs-target="#v-pills-involved"
                                          type="button"
                                          role="tab"
                                          aria-controls="v-pills-involved"
                                          aria-selected="false"
                                        >
                                          Involved parties
                                        </button>
                                      )}
                                  </div>
                                </div>
                                <div className="col-lg-9">
                                  <div
                                    className="tab-content"
                                    id="v-pills-tabContent"
                                  >
                                    <div
                                      className="tab-pane fade show active"
                                      id="v-pills-overview"
                                      role="tabpanel"
                                      aria-labelledby="v-pills-overview-tab"
                                      tabindex="0"
                                    >
                                      <div className="card mb-4">
                                        <div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                          <h3 className="mb-lg-0 mb-3">
                                            Overview
                                          </h3>
                                          {casePermissions &&
                                            casePermissions.includes(
                                              "approve dispute"
                                            ) && (
                                              <div className="d-flex align-items-center gap-15">
                                                <a
                                                  href="#"
                                                  className="btn btn-size btn-main-primary"
                                                  onClick={(e) =>
                                                    handleApproveCase(e, id)
                                                  }
                                                  disabled={
                                                    getDisputes.status !==
                                                    "case opened"
                                                  }
                                                >
                                                  Approve case
                                                </a>
                                              </div>
                                            )}
                                        </div>
                                        <div className="card-body p-4">
                                          <form>
                                            <div className="">
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Case ID
                                                </label>
                                                <input
                                                  type="text"
                                                  className="form-control form-control-height"
                                                  value={getDisputes.case_no}
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
                                                  value={getDisputes.title}
                                                  disabled
                                                />
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Dispute type
                                                </label>
                                                <input
                                                  type="text"
                                                  className="form-control form-control-height"
                                                  value={getDisputes.type}
                                                  disabled
                                                />
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Dispute status
                                                </label>
                                                <div>
                                                  <span className="text-muted-3"></span>{" "}
                                                  <img
                                                    src={getDisputes.status_img}
                                                    className="img-fluid"
                                                    alt=""
                                                  />
                                                </div>
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Filing date
                                                </label>
                                                <input
                                                  type="text"
                                                  className="form-control form-control-height"
                                                  value={
                                                    getDisputes.filling_date
                                                  }
                                                  disabled
                                                />
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Cause of dispute
                                                </label>
                                                <textarea
                                                  className="form-control"
                                                  rows="4"
                                                  value={getDisputes.summary}
                                                  disabled
                                                >
                                                  The University of Lagos,
                                                  popularly known as UNILAG, is
                                                  a public research university
                                                  located in Lagos, Nigeria and
                                                  was founded in 1962. UNILAG is
                                                  one of the first generation
                                                  universities in Nigeria and is
                                                  ranked among the top
                                                  universities in the country in
                                                  major education publications.
                                                </textarea>
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Relief Sought
                                                </label>
                                                <textarea
                                                  className="form-control"
                                                  rows="4"
                                                  value={
                                                    getDisputes.relief_sought
                                                  }
                                                  disabled
                                                >
                                                  1. Declare a specific measure
                                                  (e.g., import ban) violates
                                                  trade rules.2. Withdraw the
                                                  measure or bring it into
                                                  compliance with agreements.3.
                                                  Compensate for damages caused
                                                  by the measure.
                                                </textarea>
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Settlement Offers
                                                </label>
                                                <textarea
                                                  className="form-control"
                                                  rows="4"
                                                  value=""
                                                  disabled
                                                >
                                                  {" "}
                                                  1. Declare a specific measure
                                                  (e.g., import ban) violates
                                                  trade rules.2. Withdraw the
                                                  measure or bring it into
                                                  compliance with agreements.3.
                                                  Compensate for damages caused
                                                  by the measure.
                                                </textarea>
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Awards & Rulings
                                                </label>
                                                <textarea
                                                  className="form-control"
                                                  rows="4"
                                                  value=""
                                                  disabled
                                                >
                                                  {" "}
                                                  1. Declare a specific measure
                                                  (e.g., import ban) violates
                                                  trade rules.2. Withdraw the
                                                  measure or bring it into
                                                  compliance with agreements.
                                                </textarea>
                                              </div>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>

                                    {casePermissions &&
                                      casePermissions.includes(
                                        "invite dispute participants"
                                      ) && (
                                        <div
                                          className="tab-pane fade"
                                          id="v-pills-involved"
                                          role="tabpanel"
                                          aria-labelledby="v-pills-involved-tab"
                                          tabindex="0"
                                        >
                                          <div className="card mb-4">
                                            <div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                              <h3 className="mb-lg-0 mb-3">
                                                Involved parties
                                              </h3>
                                              <div className="d-flex align-items-center gap-15">
                                                <a
                                                  href="#"
                                                  className="btn btn-size btn-main-primary"
                                                  data-bs-toggle="modal"
                                                  data-bs-target="#inviteModal"
                                                >
                                                  Invite Parties
                                                </a>
                                              </div>
                                            </div>
                                            <div className="card-body p-4">
                                              {getInvolvedParties.length ? (
                                                getInvolvedParties.map(
                                                  (item, key) => (
                                                    <div className="py-4">
                                                      <h4 className="heading-4 mb-4">
                                                        {item.role_name}
                                                      </h4>

                                                      <table className="table table-list">
                                                        <thead className="table-light">
                                                          <tr>
                                                            <th scope="col">
                                                              Name
                                                            </th>
                                                            <th scope="col">
                                                              Joined
                                                            </th>
                                                            <th scope="col">
                                                              Role
                                                            </th>
                                                            <th scope="col"></th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          {item.invited_users.map(
                                                            (user, index) => (
                                                              <tr>
                                                                <td scope="row">
                                                                  <div className="d-flex avatar-holder">
                                                                    <div className="position-relative">
                                                                      <div className="avatar-sm flex-shrink-0">
                                                                        {user.display_picture ? (
                                                                          <img
                                                                            src={
                                                                              user.display_picture
                                                                            }
                                                                            className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                                            alt="Avatar"
                                                                          />
                                                                        ) : (
                                                                          <img
                                                                            src="/images/download.png"
                                                                            className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                                            alt="Avatar"
                                                                          />
                                                                        )}
                                                                      </div>
                                                                    </div>
                                                                    <div className="ms-2 flex-grow-1">
                                                                      <h5 className="mb-0">
                                                                        {
                                                                          user.name
                                                                        }
                                                                      </h5>
                                                                      <p className="mb-0 text-muted-3">
                                                                        {
                                                                          user.email
                                                                        }
                                                                      </p>
                                                                    </div>
                                                                  </div>
                                                                </td>
                                                                <td>
                                                                  {user.status ===
                                                                  "pending"
                                                                    ? "Pending"
                                                                    : user.joined}
                                                                </td>
                                                                <td>
                                                                  <h6 className="text-muted">
                                                                    {
                                                                      item.role_name
                                                                    }
                                                                  </h6>
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
                                                                      <li>
                                                                        <a
                                                                          className="dropdown-item"
                                                                          href="javascript:void(0);"
                                                                        >
                                                                          View
                                                                          details
                                                                        </a>
                                                                      </li>
                                                                    </ul>
                                                                  </div>
                                                                </td>
                                                              </tr>
                                                            )
                                                          )}
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                  )
                                                )
                                              ) : (
                                                <div className="card no-admin-card rounded-0">
                                                  <div className="card-body d-flex align-items-center justify-content-center">
                                                    <div className="text-center">
                                                      <h4 className="">
                                                        No admins found
                                                      </h4>
                                                      <p className="text-muted-3">
                                                        Enter an admins email
                                                        and role to send invite
                                                      </p>
                                                      <div className="text-center">
                                                        <img
                                                          src="/images/no-found.svg"
                                                          className="img-fluid"
                                                          alt=""
                                                        />
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              )}
                                            </div>
                                          </div>
                                        </div>
                                      )}
                                  </div>
                                </div>
                              </div>
                            </div>

                            {casePermissions &&
                              casePermissions.includes(
                                "participate in resolution"
                              ) && (
                                <>
                                  <div
                                    className="tab-pane fade"
                                    id="pills-discussion"
                                    role="tabpanel"
                                    aria-labelledby="pills-discussion-tab"
                                    tabindex="0"
                                  >
                                    <DiscussionInc dispute_id={id} />
                                  </div>

                                  <div
                                    className="tab-pane fade"
                                    id="pills-document"
                                    role="tabpanel"
                                    aria-labelledby="pills-document-tab"
                                    tabindex="0"
                                  >
                                    <div className="row mt-5">
                                      <div className="col-lg-10">
                                        <div className="card mb-4">
                                          <div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                            <h3 className="mb-lg-0 mb-3">
                                              {getDisputes.case_no} Documents
                                            </h3>
                                            <div className="d-flex align-items-center gap-15">
                                              {/* <Link to={`/disputes2/${id}`} style={{ textDecoration: "none" }}>
																														<button className="btn btn-size btn-main-primary" type="button">
																															Create Document
																														</button>
																													</Link> */}
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
                                                    <Link
                                                      className="dropdown-item"
                                                      to="#"
                                                    >
                                                      A-Z
                                                    </Link>
                                                  </li>
                                                  <li>
                                                    <Link
                                                      className="dropdown-item"
                                                      to="#"
                                                    >
                                                      Most Recent
                                                    </Link>
                                                  </li>
                                                  <li>
                                                    <Link
                                                      className="dropdown-item"
                                                      to="#"
                                                    >
                                                      Oldest
                                                    </Link>
                                                  </li>
                                                </ul>
                                              </div>
                                            </div>
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
                                                      src="/images/filter.svg"
                                                      className="img-fluid me-2"
                                                      alt=""
                                                    />{" "}
                                                    A-Z
                                                  </a>
                                                  <p className="text-end mb-0 file-count">
                                                    Files:{" "}
                                                    {getCaseDocuments.length}
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
                                                      <th scope="col">
                                                        File Type
                                                      </th>
                                                      <th scope="col">
                                                        Last Modified
                                                      </th>
                                                      <th scope="col">
                                                        Actions
                                                      </th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    {getCaseDocuments.length ? (
                                                      getCaseDocuments.map(
                                                        (item) => (
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
                                                                {item.name}
                                                              </div>
                                                            </td>
                                                            <td>{item.size}</td>
                                                            <td>{item.type}</td>
                                                            <td>
                                                              {
                                                                item.last_modified
                                                              }
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
                                                        )
                                                      )
                                                    ) : (
                                                      <tr>
                                                        <td
                                                          id="document-not-found"
                                                          colSpan={6}
                                                          className={`text-center d-none`}
                                                        >
                                                          <p>
                                                            <i className="fa fa-triangle-exclamation fa-2x text-warning"></i>
                                                          </p>
                                                          <p className="h5">
                                                            No document found
                                                          </p>
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
                                </>
                              )}

                            {casePermissions &&
                              casePermissions.includes(
                                "view dispute notifications"
                              ) && (
                                <div
                                  className="tab-pane fade"
                                  id="pills-notification"
                                  role="tabpanel"
                                  aria-labelledby="pills-notification-tab"
                                  tabindex="0"
                                >
                                  Pending
                                </div>
                              )}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </main>
            )}

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
        id="inviteModal"
        tabindex="-1"
        aria-labelledby="inviteModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-lg">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header">
              <h1 className="modal-title fs-5">Send invites</h1>
              <button
                type="button"
                className="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div className="modal-body">
              <div className="row my-4">
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
                      placeholder="Type an email to send an invite"
                      name="email"
                      onChange={onHandleChangeUser}
                      value={users.email}
                    />
                  </div>
                </div>

                <div className="col-lg-5">
                  <div className="d-flex align-items-center justify-content-between gap-15">
                    <select
                      className="form-control form-control-height w-50"
                      name="role"
                      onChange={onHandleChangeUser}
                    >
                      <option value={users.role} disabled selected hidden>
                        Select role
                      </option>
                      {roles.map((role) => (
                        <option key={role._id} value={role._id}>
                          {role.name}
                        </option>
                      ))}
                    </select>

                    <a
                      href="javascript:void(0);"
                      className="btn btn-size btn-main-primary"
                      onClick={(e) =>
                        handleInviteParty(
                          e,
                          id,
                          roles,
                          setRoles,
                          users,
                          setUsers
                        )
                      }
                    >
                      Send Invite
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* modal */}
      <div
        className="modal fade"
        id="documentModal"
        tabIndex="-1"
        aria-labelledby="folderModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered">
          <div className="card mb-4">
            <div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
              <h3 className="mb-lg-0 mb-3">Upload Supporting Documents</h3>
              <div className="d-flex align-items-center gap-15">
                <a href="/Disputes" className="btn-flat text-main-primary">
                  Back
                </a>
                <button className="btn btn-size btn-main-primary submit-dispute">
                  Submit
                </button>
              </div>
            </div>

            <div className="card-body p-4">
              <label for="add_doc">
                <input
                  type="file"
                  name="add_doc"
                  id="add_doc"
                  className="d-none"
                  // name="documents"
                  // onChange={handleDocument}
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
                      alt=""
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
                    <img
                      src="/images/pdf-icon.svg"
                      className="img-fluid"
                      alt=""
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
                      src="/images/pdf-icon.svg"
                      className="img-fluid"
                      alt=""
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
                      src="/images/pdf-icon.svg"
                      className="img-fluid"
                      alt=""
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
                      alt=""
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

      {/* modal */}
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
                  href=""
                  className="btn btn-main-primary btn-size px-3"
                  onClick={(e) =>
                    handleSubmitFolder(e, id, getDisputes, setGetDisputes)
                  }
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
                    onChange={onHandleChangeFolder}
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

export default DisputesDetails;
