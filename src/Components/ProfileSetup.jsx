import React, { useEffect, useState } from "react";
// import NDRS_Logo from '../images/NDRS-Logo.svg'

// import close_x from '../images/close-x.svg'
// import setup_banner from '../images/setup-banner.png'
// import partners from '../images/partners.png'
import { useContext } from "react";
import { AppContext } from "../App";
import { useNavigate } from "react-router-dom";
import toast from "react-hot-toast";

const ProfileSetup = () => {
  const user_avatar = "/images/download.png";
  const [avatarImage, setAvatarImage] = useState(user_avatar);
  const { profile, setProfile } = useContext(AppContext);
  const { isLoading, setIsLoading } = useState(false);
  const navigate = useNavigate();

  const handleAvatarChange = (e) => {
    const file = e.target.files[0];
    const formData = new FormData();
    formData.append("file", file);

    const image = URL.createObjectURL(file);
    setAvatarImage(image);

    setProfile((prevFormData) => ({ ...prevFormData, display_picture: file }));
  };

  const onHandleChange = (e) => {
    setProfile({ ...profile, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
	setIsLoading(true);

    try {
      const formData = new FormData(); // Create FormData object

      // Append each field from the unions state to the FormData object
      Object.entries(profile).forEach(([key, value]) => {
        formData.append(key, value);
      });
      const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
      const response = await fetch(baseUrl + "/api/complete-registration", {
        method: "POST",
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: formData,
      });

      const data = await response.json();
      if (!response.ok) {
		if (Object.values(data.error).length) {
			Object.values(data.error).forEach((errorMessage, index) => {
				toast.error(errorMessage);
			});
		}
        throw new Error("Network response was not ok");
      }

      toast.success(data.message);
      navigate("/Dashboard");
    } catch (error) {
      console.error("Error fetching data:", error);
    }
	finally {
		setIsLoading(false);
	}
  };
  const invitation = localStorage.getItem("reg-type");

  const handleNext = (e) => {
    e.preventDefault();
    if (invitation === "invitation") {
      handleSubmit(e);
    } else {
      navigate("/profileSetup2");
    }
  };

  return (
    <>
      <div className="split-grid">
        <div className="split-grid-1 py-5 d-flex align-items-center justify-content-center bg-white">
          <div className="container">
            <div className="row">
              <div className="col-lg-7 mx-auto">
                <div className="mb-5 d-flex justify-content-between align-items-center">
                  <img
                    src="/images/NDRS-Logo.svg"
                    className="img-fluid"
                    alt="NDRS Logo"
                  />

                  <div
                    className="progress w-50 progress-height"
                    role="progressbar"
                    aria-label="Basic example"
                    aria-valuenow="0"
                    aria-valuemin="0"
                    aria-valuemax="100"
                  >
                    <div className="progress-bar" style={{ width: "0%" }}></div>
                  </div>
                </div>

                <div className="mb-4">
                  <h1 className="heading">Welcome</h1>
                  <p className="sub-text">
                    Let’s have a couple of details to create your profile.
                  </p>
                </div>

                <form onSubmit={handleNext}>
                  <div className="mb-4">
                    <label className="form-label">First name</label>
                    <input
                      type="text"
                      className="form-control form-control-height"
                      name="first_name"
                      placeholder="Enter your first name"
                      onChange={onHandleChange}
                      value={profile.first_name ?? ""}
                    />
                  </div>

                  <div className="mb-4">
                    <label className="form-label">Surname</label>
                    <input
                      type="text"
                      className="form-control form-control-height"
                      name="last_name"
                      placeholder="Enter your surname"
                      onChange={onHandleChange}
                      value={profile.last_name ?? ""}
                    />
                  </div>

                  <div className="mb-4">
                    <label className="form-label">Phone Number</label>
                    <input
                      type="text"
                      className="form-control form-control-height"
                      name="phone"
                      placeholder="Enter your phone number"
                      onChange={onHandleChange}
                      value={profile.phone ?? ""}
                    />
                    <p className="text-muted-2 font-sm mb-0 mt-1">
                      Additional recovery option
                    </p>
                  </div>

                  <div className="mb-4">
                    <p className="form-label mb-4">
                      Click to upload a display picture
                    </p>

                    <label htmlFor="profile" className="position-relative">
                      <input
                        type="file"
                        id="profile"
                        name="display_picture"
                        accept="image/*"
                        style={{ display: "none" }}
                        onChange={handleAvatarChange}
                      />

                      <div className="main-avatar mx-auto">
                        <img
                          src={avatarImage}
                          className="img-fluid object-fit-cover object-position-center w-100 h-100"
                          alt="User Avatar"
                        />
                      </div>

                      <img
                        src="/images/close-x.svg"
                        className="img-fluid remove-profile cursor-pointer"
                        alt="Close"
                      />
                    </label>
                  </div>

                  <div className="mt-4">
                    <button
                      className="btn btn-size btn-main-primary w-100"
                      disabled={
                        !profile.first_name ||
                        !profile.last_name ||
                        !profile.phone ||
                        !profile.display_picture
						|| 
						isLoading
                      }
                    >
                      {isLoading ? `Saving...` : `Next`}
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div className="split-grid-2 d-flex align-items-center justify-content-center">
          <div className="container">
            <div className="row">
              <div className="col-lg-10 mx-auto">
                <div className="text-center mb-4">
                  <img
                    src="/images/setup-banner.png"
                    className="img-fluid"
                    alt="Setup Banner"
                  />
                </div>
                <h2 className="bold-text mb-4">
                  We’re making dispute resolutions{" "}
                  <span className="text-main-primary">3x easier</span>
                </h2>

                <img
                  src="/images/partners.png"
                  className="img-fluid"
                  style={{ height: "100px" }}
                  alt="Partners"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default ProfileSetup;
