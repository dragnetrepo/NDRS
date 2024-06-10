import React, { useContext, useState } from "react";
import { AppContext } from "../App";
import { Link, useNavigate } from "react-router-dom";
import { useEffect } from "react";
import toast from "react-hot-toast";

function Login() {
  const { passwordField, setPasswordField } = useContext(AppContext);
  const navigate = useNavigate();
  // useEffect(() => {

  // }, [passwordField])

  const onHandleChange = (e) => {
    setPasswordField({ ...passwordField, [e.target.name]: e.target.value });
  };
  console.log(passwordField);

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + "/api/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(passwordField),
      });

      if (!response.ok) {
        throw new Error("Login failed");
      }

      // Assuming the response contains a JSON object with a token
      const data = await response.json();
      const token = data.data.token;
      const auth_email = data.data.email;

      if (data.data.page === "two-factor-auth") {
        navigate("/verification2");
        localStorage.setItem("auth_email", auth_email);
      } else if (data.data.token) {
        navigate("/Dashboard");
        localStorage.setItem("token", token);
      }
    } catch (error) {
      console.error("Error logging in:", error);
      toast.error("Email or Password is incorrect");
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
                      src="/images/user-icon.svg"
                      className="img-fluid mb-3"
                      alt="create an account"
                    />
                  </div>
                  <h1 className="heading text-center mb-3">
                    Welcome to the Nigerian Dispute Resolution System
                  </h1>
                  <p className="mb-4 text-muted-2">
                    We’ll send a code for to your provided email or mobile
                    number for verification.
                  </p>

                  <form
                    action="dashboard.php"
                    method="post"
                    onSubmit={handleSubmit}
                  >
                    <div className="mb-3">
                      <label className="form-label">
                        Email or Mobile number
                      </label>
                      <input
                        type="text"
                        className="form-control form-control-height"
                        name="email"
                        placeholder="Type in your email or mobile number"
                        value={passwordField.email}
                        onChange={onHandleChange}
                      />
                    </div>
                    <div className="mb-3">
                      <label className="form-label">Password</label>
                      <div className="input-group">
                        <input
                          type="password"
                          className="form-control border-end-0 form-control-height"
                          name="password"
                          placeholder="Type in your password"
                          onChange={onHandleChange}
                        />
                        <span className="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                          <img src="/images/eye.svg" className="img-fluid" />
                        </span>
                      </div>
                      <p className="mb-0 mt-2 text-muted-3">
                        Forgot password?{" "}
                        <Link
                          to="/recovery"
                          className="text-main-primary text-medium text-decoration-none"
                        >
                          Recover it
                        </Link>
                      </p>
                    </div>

                    <div className="mt-4">
                      <button className="btn btn-size btn-main-primary w-100">
                        Log in
                      </button>
                    </div>
                  </form>

                  <p className="mt-4 text-center text-muted-3 mb-0">
                    Are you new here?{" "}
                    <Link
                      to="/createAccount"
                      className="text-main-primary text-medium text-decoration-none"
                    >
                      Create account
                    </Link>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default Login;
