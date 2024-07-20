import React, { useEffect, useState } from "react";
import { Link, useParams } from "react-router-dom";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import { ClipLoader } from "react-spinners";

const HelpSsupport2 = () => {
  const baseUrl = "https://ndrs.ng/dev";
  const { id } = useParams();
  const [categoryPost, setCategoryPost] = useState([]);
  const [singleCategory, setSingleCategory] = useState([]);
  const [post, setPost] = useState([]);
  const [sidebar, setsidebar] = useState(true);
  const [isLoading, setIsLoading] = useState(true);

  const toggleSideBar = () => {
    setsidebar(!sidebar);
  };

  useEffect(() => {
    fetchCategoryPosts(id);
    // fetchPosts(id)
    fetchSingleCategory(id);
  }, []);

  const fetchCategoryPosts = async (id) => {
    try {
      const res = await fetch(baseUrl + `/api/posts/${id}`, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setCategoryPost(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    } finally {
      setIsLoading(false);
    }
  };

  const fetchSingleCategory = async (id) => {
    try {
      const res = await fetch(baseUrl + `/api/posts/categories/${id}`, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });

      if (!res.ok) {
        throw new Error("Failed to fetch data."); // Handle failed request
      }

      const data = await res.json();
      setSingleCategory(data.data);
    } catch (error) {
      console.error("Error fetching data:", error.message);
    } finally {
      setIsLoading(false);
    }
  };

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
  //     console.log(data);
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
              {isLoading ? (
                <div
                  className="d-flex justify-content-center align-items-center"
                  style={{ minHeight: "80vh" }}
                >
                  <ClipLoader color="#36D7B7" loading={isLoading} size={50} />
                </div>
              ) : (
                <div className="content-main">
                  <div className="container">
                    <div className="row">
                      <div className="col-lg-7">
                        <div className="d-flex align-items-center gap-20 mt-4 ">
                          <Link
                            to="/helpSupport"
                            className="text-muted-4 text-decoration-none"
                          >
                            <i className="bi bi-arrow-left"></i> Go back
                          </Link>

                          <nav
                            style={{ "--bs-breadcrumb-divider": "/" }}
                            aria-label="breadcrumb"
                          >
                            <ol className="breadcrumb mb-0">
                              <li className="breadcrumb-item">
                                <Link
                                  to="/helpSupport"
                                  className="text-main-primary text-decoration-none"
                                >
                                  Help & Support
                                </Link>
                              </li>
                              <li
                                className="breadcrumb-item text-muted-3 active"
                                aria-current="page"
                              >
                                Discussions
                              </li>
                            </ol>
                          </nav>
                        </div>

                        <div className="heading-card mt-4">
                          <img
                            src="/images/help.svg"
                            className="img-fluid mb-3"
                            alt=""
                          />

                          <h3>{singleCategory.title}</h3>
                          <p className="help-text">
                            {singleCategory.description}
                          </p>

                          <p className="help-text-sub">
                            {singleCategory.no_of_posts} articles
                          </p>
                        </div>

                        <div className="accordion mt-4" id="accordionHelp">
                          {categoryPost.map((item) => (
                            <div className="accordion-item" key={item._id}>
                              <h2 className="accordion-header">
                                <button
                                  className="accordion-button"
                                  type="button"
                                  data-bs-toggle="collapse"
                                  data-bs-target={`#collapse-${item._id}`}
                                  aria-expanded="true"
                                  aria-controls={`collapse-${item._id}`}
                                >
                                  {item.title}
                                </button>
                              </h2>
                              <div
                                id={`collapse-${item._id}`}
                                className="accordion-collapse collapse"
                                data-bs-parent="#accordionHelp"
                              >
                                <div className="accordion-body">
                                  {item.content}
                                </div>
                              </div>
                            </div>
                          ))}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              )}
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

export default HelpSsupport2;
