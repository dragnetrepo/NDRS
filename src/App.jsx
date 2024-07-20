import { Navigate, Route, Routes, useNavigate } from "react-router-dom";
import CreateAccount from "./Components/CreateAccount";
import Index from "./Components/Index";
import Verification from "./Components/Verification";
import Verification2 from "./Components/Verification2";

import { createContext, useEffect, useState } from "react";
import CreatePassword from "./Components/CreatePassword";
import ProfileSetup from "./Components/ProfileSetup";
import LoginPassword from "./Components/LoginPassword";
import ProfileSetup2 from "./Components/ProfileSetup2";
import VerificationSuccess from "./Components/VerificationSuccess";
import Dashboard from "./Components/Dashboard";
import PasswordSet2 from "./Components/PasswordSet2";
import Login from "./Components/Login";
import Recovery from "./Components/Recovery";
import TopBarInc from "./Bars/TopBarInc";
import Notifications from "./Components/Notifications";
import Unions from "./Components/Unions";
import UnionDetails from "./Components/UnionDetails";
// import UnionBranches3 from "./Components/UnionBranches3";
import Settings from "./Components/Settings";
import Disputes from "./Components/Disputes";
import Disputes2 from "./Components/Disputes2";
import { Toaster } from "react-hot-toast";
import DisputesDetails from "./Components/DisputesDetails";
import Documents from "./Components/Documents";
import Documents2 from "./Components/Documents2";
import HelpSupport from "./Components/HelpSupport";
import HelpSupport2 from "./Components/HelpSupport2";
import HelpSupport3 from "./Components/HelpSupport3";
import Discussions from "./Components/Discussions";
import DiscussionsDetails from "./Components/DiscussionsDetails";
import Reports from "./Components/Reports";
import Users from "./Components/Users";
import Branches from "./Components/Branches";
import SubBranch from "./Components/SubBranch";
import Error404 from "./Components/Error404";
import BranchDetails from "./Components/BranchDetails";
import SubBranchDetails from "./Components/SubBranchDetails";
import UnionInvite from "./Components/UnionInvite";
import SendUnionInvite from "./Components/SendUnionInvite";
import ResetPassword from "./Components/ResetPassword";

// import LandingPage from "./Components/Index";

export const AppContext = createContext();

const App = () => {
  const [loggedIn, setloggedIn] = useState(false);
  const [user, setUser] = useState(null);
  const navigate = useNavigate();
  const baseUrl = "https://phpstack-1245936-4460801.cloudwaysapps.com/dev";

  useEffect(() => {
    const token = localStorage.getItem("token");

    const fetchData = async () => {
      try {
        const token = localStorage.getItem("token");

        if (!token) {
          throw new Error("User is not logged in."); // Handle case where user is not logged in
        }

        const res = await fetch(`${baseUrl}/api/user-profile`, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        });

        if (!res.ok) {
          throw new Error("Failed to fetch data."); // Handle failed request
        }

        const data = await res.json();
        setloggedIn(true);
        setUser(data.data);
      } catch (error) {
        console.error("Error fetching data:", error.message);
        localStorage.removeItem("token"); // Remove invalid token
        setloggedIn(false);
        navigate("/login"); // Redirect to login page
      }
    };

    if (token) {
      fetchData();
    }
  }, [navigate]);

  const [verifyEmail, setVerifyEmail] = useState({
    email: "",
    code: "",
  });

  const [twoFactorAuth, setTwoFactorAuth] = useState({
    email: "",
    password: "",
    auth_code: "",
  });
  const [passwordField, setPasswordField] = useState({
    email: "",
    password: "",
    password_confirmation: "",
  });
  const [profile, setProfile] = useState({
    first_name: "",
    middle_name: "",
    last_name: "",
    phone: "",
    display_picture: "",
    union: 0,
    union_branch: 0,
    organization: 0,
  });
  const [recovery, setRecovery] = useState({
    email: "",
    phone: "",
  });
  const [unions, setUnions] = useState({
    name: "",
    acronym: "",
    industry: "",
    headquarters: "",
    phone: "",
    about: "",
    founded_in: "",
    logo: "",
  });
  const [disputes, setDisputes] = useState({
    title: "",
    type: "",
    summary: "",
    background_info: "",
    relief_sought: "",
    specific_claims: "",
    negotiation_terms: "",
    accused_party: "",
  });

  return (
    <div className="App">
      <AppContext.Provider
        value={{
          profile,
          setProfile,
          verifyEmail,
          setVerifyEmail,
          passwordField,
          setPasswordField,
          recovery,
          setRecovery,
          unions,
          setUnions,
          twoFactorAuth,
          setTwoFactorAuth,
          disputes,
          setDisputes,
        }}
      >
        <Toaster />
        <Routes>
          <Route
            path="/"
            element={<Index />}
          />
          <Route
            path="/CreateAccount"
            element={
              loggedIn ? <Navigate to="/dashboard" /> : <CreateAccount />
            }
          />
          <Route
            path="/CreatePassword"
            element={
              <CreatePassword />
            }
          />
          <Route
            path="/Verification"
            element={<Verification />}
          />
          <Route
            path="/Verification2"
            element={
              <Verification2 />
            }
          />
          <Route path="/ProfileSetup" element={<ProfileSetup />} />
          <Route
            path="/login"
            element={
              loggedIn ? (
                <Navigate to="/dashboard" />
              ) : (
                <Login setloggedIn={setloggedIn} />
              )
            }
          />
          <Route
            path="/Recovery"
            element={loggedIn ? <Navigate to="/dashboard" /> : <Recovery />}
          />
          <Route path="/ProfileSetup2" element={<ProfileSetup2 />} />
          <Route
            path="/PasswordSet2"
            element={loggedIn ? <Navigate to="/dashboard" /> : <PasswordSet2 />}
          />
          <Route
            path="/LoginPassword"
            element={
              loggedIn ? <Navigate to="/dashboard" /> : <LoginPassword />
            }
          />
          <Route
            path="/VerificationSuccess"
            element={
              loggedIn ? <Navigate to="/dashboard" /> : <VerificationSuccess />
            }
          />
          <Route
            path="/Dashboard"
            element={
              loggedIn ? (
                <Dashboard setloggedIn={setloggedIn} />
              ) : (
                <Navigate to="/login" />
              )
            }
          />
          <Route path="/Notifications" element={<Notifications />} />
          <Route
            path="/TopBarInc"
            element={loggedIn ? <Navigate to="/dashboard" /> : <TopBarInc />}
          />
          <Route path="/Unions" element={<Unions />} />
          <Route path="/UnionDetails" element={<UnionDetails />} />
          <Route path="/UnionDetails/:id" element={<UnionDetails />} />
          {/* <Route path="/UnionBranches3" element={<UnionBranches3 />} /> */}
          <Route path="/Disputes" element={<Disputes />} />
          <Route path="/Disputes2" element={<Disputes2 />} />
          <Route path="/Disputes2/:id" element={<Disputes2 />} />
          <Route path="/DisputesDetails" element={<DisputesDetails />} />
          <Route path="/DisputesDetails/:id" element={<DisputesDetails />} />
          <Route path="/Documents" element={<Documents />} />
          <Route path="/Documents2" element={<Documents2 />} />
          <Route path="/HelpSupport" element={<HelpSupport />} />
          <Route path="/HelpSupport/:id" element={<HelpSupport2 />} />
          {/* <Route path="/HelpSupport2" element={<HelpSupport2 />} /> */}
          <Route path="/HelpSupport3" element={<HelpSupport3 />} />
          <Route path="/Settings" element={<Settings />} />
          <Route path="/Reports" element={<Reports />} />
          <Route path="/Discussions" element={<Discussions />} />

          <Route
            path="/DiscussionsDetails/:id"
            element={<DiscussionsDetails />}
          />
          <Route path="/Notifications" element={<Notifications />} />
          <Route path="/Users" element={<Users />} />
          <Route path="/SubBranch" element={<SubBranch />} />
          <Route path="/Branches" element={<Branches />} />
          <Route path="/BranchDetails/:id" element={<BranchDetails />} />
          <Route path="/Branches/:id" element={<Branches />} />
          <Route path="/SubBranch/:id" element={<SubBranch />} />
          <Route path="/subBranchDetails/:id" element={<SubBranchDetails />} />
          <Route
            path="/sendUnionInvite"
            element={
              loggedIn ? <Navigate to="/dashboard" /> : <SendUnionInvite />
            }
          />
          <Route
            path="/union-invite/:token"
            element={loggedIn ? <Navigate to="/dashboard" /> : <UnionInvite />}
          />
          <Route
            path="/reset-password/:token"
            element={
              loggedIn ? <Navigate to="/dashboard" /> : <ResetPassword />
            }
          />

          <Route path="/*" element={<Error404 />} />
        </Routes>
      </AppContext.Provider>
    </div>
  );
};

export default App;
