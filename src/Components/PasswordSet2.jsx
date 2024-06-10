import React, { useContext } from "react";
import { useNavigate } from "react-router-dom";
import { AppContext } from "../App";

const PasswordSet2 = () => {
  const { recovery, setRecovery } = useContext(AppContext);
  console.log(recovery);
  const navigate = useNavigate();

  const nextPage = () => {
    navigate("/CreatePassword");
  };

  const handleClick = async () => {
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + "/api/reset-password", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(recovery),
      });

      if (!response.ok) {
        throw new Error("Login failed");
      }

      const data = await response.json();
      console.log(data);
      navigate("/PasswordSet2");
    } catch (error) {
      console.error("Error logging in:", error);
    }
    console.log(recovery);
    console.log("hello");
  };
  return (
    <>
      <div className="auth-container d-flex align-items-center justify-content-center vh-100">
        <div className="container">
          <div className="row">
            <div className="col-lg-5 mx-auto">
              <div className="text-center">
                <img
                  src="/images/success-icon.svg"
                  className="img-fluid mb-3"
                  alt="password"
                />
              </div>
              <div className="text-center">
                <h1 className="heading">Password Reset Link has been sent</h1>
                <p className="text-muted-2">
                  We’ve sent a reset link to {recovery.email}
                </p>
              </div>
            </div>
          </div>

          <div className="row">
            <div className="col-lg-5 mx-auto">
              <div className="mt-4">
                {/* <a href="create-password.php" className="btn btn-size btn-main-primary w-100" onClick={nextPage}>Got it</a> */}
                <a
                  href="/CreatePassword"
                  className="btn btn-size btn-main-primary w-100"
                >
                  Got it
                </a>
              </div>

              <div className="mt-3">
                <button
                  className="btn btn-size btn-main-outline-primary w-100"
                  onClick={handleClick}
                >
                  Resend Link
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default PasswordSet2;
