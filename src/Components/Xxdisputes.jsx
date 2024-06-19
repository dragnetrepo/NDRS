import React from "react";

const Xxdisputes = () => {
  return (
    <>
      <div className="main-admin-container bg-light dark-mode-active">
        <div className="d-flex flex-column flex-lg-row h-lg-100">
          {/* <?php include "./components/main-navbar.inc.php"; ?> */}

          <div className="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">
            {/* <?php include "./components/top-bar.inc.php"; ?> */}

            <main className="admin-content">
              <div className="header-box py-5">
                <div className="container">
                  <h2>Disputes</h2>
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
                              All Disputes
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
                              Pending Requests
                            </button>
                          </li>
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link"
                              id="pills-ongoing-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-ongoing"
                              type="button"
                              role="tab"
                              aria-controls="pills-ongoing"
                              aria-selected="false"
                            >
                              Ongoing Disputes
                            </button>
                          </li>
                          <li className="nav-item" role="presentation">
                            <button
                              className="nav-link"
                              id="pills-resolved-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-resolved"
                              type="button"
                              role="tab"
                              aria-controls="pills-resolved"
                              aria-selected="false"
                            >
                              Resolved Disputes
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
                            id="pills-all"
                            role="tabpanel"
                            aria-labelledby="pills-all-tab"
                            tabindex="0"
                          >
                            <div className="mt-5">
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
                                            className="img-fluid me-2"
                                          />{" "}
                                          Filters
                                        </a>

                                        <button className="btn btn-size btn-outline-light text-medium px-4">
                                          <img
                                            src="/images/sort.svg"
                                            className="img-fluid me-2"
                                          />{" "}
                                          Sort
                                        </button>

                                        <button className="btn btn-size btn-main-outline-primary px-4 w-100">
                                          Create dispute
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
                                      <th scope="col">Case Title</th>
                                      <th scope="col">Case Status</th>
                                      <th scope="col">Involved Parties</th>
                                      <th scope="col"></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td scope="row">DS139</td>
                                      <td>Measures concerning trading goods</td>
                                      <td>
                                        <img
                                          src="/images/Internally-resolved.svg"
                                          className="img-fluid"
                                          alt="internally resolved"
                                        />
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                href="disputes-details.php"
                                              >
                                                View details
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td scope="row">DS139</td>
                                      <td>Measures concerning trading goods</td>
                                      <td>
                                        <img
                                          src="/images/conc.svg"
                                          className="img-fluid"
                                          alt="internally resolved"
                                        />
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                href="disputes-details.php"
                                              >
                                                View details
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td scope="row">DS139</td>
                                      <td>Measures concerning trading goods</td>
                                      <td>
                                        <img
                                          src="/images/internal-resolution.svg"
                                          className="img-fluid"
                                          alt="internally resolved"
                                        />
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                href="disputes-details.php"
                                              >
                                                View details
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td scope="row">DS139</td>
                                      <td>Measures concerning trading goods</td>
                                      <td>
                                        <img
                                          src="/images/voting-for-panel.svg"
                                          className="img-fluid"
                                          alt="Voting"
                                        />
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                href="disputes-details.php"
                                              >
                                                View details
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td scope="row">DS139</td>
                                      <td>Measures concerning trading goods</td>
                                      <td>
                                        <img
                                          src="/images/resolved-1.svg"
                                          className="img-fluid"
                                          alt="Voting"
                                        />
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                href="disputes-details.php"
                                              >
                                                View details
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td scope="row">DS139</td>
                                      <td>Measures concerning trading goods</td>
                                      <td>
                                        <img
                                          src="/images/arbitation.svg"
                                          className="img-fluid"
                                          alt="Voting"
                                        />
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                href="disputes-details.php"
                                              >
                                                View details
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td scope="row">DS139</td>
                                      <td>Measures concerning trading goods</td>
                                      <td>
                                        <img
                                          src="/images/pending.svg"
                                          className="img-fluid"
                                          alt="Voting"
                                        />
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                href="disputes-details.php"
                                              >
                                                View details
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td scope="row">DS139</td>
                                      <td>Measures concerning trading goods</td>
                                      <td>
                                        <img
                                          src="/images/court-decision.svg"
                                          className="img-fluid"
                                          alt="Voting"
                                        />
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                    Stephen Ejiro (Shafa Abuja)
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
                                                href="disputes-details.php"
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
                          <div
                            className="tab-pane fade"
                            id="pills-pending"
                            role="tabpanel"
                            aria-labelledby="pills-pending-tab"
                            tabindex="0"
                          ></div>
                          <div
                            className="tab-pane fade"
                            id="pills-ongoing"
                            role="tabpanel"
                            aria-labelledby="pills-ongoing-tab"
                            tabindex="0"
                          >
                            ...
                          </div>

                          <div
                            className="tab-pane fade"
                            id="pills-resolved"
                            role="tabpanel"
                            aria-labelledby="pills-resolved-tab"
                            tabindex="0"
                          ></div>

                          <div
                            className="tab-pane fade"
                            id="pills-internal"
                            role="tabpanel"
                            aria-labelledby="pills-internal-tab"
                            tabindex="0"
                          ></div>
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
        tabindex="-1"
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
        tabindex="-1"
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
                  <select className="form-control form-control-height">
                    <option>Type or select an option</option>
                    <option selected>UNIBEN</option>
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
        tabindex="-1"
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
        tabindex="-1"
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
        tabindex="-1"
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

              <form action="login.php" method="post">
                <div className="mb-3">
                  <label className="form-label">Current password</label>
                  <div className="input-group">
                    <input
                      type="password"
                      className="form-control border-end-0 form-control-height"
                      placeholder="Current password"
                    />
                    <span className="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                      <img src="/images/eye.svg" className="img-fluid" />
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
                      <img src="/images/eye.svg" className="img-fluid" />
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
                      <img src="/images/eye.svg" className="img-fluid" />
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

      {/* <?php include "./components/javascript.inc.php"; ?> */}
    </>
  );
};

export default Xxdisputes;
