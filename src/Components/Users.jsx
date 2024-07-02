import React, { useEffect, useRef, useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import toast from "react-hot-toast";
import { ClipLoader } from "react-spinners";
import { Link, useNavigate } from "react-router-dom";

const Users = () => {
	const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
	const [roles, setRoles] = useState([]);
	const [getBoardOfEnquire, setGetBoardOfEnquire] = useState([]);
	const [getDisputes, setGetDisputes] = useState([]);
	const [getIndividualUsers, setIndividualUsers] = useState([]);
	const [getAdminRoles, setAdminRoles] = useState([]);
	const [getAdminRoleUsers, setAdminRoleUsers] = useState([]);
	const [getSettlementBodies, setSettlementBodies] = useState([]);
	const [getSettlementBodyLists, setSettlementBodyLists] = useState([]);
	const [getSettlementBodyMembers, setSettlementBodyMembers] = useState([]);
	const [IndividualUser, setIndividualUser] = useState({
		user_id: "",
		user_name: "",
		user_photo: "",
	});
	const [IndividualSettlmentBody, setIndividualSettlmentBody] = useState({
		sb_id: "",
		sb_name: "",
	});
	const [IndividualSettlmentProfile, setIndividualSettlmentProfile] = useState({
		sp_id: "",
		sp_name: "",
		sp_status: "",
	});
	const [
		IndividualSettlmentMemberProfile,
		setIndividualSettlmentMemberProfile,
	] = useState({
		member_id: "",
		member_name: "",
	});
	const [isChecked, setIsChecked] = useState(false);
	const [isLoading, setIsLoading] = useState(true);
	const [isAdminLoading, setIsAdminLoading] = useState(true);
	const [isSettlementBodyLoading, setIsSettlementBodyLoading] = useState(true);
	const [isSettlementBodyMemberLoading, setIsSettlementBodyMemberLoading] =
		useState(false);
	const [isSettlementBodyMemberDisabled, setIsSettlementBodyMemberDisabled] =
		useState(false);

	// const [bulkUpload, setBulkUpload] = useState({
	//   file: "",
	// });
	const [users, setUsers] = useState({
		email: "",
		role: "",
		case_id: "",
	});

	const [user, setuser] = useState({
		permissions: []
	});

	const [individualReferCase, setIndividualReferCase] = useState([]);

	const [uploadStatus, setUploadStatus] = useState(null);

	const [boardOfEnquire, setboardOfEnquire] = useState({
		name: "",
	});
	const [customRole, setcustomRole] = useState({
		name: "",
	});
	const [settlementBodyMemberInvite, setsettlementBodyMemberInvite] = useState({
		email: "",
	});
	const [sidebar, setsidebar] = useState(true);

	const toggleSideBar = () => {
		setsidebar(!sidebar);
	};

	const fileInputRef = useRef(null);

	const handleButtonClick = () => {
		fileInputRef.current.click();
	};
	const CheckboxChange = (event) => {
		setIsChecked(event.target.checked);
	};

	const handleFileChange = async (event) => {
		const file = event.target.files[0];
		if (file && file.type === "text/csv") {
		const formData = new FormData();
		formData.append("file", file);

		try {
			const baseUrl =
			"https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
			const response = await fetch(baseUrl + "/api/users/bulk/send-invite", {
			headers: {
				Authorization: `Bearer ${localStorage.getItem("token")}`,
			},
			method: "POST",
			body: formData,
			});

			if (response.ok) {
			setUploadStatus("Upload successful!");
			const result = await response.json();
			toast.success("users have been uploaded succesfully!");
			} else {
			setUploadStatus("Upload failed.");
			toast.error("Failed to upload users!");
			console.error("Upload error:", response.statusText);
			}
		} catch (error) {
			setUploadStatus("Upload failed.");

			console.error("Upload error:", error);
		}

		fileInputRef.current.value = "";
		} else {
		alert("Please upload a valid CSV file.");
		}
	};

	useEffect(() => {
		fetchProfile();
		fetchDisputes();
		getAllIndividualUsers();
		getAllAdminRoles();
		getAllSettlementBodies();
	}, []);

	const [searchQuery, setSearchQuery] = useState("");
	const [filteredDisputes, setFilteredDisputes] = useState([]);
	const [filteredAdminRoles, setFilteredAdminRoles] = useState([]);
	const [filteredSettlementBodies, setFilteredSettlementBodies] = useState([]);

	const sortindividuals = () => {
		const sortedItems = [...getIndividualUsers].sort((a, b) => {
		if (isAscending) {
			return a.name.localeCompare(b.name);
		} else {
			return b.name.localeCompare(a.name);
		}
		});
		setIndividualUsers(sortedItems);
		setIsAscending(!isAscending);
	};
	const sortSettlementBodyLists = () => {
		const sortedItems = [...getSettlementBodyLists].sort((a, b) => {
		if (isAscending) {
			return a.name.localeCompare(b.name);
		} else {
			return b.name.localeCompare(a.name);
		}
		});
		setSettlementBodyLists(sortedItems);
		setIsAscending(!isAscending);
	};
	const sortAdminRole = () => {
		const sortedItems = [...getAdminRoleUsers].sort((a, b) => {
		if (isAscending) {
			return a.name.localeCompare(b.name);
		} else {
			return b.name.localeCompare(a.name);
		}
		});
		setAdminRoleUsers(sortedItems);
		setIsAscending(!isAscending);
	};

	useEffect(() => {
		// Filter disputes based on search query
		setFilteredDisputes(
		getIndividualUsers.filter((item) =>
			item.name.toLowerCase().includes(searchQuery.toLowerCase())
		)
		);
		setFilteredAdminRoles(
		getAdminRoleUsers.filter((item) =>
			item.name.toLowerCase().includes(searchQuery.toLowerCase())
		)
		);
		setFilteredSettlementBodies(
		getSettlementBodyLists.filter((item) =>
			item.name.toLowerCase().includes(searchQuery.toLowerCase())
		)
		);
	}, [
		searchQuery,
		getIndividualUsers,
		getAdminRoleUsers,
		getSettlementBodyLists,
	]);

	const handleSearchChange = (e) => {
		setSearchQuery(e.target.value);
	};

	const onHandleChangeUser = (e) => {
		setUsers({ ...users, [e.target.name]: e.target.value });
	};

	const handleDissolve = async (e, id) => {
		e.preventDefault();

		try {
		const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
		const response = await fetch(
			baseUrl + `/api/users/dissolve-board-of-enquiry/${id}`,
			{
			method: "DELETE",
			headers: {
				Authorization: `Bearer ${localStorage.getItem("token")}`,
			},
			}
		);

		if (!response.ok) {
			throw new Error("Network response was not ok");
		}

		const data = await response.json();
		toast.success(data.message);
		getAllSettlementBodyLists({
			_id: IndividualSettlmentBody.sb_id,
			name: IndividualSettlmentBody.sb_name,
		});
		} catch (error) {
		console.error("Error fetching data:", error);
		}
	};

	const handleDownload = async () => {
		try {
		const response = await fetch(
			"https://phpstack-1245936-4460801.cloudwaysapps.com/dev/api/users/sample-csv",
			{
			method: "GET",
			headers: {
				"Content-Type": "application/json",
				Authorization: `Bearer ${localStorage.getItem("token")}`,
			},
			}
		);

		if (!response.ok) {
			throw new Error("Network response was not ok");
		}

		const data = await response.json();
		// const url = window.URL.createObjectURL(blob);
		const a = document.createElement("a");
		a.href = data.data.sample_csv;
		a.download = data.data.sample_csv; // Specify the file name
		document.body.appendChild(a);
		a.click();
		a.remove(); // Clean up and remove the element
		// console.log(url);
		// Optional: Revoke the object URL after some delay
		// setTimeout(() => window.URL.revokeObjectURL(url), 100);
		} catch (error) {
		console.error("Error downloading the file:", error);
		}
	};

	const handleSubmitUser = async (e) => {
		e.preventDefault();

		try {
		const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
		const response = await fetch(baseUrl + "/api/users/send-invite", {
			method: "POST",
			headers: {
			"Content-Type": "application/json",
			Accept: "application/json",
			Authorization: `Bearer ${localStorage.getItem("token")}`,
			},
			body: JSON.stringify(users), // Pass FormData object as the body
		});

		if (!response.ok) {
			throw new Error("Network response was not ok");
		}

		const data = await response.json();

		toast.success("User Invite has been sent!");
		setUsers({
			email: "",
			role: "",
			case_id: "",
		});
		} catch (error) {
		console.error("Error fetching data:", error);
		toast.error("Email has already been used or invalid Email!");
		}
	};

	const onHandleChange = (e) => {
		setboardOfEnquire({ ...boardOfEnquire, [e.target.name]: e.target.value });
	};

	const handleSubmit = async (e) => {
		e.preventDefault();

		try {
		const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
		const response = await fetch(
			baseUrl +
			`/api/users/create-settlement-body/${IndividualSettlmentBody.sb_id}`,
			{
			method: "POST",
			headers: {
				"Content-Type": "application/json",
				Accept: "application/json",
				Authorization: `Bearer ${localStorage.getItem("token")}`,
			},
			body: JSON.stringify(boardOfEnquire), // Pass FormData object as the body
			}
		);

		if (!response.ok) {
			throw new Error("Network response was not ok");
		}

		const data = await response.json();
		toast.success(data.message);
		setboardOfEnquire({
			name: "",
		});

		getAllSettlementBodyLists({
			_id: IndividualSettlmentBody.sb_id,
			name: IndividualSettlmentBody.sb_name,
		});
		} catch (error) {
		console.error("Error fetching data:", error);
		}
	};

	useEffect(() => {
		fetchdata();
	}, []);

	const fetchdata = async () => {
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
		} finally {
		setIsLoading(false);
		}
	};

	const onHandleCustomRole = (e) => {
		setcustomRole({ ...customRole, [e.target.name]: e.target.value });
	};

	const CreateCustomRole = async (e) => {
		e.preventDefault();

		try {
		const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
		const response = await fetch(baseUrl + "/api/users/create-role", {
			method: "POST",
			headers: {
			"Content-Type": "application/json",
			Accept: "application/json",
			Authorization: `Bearer ${localStorage.getItem("token")}`,
			},
			body: JSON.stringify(customRole), // Pass FormData object as the body
		});

		if (!response.ok) {
			throw new Error("Network response was not ok");
		}
		fetchdata();
		const data = await response.json();
		setcustomRole({
			name: "",
		});

		// window.location.reload();
		toast.success("custom role has been created!");
		} catch (error) {
		console.error("Error fetching data:", error);
		}
	};

	const fetchDisputes = async () => {
		try {
		const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
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
		setGetDisputes(data.data);
		} catch (error) {
		console.error("Error fetching data:", error.message);
		}
	};

	const fetchProfile = async () => {
		try {
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
		} catch (error) {
			console.error("Error fetching data:", error.message);
		}
	};

	const updatePermission = async (
		roleId,
		permissionId,
		hasPermission,
		roleIndex,
		category,
		permissionIndex
	) => {
		try {
		const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
		const res = await fetch(baseUrl + "/api/users/update-permission", {
			method: "POST",
			headers: {
			"Content-Type": "application/json",
			Authorization: `Bearer ${localStorage.getItem("token")}`,
			},
			body: JSON.stringify({
			role_id: roleId,
			permission_id: permissionId,
			}),
		});

		if (!res.ok) {
			const errorData = await res.json();
			console.error("API Error:", errorData.message);
			throw new Error(errorData.message);
		}

		const data = await res.json();

		// If API call is successful, update state
		setRoles((prevRoles) => {
			const newRoles = [...prevRoles];
			newRoles[roleIndex].permissions[category][
			permissionIndex
			].has_permission = hasPermission;
			return newRoles;
		});
		} catch (error) {
		console.error("Error updating permission:", error.message);

		// If error occurs, revert the UI change
		setRoles((prevRoles) => {
			const newRoles = [...prevRoles];
			newRoles[roleIndex].permissions[category][
			permissionIndex
			].has_permission = hasPermission ? 0 : 1;
			return newRoles;
		});
		}
	};

	// Handle checkbox change and update state
	const handleCheckboxChange = (roleIndex, category, permissionIndex) => {
		const permission = roles[roleIndex].permissions[category][permissionIndex];
		const newPermissionStatus = permission.has_permission ? 0 : 1;

		// Optimistically update UI
		setRoles((prevRoles) => {
		const newRoles = [...prevRoles];
		newRoles[roleIndex].permissions[category][
			permissionIndex
		].has_permission = newPermissionStatus;
		return newRoles;
		});

		// Call API to update permission
		updatePermission(
		roles[roleIndex]._id,
		permission._id,
		newPermissionStatus,
		roleIndex,
		category,
		permissionIndex
		);
	};

	const restoreDefault = async (e, role_id, roles, setRoles) => {
		e.preventDefault();

		try {
		const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
		const response = await fetch(
			baseUrl + "/api/users/restore-role-default",
			{
			method: "POST",
			headers: {
				"Content-Type": "application/json",
				Accept: "application/json",
				Authorization: `Bearer ${localStorage.getItem("token")}`,
			},
			body: JSON.stringify({ role_id: role_id }),
			}
		);

		if (!response.ok) {
			throw new Error("Network response was not ok");
		}

		const data = await response.json();
		// setRoles(data);
		window.location.reload();
		toast.success("Roles has been restored to default!");
		} catch (error) {
		console.error("Error fetching data:", error);
		}
	};
	const [isAscending, setIsAscending] = useState(true);

	const sortBoardOfEnquire = () => {
		const sortedItems = [...getBoardOfEnquire].sort((a, b) => {
		if (isAscending) {
			return a.name.localeCompare(b.name);
		} else {
			return b.name.localeCompare(a.name);
		}
		});
		setGetBoardOfEnquire(sortedItems);
		setIsAscending(!isAscending);
	};

	const getAllIndividualUsers = async () => {
		try {
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(baseUrl + "/api/users/all", {
			headers: {
			Authorization: `Bearer ${token}`,
			},
		});

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		setIndividualUsers(data.data);
		} catch (error) {
		console.error("Error fetching data:", error.message);
		}
	};

	const getAllAdminRoles = async () => {
		try {
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(baseUrl + "/api/users/admin-roles", {
			headers: {
			Authorization: `Bearer ${token}`,
			},
		});

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		setAdminRoles(data.data);
		if (data.data.length) {
			getAllAdminRoleUsers(data.data[0]._id);
		}
		} catch (error) {
		console.error("Error fetching data:", error.message);
		}
	};

	const getAllAdminRoleUsers = async (role_id) => {
		setIsAdminLoading(true);

		try {
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(baseUrl + `/api/users/role/${role_id}`, {
			headers: {
			Authorization: `Bearer ${token}`,
			},
		});

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		setAdminRoleUsers(data.data);
		} catch (error) {
		console.error("Error fetching data:", error.message);
		} finally {
		setIsAdminLoading(false);
		}
	};

	const getAllSettlementBodies = async () => {
		try {
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(baseUrl + "/api/users/settlement-roles", {
			headers: {
			Authorization: `Bearer ${token}`,
			},
		});

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		setSettlementBodies(data.data);
		if (data.data.length) {
			getAllSettlementBodyLists(data.data[0]);
		}
		} catch (error) {
		console.error("Error fetching data:", error.message);
		}
	};

	const getAllSettlementBodyLists = async (sb) => {
		setIsSettlementBodyLoading(true);
		setIndividualSettlmentBody({
		sb_id: sb._id,
		sb_name: sb.name,
		});

		try {
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(
			baseUrl + `/api/users/get-settlement-body/${sb._id}`,
			{
			headers: {
				Authorization: `Bearer ${token}`,
			},
			}
		);

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		setSettlementBodyLists(data.data);
		} catch (error) {
		console.error("Error fetching data:", error.message);
		} finally {
		setIsSettlementBodyLoading(false);
		}
	};

	const fetchSettlementBodyMembers = async (sb) => {
		setIsSettlementBodyMemberLoading(true);

		try {
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(
			baseUrl + `/api/users/view-board-members/${sb._id}`,
			{
			headers: {
				Authorization: `Bearer ${token}`,
			},
			}
		);

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		setSettlementBodyMembers(data.data);
		} catch (error) {
		console.error("Error fetching data:", error.message);
		} finally {
		setIsSettlementBodyMemberLoading(false);
		}
	};

	const sendSettlementBodyMemberInvite = async () => {
		setIsSettlementBodyMemberDisabled(true);

		try {
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(
			baseUrl +
			`/api/users/invite-board-member/${IndividualSettlmentProfile.sp_id}`,
			{
			method: "POST",
			headers: {
				Authorization: `Bearer ${token}`,
				"Content-Type": "application/json",
				Accept: "application/json",
			},
			body: JSON.stringify(settlementBodyMemberInvite),
			}
		);

		const data = await res.json();

		if (!res.ok) {
			if (Object.values(data.error).length) {
				Object.values(data.error).forEach((errorMessage, index) => {
					toast.error(errorMessage);
				});
			}
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		toast.success(data.message);
		fetchSettlementBodyMembers({
			_id: IndividualSettlmentProfile.sp_id,
		});
		setsettlementBodyMemberInvite({
			email: "",
		});
		} catch (error) {
		console.error("Error fetching data:", error.message);
		} finally {
		setIsSettlementBodyMemberDisabled(false);
		}
	};

	const onHandleSettlementMemberChange = (e) => {
		setsettlementBodyMemberInvite({
		...settlementBodyMemberInvite,
		[e.target.name]: e.target.value,
		});
	};

	const removeSettlementBodyMember = async () => {
		setIsSettlementBodyMemberLoading(true);

		try {
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(
			baseUrl +
			`/api/users/remove-board-member/${IndividualSettlmentMemberProfile.member_id}`,
			{
			method: "DELETE",
			headers: {
				Authorization: `Bearer ${token}`,
			},
			}
		);

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		fetchSettlementBodyMembers({
			_id: IndividualSettlmentProfile.sp_id,
		});
		toast.success(data.message);
		} catch (error) {
		console.error("Error fetching data:", error.message);
		} finally {
		setIsSettlementBodyMemberLoading(false);
		}
	};

	const changeStatus = async (e, id, status) => {
		e.preventDefault();

		try {
		const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";
		const response = await fetch(baseUrl + `/api/users/change-status/${id}`, {
			method: "POST",
			headers: {
			"Content-Type": "application/json",
			Accept: "application/json",
			Authorization: `Bearer ${localStorage.getItem("token")}`,
			},
			body: JSON.stringify({ status }),
		});

		if (!response.ok) {
			throw new Error("Network response was not ok");
		}

		const data = await response.json();

		// toast.success("Roles has been restored to default!");
		} catch (error) {
		console.error("Error fetching data:", error);
		}
	};

	const selectAllDisputeCases = () => {
		let disputeSelectAllCheckboes =
		document.getElementById("select-all-dispute");
		if (disputeSelectAllCheckboes.checked == true) {
		document
			.querySelectorAll(".all-dispute-selected")
			.forEach(function (checkbox) {
			if (!checkbox.checked) {
				checkbox.checked = true;
				updateCasesValue(checkbox.value);
			}
			});
		} else {
		document
			.querySelectorAll(".all-dispute-selected")
			.forEach(function (checkbox) {
			if (checkbox.checked) {
				checkbox.checked = false;
				updateCasesValue(checkbox.value);
			}
			});
		}
	};

	const onHandleReferCaseSelect = (e, index) => {
		updateCasesValue(e.target.value);
	};

	const updateCasesValue = (value) => {
		setIndividualReferCase((individualReferCase) => {
		if (individualReferCase.includes(value)) {
			// Remove the value from the array
			return individualReferCase.filter((item) => item !== value);
		} else {
			// Add the value to the array
			return [...individualReferCase, value];
		}
		});
	};

	const handleIndividualUserInfo = (user, user_type = "user") => {
		setIndividualUser({
		user_id: user._id,
		user_name: user.name,
		user_photo: user.photo,
		type: user_type,
		});
	};

	const handleIndividualCaseRefer = async () => {
		try {
		if (!individualReferCase.length) {
			toast.error("Please select a case to refer to this user");
			return;
		}
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		var refer_case_url =
			baseUrl + `/api/users/refer-case/${IndividualUser.user_id}`;

		if (IndividualUser.type === "settlement_body") {
			refer_case_url =
			baseUrl + `/api/users/refer-case-to-body/${IndividualUser.user_id}`;
		}

		const res = await fetch(refer_case_url, {
			method: "POST",
			headers: {
			"Content-Type": "application/json",
			Accept: "application/json",
			Authorization: `Bearer ${token}`,
			},
			body: JSON.stringify({
			cases: individualReferCase,
			}),
		});

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		toast.success(data.message);

		document
			.querySelectorAll(".all-dispute-selected")
			.forEach(function (checkbox) {
			if (checkbox.checked) {
				checkbox.checked = false;
				updateCasesValue(checkbox.value);
			}
			});

		let disputeSelectAllCheckboes =
			document.getElementById("select-all-dispute");
		if (disputeSelectAllCheckboes.checked == true) {
			disputeSelectAllCheckboes.checked = false;
		}
		} catch (error) {
		console.error("Error fetching data:", error.message);
		}
	};

	const handleUserStatusChange = async (user_id, status) => {
		try {
		const token = localStorage.getItem("token");

		if (!token) {
			throw new Error("User is not logged in."); // Handle case where user is not logged in
		}

		const res = await fetch(baseUrl + `/api/users/change-status/${user_id}`, {
			method: "POST",
			headers: {
			"Content-Type": "application/json",
			Accept: "application/json",
			Authorization: `Bearer ${token}`,
			},
			body: JSON.stringify({
			status: status,
			}),
		});

		if (!res.ok) {
			throw new Error("Failed to fetch data."); // Handle failed request
		}

		const data = await res.json();
		toast.success(data.message);
		} catch (error) {
		console.error("Error fetching data:", error.message);
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
					<h2>Users & Groups </h2>
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
								{user.permissions && user.permissions.includes("invite users") && (
									<li className="nav-item" role="presentation">
										<button
										className="nav-link active"
										id="pills-invite-tab"
										data-bs-toggle="pill"
										data-bs-target="#pills-invite"
										type="button"
										role="tab"
										aria-controls="pills-invite"
										aria-selected="true"
										>
										Invite
										</button>
									</li>
								)}
								<li className="nav-item" role="presentation">
									<button
									className={`nav-link ${user.permissions && !user.permissions.includes("invite users") ? `active` : ``}`}
									id="pills-individual-tab"
									data-bs-toggle="pill"
									data-bs-target="#pills-individual"
									type="button"
									role="tab"
									aria-controls="pills-individual"
									aria-selected="false"
									>
									All Individual Users
									</button>
								</li>
								<li className="nav-item" role="presentation">
									<button
									className="nav-link"
									id="pills-claimants-tab"
									data-bs-toggle="pill"
									data-bs-target="#pills-claimants"
									type="button"
									role="tab"
									aria-controls="pills-claimants"
									aria-selected="false"
									>
									Admins & Claimants
									</button>
								</li>
								<li className="nav-item" role="presentation">
									<button
									className="nav-link"
									id="pills-settlement-tab"
									data-bs-toggle="pill"
									data-bs-target="#pills-settlement"
									type="button"
									role="tab"
									aria-controls="pills-settlement"
									aria-selected="false"
									>
									Settlement Management Bodies
									</button>
								</li>
								{user.permissions && user.permissions.includes("edit roles and permissions") && (
									<li className="nav-item" role="presentation">
										<button
										className="nav-link"
										id="pills-role-tab"
										data-bs-toggle="pill"
										data-bs-target="#pills-role"
										type="button"
										role="tab"
										aria-controls="pills-role"
										aria-selected="false"
										>
										Roles & Permissions
										</button>
									</li>
								)}
							</ul>
							<div className="tab-content" id="pills-tabContent">
								{user.permissions && user.permissions.includes("invite users") && (
									<div
										className="tab-pane fade show active"
										id="pills-invite"
										role="tabpanel"
										aria-labelledby="pills-invite-tab"
										tabIndex="0"
									>
										<div className="row mt-5">
										<div className="col-lg-3">
											<div
											className="nav flex-column tab-item nav-pills gap-10"
											id="v-pills-tab"
											role="tablist"
											aria-orientation="vertical"
											>
											<button
												className="nav-link tab-v text-start active"
												id="v-pills-bulk-tab"
												data-bs-toggle="pill"
												data-bs-target="#v-pills-bulk"
												type="button"
												role="tab"
												aria-controls="v-pills-bulk"
												aria-selected="true"
											>
												Bulk Users Upload
											</button>
											<button
												className="nav-link tab-v text-start"
												id="v-pills-single-tab"
												data-bs-toggle="pill"
												data-bs-target="#v-pills-single"
												type="button"
												role="tab"
												aria-controls="v-pills-single"
												aria-selected="false"
											>
												Single User Invite
											</button>
											</div>
										</div>

										<div className="col-lg-9">
											<div
											className="tab-content"
											id="v-pills-tabContent"
											>
											<div
												className="tab-pane fade show active"
												id="v-pills-bulk"
												role="tabpanel"
												aria-labelledby="v-pills-bulk-tab"
												tabIndex="0"
											>
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
														<button
														className="btn btn-main-outline-primary btn-size"
														onClick={handleDownload}
														>
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
														src="images/csv.png"
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
															src="images/file_upload_states.svg"
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
															src="images/or-line.svg"
															className="img-fluid"
														/>

														<div className="mt-3">
															<input
															type="file"
															id="profile"
															ref={fileInputRef}
															style={{
																visibility: "hidden",
																height: "0",
															}}
															onChange={handleFileChange}
															/>
															<button
															className="btn btn-main-primary btn-size mx-auto"
															onClick={handleButtonClick}
															>
															<i className="bi bi-upload me-2"></i>{" "}
															Upload filled CSV
															</button>
														</div>
														</div>
													</div>
													</div>
												</div>
												</div>
											</div>

											<div
												className="tab-pane fade"
												id="v-pills-single"
												role="tabpanel"
												aria-labelledby="v-pills-single-tab"
												tabIndex="0"
											>
												<div className="card mb-4">
												<div className="card-header p-4 heading-card bg-white d-flex align-items-center justify-content-between flex-wrap">
													<h3 className="mb-lg-0 mb-3">
													Single Invite
													</h3>

													<a
													href=""
													className="btn btn-size btn-main-primary"
													onClick={handleSubmitUser}
													>
													Send Invite
													</a>
												</div>
												<div className="card-body p-4">
													<form>
													<div className="row mt-4">
														<div className="col-lg-12">
														<div className="mb-4">
															<label className="form-label">
															User’s email
															</label>
															<input
															type="email"
															className="form-control form-control-height"
															name="email"
															placeholder="Enter User’s email"
															value={users.email}
															onChange={onHandleChangeUser}
															/>
														</div>

														<div className="mb-4">
															<label className="form-label">
															User’s role
															</label>
															<select
															className="form-select form-control-height"
															name="role"
															onChange={onHandleChangeUser}
															value={users.role}
															>
															<option>
																Type or select a user type
															</option>
															{roles.map((role) => (
																<option
																key={role._id}
																value={role._id}
																>
																{role.name}
																</option>
															))}
															</select>
														</div>

														{user.permissions && user.permissions.includes("assign users cases") && (
															<div className="mb-4">
																<label className="form-label">
																Invite to a dispute case{" "}
																<span className="text-muted-3">
																	(optional)
																</span>
																</label>
																<select
																className="form-select form-control-height"
																name="case_id"
																onChange={onHandleChangeUser}
																value={users.case_id}
																>
																<option>
																	Type or select a dispute
																	case
																</option>
																{getDisputes.map(
																	(dispute) => (
																	<option
																		key={dispute._id}
																		value={dispute._id}
																	>
																		{dispute.case_no}
																	</option>
																	)
																)}
																</select>
															</div>
														)}
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
								)}

								<div
									className={`tab-pane fade ${user.permissions && !user.permissions.includes("invite users") ? `show active` : ``}`}
									id="pills-individual"
									role="tabpanel"
									aria-labelledby="pills-individual-tab"
									tabIndex="0"
								>
									<div className="row mt-5">
										<div className="col-lg-12">
											<div className="card mb-4">
												<div className="card-body p-4">
													<div className="row mt-2 mb-4">
													<div className="col-lg-5">
														<div className="input-group">
														<span className="input-group-text bg-transparent">
															<img
															src="images/search.svg"
															className="img-fluid"
															alt="search"
															/>
														</span>
														<input
															type="search"
															className="form-control border-start-0 form-control-height"
															placeholder="Search here..."
															value={searchQuery}
															onChange={handleSearchChange}
														/>
														</div>
													</div>

													<div className="col-lg-7">
														<div className="d-flex align-items-center justify-content-between gap-15">
														<div className="d-flex">
															<a
															className="btn btn-size btn-outline-light text-medium px-3 me-lg-3"
															onClick={sortindividuals}
															>
															<img
																src="images/filter.svg"
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
															All Individual users:{" "}
															{getIndividualUsers.length}
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
																	<th scope="col">Name</th>
																	<th scope="col">Role</th>
																	<th scope="col">
																		Assigned Cases
																	</th>
																	<th scope="col">Date added</th>
																	<th scope="col">Actions</th>
																	</tr>
																</thead>
																<tbody>
																	{getIndividualUsers.length ? (
																	filteredDisputes.map((user) => (
																		<tr key={`ind-${user._id}`}>
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
																						src={
																						user.photo ||
																						"images/download.png"
																						}
																						className="img-fluid object-position-center object-fit-cover w-100 h-100"
																						alt="Avatar"
																					/>
																					</div>
																				</div>
																				<div className="ms-2 flex-grow-1">
																					<div className="d-flex justify-content-between align-items-center mb-2">
																					<div className="mb-0 d-flex align-items-center">
																						<div className="heading-text text-truncate max-150">
																						{user.name}
																						</div>
																					</div>
																					</div>
																				</div>
																				</div>
																			</td>
																			<td>{user.role}</td>
																			<td>{user.assigned_cases}</td>
																			<td>{user.date_added}</td>
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
																						src="images/dots-v.svg"
																						className="img-fluid"
																						alt="dots"
																						/>
																					</button>
																					<ul className="dropdown-menu border-radius action-menu-2">
																						<li>
																							<a
																								className="dropdown-item"
																								href="#"
																								data-bs-toggle="modal"
																								data-bs-target="#disputeModal"
																								onClick={() => {
																								handleIndividualUserInfo(
																									user
																								);
																								}}
																							>
																								Refer to Dispute
																								Case
																							</a>
																						</li>
																						
																						<li>
																							<a
																								href="javascript:void(0);"
																								className="dropdown-item d-flex align-items-center justify-content-between"
																								data-bs-toggle="collapse"
																								data-bs-target="#collapseStatus"
																								aria-expanded="false"
																								aria-controls="collapseStatus"
																							>
																								Change Status{" "}
																								<i className="bi bi-chevron-down"></i>
																							</a>
																						</li>
																						<div className="collapse" id="collapseStatus">
																							<ul className="list-unstyled">
																								<li>
																								<a
																									className="dropdown-item"
																									href="javascript:void(0);"
																									onClick={(
																									e
																									) => {
																									handleUserStatusChange(
																										user._id,
																										`active`
																									);
																									}}
																								>
																									<div className="form-check">
																									<input
																										className="form-check-input cursor-pointer"
																										type="radio"
																										name="flexRadioDefault"
																										id={`active-${user._id}`}
																										checked={
																										user.status ===
																										"active"
																										}
																									/>
																									<label
																										className="form-check-label"
																										htmlFor={`active-${user._id}`}
																									>
																										Active
																									</label>
																									</div>
																								</a>
																								</li>
																								<li>
																								<a
																									className="dropdown-item"
																									href="javascript:void(0);"
																									onClick={(
																									e
																									) => {
																									handleUserStatusChange(
																										user._id,
																										`suspended`
																									);
																									}}
																								>
																									<div className="form-check">
																									<input
																										className="form-check-input"
																										type="radio"
																										name="flexRadioDefault"
																										id={`suspended-${user._id}`}
																										checked={
																										user.status ===
																										"suspended"
																										}
																									/>
																									<label
																										className="form-check-label"
																										htmlFor={`suspended-${user._id}`}
																									>
																										Suspended
																									</label>
																									</div>
																								</a>
																								</li>
																								<li>
																								<a
																									className="dropdown-item"
																									href="javascript:void(0);"
																									onClick={(
																									e
																									) => {
																									handleUserStatusChange(
																										user._id,
																										`deactivated`
																									);
																									}}
																								>
																									<div className="form-check">
																									<input
																										className="form-check-input"
																										type="radio"
																										name="flexRadioDefault"
																										id={`deactivated-${user._id}`}
																										checked={
																										user.status ===
																										"deactivated"
																										}
																									/>
																									<label
																										className="form-check-label"
																										htmlFor={`deactivated-${user._id}`}
																									>
																										Deactivated
																									</label>
																									</div>
																								</a>
																								</li>
																							</ul>
																						</div>
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
																				No users found
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

								<div
									className="tab-pane fade"
									id="pills-claimants"
									role="tabpanel"
									aria-labelledby="pills-claimants-tab"
									tabIndex="0"
								>
									<div className="row mt-5">
									<div className="col-lg-3">
										<div
										className="nav flex-column tab-item nav-pills gap-10"
										id="v-pills-tab"
										role="tablist"
										aria-orientation="vertical"
										>
										{getAdminRoles.map((admin_role, index) => (
											<button
											className={`nav-link tab-v text-start ${
												index === 0 ? `active` : ``
											}`}
											id="v-pills-ministry-tab"
											data-bs-toggle="pill"
											data-bs-target="#v-pills-ministry"
											type="button"
											role="tab"
											aria-controls="v-pills-ministry"
											aria-selected="true"
											onClick={(e) => {
												getAllAdminRoleUsers(admin_role._id);
											}}
											>
											{admin_role.name}
											</button>
										))}
										</div>
									</div>

									<div className="col-lg-9">
										<div
										className="tab-content"
										id="v-pills-tabContent"
										>
										<div
											className="tab-pane fade show active"
											id="v-pills-ministry"
											role="tabpanel"
											aria-labelledby="v-pills-ministry-tab"
											tabIndex="0"
										>
											{isAdminLoading ? (
											<div
												className="d-flex justify-content-center align-items-center"
												style={{ minHeight: "80vh" }}
											>
												<ClipLoader
												color="#36D7B7"
												loading={isAdminLoading}
												size={50}
												/>
											</div>
											) : (
											<div className="card mb-4">
												<div className="card-body p-4">
												<div className="row mt-2 mb-4">
													<div className="col-lg-5">
													<div className="input-group">
														<span className="input-group-text bg-transparent">
														<img
															src="images/search.svg"
															className="img-fluid"
															alt="search"
														/>
														</span>
														<input
														type="search"
														className="form-control border-start-0 form-control-height"
														placeholder="Search here..."
														value={searchQuery}
														onChange={handleSearchChange}
														/>
													</div>
													</div>

													<div className="col-lg-7">
													<div className="d-flex align-items-center justify-content-between gap-15">
														<div className="d-flex">
														<a
															className="btn btn-size btn-outline-light text-medium px-3 me-lg-3"
															onClick={sortAdminRole}
														>
															<img
															src="images/filter.svg"
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
														Users:{" "}
														{getAdminRoleUsers.length}
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
															<th scope="col">Name</th>
															<th scope="col">
															Assigned Cases
															</th>
															<th scope="col">Status</th>
															<th scope="col">
															Date added
															</th>
															<th scope="col">Actions</th>
														</tr>
														</thead>
														<tbody>
														{getAdminRoleUsers.length ? (
															filteredAdminRoles.map(
															(user) => (
																<tr key={user._id}>
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
																			src={
																			user.photo ||
																			"images/download.png"
																			}
																			className="img-fluid object-position-center object-fit-cover w-100 h-100"
																			alt="Avatar"
																		/>
																		</div>
																	</div>
																	<div className="ms-2 flex-grow-1">
																		<div className="d-flex justify-content-between align-items-center mb-2">
																		<div className="mb-0 d-flex align-items-center">
																			<div className="heading-text text-truncate max-150">
																			{
																				user.name
																			}
																			</div>
																		</div>
																		</div>
																	</div>
																	</div>
																</td>
																<td>
																	{
																	user.assigned_cases
																	}
																</td>
																<td>{user.status}</td>
																<td>
																	{user.date_added}
																</td>
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
																		src="images/dots-v.svg"
																		className="img-fluid"
																		alt="dots"
																		/>
																	</button>
																	<ul className="dropdown-menu border-radius action-menu-2">
																		<li>
																		<a
																			className="dropdown-item"
																			href="#"
																			data-bs-toggle="modal"
																			data-bs-target="#disputeModal"
																			onClick={() => {
																			handleIndividualUserInfo(
																				user
																			);
																			}}
																		>
																			Refer to
																			Dispute Case
																		</a>
																		</li>
																		{/* <li><a className="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#permissionModal2">Edit permission level</a></li> */}
																		<li>
																		<a
																			href="javascript:void(0);"
																			className="dropdown-item d-flex align-items-center justify-content-between"
																			data-bs-toggle="collapse"
																			data-bs-target="#collapseStatus"
																			aria-expanded="false"
																			aria-controls="collapseStatus"
																		>
																			Change
																			Status{" "}
																			<i className="bi bi-chevron-down"></i>
																		</a>
																		</li>
																		<div
																		className="collapse"
																		id="collapseStatus"
																		>
																		<ul className="list-unstyled">
																			<li>
																			<a
																				className="dropdown-item"
																				href="javascript:void(0);"
																				onClick={(
																				e
																				) => {
																				handleUserStatusChange(
																					user._id,
																					`active`
																				);
																				}}
																			>
																				<div className="form-check">
																				<input
																					className="form-check-input cursor-pointer"
																					type="radio"
																					name="flexRadioDefault"
																					id={`admin-active-${user._id}`}
																					checked={
																					user.status ===
																					"active"
																					}
																				/>
																				<label
																					className="form-check-label"
																					htmlFor={`active-${user._id}`}
																				>
																					Active
																				</label>
																				</div>
																			</a>
																			</li>
																			<li>
																			<a
																				className="dropdown-item"
																				href="javascript:void(0);"
																				onClick={(
																				e
																				) => {
																				handleUserStatusChange(
																					user._id,
																					`suspended`
																				);
																				}}
																			>
																				<div className="form-check">
																				<input
																					className="form-check-input"
																					type="radio"
																					name="flexRadioDefault"
																					id={`admin-suspended-${user._id}`}
																					checked={
																					user.status ===
																					"suspended"
																					}
																				/>
																				<label
																					className="form-check-label"
																					htmlFor={`suspended-${user._id}`}
																				>
																					Suspended
																				</label>
																				</div>
																			</a>
																			</li>
																			<li>
																			<a
																				className="dropdown-item"
																				href="javascript:void(0);"
																				onClick={(
																				e
																				) => {
																				handleUserStatusChange(
																					user._id,
																					`deactivated`
																				);
																				}}
																			>
																				<div className="form-check">
																				<input
																					className="form-check-input"
																					type="radio"
																					name="flexRadioDefault"
																					id={`admin-deactivated-${user._id}`}
																					checked={
																					user.status ===
																					"deactivated"
																					}
																				/>
																				<label
																					className="form-check-label"
																					htmlFor={`deactivated-${user._id}`}
																				>
																					Deactivated
																				</label>
																				</div>
																			</a>
																			</li>
																		</ul>
																		</div>
																	</ul>
																	</div>
																</td>
																</tr>
															)
															)
														) : (
															<tr>
															<td
																id="admin-users-not-found"
																colSpan={6}
																className={`text-center`}
															>
																<p>
																<i className="fa fa-triangle-exclamation fa-2x text-warning"></i>
																</p>
																<p className="h5">
																No users found
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
											)}
										</div>
										</div>
									</div>
									</div>
								</div>

								<div
									className="tab-pane fade"
									id="pills-settlement"
									role="tabpanel"
									aria-labelledby="pills-settlement-tab"
									tabIndex="0"
								>
									<div className="row mt-5">
									<div className="col-lg-3">
										<div
										className="nav flex-column tab-item nav-pills gap-10"
										id="v-pills-tab"
										role="tablist"
										aria-orientation="vertical"
										>
										{getSettlementBodies.map((sb_role, index) => (
											<button
											className={`nav-link tab-v text-start ${
												index === 0 ? `active` : ``
											}`}
											id="v-pills-con-tab"
											data-bs-toggle="pill"
											data-bs-target="#v-pills-con"
											type="button"
											role="tab"
											aria-controls="v-pills-con"
											aria-selected="true"
											onClick={(e) => {
												getAllSettlementBodyLists(sb_role);
											}}
											>
											{sb_role.name}
											</button>
										))}
										</div>
									</div>

									<div className="col-lg-9">
										<div
										className="tab-content"
										id="v-pills-tabContent"
										>
										<div
											className="tab-pane fade show active"
											id="v-pills-con"
											role="tabpanel"
											aria-labelledby="v-pills-con-tab"
											tabIndex="0"
										>
											{isSettlementBodyLoading ? (
											<div
												className="d-flex justify-content-center align-items-center"
												style={{ minHeight: "80vh" }}
											>
												<ClipLoader
												color="#36D7B7"
												loading={isSettlementBodyLoading}
												size={50}
												/>
											</div>
											) : (
											<div className="card mb-4">
												<div className="card-body p-4">
												<div className="row mt-2 mb-4">
													<div className="col-lg-5">
													<div className="input-group">
														<span className="input-group-text bg-transparent">
														<img
															src="images/search.svg"
															className="img-fluid"
															alt="search"
														/>
														</span>
														<input
														type="search"
														className="form-control border-start-0 form-control-height"
														placeholder="Search here..."
														value={searchQuery}
														onChange={handleSearchChange}
														/>
													</div>
													</div>

													<div className="col-lg-7">
													<div className="d-flex align-items-center justify-content-between gap-15">
														<div className="d-flex">
														<a
															className="btn btn-size btn-outline-light text-medium px-3 me-lg-3"
															onClick={
															sortSettlementBodyLists
															}
														>
															<img
															src="images/filter.svg"
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
														{
															IndividualSettlmentBody.sb_name
														}
														:{" "}
														{
															getSettlementBodyLists?.length
														}
														</p>
													</div>
													</div>
												</div>

												<div className="row mb-4">
													<div className="col-lg-5 offset-lg-7">
													<button
														className="btn btn-main-primary btn-size w-100"
														data-bs-toggle="modal"
														data-bs-target="#boardModal"
													>
														Create{" "}
														{
														IndividualSettlmentBody.sb_name
														}{" "}
														Profile
													</button>
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
															<th scope="col">Members</th>
															<th scope="col">Name</th>
															<th scope="col">
															Assigned Cases
															</th>
															<th scope="col">Status</th>
															<th scope="col">
															Date added
															</th>
															<th scope="col">Actions</th>
														</tr>
														</thead>
														<tbody>
														{getSettlementBodyLists?.length >
														0 ? (
															filteredSettlementBodies.map(
															(
																settlement_body,
																index
															) => (
																<tr
																key={
																	settlement_body._id
																}
																>
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
																	{settlement_body
																	.assigned_members
																	?.length ? (
																	<div className="avatars">
																		{settlement_body.assigned_members.map(
																		(
																			admin,
																			iteration
																		) => (
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
																				src={
																					admin.photo ||
																					"images/download.png"
																				}
																				alt=""
																				/>
																			</a>
																			<ul className="dropdown-menu action-menu border-radius">
																				<img
																				src="images/pointer.svg"
																				className="img-fluid pointer"
																				/>
																				<div className="d-flex avatar-holder border-bottom py-4">
																				<div className="position-relative">
																					<img
																					src="images/Avatar-online-indicator.svg"
																					className="img-fluid indicator-avatar"
																					alt="indicator"
																					/>
																					<div className="avatar-sm flex-shrink-0">
																					<img
																						src={
																						admin.photo ||
																						"images/download.png"
																						}
																						className="img-fluid object-position-center object-fit-cover w-100 h-100"
																						alt="Avatar"
																					/>
																					</div>
																				</div>
																				<div className="ms-2 flex-grow-1">
																					<h5 className="mb-0">
																					{admin.name ||
																						admin.email}
																					</h5>
																					{/* <p className="mb-0 text-main-primary">View profile</p> */}
																				</div>
																				</div>

																				<div className="d-flex align-items-center py-2">
																				<img
																					src="images/mail.svg"
																					className="img-fluid"
																					alt="users"
																				/>
																				<div className="ms-2 flex-grow-1">
																					<p className="mb-1 ft-sm">
																					Email
																					</p>
																					<p className="mb-0">
																					{
																						admin.email
																					}
																					</p>
																				</div>

																				<img
																					src="images/copy.svg"
																					className="img-fluid"
																					alt="copy"
																				/>
																				</div>

																				<div className="d-flex align-items-center py-2">
																				<img
																					src="images/call.svg"
																					className="img-fluid"
																					alt="users"
																				/>
																				<div className="ms-2 flex-grow-1">
																					<p className="mb-1 ft-sm">
																					Phone
																					Number
																					</p>
																					<p className="mb-0">
																					{
																						admin.phone
																					}
																					</p>
																				</div>
																				<img
																					src="images/copy.svg"
																					className="img-fluid"
																					alt="copy"
																				/>
																				</div>
																			</ul>
																			</div>
																		)
																		)}
																	</div>
																	) : (
																	<p>
																		No member added
																		here
																	</p>
																	)}
																</td>
																<td>
																	{
																	settlement_body.name
																	}
																</td>
																<td>
																	{
																	settlement_body.assigned_cases
																	}
																</td>
																<td>
																	{
																	settlement_body.status
																	}
																</td>
																<td>
																	{
																	settlement_body.date_added
																	}
																</td>
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
																		src="images/dots-v.svg"
																		className="img-fluid"
																		alt="dots"
																		/>
																	</button>
																	<ul className="dropdown-menu border-radius action-menu-2">
																		{settlement_body.status !==
																		"dissolved" && (
																		<li>
																			<a
																			className="dropdown-item"
																			href="#"
																			data-bs-toggle="modal"
																			data-bs-target="#disputeModal"
																			onClick={() => {
																				handleIndividualUserInfo(
																				{
																					_id: settlement_body._id,
																					name: settlement_body.name,
																				},
																				`settlement_body`
																				);
																			}}
																			>
																			Refer to
																			Dispute
																			Case
																			</a>
																		</li>
																		)}
																		{/* <li><a className="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#permissionModal2">Edit permission level</a></li> */}
																		<li>
																		<a
																			href="javascript:void(0);"
																			className="dropdown-item"
																			data-bs-toggle="modal"
																			data-bs-target="#boardModal2"
																			onClick={(
																			e
																			) => {
																			setIndividualSettlmentProfile(
																				{
																				sp_id:
																					settlement_body._id,
																				sp_name:
																					settlement_body.name,
																				sp_status:
																					settlement_body.status,
																				}
																			);
																			fetchSettlementBodyMembers(
																				settlement_body
																			);
																			}}
																		>
																			View Members
																		</a>
																		</li>
																		{settlement_body.status !==
																		"dissolved" && (
																		<li>
																			<a
																			href="javascript:void(0);"
																			className="dropdown-item"
																			data-bs-toggle="modal"
																			data-bs-target="#dissolveBoardModal"
																			onClick={(
																				e
																			) => {
																				setIndividualSettlmentProfile(
																				{
																					sp_id:
																					settlement_body._id,
																					sp_name:
																					settlement_body.name,
																					sp_status:
																					settlement_body.status,
																				}
																				);
																			}}
																			>
																			Dissolve
																			Board{" "}
																			</a>
																		</li>
																		)}
																	</ul>
																	</div>
																</td>
																</tr>
															)
															)
														) : (
															<tr>
															<td
																id="pending-dispute-not-found"
																colSpan={6}
																className={`text-center`}
															>
																<p>
																<i className="fa fa-triangle-exclamation fa-2x text-warning"></i>
																</p>
																<p className="h5">
																No member data found
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
											)}
										</div>
										</div>
									</div>
									</div>
								</div>

								{user.permissions && user.permissions.includes("invite users") && (
									<div
										className="tab-pane fade"
										id="pills-role"
										role="tabpanel"
										aria-labelledby="pills-role-tab"
										tabIndex="0"
									>
										<div className="row mt-5">
										<div className="col-lg-5">
											<p>All NDRS roles and their permissions</p>

											<button
											className="btn btn-main-primary btn-size"
											data-bs-toggle="modal"
											data-bs-target="#customModal"
											>
											Create custom role
											</button>
										</div>
										</div>
										{isLoading ? (
										<div
											className="d-flex justify-content-center align-items-center"
											style={{ minHeight: "80vh" }}
										>
											<ClipLoader
											color="#36D7B7"
											loading={isLoading}
											size={50}
											/>
										</div>
										) : (
										<div className="row">
											<div className="col-lg-9">
											<div
												className="accordion accordion-expand mt-4"
												id="accordionHelp2"
											>
												{roles.map((role, roleIndex) => (
												<div
													className="accordion-item mb-3"
													key={role._id}
												>
													<h2 className="accordion-header">
													<button
														className="accordion-button custom-text-3"
														type="button"
														data-bs-toggle="collapse"
														data-bs-target={`#collapseOne${role._id}`}
														aria-expanded={
														roleIndex === 0 ? "true" : "false"
														}
														aria-controls={`collapseOne${role._id}`}
													>
														{role.name}
													</button>
													</h2>
													<div
													id={`collapseOne${role._id}`}
													className={`accordion-collapse collapse ${
														roleIndex === 0 ? "show" : ""
													}`}
													data-bs-parent="#accordionHelp2"
													>
													<div className="mb-3 py-3 px-4 bg-light">
														<a
														href="#"
														className="btn btn-size btn-outline-danger d-inline-flex"
														name="role_id"
														onClick={(e) =>
															restoreDefault(
															e,
															role._id,
															roles,
															setRoles
															)
														}
														>
														Restore default
														</a>
													</div>
													<div className="accordion-body">
														{Object.entries(
														role.permissions
														).map(
														(
															[category, permissions],
															categoryIndex
														) => (
															<div
															className="card card-box-view mb-4"
															key={category}
															>
															<div className="card-body p-4">
																<div className="row align-items-center">
																<div className="col-lg-7">
																	<div className="text-start mb-lg-0 mb-3">
																	<h4>
																		{category.replace(
																		/_/g,
																		" & "
																		)}
																	</h4>
																	<p className="mb-0 text-muted-3">
																		{
																		permissions[0]
																			.group_description
																		}
																	</p>
																	</div>
																</div>
																<div className="col-lg-5">
																	<div className="d-flex flex-column gap-10">
																	{permissions.map(
																		(
																		permission,
																		permissionIndex
																		) => (
																		<div
																			className="form-check d-flex align-items-center form-switch"
																			key={
																			permission._id
																			}
																		>
																			<input
																			className="form-check-input"
																			type="checkbox"
																			role="switch"
																			id={`flexSwitchCheckChecked_${permission._id}`}
																			checked={
																				permission.has_permission ===
																				1
																			}
																			onChange={() =>
																				handleCheckboxChange(
																				roleIndex,
																				category,
																				permissionIndex
																				)
																			}
																			/>
																			<label
																			className="form-check-label ms-4"
																			htmlFor={`flexSwitchCheckChecked_${permission._id}`}
																			>
																			{
																				permission.name
																			}
																			</label>
																		</div>
																		)
																	)}
																	</div>
																</div>
																</div>
															</div>
															</div>
														)
														)}
													</div>
													</div>
												</div>
												))}
											</div>
											</div>
										</div>
										)}
									</div>
								)}
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

		{user.permissions && user.permissions.includes("assign users cases") && (
			<div
				className="modal fade"
				id="disputeModal"
				tabIndex="-1"
				aria-labelledby="disputeModalLabel"
				aria-hidden="true"
			>
				<div className="modal-dialog modal-dialog-centered modal-xl">
				<div className="modal-content p-lg-4 border-0">
					<div className="modal-header justify-content-between d-flex align-items-center">
					<h1 className="modal-title fs-5">Refer to dispute case</h1>
					<div className="gap-10 d-flex align-items-center">
						<button
						className="btn btn btn-size btn-main-outline-primary px-3"
						data-bs-dismiss="modal"
						aria-label="Close"
						>
						Cancel
						</button>

						<button
						className="btn btn-main-primary btn-size px-3"
						onClick={(e) => {
							handleIndividualCaseRefer();
						}}
						>
						Refer Case
						</button>
					</div>
					</div>
					<div className="modal-body">
					<div className="">
						<div className="d-flex avatar-holder mb-5">
						<div className="position-relative">
							<div className="avatar-sm flex-shrink-0">
							<img
								src={IndividualUser.user_photo || "images/download.png"}
								className="img-fluid object-position-center object-fit-cover w-100 h-100"
								alt="Avatar"
							/>
							</div>
						</div>
						<div className="ms-2 flex-grow-1">
							<h5 className="mb-0">{IndividualUser.user_name}</h5>
						</div>
						</div>

						<div className="row mb-4">
						<div className="col-lg-9">
							<div className="row mb-4">
							<div className="col-lg-6">
								<div className="input-group">
								<span className="input-group-text bg-transparent">
									<img
									src="images/search.svg"
									className="img-fluid"
									alt="search"
									/>
								</span>
								<input
									type="search"
									className="form-control border-start-0 form-control-height"
									placeholder="Search disputes..."
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
									src="images/filter.svg"
									className="img-fluid me-2"
									/>{" "}
									Filters
								</a>

								<button className="btn btn-size btn-outline-light text-medium px-4">
									<img
									src="images/sort.svg"
									className="img-fluid me-2"
									/>{" "}
									Most Recent
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
								<th scope="col">
								<input
									type="checkbox"
									className="form-check-input"
									id="select-all-dispute"
									onClick={selectAllDisputeCases}
								/>
								</th>
								<th scope="col">Filing Date</th>
								<th scope="col">Case Number</th>
								<th scope="col">Involved Parties</th>
								<th scope="col" style={{ width: "200px" }}>
								Case Title
								</th>
								<th scope="col">Case Status</th>
								<th scope="col"></th>
							</tr>
							</thead>
							<tbody>
							{getDisputes.length ? (
								getDisputes.map((dispute) => (
								<tr key={dispute._id}>
									<td>
									<input
										type="checkbox"
										name="cases[]"
										value={dispute._id}
										className="all-dispute-selected form-check-input"
										onClick={(e) => {
										onHandleReferCaseSelect(e, dispute._id);
										}}
									/>
									</td>
									<td>{dispute.filling_date}</td>
									<td scope="row">{dispute.case_no}</td>
									<td>
									<div className="mb-2">
										<div className="d-flex align-items-center avatar-holder">
										<div className="position-relative">
											<div className="avatar-sm flex-shrink-0">
											<img
												src={
												dispute.involved_parties.accused.logo
												}
												className="img-fluid object-position-center object-fit-cover w-100 h-100"
												alt="Avatar"
											/>
											</div>
										</div>
										<div className="ms-2 d-flex flex-grow-1 text-muted-3">
											<p className="text-truncate mb-0 max-200">
											{dispute.involved_parties.accused.name}{" "}
											</p>
											<span>
											(
											{dispute.involved_parties.accused.acronym}
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
												dispute.involved_parties.claimant.logo
												}
												className="img-fluid object-position-center object-fit-cover w-100 h-100"
												alt="Avatar"
											/>
											</div>
										</div>
										<div className="ms-2 d-flex flex-grow-1 text-muted-3">
											<p className="text-truncate mb-0 max-200">
											{dispute.involved_parties.claimant.name}
											</p>
											<span>
											(
											{
												dispute.involved_parties.claimant
												.acronym
											}
											)
											</span>
										</div>
										</div>
									</div>
									</td>
									<td>{dispute.title}</td>
									<td>
									<img src={dispute.status_img} alt="" />
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
											target="_blank"
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
									<p className="h5">No dispute data found</p>
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
		)}

		<div
			className="modal fade"
			id="previewModal"
			tabIndex="-1"
			aria-labelledby="previewModalLabel"
			aria-hidden="true"
		>
			<div className="modal-dialog modal-dialog-centered modal-xl">
			<div className="modal-content p-lg-4 border-0">
				<div className="modal-header">
				<h1 className="modal-title fs-5">Preview Sent Invites</h1>
				<button
					type="button"
					className="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
				</div>
				<div className="modal-body">
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
						<th scope="col">Email address</th>
						<th scope="col">Role</th>
						<th scope="col">Dispute invited to</th>
					</tr>
					</thead>
					<tbody>
					<tr>
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
						<td>josshnikara@email.com</td>
						<td>
						<img
							src="images/ministry-admin.svg"
							className="img-fluid"
						/>
						</td>
						<td>DS133</td>
					</tr>
					</tbody>
				</table>
				</div>
				<div className="modal-footer d-flex justify-content-between align-items-center">
				<p className="mb-0 text-muted">Page 1 of 30</p>

				<nav aria-label="...">
					<ul className="pagination pager mb-0">
					<li className="page-item active" aria-current="page">
						<span className="page-link">1</span>
					</li>
					<li className="page-item">
						<a className="page-link" href="#">
						2
						</a>
					</li>
					<li className="page-item">
						<a className="page-link" href="#">
						3
						</a>
					</li>
					</ul>
				</nav>

				<div className="d-flex align-items-center gap-10">
					<button className="btn btn-outline-light text-medium">
					<img src="images/prev.svg" className="img-fluid" /> Previous
					</button>
					<button className="btn btn-outline-light text-medium">
					Next <img src="images/next.svg" className="img-fluid" />
					</button>
				</div>
				</div>
			</div>
			</div>
		</div>

		{/* Modal */}
		<div
			className="modal fade"
			id="boardModal"
			tabIndex="-1"
			aria-labelledby="boardModalLabel"
			aria-hidden="true"
		>
			<div className="modal-dialog modal-dialog-centered modal-lg">
			<div className="modal-content p-lg-4 border-0">
				<div className="modal-header justify-content-between">
				<h1 className="modal-title fs-5">
					Create {IndividualSettlmentBody.sb_name} Profile
				</h1>

				<div className="gap-10 d-flex align-items-center">
					<button
					className="btn btn btn-size btn-main-outline-primary px-3"
					data-bs-dismiss="modal"
					aria-label="Close"
					>
					Cancel
					</button>

					<button
					className="btn btn-main-primary btn-size px-3"
					data-bs-dismiss="modal"
					aria-label="Close"
					>
					Finish
					</button>
				</div>
				</div>
				<div className="modal-body">
				<div className="row mt-4">
					<div className="col-lg-12">
					<label className="form-label">
						Name of {IndividualSettlmentBody.sb_name}
					</label>
					<input
						type="text"
						className="form-control form-control-height"
						placeholder={`Enter ${IndividualSettlmentBody.sb_name}`}
						name="name"
						value={boardOfEnquire.name}
						onChange={onHandleChange}
					/>
					</div>
				</div>
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
						placeholder="Type an email to invite"
						/>
					</div>
					</div>

					<div className="col-lg-2 offset-lg-3">
					<div className="d-flex align-items-center justify-content-between gap-15">
						<a
						href=""
						className="btn btn-size btn-main-primary"
						onClick={handleSubmit}
						disabled={!boardOfEnquire.name}
						>
						Send Invite
						</a>
					</div>
					</div>
				</div>

				<div className="row">
					<div className="col-lg-12">
					{/* <table className="table table-list">
						<thead className="table-light">
						<tr>
							<th scope="col">Name</th>
							<th scope="col">Date added</th>
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
								<h5 className="mb-0">Salim Mustapha</h5>
								<p className="mb-0 text-muted-3">
									salimmusty@gmail.com
								</p>
								</div>
							</div>
							</td>
							<td>Feb 4 2023</td>
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
							<td>Pending</td>
						</tr>
						</tbody>
					</table> */}
					<table className="table table-list">
						<thead className="table-light">
						<tr>
							<th scope="col">Name</th>
							<th scope="col">Date added</th>
							<th scope="col">Role</th>
							<th scope="col"></th>
						</tr>
						</thead>
					</table>
					<div className="card no-admin-card rounded-0">
						<div className="card-body d-flex align-items-center justify-content-center">
						<div className="text-center">
							<h4 className="">No board members</h4>

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

		{/* Modal */}
		<div
			className="modal fade"
			id="boardModal2"
			tabIndex="-1"
			aria-labelledby="boardModalLabel2"
			aria-hidden="true"
		>
			<div className="modal-dialog modal-dialog-centered modal-lg">
			<div className="modal-content p-lg-4 border-0">
				<div className="modal-header justify-content-between">
				<h1 className="modal-title fs-5">
					{IndividualSettlmentBody.sb_name} Members
				</h1>

				<div className="gap-10 d-flex align-items-center">
					<button
					className="btn btn btn-size btn-main-outline-primary px-3"
					data-bs-dismiss="modal"
					aria-label="Close"
					>
					Cancel
					</button>

					<button className="btn btn-main-primary btn-size px-3">
					Finish
					</button>
				</div>
				</div>
				<div className="modal-body">
				<div className="row mt-4">
					<div className="col-lg-12">
					<label className="form-label">
						Name of {IndividualSettlmentBody.sb_name}{" "}
					</label>
					<input
						type="text"
						className="form-control form-control-height"
						value={IndividualSettlmentProfile.sp_name}
						disabled
					/>
					</div>
				</div>

				{IndividualSettlmentProfile.sp_status === "active" && (
					<div className="row my-4">
					<div className="col-lg-7">
						<div className="input-group">
						<span className="input-group-text bg-transparent">
							<img
							src="images/search.svg"
							className="img-fluid"
							alt="search"
							/>
						</span>
						<input
							type="email"
							name="email"
							value={settlementBodyMemberInvite.email}
							onChange={(e) => {
							onHandleSettlementMemberChange(e);
							}}
							className="form-control border-start-0 form-control-height"
							placeholder="Type an email to invite"
						/>
						</div>
					</div>

					<div className="col-lg-2 offset-lg-3">
						<div className="d-flex align-items-center justify-content-between gap-15">
						<button
							type="button"
							className="btn btn-size btn-main-primary"
							onClick={sendSettlementBodyMemberInvite}
							disabled={isSettlementBodyMemberDisabled}
						>
							{isSettlementBodyMemberDisabled
							? `Sending...`
							: `Send Invite`}
						</button>
						</div>
					</div>
					</div>
				)}

				{isSettlementBodyMemberLoading ? (
					<div className="row">
					<div className="col-lg-12">
						<div
						className="d-flex justify-content-center align-items-center"
						style={{ minHeight: "80vh" }}
						>
						<ClipLoader
							color="#36D7B7"
							loading={isSettlementBodyMemberLoading}
							size={50}
						/>
						</div>
					</div>
					</div>
				) : (
					<div className="row">
					<div className="col-lg-12">
						{getSettlementBodyMembers &&
						getSettlementBodyMembers?.length ? (
						<table className="table table-list">
							<thead className="table-light">
							<tr>
								<th scope="col">Name</th>
								<th scope="col">Date added</th>
								<th scope="col">Actions</th>
							</tr>
							</thead>
							<tbody>
							{getSettlementBodyMembers.map((member_profile) => (
								<tr>
								<td scope="row">
									<div className="d-flex avatar-holder">
									<div className="position-relative">
										<div className="avatar-sm flex-shrink-0">
										<img
											src={
											member_profile.photo ||
											"images/download.png"
											}
											className="img-fluid object-position-center object-fit-cover w-100 h-100"
											alt="Avatar"
										/>
										</div>
									</div>
									<div className="ms-2 flex-grow-1">
										<h5 className="mb-0">
										{member_profile.name}
										</h5>
										<p className="mb-0 text-muted-3">
										{member_profile.email}
										</p>
									</div>
									</div>
								</td>
								<td>
									{member_profile.status === "pending" && (
									<span className="badge bg-warning">
										{member_profile.status}
									</span>
									)}

									{member_profile.status !== "pending" && (
									<span>
										{member_profile.date_joined}
									</span>
									)}
								</td>
								<td>
									<a
									href="javascript:void(0);"
									data-bs-toggle="modal"
									data-bs-target="#dissolveModal"
									onClick={(e) => {
										setIndividualSettlmentMemberProfile({
										member_id: member_profile._id,
										member_name:
											member_profile.name ||
											member_profile.email,
										});
									}}
									className="text-danger"
									>
									Remove member
									</a>
								</td>
								</tr>
							))}
							</tbody>
						</table>
						) : (
						<div className="card no-admin-card rounded-0">
							<div className="card-body d-flex align-items-center justify-content-center">
							<div className="text-center">
								<h4 className="">No board members</h4>

								<p className="text-muted-3">
								Enter an admins email and role to send invite
								</p>

								<div className="text-center">
								<img
									src="images/no-found.svg"
									className="img-fluid"
								/>
								</div>
							</div>
							</div>
						</div>
						)}
					</div>
					</div>
				)}
				</div>
			</div>
			</div>
		</div>

		{/* Modal */}
		<div
			className="modal fade"
			id="customModal"
			tabIndex="-1"
			aria-labelledby="customModalLabel"
			aria-hidden="true"
		>
			<div className="modal-dialog modal-dialog-centered modal-lg">
			<div className="modal-content p-lg-4 border-0">
				<div className="modal-header justify-content-between">
				<div>
					<h1 className="modal-title fs-5">
					Create custom role & permissions
					</h1>
					<p>Ministry Liason</p>
				</div>

				<div className="gap-10 d-flex align-items-center">
					<button
					className="btn btn btn-size btn-main-outline-primary px-3"
					data-bs-target="#customModal"
					data-bs-toggle="modal"
					>
					Back
					</button>

					<button
					className="btn btn-main-primary btn-size px-3"
					data-bs-dismiss="modal"
					aria-label="Close"
					onClick={CreateCustomRole}
					>
					Finish
					</button>
				</div>
				</div>
				<div className="modal-body">
				<div>
					<div className="card card-box-view mb-4">
					<div className="card-body p-4">
						<div className="row align-items-center">
						<div className="col-lg-7">
							<div className="text-start mb-lg-0 mb-3">
							<h4>Disputes</h4>
							<p className="mb-0 text-muted-3">
								All permission relating to disputes
							</p>
							</div>
						</div>

						<div className="col-lg-5">
							<div className="d-flex flex-column gap-10">
							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_1"
								checked={isChecked}
								onChange={handleCheckboxChange}
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_1"
								>
								Create dispute
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_2"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_2"
								>
								Approve dispute
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_3"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_3"
								>
								Invite dispute participants
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_4"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_4"
								>
								Change dispute case status
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_5"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_5"
								>
								Participate in resolution
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_6"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_6"
								>
								View dispute notifications
								</label>
							</div>
							</div>
						</div>
						</div>
					</div>
					</div>

					<div className="card card-box-view mb-4">
					<div className="card-body p-4">
						<div className="row align-items-center">
						<div className="col-lg-7">
							<div className="text-start mb-lg-0 mb-3">
							<h4>Union & Branches</h4>
							<p className="mb-0 text-muted-3">
								Permissions related to creating and editing unions,
								branches or sub branches
							</p>
							</div>
						</div>
						<div className="col-lg-5">
							<div className="d-flex flex-column gap-10">
							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_7"
								checked={isChecked}
								onChange={handleCheckboxChange}
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_7"
								>
								Create unions
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_8"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_8"
								>
								Create branches
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_9"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_9"
								>
								Create sub branches
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_10"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_10"
								>
								Edit unions
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_11"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_11"
								>
								Edit branches
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_12"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_12"
								>
								Edit sub branches
								</label>
							</div>
							</div>
						</div>
						</div>
					</div>
					</div>

					<div className="card card-box-view mb-4">
					<div className="card-body p-4">
						<div className="row align-items-center">
						<div className="col-lg-7">
							<div className="text-start mb-lg-0 mb-3">
							<h4>Users & Groups</h4>
							<p className="mb-0 text-muted-3">
								Permissions related to users and groups
							</p>
							</div>
						</div>

						<div className="col-lg-5">
							<div className="d-flex flex-column gap-10">
							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_13"
								checked={isChecked}
								onChange={handleCheckboxChange}
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_13"
								>
								Invite users
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_14"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_14"
								>
								Edit users status
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_15"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_15"
								>
								Assign users cases
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_16"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_16"
								>
								Edit roles & permissions
								</label>
							</div>
							</div>
						</div>
						</div>
					</div>
					</div>

					<div className="card card-box-view mb-4">
					<div className="card-body p-4">
						<div className="row align-items-center">
						<div className="col-lg-7">
							<div className="text-start mb-lg-0 mb-3">
							<h4>Reports</h4>
							<p className="mb-0 text-muted-3">
								Permissions regarding the reporting feature
							</p>
							</div>
						</div>
						<div className="col-lg-5">
							<div className="d-flex flex-column gap-10">
							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_17"
								checked={isChecked}
								onChange={handleCheckboxChange}
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_17"
								>
								View & download reports
								</label>
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
		</div>

		{/* Modal */}
		<div
			className="modal fade"
			id="permissionModal"
			tabIndex="-1"
			aria-labelledby="permissionModalLabel"
			aria-hidden="true"
		>
			<div className="modal-dialog modal-dialog-centered modal-lg">
			<div className="modal-content p-lg-4 border-0">
				<div className="modal-header justify-content-between">
				<div>
					<h1 className="modal-title fs-5">
					Create custom role & permissions
					</h1>
					<p>Ministry Liason</p>
				</div>

				<div className="gap-10 d-flex align-items-center">
					<button
					className="btn btn btn-size btn-main-outline-primary px-3"
					data-bs-target="#customModal"
					data-bs-toggle="modal"
					>
					Back
					</button>

					<button className="btn btn-main-primary btn-size px-3">
					Finish
					</button>
				</div>
				</div>
				<div className="modal-body">
				<div>
					<div className="card card-box-view mb-4">
					<div className="card-body p-4">
						<div className="row align-items-center">
						<div className="col-lg-7">
							<div className="text-start mb-lg-0 mb-3">
							<h4>Disputes</h4>
							<p className="mb-0 text-muted-3">
								All permission relating to disputes
							</p>
							</div>
						</div>

						<div className="col-lg-5">
							<div className="d-flex flex-column gap-10">
							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_1"
								checked
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_1"
								>
								Create dispute
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_2"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_2"
								>
								Approve dispute
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_3"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_3"
								>
								Invite dispute participants
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_4"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_4"
								>
								Change dispute case status
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_5"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_5"
								>
								Participate in resolution
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_6"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_6"
								>
								View dispute notifications
								</label>
							</div>
							</div>
						</div>
						</div>
					</div>
					</div>

					<div className="card card-box-view mb-4">
					<div className="card-body p-4">
						<div className="row align-items-center">
						<div className="col-lg-7">
							<div className="text-start mb-lg-0 mb-3">
							<h4>Union & Branches</h4>
							<p className="mb-0 text-muted-3">
								Permissions related to creating and editing unions,
								branches or sub branches
							</p>
							</div>
						</div>
						<div className="col-lg-5">
							<div className="d-flex flex-column gap-10">
							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_7"
								checked
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_7"
								>
								Create unions
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_8"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_8"
								>
								Create branches
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_9"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_9"
								>
								Create sub branches
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_10"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_10"
								>
								Edit unions
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_11"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_11"
								>
								Edit branches
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_12"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_12"
								>
								Edit sub branches
								</label>
							</div>
							</div>
						</div>
						</div>
					</div>
					</div>

					<div className="card card-box-view mb-4">
					<div className="card-body p-4">
						<div className="row align-items-center">
						<div className="col-lg-7">
							<div className="text-start mb-lg-0 mb-3">
							<h4>Users & Groups</h4>
							<p className="mb-0 text-muted-3">
								Permissions related to users and groups
							</p>
							</div>
						</div>

						<div className="col-lg-5">
							<div className="d-flex flex-column gap-10">
							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_13"
								checked
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_13"
								>
								Invite users
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_14"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_14"
								>
								Edit users status
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_15"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_15"
								>
								Assign users cases
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_16"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_16"
								>
								Edit roles & permissions
								</label>
							</div>
							</div>
						</div>
						</div>
					</div>
					</div>

					<div className="card card-box-view mb-4">
					<div className="card-body p-4">
						<div className="row align-items-center">
						<div className="col-lg-7">
							<div className="text-start mb-lg-0 mb-3">
							<h4>Reports</h4>
							<p className="mb-0 text-muted-3">
								Permissions regarding the reporting feature
							</p>
							</div>
						</div>
						<div className="col-lg-5">
							<div className="d-flex flex-column gap-10">
							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_17"
								checked
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_17"
								>
								View & download reports
								</label>
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
		</div>

		{/* Modal */}
		<div
			className="modal fade"
			id="permissionModal2"
			tabIndex="-1"
			aria-labelledby="permissionModalLabel2"
			aria-hidden="true"
		>
			<div className="modal-dialog modal-dialog-centered modal-lg">
			<div className="modal-content p-lg-4 border-0">
				<div className="modal-header justify-content-between">
				<div>
					<h1 className="modal-title fs-5">
					Edit permission level htmlFor Ministry Admin
					</h1>
					<p className="mb-0">maryblessing@gmail.com</p>
				</div>

				<div className="gap-10 d-flex align-items-center">
					<button className="btn btn btn-size btn-outline-danger px-3">
					Restore to default
					</button>

					<button className="btn btn-main-primary btn-size px-3">
					Save changes
					</button>
				</div>
				</div>
				<div className="modal-body">
				<div>
					<div className="card card-box-view mb-4">
					<div className="card-body p-4">
						<div className="row align-items-center">
						<div className="col-lg-7">
							<div className="text-start mb-lg-0 mb-3">
							<h4>Disputes</h4>
							<p className="mb-0 text-muted-3">
								All permission relating to disputes
							</p>
							</div>
						</div>

						<div className="col-lg-5">
							<div className="d-flex flex-column gap-10">
							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_1"
								checked={isChecked}
								onChange={handleCheckboxChange}
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_1"
								>
								Create dispute
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_2"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_2"
								>
								Approve dispute
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_3"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_3"
								>
								Invite dispute participants
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_4"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_4"
								>
								Change dispute case status
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_5"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_5"
								>
								Participate in resolution
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_6"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_6"
								>
								View dispute notifications
								</label>
							</div>
							</div>
						</div>
						</div>
					</div>
					</div>

					<div className="card card-box-view mb-4">
					<div className="card-body p-4">
						<div className="row align-items-center">
						<div className="col-lg-7">
							<div className="text-start mb-lg-0 mb-3">
							<h4>Union & Branches</h4>
							<p className="mb-0 text-muted-3">
								Permissions related to creating and editing unions,
								branches or sub branches
							</p>
							</div>
						</div>
						<div className="col-lg-5">
							<div className="d-flex flex-column gap-10">
							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_7"
								checked={isChecked}
								onChange={handleCheckboxChange}
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_7"
								>
								Create unions
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_8"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_8"
								>
								Create branches
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_9"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_9"
								>
								Create sub branches
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_10"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_10"
								>
								Edit unions
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_11"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_11"
								>
								Edit branches
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_12"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_12"
								>
								Edit sub branches
								</label>
							</div>
							</div>
						</div>
						</div>
					</div>
					</div>

					<div className="card card-box-view mb-4">
					<div className="card-body p-4">
						<div className="row align-items-center">
						<div className="col-lg-7">
							<div className="text-start mb-lg-0 mb-3">
							<h4>Users & Groups</h4>
							<p className="mb-0 text-muted-3">
								Permissions related to users and groups
							</p>
							</div>
						</div>

						<div className="col-lg-5">
							<div className="d-flex flex-column gap-10">
							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_13"
								checked={isChecked}
								onChange={handleCheckboxChange}
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_13"
								>
								Invite users
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_14"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_14"
								>
								Edit users status
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_15"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_15"
								>
								Assign users cases
								</label>
							</div>

							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_16"
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_16"
								>
								Edit roles & permissions
								</label>
							</div>
							</div>
						</div>
						</div>
					</div>
					</div>

					<div className="card card-box-view mb-4">
					<div className="card-body p-4">
						<div className="row align-items-center">
						<div className="col-lg-7">
							<div className="text-start mb-lg-0 mb-3">
							<h4>Reports</h4>
							<p className="mb-0 text-muted-3">
								Permissions regarding the reporting feature
							</p>
							</div>
						</div>
						<div className="col-lg-5">
							<div className="d-flex flex-column gap-10">
							<div className="form-check d-flex align-items-center form-switch">
								<input
								className="form-check-input"
								type="checkbox"
								role="switch"
								id="flexSwitchCheckChecked_17"
								checked={isChecked}
								onChange={handleCheckboxChange}
								/>
								<label
								className="form-check-label ms-4"
								htmlFor="flexSwitchCheckChecked_17"
								>
								View & download reports
								</label>
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
		</div>

		{/* Modal */}
		<div
			className="modal fade"
			id="dissolveBoardModal"
			tabIndex="-1"
			aria-labelledby="dissolveBoardLabel"
			aria-hidden="true"
		>
			<div className="modal-dialog modal-dialog-centered">
			<div className="modal-content p-lg-4 border-0">
				<div className="modal-body">
				<div className="text-center">
					<img
					src="images/delete-icon.svg"
					className="img-fluid mb-3"
					alt="delete an account"
					/>
				</div>
				<p className="mb-4 modal-text text-center text-black custom-text">
					Are you sure you want to dissolve{" "}
					<span className="text-bold">
					{IndividualSettlmentProfile.sp_name}
					</span>{" "}
					in the {IndividualSettlmentBody.sb_name} list
				</p>

				<button
					onClick={(e) => {
					handleDissolve(e, IndividualSettlmentProfile.sp_id);
					}}
					className="btn btn-size btn-main-danger w-100 mb-3"
				>
					Dissolve Board
				</button>

				<button
					className="btn btn btn-size w-100 btn-main-outline-primary px-3"
					data-bs-dismiss="modal"
					aria-label="Close"
				>
					Cancel
				</button>
				</div>
			</div>
			</div>
		</div>

		{/* Modal */}
		<div
			className="modal fade"
			id="dissolveModal"
			tabIndex="-1"
			aria-labelledby="dissolveLabel"
			aria-hidden="true"
		>
			<div className="modal-dialog modal-dialog-centered">
			<div className="modal-content p-lg-4 border-0">
				<div className="modal-body">
				<div className="text-center">
					<img
					src="images/delete-icon.svg"
					className="img-fluid mb-3"
					alt="delete an account"
					/>
				</div>
				<p className="mb-4 modal-text text-center text-black custom-text">
					Are you sure you want to remove{" "}
					{IndividualSettlmentMemberProfile.member_name} (
					{IndividualSettlmentBody.sb_name}) from{" "}
					<span className="text-bold">
					{IndividualSettlmentProfile.sp_name}{" "}
					</span>
				</p>

				<button
					type="button"
					data-bs-toggle="modal"
					data-bs-target="#boardModal2"
					data-bs-dismiss="modal"
					onClick={(e) => {
					removeSettlementBodyMember();
					}}
					className="btn btn-size btn-main-danger w-100 mb-3"
				>
					Remove admin
				</button>

				<button
					className="btn btn btn-size w-100 btn-main-outline-primary px-3"
					data-bs-toggle="modal"
					data-bs-target="#boardModal2"
					data-bs-dismiss="modal"
					aria-label="Close"
				>
					Cancel
				</button>
				</div>
			</div>
			</div>
		</div>
		</>
	);
};

export default Users;
