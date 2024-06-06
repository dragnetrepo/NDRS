import React, { useContext } from "react";
// import  NDRS_logo from '../images/NDRS-Logo.svg'
// import  setup_banner from '../images/setup-banner.png'
// import  partners from '../images/partners.png'
import { AppContext } from "../App";
import { useNavigate } from "react-router-dom";

const ProfileSetup2 = () => {
  const navigate = useNavigate();
  const { profile, setProfile } = useContext(AppContext);
  console.log(profile);

  const onHandleChange = (e) => {
    setProfile({ ...profile, [e.target.name]: e.target.value });
    console.log(profile);
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const formData = new FormData(); // Create FormData object

      // Append each field from the unions state to the FormData object
      Object.entries(profile).forEach(([key, value]) => {
        formData.append(key, value);
      });
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + "/api/complete-registration", {
        method: "POST",
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: formData,
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();
      console.log(data);
      // Remove the token from local storage after it's used
      // localStorage.removeItem('token')
      navigate("/Dashboard");
    } catch (error) {
      console.error("Error fetching data:", error);
    }
    console.log(profile);
  };

  return (
    <>
      <div className="split-grid">
        <div className="split-grid-1 py-5 d-flex align-items-center justify-content-center bg-white">
          <div className="container">
            <div className="row">
              <div className="col-lg-7 mx-auto">
                <div className="mb-5 d-flex justify-content-between align-items-center">
                  <img src="/images/NDRS-Logo.svg" className="img-fluid" />

                  <div
                    className="progress w-50 progress-height"
                    role="progressbar"
                    aria-label="Basic example"
                    aria-valuenow="0"
                    aria-valuemin="0"
                    aria-valuemax="100"
                  >
                    <div
                      className="progress-bar bg-success"
                      style={{ width: "50%" }}
                    ></div>
                  </div>
                </div>

                <div className="mb-4">
                  <h1 className="heading">Welcome</h1>
                  <p className="sub-text">
                    Let’s have a couple of details to create your profile.
                  </p>
                </div>

                <form
                  action="profile-setup-success.php"
                  method="post"
                  onSubmit={handleSubmit}
                >
                  <div className="mb-4">
                    <label className="form-label">Organization name</label>
                    <select
                      className="form-control form-control-height"
                      name="organization"
                      onChange={onHandleChange}
                    >
                      <option>Type or select an option</option>
                      <option>1</option>
                    </select>
                  </div>
                  <div className="mb-4">
                    <label className="form-label">Union Branch</label>
                    <select
                      className="form-control form-control-height"
                      name="union_branch"
                      onChange={onHandleChange}
                    >
                      <option>Type or select an option</option>
                      <option>1</option>
                    </select>
                  </div>
                  <div className="mb-4">
                    <label className="form-label">Union</label>
                    <select
                      className="form-control form-control-height"
                      name="union"
                      onChange={onHandleChange}
                    >
                      <option>Type or select an option</option>
                      <option>1</option>
                    </select>
                  </div>

                  <div className="mt-4">
                    <button className="btn btn-size btn-main-primary w-100">
                      Finish
                    </button>
                  </div>

                  <div className="mt-4">
                    <a
                      href="profile-setup.php"
                      className="btn btn-size btn-main-outline-primary w-100"
                    >
                      Back
                    </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div className="split-grid-2 d-flex align-items-center justify-content-center">
          <div className="container">
            <div className="row">
              <div className="col-lg-10 mx-auto">
                <div className="text-center mb-4">
                  <img src="/images/setup-banner.png" className="img-fluid" />
                </div>
                <h2 className="bold-text mb-4">
                  We’re making dispute resolutions{" "}
                  <span className="text-main-primary">3x easier</span>
                </h2>

                <img
                  src="/images/partners.png"
                  className="img-fluid"
                  style={{ height: "100px" }}
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default ProfileSetup2;
