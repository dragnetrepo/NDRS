import React from 'react'
import { Link } from 'react-router-dom'


const Error404 = () => {
    return (
        <>
            <nav className="navbar bg-white py-4">
                <div className="container">
                    <Link className="navbar-brand" to="#">
                        <img src="/images/NDRS-Logo.svg" className="img-fluid" alt="logo" style={{ height: "30px" }} />
                    </Link>

                    <a href="/" className="btn btn-size btn-main-primary px-3">Go back</a>
                </div>
            </nav>


            <div className="error d-flex justify-content-center align-items-center" style={{ height: "75vh" }}>
                <div className="container">
                    <div className="row">
                        <div className="col-lg-12">
                            <div className="text-center">
                                <h1 className="text-center" style={{ fontSize: "5rem" }}>404</h1>
                                <h1 className="hero-text text-center mb-4">Sorry, the page not found</h1>
                                <p className="hero-para text-center">The link you followed probably broken or the page has been removed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </>
    )
}

export default Error404