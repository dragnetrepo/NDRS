import React, { useEffect, useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import PasswordSet from "./PasswordSet";
import { useNavigate } from "react-router-dom";
import toast from "react-hot-toast";
import { ClipLoader } from "react-spinners";

const Settings = () => {
  const navigate = useNavigate();
  const user_avatar = "/images/unilag.svg";
  const [isLoading, setIsLoading] = useState(true);
  const [avatarImage, setAvatarImage] = useState(user_avatar);
  const [user, setuser] = useState({
    first_name: "",
    last_name: "",
    phone: "",
    email: "",
    contact_address: "",
    display_picture: "",
  });

  const [changePassword, setChangePassword] = useState({
    old_password: "",
    password: "",
    password_confirmation: "",
  });

  const [deleteAccount, setDeleteaccount] = useState({
    password: "",
  });

  const [twoFactorAuth, setTwoFactorAuth] = useState(false);
  const [notificationSettings, setNotificationSettings] = useState([]);
  const [sidebar, setsidebar] = useState(true);

  const toggleSideBar = () => {
    setsidebar(!sidebar);
  };

  useEffect(() => {
    fetchdata(user, setuser);
    fetchTwoFactorAuth();
    fetchNotificationSettings();
  }, []);

  // const onHandleTwoFactorAuth = (event) => {
  //  ;
  // };

  const onHandleChangePassword = (e) => {
    setChangePassword({ ...changePassword, [e.target.name]: e.target.value });
  };

  const handleSubmitPassword = async (e) => {
    e.preventDefault();

    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + "/api/change-password", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify(changePassword),
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();

      navigate("/login");
      toast.success("Password has been Changed!");
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  const onChangeDeleteAccount = (e) => {
    setDeleteaccount({ ...deleteAccount, [e.target.name]: e.target.value });
  };

  const handleSubmitDeleteAccount = async (e) => {
    e.preventDefault();

    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + "/api/delete-account", {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
          // Accept: "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify(deleteAccount),
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();
      toast.success("Your Account has been Deleted!");
      localStorage.removeItem("token");
      navigate("/");
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  const onHandleChange = (e) => {
    setuser({ ...user, [e.target.name]: e.target.value });
  };

  const handleAvatarChange = (e) => {
    const file = e.target.files[0];
    const formData = new FormData();
    formData.append("file", file);

    const image = URL.createObjectURL(file);
    setAvatarImage(image);

    setuser((prevFormData) => ({ ...prevFormData, display_picture: file }));
  };

  const fetchdata = async () => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";

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
    } finally {
      setIsLoading(false);
    }
  };

  const updateuser = async (e, user) => {
    e.preventDefault();
    try {
      const formData = new FormData();
      Object.entries(user).forEach(([key, value]) => {
        // Check if the key is 'display_picture' and if the value is a file
        if (key === "display_picture" && value instanceof File) {
          formData.append(key, value);
        } else if (key !== "display_picture") {
          formData.append(key, value);
        }
      });

      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";

      const res = await fetch(baseUrl + "/api/profile-update", {
        method: "POST",
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: formData,
      });

      if (!res.ok) {
        throw new Error("Failed to update profile."); // Handle failed request
      }

      const data = await res.json();

      // setAvatarImage(data.display_picture || user_avatar);
      fetchdata();
      toast.success("Profile has been updated!");
      // window.location.reload();
    } catch (error) {
      console.error("Error updating profile:", error.message);
    }
  };

  const fetchTwoFactorAuth = async () => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const token = localStorage.getItem("token");

      const res = await fetch(baseUrl + "/api/settings/2fa", {
        method: "GET",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch settings.");
      }

      const data = await res.json();
      setTwoFactorAuth({
        setting: data.data["2fa"].value === "1",
      });
    } catch (error) {
      console.error("Error fetching settings:", error.message);
    }
  };

  const fetchNotificationSettings = async () => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const token = localStorage.getItem("token");

      const res = await fetch(baseUrl + "/api/notifications/settings", {
        method: "GET",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch settings.");
      }

      const data = await res.json();
      let results = data.data;
      setNotificationSettings(results);
    } catch (error) {
      console.error("Error fetching settings:", error.message);
    }
  };

  const toggleNotificationSettings = async (setting, option) => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";

      const res = await fetch(baseUrl + "/api/notifications/update-setting", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",

          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify({
          setting: setting,
          option: option,
          // option: isChecked ? "1" : "0",
        }),
      });

      if (!res.ok) {
        throw new Error("Failed to update profile."); // Handle failed request
      }

      const data = await res.json();
    } catch (error) {
      console.error("Error updating profile:", error.message);
    }
  };

  const twoFactorAuthentification = async (event) => {
    const isChecked = event.target.checked;
    setTwoFactorAuth(isChecked);
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";

      const res = await fetch(baseUrl + "/api/notifications/update-setting", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",

          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify({
          setting: "2fa",
          // option: isChecked ? "1" : "0",
        }),
      });

      if (!res.ok) {
        throw new Error("Failed to update profile."); // Handle failed request
      }

      const data = await res.json();
    } catch (error) {
      console.error("Error updating profile:", error.message);
    }
  };

  const handleViewPassword = (e) => {
    e.preventDefault();
    let password_field = e.target
      .closest(".input-group")
      .querySelector("input");
    let attribute_name = password_field.getAttribute("type");

    if (attribute_name === "password") {
      password_field.setAttribute("type", "text");
    } else {
      password_field.setAttribute("type", "password");
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
                  <h2>Settings</h2>
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
                              id="pills-personal-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-personal"
                              type="button"
                              role="tab"
                              aria-controls="pills-personal"
                              aria-selected="true"
                            >
                              Personal profile
                            </button>
                          </li>
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link"
                              id="pills-organization-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-organization"
                              type="button"
                              role="tab"
                              aria-controls="pills-organization"
                              aria-selected="false"
                            >
                              Organization profile
                            </button>
                          </li>
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
                              Notifications
                            </button>
                          </li>
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link"
                              id="pills-password-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-password"
                              type="button"
                              role="tab"
                              aria-controls="pills-password"
                              aria-selected="false"
                            >
                              Password & Security
                            </button>
                          </li>
                        </ul>

                        <div className="tab-content" id="pills-tabContent">
                          <div
                            className="tab-pane fade show active"
                            id="pills-personal"
                            role="tabpanel"
                            aria-labelledby="pills-personal-tab"
                            tabIndex="0"
                          >
                            <div className="row mt-5">
                              <div className="col-lg-8">
                                <div className="card mb-4">
                                  <div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                    <h3 className="mb-lg-0 mb-3">
                                      Personal profile
                                    </h3>
                                    <div className="d-flex align-items-center gap-15">
                                      <a href="#" className="btn-flat">
                                        Discard changes
                                      </a>
                                      <a
                                        href=""
                                        className="btn btn-size btn-main-primary"
                                        onClick={(e) =>
                                          updateuser(e, user, setuser)
                                        }
                                      >
                                        Save changes
                                      </a>
                                    </div>
                                  </div>
                                  {isLoading ? (
                                    <div
                                      className="d-flex justify-content-center align-items-center"
                                      style={{ minHeight: "80vh" }}
                                    >
                                      <ClipLoader
                                        color="#36D7B7"
                                        loading={isLoading}
                                        size={50}
                                      />
                                    </div>
                                  ) : (
                                    <div className="card-body p-4">
                                      <form>
                                        <div className="row mt-4">
                                          <div className="col-lg-3 mb-lg-0 mb-4">
                                            <label
                                              htmlFor="profile"
                                              className="position-relative"
                                            >
                                              <input
                                                type="file"
                                                id="profile"
                                                name="display_picture"
                                                style={{ display: "none" }}
                                                onChange={handleAvatarChange}
                                              />

                                              <div className="main-avatar mx-auto">
                                                <img
                                                  src={
                                                    user.display_picture ||
                                                    "/images/download.png"
                                                  }
                                                  className="img-fluid object-fit-cover object-position-center w-100 h-100"
                                                  alt=""
                                                />
                                              </div>

                                              <img
                                                src="/images/close-x.svg"
                                                className="img-fluid remove-profile cursor-pointer"
                                                alt=""
                                              />
                                            </label>
                                          </div>

                                          <div className="col-lg-9">
                                            <div className="mb-4">
                                              <label className="form-label">
                                                First name
                                              </label>
                                              <input
                                                type="text"
                                                className="form-control form-control-height"
                                                name="first_name"
                                                placeholder="Enter your first name"
                                                value={user.first_name}
                                                onChange={onHandleChange}
                                              />
                                            </div>
                                            <div className="mb-4">
                                              <label className="form-label">
                                                Surname
                                              </label>
                                              <input
                                                type="text"
                                                className="form-control form-control-height"
                                                name="last_name"
                                                placeholder="Enter your surname"
                                                value={user.last_name}
                                                onChange={onHandleChange}
                                              />
                                            </div>
                                            <div className="mb-4">
                                              <label className="form-label">
                                                Phone Number
                                              </label>
                                              <input
                                                type="text"
                                                className="form-control form-control-height"
                                                name="phone"
                                                placeholder="Enter your phone number"
                                                value={user.phone}
                                                onChange={onHandleChange}
                                              />
                                            </div>
                                            <div className="mb-4">
                                              <label className="form-label">
                                                Email address
                                              </label>
                                              <input
                                                type="email"
                                                className="form-control form-control-height"
                                                name="email"
                                                placeholder="Enter your phone number"
                                                value={user.email}
                                                onChange={onHandleChange}
                                              />
                                            </div>
                                            <div className="mb-4">
                                              <label className="form-label">
                                                Contact address
                                              </label>
                                              <input
                                                type="text"
                                                className="form-control form-control-height"
                                                name="contact_address"
                                                placeholder="Enter your phone number"
                                                value={user.contact_address}
                                                onChange={onHandleChange}
                                              />
                                            </div>
                                            {user.user_role.union_name ? (
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Union
                                                </label>
                                                <input
                                                  type="text"
                                                  className="form-control form-control-height"
                                                  placeholder="Enter your phone number"
                                                  value={
                                                    user.user_role.union_name
                                                  }
                                                  disabled
                                                  onChange={onHandleChange}
                                                />
                                              </div>
                                            ) : null}

                                            {user.user_role
                                              .union_branch_name ? (
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Union branch
                                                </label>
                                                <input
                                                  type="text"
                                                  className="form-control form-control-height"
                                                  placeholder="Enter your phone number"
                                                  value={
                                                    user.user_role
                                                      .union_branch_name
                                                  }
                                                  disabled
                                                  onChange={onHandleChange}
                                                />
                                              </div>
                                            ) : null}

                                            {user.user_role
                                              .union_sub_branch_name ? (
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Sub branch
                                                </label>
                                                <input
                                                  type="text"
                                                  className="form-control form-control-height"
                                                  placeholder="Enter your phone number"
                                                  value={
                                                    user.user_role
                                                      .union_sub_branch_name
                                                  }
                                                  disabled
                                                  onChange={onHandleChange}
                                                />
                                                <a
                                                  href="#"
                                                  className="text-main-primary"
                                                  data-bs-toggle="modal"
                                                  data-bs-target="#orgModal"
                                                >
                                                  <p className="mb-0 mt-1">
                                                    Request to change
                                                    organization
                                                  </p>
                                                </a>
                                              </div>
                                            ) : null}
                                            <div className="mb-4">
                                              <label className="form-label">
                                                Role
                                              </label>
                                              <input
                                                type="text"
                                                className="form-control form-control-height"
                                                placeholder="Enter your phone number"
                                                value={user.user_role.role_name}
                                                disabled
                                                onChange={onHandleChange}
                                              />
                                              <a
                                                href="#"
                                                className="text-main-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#roleModal"
                                              >
                                                <p className="mb-0 mt-1">
                                                  Request new role
                                                </p>
                                              </a>
                                            </div>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                  )}
                                </div>

                                <div className="card delete-card">
                                  <div className="card-body p-4">
                                    <div className="d-flex justify-content-between align-items-center flex-wrap">
                                      <div className="text-start mb-lg-0 mb-3">
                                        <h4>Delete account</h4>
                                        <p className="mb-0">
                                          Delete your account from the NDRS
                                          database?
                                        </p>
                                      </div>

                                      <button
                                        className="btn btn-outline-danger btn-size"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                      >
                                        Delete account
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div
                            className="tab-pane fade"
                            id="pills-organization"
                            role="tabpanel"
                            aria-labelledby="pills-organization-tab"
                            tabIndex="0"
                          >
                            <div className="row mt-5">
                              <div className="col-lg-8">
                                <div className="card mb-4">
                                  <div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                    <h3 className="mb-lg-0 mb-3">
                                      Organization profile
                                    </h3>
                                    <div className="d-flex align-items-center gap-15">
                                      <a
                                        href="#"
                                        className="btn-flat text-main-primary"
                                      >
                                        Discard changes
                                      </a>
                                      <a
                                        href="#"
                                        className="btn btn-size btn-main-primary"
                                        disabled
                                      >
                                        Save changes
                                      </a>
                                    </div>
                                  </div>
                                  <div className="card-body p-4">
                                    <form>
                                      <div className="row mt-4">
                                        <div className="col-lg-3 mb-lg-0 mb-4">
                                          <label
                                            htmlFor="profile"
                                            className="position-relative"
                                          >
                                            <input
                                              type="file"
                                              id="profile"
                                              style={{ display: "none" }}
                                              onChange={onHandleChange}
                                            />

                                            <div className="main-avatar mx-auto">
                                              <img
                                                src="/images/org-logo.png"
                                                className="img-fluid object-fit-cover object-position-center w-100 h-100"
                                              />
                                            </div>

                                            <img
                                              src="/images/close-x.svg"
                                              className="img-fluid remove-profile cursor-pointer"
                                            />
                                          </label>
                                        </div>

                                        <div className="col-lg-9">
                                          <div className="mb-4">
                                            <label className="form-label">
                                              Organization name
                                            </label>
                                            <input
                                              type="text"
                                              className="form-control form-control-height"
                                              placeholder="Enter your first name"
                                              value="University of Lagos"
                                              onChange={onHandleChange}
                                            />
                                          </div>

                                          <div className="mb-4">
                                            <label className="form-label">
                                              Union
                                            </label>
                                            <input
                                              type="text"
                                              className="form-control form-control-height"
                                              placeholder="Enter your phone number"
                                              value="ASUU"
                                              onChange={onHandleChange}
                                              disabled
                                            />
                                          </div>
                                          <div className="mb-4">
                                            <label className="form-label">
                                              Union branch
                                            </label>
                                            <input
                                              type="text"
                                              className="form-control form-control-height"
                                              placeholder="Enter your phone number"
                                              value="Lagos"
                                              onChange={onHandleChange}
                                              disabled
                                            />
                                          </div>

                                          <div className="mb-4">
                                            <label className="form-label">
                                              Organization phone number
                                            </label>
                                            <input
                                              type="text"
                                              className="form-control form-control-height"
                                              placeholder="Enter your phone number"
                                              value="080226648364"
                                              onChange={onHandleChange}
                                            />
                                          </div>

                                          <div className="mb-4">
                                            <label className="form-label">
                                              Email address
                                            </label>
                                            <input
                                              type="email"
                                              className="form-control form-control-height"
                                              placeholder="Enter your phone number"
                                              value="info@unilag.edu.ng"
                                              onChange={onHandleChange}
                                            />
                                          </div>

                                          <div className="mb-4">
                                            <label className="form-label">
                                              Organization address
                                            </label>
                                            <input
                                              type="text"
                                              className="form-control form-control-height"
                                              placeholder="Enter your phone number"
                                              value="University of Lagos, Akoka, Yaba, Lagos, Nigeria."
                                              onChange={onHandleChange}
                                            />
                                          </div>

                                          <div className="mb-4">
                                            <label className="form-label">
                                              Organization detail
                                            </label>
                                            <textarea
                                              className="form-control"
                                              rows="4"
                                            ></textarea>
                                          </div>

                                          <div className="mb-4">
                                            <label className="form-label">
                                              Organization admins
                                            </label>
                                            <input
                                              type="email"
                                              className="form-control form-control-height"
                                              placeholder="Enter your phone number"
                                              value="University of Lagos, Akoka, Yaba, Lagos, Nigeria."
                                              onChange={onHandleChange}
                                            />
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>

                                <div className="card delete-card">
                                  <div className="card-body p-4">
                                    <div className="d-flex justify-content-between align-items-center flex-wrap">
                                      <div className="text-start mb-lg-0 mb-3">
                                        <h4>Request to Delete organization </h4>
                                        <p className="mb-0">
                                          Delete this organization from the NDRS
                                          database?
                                        </p>
                                      </div>

                                      <button
                                        className="btn btn-outline-danger btn-size"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal2"
                                      >
                                        Delete account
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div
                            className="tab-pane fade"
                            id="pills-notification"
                            role="tabpanel"
                            aria-labelledby="pills-notification-tab"
                            tabIndex="0"
                          >
                            <div className="mt-5">
                              <div className="mb-4">
                                <h4 className="text-medium">
                                  Notification settings
                                </h4>
                                <p className="mb-0 text-muted-3">
                                  We may still send you important notifcations
                                  about your account outside of your
                                  notification settings{" "}
                                </p>
                              </div>

                              <div className="row">
                                <div className="col-lg-8">
                                  {notificationSettings.length ? (
                                    notificationSettings.map((item, index) => (
                                      <div
                                        className="card card-box-view mb-4"
                                        key={item._id}
                                      >
                                        <div className="card-body p-4">
                                          <div className="d-flex justify-content-between align-items-center flex-lg-nowrap flex-wrap">
                                            <div className="text-start mb-lg-0 mb-3">
                                              <h4>{item.name}</h4>
                                              <p className="mb-0 text-muted-3">
                                                {item.description}
                                              </p>
                                            </div>

                                            <div className="d-flex flex-column gap-10">
                                              {Object.keys(item.settings).map(
                                                (setting) => (
                                                  <div className="form-check d-flex align-items-center form-switch">
                                                    <input
                                                      className="form-check-input"
                                                      type="checkbox"
                                                      role="switch"
                                                      id={`toggler-${item.key}-${setting}`}
                                                      checked={
                                                        item.settings[
                                                          setting
                                                        ] === "1"
                                                      }
                                                      onChange={(e) => {
                                                        toggleNotificationSettings(
                                                          item.key,
                                                          setting
                                                        );
                                                      }}
                                                    />
                                                    <label
                                                      className="form-check-label ms-4"
                                                      htmlFor={`toggler-${item.key}-${setting}`}
                                                    >
                                                      {setting}
                                                    </label>
                                                  </div>
                                                )
                                              )}
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    ))
                                  ) : (
                                    <div className="card card-box-view text-center mb-4">
                                      <div className="card-body p-4">
                                        <p>
                                          <i className="fa fa-triangle-exclamation fa-2x text-warning"></i>
                                        </p>
                                        <p className="h5">
                                          No notifications found
                                        </p>
                                      </div>
                                    </div>
                                  )}
                                </div>
                              </div>
                            </div>
                          </div>

                          <div
                            className="tab-pane fade"
                            id="pills-password"
                            role="tabpanel"
                            aria-labelledby="pills-password-tab"
                            tabIndex="0"
                          >
                            <div className="mt-5">
                              <div className="row">
                                <div className="col-lg-8">
                                  <div className="card card-box-view mb-4">
                                    <div className="card-body p-4">
                                      <div className="d-flex justify-content-between align-items-center flex-wrap">
                                        <div className="text-start mb-lg-0 mb-3">
                                          <h4 className="mb-0">
                                            Change password{" "}
                                          </h4>
                                        </div>

                                        <button
                                          className="btn btn-size btn-main-primary"
                                          data-bs-toggle="modal"
                                          data-bs-target="#passwordModal"
                                        >
                                          Change password
                                        </button>
                                      </div>
                                    </div>
                                  </div>

                                  <div className="card card-box-view mb-4">
                                    <div className="card-body p-4">
                                      <div className="d-flex justify-content-between align-items-center flex-lg-nowrap flex-wrap">
                                        <div className="text-start mb-lg-0 mb-3">
                                          <h4>2 Step Authentication</h4>
                                          <p className="mb-0 text-muted-2">
                                            Receive a code on your registered
                                            email or phone number before you log
                                            in to confirm that it’s really you
                                          </p>
                                        </div>

                                        <div className="form-check form-switch ms-lg-5">
                                          <input
                                            className="form-check-input"
                                            type="checkbox"
                                            role="switch"
                                            id="flexSwitchCheckChecked"
                                            checked={twoFactorAuth.setting}
                                            name="setting"
                                            onChange={twoFactorAuthentification}
                                          />
                                          <label
                                            className="form-check-label"
                                            htmlFor="flexSwitchCheckChecked"
                                          ></label>
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
                You will lose access to all disputes, documents,organizations &
                discussions on your account.
              </p>

              <form onSubmit={handleSubmitDeleteAccount}>
                <div className="mb-4">
                  <label className="form-label">Current password</label>
                  <input
                    type="password"
                    className="form-control form-control-height"
                    placeholder="Type your password"
                    name="password"
                    onChange={onChangeDeleteAccount}
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
                You will lose access to all disputes, documents,organizations &
                discussions associated with your organization if approved.
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

              <form action="" method="post" onSubmit={handleSubmitPassword}>
                <div className="mb-3">
                  <label className="form-label">Current password</label>
                  <div className="input-group">
                    <input
                      type="password"
                      className="form-control border-end-0 form-control-height"
                      placeholder="Current password"
                      name="old_password"
                      onChange={onHandleChangePassword}
                    />
                    <span
                      className="input-group-text bg-transparent cursor-pointer form-control-input-group-right"
                      onClick={(e) => handleViewPassword(e)}
                    >
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
                      name="password"
                      onChange={onHandleChangePassword}
                    />
                    <span
                      className="input-group-text bg-transparent cursor-pointer form-control-input-group-right"
                      onClick={(e) => handleViewPassword(e)}
                    >
                      <img src="/images/eye.svg" className="img-fluid" alt="" />
                    </span>
                  </div>
                </div>
                <div className="mb-3">
                  <label className="form-label">Re-enter New password</label>
                  <div className="input-group">
                    <input
                      type="password"
                      className={`form-control border-end-0 form-control-height ${
                        changePassword.password !==
                          changePassword.password_confirmation && `is-invalid`
                      }`}
                      placeholder="Re-enter password"
                      name="password_confirmation"
                      onChange={onHandleChangePassword}
                    />
                    <span
                      className="input-group-text bg-transparent cursor-pointer form-control-input-group-right"
                      onClick={(e) => handleViewPassword(e)}
                    >
                      <img src="/images/eye.svg" className="img-fluid" alt="" />
                    </span>
                    {changePassword.password !==
                      changePassword.password_confirmation && (
                      <div className="invalid-feedback">
                        Passwords do not match
                      </div>
                    )}
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
    </>
  );
};

export default Settings;
