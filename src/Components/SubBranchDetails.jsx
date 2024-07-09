import React, { useEffect, useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import { Link, useParams } from "react-router-dom";
import toast from "react-hot-toast";
import { ClipLoader } from "react-spinners";

const SubBranchDetails = () => {
	const { id } = useParams();

	const [isLoading, setIsLoading] = useState(true);
	const [industries, setIndustries] = useState([]);
	const [unionAdmin, setUnionAdmin] = useState([]);
	const [avatarImage, setAvatarImage] = useState();
	const [roles, setRoles] = useState([]);
	const [unions, setunions] = useState({
		name: "",
		acronym: "",
		industry: "",
		headquarters: "",
		phone: "",
		about: "",
		industry_id: "",
		founded_in: "",
		logo: "",
	});
	const [users, setUsers] = useState({
		email: "",
		role: "",
	});
	const [branches, setBranches] = useState([]);
	const [sidebar, setsidebar] = useState(true);
	const [selectedAdminId, setSelectedAdminId] = useState(null);
	const [selectedAdmin, setSelectedAdmin] = useState(null);
	const [isRemovingAdmin, setRemovingAdmin] = useState(false);

	const toggleSideBar = () => {
		setsidebar(!sidebar);
	};

	useEffect(() => {
		fetchdata(id);
		fetchIndustries();
		fetchroles();
		fetchUnionAdmin(id);
	}, []);

	const fetchUnionAdmin = async (id) => {
		try {
		const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
		const res = await fetch(
			baseUrl + `/api/union/sub-branch/get-admins/${id}`,
			{
			headers: {
				Authorization: `Bearer ${localStorage.getItem("token")}`,
			},
			}
		);

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		setUnionAdmin(data.data);
		} catch (error) {
		console.error("Error fetching data:", error.message);
		}
	};

	const fetchIndustries = async () => {
		try {
		const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(baseUrl + "/api/get-industries", {
			headers: {
			Authorization: `Bearer ${token}`,
			},
		});

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		setIndustries(data.data);
		} catch (error) {
		console.error("Error fetching data:", error.message);
		}
	};

	const fetchdata = async (id) => {
		try {
		const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(baseUrl + `/api/union/sub-branch/${id}`, {
			headers: {
			Authorization: `Bearer ${token}`,
			},
		});

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		setunions(data.data);
		} catch (error) {
		console.error("Error fetching data:", error.message);
		} finally {
		setIsLoading(false);
		}
	};

	const fetchroles = async () => {
		try {
		const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";

		const res = await fetch(baseUrl + "/api/users/get-roles", {
			headers: {
			Authorization: `Bearer ${localStorage.getItem("token")}`,
			},
		});

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		setRoles(data.data);
		} catch (error) {
		console.error("Error fetching data:", error.message);
		}
	};

	const handleAvatarChange = (e) => {
		const file = e.target.files[0];
		const formData = new FormData();
		formData.append("file", file);

		const image = URL.createObjectURL(file);
		setAvatarImage(image);

		setunions((prevFormData) => ({ ...prevFormData, logo: file }));
	};

	const onHandleChange = (e) => {
		setunions({ ...unions, [e.target.name]: e.target.value });
	};

	const updateUnion = async (id, unions) => {
		try {
		const formData = new FormData();
		Object.entries(unions).forEach(([key, value]) => {
			// Check if the key is 'display_picture' and if the value is a file
			if (key === "logo" && value instanceof File) {
			formData.append(key, value);
			} else if (key !== "logo") {
			formData.append(key, value);
			}
		});
		const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
		const res = await fetch(baseUrl + `/api/union/sub-branch/edit/${id}`, {
			method: "POST",
			headers: {
			Authorization: `Bearer ${localStorage.getItem("token")}`,
			},
			body: formData,
		});

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}
		fetchdata(id);
		const data = await res.json();
		toast.success("Sub branch has been updated!");
		} catch (error) {
		console.error("Error fetching data:", error.message);
		}
	};

	const onHandleChangeUser = (e) => {
		setUsers({ ...users, [e.target.name]: e.target.value });
	};

	const handleSendInvite = async (e, id) => {
		e.preventDefault();
		
		try {
			const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
			const res = await fetch(
				baseUrl + `/api/union/sub-branch/${id}/send-invite`,
				{
				method: "POST",
				headers: {
					"Content-Type": "application/json",
					Accept: "application/json",
					Authorization: `Bearer ${localStorage.getItem("token")}`,
				},
				body: JSON.stringify(users),
				}
			);

			if (!res.ok) {
				throw new Error("Failed to fetch data."); // Handle failed request
			}
			setUsers({
				email: "",
				role: "",
			});
			const data = await res.json();
			// setGetDisputes(data.data);
			toast.success("Sub Branch invite has been sent!");
			window.location.reload();
		} catch (error) {
			console.error("Error fetching data:", error.message);
			toast.error("failed to send invite");
		}
	};

	const handleDelete = async (e, admin_id) => {
		e.preventDefault();
		setRemovingAdmin(true);

		try {
			const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
			const response = await fetch(baseUrl + `/api/union/sub-branch/remove-admin/${id}`, {
				method: "DELETE",
				headers: {
					Authorization: `Bearer ${localStorage.getItem("token")}`,
					"Content-Type": "application/json",
					Accept: "application/json",
				},
				body: JSON.stringify({
					admin_id: admin_id
				}),
			});

			const data = await response.json();

			if (!response.ok) {
				toast.error(data.message);
				throw new Error("Network response was not ok");
			}

			toast.success(data.message);

			document.getElementById("remove-admin-modal-close").click();
			fetchdata(id);
			fetchUnionAdmin(id);
		} catch (error) {
			console.error("Error fetching data:", error);
		}
		finally {
			setRemovingAdmin(false);
		}
	};

	return (
		<>
		<div className="main-admin-container bg-light dark-mode-active">
			<div className="d-flex flex-column flex-lg-row h-lg-100">
				<MainNavbarInc sidebar={sidebar} />

				<div className="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">
					<TopBarInc toggleSideBar={toggleSideBar} />
					<main className="admin-content">
						<div className="header-box py-5">
							<div className="container">
							<h2>Sub Branches</h2>
							</div>
						</div>
						{isLoading ? (
							<div
							className="d-flex justify-content-center align-items-center"
							style={{ minHeight: "80vh" }}
							>
							<ClipLoader color="#36D7B7" loading={isLoading} size={50} />
							</div>
						) : (
							<div className="content-main">
								<div className="container">
									<div className="row py-4">
										<div className="col-lg-10">
											<div className="d-flex gap-15">
											<div>
												<a
												href="#"
												className="text-muted-4 text-decoration-none"
												>
												<i className="bi bi-arrow-left"></i> Go back
												</a>
											</div>

											<nav aria-label="breadcrumb">
												<ol className="breadcrumb">
												<li className="breadcrumb-item">
													<a
													href="#"
													className="text-main-primary text-decoration-none"
													>
													All Sub Branches
													</a>
												</li>
												<li
													className="breadcrumb-item active"
													aria-current="page"
												>
													{unions.name}
												</li>
												</ol>
											</nav>
											</div>

											<div className="d-flex justify-content-between align-items-center avatar-icon w-100 my-5">
											<div className="d-flex avatar-holder">
												<div className="position-relative">
												<div className="avatar-md flex-shrink-0">
													<img
													src={unions.logo}
													className="img-fluid object-position-center object-fit-cover w-100 h-100"
													alt="Avatar"
													/>
												</div>
												</div>
												<div className="ms-2 flex-grow-1">
												<h3 className="mb-2 bold-text">{unions.name}</h3>
												<p className="mb-0 text-muted-3">
													{unions.acronym || ""}
												</p>
												</div>
											</div>
											</div>

											<div
											className="accordion accordion-expand"
											id="accordionUnion"
											>
												<div className="accordion-item mb-3">
													<h2 className="accordion-header">
													<button
														className="accordion-button collapsed heading-4 text-grey"
														type="button"
														data-bs-toggle="collapse"
														data-bs-target="#collapseTwo"
														aria-expanded="false"
														aria-controls="collapseTwo"
													>
														{unions.acronym || unions.name} Profile
													</button>
													</h2>
													<div
													id="collapseTwo"
													className="accordion-collapse collapse"
													data-bs-parent="#accordionUnion"
													>
													<div className="accordion-body">
														<div className="mb-3">
														<a
															href="#"
															data-bs-toggle="modal"
															data-bs-target="#editModal2"
															className="btn btn-size btn-main-primary d-inline-flex"
														>
															Edit Sub Branch
														</a>
														</div>

														<form>
														<div className="row mt-4">
															<div className="col-lg-3 mb-lg-0 mb-4">
															<label className="form-label d-block">
																Logo
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
																onChange={handleAvatarChange}
																/>

																<div className="main-avatar mx-auto">
																<img
																	src={avatarImage || unions.logo}
																	className="img-fluid object-fit-cover object-position-center w-100 h-100"
																	alt=""
																/>
																</div>
															</label>
															</div>

															<div className="col-lg-9">
															<div className="mb-4">
																<label className="form-label">
																Branch Name
																</label>
																<input
																type="text"
																className="form-control form-control-height"
																value={unions.name}
																name="name"
																disabled
																/>
															</div>
															<div className="mb-4">
																<label className="form-label">
																Branch Acronym (if applicable)
																</label>
																<input
																type="text"
																className="form-control form-control-height"
																value={unions.acronym}
																name="acronym"
																disabled
																/>
															</div>
															<div className="mb-4">
																<label className="form-label">
																Industry
																</label>
																<input
																type="text"
																className="form-control form-control-height"
																disabled
																name="industry"
																value={unions.industry}
																/>
															</div>

															<div className="mb-4">
																<label className="form-label">
																Phone number
																</label>
																<input
																type="text"
																className="form-control form-control-height"
																disabled
																name="phone"
																value={unions.phone}
																/>
															</div>
															<div className="mb-4">
																<label className="form-label">
																About
																</label>

																<textarea
																className="form-control"
																rows="4"
																disabled
																value={unions.about}
																name="about"
																></textarea>
															</div>
															<div className="mb-4">
																<label className="form-label">
																Founded in
																</label>
																<input
																type="text"
																className="form-control form-control-height"
																value={unions.founded_in}
																name="founded_in"
																disabled
																/>
															</div>
															</div>
														</div>
														</form>
													</div>
													</div>
												</div>
												<div className="accordion-item mb-3">
													<h2 className="accordion-header">
													<button
														className="accordion-button collapsed heading-4 text-grey"
														type="button"
														data-bs-toggle="collapse"
														data-bs-target="#collapseThree"
														aria-expanded="false"
														aria-controls="collapseThree"
													>
														{unions.acronym || unions.name} Admins
													</button>
													</h2>
													<div
													id="collapseThree"
													className="accordion-collapse collapse"
													data-bs-parent="#accordionUnion"
													>
													<div className="accordion-body">
														<div className="mb-3">
														<a
															href=""
															className="btn btn-size btn-main-primary d-inline-flex"
															data-bs-toggle="modal"
															data-bs-target="#inviteModal"
														>
															Invite Admins
														</a>
														</div>

														<table className="table table-list">
														<thead className="table-light">
															<tr>
															<th scope="col">Name</th>
															<th scope="col">Date added</th>
															<th scope="col">Role</th>
															<th scope="col">Actions</th>
															</tr>
														</thead>
														<tbody>
															{Object.entries(unionAdmin)?.length > 0 ? (
															Object.entries(unionAdmin).map(
																([key, value], index) => (
																<tr key={key}>
																	<td scope="row">
																		<div className="d-flex avatar-holder">
																			<div className="position-relative">
																			<div className="avatar-sm flex-shrink-0">
																				<img
																				src={
																					value.photo ||
																					"/images/download.png"
																				}
																				className="img-fluid object-position-center object-fit-cover w-100 h-100"
																				alt="Avatar"
																				/>
																			</div>
																			</div>
																			<div className="ms-2 flex-grow-1">
																			<h5 className="mb-0">
																				{value.name}
																			</h5>
																			<p className="mb-0 text-muted-3">
																				{value.email}
																			</p>
																			</div>
																		</div>
																	</td>
																		<td>{value.date_joined}</td>
																	<td>
																		<p>{value.role}</p>
																	</td>
																	<td>
																		<div className="dropdown">
																			<button
																				className="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret"
																				type="button"
																				data-bs-toggle="dropdown"
																				aria-expanded="false"
																			>
																				<img
																					src="/images/dots-v.svg"
																					className="img-fluid"
																					alt="dot-v"
																				/>
																			</button>
																			<ul className="dropdown-menu border-radius action-menu-2">
																				<li>
																					<a className="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeModal" onClick={() => {
																							setSelectedAdminId(value._id); 
																							setSelectedAdmin(value);
																						}}>
																						Remove Admin
																					</a>
																				</li>
																			</ul>
																		</div>
																	</td>
																</tr>
																)
															)
															) : (
																<tr>
																	<td>
																	<p className="m-3">
																		No admin has been invited
																	</p>
																	</td>
																</tr>
															)}
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
						)}
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
		
		{/* <!-- Modal --> */}
		<div className="modal fade" id="removeModal" tabIndex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
			<div className="modal-dialog modal-dialog-centered">
				<div className="modal-content border-0 p-lg-4 p-3">
					<div className="text-end">
						<button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div className="modal-body">
						<div className="text-center">
							<img src="/images/delete-icon.svg" className="img-fluid mb-3" alt="delete an account" />
						</div>
						<h1 className="heading modal-heading text-center mb-3">
							Are you sure you want to Remove
						</h1>
						<p className="mb-4 modal-text text-center">
							{selectedAdmin?.name} ({selectedAdmin?.role}){" "}
						</p>

						<button className="btn btn-size btn-main-danger w-100" onClick={(e) => handleDelete(e, selectedAdminId) } disabled={isRemovingAdmin}>
							{isRemovingAdmin ? `Removing Admin...` : `Yes, Remove Admin`}
						</button>
					</div>
				</div>
			</div>
		</div>

		{/* <!-- Modal --> */}
		<div
			className="modal fade"
			id="editModal2"
			tabIndex="-1"
			aria-labelledby="editModalLabel2"
			aria-hidden="true"
		>
			<div className="modal-dialog modal-dialog-centered modal-lg">
			<div className="modal-content border-0 p-lg-4 p-3">
				<div className="pb-4 border-bottom heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
				<h3 className="mb-lg-0 mb-3">Edit Branch</h3>
				<div className="d-flex align-items-center gap-15">
					<a
					href="#"
					className="btn btn-size btn-main-outline-primary"
					onClick={() => updateUnion(id, unions)}
					>
					Save Changes
					</a>
					<a
					href="#"
					className="btn btn-size btn-main-primary"
					data-bs-dismiss="modal"
					aria-label="Close"
					>
					Discard Changes
					</a>
				</div>
				</div>
				<div className="modal-body">
				<form>
					<div className="row mt-4">
					<div className="col-lg-3 mb-lg-0 mb-4">
						<label className="form-label d-block">Logo</label>
						<label htmlFor="logo_profile" className="position-relative">
						<input
							type="file"
							id="logo_profile"
							style={{ display: "none" }}
							name="logo"
							onChange={handleAvatarChange}
						/>

						<div className="main-avatar mx-auto">
							<img
							src={avatarImage || unions.logo}
							className="img-fluid object-fit-cover object-position-center w-100 h-100"
							alt=""
							/>
						</div>
						</label>
					</div>

					<div className="col-lg-9">
						<div className="mb-4">
						<label className="form-label">Branch Name</label>
						<input
							type="text"
							className="form-control form-control-height"
							value={unions.name}
							name="name"
							onChange={onHandleChange}
						/>
						</div>
						<div className="mb-4">
						<label className="form-label">
							Branch Acronym (if applicable)
						</label>
						<input
							type="text"
							className="form-control form-control-height"
							name="acronym"
							value={unions.acronym}
							onChange={onHandleChange}
						/>
						</div>
						<div className="mb-4">
						<label className="form-label">Industry</label>
						<select
							className="form-control form-control-height"
							id="industriy"
							name="industry_id"
							onChange={onHandleChange}
							value={unions.industry_id}
						>
							<option value="default">--Choose--</option>
							{industries.map((item) => (
							<option value={item._id} key={item._id}>
								{item.name}
							</option>
							))}
						</select>
						</div>

						<div className="mb-4">
						<label className="form-label">Phone number</label>
						<input
							type="text"
							className="form-control form-control-height"
							value={unions.phone}
							onChange={onHandleChange}
							name="phone"
						/>
						</div>
						<div className="mb-4">
						<label className="form-label">About </label>
						<textarea
							className="form-control"
							rows="4"
							value={unions.about}
							onChange={onHandleChange}
							name="about"
						>
							Nigeria Branch of Journalists (NUJ) is a network of
							media professionals established to advance the safety
							and welfare of Nigerian journalists. It is an
							independent trade organization with no political leaning
							or ideological disposition. NUJ is founded in the
							underlying belief that speaking with one voice
						</textarea>
						</div>
						<div className="mb-4">
						<label className="form-label">Founded in</label>
						<input
							type="text"
							className="form-control form-control-height"
							value={unions.founded_in}
							onChange={onHandleChange}
							name="founded_in"
						/>
						</div>
					</div>
					</div>
				</form>
				</div>
			</div>
			</div>
		</div>

		{/* <!-- Modal --> */}
		<div
			className="modal fade"
			id="inviteModal"
			tabIndex="-1"
			aria-labelledby="inviteModalLabel"
			aria-hidden="true"
		>
			<div className="modal-dialog modal-dialog-centered modal-lg">
			<div className="modal-content p-lg-4 border-0">
				<div className="modal-header">
				<h1 className="modal-title fs-5">Send invites</h1>
				<button
					type="button"
					className="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
				</div>
				<div className="modal-body">
				<div className="row my-4">
					<div className="col-lg-7">
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
						placeholder="Type an email to send an invite"
						name="email"
						onChange={onHandleChangeUser}
						value={users.email}
						/>
					</div>
					</div>

					<div className="col-lg-5">
					<div className="d-flex align-items-center justify-content-between gap-15">
						<select
						className="form-control form-control-height w-50"
						name="role"
						onChange={onHandleChangeUser}
						value={users.role}
						defaultValue=""
						>
						<option value="" hidden>
							Select role
						</option>
						{roles.map((role) => (
							<option key={role._id} value={role._id}>
							{role.name}
							</option>
						))}
						</select>

						<a
						href=""
						className="btn btn-size btn-main-primary"
						disabled={!users.email || !users.role}
						onClick={(e) =>
							handleSendInvite(
							e,
							id,

							users,
							setUsers
							)
						}
						data-bs-dismiss="modal"
						aria-label="Close"
						>
						Send Invite
						</a>
					</div>
					</div>
				</div>

				<p className="text-medium">Branch Admins</p>

				<div className="row">
					<div className="col-lg-12">
					<table className="table table-list">
						<thead className="table-light">
						{/* <tr>
						<th scope="col">Name</th>
						<th scope="col">Date added</th>
						<th scope="col">Role</th>
						<th scope="col"></th>
					</tr> */}
						</thead>
						<tbody>
						{/* <tr>
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
							<h5 className="mb-0">Salim Mustapha</h5>
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
							className="img-fluid" alt=""
							alt="claimant"
						/>
						</td>

						<td>
						<div className="dropdown">
							<button
							className="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret"
							type="button"
							data-bs-toggle="dropdown"
							aria-expanded="false"
							>
							<img
								src="/images/bin.svg"
								className="img-fluid" alt=""
								alt="bin"
							/>
							</button>
							<ul className="dropdown-menu border-radius action-menu-2">
							<li>
								<a
								className="dropdown-item"
								href="disputes-details.php"
								>
								View details
								</a>
							</li>
							</ul>
						</div>
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
							<h5 className="mb-0">Salim Mustapha</h5>
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
							className="img-fluid" alt=""
							alt="claimant"
						/>
						</td>

						<td>
						<div className="dropdown">
							<button
							className="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret"
							type="button"
							data-bs-toggle="dropdown"
							aria-expanded="false"
							>
							<img
								src="/images/bin.svg"
								className="img-fluid" alt=""
								alt="bin"
							/>
							</button>
							<ul className="dropdown-menu border-radius action-menu-2">
							<li>
								<a
								className="dropdown-item"
								href="disputes-details.php"
								>
								View details
								</a>
							</li>
							</ul>
						</div>
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
							<h5 className="mb-0">Salim Mustapha</h5>
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
							className="img-fluid" alt=""
							alt="claimant"
						/>
						</td>

						<td>
						<div className="dropdown">
							<button
							className="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret"
							type="button"
							data-bs-toggle="dropdown"
							aria-expanded="false"
							>
							<img
								src="/images/bin.svg"
								className="img-fluid" alt=""
								alt="bin"
							/>
							</button>
							<ul className="dropdown-menu border-radius action-menu-2">
							<li>
								<a
								className="dropdown-item"
								href="disputes-details.php"
								>
								View details
								</a>
							</li>
							</ul>
						</div>
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
							<h5 className="mb-0">Salim Mustapha</h5>
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
							className="img-fluid" alt=""
							alt="claimant"
						/>
						</td>

						<td>
						<div className="dropdown">
							<button
							className="btn btn-size btn-outline-light text-medium dropdown-toggle no-caret"
							type="button"
							data-bs-toggle="dropdown"
							aria-expanded="false"
							>
							<img
								src="/images/bin.svg"
								className="img-fluid" alt=""
								alt="bin"
							/>
							</button>
							<ul className="dropdown-menu border-radius action-menu-2">
							<li>
								<a
								className="dropdown-item"
								href="disputes-details.php"
								>
								View details
								</a>
							</li>
							</ul>
						</div>
						</td>
					</tr> */}
						</tbody>
					</table>
					<table className="table table-list">
						<thead className="table-light">
						{/* <tr>
						<th scope="col">Name</th>
						<th scope="col">Date added</th>
						<th scope="col">Role</th>
						<th scope="col"></th>
					</tr> */}
						</thead>
					</table>
					<div className="card no-admin-card rounded-0">
						<div className="card-body d-flex align-items-center justify-content-center">
						<div className="text-center">
							<h4 className="">No admins found</h4>

							<p className="text-muted-3">
							Enter an admins email and role to send invite
							</p>

							<div className="text-center">
							<img
								src="/images/no-found.svg"
								className="img-fluid"
								alt=""
							/>
							</div>
						</div>
						</div>
					</div>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>

		{/* <?php include "./components/javascript.inc.php"; ?> */}
		</>
	);
};

export default SubBranchDetails;
