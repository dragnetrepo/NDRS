import React, { useContext } from "react";
import { Link, useNavigate } from "react-router-dom";
import { AppContext } from "../App";
import AuthNavInc from "../Bars/AuthNavInc";

const Verification2 = () => {
  // const [token, setToken] = useState('');
  const navigate = useNavigate();

  const { twoFactorAuth, setTwoFactorAuth } = useContext(AppContext);

  const onHandleChange = (e) => {
    const value = e.target.value;
    setTwoFactorAuth((prevState) => ({
      ...prevState,
      [e.target.name]: value,
    }));
  };

  const auth_email = localStorage.getItem("auth_email");
  twoFactorAuth.email = auth_email;

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + "/api/two-factor-authentication", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(twoFactorAuth),
      });

      const data = await response.json();

      if (!response.ok) {
        toast.error(data.message);
        throw new Error("two-factor-authentification-failed");
      }

      // Assuming the response contains a JSON object with a token
      const token = data.data.token;
      localStorage.setItem("token", token);
      localStorage.removeItem("auth_email");
      setloggedIn(true);
      navigate("/dashboard");
    } catch (error) {
      console.error("Error logging in:", error);
    }
  };

  const handleResendVerificationCode = async (e) => {
    e.preventDefault();
    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(`${baseUrl}/api/resend-two-factor-authentication`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
        body: JSON.stringify(twoFactorAuth),
      });

      const data = await response.json();

      if (!response.ok) {
        toast.error(data.message);
        throw new Error("Network response was not ok");
      }

      toast.success(data.message);
    } catch (error) {
      console.error("Error fetching data:", error);
      toast.success(error.response.message);
    }
  };

  return (
    <>
      <AuthNavInc />
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
                  <p className="mb-4 text-detail">{auth_email}</p>

                  <form action="" method="post" onSubmit={handleSubmit}>
                    <div className="mb-3">
                      <label className="form-label">6 digit code</label>
                      {/* <input type="hidden" name="email" value={auth_email} /> */}
                      <div className="input-group">
                        <input
                          type="password"
                          className="form-control border-end-0 form-control-height"
                          name="auth_code"
                          placeholder=""
                          // value={token}
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
                        <a
                          href="javascript:void(0);"
                          className="text-main-primary"
                          onClick={handleResendVerificationCode}
                        >
                          Resend verification code
                        </a>
                      </li>
                    </ul>
                  </div>

                  <p className="mt-4 text-center text-muted-3 mb-0">
                    Already have an account?{" "}
                    <Link
                      to="/login"
                      className="text-main-primary text-medium text-decoration-none"
                    >
                      Log in
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
};

export default Verification2;
