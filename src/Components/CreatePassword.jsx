import React, { useContext, useState } from "react";
import { AppContext } from "../App";
import { useNavigate } from "react-router-dom";
import toast from "react-hot-toast";
import AuthNavInc from "../Bars/AuthNavInc";
import { ClipLoader } from "react-spinners";

const CreatePassword = () => {
  const { passwordField, setPasswordField } = useContext(AppContext);
  const navigate = useNavigate();
  const [isLoading, setIsLoading] = useState(false);

  const onHandleChange = (e) => {
    // setFormData({...formData,  [e.target.name]:e.target.value})
    setPasswordField((prevFormData) => ({
      ...prevFormData,
      [e.target.name]: e.target.value,
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setIsLoading(true);

    // Check if passwords match
    if (passwordField.password !== passwordField.password_confirmation) {
      console.error("Passwords do not match");
      setIsLoading(false);
      return;
    }

    // Check if password meets the required criteria
    const passwordRegex =
      /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%_^&*,./])[a-zA-Z\d!@#$%_^&*,./]{8,}$/;

    if (!passwordRegex.test(passwordField.password)) {
      console.error("Password does not meet the criteria");
      toast.error(
        "Password must contain alphabets, numbers & special characters and at least 8 characters"
      );
      setIsLoading(false);

      return;
    }

    try {
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + "/api/create-password", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify(passwordField),
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      // const data = await response.json();

      navigate("/ProfileSetup");
    } catch (error) {
      console.error("Error fetching data:", error);
      toast.error("Please use a strong Password");
    } finally {
      setIsLoading(false);
    }
  };

  const handleViewPassword = (e) => {
    e.preventDefault();
    let password_field = e.target
      .closest(".input-group")
      .querySelector("input");
    let attribute_name = password_field.getAttribute("type");

    if (attribute_name === "password") {
      password_field.setAttribute("type", "text");
    } else {
      password_field.setAttribute("type", "password");
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
                      src="/images/password.svg"
                      className="img-fluid mb-3"
                      alt="password"
                    />
                  </div>
                  <h1 className="heading text-center mb-3">
                    Create your account password
                  </h1>
                  <p className="mb-1 text-muted-2">
                    In order to <strong>protect your account</strong>, make sure
                    your password is
                  </p>
                  <ul className="text-muted-2">
                    <li>at least 8 characters</li>
                    <li>has alphabets, numbers & special characters</li>
                  </ul>

                  <form
                    action="password-set.php"
                    method="post"
                    onSubmit={handleSubmit}
                  >
                    <div className="mb-3">
                      <label className="form-label">New password</label>
                      <div className="input-group">
                        <input
                          type="password"
                          className="form-control border-end-0 form-control-height"
                          name="password"
                          placeholder="New password"
                          onChange={onHandleChange}
                        />
                        <span
                          className="input-group-text bg-transparent cursor-pointer form-control-input-group-right"
                          onClick={(e) => handleViewPassword(e)}
                        >
                          <img
                            src="/images/eye.svg"
                            className="img-fluid"
                            alt=""
                          />
                        </span>
                      </div>
                    </div>
                    <div className="mb-3">
                      <label className="form-label">
                        Re-enter New password
                      </label>
                      <div className="input-group">
                        <input
                          type="password"
                          className={`form-control border-end-0 form-control-height ${
                            passwordField.password !==
                              passwordField.password_confirmation &&
                            `is-invalid`
                          }`}
                          name="password_confirmation"
                          placeholder="Re-enter password"
                          onChange={onHandleChange}
                        />
                        <span
                          className="input-group-text bg-transparent cursor-pointer form-control-input-group-right"
                          onClick={(e) => handleViewPassword(e)}
                        >
                          <img
                            src="/images/eye.svg"
                            className="img-fluid"
                            alt=""
                          />
                        </span>
                        {passwordField.password !==
                          passwordField.password_confirmation && (
                          <div className="invalid-feedback">
                            Passwords do not match
                          </div>
                        )}
                      </div>
                    </div>

                    <div className="mt-4">
                      <button
                        className="btn btn-size btn-main-primary w-100"
                        disabled={
                          !passwordField.password ||
                          !passwordField.password_confirmation ||
                          isLoading
                        }
                      >
                        {isLoading ? (
                          <ClipLoader color="#547d74" size={20} />
                        ) : (
                          "Save Password"
                        )}
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

export default CreatePassword;
