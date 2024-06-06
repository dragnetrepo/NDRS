import React, { useContext, useState } from "react";
import { AppContext } from "../App";
import { useNavigate } from "react-router-dom";
import toast from "react-hot-toast";

const Verification = () => {
  const navigate = useNavigate();
  // const [token, setToken] = useState('');

  // const fetchData = async () => {
  //   try {
  //     const baseUrl = 'https://phpstack-1245936-4460801.cloudwaysapps.com/dev'
  //     const url = `${baseUrl}/api/verify-password-token?invite-token=${token}`;

  //     const response = await fetch(url);

  //     if (!response.ok) {
  //       throw new Error('Network response was not ok');
  //     }

  //     const data = await response.json();
  //     console.log(data);
  //   } catch (error) {
  //     console.error('Error fetching data:', error);
  //   }
  // }

  // const handleSubmit = (e) => {
  //   e.preventDefault();
  //   fetchData();
  // }
  const { verifyEmail, setVerifyEmail } = useContext(AppContext);

  const onHandleChange = (e) => {
    setVerifyEmail({ ...verifyEmail, [e.target.name]: e.target.value });
  };
  console.log(verifyEmail);
  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(`${baseUrl}/api/confirm-email-code`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
        body: JSON.stringify(verifyEmail),
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const data = await response.json();
      console.log(data);

      const token = data.data.token;

      // Store the token in localStorage
      localStorage.setItem("token", token);

      navigate("/CreatePassword");
    } catch (error) {
      console.error("Error fetching data:", error);
      toast.error("Please enter a valid code");
    }
    console.log(verifyEmail);
  };

  return (
    <>
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

                  <form
                    action="verification-success.php"
                    method="post"
                    onSubmit={handleSubmit}
                  >
                    <div className="mb-3">
                      <label className="form-label">6 digit code</label>
                      <div className="input-group">
                        <input
                          type="password"
                          className="form-control border-end-0 form-control-height"
                          name="code"
                          placeholder=""
                          value={verifyEmail.code}
                          onChange={onHandleChange}
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
                      href="index.php"
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
    </>
  );
};

export default Verification;
