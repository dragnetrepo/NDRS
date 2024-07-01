import React, { useState } from "react";
import MainNavbarInc from "../Bars/MainNavbarInc";
import TopBarInc from "../Bars/TopBarInc";
import DiscussionInc from "../Bars/DiscussionInc";




const Discussions = () => {
  const [sidebar, setsidebar] = useState(true)
  const [isLoading, setIsLoading] = useState(true);

  const toggleSideBar = () => {
    setsidebar(!sidebar)
  }


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
							<h2>Discussions</h2>
							</div>
						</div>

						<DiscussionInc />
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

export default Discussions;
