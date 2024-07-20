import React, { useContext } from "react";
// import usericon from '../images/user-icon.svg'
import { AppContext } from "../App";
import { Link, useNavigate } from "react-router-dom";
import toast from "react-hot-toast";
import AuthNavInc from "../Bars/AuthNavInc";

const CreateAccount = () => {
  const navigate = useNavigate();
  const { verifyEmail, setVerifyEmail } = useContext(AppContext);
  const { passwordField, setPasswordField } = useContext(AppContext);

  const onHandleChange = (e) => {
    setVerifyEmail({ ...verifyEmail, [e.target.name]: e.target.value });
    setPasswordField({ ...passwordField, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const baseUrl = "https://ndrs.ng/dev";
      const response = await fetch(
        `${baseUrl}/api/validate-email?email=${verifyEmail.email}`
      );

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      // const data = await response.json();

      navigate("/Verification");
    } catch (error) {
      console.error("Error fetching data:", error);
      toast.error("Please enter a valid Email");
    }
  };

  return (
    <>
      <AuthNavInc />
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
                    action="/Verification"
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
                        value={verifyEmail.email}
                        onChange={onHandleChange}
                      />
                    </div>

                    <div className="mt-4">
                      <button className="btn btn-size btn-main-primary w-100">
                        Verify
                      </button>
                    </div>
                  </form>

                  <p className="mt-4 text-center text-muted-3 mb-0">
                    Already have an account?{" "}
                    <Link
                      to="/"
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

export default CreateAccount;
