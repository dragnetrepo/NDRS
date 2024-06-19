import React from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";

const UnionBranches3 = () => {
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
                  <h2>Unions & Branches</h2>
                </div>
              </div>

              <div className="content-main">
                <div className="container">
                  <div className="row py-4">
                    <div className="col-lg-10">
                      <div className="d-flex gap-15">
                        <div>
                          <a
                            href="#"
                            className="text-muted-4 text-decoration-none"
                          >
                            <i className="bi bi-arrow-left"></i> Go back
                          </a>
                        </div>

                        <nav aria-label="breadcrumb">
                          <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                              <a
                                href="#"
                                className="text-main-primary text-decoration-none"
                              >
                                All Unions
                              </a>
                            </li>
                            <li className="breadcrumb-item">
                              <a
                                href="#"
                                className="text-main-primary text-decoration-none"
                              >
                                Academic Staff Union of Universities
                              </a>
                            </li>
                            <li
                              className="breadcrumb-item active"
                              aria-current="page"
                            >
                              ASUU Lagos
                            </li>
                          </ol>
                        </nav>
                      </div>

                      <div className="d-flex justify-content-between align-items-center avatar-icon w-100 my-5">
                        <div className="d-flex avatar-holder">
                          <div className="position-relative">
                            <div className="avatar-md flex-shrink-0">
                              <img
                                src="/images/nnpc.svg"
                                className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                alt="Avatar"
                              />
                            </div>
                          </div>
                          <div className="ms-2 flex-grow-1">
                            <h3 className="mb-2 bold-text">ASUU Lagos</h3>
                            <p className="mb-0 text-muted-3">ASUU</p>
                          </div>
                        </div>
                      </div>

                      <div
                        className="accordion accordion-expand"
                        id="accordionUnion"
                      >
                        <div className="accordion-item mb-3">
                          <h2 className="accordion-header">
                            <button
                              className="accordion-button heading-4 text-grey"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#collapseOne"
                              aria-expanded="true"
                              aria-controls="collapseOne"
                            >
                              ASUU Lagos Sub branches
                            </button>
                          </h2>
                          <div
                            id="collapseOne"
                            className="accordion-collapse collapse show"
                            data-bs-parent="#accordionUnion"
                          >
                            <div className="accordion-body">
                              <div className="row my-4">
                                <div className="col-lg-5">
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

                                <div className="col-lg-7">
                                  <div className="d-flex align-items-center justify-content-between gap-15">
                                    <div className="d-flex">
                                      <a className="btn btn-size btn-outline-light text-medium px-3 me-lg-3">
                                        <img
                                          src="/images/filter.svg"
                                          className="img-fluid"
                                        />{" "}
                                        A-Z
                                      </a>

                                      <button className="btn btn-size btn-main-outline-primary px-3">
                                        <i className="bi bi-cloud-download me-2"></i>{" "}
                                        Export CSV
                                      </button>
                                    </div>

                                    <p className="text-end mb-0 file-count">
                                      Unions: 64
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
                                        <th scope="col">Sub branches</th>
                                        <th scope="col">Assigned Admin</th>
                                        <th scope="col">Date added</th>
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
                                        <td>
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
                                            <div className="ms-2 flex-grow-1">
                                              <div className="d-flex justify-content-between align-items-center mb-2">
                                                <div className="mb-0 d-flex align-items-center">
                                                  <div className="heading-text">
                                                    Lagos State University
                                                    (LASU)
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
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
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Role in dispute
                                                    </p>
                                                    <img
                                                      src="/images/claim.svg"
                                                      className="img-fluid"
                                                      alt="claimant"
                                                    />
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/user.svg"
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Name & Organization
                                                    </p>
                                                    <p className="mb-0">
                                                      Stephen Ejiro (Shafa
                                                      Abuja)
                                                    </p>
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/mail.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="copy"
                                                  />
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/call.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Role in dispute
                                                    </p>
                                                    <img
                                                      src="/images/claim.svg"
                                                      className="img-fluid"
                                                      alt="claimant"
                                                    />
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/user.svg"
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Name & Organization
                                                    </p>
                                                    <p className="mb-0">
                                                      Stephen Ejiro (Shafa
                                                      Abuja)
                                                    </p>
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/mail.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="copy"
                                                  />
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/call.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Role in dispute
                                                    </p>
                                                    <img
                                                      src="/images/claim.svg"
                                                      className="img-fluid"
                                                      alt="claimant"
                                                    />
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/user.svg"
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Name & Organization
                                                    </p>
                                                    <p className="mb-0">
                                                      Stephen Ejiro (Shafa
                                                      Abuja)
                                                    </p>
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/mail.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="copy"
                                                  />
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/call.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Role in dispute
                                                    </p>
                                                    <img
                                                      src="/images/claim.svg"
                                                      className="img-fluid"
                                                      alt="claimant"
                                                    />
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/user.svg"
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Name & Organization
                                                    </p>
                                                    <p className="mb-0">
                                                      Stephen Ejiro (Shafa
                                                      Abuja)
                                                    </p>
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/mail.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="copy"
                                                  />
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/call.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Role in dispute
                                                    </p>
                                                    <img
                                                      src="/images/claim.svg"
                                                      className="img-fluid"
                                                      alt="claimant"
                                                    />
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/user.svg"
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Name & Organization
                                                    </p>
                                                    <p className="mb-0">
                                                      Stephen Ejiro (Shafa
                                                      Abuja)
                                                    </p>
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/mail.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="copy"
                                                  />
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/call.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="copy"
                                                  />
                                                </div>
                                              </ul>
                                            </div>
                                          </div>
                                        </td>
                                        <td>Feb 4 2023</td>
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
                                            <div className="ms-2 flex-grow-1">
                                              <div className="d-flex justify-content-between align-items-center mb-2">
                                                <div className="mb-0 d-flex align-items-center">
                                                  <div className="heading-text">
                                                    University of Lagos (UNILAG)
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
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
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Role in dispute
                                                    </p>
                                                    <img
                                                      src="/images/claim.svg"
                                                      className="img-fluid"
                                                      alt="claimant"
                                                    />
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/user.svg"
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Name & Organization
                                                    </p>
                                                    <p className="mb-0">
                                                      Stephen Ejiro (Shafa
                                                      Abuja)
                                                    </p>
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/mail.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="copy"
                                                  />
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/call.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Role in dispute
                                                    </p>
                                                    <img
                                                      src="/images/claim.svg"
                                                      className="img-fluid"
                                                      alt="claimant"
                                                    />
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/user.svg"
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Name & Organization
                                                    </p>
                                                    <p className="mb-0">
                                                      Stephen Ejiro (Shafa
                                                      Abuja)
                                                    </p>
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/mail.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="copy"
                                                  />
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/call.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Role in dispute
                                                    </p>
                                                    <img
                                                      src="/images/claim.svg"
                                                      className="img-fluid"
                                                      alt="claimant"
                                                    />
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/user.svg"
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Name & Organization
                                                    </p>
                                                    <p className="mb-0">
                                                      Stephen Ejiro (Shafa
                                                      Abuja)
                                                    </p>
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/mail.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="copy"
                                                  />
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/call.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Role in dispute
                                                    </p>
                                                    <img
                                                      src="/images/claim.svg"
                                                      className="img-fluid"
                                                      alt="claimant"
                                                    />
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/user.svg"
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Name & Organization
                                                    </p>
                                                    <p className="mb-0">
                                                      Stephen Ejiro (Shafa
                                                      Abuja)
                                                    </p>
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/mail.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="copy"
                                                  />
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/call.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Role in dispute
                                                    </p>
                                                    <img
                                                      src="/images/claim.svg"
                                                      className="img-fluid"
                                                      alt="claimant"
                                                    />
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/user.svg"
                                                    className="img-fluid"
                                                    alt="users"
                                                  />
                                                  <div className="ms-2 flex-grow-1">
                                                    <p className="mb-1 ft-sm">
                                                      Name & Organization
                                                    </p>
                                                    <p className="mb-0">
                                                      Stephen Ejiro (Shafa
                                                      Abuja)
                                                    </p>
                                                  </div>
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/mail.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="copy"
                                                  />
                                                </div>

                                                <div className="d-flex align-items-center py-2">
                                                  <img
                                                    src="/images/call.svg"
                                                    className="img-fluid"
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
                                                    className="img-fluid"
                                                    alt="copy"
                                                  />
                                                </div>
                                              </ul>
                                            </div>
                                          </div>
                                        </td>

                                        <td>Feb 4 2023</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div className="accordion-item mb-3">
                          <h2 className="accordion-header">
                            <button
                              className="accordion-button collapsed heading-4 text-grey"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#collapseTwo"
                              aria-expanded="false"
                              aria-controls="collapseTwo"
                            >
                              ASUU Lagos Profile
                            </button>
                          </h2>
                          <div
                            id="collapseTwo"
                            className="accordion-collapse collapse"
                            data-bs-parent="#accordionUnion"
                          >
                            <div className="accordion-body">
                              <div className="mb-3">
                                <a
                                  href="#"
                                  data-bs-toggle="modal"
                                  data-bs-target="#editModal"
                                  className="btn btn-size btn-main-primary d-inline-flex"
                                >
                                  Edit Profile
                                </a>
                              </div>

                              <form>
                                <div className="row mt-4">
                                  <div className="col-lg-3 mb-lg-0 mb-4">
                                    <label className="form-label d-block">
                                      Logo
                                    </label>
                                    <label
                                      for="profile"
                                      className="position-relative"
                                    >
                                      <input
                                        type="file"
                                        id="profile"
                                        style={{ display: "none" }}
                                      />

                                      <div className="main-avatar mx-auto">
                                        <img
                                          src="/images/unilag.svg"
                                          className="img-fluid object-fit-cover object-position-center w-100 h-100"
                                        />
                                      </div>
                                    </label>
                                  </div>

                                  <div className="col-lg-9">
                                    <div className="mb-4">
                                      <label className="form-label">
                                        Sub Branch Name
                                      </label>
                                      <input
                                        type="text"
                                        className="form-control form-control-height"
                                        value="University of Lagos (UNILAG)"
                                        disabled
                                      />
                                    </div>
                                    <div className="mb-4">
                                      <label className="form-label">
                                        Sub Branch Acronym (if applicable)
                                      </label>
                                      <input
                                        type="text"
                                        className="form-control form-control-height"
                                        value="UNILAG"
                                        disabled
                                      />
                                    </div>
                                    <div className="mb-4">
                                      <label className="form-label">
                                        Branch Name
                                      </label>
                                      <input
                                        type="text"
                                        className="form-control form-control-height"
                                        disabled
                                        value="ASUU Lagos"
                                      />
                                    </div>
                                    <div className="mb-4">
                                      <label className="form-label">
                                        Industry
                                      </label>
                                      <input
                                        type="text"
                                        className="form-control form-control-height"
                                        disabled
                                        value="Education"
                                      />
                                    </div>
                                    <div className="mb-4">
                                      <label className="form-label">
                                        Union Name
                                      </label>
                                      <input
                                        type="text"
                                        className="form-control form-control-height"
                                        disabled
                                        value="Academic Staff Union of Universities (ASUU)"
                                      />
                                    </div>

                                    <div className="mb-4">
                                      <label className="form-label">
                                        About{" "}
                                      </label>
                                      <textarea
                                        className="form-control"
                                        rows="4"
                                        disabled
                                      >
                                        Nigeria Union of Journalists (NUJ) is a
                                        network of media professionals
                                        established to advance the safety and
                                        welfare of Nigerian journalists. It is
                                        an independent trade organization with
                                        no political leaning or ideological
                                        disposition. NUJ is founded in the
                                        underlying belief that speaking with one
                                        voice
                                      </textarea>
                                    </div>
                                    <div className="mb-4">
                                      <label className="form-label">
                                        Founded in
                                      </label>
                                      <input
                                        type="text"
                                        className="form-control form-control-height"
                                        value="22 October 1962"
                                        disabled
                                      />
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div className="accordion-item mb-3">
                          <h2 className="accordion-header">
                            <button
                              className="accordion-button collapsed heading-4 text-grey"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#collapseThree"
                              aria-expanded="false"
                              aria-controls="collapseThree"
                            >
                              ASUU Lagos Admins
                            </button>
                          </h2>
                          <div
                            id="collapseThree"
                            className="accordion-collapse collapse"
                            data-bs-parent="#accordionUnion"
                          >
                            <div className="accordion-body">
                              <div className="mb-3">
                                <a
                                  href="#"
                                  className="btn btn-size btn-main-primary d-inline-flex"
                                >
                                  Invite Admins
                                </a>
                              </div>

                              <table className="table table-list">
                                <thead className="table-light">
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date added</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>
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
                                          <h5 className="mb-0">
                                            Salim Mustapha
                                          </h5>
                                          <p className="mb-0 text-muted-3">
                                            salimmusty@gmail.com
                                          </p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>Feb 4 2023</td>
                                    <td>
                                      <img
                                        src="/images/claimant.svg"
                                        className="img-fluid"
                                        alt="claimant"
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
                                              href="#"
                                              data-bs-toggle="modal"
                                              data-bs-target="#removeModal"
                                            >
                                              Remove Admin
                                            </a>
                                          </li>
                                        </ul>
                                      </div>
                                    </td>
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
                                          <h5 className="mb-0">
                                            Salim Mustapha
                                          </h5>
                                          <p className="mb-0 text-muted-3">
                                            salimmusty@gmail.com
                                          </p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>Feb 4 2023</td>
                                    <td>
                                      <img
                                        src="/images/claimant.svg"
                                        className="img-fluid"
                                        alt="claimant"
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
                                              href="#"
                                              data-bs-toggle="modal"
                                              data-bs-target="#removeModal"
                                            >
                                              Remove Admin
                                            </a>
                                          </li>
                                        </ul>
                                      </div>
                                    </td>
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
                                          <h5 className="mb-0">
                                            Salim Mustapha
                                          </h5>
                                          <p className="mb-0 text-muted-3">
                                            salimmusty@gmail.com
                                          </p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>Feb 4 2023</td>
                                    <td>
                                      <img
                                        src="/images/claimant.svg"
                                        className="img-fluid"
                                        alt="claimant"
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
                                              href="#"
                                              data-bs-toggle="modal"
                                              data-bs-target="#removeModal"
                                            >
                                              Remove Admin
                                            </a>
                                          </li>
                                        </ul>
                                      </div>
                                    </td>
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
                                          <h5 className="mb-0">
                                            Salim Mustapha
                                          </h5>
                                          <p className="mb-0 text-muted-3">
                                            salimmusty@gmail.com
                                          </p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>Feb 4 2023</td>
                                    <td>
                                      <img
                                        src="/images/claimant.svg"
                                        className="img-fluid"
                                        alt="claimant"
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
                                              href="#"
                                              data-bs-toggle="modal"
                                              data-bs-target="#removeModal"
                                            >
                                              Remove Admin
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

                        <div className="accordion-item mb-3">
                          <h2 className="accordion-header">
                            <button
                              className="accordion-button collapsed heading-4 text-grey"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#collapseFour"
                              aria-expanded="false"
                              aria-controls="collapseFour"
                            >
                              ASUU Lagos Disputes
                            </button>
                          </h2>
                          <div
                            id="collapseFour"
                            className="accordion-collapse collapse"
                            data-bs-parent="#accordionUnion"
                          >
                            <div className="accordion-body">
                              <div className="table-responsive">
                                <table className="table table-list">
                                  <thead className="table-light">
                                    <tr>
                                      <th scope="col">Filing Date</th>
                                      <th scope="col">Case Number</th>
                                      <th scope="col">Involved Parties</th>
                                      <th
                                        scope="col"
                                        style={{ width: "200px" }}
                                      >
                                        Case Title
                                      </th>
                                      <th scope="col">Case Status</th>
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
                                                ASUU Awka Ibom{" "}
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
                                                ASUU Ibadan
                                              </p>
                                              <span>(IPMAN)</span>
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        Production Sharing Contracts (PSCs) 2024
                                      </td>
                                      <td>
                                        <img
                                          src="/images/Internally-resolved.svg"
                                          className="img-fluid"
                                          alt="internally resolved"
                                        />
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
                                                ASUU Awka Ibom{" "}
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
                                                ASUU Ibadan
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
                                                ASUU Awka Ibom{" "}
                                              </p>
                                              <span>(NNPC)</span>
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        Production Sharing Contracts (PSCs) 2024
                                      </td>
                                      <td>
                                        <img
                                          src="/images/Internally-resolved.svg"
                                          className="img-fluid"
                                          alt="internally resolved"
                                        />
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
        id="removeModal"
        tabindex="-1"
        aria-labelledby="removeModalLabel"
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
                Are you sure you want to Remove
              </h1>
              <p className="mb-4 modal-text text-center">
                Dorothy Ogenekaro (Union Branch Admin){" "}
                <span className="text-bold text-darken">as Admin for</span> ASUU{" "}
              </p>

              <button className="btn btn-size btn-main-danger w-100">
                Yes, Remove Admin
              </button>
            </div>
          </div>
        </div>
      </div>

      {/* <!-- Modal --> */}
      <div
        className="modal fade"
        id="editModal"
        tabindex="-1"
        aria-labelledby="editModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-lg">
          <div className="modal-content border-0 p-lg-4 p-3">
            <div className="pb-4 border-bottom heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
              <h3 className="mb-lg-0 mb-3">Edit Sub Branch</h3>
              <div className="d-flex align-items-center gap-15">
                <a href="#" className="btn btn-size btn-main-outline-primary">
                  Save Changes
                </a>
                <a href="#" className="btn btn-size btn-main-primary">
                  Discard Changes
                </a>
              </div>
            </div>
            <div className="modal-body">
              <form>
                <div className="row mt-4">
                  <div className="col-lg-3 mb-lg-0 mb-4">
                    <label className="form-label d-block">Logo</label>
                    <label for="profile" className="position-relative">
                      <input
                        type="file"
                        id="profile"
                        style={{ display: "none" }}
                      />

                      <div className="main-avatar mx-auto">
                        <img
                          src="/images/unilag.svg"
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
                      <label className="form-label">Sub Branch Name</label>
                      <input
                        type="text"
                        className="form-control form-control-height"
                        value="University of Lagos (UNILAG)"
                      />
                    </div>
                    <div className="mb-4">
                      <label className="form-label">
                        Sub Branch Acronym (if applicable)
                      </label>
                      <input
                        type="text"
                        className="form-control form-control-height"
                        value="UNILAG"
                      />
                    </div>
                    <div className="mb-4">
                      <label className="form-label">Branch Name</label>
                      <input
                        type="text"
                        className="form-control form-control-height"
                        value="ASUU Lagos"
                      />
                    </div>
                    <div className="mb-4">
                      <label className="form-label">Industry</label>
                      <input
                        type="text"
                        className="form-control form-control-height"
                        value="Education"
                      />
                    </div>
                    <div className="mb-4">
                      <label className="form-label">Union Name</label>
                      <input
                        type="text"
                        className="form-control form-control-height"
                        value="Academic Staff Union of Universities (ASUU)"
                      />
                    </div>

                    <div className="mb-4">
                      <label className="form-label">About </label>
                      <textarea className="form-control" rows="4">
                        Nigeria Union of Journalists (NUJ) is a network of media
                        professionals established to advance the safety and
                        welfare of Nigerian journalists. It is an independent
                        trade organization with no political leaning or
                        ideological disposition. NUJ is founded in the
                        underlying belief that speaking with one voice
                      </textarea>
                    </div>
                    <div className="mb-4">
                      <label className="form-label">Founded in</label>
                      <input
                        type="text"
                        className="form-control form-control-height"
                        value="22 October 1962"
                      />
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

export default UnionBranches3;
