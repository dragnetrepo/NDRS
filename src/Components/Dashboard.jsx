import React, { useEffect, useState } from "react";
import TopBarInc from "../Bars/TopBarInc";
import MainNavbarInc from "../Bars/MainNavbarInc";
import { Link } from "react-router-dom";
import { ClipLoader } from 'react-spinners';
import MyChartComponent from "../Bars/MyChartComponent";

const Dashboard = () => {
	const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";

	const [discussion, setDiscussions] = useState([]);
	const [user, setuser] = useState([]);
	const [notifications, setNotifications] = useState([]);
	const [documents, setDocuments] = useState([])
	const [dashboard, setDashboard] = useState([])
	const [sidebar, setsidebar] = useState(true)
	const [isLoading, setIsLoading] = useState(true);
	const [isComponentLoading, setIsComponentLoading] = useState(false);
	const [periods, setPeriods] = useState([]);
	const [periodData, setperiodData] = useState([]);
	const [periodMessage, setperiodMessageData] = useState({
		report_text: "",
		period_text: ""
	});


	const toggleSideBar = () => {
		setsidebar(!sidebar)
	}

	const today = new Date();

	const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	const months = [
		'January', 'February', 'March', 'April', 'May', 'June',
		'July', 'August', 'September', 'October', 'November', 'December'
	];

	const dayName = days[today.getDay()];
	const monthName = months[today.getMonth()];
	const day = today.getDate();

	// Function to get the correct ordinal suffix for a given day
	const getOrdinalSuffix = (n) => {
		const s = ["th", "st", "nd", "rd"];
		const v = n % 100;
		return (s[(v - 20) % 10] || s[v] || s[0]);
	};

	const formattedDate = `${dayName}, ${monthName} ${day}${getOrdinalSuffix(day)}`;


	useEffect(() => {
		fetchdata();
		fetchDashboard();
		fetchDisputeResolutionReport("1 year");
	}, []);


	const fetchdata = async () => {
		try {

			const token = localStorage.getItem("token");

			if (!token) {
				throw new Error("User is not logged in."); // Handle case where user is not logged in
			}

			const res = await fetch(baseUrl + "/api/user-profile", {
				headers: {
					Authorization: `Bearer ${token}`,
				},
			});

			if (!res.ok) {
				throw new Error("Failed to fetch data."); // Handle failed request
			}

			const data = await res.json();
			setuser(data.data);
		} catch (error) {
			console.error("Error fetching data:", error.message);
		}
	};

	const fetchDashboard = async () => {
		try {

			const token = localStorage.getItem("token");

			if (!token) {
				throw new Error("User is not logged in."); // Handle case where user is not logged in
			}

			const res = await fetch(baseUrl + "/api/dashboard", {
				headers: {
					Authorization: `Bearer ${token}`,
				},
			});

			if (!res.ok) {
				throw new Error("Failed to fetch data."); // Handle failed request
			}

			const data = await res.json();
			setDashboard(data.data);
		} catch (error) {
			console.error("Error fetching data:", error.message);
		}
		finally {
			setIsLoading(false)
		}
	};

	const fetchDisputeResolutionReport = async (period) => {
		setIsComponentLoading(true);
		setperiodMessageData({});

		try {
			const token = localStorage.getItem("token");

			if (!token) {
				throw new Error("User is not logged in."); // Handle case where user is not logged in
			}
			const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
			const res = await fetch(baseUrl + `/api/dispute-resolution-report?period=${period}`, {
				headers: {
					Authorization: `Bearer ${token}`,
				},
			});

			if (!res.ok) {
				throw new Error("Failed to fetch data."); // Handle failed request
			}

			const data = await res.json();
			if (Object.keys(data.data).length) {
				setPeriods(Object.keys(data.data));
				setperiodData(Object.values(data.data));
				setperiodMessageData({
					report_text: data.report_message,
					period_text: data.period_text
				});
			}
		} catch (error) {
			console.error("Error fetching data:", error.message);
		} finally {
			setIsComponentLoading(false);
		}
	}


	return (
		<>
			<div className="main-admin-container bg-light dark-mode-active">
				<div className="d-flex flex-column flex-lg-row h-lg-100">
					{/* <?php include "./components/main-navbar.inc.php"; ?> */}
					<MainNavbarInc sidebar={sidebar} />
					<div className="flex-lg-fill bg-white overflow-auto vstack vh-lg-100 position-relative">
						{/* <?php include "./components/top-bar.inc.php"; ?> */}
						<TopBarInc toggleSideBar={toggleSideBar} />
						{isLoading ? (
							<div className="d-flex justify-content-center align-items-center" style={{ minHeight: '80vh' }}>
								<ClipLoader color="#36D7B7" loading={isLoading} size={50} />
							</div>
						) : (
							<main className="admin-content">
								<div className="header-box py-5">
									<div className="container">
										<p>{formattedDate}</p>
										<h2>Good afternoon, {user.first_name}</h2>
									</div>
								</div>

								<div className="content-main py-5">
									<div className="container">
										<div className="row">
											<div className="col-lg-8">
												<div className="row mb-5">
													<div className="col-lg-4 mb-lg-0 mb-3">
														<a href="/disputes" className="text-decoration-none">
															<div className="card dash-card bg-custom-color-2 h-100 border-0">
																<div className="card-body">
																	<div className="d-flex avatar-holder align-items-center mb-3">
																		<div className="position-relative flex-shrink-0">
																			<img
																				src="/images/dispute-icon.svg"
																				className="img-fluid" alt=""
																			/>
																		</div>
																		<div className="ms-2 flex-grow-1">
																			<h5 className="mb-0">
																				View Pending Disputes ({dashboard.pending_disputes ? dashboard.pending_disputes.count : 0})
																			</h5>
																		</div>
																	</div>
																	<p className="mb-2">
																		View all pending dispute requests
																	</p>

																	<p className="action mb-0">View disputes</p>
																</div>
															</div>
														</a>
													</div>

													<div className="col-lg-4 mb-lg-0 mb-3">
														<Link
															to="/unions"
															className="text-decoration-none"
														>
															<div className="card dash-card bg-custom-color-2 h-100 border-0">
																<div className="card-body">
																	<div className="d-flex avatar-holder align-items-center mb-3">
																		<div className="position-relative flex-shrink-0">
																			<img
																				src="/images/union-icon.svg"
																				className="img-fluid" alt=""
																			/>
																		</div>
																		<div className="ms-2 flex-grow-1">
																			<h5 className="mb-0">Create Unions</h5>
																		</div>
																	</div>
																	<p className="mb-2">
																		Create Unions and invite their respective
																		admins
																	</p>

																	<p className="action mb-0">Create Unions</p>
																</div>
															</div>
														</Link>
													</div>

													<div className="col-lg-4 mb-lg-0 mb-3">
														<a href="/users" className="text-decoration-none">
															<div className="card dash-card bg-custom-color-2 h-100 border-0">
																<div className="card-body">
																	<div className="d-flex avatar-holder align-items-center mb-3">
																		<div className="position-relative flex-shrink-0">
																			<img
																				src="/images/userz-icon.svg"
																				className="img-fluid" alt=""
																			/>
																		</div>
																		<div className="ms-2 flex-grow-1">
																			<h5 className="mb-0">Invite Users</h5>
																		</div>
																	</div>
																	<p className="mb-2">
																		Invite users individually or in bulk to NDRS
																	</p>

																	<p className="action mb-0">Invite users</p>
																</div>
															</div>
														</a>
													</div>
												</div>

												<div className="d-flex justify-content-between align-items-center mb-2">
													<h4 className="mb-0 heading-4">Reports</h4>
													<Link
														to="/reports"
														className="text-main-primary text-decoration-none text-medium"
													>
														Show all
													</Link>
												</div>

												<div className="card p-lg-4 mb-5">
													<div className="card-body">
														<div className="row align-items-center">
															<div className={periodMessage.period_text && periodMessage.report_text ? `col-lg-4` : ``}>
																{periodMessage.period_text && periodMessage.report_text && (
																	<h3 className="chart-text">
																		There has been a{" "}
																		<span className="text-main-primary">
																			{periodMessage.report_text}
																		</span>{" "}
																		in total time of Dispute Resolutions over the
																		past{" "}
																		<span className="text-main-primary">
																			{periodMessage.period_text}
																		</span>
																	</h3>
																)}
															</div>
															{isComponentLoading ? (
																<div
																	className="d-flex justify-content-center align-items-center"
																	style={{ minHeight: "80vh" }}
																>
																	<ClipLoader color="#36D7B7" loading={isComponentLoading} size={50} />
																</div>
															) : (
																<div className={`${periodMessage.period_text && periodMessage.report_text ? `col-lg-8` : `col-lg-12`}`}>
																	<MyChartComponent periods={periods} data={periodData} />
																</div>
															)}
														</div>
													</div>
												</div>

												<div className="d-flex justify-content-between align-items-center mb-2">
													<h4 className="mb-0 heading-4">Notifications</h4>
													<Link
														to="/notifications"
														className="text-main-primary text-decoration-none text-medium"
													>
														Show all
													</Link>
												</div>

												<div className="card p-lg-1 mb-5">
													<div className="card-body p-0">

														{dashboard?.recent_notifications?.data?.length > 0 ? (
															dashboard?.recent_notifications?.data.slice(0, 3).map((item) =>
																<div className="d-flex avatar-holder bg-custom-color-2 p-3 rounded my-4" key={item._id}>
																	<div className="position-relative">
																		<div className="avatar-sm flex-shrink-0">
																			<img
																				src={item.photo || '/images/download.png'}
																				className="img-fluid object-position-center object-fit-cover w-100 h-100"
																				alt="Avatar"
																			/>
																		</div>
																	</div>
																	<div className="ms-2 flex-grow-1">
																		<div className="mb-2 d-flex align-items-center">
																			<p className="mb-0">
																				<strong>{item.message}</strong>
																			</p>
																		</div>

																		<div className="">
																			<p className="mb-0">{item.date}</p>
																		</div>
																	</div>
																</div>
															)) : (
															<div className="d-flex justify-content-center align-items-center">
																<h5>No Notifications Yet</h5>
															</div>

														)}

													</div>
												</div>
											</div>
											<div className="col-lg-4">
												<div className="mb-4">
													<div className="d-flex justify-content-between align-items-center mb-2">
														<h4 className="mb-0 heading-4">Recent Discussions</h4>
														<Link
															to="/discussions"
															className="text-main-primary text-decoration-none text-medium"
														>
															Show all
														</Link>
													</div>
													<div className="card dash-card">
														<div className="card-body">
															{dashboard?.recent_messages?.data?.length > 0 ? (
																dashboard?.recent_messages?.data.slice(0, 4).map((item) => (
																	<div className="d-flex avatar-holder my-4" key={item._id}>
																		<div className="position-relative">
																			<div className="avatar-sm flex-shrink-0">
																				<img
																					src={item.sender.photo || '/images/download.png'}
																					className="img-fluid object-position-center object-fit-cover w-100 h-100"
																					alt="Avatar"
																				/>
																			</div>
																		</div>
																		<div className="ms-2 flex-grow-1">
																			<div className="d-flex justify-content-between align-items-center mb-2">
																				<div className="mb-0 d-flex align-items-center">
																					<div className="heading-text text-truncate max-150">
																						{item.sender.sender}
																					</div>
																					<span className="card-text-sm ms-2">
																						{item.case_no}
																					</span>
																				</div>
																				<span className="text-main-primary ft-sm-only">
																					{item.time_sent}
																				</span>
																			</div>
																			<div className="d-flex justify-content-between align-items-start">
																				<p className="mb-0 action line-clamp-2">
																					{item.message}
																				</p>
																				<span className="badge rounded-pill text-bg-main">
																					{item.unread_messages}
																				</span>
																			</div>
																		</div>
																	</div>
																))
															) : (
																<div className="d-flex align-items-center justify-content-center">
																	<h5>No Discussions Yet.</h5>
																</div>
															)}

														</div>
													</div>
												</div>

												<div className="mb-4">
													<div className="d-flex justify-content-between align-items-center mb-2">
														<h4 className="mb-0 heading-4">Recent Documents</h4>
														<Link
															to="/documents"
															className="text-main-primary text-decoration-none text-medium"
														>
															Show all
														</Link>
													</div>
													<div className="card dash-card">
														<div className="card-body">
															{dashboard?.recent_documents?.data?.length > 0 ? (
																dashboard?.recent_documents?.data.slice(0, 4).map((item) =>
																	<div className="d-flex avatar-holder my-4" key={item._id}>
																		<div className="position-relative">
																			<div className="flex-shrink-0">
																				<img
																					src="/images/pdf-icon.svg"
																					className="img-fluid object-position-center object-fit-cover w-100 h-100"
																					alt="PDF"
																				/>
																			</div>
																		</div>
																		<div className="ms-2 flex-grow-1">
																			<div className="mb-2 d-flex align-items-center">
																				<div className="heading-text text-truncate max-150">
																					{item.name}
																				</div>{" "}
																				<span className="card-text-sm ms-2">
																					{item.case_no}
																				</span>
																			</div>

																			<div className="d-flex justify-content-between align-items-center">
																				<p className="mb-0">
																					{item.time_modified}{" "}
																					<i className="bi bi-dot"></i>{" "}
																					<span className="text-medium">{item.size}</span>
																				</p>
																			</div>
																		</div>
																		<div className="avatar-sm flex-shrink-0">
																			<img
																				src="/images/union-3.svg"
																				className="img-fluid object-position-center object-fit-cover w-100 h-100"
																				alt="Avatar"
																			/>
																		</div>
																	</div>
																)) : (
																<div className="d-flex justify-content-center align-items-center">
																	<h5>No Documents Yet</h5>
																</div>

															)}

														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</main>)}


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

export default Dashboard;
