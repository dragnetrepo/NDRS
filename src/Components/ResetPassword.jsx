import React, { useContext, useEffect, useState } from "react";
import { Link, useParams } from "react-router-dom";
import { AppContext } from "../App";
import { useNavigate } from "react-router-dom";
import toast from "react-hot-toast";
import AuthNavInc from "../Bars/AuthNavInc";
import Error404 from "./Error404";
import { ClipLoader } from "react-spinners";

const ResetPassword = () => {
    const { token } = useParams();
    const [resetPasswordDetails, setResetPasswordDetails] = useState(null);
    const [isLoading, setIsLoading] = useState(true);

    const [passwordField, setPasswordField] = useState({
        password: "",
        password_confirmation: "",
        reset_token: token,
    });
    const navigate = useNavigate();

    const onHandleChange = (e) => {
        // setFormData({...formData,  [e.target.name]:e.target.value})
        setPasswordField((prevFormData) => ({
        ...prevFormData,
        [e.target.name]: e.target.value,
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        // Check if passwords match
        if (passwordField.password !== passwordField.password_confirmation) {
        console.error("Passwords do not match");
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
        return;
        }

        try {
            const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
            const response = await fetch(baseUrl + "/api/confirm-reset-password", {
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

            const data = await response.json();

            toast.success(data.message);
            navigate("/Login");
        } catch (error) {
            console.error("Error fetching data:", error);
            toast.error("Please use a strong Password");
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

    useEffect(() => {
        fetchResetPasswordDetails();
    }, []);

    const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";

    const fetchResetPasswordDetails = async () => {
        try {
            const response = await fetch(
                baseUrl + `/api/validate-password-reset-token?reset_token=${token}`
            );
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            const data = await response.json();
            setResetPasswordDetails(data);
        } catch (error) {
            console.error("Error fetching invite details:", error);
        }
        finally {
            setIsLoading(false);
        }
    };

    return (
        <>
        {isLoading ? (
                <div className="d-flex justify-content-center align-items-center" style={{ minHeight: "80vh" }}>
                    <ClipLoader color="#36D7B7" loading={isLoading} size={50} />
                </div>
            ) : (
                <>
                    {resetPasswordDetails ? (
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
                                        Update your account password
                                    </h1>
                                    <p className="mb-1 text-muted-2">
                                        In order to <strong>protect your account</strong>, make
                                        sure your password is
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
                                            !passwordField.password_confirmation
                                            }
                                        >
                                            Update password
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
                    ) : (
                        <Error404 />
                    )}
                </>
            )}
        </>
    );
};

export default ResetPassword;
