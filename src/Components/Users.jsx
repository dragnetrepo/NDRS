import React, { useEffect, useRef, useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import toast from "react-hot-toast";
import { ClipLoader } from "react-spinners";


const Users = () => {
  const [roles, setRoles] = useState([]);
  const [getBoardOfEnquire, setGetBoardOfEnquire] = useState([]);
  const [getDisputes, setGetDisputes] = useState([]);
  const [isChecked, setIsChecked] = useState(false);
  const [isLoading, setIsLoading] = useState(true);
  // const [bulkUpload, setBulkUpload] = useState({
  //   file: "",
  // });
  const [users, setUsers] = useState({
    email: "",
    role: "",
    case_id: "",
  });
  const [uploadStatus, setUploadStatus] = useState(null);

  const [boardOfEnquire, setboardOfEnquire] = useState({
    name: "",
  });
  const [customRole, setcustomRole] = useState({
    name: "",
  });
  const [sidebar, setsidebar] = useState(true)

  const toggleSideBar = () => {
    setsidebar(!sidebar)
  }


  const fileInputRef = useRef(null);

  const handleButtonClick = () => {
    fileInputRef.current.click();
  };
  const CheckboxChange = (event) => {
    setIsChecked(event.target.checked);
  };

  const handleFileChange = async (event) => {
    const file = event.target.files[0];
    if (file && file.type === "text/csv") {
      const formData = new FormData();
      formData.append("file", file);

      try {
        const baseUrl =
          "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
        const response = await fetch(baseUrl + "/api/users/bulk/send-invite", {
          headers: {
            Authorization: `Bearer ${localStorage.getItem("token")}`,
          },
          method: "POST",
          body: formData,
        });

        if (response.ok) {
          setUploadStatus("Upload successful!");
          const result = await response.json();
          toast.success("users have been uploaded succesfully!");
        } else {
          setUploadStatus("Upload failed.");
          toast.error("Failed to upload users!");
          console.error("Upload error:", response.statusText);
        }
      } catch (error) {
        setUploadStatus("Upload failed.");

        console.error("Upload error:", error);
      }

      fileInputRef.current.value = "";
    } else {
      alert("Please upload a valid CSV file.");
    }
  };

  useEffect(() => {
    fetchBoardOfEnquires();
    fetchDisputes();
  }, []);

  const onHandleChangeUser = (e) => {
    setUsers({ ...users, [e.target.name]: e.target.value });
  };

  const fetchBoardOfEnquires = async () => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in.");
      }

      const res = await fetch(baseUrl + "/api/users/get-board-of-enquiries", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setGetBoardOfEnquire(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const handleDissolve = async (
    e,
    id,
    getBoardOfEnquire,
    setGetBoardOfEnquire
  ) => {
    e.preventDefault();

    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(
        baseUrl + `/api/users/dissolve-board-of-enquiry/${id}`,
        {
          method: "DELETE",
          headers: {
            Authorization: `Bearer ${localStorage.getItem("token")}`,
          },
        }
      );

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();
      // setGetBoardOfEnquire((prevUnionsList) =>
      //   prevUnionsList.filter((boardOfEnquire) => boardOfEnquire._id !== id)
      // );
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  const handleDownload = async () => {
    try {
      const response = await fetch(
        "https://phpstack-1245936-4460801.cloudwaysapps.com/dev/api/users/sample-csv",
        {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${localStorage.getItem("token")}`,
          },
        }
      );

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();
      // const url = window.URL.createObjectURL(blob);
      const a = document.createElement("a");
      a.href = data.data.sample_csv;
      a.download = data.data.sample_csv; // Specify the file name
      document.body.appendChild(a);
      a.click();
      a.remove(); // Clean up and remove the element
      // console.log(url);
      // Optional: Revoke the object URL after some delay
      // setTimeout(() => window.URL.revokeObjectURL(url), 100);
    } catch (error) {
      console.error("Error downloading the file:", error);
    }
  };

  const handleSubmitUser = async (e) => {
    e.preventDefault();

    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + "/api/users/send-invite", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify(users), // Pass FormData object as the body
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");

      }

      const data = await response.json();


      toast.success("User Invite has been sent!");
      setUsers({
        email: "",
        role: "",
        case_id: "",
      })
    } catch (error) {
      console.error("Error fetching data:", error);
      toast.error('Email has already been used or invalid Email!')
    }
  };

  const onHandleChange = (e) => {
    setboardOfEnquire({ ...boardOfEnquire, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(
        baseUrl + "/api/users/create-board-of-enquiry",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            Authorization: `Bearer ${localStorage.getItem("token")}`,
          },
          body: JSON.stringify(boardOfEnquire), // Pass FormData object as the body
        }
      );

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }


      const data = await response.json();

      toast.success("Board of Enquire has been created successfully!");
      setboardOfEnquire({
        name: ''
      })
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  useEffect(() => {
    fetchdata();
  }, []);

  const fetchdata = async () => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";

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
    finally {
      setIsLoading(false)
    }
  };

  const onHandleCustomRole = (e) => {
    setcustomRole({ ...customRole, [e.target.name]: e.target.value });
  };

  const CreateCustomRole = async (e) => {
    e.preventDefault();

    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + "/api/users/create-role", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify(customRole), // Pass FormData object as the body
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      fetchdata()
      const data = await response.json();
      setcustomRole({
        name: ''
      })

      // window.location.reload();
      toast.success("custom role has been created!");
    } catch (error) {
      console.error("Error fetching data:", error);
    }
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
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const updatePermission = async (
    roleId,
    permissionId,
    hasPermission,
    roleIndex,
    category,
    permissionIndex
  ) => {

    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const res = await fetch(baseUrl + "/api/users/update-permission", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify({
          role_id: roleId,
          permission_id: permissionId,
        }),
      });

      if (!res.ok) {
        const errorData = await res.json();
        console.error("API Error:", errorData.message);
        throw new Error(errorData.message);
      }

      const data = await res.json();

      // If API call is successful, update state
      setRoles((prevRoles) => {
        const newRoles = [...prevRoles];
        newRoles[roleIndex].permissions[category][
          permissionIndex
        ].has_permission = hasPermission;
        return newRoles;
      });
    } catch (error) {
      console.error("Error updating permission:", error.message);

      // If error occurs, revert the UI change
      setRoles((prevRoles) => {
        const newRoles = [...prevRoles];
        newRoles[roleIndex].permissions[category][
          permissionIndex
        ].has_permission = hasPermission ? 0 : 1;
        return newRoles;
      });
    }
  };

  // Handle checkbox change and update state
  const handleCheckboxChange = (roleIndex, category, permissionIndex) => {
    const permission = roles[roleIndex].permissions[category][permissionIndex];
    const newPermissionStatus = permission.has_permission ? 0 : 1;

    // Optimistically update UI
    setRoles((prevRoles) => {
      const newRoles = [...prevRoles];
      newRoles[roleIndex].permissions[category][
        permissionIndex
      ].has_permission = newPermissionStatus;
      return newRoles;
    });

    // Call API to update permission
    updatePermission(
      roles[roleIndex]._id,
      permission._id,
      newPermissionStatus,
      roleIndex,
      category,
      permissionIndex
    );
  };

  const restoreDefault = async (e, role_id, roles, setRoles) => {
    e.preventDefault();

    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(
        baseUrl + "/api/users/restore-role-default",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            Authorization: `Bearer ${localStorage.getItem("token")}`,
          },
          body: JSON.stringify({ role_id: role_id }),
        }
      );

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();
      // setRoles(data);
      window.location.reload();
      toast.success("Roles has been restored to default!");
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  // const [selectedStatus, setSelectedStatus] = useState("");

  const handleStatusChange = (e) => {
    const status = e.target.id;
    changeStatus(status);
  };

  const changeStatus = async (e, id, status) => {
    e.preventDefault();

    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + `/api/users/change-status/${id}`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify({ status }),
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();


      // toast.success("Roles has been restored to default!");
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  return (
    <>
      <div className="main-admin-container bg-light dark-mode-active">
        <div className="d-flex flex-column flex-lg-row h-lg-100">

          <MainNavbarInc sidebar={sidebar} />

          <div className="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">

            <TopBarInc toggleSideBar={toggleSideBar} />

            <main className="admin-content">
              <div className="header-box py-5">
                <div className="container">
                  <h2>Users & Groups </h2>
                </div>
              </div>

              <div className="content-main">
                <div className="container">
                  <div className="row">
                    <div className="col-lg-12">
                      <div className="margin-top-negative">
                        <ul className="nav custom-tab nav-underline mb-3" id="pills-tab" role="tablist">
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link active"
                              id="pills-invite-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-invite"
                              type="button"
                              role="tab"
                              aria-controls="pills-invite"
                              aria-selected="true"
                            >
                              Invite
                            </button>
                          </li>
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link"
                              id="pills-individual-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-individual"
                              type="button"
                              role="tab"
                              aria-controls="pills-individual"
                              aria-selected="false"
                            >
                              All Individual Users
                            </button>
                          </li>
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link"
                              id="pills-claimants-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-claimants"
                              type="button"
                              role="tab"
                              aria-controls="pills-claimants"
                              aria-selected="false"
                            >
                              Admins & Claimants
                            </button>
                          </li>
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link"
                              id="pills-settlement-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-settlement"
                              type="button"
                              role="tab"
                              aria-controls="pills-settlement"
                              aria-selected="false"
                            >
                              Settlement Management Bodies
                            </button>
                          </li>
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link"
                              id="pills-role-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-role"
                              type="button"
                              role="tab"
                              aria-controls="pills-role"
                              aria-selected="false"
                            >
                              Roles & Permissions
                            </button>
                          </li>
                        </ul>
                        <div className="tab-content" id="pills-tabContent">
                          <div
                            className="tab-pane fade show active"
                            id="pills-invite"
                            role="tabpanel"
                            aria-labelledby="pills-invite-tab"
                            tabIndex="0"
                          >
                            <div className="row mt-5">
                              <div className="col-lg-3">
                                <div
                                  className="nav flex-column tab-item nav-pills gap-10"
                                  id="v-pills-tab"
                                  role="tablist"
                                  aria-orientation="vertical"
                                >
                                  <button
                                    className="nav-link tab-v text-start active"
                                    id="v-pills-bulk-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-bulk"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-bulk"
                                    aria-selected="true"
                                  >
                                    Bulk User/ Group invite
                                  </button>

                                  <button
                                    className="nav-link tab-v text-start"
                                    id="v-pills-single-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-single"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-single"
                                    aria-selected="false"
                                  >
                                    Single User/ Group invite
                                  </button>
                                </div>
                              </div>

                              <div className="col-lg-9">
                                <div
                                  className="tab-content"
                                  id="v-pills-tabContent"
                                >
                                  <div
                                    className="tab-pane fade show active"
                                    id="v-pills-bulk"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-bulk-tab"
                                    tabIndex="0"
                                  >
                                    <div className="card mb-4">
                                      <div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                        <h3 className="mb-lg-0 mb-3">
                                          Bulk Invites
                                        </h3>
                                      </div>
                                      <div className="card-body p-4">
                                        <div className="row mb-4">
                                          <div className="col-lg-5 mb-lg-0 mb-3">
                                            <h6 className="step-text">
                                              Step 1.
                                            </h6>
                                            <p className="text-muted-3">
                                              Download the CSV template for any
                                              user type or settlement bodies
                                            </p>
                                          </div>
                                          <div className="col-lg-5 offset-lg-2">
                                            <button
                                              className="btn btn-main-outline-primary btn-size"
                                              onClick={handleDownload}
                                            >
                                              Download CSV template
                                            </button>
                                          </div>
                                        </div>

                                        <div className="row mb-4">
                                          <div className="col-lg-5 mb-lg-0 mb-3">
                                            <h6 className="step-text">
                                              Step 2.
                                            </h6>
                                            <p className="text-muted-3">
                                              Fill in the users details into the
                                              CSV file
                                            </p>
                                          </div>
                                          <div className="col-lg-5 offset-lg-2">
                                            <img
                                              src="/images/csv.png"
                                              className="img-fluid" alt=""
                                            />
                                          </div>
                                        </div>

                                        <div className="row mb-4">
                                          <div className="col-lg-5 mb-lg-0 mb-3">
                                            <h6 className="step-text">
                                              Step 3.
                                            </h6>
                                            <p className="text-muted-3">
                                              Upload the filled CSV file
                                            </p>
                                          </div>
                                          <div className="col-lg-5 offset-lg-2">
                                            <div className="upload-box text-center px-3 py-4">
                                              <div className="text-center mb-2">
                                                <img
                                                  src="/images/file_upload_states.svg"
                                                  className="img-fluid" alt=""
                                                />
                                              </div>
                                              <p className="text-muted-3 mb-1">
                                                Drag and drop to upload
                                              </p>
                                              <p className="font-sm text-muted">
                                                CSV (max. 50mb)
                                              </p>

                                              <img
                                                src="/images/or-line.svg"
                                                className="img-fluid" alt=""
                                              />

                                              <div className="mt-3">
                                                <input
                                                  type="file"
                                                  id="profile"
                                                  ref={fileInputRef}
                                                  style={{
                                                    visibility: "hidden",
                                                    height: "0",
                                                  }}
                                                  onChange={handleFileChange}
                                                />
                                                <button
                                                  className="btn btn-main-primary btn-size mx-auto"
                                                  onClick={handleButtonClick}
                                                >
                                                  <i className="bi bi-upload me-2"></i>{" "}
                                                  Upload filled CSV
                                                </button>
                                              </div>
                                            </div>
                                            {/* <div className="upload-box upload-box-success text-center px-3 py-4">
                                              <div className="text-center mb-2">
                                                <img
                                                  src="/images/uploaded.svg"
                                                   className="img-fluid" alt=""
                                                />
                                              </div>
                                              <p className="text-dark text-medium mb-1">
                                                Ministry Admins
                                              </p>
                                              <p className="font-sm text-muted">
                                                CSV 2.63mb
                                              </p>

                                              <p className="text-medium">
                                                <a
                                                  href="#"
                                                  data-bs-toggle="modal"
                                                  data-bs-target="#previewModal"
                                                  className="text-decoration-none text-main-primary"
                                                >
                                                  <img
                                                    src="/images/eyes.svg"
                                                     className="img-fluid" alt=""
                                                  />{" "}
                                                  Preview Sent Invites
                                                </a>
                                              </p>

                                              <p className="text-medium">
                                                <a
                                                  href="#"
                                                  className="text-decoration-none text-muted-3"
                                                >
                                                  <img
                                                    src="/images/trash-bin.svg"
                                                     className="img-fluid" alt=""
                                                  />{" "}
                                                  Clear Upload
                                                </a>
                                              </p>
                                            </div> */}
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div
                                    className="tab-pane fade"
                                    id="v-pills-single"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-single-tab"
                                    tabIndex="0"
                                  >
                                    <div className="card mb-4">
                                      <div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                        <h3 className="mb-lg-0 mb-3">
                                          Single Invite
                                        </h3>

                                        <a
                                          href=""
                                          className="btn btn-size btn-main-primary"
                                          onClick={handleSubmitUser}
                                        >
                                          Send Invite
                                        </a>
                                      </div>
                                      <div className="card-body p-4">
                                        <form>
                                          <div className="row mt-4">
                                            <div className="col-lg-12">
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  User’s email
                                                </label>
                                                <input
                                                  type="email"
                                                  className="form-control form-control-height"
                                                  name="email"
                                                  placeholder="Enter User’s email"
                                                  value={users.email}
                                                  onChange={onHandleChangeUser}
                                                />
                                              </div>

                                              <div className="mb-4">
                                                <label className="form-label">
                                                  User’s role
                                                </label>
                                                <select
                                                  className="form-select form-control-height"
                                                  name="role"
                                                  onChange={onHandleChangeUser}
                                                  value={users.role}
                                                >
                                                  <option>
                                                    Type or select a user type
                                                  </option>
                                                  {roles.map((role) => (
                                                    <option
                                                      key={role._id}
                                                      value={role._id}
                                                    >
                                                      {role.name}
                                                    </option>
                                                  ))}
                                                </select>
                                              </div>

                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Invite to a dispute case{" "}
                                                  <span className="text-muted-3">
                                                    (optional)
                                                  </span>
                                                </label>
                                                <select
                                                  className="form-select form-control-height"
                                                  name="case_id"
                                                  onChange={onHandleChangeUser}
                                                  value={users.case_id}
                                                >
                                                  <option>
                                                    Type or select a dispute
                                                    case
                                                  </option>
                                                  {getDisputes.map(
                                                    (dispute) => (
                                                      <option
                                                        key={dispute._id}
                                                        value={dispute._id}
                                                      >
                                                        {dispute.case_no}
                                                      </option>
                                                    )
                                                  )}
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div
                            className="tab-pane fade"
                            id="pills-individual"
                            role="tabpanel"
                            aria-labelledby="pills-individual-tab"
                            tabIndex="0"
                          >
                            <div className="row mt-5">
                              <div className="col-lg-3">
                                <div
                                  className="nav flex-column tab-item nav-pills gap-10"
                                  id="v-pills-tab"
                                  role="tablist"
                                  aria-orientation="vertical"
                                >
                                  <button
                                    className="nav-link tab-v text-start active"
                                    id="v-pills-ministry-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-ministry"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-ministry"
                                    aria-selected="true"
                                  >
                                    Ministry Admins
                                  </button>

                                  <button
                                    className="nav-link tab-v text-start"
                                    id="v-pills-national-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-national"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-national"
                                    aria-selected="false"
                                  >
                                    National Union Admins
                                  </button>

                                  <button
                                    className="nav-link tab-v text-start"
                                    id="v-pills-branch-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-branch"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-branch"
                                    aria-selected="false"
                                  >
                                    Union Branch Admins
                                  </button>

                                  <button
                                    className="nav-link tab-v text-start"
                                    id="v-pills-employers-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-employers"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-employers"
                                    aria-selected="false"
                                  >
                                    Employers{" "}
                                  </button>

                                  <button
                                    className="nav-link tab-v text-start"
                                    id="v-pills-staff-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-staff"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-staff"
                                    aria-selected="false"
                                  >
                                    Staff (Employees)
                                  </button>

                                  <button
                                    className="nav-link tab-v text-start"
                                    id="v-pills-nonstaff-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-nonstaff"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-nonstaff"
                                    aria-selected="false"
                                  >
                                    Non Union Members
                                  </button>
                                </div>
                              </div>

                              <div className="col-lg-9">
                                <div
                                  className="tab-content"
                                  id="v-pills-tabContent"
                                >
                                  <div
                                    className="tab-pane fade show active"
                                    id="v-pills-ministry"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-ministry-tab"
                                    tabIndex="0"
                                  >
                                    <div className="card mb-4">
                                      <div className="card-body p-4">
                                        <div className="row mt-2 mb-4">
                                          <div className="col-lg-5">
                                            <div className="input-group">
                                              <span className="input-group-text bg-transparent">
                                                <img
                                                  src="/images/search.svg"
                                                  className="img-fluid" alt=""
                                                />
                                              </span>
                                              <input
                                                type="search"
                                                className="form-control border-start-0 form-control-height"
                                                placeholder="Search here..."
                                              />
                                            </div>
                                          </div>

                                          <div className="col-lg-7">
                                            <div className="d-flex align-items-center justify-content-between gap-15">
                                              <div className="d-flex">
                                                <a className="btn btn-size btn-outline-light text-medium px-3 me-lg-3">
                                                  <img
                                                    src="/images/filter.svg"
                                                    className="img-fluid" alt=""
                                                  />{" "}
                                                  A-Z
                                                </a>

                                                <button className="btn btn-size btn-main-outline-primary px-3">
                                                  <i className="bi bi-cloud-download me-2"></i>{" "}
                                                  Export CSV
                                                </button>
                                              </div>

                                              <p className="text-end mb-0 file-count">
                                                Ministry Admins: 64
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
                                                  <th scope="col">
                                                    Ministry Admins
                                                  </th>
                                                  <th scope="col">
                                                    Assigned Cases
                                                  </th>
                                                  <th scope="col">Status</th>
                                                  <th scope="col">
                                                    Date added
                                                  </th>
                                                  <th scope="col">Actions</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                {/* <tr>
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
                                                    <div className="d-flex align-items-center avatar-holder">
                                                      <div className="position-relative">
                                                        <div className="avatar-sm flex-shrink-0">
                                                          <img
                                                            src="/images/user-photo.svg"
                                                            className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                            alt="Avatar"
                                                          />
                                                        </div>
                                                      </div>
                                                      <div className="ms-2 flex-grow-1">
                                                        <div className="d-flex justify-content-between align-items-center mb-2">
                                                          <div className="mb-0 d-flex align-items-center">
                                                            <div className="heading-text text-truncate max-150">
                                                              Bala Abdulkareem
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>12</td>
                                                  <td>
                                                    <img
                                                      src="/images/active.svg"
                                                       className="img-fluid" alt=""
                                                    />
                                                  </td>
                                                  <td>Feb 4 2023</td>
                                                  <td>
                                                    <div className="dropdown">
                                                      <button
                                                        className="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret"
                                                        type="button"
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false"
                                                        data-bs-auto-close="outside"
                                                      >
                                                        <img
                                                          src="/images/dots-v.svg"
                                                           className="img-fluid" alt=""
                                                          alt="dots"
                                                        />
                                                      </button>
                                                      <ul className="dropdown-menu border-radius action-menu-2">
                                                        <li>
                                                          <a
                                                            className="dropdown-item"
                                                            href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#disputeModal"
                                                          >
                                                            Refer to Dispute
                                                            Case
                                                          </a>
                                                        </li>
                                                        <li>
                                                          <a
                                                            className="dropdown-item"
                                                            href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#permissionModal2"
                                                          >
                                                            Edit permission
                                                            level
                                                          </a>
                                                        </li>
                                                        <li>
                                                          <a
                                                            href="view-members.php"
                                                            className="dropdown-item"
                                                          >
                                                            View Members
                                                          </a>
                                                        </li>
                                                        <li>
                                                          <a
                                                            href=""
                                                            className="dropdown-item"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#dissolveModal"
                                                          >
                                                            Dissolve Board{" "}
                                                          </a>
                                                        </li>
                                                        <li>
                                                          <a
                                                            className="dropdown-item d-flex align-items-center justify-content-between"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseStatus"
                                                            aria-expanded="false"
                                                            aria-controls="collapseStatus"
                                                          >
                                                            Change Status{" "}
                                                            <i className="bi bi-chevron-down"></i>
                                                          </a>
                                                        </li>
                                                        <div
                                                          className="collapse"
                                                          id="collapseStatus"
                                                        >
                                                          <ul className="list-unstyled">
                                                            <li>
                                                              <a
                                                                className="dropdown-item"
                                                                href="#"
                                                              >
                                                                <div className="form-check">
                                                                  <input
                                                                    className="form-check-input"
                                                                    type="radio"
                                                                    name="flexRadioDefault"
                                                                    id="active"
                                                                  />
                                                                  <label
                                                                    className="form-check-label"
                                                                    htmlFor="active"
                                                                  >
                                                                    Active
                                                                  </label>
                                                                </div>
                                                              </a>
                                                            </li>
                                                            <li>
                                                              <a
                                                                className="dropdown-item"
                                                                href="#"
                                                              >
                                                                <div className="form-check">
                                                                  <input
                                                                    className="form-check-input"
                                                                    type="radio"
                                                                    name="flexRadioDefault"
                                                                    id="suspended"
                                                                  />
                                                                  <label
                                                                    className="form-check-label"
                                                                    htmlFor="suspended"
                                                                  >
                                                                    Suspended
                                                                  </label>
                                                                </div>
                                                              </a>
                                                            </li>
                                                            <li>
                                                              <a
                                                                className="dropdown-item"
                                                                href="#"
                                                              >
                                                                <div className="form-check">
                                                                  <input
                                                                    className="form-check-input"
                                                                    type="radio"
                                                                    name="flexRadioDefault"
                                                                    id="deactivated"
                                                                  />
                                                                  <label
                                                                    className="form-check-label"
                                                                    htmlFor="deactivated"
                                                                  >
                                                                    Deactivated
                                                                  </label>
                                                                </div>
                                                              </a>
                                                            </li>
                                                            <li>
                                                              <a
                                                                className="dropdown-item"
                                                                href="#"
                                                              >
                                                                <div className="form-check">
                                                                  <input
                                                                    className="form-check-input"
                                                                    type="radio"
                                                                    name="flexRadioDefault"
                                                                    id="pending"
                                                                  />
                                                                  <label
                                                                    className="form-check-label"
                                                                    htmlFor="pending"
                                                                  >
                                                                    Pending
                                                                  </label>
                                                                </div>
                                                              </a>
                                                            </li>
                                                          </ul>
                                                        </div>
                                                        <li>
                                                          <h6 className="dropdown-header">
                                                            Change Status
                                                          </h6>
                                                        </li>
                                                        <li>
                                                          <a
                                                            className="dropdown-item"
                                                            href="#"
                                                          >
                                                            <div className="form-check">
                                                              <input
                                                                className="form-check-input"
                                                                type="radio"
                                                                name="flexRadioDefault"
                                                                id="active"
                                                              />
                                                              <label
                                                                className="form-check-label"
                                                                htmlFor="active"
                                                              >
                                                                Active
                                                              </label>
                                                            </div>
                                                          </a>
                                                        </li>
                                                        <li>
                                                          <a
                                                            className="dropdown-item"
                                                            href="#"
                                                          >
                                                            <div className="form-check">
                                                              <input
                                                                className="form-check-input"
                                                                type="radio"
                                                                name="flexRadioDefault"
                                                                id="suspended"
                                                              />
                                                              <label
                                                                className="form-check-label"
                                                                htmlFor="suspended"
                                                              >
                                                                Suspended
                                                              </label>
                                                            </div>
                                                          </a>
                                                        </li>
                                                        <li>
                                                          <a
                                                            className="dropdown-item"
                                                            href="#"
                                                          >
                                                            <div className="form-check">
                                                              <input
                                                                className="form-check-input"
                                                                type="radio"
                                                                name="flexRadioDefault"
                                                                id="deactivated"
                                                              />
                                                              <label
                                                                className="form-check-label"
                                                                htmlFor="deactivated"
                                                              >
                                                                Deactivated
                                                              </label>
                                                            </div>
                                                          </a>
                                                        </li>
                                                        <li>
                                                          <a
                                                            className="dropdown-item"
                                                            href="#"
                                                          >
                                                            <div className="form-check">
                                                              <input
                                                                className="form-check-input"
                                                                type="radio"
                                                                name="flexRadioDefault"
                                                                id="pending"
                                                              />
                                                              <label
                                                                className="form-check-label"
                                                                htmlFor="pending"
                                                              >
                                                                Pending
                                                              </label>
                                                            </div>
                                                          </a>
                                                        </li>
                                                      </ul>
                                                    </div>
                                                  </td>
                                                </tr> */}
                                                <tr>
                                                  <td className="m-3">No user has been invited</td>

                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div
                                    className="tab-pane fade"
                                    id="v-pills-national"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-national-tab"
                                    tabIndex="0"
                                  ></div>

                                  <div
                                    className="tab-pane fade"
                                    id="v-pills-branch"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-branch-tab"
                                    tabIndex="0"
                                  ></div>

                                  <div
                                    className="tab-pane fade"
                                    id="v-pills-employer"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-employer-tab"
                                    tabIndex="0"
                                  ></div>

                                  <div
                                    className="tab-pane fade"
                                    id="v-pills-staff"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-staff-tab"
                                    tabIndex="0"
                                  ></div>

                                  <div
                                    className="tab-pane fade"
                                    id="v-pills-nonstaff"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-nonstaff-tab"
                                    tabIndex="0"
                                  ></div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div
                            className="tab-pane fade"
                            id="pills-claimants"
                            role="tabpanel"
                            aria-labelledby="pills-claimants-tab"
                            tabIndex="0"
                          >
                            <div className="row mt-5">
                              <div className="col-lg-3"></div>

                              <div className="col-lg-9"></div>
                            </div>
                          </div>

                          <div
                            className="tab-pane fade"
                            id="pills-settlement"
                            role="tabpanel"
                            aria-labelledby="pills-settlement-tab"
                            tabIndex="0"
                          >
                            <div className="row mt-5">
                              <div className="col-lg-3">
                                <div
                                  className="nav flex-column tab-item nav-pills gap-10"
                                  id="v-pills-tab"
                                  role="tablist"
                                  aria-orientation="vertical"
                                >
                                  <button
                                    className="nav-link tab-v text-start"
                                    id="v-pills-con-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-con"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-con"
                                    aria-selected="false"
                                  >
                                    Conciliators & Arbitrators
                                  </button>

                                  <button
                                    className="nav-link tab-v text-start"
                                    id="v-pills-med-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-med"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-med"
                                    aria-selected="false"
                                  >
                                    Mediators
                                  </button>

                                  <button
                                    className="nav-link tab-v text-start"
                                    id="v-pills-int-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-int"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-int"
                                    aria-selected="false"
                                  >
                                    Internal Arbitration Panel{" "}
                                  </button>

                                  <button
                                    className="nav-link tab-v text-start active"
                                    id="v-pills-board-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-board"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-board"
                                    aria-selected="true"
                                  >
                                    Board of Enquiry
                                  </button>

                                  <button
                                    className="nav-link tab-v text-start"
                                    id="v-pills-ind-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-ind"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-ind"
                                    aria-selected="false"
                                  >
                                    National Industrial Courts
                                  </button>
                                </div>
                              </div>

                              <div className="col-lg-9">
                                <div
                                  className="tab-content"
                                  id="v-pills-tabContent"
                                >
                                  <div
                                    className="tab-pane fade"
                                    id="v-pills-con"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-con-tab"
                                    tabIndex="0"
                                  ></div>

                                  <div
                                    className="tab-pane fade"
                                    id="v-pills-med"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-med-tab"
                                    tabIndex="0"
                                  ></div>

                                  <div
                                    className="tab-pane fade"
                                    id="v-pills-int"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-int-tab"
                                    tabIndex="0"
                                  ></div>

                                  <div
                                    className="tab-pane fade show active"
                                    id="v-pills-board"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-board-tab"
                                    tabIndex="0"
                                  >
                                    <div className="card mb-4">
                                      <div className="card-body p-4">
                                        <div className="row mt-2 mb-4">
                                          <div className="col-lg-5">
                                            <div className="input-group">
                                              <span className="input-group-text bg-transparent">
                                                <img
                                                  src="/images/search.svg"
                                                  className="img-fluid" alt="search"
                                                />
                                              </span>
                                              <input
                                                type="search"
                                                className="form-control border-start-0 form-control-height"
                                                placeholder="Search here..."
                                              />
                                            </div>
                                          </div>

                                          <div className="col-lg-7">
                                            <div className="d-flex align-items-center justify-content-between gap-15">
                                              <div className="d-flex">
                                                <a className="btn btn-size btn-outline-light text-medium px-3 me-lg-3">
                                                  <img
                                                    src="/images/filter.svg"
                                                    className="img-fluid" alt=""
                                                  />{" "}
                                                  A-Z
                                                </a>

                                                <button className="btn btn-size btn-main-outline-primary px-3">
                                                  <i className="bi bi-cloud-download me-2"></i>{" "}
                                                  Export CSV
                                                </button>
                                              </div>

                                              <p className="text-end mb-0 file-count">
                                                Board of Enquires:{" "}
                                                {getBoardOfEnquire.length}
                                              </p>
                                            </div>
                                          </div>
                                        </div>

                                        <div className="row mb-4">
                                          <div className="col-lg-3 offset-lg-9">
                                            <button
                                              className="btn btn-main-primary btn-size w-100"
                                              data-bs-toggle="modal"
                                              data-bs-target="#boardModal"
                                            >
                                              Create Board Profile
                                            </button>
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
                                                  <th scope="col">
                                                    Board of Enquiry
                                                  </th>
                                                  <th scope="col">Name</th>
                                                  <th scope="col">
                                                    Assigned Cases
                                                  </th>
                                                  <th scope="col">Status</th>
                                                  <th scope="col">
                                                    Date added
                                                  </th>
                                                  <th scope="col">Actions</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                {/* <tr>
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
																										<div className="avatars">
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/65.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/65.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/66.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/66.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/67.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/67.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/68.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/68.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/69.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/69.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																										</div>
																									</td>
																									<td>Health</td>
																									<td>12</td>
																									<td>
																										<img
																											src="/images/active.svg"
																											 className="img-fluid" alt=""
																										/>
																									</td>
																									<td>Feb 4 2023</td>
																									<td>
																										<div className="dropdown">
																											<button
																												className="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret"
																												type="button"
																												data-bs-toggle="dropdown"
																												aria-expanded="false"
																												data-bs-auto-close="outside"
																											>
																												<img
																													src="/images/dots-v.svg"
																													 className="img-fluid" alt=""
																													alt="dots"
																												/>
																											</button>
																											<ul className="dropdown-menu border-radius action-menu-2">
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																														data-bs-toggle="modal"
																														data-bs-target="#disputeModal"
																													>
																														Refer to Dispute
																														Case
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																														data-bs-toggle="modal"
																														data-bs-target="#permissionModal2"
																													>
																														Edit permission
																														level
																													</a>
																												</li>
																												<li>
																													<a
																														href="view-members.php"
																														className="dropdown-item"
																													>
																														View Members
																													</a>
																												</li>
																												<li>
																													<a
																														href=""
																														className="dropdown-item"
																														data-bs-toggle="modal"
																														data-bs-target="#dissolveModal"
																													>
																														Dissolve Board{" "}
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item d-flex align-items-center justify-content-between"
																														data-bs-toggle="collapse"
																														data-bs-target="#collapseStatus"
																														aria-expanded="false"
																														aria-controls="collapseStatus"
																													>
																														Change Status{" "}
																														<i className="bi bi-chevron-down"></i>
																													</a>
																												</li>
																												<div
																													className="collapse"
																													id="collapseStatus"
																												>
																													<ul className="list-unstyled">
																														<li>
																															<a
																																className="dropdown-item"
																																href="#"
																															>
																																<div className="form-check">
																																	<input
																																		className="form-check-input"
																																		type="radio"
																																		name="flexRadioDefault"
																																		id="active"
																																	/>
																																	<label
																																		className="form-check-label"
																																		htmlFor="active"
																																	>
																																		Active
																																	</label>
																																</div>
																															</a>
																														</li>
																														<li>
																															<a
																																className="dropdown-item"
																																href="#"
																															>
																																<div className="form-check">
																																	<input
																																		className="form-check-input"
																																		type="radio"
																																		name="flexRadioDefault"
																																		id="suspended"
																																	/>
																																	<label
																																		className="form-check-label"
																																		htmlFor="suspended"
																																	>
																																		Suspended
																																	</label>
																																</div>
																															</a>
																														</li>
																														<li>
																															<a
																																className="dropdown-item"
																																href="#"
																															>
																																<div className="form-check">
																																	<input
																																		className="form-check-input"
																																		type="radio"
																																		name="flexRadioDefault"
																																		id="deactivated"
																																	/>
																																	<label
																																		className="form-check-label"
																																		htmlFor="deactivated"
																																	>
																																		Deactivated
																																	</label>
																																</div>
																															</a>
																														</li>
																														<li>
																															<a
																																className="dropdown-item"
																																href="#"
																															>
																																<div className="form-check">
																																	<input
																																		className="form-check-input"
																																		type="radio"
																																		name="flexRadioDefault"
																																		id="pending"
																																	/>
																																	<label
																																		className="form-check-label"
																																		htmlFor="pending"
																																	>
																																		Pending
																																	</label>
																																</div>
																															</a>
																														</li>
																													</ul>
																												</div>
																												<li>
																													<h6 className="dropdown-header">
																														Change Status
																													</h6>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																													>
																														<div className="form-check">
																															<input
																																className="form-check-input"
																																type="radio"
																																name="flexRadioDefault"
																																id="active"
																															/>
																															<label
																																className="form-check-label"
																																htmlFor="active"
																															>
																																Active
																															</label>
																														</div>
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																													>
																														<div className="form-check">
																															<input
																																className="form-check-input"
																																type="radio"
																																name="flexRadioDefault"
																																id="suspended"
																															/>
																															<label
																																className="form-check-label"
																																htmlFor="suspended"
																															>
																																Suspended
																															</label>
																														</div>
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																													>
																														<div className="form-check">
																															<input
																																className="form-check-input"
																																type="radio"
																																name="flexRadioDefault"
																																id="deactivated"
																															/>
																															<label
																																className="form-check-label"
																																htmlFor="deactivated"
																															>
																																Deactivated
																															</label>
																														</div>
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																													>
																														<div className="form-check">
																															<input
																																className="form-check-input"
																																type="radio"
																																name="flexRadioDefault"
																																id="pending"
																															/>
																															<label
																																className="form-check-label"
																																htmlFor="pending"
																															>
																																Pending
																															</label>
																														</div>
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
																										<div className="avatars">
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/65.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/65.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/66.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/66.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/67.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/67.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/68.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/68.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/69.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/69.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																										</div>
																									</td>
																									<td>Health</td>
																									<td>12</td>
																									<td>
																										<img
																											src="/images/pending-icon.svg"
																											 className="img-fluid" alt=""
																										/>
																									</td>
																									<td>Feb 4 2023</td>
																									<td>
																										<div className="dropdown">
																											<button
																												className="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret"
																												type="button"
																												data-bs-toggle="dropdown"
																												aria-expanded="false"
																												data-bs-auto-close="outside"
																											>
																												<img
																													src="/images/dots-v.svg"
																													 className="img-fluid" alt=""
																													alt="dots"
																												/>
																											</button>
																											<ul className="dropdown-menu border-radius action-menu-2">
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																														data-bs-toggle="modal"
																														data-bs-target="#disputeModal"
																													>
																														Refer to Dispute
																														Case
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																														data-bs-toggle="modal"
																														data-bs-target="#permissionModal2"
																													>
																														Edit permission
																														level
																													</a>
																												</li>
																												<li>
																													<a
																														href="view-members.php"
																														className="dropdown-item"
																													>
																														View Members
																													</a>
																												</li>
																												<li>
																													<a
																														href=""
																														className="dropdown-item"
																														data-bs-toggle="modal"
																														data-bs-target="#dissolveModal"
																													>
																														Dissolve Board{" "}
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item d-flex align-items-center justify-content-between"
																														data-bs-toggle="collapse"
																														data-bs-target="#collapseStatus"
																														aria-expanded="false"
																														aria-controls="collapseStatus"
																													>
																														Change Status{" "}
																														<i className="bi bi-chevron-down"></i>
																													</a>
																												</li>
																												<div
																													className="collapse"
																													id="collapseStatus"
																												>
																													<ul className="list-unstyled">
																														<li>
																															<a
																																className="dropdown-item"
																																href="#"
																															>
																																<div className="form-check">
																																	<input
																																		className="form-check-input"
																																		type="radio"
																																		name="flexRadioDefault"
																																		id="active"
																																	/>
																																	<label
																																		className="form-check-label"
																																		htmlFor="active"
																																	>
																																		Active
																																	</label>
																																</div>
																															</a>
																														</li>
																														<li>
																															<a
																																className="dropdown-item"
																																href="#"
																															>
																																<div className="form-check">
																																	<input
																																		className="form-check-input"
																																		type="radio"
																																		name="flexRadioDefault"
																																		id="suspended"
																																	/>
																																	<label
																																		className="form-check-label"
																																		htmlFor="suspended"
																																	>
																																		Suspended
																																	</label>
																																</div>
																															</a>
																														</li>
																														<li>
																															<a
																																className="dropdown-item"
																																href="#"
																															>
																																<div className="form-check">
																																	<input
																																		className="form-check-input"
																																		type="radio"
																																		name="flexRadioDefault"
																																		id="deactivated"
																																	/>
																																	<label
																																		className="form-check-label"
																																		htmlFor="deactivated"
																																	>
																																		Deactivated
																																	</label>
																																</div>
																															</a>
																														</li>
																														<li>
																															<a
																																className="dropdown-item"
																																href="#"
																															>
																																<div className="form-check">
																																	<input
																																		className="form-check-input"
																																		type="radio"
																																		name="flexRadioDefault"
																																		id="pending"
																																	/>
																																	<label
																																		className="form-check-label"
																																		htmlFor="pending"
																																	>
																																		Pending
																																	</label>
																																</div>
																															</a>
																														</li>
																													</ul>
																												</div>
																												<li>
																													<h6 className="dropdown-header">
																														Change Status
																													</h6>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																													>
																														<div className="form-check">
																															<input
																																className="form-check-input"
																																type="radio"
																																name="flexRadioDefault"
																																id="active"
																															/>
																															<label
																																className="form-check-label"
																																htmlFor="active"
																															>
																																Active
																															</label>
																														</div>
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																													>
																														<div className="form-check">
																															<input
																																className="form-check-input"
																																type="radio"
																																name="flexRadioDefault"
																																id="suspended"
																															/>
																															<label
																																className="form-check-label"
																																htmlFor="suspended"
																															>
																																Suspended
																															</label>
																														</div>
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																													>
																														<div className="form-check">
																															<input
																																className="form-check-input"
																																type="radio"
																																name="flexRadioDefault"
																																id="deactivated"
																															/>
																															<label
																																className="form-check-label"
																																htmlFor="deactivated"
																															>
																																Deactivated
																															</label>
																														</div>
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																													>
																														<div className="form-check">
																															<input
																																className="form-check-input"
																																type="radio"
																																name="flexRadioDefault"
																																id="pending"
																															/>
																															<label
																																className="form-check-label"
																																htmlFor="pending"
																															>
																																Pending
																															</label>
																														</div>
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
																										<div className="avatars">
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/65.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/65.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/66.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/66.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/67.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/67.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/68.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/68.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																											<div className="dropdown">
																												<a
																													href="#"
																													className="avatars__item dropdown-toggle"
																													type="button"
																													data-bs-toggle="dropdown"
																													aria-expanded="false"
																												>
																													<img
																														className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																														src="https://randomuser.me/api/portraits/women/69.jpg"
																														alt=""
																													/>
																												</a>
																												<ul className="dropdown-menu action-menu border-radius">
																													<img
																														src="/images/pointer.svg"
																														className="img-fluid pointer"
																													/>
																													<div className="d-flex avatar-holder border-bottom py-4">
																														<div className="position-relative">
																															<img
																																src="/images/Avatar-online-indicator.svg"
																																className="img-fluid indicator-avatar"
																																alt="indicator"
																															/>
																															<div className="avatar-sm flex-shrink-0">
																																<img
																																	src="https://randomuser.me/api/portraits/women/69.jpg"
																																	className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																	alt="Avatar"
																																/>
																															</div>
																														</div>
																														<div className="ms-2 flex-grow-1">
																															<h5 className="mb-0">
																																Stephen Ejiro
																															</h5>
																															<p className="mb-0 text-main-primary">
																																View profile
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/users.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Role in dispute
																															</p>
																															<img
																																src="/images/claim.svg"
																																 className="img-fluid" alt=""
																																alt="claimant"
																															/>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/user.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Name &
																																Organization
																															</p>
																															<p className="mb-0">
																																Stephen Ejiro
																																(Shafa Abuja)
																															</p>
																														</div>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/mail.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Email
																															</p>
																															<p className="mb-0">
																																stepheneji@nnpc.com
																															</p>
																														</div>

																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>

																													<div className="d-flex align-items-center py-2">
																														<img
																															src="/images/call.svg"
																															 className="img-fluid" alt=""
																															alt="users"
																														/>
																														<div className="ms-2 flex-grow-1">
																															<p className="mb-1 ft-sm">
																																Phone Number
																															</p>
																															<p className="mb-0">
																																08168141116
																															</p>
																														</div>
																														<img
																															src="/images/copy.svg"
																															 className="img-fluid" alt=""
																															alt="copy"
																														/>
																													</div>
																												</ul>
																											</div>
																										</div>
																									</td>
																									<td>Health</td>
																									<td>12</td>
																									<td>
																										<img
																											src="/images/deactivated.svg"
																											 className="img-fluid" alt=""
																										/>
																									</td>
																									<td>Feb 4 2023</td>
																									<td>
																										<div className="dropdown">
																											<button
																												className="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret"
																												type="button"
																												data-bs-toggle="dropdown"
																												aria-expanded="false"
																												data-bs-auto-close="outside"
																											>
																												<img
																													src="/images/dots-v.svg"
																													 className="img-fluid" alt=""
																													alt="dots"
																												/>
																											</button>
																											<ul className="dropdown-menu border-radius action-menu-2">
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																														data-bs-toggle="modal"
																														data-bs-target="#disputeModal"
																													>
																														Refer to Dispute
																														Case
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																														data-bs-toggle="modal"
																														data-bs-target="#permissionModal2"
																													>
																														Edit permission
																														level
																													</a>
																												</li>
																												<li>
																													<a
																														href="view-members.php"
																														className="dropdown-item"
																													>
																														View Members
																													</a>
																												</li>
																												<li>
																													<a
																														href=""
																														className="dropdown-item"
																														data-bs-toggle="modal"
																														data-bs-target="#dissolveModal"
																													>
																														Dissolve Board{" "}
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item d-flex align-items-center justify-content-between"
																														data-bs-toggle="collapse"
																														data-bs-target="#collapseStatus"
																														aria-expanded="false"
																														aria-controls="collapseStatus"
																													>
																														Change Status{" "}
																														<i className="bi bi-chevron-down"></i>
																													</a>
																												</li>
																												<div
																													className="collapse"
																													id="collapseStatus"
																												>
																													<ul className="list-unstyled">
																														<li>
																															<a
																																className="dropdown-item"
																																href="#"
																															>
																																<div className="form-check">
																																	<input
																																		className="form-check-input"
																																		type="radio"
																																		name="flexRadioDefault"
																																		id="active"
																																	/>
																																	<label
																																		className="form-check-label"
																																		htmlFor="active"
																																	>
																																		Active
																																	</label>
																																</div>
																															</a>
																														</li>
																														<li>
																															<a
																																className="dropdown-item"
																																href="#"
																															>
																																<div className="form-check">
																																	<input
																																		className="form-check-input"
																																		type="radio"
																																		name="flexRadioDefault"
																																		id="suspended"
																																	/>
																																	<label
																																		className="form-check-label"
																																		htmlFor="suspended"
																																	>
																																		Suspended
																																	</label>
																																</div>
																															</a>
																														</li>
																														<li>
																															<a
																																className="dropdown-item"
																																href="#"
																															>
																																<div className="form-check">
																																	<input
																																		className="form-check-input"
																																		type="radio"
																																		name="flexRadioDefault"
																																		id="deactivated"
																																	/>
																																	<label
																																		className="form-check-label"
																																		htmlFor="deactivated"
																																	>
																																		Deactivated
																																	</label>
																																</div>
																															</a>
																														</li>
																														<li>
																															<a
																																className="dropdown-item"
																																href="#"
																															>
																																<div className="form-check">
																																	<input
																																		className="form-check-input"
																																		type="radio"
																																		name="flexRadioDefault"
																																		id="pending"
																																	/>
																																	<label
																																		className="form-check-label"
																																		htmlFor="pending"
																																	>
																																		Pending
																																	</label>
																																</div>
																															</a>
																														</li>
																													</ul>
																												</div>
																												<li>
																													<h6 className="dropdown-header">
																														Change Status
																													</h6>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																													>
																														<div className="form-check">
																															<input
																																className="form-check-input"
																																type="radio"
																																name="flexRadioDefault"
																																id="active"
																															/>
																															<label
																																className="form-check-label"
																																htmlFor="active"
																															>
																																Active
																															</label>
																														</div>
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																													>
																														<div className="form-check">
																															<input
																																className="form-check-input"
																																type="radio"
																																name="flexRadioDefault"
																																id="suspended"
																															/>
																															<label
																																className="form-check-label"
																																htmlFor="suspended"
																															>
																																Suspended
																															</label>
																														</div>
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																													>
																														<div className="form-check">
																															<input
																																className="form-check-input"
																																type="radio"
																																name="flexRadioDefault"
																																id="deactivated"
																															/>
																															<label
																																className="form-check-label"
																																htmlFor="deactivated"
																															>
																																Deactivated
																															</label>
																														</div>
																													</a>
																												</li>
																												<li>
																													<a
																														className="dropdown-item"
																														href="#"
																													>
																														<div className="form-check">
																															<input
																																className="form-check-input"
																																type="radio"
																																name="flexRadioDefault"
																																id="pending"
																															/>
																															<label
																																className="form-check-label"
																																htmlFor="pending"
																															>
																																Pending
																															</label>
																														</div>
																													</a>
																												</li>
																											</ul>
																										</div>
																									</td>
																								</tr> */}

                                                {getBoardOfEnquire.map(
                                                  (item) => (
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
                                                        {/* <div className="avatars">
                                                          <div className="dropdown">
                                                            <a
                                                              href="#"
                                                              className="avatars__item dropdown-toggle"
                                                              type="button"
                                                              data-bs-toggle="dropdown"
                                                              aria-expanded="false"
                                                            >
                                                              <img
                                                                className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                                                src="https://randomuser.me/api/portraits/women/65.jpg"
                                                                alt=""
                                                              />
                                                            </a>
                                                            <ul className="dropdown-menu action-menu border-radius">
                                                              <img
                                                                src="/images/pointer.svg"
                                                                className="img-fluid pointer"
                                                              />
                                                              <div className="d-flex avatar-holder border-bottom py-4">
                                                                <div className="position-relative">
                                                                  <img
                                                                    src="/images/Avatar-online-indicator.svg"
                                                                    className="img-fluid indicator-avatar"
                                                                    alt="indicator"
                                                                  />
                                                                  <div className="avatar-sm flex-shrink-0">
                                                                    <img
                                                                      src="https://randomuser.me/api/portraits/women/65.jpg"
                                                                      className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                                      alt="Avatar"
                                                                    />
                                                                  </div>
                                                                </div>
                                                                <div className="ms-2 flex-grow-1">
                                                                  <h5 className="mb-0">
                                                                    Stephen
                                                                    Ejiro
                                                                  </h5>
                                                                  <p className="mb-0 text-main-primary">
                                                                    View profile
                                                                  </p>
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/users.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Role in
                                                                    dispute
                                                                  </p>
                                                                  <img
                                                                    src="/images/claim.svg"
                                                                     className="img-fluid" alt=""
                                                                    alt="claimant"
                                                                  />
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/user.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Name &
                                                                    Organization
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    Stephen
                                                                    Ejiro (Shafa
                                                                    Abuja)
                                                                  </p>
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/mail.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                /
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Email
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    stepheneji@nnpc.com
                                                                  </p>
                                                                </div>
                                                                <img
                                                                  src="/images/copy.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="copy"
                                                                />
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/call.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Phone Number
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    08168141116
                                                                  </p>
                                                                </div>
                                                                <img
                                                                  src="/images/copy.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="copy"
                                                                />
                                                              </div>
                                                            </ul>
                                                          </div>
                                                          <div className="dropdown">
                                                            <a
                                                              href="#"
                                                              className="avatars__item dropdown-toggle"
                                                              type="button"
                                                              data-bs-toggle="dropdown"
                                                              aria-expanded="false"
                                                            >
                                                              <img
                                                                className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                                                src="https://randomuser.me/api/portraits/women/66.jpg"
                                                                alt=""
                                                              />
                                                            </a>
                                                            <ul className="dropdown-menu action-menu border-radius">
                                                              <img
                                                                src="/images/pointer.svg"
                                                                className="img-fluid pointer"
                                                              />
                                                              <div className="d-flex avatar-holder border-bottom py-4">
                                                                <div className="position-relative">
                                                                  <img
                                                                    src="/images/Avatar-online-indicator.svg"
                                                                    className="img-fluid indicator-avatar"
                                                                    alt="indicator"
                                                                  />
                                                                  <div className="avatar-sm flex-shrink-0">
                                                                    <img
                                                                      src="https://randomuser.me/api/portraits/women/66.jpg"
                                                                      className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                                      alt="Avatar"
                                                                    />
                                                                  </div>
                                                                </div>
                                                                <div className="ms-2 flex-grow-1">
                                                                  <h5 className="mb-0">
                                                                    Stephen
                                                                    Ejiro
                                                                  </h5>
                                                                  <p className="mb-0 text-main-primary">
                                                                    View profile
                                                                  </p>
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/users.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Role in
                                                                    dispute
                                                                  </p>
                                                                  <img
                                                                    src="/images/claim.svg"
                                                                     className="img-fluid" alt=""
                                                                    alt="claimant"
                                                                  />
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/user.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Name &
                                                                    Organization
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    Stephen
                                                                    Ejiro (Shafa
                                                                    Abuja)
                                                                  </p>
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/mail.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Email
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    stepheneji@nnpc.com
                                                                  </p>
                                                                </div>

                                                                <img
                                                                  src="/images/copy.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="copy"
                                                                />
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/call.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Phone Number
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    08168141116
                                                                  </p>
                                                                </div>
                                                                <img
                                                                  src="/images/copy.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="copy"
                                                                />
                                                              </div>
                                                            </ul>
                                                          </div>
                                                          <div className="dropdown">
                                                            <a
                                                              href="#"
                                                              className="avatars__item dropdown-toggle"
                                                              type="button"
                                                              data-bs-toggle="dropdown"
                                                              aria-expanded="false"
                                                            >
                                                              <img
                                                                className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                                                src="https://randomuser.me/api/portraits/women/67.jpg"
                                                                alt=""
                                                              />
                                                            </a>
                                                            <ul className="dropdown-menu action-menu border-radius">
                                                              <img
                                                                src="/images/pointer.svg"
                                                                className="img-fluid pointer"
                                                              />
                                                              <div className="d-flex avatar-holder border-bottom py-4">
                                                                <div className="position-relative">
                                                                  <img
                                                                    src="/images/Avatar-online-indicator.svg"
                                                                    className="img-fluid indicator-avatar"
                                                                    alt="indicator"
                                                                  />
                                                                  <div className="avatar-sm flex-shrink-0">
                                                                    <img
                                                                      src="https://randomuser.me/api/portraits/women/67.jpg"
                                                                      className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                                      alt="Avatar"
                                                                    />
                                                                  </div>
                                                                </div>
                                                                <div className="ms-2 flex-grow-1">
                                                                  <h5 className="mb-0">
                                                                    Stephen
                                                                    Ejiro
                                                                  </h5>
                                                                  <p className="mb-0 text-main-primary">
                                                                    View profile
                                                                  </p>
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/users.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Role in
                                                                    dispute
                                                                  </p>
                                                                  <img
                                                                    src="/images/claim.svg"
                                                                     className="img-fluid" alt=""
                                                                    alt="claimant"
                                                                  />
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/user.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Name &
                                                                    Organization
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    Stephen
                                                                    Ejiro (Shafa
                                                                    Abuja)
                                                                  </p>
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/mail.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Email
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    stepheneji@nnpc.com
                                                                  </p>
                                                                </div>

                                                                <img
                                                                  src="/images/copy.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="copy"
                                                                />
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/call.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Phone Number
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    08168141116
                                                                  </p>
                                                                </div>
                                                                <img
                                                                  src="/images/copy.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="copy"
                                                                />
                                                              </div>
                                                            </ul>
                                                          </div>
                                                          <div className="dropdown">
                                                            <a
                                                              href="#"
                                                              className="avatars__item dropdown-toggle"
                                                              type="button"
                                                              data-bs-toggle="dropdown"
                                                              aria-expanded="false"
                                                            >
                                                              <img
                                                                className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                                                src="https://randomuser.me/api/portraits/women/68.jpg"
                                                                alt=""
                                                              />
                                                            </a>
                                                            <ul className="dropdown-menu action-menu border-radius">
                                                              <img
                                                                src="/images/pointer.svg"
                                                                className="img-fluid pointer"
                                                              />
                                                              <div className="d-flex avatar-holder border-bottom py-4">
                                                                <div className="position-relative">
                                                                  <img
                                                                    src="/images/Avatar-online-indicator.svg"
                                                                    className="img-fluid indicator-avatar"
                                                                    alt="indicator"
                                                                  />
                                                                  <div className="avatar-sm flex-shrink-0">
                                                                    <img
                                                                      src="https://randomuser.me/api/portraits/women/68.jpg"
                                                                      className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                                      alt="Avatar"
                                                                    />
                                                                  </div>
                                                                </div>
                                                                <div className="ms-2 flex-grow-1">
                                                                  <h5 className="mb-0">
                                                                    Stephen
                                                                    Ejiro
                                                                  </h5>
                                                                  <p className="mb-0 text-main-primary">
                                                                    View profile
                                                                  </p>
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/users.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Role in
                                                                    dispute
                                                                  </p>
                                                                  <img
                                                                    src="/images/claim.svg"
                                                                     className="img-fluid" alt=""
                                                                    alt="claimant"
                                                                  />
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/user.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Name &
                                                                    Organization
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    Stephen
                                                                    Ejiro (Shafa
                                                                    Abuja)
                                                                  </p>
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/mail.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Email
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    stepheneji@nnpc.com
                                                                  </p>
                                                                </div>

                                                                <img
                                                                  src="/images/copy.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="copy"
                                                                />
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/call.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Phone Number
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    08168141116
                                                                  </p>
                                                                </div>
                                                                <img
                                                                  src="/images/copy.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="copy"
                                                                />
                                                              </div>
                                                            </ul>
                                                          </div>
                                                          <div className="dropdown">
                                                            <a
                                                              href="#"
                                                              className="avatars__item dropdown-toggle"
                                                              type="button"
                                                              data-bs-toggle="dropdown"
                                                              aria-expanded="false"
                                                            >
                                                              <img
                                                                className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
                                                                src="https://randomuser.me/api/portraits/women/69.jpg"
                                                                alt=""
                                                              />
                                                            </a>
                                                            <ul className="dropdown-menu action-menu border-radius">
                                                              <img
                                                                src="/images/pointer.svg"
                                                                className="img-fluid pointer"
                                                              />
                                                              <div className="d-flex avatar-holder border-bottom py-4">
                                                                <div className="position-relative">
                                                                  <img
                                                                    src="/images/Avatar-online-indicator.svg"
                                                                    className="img-fluid indicator-avatar"
                                                                    alt="indicator"
                                                                  />
                                                                  <div className="avatar-sm flex-shrink-0">
                                                                    <img
                                                                      src="https://randomuser.me/api/portraits/women/69.jpg"
                                                                      className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                                      alt="Avatar"
                                                                    />
                                                                  </div>
                                                                </div>
                                                                <div className="ms-2 flex-grow-1">
                                                                  <h5 className="mb-0">
                                                                    Stephen
                                                                    Ejiro
                                                                  </h5>
                                                                  <p className="mb-0 text-main-primary">
                                                                    View profile
                                                                  </p>
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/users.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Role in
                                                                    dispute
                                                                  </p>
                                                                  <img
                                                                    src="/images/claim.svg"
                                                                     className="img-fluid" alt=""
                                                                    alt="claimant"
                                                                  />
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/user.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Name &
                                                                    Organization
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    Stephen
                                                                    Ejiro (Shafa
                                                                    Abuja)
                                                                  </p>
                                                                </div>
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/mail.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Email
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    stepheneji@nnpc.com
                                                                  </p>
                                                                </div>

                                                                <img
                                                                  src="/images/copy.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="copy"
                                                                />
                                                              </div>

                                                              <div className="d-flex align-items-center py-2">
                                                                <img
                                                                  src="/images/call.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="users"
                                                                />
                                                                <div className="ms-2 flex-grow-1">
                                                                  <p className="mb-1 ft-sm">
                                                                    Phone Number
                                                                  </p>
                                                                  <p className="mb-0">
                                                                    08168141116
                                                                  </p>
                                                                </div>
                                                                <img
                                                                  src="/images/copy.svg"
                                                                   className="img-fluid" alt=""
                                                                  alt="copy"
                                                                />
                                                              </div>
                                                            </ul>
                                                          </div>
                                                        </div> */}<p>No user has been invited</p>
                                                      </td>
                                                      <td>{item.name}</td>
                                                      <td>
                                                        {item.assigned_cases}
                                                      </td>
                                                      <td>
                                                        <img
                                                          src="/images/suspending.svg"
                                                          className="img-fluid" alt=""
                                                        />
                                                      </td>
                                                      <td>{item.date_added}</td>
                                                      <td>
                                                        <div className="dropdown">
                                                          <button
                                                            className="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret"
                                                            type="button"
                                                            data-bs-toggle="dropdown"
                                                            aria-expanded="false"
                                                            data-bs-auto-close="outside"
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
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#disputeModal"
                                                              >
                                                                Refer to Dispute
                                                                Case
                                                              </a>
                                                            </li>
                                                            <li>
                                                              <a
                                                                href=""
                                                                className="dropdown-item"
                                                              >
                                                                View Members
                                                              </a>
                                                            </li>
                                                            <li>
                                                              <a
                                                                href=""
                                                                className="dropdown-item"
                                                                onClick={(e) =>
                                                                  handleDissolve(
                                                                    e,
                                                                    item._id,
                                                                    getBoardOfEnquire,
                                                                    setGetBoardOfEnquire
                                                                  )
                                                                }
                                                              >
                                                                Dissolve Board{" "}
                                                              </a>
                                                            </li>
                                                            <li>
                                                              <a
                                                                className="dropdown-item d-flex align-items-center justify-content-between"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseStatus"
                                                                aria-expanded="false"
                                                                aria-controls="collapseStatus"
                                                              >
                                                                Change Status{" "}
                                                                <i className="bi bi-chevron-down"></i>
                                                              </a>
                                                            </li>
                                                            <div
                                                              className="collapse"
                                                              id="collapseStatus"
                                                            >
                                                              <ul className="list-unstyled">
                                                                <li>
                                                                  <a
                                                                    className="dropdown-item"
                                                                    href="#"
                                                                  >
                                                                    <div className="form-check">
                                                                      <input
                                                                        className="form-check-input"
                                                                        type="radio"
                                                                        name="flexRadioDefault"
                                                                        id="active"
                                                                        onClick={
                                                                          handleStatusChange
                                                                        }
                                                                      />
                                                                      <label
                                                                        className="form-check-label"
                                                                        htmlFor="active"
                                                                      >
                                                                        Active
                                                                      </label>
                                                                    </div>
                                                                  </a>
                                                                </li>
                                                                <li>
                                                                  <a
                                                                    className="dropdown-item"
                                                                    href="#"
                                                                  >
                                                                    <div className="form-check">
                                                                      <input
                                                                        className="form-check-input"
                                                                        type="radio"
                                                                        name="flexRadioDefault"
                                                                        id="suspended"
                                                                        onClick={
                                                                          handleStatusChange
                                                                        }
                                                                      />
                                                                      <label
                                                                        className="form-check-label"
                                                                        htmlFor="suspended"
                                                                      >
                                                                        Suspended
                                                                      </label>
                                                                    </div>
                                                                  </a>
                                                                </li>
                                                                <li>
                                                                  <a
                                                                    className="dropdown-item"
                                                                    href="#"
                                                                  >
                                                                    <div className="form-check">
                                                                      <input
                                                                        className="form-check-input"
                                                                        type="radio"
                                                                        name="flexRadioDefault"
                                                                        id="deactivated"
                                                                        onClick={
                                                                          handleStatusChange
                                                                        }
                                                                      />
                                                                      <label
                                                                        className="form-check-label"
                                                                        htmlFor="deactivated"
                                                                      >
                                                                        Deactivated
                                                                      </label>
                                                                    </div>
                                                                  </a>
                                                                </li>
                                                                <li>
                                                                  <a
                                                                    className="dropdown-item"
                                                                    href="#"
                                                                  >
                                                                    <div className="form-check">
                                                                      <input
                                                                        className="form-check-input"
                                                                        type="radio"
                                                                        name="flexRadioDefault"
                                                                        id="pending"
                                                                        onClick={
                                                                          handleStatusChange
                                                                        }
                                                                      />
                                                                      <label
                                                                        className="form-check-label"
                                                                        htmlFor="pending"
                                                                      >
                                                                        Pending
                                                                      </label>
                                                                    </div>
                                                                  </a>
                                                                </li>
                                                              </ul>
                                                            </div>
                                                          </ul>
                                                        </div>
                                                      </td>
                                                    </tr>
                                                  )
                                                )}
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div
                                    className="tab-pane fade"
                                    id="v-pills-ind"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-ind-tab"
                                    tabIndex="0"
                                  ></div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div
                            className="tab-pane fade"
                            id="pills-role"
                            role="tabpanel"
                            aria-labelledby="pills-role-tab"
                            tabIndex="0"
                          >
                            <div className="row mt-5">
                              <div className="col-lg-5">
                                <p>All NDRS roles and their permissions</p>

                                <button
                                  className="btn btn-main-primary btn-size"
                                  data-bs-toggle="modal"
                                  data-bs-target="#customModal"
                                >
                                  Create custom role
                                </button>
                              </div>
                            </div>
                            {isLoading ? (
                              <div className="d-flex justify-content-center align-items-center" style={{ minHeight: '80vh' }}>
                                <ClipLoader color="#36D7B7" loading={isLoading} size={50} />
                              </div>
                            ) : (
                              <div className="row">
                                <div className="col-lg-9">
                                  <div
                                    className="accordion accordion-expand mt-4"
                                    id="accordionHelp2"
                                  >
                                    {roles.map((role, roleIndex) => (
                                      <div
                                        className="accordion-item mb-3"
                                        key={role._id}
                                      >
                                        <h2 className="accordion-header">
                                          <button
                                            className="accordion-button custom-text-3"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target={`#collapseOne${role._id}`}
                                            aria-expanded={
                                              roleIndex === 0 ? "true" : "false"
                                            }
                                            aria-controls={`collapseOne${role._id}`}
                                          >
                                            {role.name}
                                          </button>
                                        </h2>
                                        <div
                                          id={`collapseOne${role._id}`}
                                          className={`accordion-collapse collapse ${roleIndex === 0 ? "show" : ""
                                            }`}
                                          data-bs-parent="#accordionHelp2"
                                        >
                                          <div className="mb-3 py-3 px-4 bg-light">
                                            <a
                                              href="#"
                                              className="btn btn-size btn-outline-danger d-inline-flex"
                                              name="role_id"
                                              onClick={(e) =>
                                                restoreDefault(
                                                  e,
                                                  role._id,
                                                  roles,
                                                  setRoles
                                                )
                                              }
                                            >
                                              Restore default
                                            </a>
                                          </div>
                                          <div className="accordion-body">
                                            {Object.entries(role.permissions).map(
                                              (
                                                [category, permissions],
                                                categoryIndex
                                              ) => (
                                                <div
                                                  className="card card-box-view mb-4"
                                                  key={category}
                                                >
                                                  <div className="card-body p-4">
                                                    <div className="row align-items-center">
                                                      <div className="col-lg-7">
                                                        <div className="text-start mb-lg-0 mb-3">
                                                          <h4>
                                                            {category.replace(
                                                              /_/g,
                                                              " & "
                                                            )}
                                                          </h4>
                                                          <p className="mb-0 text-muted-3">
                                                            {
                                                              permissions[0]
                                                                .group_description
                                                            }
                                                          </p>
                                                        </div>
                                                      </div>
                                                      <div className="col-lg-5">
                                                        <div className="d-flex flex-column gap-10">
                                                          {permissions.map(
                                                            (
                                                              permission,
                                                              permissionIndex
                                                            ) => (
                                                              <div
                                                                className="form-check d-flex align-items-center form-switch"
                                                                key={
                                                                  permission._id
                                                                }
                                                              >
                                                                <input
                                                                  className="form-check-input"
                                                                  type="checkbox"
                                                                  role="switch"
                                                                  id={`flexSwitchCheckChecked_${permission._id}`}
                                                                  checked={
                                                                    permission.has_permission ===
                                                                    1
                                                                  }
                                                                  onChange={() =>
                                                                    handleCheckboxChange(
                                                                      roleIndex,
                                                                      category,
                                                                      permissionIndex
                                                                    )
                                                                  }
                                                                />
                                                                <label
                                                                  className="form-check-label ms-4"
                                                                  htmlFor={`flexSwitchCheckChecked_${permission._id}`}
                                                                >
                                                                  {
                                                                    permission.name
                                                                  }
                                                                </label>
                                                              </div>
                                                            )
                                                          )}
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              )
                                            )}
                                          </div>
                                        </div>
                                      </div>
                                    ))}
                                  </div>
                                </div>
                              </div>
                            )}

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

      {/*  <!-- Modal --> */}
      <div
        className="modal fade"
        id="disputeModal"
        tabIndex="-1"
        aria-labelledby="disputeModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-xl">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header justify-content-between d-flex align-items-center">
              <h1 className="modal-title fs-5">Refer to dispute case</h1>
              <div className="gap-10 d-flex align-items-center">
                <button
                  className="btn btn btn-size btn-main-outline-primary px-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  Cancel
                </button>

                <button className="btn btn-main-primary btn-size px-3">
                  Refer case
                </button>
              </div>
            </div>
            <div className="modal-body">
              <div className="">
                <div className="d-flex avatar-holder mb-5">
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
                    <h5 className="mb-0">Salim Mustapha</h5>
                  </div>
                </div>

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
                              className="img-fluid me-2" alt=""
                            />{" "}
                            Most Recent
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
                        <th scope="col" style={{ width: "200px" }}>
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
                        <td>Production Sharing Contracts (PSCs) 2024</td>
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
                              <li>
                                <a
                                  className="dropdown-item"
                                  href="/disputeDetails"
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
                        <td>Production Sharing Contracts (PSCs) 2024</td>
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
                              <li>
                                <a
                                  className="dropdown-item"
                                  href="/diputeDetails"
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
          </div>
        </div>
      </div>

      {/* <!-- Modal --> */}
      <div
        className="modal fade"
        id="previewModal"
        tabIndex="-1"
        aria-labelledby="previewModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-xl">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header">
              <h1 className="modal-title fs-5">Preview Sent Invites</h1>
              <button
                type="button"
                className="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div className="modal-body">
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
                    <th scope="col">Email address</th>
                    <th scope="col">Role</th>
                    <th scope="col">Dispute invited to</th>
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
                    <td>josshnikara@email.com</td>
                    <td>
                      <img
                        src="/images/ministry-admin.svg"
                        className="img-fluid" alt=""
                      />
                    </td>
                    <td>DS133</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div className="modal-footer d-flex justify-content-between align-items-center">
              <p className="mb-0 text-muted">Page 1 of 30</p>

              <nav aria-label="...">
                <ul className="pagination pager mb-0">
                  <li className="page-item active" aria-current="page">
                    <span className="page-link">1</span>
                  </li>
                  <li className="page-item">
                    <a className="page-link" href="#">
                      2
                    </a>
                  </li>
                  <li className="page-item">
                    <a className="page-link" href="#">
                      3
                    </a>
                  </li>
                </ul>
              </nav>

              <div className="d-flex align-items-center gap-10">
                <button className="btn btn-outline-light text-medium">
                  <img src="/images/prev.svg" className="img-fluid" alt="" /> Previous
                </button>
                <button className="btn btn-outline-light text-medium">
                  Next <img src="/images/next.svg" className="img-fluid" alt="" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* <!-- Modal --> */}
      <div
        className="modal fade"
        id="boardModal"
        tabIndex="-1"
        aria-labelledby="boardModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-lg">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header justify-content-between">
              <h1 className="modal-title fs-5">
                Create Board of Enquiry Profile
              </h1>

              <div className="gap-10 d-flex align-items-center">
                <button
                  className="btn btn btn-size btn-main-outline-primary px-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  Cancel
                </button>

                <button
                  className="btn btn-main-primary btn-size px-3"

                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  Finish
                </button>
              </div>
            </div>
            <div className="modal-body">
              <div className="row mt-4">
                <div className="col-lg-12">
                  <label className="form-label">Name of Board of Enquiry</label>
                  <input
                    type="text"
                    className="form-control form-control-height"
                    placeholder="Enter Board of Enquiry"
                    name="name"
                    value={boardOfEnquire.name}
                    onChange={onHandleChange}
                  />
                </div>
              </div>
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
                      placeholder="Type an email to invite"
                    />
                  </div>
                </div>

                <div className="col-lg-2 offset-lg-3">
                  <div className="d-flex align-items-center justify-content-between gap-15">
                    <a href="" className="btn btn-size btn-main-primary" onClick={handleSubmit} disabled={!boardOfEnquire.name}>
                      Send Invite
                    </a>
                  </div>
                </div>
              </div>

              <div className="row">
                <div className="col-lg-12">
                  {/* <table className="table table-list">
                    <thead className="table-light">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date added</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row">
                          <div className="d-flex avatar-holder">
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
                              <h5 className="mb-0">Salim Mustapha</h5>
                              <p className="mb-0 text-muted-3">
                                salimmusty@gmail.com
                              </p>
                            </div>
                          </div>
                        </td>
                        <td>Feb 4 2023</td>
                      </tr>

                      <tr>
                        <td scope="row">
                          <div className="d-flex avatar-holder">
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
                              <h5 className="mb-0">Salim Mustapha</h5>
                              <p className="mb-0 text-muted-3">
                                salimmusty@gmail.com
                              </p>
                            </div>
                          </div>
                        </td>
                        <td>Pending</td>
                      </tr>
                    </tbody>
                  </table> */}
                  <table className="table table-list">
                    <thead className="table-light">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date added</th>
                        <th scope="col">Role</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                  </table>
                  <div className="card no-admin-card rounded-0">
                    <div className="card-body d-flex align-items-center justify-content-center">
                      <div className="text-center">
                        <h4 className="">No board members</h4>

                        <p className="text-muted-3">
                          Enter an admins email and role to send invite
                        </p>

                        <div className="text-center">
                          <img
                            src="/images/no-found.svg"
                            className="img-fluid" alt=""
                          />
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

      {/* <!-- Modal --> */}
      <div
        className="modal fade"
        id="customModal"
        tabIndex="-1"
        aria-labelledby="customModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-lg">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header justify-content-between">
              <h1 className="modal-title fs-5">
                Create custom role & permissions
              </h1>

              <div className="gap-10 d-flex align-items-center">
                <button
                  className="btn btn btn-size btn-main-outline-primary px-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  Cancel
                </button>

                <button
                  className="btn btn-main-primary btn-size px-3"
                  data-bs-target="#permissionModal"
                  data-bs-toggle="modal"

                  disabled={!customRole.name}
                >
                  Next
                </button>
              </div>
            </div>
            <div className="modal-body">
              <div className="row mt-4">
                <div className="col-lg-12">
                  <input
                    type="text"
                    className="form-control form-control-height"
                    placeholder="Enter custom role"
                    name="name"
                    value={customRole.name}
                    onChange={onHandleCustomRole}
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* <!-- Modal --> */}
      <div
        className="modal fade"
        id="permissionModal"
        tabIndex="-1"
        aria-labelledby="permissionModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-lg">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header justify-content-between">
              <div>
                <h1 className="modal-title fs-5">
                  Create custom role & permissions
                </h1>
                <p>Ministry Liason</p>
              </div>

              <div className="gap-10 d-flex align-items-center">
                <button
                  className="btn btn btn-size btn-main-outline-primary px-3"
                  data-bs-target="#customModal"
                  data-bs-toggle="modal"
                >
                  Back
                </button>

                <button className="btn btn-main-primary btn-size px-3"
                  data-bs-dismiss="modal"
                  aria-label="Close" onClick={CreateCustomRole}>
                  Finish
                </button>
              </div>
            </div>
            <div className="modal-body">
              <div>
                <div className="card card-box-view mb-4">
                  <div className="card-body p-4">
                    <div className="row align-items-center">
                      <div className="col-lg-7">
                        <div className="text-start mb-lg-0 mb-3">
                          <h4>Disputes</h4>
                          <p className="mb-0 text-muted-3">
                            All permission relating to disputes
                          </p>
                        </div>
                      </div>

                      <div className="col-lg-5">
                        <div className="d-flex flex-column gap-10">
                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_1"
                              checked={isChecked}
                              onChange={handleCheckboxChange}
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_1"
                            >
                              Create dispute
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_2"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_2"
                            >
                              Approve dispute
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_3"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_3"
                            >
                              Invite dispute participants
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_4"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_4"
                            >
                              Change dispute case status
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_5"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_5"
                            >
                              Participate in resolution
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_6"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_6"
                            >
                              View dispute notifications
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="card card-box-view mb-4">
                  <div className="card-body p-4">
                    <div className="row align-items-center">
                      <div className="col-lg-7">
                        <div className="text-start mb-lg-0 mb-3">
                          <h4>Union & Branches</h4>
                          <p className="mb-0 text-muted-3">
                            Permissions related to creating and editing unions,
                            branches or sub branches
                          </p>
                        </div>
                      </div>
                      <div className="col-lg-5">
                        <div className="d-flex flex-column gap-10">
                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_7"
                              checked={isChecked}
                              onChange={handleCheckboxChange}
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_7"
                            >
                              Create unions
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_8"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_8"
                            >
                              Create branches
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_9"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_9"
                            >
                              Create sub branches
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_10"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_10"
                            >
                              Edit unions
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_11"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_11"
                            >
                              Edit branches
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_12"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_12"
                            >
                              Edit sub branches
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="card card-box-view mb-4">
                  <div className="card-body p-4">
                    <div className="row align-items-center">
                      <div className="col-lg-7">
                        <div className="text-start mb-lg-0 mb-3">
                          <h4>Users & Groups</h4>
                          <p className="mb-0 text-muted-3">
                            Permissions related to users and groups
                          </p>
                        </div>
                      </div>

                      <div className="col-lg-5">
                        <div className="d-flex flex-column gap-10">
                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_13"
                              checked={isChecked}
                              onChange={handleCheckboxChange}
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_13"
                            >
                              Invite users
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_14"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_14"
                            >
                              Edit users status
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_15"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_15"
                            >
                              Assign users cases
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_16"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_16"
                            >
                              Edit roles & permissions
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="card card-box-view mb-4">
                  <div className="card-body p-4">
                    <div className="row align-items-center">
                      <div className="col-lg-7">
                        <div className="text-start mb-lg-0 mb-3">
                          <h4>Reports</h4>
                          <p className="mb-0 text-muted-3">
                            Permissions regarding the reporting feature
                          </p>
                        </div>
                      </div>
                      <div className="col-lg-5">
                        <div className="d-flex flex-column gap-10">
                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_17"
                              checked={isChecked}
                              onChange={handleCheckboxChange}
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_17"
                            >
                              View & download reports
                            </label>
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

      {/* <!-- Modal --> */}
      <div
        className="modal fade"
        id="permissionModal2"
        tabIndex="-1"
        aria-labelledby="permissionModalLabel2"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-lg">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header justify-content-between">
              <div>
                <h1 className="modal-title fs-5">
                  Edit permission level for Ministry Admin
                </h1>
                <p className="mb-0">maryblessing@gmail.com</p>
              </div>

              <div className="gap-10 d-flex align-items-center">
                <button className="btn btn btn-size btn-outline-danger px-3">
                  Restore to default
                </button>

                <button className="btn btn-main-primary btn-size px-3">
                  Save changes
                </button>
              </div>
            </div>
            <div className="modal-body">
              <div>
                <div className="card card-box-view mb-4">
                  <div className="card-body p-4">
                    <div className="row align-items-center">
                      <div className="col-lg-7">
                        <div className="text-start mb-lg-0 mb-3">
                          <h4>Disputes</h4>
                          <p className="mb-0 text-muted-3">
                            All permission relating to disputes
                          </p>
                        </div>
                      </div>

                      <div className="col-lg-5">
                        <div className="d-flex flex-column gap-10">
                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_1"
                              checked={isChecked}
                              onChange={handleCheckboxChange}
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_1"
                            >
                              Create dispute
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_2"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_2"
                            >
                              Approve dispute
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_3"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_3"
                            >
                              Invite dispute participants
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_4"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_4"
                            >
                              Change dispute case status
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_5"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_5"
                            >
                              Participate in resolution
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_6"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_6"
                            >
                              View dispute notifications
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="card card-box-view mb-4">
                  <div className="card-body p-4">
                    <div className="row align-items-center">
                      <div className="col-lg-7">
                        <div className="text-start mb-lg-0 mb-3">
                          <h4>Union & Branches</h4>
                          <p className="mb-0 text-muted-3">
                            Permissions related to creating and editing unions,
                            branches or sub branches
                          </p>
                        </div>
                      </div>
                      <div className="col-lg-5">
                        <div className="d-flex flex-column gap-10">
                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_7"
                              checked={isChecked}
                              onChange={handleCheckboxChange}
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_7"
                            >
                              Create unions
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_8"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_8"
                            >
                              Create branches
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_9"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_9"
                            >
                              Create sub branches
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_10"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_10"
                            >
                              Edit unions
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_11"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_11"
                            >
                              Edit branches
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_12"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_12"
                            >
                              Edit sub branches
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="card card-box-view mb-4">
                  <div className="card-body p-4">
                    <div className="row align-items-center">
                      <div className="col-lg-7">
                        <div className="text-start mb-lg-0 mb-3">
                          <h4>Users & Groups</h4>
                          <p className="mb-0 text-muted-3">
                            Permissions related to users and groups
                          </p>
                        </div>
                      </div>

                      <div className="col-lg-5">
                        <div className="d-flex flex-column gap-10">
                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_13"
                              checked={isChecked}
                              onChange={handleCheckboxChange}
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_13"
                            >
                              Invite users
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_14"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_14"
                            >
                              Edit users status
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_15"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_15"
                            >
                              Assign users cases
                            </label>
                          </div>

                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_16"
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_16"
                            >
                              Edit roles & permissions
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="card card-box-view mb-4">
                  <div className="card-body p-4">
                    <div className="row align-items-center">
                      <div className="col-lg-7">
                        <div className="text-start mb-lg-0 mb-3">
                          <h4>Reports</h4>
                          <p className="mb-0 text-muted-3">
                            Permissions regarding the reporting feature
                          </p>
                        </div>
                      </div>
                      <div className="col-lg-5">
                        <div className="d-flex flex-column gap-10">
                          <div className="form-check d-flex align-items-center form-switch">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="flexSwitchCheckChecked_17"
                              checked={isChecked}
                              onChange={handleCheckboxChange}
                            />
                            <label
                              className="form-check-label ms-4"
                              htmlFor="flexSwitchCheckChecked_17"
                            >
                              View & download reports
                            </label>
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

      {/* <!-- Modal --> */}
      <div
        className="modal fade"
        id="dissolveModal"
        tabIndex="-1"
        aria-labelledby="dissolveLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-body">
              <div className="text-center">
                <img
                  src="/images/delete-icon.svg"
                  className="img-fluid mb-3"
                  alt="delete an account"
                />
              </div>
              <p className="mb-4 modal-text text-center text-black custom-text">
                Are you sure you want to Remove Dorothy Ogenekaro (Board or
                Enquiry) from{" "}
                <span className="text-bold">
                  Health issues in South South Board of enquiry{" "}
                </span>
              </p>

              <button className="btn btn-size btn-main-danger w-100 mb-3">
                Remove admin
              </button>

              <button
                className="btn btn btn-size w-100 btn-main-outline-primary px-3"
                data-bs-dismiss="modal"
                aria-label="Close"
              >
                Cancel
              </button>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default Users;
