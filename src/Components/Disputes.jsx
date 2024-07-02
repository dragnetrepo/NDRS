import React, { useContext, useEffect, useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import { AppContext } from "../App";
import { Link, useNavigate } from "react-router-dom";
import { ClipLoader } from "react-spinners";
import toast from "react-hot-toast";

const Disputes = () => {
	const navigate = useNavigate();
	const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";

	const { disputes, setDisputes } = useContext(AppContext);
	const [unionsList, setUnionsList] = useState([]);
	const [getDisputes, setGetDisputes] = useState([]);
	const [caseType, setCaseType] = useState([]);
	const [getPendingDisputes, setGetPendingDisputes] = useState([]);
	const [isLoading, setIsLoading] = useState(true);
	const [user, setuser] = useState({
		permissions: []
	});const [disputeid, setDisputeid] = useState(0);
	const documentsArray = [];
	var array_key_val = 0,
		dispute_id = 0;
	const [sidebar, setsidebar] = useState(true);

	const toggleSideBar = () => {
		setsidebar(!sidebar);
	};

	useEffect(() => {
		fetchdata();
		fetchProfile();
		fetchDisputes();
		fetchPendingDisputes();
		FetchCaseType();
	}, []);

	const [searchQuery, setSearchQuery] = useState("");
	const [filteredDisputes, setFilteredDisputes] = useState([]);

	useEffect(() => {
		// Filter disputes based on search query
		setFilteredDisputes(
		getDisputes.filter((dispute) =>
			dispute.title.toLowerCase().includes(searchQuery.toLowerCase())
		)
		);
	}, [searchQuery, getDisputes]);

	const handleSearchChange = (e) => {
		setSearchQuery(e.target.value);
	};

	const fetchdata = async () => {
		try {
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
		} catch (error) {
		console.error("Error fetching data:", error.message);
		}
	};

	const FetchCaseType = async () => {
		try {
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(baseUrl + "/api/case/get-types", {
			headers: {
			Authorization: `Bearer ${token}`,
			},
		});

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		setCaseType(data.data);
		} catch (error) {
		console.error("Error fetching data:", error.message);
		}
	};

	const fetchProfile = async () => {
		try {
			const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
	
			const res = await fetch(baseUrl + "/api/user-profile", {
				headers: {
				Authorization: `Bearer ${localStorage.getItem("token")}`,
				},
			});
	
			if (!res.ok) {
				throw new Error("Failed to fetch data."); // Handle failed request
			}
	
			const data = await res.json();
			setuser(data.data);
			console.log(data.data);
		} catch (error) {
			console.error("Error fetching data:", error.message);
		}
	};

	const onHandleChange = (e) => {
		setDisputes({ ...disputes, [e.target.name]: e.target.value });
	};

	const onHandleFileUpload = (e) => {
		const file = e.target.files[0];
		array_key_val += 1;

		documentsArray[array_key_val] = e.target.files[0];

		document.getElementById("documents-uploaded").innerHTML += `
				<div class="d-flex align-items-center justify-content-between mb-4 document-housing" id="housing-${array_key_val}">
					<div class="d-flex align-items-center">
						<div class="text-center me-2 flex-shrink-0">
							<img src="images/file_upload_states.svg" alt="" class="img-fluid" style={{ height: "40px" }} />
						</div>
						<div>
							<p class="text-bold mb-1">${file.name}</p>
							<p class="font-sm text-muted mb-0">${
				file.type
				} format . Max. ${convertBytes(file.size)}</p>
						</div>
					</div>

					<div class="d-flex align-items-center gap-10">
						<a href="javascript:void(0)" class="btn btn-size btn-main-primary upload-doc" id="${array_key_val}">Upload</a>

						<a href="javascript:void(0);" class="remove-doc" remove-id="${array_key_val}">
							<img src="images/multiply_2.svg" class="img-fluid" alt="close" />
						</a>
					</div>
				</div>
			`;

		handleDocsEventListeners();
		e.target.value = ``;
	};

	const handleDocumentUpload = async (id, file) => {
		console.log(disputeid);
		if (disputeid) {
		document
			.getElementById(id)
			.closest(
			"div"
			).innerHTML = `<div class="spinner-border text-main-primary" id="${id}" role="status"><span class="visually-hidden">Loading...</span></div>`;

		if (file) {
			var formData = new FormData();
			formData.append("documents[]", file);
			try {
			const response = await fetch(
				baseUrl + `/api/case/${disputeid}/add-document`,
				{
				method: "POST",
				headers: {
					// "Content-Type": "application/json",
					// Accept: "application/json",
					Authorization: `Bearer ${localStorage.getItem("token")}`,
				},
				body: formData, // Pass FormData object as the body
				}
			);

			if (!response.ok) {
				throw new Error("Network response was not ok");
			}

			const data = await response.json();
			document
				.getElementById(`housing-${id}`)
				.getElementsByTagName("img")[0]
				.setAttribute("src", "images/file_upload_states_1.svg");
			document.getElementById(id).closest("div").outerHTML = ``;
			toast.success(data.message);
			} catch (error) {
			document.getElementById(id).closest("div").outerHTML = `
							<button class="btn btn-danger btn-size" disabled>Failed</button>
						`;
			console.error("Error fetching data:", error);
			}
		}
		}
	};

	const handleSubmit = async (e) => {
		e.preventDefault();
		try {
			const response = await fetch(baseUrl + "/api/case/create", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
					Accept: "application/json",
					Authorization: `Bearer ${localStorage.getItem("token")}`,
				},
				body: JSON.stringify(disputes),
			});

			if (!response.ok) {
				throw new Error("Network response was not ok");
			}

			const data = await response.json();
			dispute_id = data.data._id;
			setDisputeid(dispute_id)
			fetchDisputes();

			console.log(disputeid);

			if (dispute_id) {
				toast.success("Dispute has been created successfully!");
				document.getElementById("create-dispute-div").classList.add("d-none");
				document.getElementById("submit-next-docs").classList.remove("d-none");
			}
		} catch (error) {
			toast.error("All fields are required");
			console.error("Error fetching data:", error);
		}
	};

	const finishCreateDispute = () => {
		if (disputeid > 0) {
			navigate(`/disputesDetails/${disputeid}`);
		} else {
			window.location.reload();
		}
	};

	const [isAscending, setIsAscending] = useState(true);

	const sortDisputes = () => {
		const sortedItems = [...getDisputes].sort((a, b) => {
		if (isAscending) {
			return a.case_no.localeCompare(b.case_no);
		} else {
			return b.case_no.localeCompare(a.case_no);
		}
		});
		setGetDisputes(sortedItems);
		setIsAscending(!isAscending);
	};
	const sortPendingDisputes = () => {
		const sortedItems = [...getPendingDisputes].sort((a, b) => {
		if (isAscending) {
			return a.case_no.localeCompare(b.case_no);
		} else {
			return b.case_no.localeCompare(a.case_no);
		}
		});
		setGetPendingDisputes(sortedItems);
		setIsAscending(!isAscending);
	};

	const fetchDisputes = async () => {
		try {
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(baseUrl + "/api/case/disputes", {
			headers: {
			Authorization: `Bearer ${token}`,
			},
		});

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		let results = data.data;
		setGetDisputes(results);

		document.querySelectorAll(".fetching-data").forEach(function (el) {
			el.style.display = "none";
		});

		if (!results.length) {
			document.getElementById("dispute-not-found").classList.remove("d-none");
		}
		} catch (error) {
			console.error("Error fetching data:", error.message);
		}
		finally {
			setIsLoading(false);
		}
	};

	const fetchPendingDisputes = async () => {
		try {
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(baseUrl + "/api/case/disputes/pending", {
			headers: {
			Authorization: `Bearer ${token}`,
			},
		});

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		let results = data.data;
		setGetPendingDisputes(results);

		document.querySelectorAll(".fetching-data").forEach(function (el) {
			el.style.display = "none";
		});

		if (!results.length) {
			document
			.getElementById("pending-dispute-not-found")
			.classList.remove("d-none");
		}
		} catch (error) {
		console.error("Error fetching data:", error.message);
		}
	};

	const convertBytes = (bytes) => {
		if (typeof bytes !== "number" || isNaN(bytes)) {
		throw new Error("Input must be a number");
		}

		const sizes = ["Bytes", "KB", "MB", "GB", "TB"];
		if (bytes === "") return " Bytes";

		const i = Math.floor(Math.log(bytes) / Math.log(1024));
		const convertedValue = bytes / Math.pow(1024, i);

		return `${convertedValue.toFixed(2)} ${sizes[i]}`;
	};

	const handleDocsEventListeners = () => {
		document
		.querySelectorAll(".upload-doc")
		.forEach((el) => el.removeEventListener("click", (event) => {}));

		document.querySelectorAll(".upload-doc").forEach((el) =>
			el.addEventListener("click", (event) => {
				let document_clicked = el.getAttribute("id");
				handleDocumentUpload(document_clicked, documentsArray[document_clicked]);
			})
		);

		document.querySelectorAll(".remove-doc").forEach((el) =>
			el.addEventListener("click", (event) => {
				let document_clicked = el.getAttribute("remove-id");

				if (documentsArray[document_clicked]) {
					delete documentsArray[document_clicked];
				}

				document.getElementById(`housing-${document_clicked}`).remove();
			})
		);
	};

	document.querySelectorAll(".create-dispute-other-btn").forEach((el) =>
		el.addEventListener("click", (event) => {
			document.getElementById("pills-create-tab").click();
		})
	);

	return (
		<>
			<div className="main-admin-container bg-light dark-mode-active">
				<div className="d-flex flex-column flex-lg-row h-lg-100">
					{user.permissions.length && (
						<MainNavbarInc sidebar={sidebar} profileUser={user} />
					)}

					<div className="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">
						<TopBarInc toggleSideBar={toggleSideBar} />

						{isLoading ? (
							<div className="d-flex justify-content-center align-items-center" style={{ minHeight: "80vh" }}>
								<ClipLoader color="#36D7B7" loading={isLoading} size={50} />
							</div>
						) : (
							<main className="admin-content">
								<div className="header-box py-5">
									<div className="container">
									<h2>Disputes</h2>
									</div>
								</div>

								<div className="content-main">
									<div className="container">
									<div className="row">
										<div className="col-lg-12">
										<div className="margin-top-negative">
											<ul
											className="nav custom-tab nav-underline mb-3"
											id="pills-tab"
											role="tablist"
											>
											<li className={`nav-item ${user.permissions && (user.permissions.includes("create dispute")) ? `` : `d-none`}`} role="presentation">
												<button
												className="nav-link"
												id="pills-create-tab"
												data-bs-toggle="pill"
												data-bs-target="#pills-create"
												type="button"
												role="tab"
												aria-controls="pills-create"
												aria-selected="false"
												>
													Create Disputes
												</button>
											</li>
											<li className="nav-item" role="presentation">
												<button
												className="nav-link active"
												id="pills-ongoing-tab"
												data-bs-toggle="pill"
												data-bs-target="#pills-ongoing"
												type="button"
												role="tab"
												aria-controls="pills-ongoing"
												aria-selected="true"
												>
												All Disputes
												</button>
											</li>
											<li className="nav-item" role="presentation">
												<button
												className="nav-link"
												id="pills-resolved-tab"
												data-bs-toggle="pill"
												data-bs-target="#pills-resolved"
												type="button"
												role="tab"
												aria-controls="pills-resolved"
												aria-selected="false"
												>
												Pending Disputes
												</button>
											</li>
											</ul>

											<div className="tab-content" id="pills-tabContent">
												{user.permissions && (user.permissions.includes("create dispute")) && (
													<div
														className="tab-pane fade"
														id="pills-create"
														role="tabpanel"
														aria-labelledby="pills-create-tab"
														tabIndex="0"
													>
														<div className="row mt-5">
														<div className="col-lg-7">
															<div
															className="card d-block mb-4"
															id="create-dispute-div"
															>
																
															<div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
																<h3 className="mb-lg-0 mb-3">
																Create Dispute Case
																</h3>
																<div className="d-flex align-items-center gap-15">
																<a
																	className="btn btn-size btn-main-primary px-3"
																	onClick={handleSubmit}
																>
																	Save
																</a>
																</div>
															</div>

															<div className="card-body p-4">
																<form>
																<div className="row mt-4">
																	<div className="col-lg-12">
																	<div className="mb-4">
																		<label className="form-label">
																		Dispute ID
																		</label>
																		<input
																		type="text"
																		className="form-control form-control-height"
																		placeholder="Automatically generated by the system"
																		value=""
																		disabled
																		/>
																	</div>
																	<div className="mb-4">
																		<label className="form-label">
																		Filing date
																		</label>
																		<input
																		type="text"
																		className="form-control form-control-height"
																		placeholder="Automatically generated by the system"
																		value=""
																		disabled
																		/>
																	</div>
																	<div className="mb-4">
																		<label className="form-label">
																		Case title
																		</label>
																		<input
																		type="text"
																		className="form-control form-control-height"
																		name="title"
																		placeholder="Enter Case title"
																		value={disputes.title}
																		onChange={onHandleChange}
																		/>
																	</div>
																	<div className="mb-4">
																		<label className="form-label">
																		Dispute type
																		</label>
																		<select
																		className="form-select form-control-height"
																		name="type"
																		value={disputes.type}
																		onChange={onHandleChange}
																		>
																		<option value="" disabled>
																			--Choose--
																		</option>
																		{caseType.map((item) => (
																			<option
																			value={item}
																			key={Math.random()}
																			>
																			{item}
																			</option>
																		))}
																		</select>
																	</div>
																	<div className="mb-4">
																		<label className="form-label">
																		Initiating party (Claimant)
																		</label>
																		<select
																		className="form-select form-control-height"
																		name="initiating_party"
																		value={disputes.initiating_party}
																		onChange={onHandleChange}
																		>
																		<option value="" disabled>
																			--Choose--
																		</option>
																		{unionsList.map((union) => (
																			<option
																			key={union._id}
																			value={union._id}
																			>
																			{union.name}
																			</option>
																		))}
																		</select>
																	</div>
																	<div className="mb-4">
																		<label className="form-label">
																		Accused party (Respondents)
																		</label>
																		<select
																		className="form-select form-control-height"
																		name="accused_party"
																		value={disputes.accused_party}
																		onChange={onHandleChange}
																		>
																		<option value="" disabled>
																			--Choose--
																		</option>
																		{unionsList.map((union) => (
																			<option
																			key={union._id}
																			value={union._id}
																			>
																			{union.name}
																			</option>
																		))}
																		</select>
																	</div>
																	<div className="mb-4">
																		<label className="form-label">
																		Summary of Dispute
																		</label>
																		<textarea
																		className="form-control"
																		rows="3"
																		name="summary"
																		value={disputes.summary}
																		onChange={onHandleChange}
																		></textarea>
																		{disputes.summary.length <= 10 && (
																		<p className="text-danger">
																			Input must be at least 10
																			characters
																		</p>
																		)}
																	</div>
																	<div className="mb-4">
																		<label className="form-label">
																		Background Information
																		</label>
																		<textarea
																		className="form-control"
																		rows="3"
																		name="background_info"
																		value={disputes.background_info}
																		onChange={onHandleChange}
																		></textarea>
																		{disputes.background_info.length <=
																		10 && (
																		<p className="text-danger">
																			Input must be at least 10
																			characters
																		</p>
																		)}
																	</div>
																	<div className="mb-4">
																		<label className="form-label">
																		Relief sought
																		</label>
																		<textarea
																		className="form-control"
																		rows="3"
																		name="relief_sought"
																		value={disputes.relief_sought}
																		onChange={onHandleChange}
																		></textarea>
																		{disputes.relief_sought.length <=
																		10 && (
																		<p className="text-danger">
																			Input must be at least 10
																			characters
																		</p>
																		)}
																	</div>
																	<div className="mb-4">
																		<label className="form-label">
																		Specific concerns
																		</label>
																		<textarea
																		className="form-control"
																		rows="3"
																		name="specific_claims"
																		value={disputes.specific_claims}
																		onChange={onHandleChange}
																		></textarea>
																		{disputes.specific_claims.length <=
																		10 && (
																		<p className="text-danger">
																			Input must be at least 10
																			characters
																		</p>
																		)}
																	</div>
																	<div className="mb-4">
																		<label className="form-label">
																		Negotiation terms
																		</label>
																		<textarea
																		className="form-control"
																		rows="3"
																		name="negotiation_terms"
																		value={disputes.negotiation_terms}
																		onChange={onHandleChange}
																		></textarea>
																		{disputes.negotiation_terms
																		.length <= 10 && (
																		<p className="text-danger">
																			Input must be at least 10
																			characters
																		</p>
																		)}
																	</div>
																	</div>
																</div>
																</form>
															</div>
															</div>

															<div
															className="card mb-4 d-none"
															id="submit-next-docs"
															>
															<div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
																<h3 className="mb-lg-0 mb-3">
																Upload Supporting Documents
																</h3>
																<div className="d-flex align-items-center gap-15">
																{/* <a href="disputes.php" className="btn-flat text-main-primary">Back</a> */}
																<button
																	className="btn btn-size btn-main-primary submit-dispute"
																	onClick={finishCreateDispute}
																>
																	Finish
																</button>
																</div>
															</div>

															<div className="card-body p-4">
																<label htmlFor="add_doc">
																<input
																	type="file"
																	name="documents[]"
																	id="add_doc"
																	className="d-none"
																	onChange={onHandleFileUpload}
																/>
																<div className="mb-4">
																	<div className="btn-flat text-main-primary text-decoration-none cursor-pointer">
																	Add document{" "}
																	<img
																		src="images/button-icon-1.svg"
																		className="img-fluid"
																		alt="add-icon"
																	/>
																	</div>
																</div>
																</label>

																<div id="documents-uploaded"></div>
															</div>
															</div>
														</div>
														</div>
													</div>
												)}

												<div
													className="tab-pane fade show active"
													id="pills-ongoing"
													role="tabpanel"
													aria-labelledby="pills-ongoing-tab"
													tabIndex="0"
												>
													<div className="mt-5">
													<div className="row mb-4">
														<div className="col-lg-9">
															<div className="row mb-4">
																<div className="col-lg-6">
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
																		placeholder="Search disputes..."
																		value={searchQuery}
																		onChange={handleSearchChange}
																		/>
																	</div>
																</div>

																<div className="col-lg-6">
																	<div className="d-flex align-items-center justify-content-between gap-15">
																		<a
																		className="btn btn-size btn-outline-light text-medium px-4"
																		data-bs-toggle="collapse"
																		href="#collapseFilter"
																		role="button"
																		aria-expanded="false"
																		aria-controls="collapseFilter"
																		>
																		<img
																			src="/images/filter.svg"
																			className="img-fluid me-2"
																			alt=""
																		/>{" "}
																		Filters
																		</a>

																		<button
																		className="btn btn-size btn-outline-light text-medium px-4"
																		onClick={sortDisputes}
																		>
																		<img
																			src="/images/sort.svg"
																			className="img-fluid me-2"
																			alt=""
																		/>{" "}
																		Sort
																		</button>

																		<button className={`btn btn-size btn-main-outline-primary px-4 w-100 create-dispute-other-btn ${user.permissions && (user.permissions.includes("create dispute")) ? `` : `d-none`}`}>
																			Create dispute
																		</button>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div className="table-responsive">
														<table className="table table-list">
														<thead className="table-light">
															<tr>
															<th scope="col">Filing Date</th>
															<th scope="col">Case Number</th>
															<th scope="col">Involved Parties</th>
															<th
																scope="col"
																style={{ width: "200px" }}
															>
																Case Title
															</th>
															<th scope="col">Case Status</th>
															<th scope="col"></th>
															</tr>
														</thead>
														<tbody>
															{getDisputes.length ? (
															filteredDisputes.map((dispute) => (
																<tr key={dispute._id}>
																<td>{dispute.filling_date}</td>
																<td scope="row">{dispute.case_no}</td>
																<td>
																	<div className="mb-2">
																	<div className="d-flex align-items-center avatar-holder">
																		<div className="position-relative">
																		<div className="avatar-sm flex-shrink-0">
																			<img
																			src={
																				dispute.involved_parties
																				.accused.logo
																			}
																			className="img-fluid object-position-center object-fit-cover w-100 h-100"
																			alt="Avatar"
																			/>
																		</div>
																		</div>
																		<div className="ms-2 d-flex flex-grow-1 text-muted-3">
																		<p className="text-truncate mb-0 max-200">
																			{
																			dispute.involved_parties
																				.accused.name
																			}{" "}
																		</p>
																		<span>
																			(
																			{
																			dispute.involved_parties
																				.accused.acronym
																			}
																			)
																		</span>
																		</div>
																	</div>
																	</div>
																	<div className="mb-2">
																	<div className="d-flex align-items-center avatar-holder">
																		<div className="position-relative">
																		<div className="avatar-sm flex-shrink-0">
																			<img
																			src={
																				dispute.involved_parties
																				.claimant.logo
																			}
																			className="img-fluid object-position-center object-fit-cover w-100 h-100"
																			alt="Avatar"
																			/>
																		</div>
																		</div>
																		<div className="ms-2 d-flex flex-grow-1 text-muted-3">
																		<p className="text-truncate mb-0 max-200">
																			{
																			dispute.involved_parties
																				.claimant.name
																			}
																		</p>
																		<span>
																			(
																			{
																			dispute.involved_parties
																				.claimant.acronym
																			}
																			)
																		</span>
																		</div>
																	</div>
																	</div>
																</td>
																<td>{dispute.title}</td>
																<td>
																	<img
																	src={dispute.status_img}
																	alt=""
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
																		src="/images/dots-v.svg"
																		className="img-fluid"
																		alt="dot-v"
																		/>
																	</button>
																	<ul className="dropdown-menu border-radius action-menu-2">
																		<li>
																		<Link
																			className="dropdown-item"
																			to={`/disputesDetails/${dispute._id}`}
																		>
																			View details
																		</Link>
																		</li>
																	</ul>
																	</div>
																</td>
																</tr>
															))
															) : (
																<tr>
																	<td
																	id="dispute-not-found"
																	colSpan={6}
																	className={`text-center d-none`}
																	>
																	<p>
																		<i className="fa fa-triangle-exclamation fa-2x text-warning"></i>
																	</p>
																	<p className="h5">
																		No dispute data found
																	</p>
																	</td>
																</tr>
															)}
														</tbody>
														</table>
													</div>
													</div>
												</div>

												<div
													className="tab-pane fade"
													id="pills-resolved"
													role="tabpanel"
													aria-labelledby="pills-resolved-tab"
													tabIndex="0"
												>
													<div className="mt-5">
													<div className="row mb-4">
														<div className="col-lg-9">
														<div className="row mb-4">
															<div className="col-lg-6">
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
																placeholder="Search disputes..."
																value={searchQuery}
																onChange={handleSearchChange}
																/>
															</div>
															</div>

															<div className="col-lg-6">
															<div className="d-flex align-items-center justify-content-between gap-15">
																<a
																className="btn btn-size btn-outline-light text-medium px-4"
																data-bs-toggle="collapse"
																href="#collapseFilter"
																role="button"
																aria-expanded="false"
																aria-controls="collapseFilter"
																>
																<img
																	src="/images/filter.svg"
																	className="img-fluid me-2"
																	alt=""
																/>{" "}
																Filters
																</a>

																<button
																className="btn btn-size btn-outline-light text-medium px-4"
																onClick={sortPendingDisputes}
																>
																<img
																	src="/images/sort.svg"
																	className="img-fluid me-2"
																	alt=""
																/>{" "}
																Sort
																</button>

																<button className="btn btn-size btn-main-outline-primary px-4 w-100 create-dispute-other-btn">
																Create dispute
																</button>
															</div>
															</div>
														</div>
														</div>
													</div>

													<div className="table-responsive">
														<table className="table table-list">
														<thead className="table-light">
															<tr>
															<th scope="col">Filing Date</th>
															<th scope="col">Case Number</th>
															<th scope="col">Involved Parties</th>
															<th
																scope="col"
																style={{ width: "200px" }}
															>
																Case Title
															</th>
															<th scope="col">Case Status</th>
															<th scope="col"></th>
															</tr>
														</thead>
														<tbody>
															{getPendingDisputes.length ? (
															filteredDisputes.map((dispute) => (
																<tr key={dispute._id}>
																<td>{dispute.filling_date}</td>
																<td scope="row">{dispute.case_no}</td>
																<td>
																	<div className="mb-2">
																	<div className="d-flex align-items-center avatar-holder">
																		<div className="position-relative">
																		<div className="avatar-sm flex-shrink-0">
																			<img
																			src={
																				dispute.involved_parties
																				.accused.logo
																			}
																			className="img-fluid object-position-center object-fit-cover w-100 h-100"
																			alt="Avatar"
																			/>
																		</div>
																		</div>
																		<div className="ms-2 d-flex flex-grow-1 text-muted-3">
																		<p className="text-truncate mb-0 max-200">
																			{
																			dispute.involved_parties
																				.accused.name
																			}{" "}
																		</p>
																		<span>
																			(
																			{
																			dispute.involved_parties
																				.accused.acronym
																			}
																			)
																		</span>
																		</div>
																	</div>
																	</div>
																	<div className="mb-2">
																	<div className="d-flex align-items-center avatar-holder">
																		<div className="position-relative">
																		<div className="avatar-sm flex-shrink-0">
																			<img
																			src={
																				dispute.involved_parties
																				.claimant.logo
																			}
																			className="img-fluid object-position-center object-fit-cover w-100 h-100"
																			alt="Avatar"
																			/>
																		</div>
																		</div>
																		<div className="ms-2 d-flex flex-grow-1 text-muted-3">
																		<p className="text-truncate mb-0 max-200">
																			{
																			dispute.involved_parties
																				.claimant.name
																			}
																		</p>
																		<span>
																			(
																			{
																			dispute.involved_parties
																				.claimant.acronym
																			}
																			)
																		</span>
																		</div>
																	</div>
																	</div>
																</td>
																<td>{dispute.title}</td>
																<td>
																	<img
																	src="/images/pending.svg"
																	alt=""
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
																		src="/images/dots-v.svg"
																		className="img-fluid"
																		alt="dot-v"
																		/>
																	</button>
																	<ul className="dropdown-menu border-radius action-menu-2">
																		<li>
																		<Link
																			className="dropdown-item"
																			to={`/disputesDetails/${dispute._id}`}
																		>
																			View details
																		</Link>
																		</li>
																	</ul>
																	</div>
																</td>
																</tr>
															))
															) : (
															<tr>
																<td
																id="pending-dispute-not-found"
																colSpan={6}
																className={`text-center d-none`}
																>
																<p>
																	<i className="fa fa-triangle-exclamation fa-2x text-warning"></i>
																</p>
																<p className="h5">
																	No pending dispute data found
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
								</div>
							</main>
						)}

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

export default Disputes;
