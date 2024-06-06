import React, { useEffect } from "react";
import { useNavigate } from "react-router-dom";

const MainNavbarInc = () => {
  const navigate = useNavigate();

  useEffect(() => {
    // Retrieve the token from localStorage
    const token = localStorage.getItem("token");
    if (!token) {
      // If token is not available, navigate back to the login page
      navigate("/login");
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

      console.log(data);
      localStorage.removeItem("token");
      navigate("/");
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  return (
    <nav
      className="flex-none navbar navbar-vertical navbar-expand-lg show vh-lg-100 bg-custom-color px-0 py-2 navbar-light"
      id="sidebar"
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

        <a className="navbar-brand me-0 text-bold" href="/">
          <img src="/images/NDRS-Logo.svg" className="img-fluid" alt="logo" />
        </a>

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
              <a className="navbar-brand me-0 text-bold" href="index.php">
                <img
                  src="/images/NDRS-Logo.svg"
                  className="img-fluid"
                  alt="Logo"
                />
              </a>
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
                <a
                  className="nav-link nav-active"
                  aria-current="page"
                  href="/dashboard"
                >
                  <img src="/images/home.svg" className="img-fluid" /> Dashboard
                </a>
              </li>

              <li className="nav-item">
                {/* <a className="nav-link" href="disputes.php"><img src="/images/suitcase.svg" className="img-fluid" />  Disputes</a> */}
                <a className="nav-link" href="/Disputes">
                  <img src="/images/suitcase.svg" className="img-fluid" />{" "}
                  Disputes
                </a>
              </li>

              <li className="nav-item">
                <a className="nav-link" href="/discussions">
                  <img src="/images/chats.svg" className="img-fluid" />{" "}
                  Discussions
                </a>
              </li>

              <li className="nav-item">
                <a className="nav-link" href="/documents">
                  <img src="/images/folder.svg" className="img-fluid" />{" "}
                  Documents
                </a>
              </li>
            </ul>

            <p className="mb-0 sub-text-sidebar mt-4">Tools</p>

            <ul className="navbar-nav flex-column sidebar-list list-unstyled py-3 flex-grow-1">
              <li className="nav-item">
                <a className="nav-link" aria-current="page" href="/users">
                  <img src="/images/users.svg" className="img-fluid" /> Users &
                  Groups
                </a>
              </li>

              <li className="nav-item">
                {/* <a className="nav-link" href="union-branches.php"><img src="/images/branch.svg" className="img-fluid" />  Branches</a> */}
                <a className="nav-link" href="/UnionBranches">
                  <img src="/images/branch.svg" className="img-fluid" /> Unions
                </a>
              </li>
              {/* 
              <li className="nav-item">
                <a className="nav-link" href="/Branches">
                  <img src="/images/branch.svg" className="img-fluid" />{" "}
                  Branches
                </a>
              </li> */}

              <li className="nav-item">
                <a className="nav-link" href="/notifications">
                  <img src="/images/bell.svg" className="img-fluid" />{" "}
                  Notifications
                </a>
              </li>

              <li className="nav-item">
                <a className="nav-link" href="/reports">
                  <img src="/images/clipboard.svg" className="img-fluid" />{" "}
                  Reports
                </a>
              </li>
            </ul>

            <div>
              <ul className="navbar-nav flex-column sidebar-list py-3">
                <li className="nav-item">
                  <a
                    className="nav-link"
                    aria-current="page"
                    href="/helpSupport"
                  >
                    <img src="/images/headphones.svg" className="img-fluid" />{" "}
                    Help & Support
                  </a>
                </li>

                <li className="nav-item">
                  <a className="nav-link" href="/settings">
                    <img src="/images/settings.svg" className="img-fluid" />{" "}
                    Settings
                  </a>
                </li>

                <li className="nav-item" onClick={handleClick}>
                  <a className="nav-link" href="/">
                    <img src="/images/log-out.svg" className="img-fluid" /> Log
                    out
                  </a>
                  {/* <a className="nav-link" href=""><img src="/images/log-out.svg" className="img-fluid"/>  Log out</a> */}
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
