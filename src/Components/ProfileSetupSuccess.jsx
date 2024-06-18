import React from "react";

const ProfileSetupSuccess = () => {
  return (
    <>
      <div>
        <div className="pop-overlay">
          <div className="card pop-card border-0 py-4">
            <div className="card-body">
              <div className="text-center mb-3">
                <img src="/images/ok-icon.svg" className="img-fluid" alt="" />
              </div>
              <h3 className="pop-text">
                Your NDRS account has been created successfully.
              </h3>
            </div>
          </div>
        </div>
        <div className="split-grid">
          <div className="split-grid-1 py-5 d-flex align-items-center justify-content-center bg-white">
            <div className="container">
              <div className="row">
                <div className="col-lg-7 mx-auto">
                  <div className="mb-5 d-flex justify-content-between align-items-center">
                    <img src="/images/NDRS-Logo.svg" className="img-fluid" alt="" />

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
                        style="width: 50%"
                      ></div>
                    </div>
                  </div>

                  <div className="mb-4">
                    <h1 className="heading">Welcome</h1>
                    <p className="sub-text">
                      Let’s have a couple of details to create your profile.
                    </p>
                  </div>

                  <form action="" method="post">
                    <div className="mb-4">
                      <label className="form-label">Organization name</label>
                      <select className="form-control form-control-height">
                        <option>Type or select an option</option>
                        <option selected>University of Lagos</option>
                      </select>
                    </div>
                    <div className="mb-4">
                      <label className="form-label">Union Branch</label>
                      <select className="form-control form-control-height">
                        <option>Type or select an option</option>
                        <option selected>ASUU</option>
                      </select>
                    </div>
                    <div className="mb-4">
                      <label className="form-label">Union</label>
                      <select className="form-control form-control-height">
                        <option>Type or select an option</option>
                        <option selected>Lagos</option>
                      </select>
                    </div>

                    <div className="mt-4">
                      <button className="btn btn-size btn-main-primary w-100">
                        Finish
                      </button>
                    </div>

                    <div className="mt-4">
                      <a
                        href="/profileSetup"
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
                    <img src="/images/setup-banner.png" className="img-fluid" alt="" />
                  </div>
                  <h2 className="bold-text mb-4">
                    We’re making dispute resolutions{" "}
                    <span className="text-main-primary">3x easier</span>
                  </h2>

                  <img
                    src="/images/partners.png"
                    className="img-fluid" alt=""
                    style="height: 100px;"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default ProfileSetupSuccess;
