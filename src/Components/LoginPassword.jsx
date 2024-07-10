import React, { useContext } from "react";
import { useNavigate } from "react-router-dom";
import { AppContext } from "../App";

const LoginPassword = () => {
  const navigate = useNavigate();
  const { twoFactorAuth, setTwoFactorAuth } = useContext(AppContext);

  const onHandleChange = (e) => {
    const value = e.target.value;
    setTwoFactorAuth((prevState) => ({
      ...prevState,
      [e.target.name]: value,
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    // try {
    //   const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
    //   const response = await fetch(baseUrl + "/api/login", {
    //     method: "POST",
    //     headers: {
    //       "Content-Type": "application/json",
    //     },
    //     body: JSON.stringify(twoFactorAuth),
    //   });

    //   if (!response.ok) {
    //     throw new Error("Login failed");
    //   }

    //   // Assuming the response contains a JSON object with a token
    //   const data = await response.json();
    //   // const token = data.data.token;
    //   navigate("/verification2");
    navigate("/verification2");
    //   // Store the token in localStorage

    //   //   const token = data.token;

    //   //   // Store the token in localStorage or sessionStorage
    //   //   localStorage.setItem('token', token);
    // } catch (error) {
    //   console.error("Error logging in:", error);
    // }
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
                      src="/images/password.svg"
                      className="img-fluid mb-3"
                      alt="password"
                    />
                  </div>
                  <h1 className="heading text-center mb-3">
                    Enter your password
                  </h1>

                  <form action="" method="post" onSubmit={handleSubmit}>
                    <div className="mb-3">
                      <label className="form-label">Password</label>
                      <div className="input-group">
                        <input
                          type="password"
                          className="form-control border-end-0 form-control-height"
                          name="password"
                          placeholder="Enter your password"
                          onChange={onHandleChange}
                        />
                        <span className="input-group-text bg-transparent cursor-pointer form-control-input-group-right">
                          <img
                            src="/images/check-tick.svg"
                            className="img-fluid"
                            alt=""
                          />
                        </span>
                      </div>
                    </div>

                    <div className="mt-4">
                      <button className="btn btn-size btn-main-primary w-100">
                        Login
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

export default LoginPassword;
