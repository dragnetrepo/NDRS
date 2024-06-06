import React from "react";

const VerificationSuccess = () => {
  return (
    <>
      <div>
        <div className="pop-overlay">
          <div className="card pop-card border-0 py-4">
            <div className="card-body">
              <div className="text-center mb-3">
                <img src="/images/ok-icon.svg" className="img-fluid" />
              </div>
              <h3 className="pop-text">
                Great work, your email{" "}
                <span className="text-detail">balamihu@gmail.com</span> has been
                verified!
              </h3>
            </div>
          </div>
        </div>

        {/* <?php include "./components/auth-nav.inc.php"; ?> */}

        <div className="auth-container d-flex align-items-center justify-content-center vh-100">
          <div className="container">
            <div className="row">
              <div className="col-lg-6 mx-auto">
                <div className="card border-0 custom-card">
                  <div className="card-body">
                    <div className="text-center">
                      <img
                        src="/images/user-icon.svg"
                        className="img-fluid mb-3"
                        alt="create an account"
                      />
                    </div>
                    <h1 className="heading text-center mb-1">
                      Input the 6 digit code sent to
                    </h1>
                    <p className="mb-4 text-detail">balamihu@gmail.com</p>

                    <form action="verification.php" method="post">
                      <div className="mb-3">
                        <label className="form-label">6 digit code</label>
                        <div className="input-group">
                          <input
                            type="password"
                            className="form-control border-end-0 form-control-height"
                            placeholder=""
                          />
                          <span className="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                            <img
                              src="/images/check-tick.svg"
                              className="img-fluid"
                            />
                          </span>
                        </div>
                      </div>

                      <div className="mt-4">
                        <button className="btn btn-size btn-main-primary w-100">
                          Continue
                        </button>
                      </div>
                    </form>

                    <div className="text-muted-2 mt-4">
                      <p>Didn’t get a verification code?</p>
                      <ul className="mb-0">
                        <li>Make sure you entered details correctly</li>
                        <li>Check your spam folder</li>
                        <li>
                          <a href="#" className="text-main-primary">
                            Resend verification code
                          </a>
                        </li>
                      </ul>
                    </div>

                    <p className="mt-4 text-center text-muted-3 mb-0">
                      Already have an account?{" "}
                      <a
                        href="login.php"
                        className="text-main-primary text-medium text-decoration-none"
                      >
                        Log in
                      </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        {/* <?php include "./components/javascript.inc.php"; ?> */}
      </div>
    </>
  );
};

export default VerificationSuccess;
