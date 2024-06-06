import React from "react";

const PasswordSet = () => {
  return (
    <>
      <div className="auth-container d-flex align-items-center justify-content-center vh-100">
        <div className="container">
          <div className="row">
            <div className="col-lg-4 mx-auto">
              <div className="text-center">
                <img
                  src="/images/success-icon.svg"
                  className="img-fluid mb-3"
                  alt="password"
                />
              </div>
              <div className="text-center">
                <h1 className="heading">Password Set</h1>
                <p className="text-muted-2">
                  Your password has been successfully set.Click below to enter
                  your account
                </p>
              </div>
            </div>
          </div>

          <div className="row">
            <div className="col-lg-4 mx-auto">
              <div className="mt-5">
                <a
                  href="profile-setup.php"
                  className="btn btn-size btn-main-primary w-100"
                >
                  Go to account
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default PasswordSet;
