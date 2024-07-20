import React, { useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import { Link, useParams } from "react-router-dom";
import toast from "react-hot-toast";
import { useEffect } from "react";
import { ClipLoader } from "react-spinners";

const SubBranch = () => {
  const baseUrl = "https://ndrs.ng/dev";
  const { id } = useParams();
  const user_avatar = "/images/download.png";
  const [avatarImage, setAvatarImage] = useState(user_avatar);
  const [branch, setbranch] = useState([]);
  const [SubBranches, setSubBranches] = useState([]);
  const [industries, setIndustries] = useState([]);

  const [isLoading, setIsLoading] = useState(true);

  const [subBranch, setSubBranch] = useState({
    union: id,
    branch: id,
    name: "",
    acronym: "",
    industry_id: "",
    about: "",
    phone: "",
    founded_in: "",
    logo: "",
  });
  const [sidebar, setsidebar] = useState(true);

  const toggleSideBar = () => {
    setsidebar(!sidebar);
  };

  if (id) {
    useEffect(() => {
      // fetchdata(id);
      fetchBranch(id);
      fetchSubBranch(id);
      fetchIndustries();
    }, []);
  } else {
    useEffect(() => {
      fetchOrganizations();
      fetchIndustries();
    }, []);
  }

  const [searchQuery, setSearchQuery] = useState("");
  const [filteredDisputes, setFilteredDisputes] = useState([]);

  useEffect(() => {
    // Filter disputes based on search query
    setFilteredDisputes(
      SubBranches.filter((item) =>
        item.name.toLowerCase().includes(searchQuery.toLowerCase())
      )
    );
  }, [searchQuery, SubBranches]);

  const handleSearchChange = (e) => {
    setSearchQuery(e.target.value);
  };

  const [isAscending, setIsAscending] = useState(true);

  const sortSubBranch = () => {
    const sortedItems = [...SubBranches].sort((a, b) => {
      if (isAscending) {
        return a.name.localeCompare(b.name);
      } else {
        return b.name.localeCompare(a.name);
      }
    });
    setSubBranches(sortedItems);
    setIsAscending(!isAscending);
  };

  const fetchBranch = async (id) => {
    try {
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const res = await fetch(baseUrl + `/api/union/branch/${id}`, {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      subBranch.union = data.data.union_id;
      setbranch(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const fetchOrganizations = async () => {
    try {
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const res = await fetch(baseUrl + "/api/union/organizations", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setSubBranches(data.data);
      setbranch(data.branch);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    } finally {
      setIsLoading(false);
    }
  };

  const fetchIndustries = async () => {
    try {
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const res = await fetch(baseUrl + "/api/get-industries", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setIndustries(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    }
  };

  const fetchSubBranch = async (id) => {
    try {
      const token = localStorage.getItem("token");

      if (!token) {
        throw new Error("User is not logged in."); // Handle case where user is not logged in
      }

      const res = await fetch(baseUrl + `/api/get-union-organizations/${id}`, {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setSubBranches(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    } finally {
      setIsLoading(false);
    }
  };

  const onHandleChange = (e) => {
    setSubBranch({ ...subBranch, [e.target.name]: e.target.value });
  };

  const handleAvatarChange = (e) => {
    const file = e.target.files[0];
    const formData = new FormData();
    formData.append("file", file);

    const image = URL.createObjectURL(file);
    setAvatarImage(image);

    setSubBranch((prevFormData) => ({ ...prevFormData, logo: file }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const formData = new FormData(); // Create FormData object

      // Append each field from the unions state to the FormData object
      Object.entries(subBranch).forEach(([key, value]) => {
        formData.append(key, value);
      });

      const baseUrl = "https://ndrs.ng/dev";
      const response = await fetch(baseUrl + "/api/union/sub-branch/create", {
        method: "POST",
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: formData, // Pass FormData object as the body
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();
      setSubBranch({
        name: "",
        acronym: "",
        industry_id: "",
        about: "",
        phone: "",
        founded_in: "",
        logo: "",
      });
      setAvatarImage("/images/download.png");
      toast.success("Sub Branch has been created successfully!");
    } catch (error) {
      console.error("Error fetching data:", error);
      toast.error("Fields are required");
    }
  };

  return (
    <>
      <div className="main-admin-container bg-light dark-mode-active">
        <div className="d-flex flex-column flex-lg-row h-lg-100">
          {/* <?php include "./components/main-navbar.inc.php"; ?> */}
          <MainNavbarInc sidebar={sidebar} />

          <div className="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">
            <TopBarInc toggleSideBar={toggleSideBar} />
            <main className="admin-content">
              <div className="header-box py-5">
                <div className="container">
                  <h2>Sub Branches</h2>
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
                              id="pills-folder-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-folder"
                              type="button"
                              role="tab"
                              aria-controls="pills-folder"
                              aria-selected="true"
                            >
                              Create
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
                              My Sub Branches
                            </button>
                          </li>
                        </ul>
                        <div className="tab-content" id="pills-tabContent">
                          <div
                            className="tab-pane fade show active"
                            id="pills-folder"
                            role="tabpanel"
                            aria-labelledby="pills-folder-tab"
                            tabindex="0"
                          >
                            <div className="row my-4">
                              <div className="col-lg-3">
                                <div
                                  className="nav flex-column tab-item nav-pills gap-10"
                                  id="v-pills-tab"
                                  role="tablist"
                                  aria-orientation="vertical"
                                >
                                  <button
                                    className="nav-link tab-v text-start active"
                                    id="v-pills-single-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#v-pills-single"
                                    type="button"
                                    role="tab"
                                    aria-controls="v-pills-single"
                                    aria-selected="true"
                                  >
                                    Single Sub Branch upload
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
                                    id="v-pills-single"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-single-tab"
                                    tabIndex="0"
                                  >
                                    <div className="card mb-4">
                                      <div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
                                        <h3 className="mb-lg-0 mb-3">
                                          Single Sub Branch upload
                                        </h3>
                                        <a
                                          href=""
                                          className="btn btn-size btn-main-primary"
                                          onClick={handleSubmit}
                                          disabled={
                                            !subBranch.name ||
                                            !subBranch.founded_in ||
                                            !subBranch.industry_id ||
                                            !subBranch.phone ||
                                            !subBranch.about
                                          }
                                        >
                                          Save
                                        </a>
                                      </div>
                                      <div className="card-body p-4">
                                        <form>
                                          <div className="row mt-4">
                                            <div className="col-lg-12">
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Union name
                                                </label>
                                                <input
                                                  type="text"
                                                  className="form-control form-control-height"
                                                  name="union"
                                                  key={branch.union_id}
                                                  value={branch.union_name}
                                                  disabled
                                                />
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Branch name
                                                </label>
                                                <input
                                                  type="text"
                                                  className="form-control form-control-height"
                                                  placeholder="Enter branch name"
                                                  name="branch"
                                                  key={branch._id}
                                                  value={branch.name}
                                                  disabled
                                                />
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Sub Branch name
                                                </label>
                                                <input
                                                  type="text"
                                                  className="form-control form-control-height"
                                                  placeholder="Enter branch name"
                                                  name="name"
                                                  value={subBranch.name}
                                                  onChange={onHandleChange}
                                                />
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label d-block">
                                                  Branch display picture
                                                </label>
                                                <label
                                                  htmlFor="profile"
                                                  className="position-relative"
                                                >
                                                  <input
                                                    type="file"
                                                    id="profile"
                                                    style={{ display: "none" }}
                                                    onChange={
                                                      handleAvatarChange
                                                    }
                                                    name="logo"
                                                  />
                                                  <div className="main-avatar mx-auto">
                                                    <img
                                                      src={
                                                        avatarImage ||
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
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Union Acronym (if applicable)
                                                </label>
                                                <input
                                                  type="text"
                                                  className="form-control form-control-height"
                                                  placeholder="Enter branch Acronym"
                                                  name="acronym"
                                                  value={subBranch.acronym}
                                                  onChange={onHandleChange}
                                                />
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Founded in
                                                </label>
                                                <input
                                                  type="text"
                                                  className="form-control form-control-height"
                                                  placeholder=""
                                                  name="founded_in"
                                                  value={subBranch.founded_in}
                                                  onChange={onHandleChange}
                                                />
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Industry
                                                </label>
                                                <select
                                                  className="form-control form-control-height"
                                                  id="industriy"
                                                  name="industry_id"
                                                  onChange={onHandleChange}
                                                  value={subBranch.industry_id}
                                                >
                                                  <option value="default">
                                                    --Choose--
                                                  </option>
                                                  {industries.map((item) => (
                                                    <option
                                                      value={item._id}
                                                      key={item._id}
                                                    >
                                                      {item.name}
                                                    </option>
                                                  ))}
                                                </select>
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  Phone
                                                </label>
                                                <input
                                                  type="text"
                                                  className="form-control form-control-height"
                                                  placeholder=""
                                                  name="phone"
                                                  value={subBranch.phone}
                                                  onChange={onHandleChange}
                                                />
                                              </div>
                                              <div className="mb-4">
                                                <label className="form-label">
                                                  About
                                                </label>
                                                <textarea
                                                  className="form-control"
                                                  rows="4"
                                                  name="about"
                                                  value={subBranch.about}
                                                  onChange={onHandleChange}
                                                ></textarea>
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
                            <div
                              className="tab-pane fade"
                              id="pills-document"
                              role="tabpanel"
                              aria-labelledby="pills-document-tab"
                              tabindex="0"
                            >
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
                                      value={searchQuery}
                                      onChange={handleSearchChange}
                                    />
                                  </div>
                                </div>

                                <div className="col-lg-7">
                                  <div className="d-flex align-items-center justify-content-between gap-15">
                                    <div className="d-flex">
                                      <a
                                        className="btn btn-size btn-outline-light text-medium px-3 me-lg-3"
                                        onClick={sortSubBranch}
                                      >
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
                                      Sub branch: {SubBranches?.length}
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
                                        <th scope="col">Unions</th>
                                        <th scope="col">Assigned Admin</th>
                                        <th scope="col">Industry</th>
                                        <th scope="col">Date added</th>
                                        <th scope="col">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      {filteredDisputes.map((item) => (
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
                                              className="d-flex align-items-center avatar-holder"
                                              key={item._id}
                                            >
                                              <div className="position-relative">
                                                <div className="avatar-sm flex-shrink-0">
                                                  <img
                                                    src={item.logo}
                                                    className="img-fluid object-position-center object-fit-cover w-100 h-100"
                                                    alt="Avatar"
                                                  />
                                                </div>
                                              </div>
                                              <div className="ms-2 flex-grow-1">
                                                <div className="d-flex justify-content-between align-items-center mb-2">
                                                  <div className="mb-0 d-flex align-items-center">
                                                    <div className="heading-text">
                                                      {item.name}
                                                      <span className="text-muted-3">
                                                        ({item.acronym})
                                                      </span>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </td>

                                          <td>
                                            <p>No admin has been invited</p>
                                          </td>

                                          <td>{item.industry}</td>
                                          <td>{item.date_added}</td>

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
                                              <ul
                                                className="dropdown-menu border-radius action-menu-2"
                                                // onClick={onUniones3}
                                              >
                                                <li>
                                                  <Link
                                                    to={`/subBranchDetails/${item._id}`}
                                                    className="dropdown-item"
                                                  >
                                                    View details
                                                  </Link>
                                                </li>
                                              </ul>
                                            </div>
                                          </td>
                                        </tr>
                                      ))}
                                    </tbody>
                                  </table>
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
                    />
                  </div>
                </div>

                <div className="col-lg-5">
                  <div className="d-flex align-items-center justify-content-between gap-15">
                    <select className="form-control form-control-height w-50">
                      <option selected hidden>
                        Select role
                      </option>
                      <option>Claimants</option>
                      <option>Respondents</option>
                      <option>Minsitry Admin</option>
                      <option>National Union Admin</option>
                      <option>Union Branch Admin</option>
                      <option>Employers (Companies & Organizations) </option>
                      <option>Staff (Union Members) </option>
                      <option>Conciliators & Arbitrators</option>
                      <option>Mediators</option>
                      <option>Industrial Arbitration Panel (Tribunal)</option>
                      <option>Board of Enquiry</option>
                      <option>National Industrial Courts</option>
                    </select>

                    <a
                      href="#"
                      className="btn btn-size btn-main-primary"
                      disabled
                    >
                      Send Invite
                    </a>
                  </div>
                </div>
              </div>

              <p className="text-medium">Union Admins</p>

              <div className="row">
                <div className="col-lg-12">
                  <table className="table table-list">
                    <thead className="table-light">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date added</th>
                        <th scope="col">Role</th>
                        <th scope="col"></th>
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
                                src="/images/bin.svg"
                                className="img-fluid"
                                alt="bin"
                              />
                            </button>
                            <ul className="dropdown-menu border-radius action-menu-2">
                              <li>
                                <a
                                  className="dropdown-item"
                                  href="disputesDetails"
                                >
                                  View details
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
                              <h5 className="mb-0">Salim Mustapha</h5>
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
                                src="/images/bin.svg"
                                className="img-fluid"
                                alt="bin"
                              />
                            </button>
                            <ul className="dropdown-menu border-radius action-menu-2">
                              <li>
                                <a
                                  className="dropdown-item"
                                  href="disputesDetails"
                                >
                                  View details
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
                              <h5 className="mb-0">Salim Mustapha</h5>
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
                                src="/images/bin.svg"
                                className="img-fluid"
                                alt="bin"
                              />
                            </button>
                            <ul className="dropdown-menu border-radius action-menu-2">
                              <li>
                                <a
                                  className="dropdown-item"
                                  href="disputesDetails"
                                >
                                  View details
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
                              <h5 className="mb-0">Salim Mustapha</h5>
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
                                src="/images/bin.svg"
                                className="img-fluid"
                                alt="bin"
                              />
                            </button>
                            <ul className="dropdown-menu border-radius action-menu-2">
                              <li>
                                <a
                                  className="dropdown-item"
                                  href="disputesDetails"
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
                        <h4 className="">No admins found</h4>

                        <p className="text-muted-3">
                          Enter an admins email and role to send invite
                        </p>

                        <div className="text-center">
                          <img
                            src="/images/no-found.svg"
                            className="img-fluid"
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
                Are you sure you want send an invite to
              </h1>
              <p className="mb-4 modal-text text-center">
                jamesomogiafo@gmail.com{" "}
                <span className="text-bold text-darken">
                  as Union Branch Admin for
                </span>{" "}
                University of Lagos{" "}
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
        id="previewModal"
        tabindex="-1"
        aria-labelledby="previewModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered modal-xl">
          <div className="modal-content p-lg-4 border-0">
            <div className="modal-header">
              <div>
                <h1 className="modal-title mb-1 fs-5">
                  Preview Uploaded Unions
                </h1>
                <p className="text-muted-3">Unions: 43</p>
              </div>
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
                    <th scope="col">Unions</th>
                    <th scope="col">Industry</th>
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
                              src="/images/ipman.svg"
                              className="img-fluid object-position-center object-fit-cover w-100 h-100"
                              alt="Avatar"
                            />
                          </div>
                        </div>
                        <div className="ms-2 text-muted-3">
                          <p className="text-darken mb-0">
                            Nigeria Union of Petroleum and Natural Gas Workers
                          </p>
                          <span className="text-muted-3">(NUPENG)</span>
                        </div>
                      </div>
                    </td>
                    <td>Oil & Gas</td>
                    <td>Feb 4 2024</td>
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
                  <img src="/images/prev.svg" className="img-fluid" /> Previous
                </button>
                <button className="btn btn-outline-light text-medium">
                  Next <img src="/images/next.svg" className="img-fluid" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default SubBranch;
