import React, { useContext, useEffect, useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import { AppContext } from "../App";
import { Link, useNavigate, useParams } from "react-router-dom";
import toast from "react-hot-toast";

const Unions = () => {
	const navigate = useNavigate();
	const user_avatar = "/images/unilag.svg";
	const [avatarImage, setAvatarImage] = useState(user_avatar);
	const { unions, setUnions } = useContext(AppContext);
	const [unionsList, setUnionsList] = useState([]);
	const [unionInvite, seUnionInvite] = useState({
		email: "",
		role: "",
	});
	console.log(unions);

	useEffect(() => {
		fetchdata();
	}, []);

	const fetchdata = async () => {
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
			setUnionsList(data.data);
			console.log(data);
		} catch (error) {
			console.error("Error fetching data:", error.message);
		}
	};

	const onHandleChange = (e) => {
		setUnions({ ...unions, [e.target.name]: e.target.value });
		console.log(unions);
	};

	const handleAvatarChange = (e) => {
		const file = e.target.files[0];
		const formData = new FormData();
		formData.append("file", file);

		const image = URL.createObjectURL(file);
		setAvatarImage(image);

		setUnions((prevFormData) => ({ ...prevFormData, logo: file }));
		console.log(formData, image, file);
	};

	const handleSubmit = async (e) => {
		e.preventDefault();

		try {
			const formData = new FormData(); // Create FormData object

			// Append each field from the unions state to the FormData object
			Object.entries(unions).forEach(([key, value]) => {
				formData.append(key, value);
			});

			const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
			const response = await fetch(baseUrl + "/api/union/create", {
				method: "POST",
				headers: {
					Authorization: `Bearer ${localStorage.getItem("token")}`,
				},
				body: formData, // Pass FormData object as the body
			});

			if (!response.ok) {
				throw new Error("Network response was not ok");
			}

			const data = await response.json();
			console.log(data);
			toast.success("Union has been created successfully!");
			window.location.reload();
		} catch (error) {
			console.error("Error fetching data:", error);
		}
	};

	const onHandleChangeUnion = (e) => {
		seUnionInvite({ ...unionInvite, [e.target.name]: e.target.value });
		console.log(unionInvite);
	};
	console.log(unionInvite);

	const handleDelete = async (e, id, unionsList, setUnionsList) => {
		e.preventDefault();

		try {
			const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
			const response = await fetch(baseUrl + `/api/union/delete/${id}`, {
				method: "DELETE",
				headers: {
					Authorization: `Bearer ${localStorage.getItem("token")}`,
				},
				body: JSON.stringify(unionsList),
			});

			if (!response.ok) {
				throw new Error("Network response was not ok");
			}

			const data = await response.json();
			console.log(data);
			setUnionsList((prevUnionsList) =>
				prevUnionsList.filter((union) => union.id !== id)
			);
		} catch (error) {
			console.error("Error fetching data:", error);
		}
	};

	const handleUpdate = async (e, id) => {
		e.preventDefault();

		try {
			const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
			const response = await fetch(baseUrl + `/api/union/edit/${id}`, {
				method: "POST",
				headers: {
					Authorization: `Bearer ${localStorage.getItem("token")}`,
				},
				body: JSON.stringify(unions),
			});

			if (!response.ok) {
				throw new Error("Network response was not ok");
			}

			const data = await response.json();
			console.log(data);
		} catch (error) {
			console.error("Error fetching data:", error);
		}
	};
	// handleUpdate();

	return (
		<>
			<div className="main-admin-container bg-light dark-mode-active">
				<div className="d-flex flex-column flex-lg-row h-lg-100">
					<MainNavbarInc />
					<div className="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">
						<TopBarInc />
						<main className="admin-content">
							<div className="header-box py-5">
								<div className="container">
									<h2>Unions</h2>
								</div>
							</div>

							<div className="content-main">
								<div className="container">
									<div className="row">
										<div className="col-lg-12">
											<div className="margin-top-negative">
												<ul className="nav custom-tab nav-underline mb-3" id="pills-tab" role="tablist">
													<li className="nav-item" role="presentation">
														<button className="nav-link active" id="pills-folder-tab" data-bs-toggle="pill" data-bs-target="#pills-folder" type="button" role="tab" aria-controls="pills-folder" aria-selected="true">
															Create
														</button>
													</li>
													<li className="nav-item" role="presentation">
														<button className="nav-link" id="pills-document-tab" data-bs-toggle="pill" data-bs-target="#pills-document" type="button" role="tab" aria-controls="pills-document" aria-selected="false">
															All Unions
														</button>
													</li>
												</ul>

												<div className="tab-content" id="pills-tabContent">
													<div className="tab-pane fade show active" id="pills-folder" role="tabpanel" aria-labelledby="pills-folder-tab" tabIndex="0" >
														<div className="row my-4">
															<div className="col-lg-3">
																<div className="nav flex-column tab-item nav-pills gap-10" id="v-pills-tab" role="tablist" aria-orientation="vertical">
																	<button className="nav-link tab-v text-start active" id="v-pills-bulk-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bulk" type="button" role="tab" aria-controls="v-pills-bulk" aria-selected="true">
																		Bulk Union upload
																	</button>

																	<button className="nav-link tab-v text-start" id="v-pills-single-tab" data-bs-toggle="pill" data-bs-target="#v-pills-single" type="button" role="tab" aria-controls="v-pills-single" aria-selected="false">
																		Single Union upload
																	</button>
																</div>
															</div>

															<div className="col-lg-9">
																<div
																	className="tab-content"
																	id="v-pills-tabContent"
																>
																	<div className="tab-pane fade show active" id="v-pills-bulk" role="tabpanel" aria-labelledby="v-pills-bulk-tab" tabIndex="0">
																		<div className="card mb-4">
																			<div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
																				<h3 className="mb-lg-0 mb-3">
																					Bulk Invites
																				</h3>
																			</div>
																			<div className="card-body p-4">
																				<div className="row mb-4">
																					<div className="col-lg-5 mb-lg-0 mb-3">
																						<h6 className="step-text">
																							Step 1.
																						</h6>
																						<p className="text-muted-3">
																							Download the CSV template for any
																							user type or settlement bodies
																						</p>
																					</div>
																					<div className="col-lg-5 offset-lg-2">
																						<button className="btn btn-main-outline-primary btn-size">
																							Download CSV template
																						</button>
																					</div>
																				</div>

																				<div className="row mb-4">
																					<div className="col-lg-5 mb-lg-0 mb-3">
																						<h6 className="step-text">
																							Step 2.
																						</h6>
																						<p className="text-muted-3">
																							Fill in the users details into the
																							CSV file
																						</p>
																					</div>
																					<div className="col-lg-5 offset-lg-2">
																						<img
																							src="/images/csv.png"
																							className="img-fluid"
																						/>
																					</div>
																				</div>

																				<div className="row mb-4">
																					<div className="col-lg-5 mb-lg-0 mb-3">
																						<h6 className="step-text">
																							Step 3.
																						</h6>
																						<p className="text-muted-3">
																							Upload the filled CSV file
																						</p>
																					</div>
																					<div className="col-lg-5 offset-lg-2">
																						<div className="upload-box text-center px-3 py-4">
																							<div className="text-center mb-2">
																								<img
																									src="/images/file_upload_states.svg"
																									className="img-fluid"
																								/>
																							</div>
																							<p className="text-muted-3 mb-1">
																								Drag and drop to upload
																							</p>
																							<p className="font-sm text-muted">
																								CSV (max. 50mb)
																							</p>

																							<img
																								src="/images/or-line.svg"
																								className="img-fluid"
																							/>

																							<div className="mt-3">
																								<button className="btn btn-main-primary btn-size mx-auto">
																									<i className="bi bi-upload me-2"></i>{" "}
																									Upload filled CSV
																								</button>
																							</div>
																						</div>
																						<div className="upload-box upload-box-success text-center px-3 py-4">
																							<div className="text-center mb-2">
																								<img
																									src="/images/uploaded.svg"
																									className="img-fluid"
																								/>
																							</div>
																							<p className="text-dark text-medium mb-1">
																								Ministry Admins
																							</p>
																							<p className="font-sm text-muted">
																								CSV 2.63mb
																							</p>

																							<p className="text-medium">
																								<a
																									href="#"
																									data-bs-toggle="modal"
																									data-bs-target="#previewModal"
																									className="text-decoration-none text-main-primary"
																								>
																									<img
																										src="/images/eyes.svg"
																										className="img-fluid"
																									/>{" "}
																									Preview Sent Invites
																								</a>
																							</p>

																							<p className="text-medium">
																								<a
																									href="#"
																									className="text-decoration-none text-muted-3"
																								>
																									<img
																										src="/images/trash-bin.svg"
																										className="img-fluid"
																									/>{" "}
																									Clear Upload
																								</a>
																							</p>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>

																	<div className="tab-pane fade" id="v-pills-single" role="tabpanel" aria-labelledby="v-pills-single-tab" tabIndex="0">
																		<div className="card mb-4">
																			<div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
																				<h3 className="mb-lg-0 mb-3">
																					Single Union upload
																				</h3>

																				<a href="" className="btn btn-size btn-main-primary" onClick={handleSubmit}>
																					Complete Upload
																				</a>
																			</div>
																			<div className="card-body p-4">
																				<form>
																					<div className="row mt-4">
																						<div className="col-lg-12">
																							<div className="mb-4">
																								<label className="form-label d-block">
																									Union Logo
																								</label>
																								<label
																									htmlFor="profile"
																									className="position-relative"
																								>
																									<input
																										type="file"
																										id="profile"
																										style={{ display: "none" }}
																										name="logo"
																										onChange={
																											handleAvatarChange
																										}
																									/>

																									<div className="main-avatar mx-auto">
																										<img
																											src={avatarImage}
																											className="img-fluid object-fit-cover object-position-center w-100 h-100"
																										/>
																									</div>

																									<img
																										src="/images/close-x.svg"
																										className="img-fluid remove-profile cursor-pointer"
																									/>
																								</label>
																							</div>
																							<div className="mb-4">
																								<label className="form-label">
																									Union name
																								</label>
																								<input
																									type="text"
																									className="form-control form-control-height"
																									placeholder=""
																									name="name"
																									onChange={onHandleChange}
																								/>
																							</div>

																							<div className="mb-4">
																								<label className="form-label">
																									Union Acronym (if applicable)
																								</label>
																								<input
																									type="text"
																									className="form-control form-control-height"
																									placeholder=""
																									name="acronym"
																									onChange={onHandleChange}
																								/>
																							</div>

																							<div className="mb-4">
																								<label className="form-label">
																									Founded in
																								</label>
																								<input
																									type="text"
																									className="form-control form-control-height"
																									placeholder=""
																									name="founded_in"
																									onChange={onHandleChange}
																								/>
																							</div>

																							<div className="mb-4">
																								<label className="form-label">
																									Industry
																								</label>
																								<input
																									type="text"
																									className="form-control form-control-height"
																									placeholder=""
																									name="industry"
																									onChange={onHandleChange}
																								/>
																							</div>

																							<div className="mb-4">
																								<label className="form-label">
																									Headquarters
																								</label>
																								<input
																									type="text"
																									className="form-control form-control-height"
																									placeholder=""
																									name="headquarters"
																									onChange={onHandleChange}
																								/>
																							</div>

																							<div className="mb-4">
																								<label className="form-label">
																									Phone
																								</label>
																								<input
																									type="text"
																									className="form-control form-control-height"
																									placeholder=""
																									name="phone"
																									onChange={onHandleChange}
																								/>
																							</div>

																							<div className="mb-4">
																								<label className="form-label">
																									About
																								</label>
																								<textarea
																									className="form-control"
																									rows="4"
																									name="about"
																									onChange={onHandleChange}
																								></textarea>
																							</div>

																							<div className="mb-4">
																								<div className="d-flex justify-content-between align-items-center">
																									<label className="form-label">
																										Unions Admins
																									</label>
																									<a
																										href="#"
																										data-bs-toggle="modal"
																										data-bs-target="#inviteModal"
																										className="text-main-primary text-medium text-decoration-none"
																									>
																										Add Admin{" "}
																										<i className="bi bi-plus"></i>
																									</a>
																								</div>

																								<table className="table table-list">
																									<thead className="table-light">
																										<tr>
																											<th scope="col">Name</th>
																											<th scope="col">
																												Joined
																											</th>
																											<th scope="col">Role</th>
																											<th scope="col"></th>
																										</tr>
																									</thead>
																									<tbody>
																										<tr>
																											<td scope="row">
																												<div className="d-flex avatar-holder">
																													<div className="position-relative">
																														<div className="avatar-sm flex-shrink-0">
																															<img
																																src="/images/avatar-2.svg"
																																className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																alt="Avatar"
																															/>
																														</div>
																													</div>
																													<div className="ms-2 flex-grow-1">
																														<h5 className="mb-0">
																															Salim Mustapha
																														</h5>
																														<p className="mb-0 text-muted-3">
																															salimmusty@gmail.com
																														</p>
																													</div>
																												</div>
																											</td>
																											<td>Feb 4 2023</td>
																											<td>
																												<img
																													src="/images/claimant.svg"
																													className="img-fluid"
																													alt="claimant"
																												/>
																											</td>

																											<td>
																												<button
																													className="btn btn-size btn-outline-light text-medium no-caret"
																													type="button"
																													data-bs-toggle="modal"
																													data-bs-target="#removeModal"
																												>
																													<img
																														src="/images/bin_2.svg"
																														className="img-fluid"
																														alt="dot-v"
																													/>
																												</button>
																											</td>
																										</tr>

																										<tr>
																											<td scope="row">
																												<div className="d-flex avatar-holder">
																													<div className="position-relative">
																														<div className="avatar-sm flex-shrink-0">
																															<img
																																src="/images/avatar-2.svg"
																																className="img-fluid object-position-center object-fit-cover w-100 h-100"
																																alt="Avatar"
																															/>
																														</div>
																													</div>
																													<div className="ms-2 flex-grow-1">
																														<h5 className="mb-0">
																															Salim Mustapha
																														</h5>
																														<p className="mb-0 text-muted-3">
																															salimmusty@gmail.com
																														</p>
																													</div>
																												</div>
																											</td>
																											<td>Feb 4 2023</td>
																											<td>
																												<img
																													src="/images/claimant.svg"
																													className="img-fluid"
																													alt="claimant"
																												/>
																											</td>

																											<td>
																												<button
																													className="btn btn-size btn-outline-light text-medium no-caret"
																													type="button"
																													data-bs-toggle="modal"
																													data-bs-target="#removeModal"
																												>
																													<img
																														src="/images/bin_2.svg"
																														className="img-fluid"
																														alt="dot-v"
																													/>
																												</button>
																											</td>
																										</tr>
																									</tbody>
																								</table>
																							</div>
																						</div>
																					</div>
																				</form>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div
														className="tab-pane fade"
														id="pills-document"
														role="tabpanel"
														aria-labelledby="pills-document-tab"
														tabIndex="0"
													>
														<div className="row my-4">
															<div className="col-lg-5">
																<div className="input-group">
																	<span className="input-group-text bg-transparent">
																		<img
																			src="/images/search.svg"
																			className="img-fluid"
																			alt="search"
																		/>
																	</span>
																	<input
																		type="search"
																		className="form-control border-start-0 form-control-height"
																		placeholder="Search here..."
																	/>
																</div>
															</div>

															<div className="col-lg-7">
																<div className="d-flex align-items-center justify-content-between gap-15">
																	<div className="d-flex">
																		<a className="btn btn-size btn-outline-light text-medium px-3 me-lg-3">
																			<img
																				src="/images/filter.svg"
																				className="img-fluid"
																			/>{" "}
																			A-Z
																		</a>

																		<button className="btn btn-size btn-main-outline-primary px-3">
																			<i className="bi bi-cloud-download me-2"></i>{" "}
																			Export CSV
																		</button>
																	</div>

																	<p className="text-end mb-0 file-count">
																		Unions: {unionsList.length}
																	</p>
																</div>
															</div>
														</div>

														<div className="row">
															<div className="col-lg-12">
																<table className="table table-list">
																	<thead className="table-light">
																		<tr>
																			<th scope="col">
																				<div>
																					<input
																						className="form-check-input"
																						type="checkbox"
																						id="checkboxNoLabel"
																						value=""
																						aria-label="..."
																					/>
																				</div>
																			</th>
																			<th scope="col">Unions</th>
																			<th scope="col">Assigned Admin</th>
																			<th scope="col">Industry</th>
																			<th scope="col">Date added</th>
																			<th scope="col">Actions</th>
																		</tr>
																	</thead>
																	<tbody>
																		{unionsList.map((union) => (
																			<tr key={union._id}>
																				<td>
																					<div>
																						<input
																							className="form-check-input"
																							type="checkbox"
																							id="checkboxNoLabel"
																							value=""
																							aria-label="..."
																						/>
																					</div>
																				</td>
																				<td>
																					<div className="d-flex align-items-center avatar-holder">
																						<div className="position-relative">
																							<div className="avatar-sm flex-shrink-0">
																								<img
																									src={union.logo}
																									className="img-fluid object-position-center object-fit-cover w-100 h-100"
																									alt="Avatar"
																								/>
																							</div>
																						</div>
																						<div className="ms-2 flex-grow-1">
																							<div className="d-flex justify-content-between align-items-center mb-2">
																								<div className="mb-0 d-flex align-items-center">
																									<div className="heading-text">
																										{union.name}{" "}
																										<span className="text-muted-3">
																											{" "}
																											{union.acronym}
																										</span>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</td>

																				<td>
																					<div className="avatars">
																						<div className="dropdown">
																							<a
																								href="#"
																								className="avatars__item dropdown-toggle"
																								type="button"
																								data-bs-toggle="dropdown"
																								aria-expanded="false"
																							>
																								<img
																									className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																									src="https://randomuser.me/api/portraits/women/65.jpg"
																									alt=""
																								/>
																							</a>
																							<ul className="dropdown-menu action-menu border-radius">
																								<img
																									src="/images/pointer.svg"
																									className="img-fluid pointer"
																								/>
																								<div className="d-flex avatar-holder border-bottom py-4">
																									<div className="position-relative">
																										<img
																											src="/images/Avatar-online-indicator.svg"
																											className="img-fluid indicator-avatar"
																											alt="indicator"
																										/>
																										<div className="avatar-sm flex-shrink-0">
																											<img
																												src="https://randomuser.me/api/portraits/women/65.jpg"
																												className="img-fluid object-position-center object-fit-cover w-100 h-100"
																												alt="Avatar"
																											/>
																										</div>
																									</div>
																									<div className="ms-2 flex-grow-1">
																										<h5 className="mb-0">
																											Stephen Ejiro
																										</h5>
																										<p className="mb-0 text-main-primary">
																											View profile
																										</p>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/users.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Role in dispute
																										</p>
																										<img
																											src="/images/claim.svg"
																											className="img-fluid"
																											alt="claimant"
																										/>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/user.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Name & Organization
																										</p>
																										<p className="mb-0">
																											Stephen Ejiro (Shafa
																											Abuja)
																										</p>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/mail.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Email
																										</p>
																										<p className="mb-0">
																											stepheneji@nnpc.com
																										</p>
																									</div>

																									<img
																										src="/images/copy.svg"
																										className="img-fluid"
																										alt="copy"
																									/>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/call.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Phone Number
																										</p>
																										<p className="mb-0">
																											08168141116
																										</p>
																									</div>
																									<img
																										src="/images/copy.svg"
																										className="img-fluid"
																										alt="copy"
																									/>
																								</div>
																							</ul>
																						</div>
																						<div className="dropdown">
																							<a
																								href="#"
																								className="avatars__item dropdown-toggle"
																								type="button"
																								data-bs-toggle="dropdown"
																								aria-expanded="false"
																							>
																								<img
																									className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																									src="https://randomuser.me/api/portraits/women/66.jpg"
																									alt=""
																								/>
																							</a>
																							<ul className="dropdown-menu action-menu border-radius">
																								<img
																									src="/images/pointer.svg"
																									className="img-fluid pointer"
																								/>
																								<div className="d-flex avatar-holder border-bottom py-4">
																									<div className="position-relative">
																										<img
																											src="/images/Avatar-online-indicator.svg"
																											className="img-fluid indicator-avatar"
																											alt="indicator"
																										/>
																										<div className="avatar-sm flex-shrink-0">
																											<img
																												src="https://randomuser.me/api/portraits/women/66.jpg"
																												className="img-fluid object-position-center object-fit-cover w-100 h-100"
																												alt="Avatar"
																											/>
																										</div>
																									</div>
																									<div className="ms-2 flex-grow-1">
																										<h5 className="mb-0">
																											Stephen Ejiro
																										</h5>
																										<p className="mb-0 text-main-primary">
																											View profile
																										</p>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/users.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Role in dispute
																										</p>
																										<img
																											src="/images/claim.svg"
																											className="img-fluid"
																											alt="claimant"
																										/>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/user.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Name & Organization
																										</p>
																										<p className="mb-0">
																											Stephen Ejiro (Shafa
																											Abuja)
																										</p>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/mail.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Email
																										</p>
																										<p className="mb-0">
																											stepheneji@nnpc.com
																										</p>
																									</div>

																									<img
																										src="/images/copy.svg"
																										className="img-fluid"
																										alt="copy"
																									/>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/call.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Phone Number
																										</p>
																										<p className="mb-0">
																											08168141116
																										</p>
																									</div>
																									<img
																										src="/images/copy.svg"
																										className="img-fluid"
																										alt="copy"
																									/>
																								</div>
																							</ul>
																						</div>
																						<div className="dropdown">
																							<a
																								href="#"
																								className="avatars__item dropdown-toggle"
																								type="button"
																								data-bs-toggle="dropdown"
																								aria-expanded="false"
																							>
																								<img
																									className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																									src="https://randomuser.me/api/portraits/women/67.jpg"
																									alt=""
																								/>
																							</a>
																							<ul className="dropdown-menu action-menu border-radius">
																								<img
																									src="/images/pointer.svg"
																									className="img-fluid pointer"
																								/>
																								<div className="d-flex avatar-holder border-bottom py-4">
																									<div className="position-relative">
																										<img
																											src="/images/Avatar-online-indicator.svg"
																											className="img-fluid indicator-avatar"
																											alt="indicator"
																										/>
																										<div className="avatar-sm flex-shrink-0">
																											<img
																												src="https://randomuser.me/api/portraits/women/67.jpg"
																												className="img-fluid object-position-center object-fit-cover w-100 h-100"
																												alt="Avatar"
																											/>
																										</div>
																									</div>
																									<div className="ms-2 flex-grow-1">
																										<h5 className="mb-0">
																											Stephen Ejiro
																										</h5>
																										<p className="mb-0 text-main-primary">
																											View profile
																										</p>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/users.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Role in dispute
																										</p>
																										<img
																											src="/images/claim.svg"
																											className="img-fluid"
																											alt="claimant"
																										/>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/user.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Name & Organization
																										</p>
																										<p className="mb-0">
																											Stephen Ejiro (Shafa
																											Abuja)
																										</p>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/mail.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Email
																										</p>
																										<p className="mb-0">
																											stepheneji@nnpc.com
																										</p>
																									</div>

																									<img
																										src="/images/copy.svg"
																										className="img-fluid"
																										alt="copy"
																									/>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/call.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Phone Number
																										</p>
																										<p className="mb-0">
																											08168141116
																										</p>
																									</div>
																									<img
																										src="/images/copy.svg"
																										className="img-fluid"
																										alt="copy"
																									/>
																								</div>
																							</ul>
																						</div>
																						<div className="dropdown">
																							<a
																								href="#"
																								className="avatars__item dropdown-toggle"
																								type="button"
																								data-bs-toggle="dropdown"
																								aria-expanded="false"
																							>
																								<img
																									className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																									src="https://randomuser.me/api/portraits/women/68.jpg"
																									alt=""
																								/>
																							</a>
																							<ul className="dropdown-menu action-menu border-radius">
																								<img
																									src="/images/pointer.svg"
																									className="img-fluid pointer"
																								/>
																								<div className="d-flex avatar-holder border-bottom py-4">
																									<div className="position-relative">
																										<img
																											src="/images/Avatar-online-indicator.svg"
																											className="img-fluid indicator-avatar"
																											alt="indicator"
																										/>
																										<div className="avatar-sm flex-shrink-0">
																											<img
																												src="https://randomuser.me/api/portraits/women/68.jpg"
																												className="img-fluid object-position-center object-fit-cover w-100 h-100"
																												alt="Avatar"
																											/>
																										</div>
																									</div>
																									<div className="ms-2 flex-grow-1">
																										<h5 className="mb-0">
																											Stephen Ejiro
																										</h5>
																										<p className="mb-0 text-main-primary">
																											View profile
																										</p>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/users.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Role in dispute
																										</p>
																										<img
																											src="/images/claim.svg"
																											className="img-fluid"
																											alt="claimant"
																										/>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/user.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Name & Organization
																										</p>
																										<p className="mb-0">
																											Stephen Ejiro (Shafa
																											Abuja)
																										</p>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/mail.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Email
																										</p>
																										<p className="mb-0">
																											stepheneji@nnpc.com
																										</p>
																									</div>

																									<img
																										src="/images/copy.svg"
																										className="img-fluid"
																										alt="copy"
																									/>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/call.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Phone Number
																										</p>
																										<p className="mb-0">
																											08168141116
																										</p>
																									</div>
																									<img
																										src="/images/copy.svg"
																										className="img-fluid"
																										alt="copy"
																									/>
																								</div>
																							</ul>
																						</div>
																						<div className="dropdown">
																							<a
																								href="#"
																								className="avatars__item dropdown-toggle"
																								type="button"
																								data-bs-toggle="dropdown"
																								aria-expanded="false"
																							>
																								<img
																									className="avatar img-fluid object-fit-cover object-position-center w-100 h-100"
																									src="https://randomuser.me/api/portraits/women/69.jpg"
																									alt=""
																								/>
																							</a>
																							<ul className="dropdown-menu action-menu border-radius">
																								<img
																									src="/images/pointer.svg"
																									className="img-fluid pointer"
																								/>
																								<div className="d-flex avatar-holder border-bottom py-4">
																									<div className="position-relative">
																										<img
																											src="/images/Avatar-online-indicator.svg"
																											className="img-fluid indicator-avatar"
																											alt="indicator"
																										/>
																										<div className="avatar-sm flex-shrink-0">
																											<img
																												src="https://randomuser.me/api/portraits/women/69.jpg"
																												className="img-fluid object-position-center object-fit-cover w-100 h-100"
																												alt="Avatar"
																											/>
																										</div>
																									</div>
																									<div className="ms-2 flex-grow-1">
																										<h5 className="mb-0">
																											Stephen Ejiro
																										</h5>
																										<p className="mb-0 text-main-primary">
																											View profile
																										</p>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/users.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Role in dispute
																										</p>
																										<img
																											src="/images/claim.svg"
																											className="img-fluid"
																											alt="claimant"
																										/>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/user.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Name & Organization
																										</p>
																										<p className="mb-0">
																											Stephen Ejiro (Shafa
																											Abuja)
																										</p>
																									</div>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/mail.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Email
																										</p>
																										<p className="mb-0">
																											stepheneji@nnpc.com
																										</p>
																									</div>

																									<img
																										src="/images/copy.svg"
																										className="img-fluid"
																										alt="copy"
																									/>
																								</div>

																								<div className="d-flex align-items-center py-2">
																									<img
																										src="/images/call.svg"
																										className="img-fluid"
																										alt="users"
																									/>
																									<div className="ms-2 flex-grow-1">
																										<p className="mb-1 ft-sm">
																											Phone Number
																										</p>
																										<p className="mb-0">
																											08168141116
																										</p>
																									</div>
																									<img
																										src="/images/copy.svg"
																										className="img-fluid"
																										alt="copy"
																									/>
																								</div>
																							</ul>
																						</div>
																					</div>
																				</td>

																				<td>{union.industry}</td>
																				<td>{union.date_added}</td>
																				<td>
																					<div className="dropdown">
																						<button
																							className="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret"
																							type="button"
																							data-bs-toggle="dropdown"
																							aria-expanded="false"
																							data-bs-auto-close="outside"
																						>
																							<img
																								src="/images/dots-v.svg"
																								className="img-fluid"
																								alt="dots"
																							/>
																						</button>
																						<ul className="dropdown-menu border-radius action-menu-2">
																							<li>
																								<Link
																									to={`/UnionDetails/${union._id}`}
																									className="dropdown-item"
																								>
																									View details
																								</Link>
																							</li>
																						</ul>
																					</div>
																				</td>
																				{/* <td>
																<button
																	className="btn btn-size btn-outline-light text-medium no-caret"
																	type="button"
																	data-bs-toggle="modal"
																	data-bs-target="#removeModal"
																	// onClick={(e) =>
																	//   handleDelete(
																	//     e,
																	//     union.id,
																	//     unionsList,
																	//     setUnionsList
																	//   )
																	// }
																>
																
																</button>
																</td> */}
																			</tr>
																		))}
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</main>

						<footer>
							<div className="container">
								<div className="row">
									<div className="col-lg-12"></div>
								</div>
							</div>
						</footer>
					</div>
				</div>
			</div>
		</>
	);
};

export default Unions;
