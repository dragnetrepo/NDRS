import React, { useEffect, useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import { Link } from "react-router-dom";
import { ClipLoader } from "react-spinners";

const HelpSupport = () => {
  const baseUrl = "https://ndrs.ng/dev";

  const [categories, setCategories] = useState([]);
  const [categoryPost, setCategoryPost] = useState([]);
  const [post, setPost] = useState([]);
  const [isLoading, setIsLoading] = useState(true);

  const [sidebar, setsidebar] = useState(true);

  const toggleSideBar = () => {
    setsidebar(!sidebar);
  };

  useEffect(() => {
    fetchCategories();
    // fetchCategoryPosts()
    // fetchPosts()
  }, []);

  const fetchCategories = async () => {
    try {
      const res = await fetch(baseUrl + "/api/posts/categories", {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setCategories(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    } finally {
      setIsLoading(false);
    }
  };

  // const fetchCategoryPosts = async (id) => {
  //   try {
  //     const res = await fetch(baseUrl + `/api/posts/${id}`, {
  //       headers: {
  //         Authorization: `Bearer ${localStorage.getItem("token")}`,
  //       },
  //     });

  //     if (!res.ok) {
  //       throw new Error("Failed to fetch data."); // Handle failed request
  //     }

  //     const data = await res.json();
  //     setCategoryPost(data.data);
  //   } catch (error) {
  //     console.error("Error fetching data:", error.message);
  //   }
  // };

  // const fetchPosts = async (id) => {
  //   try {
  //     const res = await fetch(baseUrl + `/api/posts/read/${id}`, {
  //       headers: {
  //         Authorization: `Bearer ${localStorage.getItem("token")}`,
  //       },
  //     });

  //     if (!res.ok) {
  //       throw new Error("Failed to fetch data."); // Handle failed request
  //     }

  //     const data = await res.json();
  //     setPost(data.data);
  //   } catch (error) {
  //     console.error("Error fetching data:", error.message);
  //   }
  // };

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
                  <h2>Help & Support</h2>
                </div>
              </div>

              <div className="content-main">
                <div className="container">
                  <div className="row">
                    <div className="col-lg-9">
                      <div className="row my-4">
                        <div className="col-lg-12">
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
                              placeholder="Search for articles"
                            />
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
                        <div className="row mt-4">
                          {categories.map((item) => (
                            <div className="col-lg-6 mb-4" key={item._id}>
                              <Link
                                to={`/helpSupport/${item._id}`}
                                className="text-decoration-none"
                              >
                                <div className="card h-100 heading-card card-hover p-3">
                                  <div className="card-body">
                                    <img
                                      src="/images/help.svg"
                                      className="img-fluid mb-3"
                                      alt=""
                                    />

                                    <h3>{item.title}</h3>
                                    <p className="help-text">
                                      {item.description}
                                    </p>

                                    <p className="help-text-sub">
                                      {item.no_of_posts} articles
                                    </p>
                                  </div>
                                </div>
                              </Link>
                            </div>
                          ))}

                          {/* <div className="col-lg-6 mb-4">
                          <Link
                            to="/HelpSupport2"
                            className="text-decoration-none"
                          >
                            <div className="card h-100 heading-card card-hover p-3">
                              <div className="card-body">
                                <img
                                  src="/images/help.svg"
                                  className="img-fluid mb-3"
                                />

                                <h3>Discussions</h3>
                                <p className="help-text">
                                  Learn how to use discussions during and after
                                  a dispute case.
                                </p>

                                <p className="help-text-sub">8 articles</p>
                              </div>
                            </div>
                          </Link>
                        </div>

                        <div className="col-lg-6 mb-4">
                          <Link
                            to="/helpSupport2"
                            className="text-decoration-none"
                          >
                            <div className="card h-100 heading-card card-hover p-3">
                              <div className="card-body">
                                <img
                                  src="/images/help.svg"
                                  className="img-fluid mb-3"
                                />

                                <h3>Disputes</h3>
                                <p className="help-text">
                                  Learn how create, monitor and track a dispute
                                  from declaration to resolution
                                </p>

                                <p className="help-text-sub">24 articles</p>
                              </div>
                            </div>
                          </Link>
                        </div>

                        <div className="col-lg-6 mb-4">
                          <Link
                            to="/helpSupport2"
                            className="text-decoration-none"
                          >
                            <div className="card h-100 heading-card card-hover p-3">
                              <div className="card-body">
                                <img
                                  src="/images/help.svg"
                                  className="img-fluid mb-3"
                                />

                                <h3>Documents</h3>
                                <p className="help-text">
                                  Learn how to manage and use your documents
                                </p>

                                <p className="help-text-sub">8 articles</p>
                              </div>
                            </div>
                          </Link>
                        </div>

                        <div className="col-lg-6 mb-4">
                          <Link
                            to="/helpSupport2"
                            className="text-decoration-none"
                          >
                            <div className="card h-100 heading-card card-hover p-3">
                              <div className="card-body">
                                <img
                                  src="/images/help.svg"
                                  className="img-fluid mb-3"
                                />

                                <h3>Settlement Bodies</h3>
                                <p className="help-text">
                                  Learn how create, monitor and track a dispute
                                  from declaration to resolution
                                </p>

                                <p className="help-text-sub">24 articles</p>
                              </div>
                            </div>
                          </Link>
                        </div>

                        <div className="col-lg-6 mb-4">
                          <Link
                            to="/helpSupport2"
                            className="text-decoration-none"
                          >
                            <div className="card h-100 heading-card card-hover p-3">
                              <div className="card-body">
                                <img
                                  src="/images/help.svg"
                                  className="img-fluid mb-3"
                                />

                                <h3>Individual Users</h3>
                                <p className="help-text">
                                  Learn how to manage and use your documents
                                </p>

                                <p className="help-text-sub">8 articles</p>
                              </div>
                            </div>
                          </Link>
                        </div> */}
                        </div>
                      )}
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
    </>
  );
};

export default HelpSupport;
