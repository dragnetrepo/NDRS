import React, { useContext, useEffect, useState } from "react";
// import  NDRS_logo from '../images/NDRS-Logo.svg'
// import  setup_banner from '../images/setup-banner.png'
// import  partners from '../images/partners.png'
import { AppContext } from "../App";
import { Link, useNavigate } from "react-router-dom";
import toast from "react-hot-toast";



const ProfileSetup2 = () => {
	const navigate = useNavigate();
	const { profile, setProfile } = useContext(AppContext);
	const [unions, setUnions] = useState([])
	const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";

	const onHandleChange = (e) => {
		setProfile({ ...profile, [e.target.name]: e.target.value });
	};

	if (!profile.first_name) {
		navigate("/ProfileSetup");
	}

	const handleSubmit = async (e) => {
		e.preventDefault();
		try {
			const formData = new FormData(); // Create FormData object

			// Append each field from the unions state to the FormData object
			Object.entries(profile).forEach(([key, value]) => {
				formData.append(key, value);
			});

			const response = await fetch(baseUrl + "/api/complete-registration", {
				method: "POST",
				headers: {
					Authorization: `Bearer ${localStorage.getItem("token")}`,
				},
				body: formData,
			});

			if (!response.ok) {
				throw new Error("Network response was not ok");
			}

			const data = await response.json();
			toast.success('Registration has been completed!!!')
			navigate("/Dashboard");
		} catch (error) {
			console.error("Error fetching data:", error);
		}
	};

	useEffect(() => {
		fetchUnions();
	}, []);

	// const fetchUnions = async () => {
	// 	try {
	// 		const token = localStorage.getItem("token");
	// 		document.getElementById("unions").innerHTML = `<option value="" disabled selected>Fetching Unions...</option>`;

	// 		if (!token) {
	// 			throw new Error("User is not logged in."); // Handle case where user is not logged in
	// 		}

	// 		const res = await fetch(baseUrl + "/api/get-unions", {
	// 			headers: {
	// 				Authorization: `Bearer ${token}`,
	// 			},
	// 		});

	// 		if (!res.ok) {
	// 			throw new Error("Failed to fetch data."); // Handle failed request
	// 		}

	// 		const data = await res.json();
	// 		let results = data.data;

	// 		let html = `<option value="" disabled selected>No Union Found</option>`;

	// 		if (results.length) {
	// 			html = `<option value="" disabled selected>Select an Option</option>`;
	// 			results.forEach((item, index) => {
	// 				html += `<option value="${item._id}">${item.name}</option>`;
	// 			});
	// 		}

	// 		if (html) {
	// 			document.getElementById("unions").innerHTML = html;
	// 		}
	// 	} catch (error) {
	// 		console.error("Error fetching data:", error.message);
	// 	}
	// };

	const fetchUnions = async () => {
		try {
			const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
			const token = localStorage.getItem("token");

			if (!token) {
				throw new Error("User is not logged in."); // Handle case where user is not logged in
			}

			const res = await fetch(baseUrl + "/api/get-unions", {
				headers: {
					Authorization: `Bearer ${token}`,
				},
			});

			if (!res.ok) {
				throw new Error("Failed to fetch data."); // Handle failed request
			}

			const data = await res.json();
			setUnions(data.data);
		} catch (error) {
			console.error("Error fetching data:", error.message);
		}
	};

	const fetchUnionBranches = async () => {
		try {
			const token = localStorage.getItem("token");

			if (!token) {
				throw new Error("User is not logged in."); // Handle case where user is not logged in
			}

			let selected_union = document.getElementById("unions").value;
			profile.union = selected_union;
			document.getElementById("branches").innerHTML = `<option value="" disabled selected>Fetching Union Branches...</option>`;
			document.getElementById("organizations").innerHTML = ``;

			if (selected_union) {
				const res = await fetch(baseUrl + `/api/get-union-branches/${selected_union}`, {
					headers: {
						Authorization: `Bearer ${token}`,
					},
				});

				if (!res.ok) {
					throw new Error("Failed to fetch data."); // Handle failed request
				}

				const data = await res.json();
				let results = data.data;

				let html = `<option value="" disabled selected>No Branches Found under this union</option>`;

				if (results.length) {
					html = `<option value="" disabled selected>Select an Option</option>`;
					results.forEach((item, index) => {
						html += `<option value="${item._id}">${item.name}</option>`;
					});
				}

				if (html) {
					document.getElementById("branches").innerHTML = html;
				}
			}
			else {
				document.getElementById("branches").innerHTML = ``;
			}
		} catch (error) {
			console.error("Error fetching data:", error.message);
		}
	};

	const fetchUnionSubBranches = async () => {
		try {
			const token = localStorage.getItem("token");

			if (!token) {
				throw new Error("User is not logged in."); // Handle case where user is not logged in
			}

			let selected_union_branch = document.getElementById("branches").value;
			profile.union_branch = selected_union_branch;
			document.getElementById("organizations").innerHTML = `<option value="" disabled selected>Fetching Sub Branches...</option>`;

			if (selected_union_branch) {
				const res = await fetch(baseUrl + `/api/get-union-organizations/${selected_union_branch}`, {
					headers: {
						Authorization: `Bearer ${token}`,
					},
				});

				if (!res.ok) {
					throw new Error("Failed to fetch data."); // Handle failed request
				}

				const data = await res.json();
				let results = data.data;

				let html = `<option value="" disabled selected>No Organization Found under this Branch</option>`;

				if (results.length) {
					html = `<option value="" disabled selected>Select an Option</option>`;
					results.forEach((item, index) => {
						html += `<option value="${item._id}">${item.name}</option>`;
					});
				}

				if (html) {
					document.getElementById("organizations").innerHTML = html;
				}
			}
			else {
				document.getElementById("organizations").innerHTML = ``;
			}
		} catch (error) {
			console.error("Error fetching data:", error.message);
		}
	};

	// const handleReturnBack = async (e) => {
	// 	e.preventDefault();

	// 	navigate("/ProfileSetup");
	// }

	return (
		<>
			<div className="split-grid">
				<div className="split-grid-1 py-5 d-flex align-items-center justify-content-center bg-white">
					<div className="container">
						<div className="row">
							<div className="col-lg-7 mx-auto">
								<div className="mb-5 d-flex justify-content-between align-items-center">
									<img src="/images/NDRS-Logo.svg" className="img-fluid" alt="" />

									<div
										className="progress w-50 progress-height"
										role="progressbar"
										aria-label="Basic example"
										aria-valuenow="0"
										aria-valuemin="0"
										aria-valuemax="100"
									>
										<div
											className="progress-bar bg-success"
											style={{ width: "50%" }}
										></div>
									</div>
								</div>

								<div className="mb-4">
									<h1 className="heading">Welcome</h1>
									<p className="sub-text">
										Let’s have a couple of details to create your profile.
									</p>
								</div>

								<form onSubmit={handleSubmit}>
									<div className="mb-4">
										<label className="form-label">Union</label>
										<select className="form-control form-control-height" id="unions" name="union" onChange={fetchUnionBranches} >
											{unions.map((item) =>
												<option value={item._id} key={item._id}>{item.name}</option>
											)}
										</select>
									</div>

									<div className="mb-4">
										<label className="form-label">Union Branch</label>
										<select className="form-control form-control-height" id="branches" name="union_branch" onChange={fetchUnionSubBranches}></select>
									</div>

									<div className="mb-4">
										<label className="form-label">Organization name</label>
										<select className="form-control form-control-height" id="organizations" name="organization" onChange={onHandleChange}></select>
									</div>

									<div className="mt-4">
										<button className="btn btn-size btn-main-primary w-100" disabled={!profile.union || !profile.union_branch || !profile.organization}>
											Finish
										</button>
									</div>

									<div className="mt-4">
										<Link to="/profileSetup" className="btn btn-size btn-main-outline-primary w-100"  >
											Back
										</Link>
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
									<img src="/images/setup-banner.png" className="img-fluid" alt="" />
								</div>
								<h2 className="bold-text mb-4">
									We’re making dispute resolutions{" "}
									<span className="text-main-primary">3x easier</span>
								</h2>

								<img src="/images/partners.png" className="img-fluid" alt="" style={{ height: "100px" }} />
							</div>
						</div>
					</div>
				</div>
			</div>
		</>
	);
};

export default ProfileSetup2;
