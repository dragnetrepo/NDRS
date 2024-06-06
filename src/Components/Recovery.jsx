import React, { useContext } from "react";
import { useState } from "react";
import { useNavigate } from "react-router-dom";
import { AppContext } from "../App";

const Recovery = () => {
  const { recovery, setRecovery } = useContext(AppContext);
  const navigate = useNavigate();
  console.log(recovery);
  const onHandleChange = (e) => {
    setRecovery({ ...recovery, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

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
  };

  return (
    <>
      <div className="auth-container d-flex align-items-center justify-content-center vh-100">
        <div className="container">
          <div className="row">
            <div className="col-lg-5 mx-auto">
              <div className="card border-0 custom-card">
                <div className="card-body">
                  <div className="text-center">
                    <img
                      src="/images/recovery.svg"
                      className="img-fluid mb-3"
                      alt="password"
                    />
                  </div>
                  <h1 className="heading text-center mb-3">
                    Select a recovery method
                  </h1>

                  <form
                    action="password-set-2.php"
                    method="post"
                    onSubmit={handleSubmit}
                  >
                    <div className="mb-3">
                      <label className="form-label">Email address</label>
                      <input
                        type="email"
                        className="form-control form-control-height"
                        name="email"
                        placeholder="Type in your email address"
                        onChange={onHandleChange}
                      />
                    </div>

                    <div className="border-text my-4">
                      <div className="border"></div>
                      <div className="text">Or</div>
                      <div className="border"></div>
                    </div>

                    <div className="mb-3">
                      <label className="form-label">Phone number</label>
                      <input
                        type="text"
                        className="form-control form-control-height"
                        name="phone"
                        placeholder="Type in your registered phone number"
                        onChange={onHandleChange}
                      />
                    </div>

                    <div className="mt-4">
                      <button className="btn btn-size btn-main-primary w-100">
                        Send recovery link
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default Recovery;
