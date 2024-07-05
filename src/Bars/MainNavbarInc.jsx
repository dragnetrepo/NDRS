import React, { useEffect, useState } from "react";
import { Link, NavLink, useLocation, useNavigate } from "react-router-dom";

const MainNavbarInc = ({ sidebar, profileUser, setloggedIn }) => {
  const location = useLocation();
  const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";

  const { pathname } = location;
  const navigate = useNavigate();
  const [unions, setUnions] = useState([]);
  const [branches, setBranches] = useState([]);
  const [organizations, setOrganizations] = useState([]);
  const [user, setuser] = useState({
    permissions: [],
  });

  useEffect(() => {
    // Retrieve the token from localStorage
    const token = localStorage.getItem("token");
    if (!token) {
      // If token is not available, navigate back to the login page
      navigate("/login");
    }
    // fetchBranches();
    // fetchOrganizations();
    // fetchUnions();

    if (!profileUser) {
      fetchProfile();
    } else {
      setuser(profileUser);
    }
    // Fetch profile data using the token or perform any other actions
  }, [navigate]);

  const handleClick = async (e) => {
    e.preventDefault();

    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + "/api/logout", {
        method: "GET",
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();
      setloggedIn(false);
      localStorage.removeItem("token");
      navigate("/login");
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  const fetchProfile = async () => {
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
    }
  };

  const fetchUnions = async () => {
    try {
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const res = await fetch(baseUrl + "/api/get-unions", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setUnions(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  return (
    <nav
      className="flex-none navbar navbar-vertical navbar-expand-lg show vh-lg-100 bg-custom-color px-0 py-2 navbar-light"
      id="sidebar"
      style={{ display: sidebar ? "block" : "none" }}
    >
      <div className="container-fluid flex-lg-column align-items-lg-start">
        <button
          className="navbar-toggler border-0"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar"
          aria-label="Toggle navigation"
        >
          <i className="bi bi-list bi-2 text-dark cursor-pointer"></i>
        </button>

        <Link className="navbar-brand me-0 text-bold" to="/dashboard">
          <img src="/images/NDRS-Logo.svg" className="img-fluid" alt="logo" />
        </Link>

        <div className="navbar-user d-lg-none">
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
        </div>

        <div
          className="offcanvas offcanvas-end bg-main-secondary px-lg-1 px-4"
          tabIndex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <div className="offcanvas-header">
            <div className="offcanvas-title flex-grow-1">
              <Link className="navbar-brand me-0 text-bold" to="/dashboard">
                <img
                  src="/images/NDRS-Logo.svg"
                  className="img-fluid"
                  alt="Logo"
                />
              </Link>
            </div>

            <i
              className="bi bi-x-lg"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></i>
          </div>
          <div className="offcanvas-body flex-column custom-offcanvas-h">
            <ul className="navbar-nav flex-column sidebar-list border-bottom py-3">
              <li className="nav-item">
                <NavLink
                  className="nav-link"
                  activeclassname="nav-active"
                  to="/dashboard"
                >
                  <img src="/images/home.svg" className="img-fluid" alt="" />{" "}
                  Dashboard
                </NavLink>
              </li>

              {user.permissions &&
                (user.permissions.includes("create dispute") ||
                  user.permissions.includes("approve dispute") ||
                  user.permissions.includes("invite dispute participants") ||
                  user.permissions.includes("change dispute case status") ||
                  user.permissions.includes("participate in resolution")) && (
                  <li className="nav-item">
                    <NavLink
                      className="nav-link"
                      activeclassname="nav-active"
                      to="/Disputes"
                    >
                      <img
                        src="/images/suitcase.svg"
                        className="img-fluid"
                        alt=""
                      />{" "}
                      Disputes
                    </NavLink>
                  </li>
                )}

              {user.permissions &&
                user.permissions.includes("participate in resolution") && (
                  <li className="nav-item">
                    <NavLink
                      className="nav-link"
                      activeclassname="nav-active"
                      to="/discussions"
                    >
                      <img
                        src="/images/chats.svg"
                        className="img-fluid"
                        alt=""
                      />{" "}
                      Discussions
                    </NavLink>
                  </li>
                )}

              {user.permissions &&
                (user.permissions.includes("create dispute") ||
                  user.permissions.includes("participate in resolution")) && (
                  <li className="nav-item">
                    <NavLink
                      className="nav-link"
                      activeclassname="nav-active"
                      to="/documents"
                    >
                      <img
                        src="/images/folder.svg"
                        className="img-fluid"
                        alt=""
                      />{" "}
                      Documents
                    </NavLink>
                  </li>
                )}
            </ul>

            <p className="mb-0 sub-text-sidebar mt-4">Tools</p>

            <ul className="navbar-nav flex-column sidebar-list list-unstyled py-3 flex-grow-1">
              {user.permissions &&
                user.permissions.includes("invite users") &&
                user.permissions.includes("edit users status") &&
                user.permissions.includes("edit roles and permissions") && (
                  <li className="nav-item">
                    <NavLink
                      className="nav-link"
                      activeclassname="nav-active"
                      to="/users"
                    >
                      <img
                        src="/images/users.svg"
                        className="img-fluid"
                        alt=""
                      />{" "}
                      Users & Groups
                    </NavLink>
                  </li>
                )}

              <li className="nav-item">
                {user.permissions &&
                (user.permissions.includes("create unions") ||
                  user.permissions.includes("edit unions")) ? (
                  <NavLink
                    className="nav-link"
                    activeclassname="nav-active"
                    to="/Unions"
                  >
                    <img
                      src="/images/branch.svg"
                      className="img-fluid"
                      alt=""
                    />{" "}
                    Unions
                  </NavLink>
                ) : user.permissions.includes("create branches") ||
                  user.permissions.includes("edit branches") ? (
                  <NavLink
                    className="nav-link"
                    activeclassname="nav-active"
                    to="/branches"
                  >
                    <img
                      src="/images/branch.svg"
                      className="img-fluid"
                      alt=""
                    />{" "}
                    Branches
                  </NavLink>
                ) : user.permissions.includes("create sub branches") ||
                  user.permissions.includes("edit sub branches") ? (
                  <NavLink
                    className="nav-link"
                    activeclassname="nav-active"
                    to="/subBranch"
                  >
                    <img
                      src="/images/branch.svg"
                      className="img-fluid"
                      alt=""
                    />{" "}
                    Organizations
                  </NavLink>
                ) : null}
              </li>

              <li className="nav-item">
                <NavLink
                  className="nav-link"
                  activeclassname="nav-active"
                  to="/notifications"
                >
                  <img src="/images/bell.svg" className="img-fluid" alt="" />{" "}
                  Notifications
                </NavLink>
              </li>

              {user.permissions &&
                (user.permissions.includes("view reports") ||
                  user.permissions.includes("download reports")) && (
                  <li className="nav-item">
                    <NavLink
                      className="nav-link"
                      activeclassname="nav-active"
                      to="/reports"
                    >
                      <img
                        src="/images/clipboard.svg"
                        className="img-fluid"
                        alt=""
                      />{" "}
                      Reports
                    </NavLink>
                  </li>
                )}
            </ul>

            <div>
              <ul className="navbar-nav flex-column sidebar-list py-3">
                <li className="nav-item">
                  <NavLink
                    className="nav-link"
                    activeclassname="nav-active"
                    to="/helpSupport"
                  >
                    <img
                      src="/images/headphones.svg"
                      className="img-fluid"
                      alt=""
                    />{" "}
                    Help & Support
                  </NavLink>
                </li>
                <li className="nav-item">
                  <NavLink
                    className="nav-link"
                    activeclassname="nav-active"
                    to="/settings"
                  >
                    <img
                      src="/images/settings.svg"
                      className="img-fluid"
                      alt=""
                    />{" "}
                    Settings
                  </NavLink>
                </li>
                <li className="nav-item" onClick={handleClick}>
                  <NavLink
                    className="nav-link"
                    activeclassname="nav-active"
                    to="/login"
                  >
                    <img
                      src="/images/log-out.svg"
                      className="img-fluid"
                      alt=""
                    />{" "}
                    Log out
                  </NavLink>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  );
};

export default MainNavbarInc;
