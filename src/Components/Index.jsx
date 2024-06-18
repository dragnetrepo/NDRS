import React from 'react'
import { Link } from 'react-router-dom'


const Index = () => {
    return (
        <>
            <div className="bg-white">

                <nav className="navbar bg-white py-4">
                    <div className="container">
                        <a className="navbar-brand" href="#">
                            <img src="/images/NDRS-Logo.svg" className="img-fluid" alt="logo" style={{ height: '30px' }} />
                        </a>

                        <Link to="/Login" className="btn btn-size btn-main-primary px-3">Log in</Link>
                    </div>
                </nav>

                <div className="container">
                    <div className="hero-section add-bg-image d-flex align-items-end position-relative p-lg-5 p-3" style={{ backgroundImage: `url('/images/hero-banner-1.png')` }}>
                        <div className="dark-overlay rounded-16"></div>
                        <div className="container-fluid position-relative">
                            <div className="row">
                                <div className="col-lg-6">
                                    <h1 className="hero-text text-white mb-4">An easier way to resolve disputes & grieviances </h1>
                                    <p className="text-white hero-para mb-4">Skip the back-and-forth and get a resolution in a fraction of the time with our streamlined process.</p>

                                    <div className="row">
                                        <div className="col-lg-4">
                                            <Link to="/login" className="btn btn-size btn-main-primary px-3">Submit a dispute</Link>
                                        </div>
                                        <div className="col-lg-4">
                                            <Link to="/login" className="btn btn-size text-white border-0 px-3">Log into account </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <img src="/images/labour-employment.svg" className="img-fluid py-3" alt="labour-employment" />
                </div>

                <div className="info-section pt-100 pb-100">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-12">
                                <p className="text-center para-sub">Access to all Nigerian Trade Unions and Settlement Managment Bodies</p>

                                <img src="/images/unions.png" className="img-fluid" alt="unions" />
                            </div>
                        </div>
                    </div>
                </div>

                <div className="info-section pb-100">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-7 mx-auto">
                                <h3 className="heading-5 mb-4">One streamlined platform to settle all disputes & grievances</h3>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-lg-4 mb-3">
                                <div className="bell-box p-lg-5 p-3 rounded-16 h-100">
                                    <div className="text-center mb-3">
                                        <img src="/images/submit.svg" className="img-fluid" alt="submit" />
                                    </div>

                                    <h5>Submit your complaint</h5>
                                    <p>Submit details to the dispute or grievances in 3 quick steps.</p>
                                </div>
                            </div>

                            <div className="col-lg-4 mb-3">
                                <div className="bell-box p-lg-5 p-3 rounded-16 h-100">
                                    <div className="text-center mb-3">
                                        <img src="/images/invite.svg" className="img-fluid" alt="submit" />
                                    </div>

                                    <h5>Get an invite</h5>
                                    <p>You’ll receive an email invite from the Ministry of Labor & Employment to setup your account.</p>
                                </div>
                            </div>

                            <div className="col-lg-4 mb-3">
                                <div className="bell-box p-lg-5 p-3 rounded-16 h-100">
                                    <div className="text-center mb-3">
                                        <img src="/images/resolution.svg" className="img-fluid" alt="submit" />
                                    </div>

                                    <h5>Easy resolution</h5>
                                    <p>Access to all necessary people and features to easily reach a dispute resolution.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="info-section pb-100">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-12">
                                <div className="card rounded-16 p-lg-5 p-3 bg-custom-color-3 border-0">
                                    <div className="card-body">
                                        <div className="row">
                                            <div className="col-lg-6 mx-auto">
                                                <h3 className="heading-5 text-white mb-5">Submit your complaint</h3>

                                                <p className="text-medium text-white">Choose type of case</p>
                                                <div className="row">
                                                    <div className="col-lg-6 mb-lg-0 mb-3">
                                                        <div className="form-check">
                                                            <input className="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                                                            <label className="form-check-label" htmlFor="flexRadioDefault1">
                                                                <p className="text-white custom-text-2 text-medium mb-1">Dispute case</p>
                                                                <p className="text-white">These are disagreements requiring formal resolution, mostly between individuals, organizations or unions</p>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div className="col-lg-6 mb-lg-0 mb-3">
                                                        <div className="form-check">
                                                            <input className="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" />
                                                            <label className="form-check-label" htmlFor="flexRadioDefault2">
                                                                <p className="text-white custom-text-2 text-medium mb-1">Grievance</p>
                                                                <p className="text-white">These are complaints about an unfair workplace issue, mostly within  organizations.</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form>

                                                    <div className="mb-3">
                                                        <label className="form-label text-white">Type of claimant</label>
                                                        <select className="form-select form-control-height">
                                                            <option>--Choose--</option>
                                                            <option>Individual</option>
                                                            <option>Group</option>
                                                        </select>
                                                    </div>

                                                    <div className="mb-3">
                                                        <label className="form-label text-white">Name of representative (if group)</label>
                                                        <input type="text" className="form-control form-control-height" placeholder="Type in Name of representative" />
                                                    </div>

                                                    <div className="mb-3">
                                                        <label className="form-label text-white">Email address of representative or individual</label>
                                                        <input type="text" className="form-control form-control-height" placeholder="Type in Email address" />
                                                    </div>

                                                    <div className="mb-3">
                                                        <label className="form-label text-white">Name of organisation you work in or represent</label>
                                                        <input type="text" className="form-control form-control-height" placeholder="Type in organisation name" />
                                                    </div>

                                                    <div className="mb-3">
                                                        <label className="form-label text-white">Union you are sending your complaint to</label>
                                                        <select className="form-select form-control-height">
                                                            <option>--Choose--</option>
                                                            <option>Individual</option>
                                                            <option>Group</option>
                                                        </select>
                                                    </div>

                                                    <div className="mb-3">
                                                        <label htmlFor="complaintText" className="form-label text-white">Your Complaint</label>
                                                        <textarea className="form-control" id="complaintText" rows="4" placeholder="Describe your issue here..."></textarea>
                                                    </div>
                                                    <div className="mb-3">
                                                        <label htmlFor="attachment" className="form-label text-white">Attachment</label>
                                                        <div className="input-group">
                                                            <span className="input-group-text"><i className="bi bi-paperclip"></i></span>
                                                            <input type="file" className="form-control" id="attachment" />
                                                        </div>
                                                    </div>
                                                    <button type="submit" className="btn btn-size btn-main-primary w-100">Send complaint</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="info-section pb-100">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-12">
                                <div className="card rounded-16 p-lg-5 p-3 bg-custom-color-4 border-0">
                                    <div className="card-body">
                                        <p className="text-center text-medium">Resolution feedback</p>

                                        <div className="row">
                                            <div className="col-lg-10 mx-auto">
                                                <div id="carouselFeedback" className="carousel slide">
                                                    <div className="carousel-indicators indictator" style={{ bottom: "-40px" }}>
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" className="active" aria-current="true" aria-label="Slide 1"></button>
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div>
                                                    <div className="carousel-inner">
                                                        <div className="carousel-item active">
                                                            <div>
                                                                <p className="big-feedback-text text-center mb-4">“I’ve used NDRS to help me settle my salary issues at work, It was scary to speak out af first but the support from the settlement bodies helped me achieve a wonderful resolution.“</p>

                                                                <p className="text-center text-bold mb-1">Adaeze Nwaosa</p>
                                                                <p className="text-center mb-0">Nurse, Springway Hospital</p>
                                                            </div>
                                                        </div>
                                                        <div className="carousel-item">
                                                            <div>
                                                                <p className="big-feedback-text text-center mb-4">“I’ve used NDRS to help me settle my salary issues at work, It was scary to speak out af first but the support from the settlement bodies helped me achieve a wonderful resolution.“</p>

                                                                <p className="text-center text-bold mb-1">Adaeze Nwaosa</p>
                                                                <p className="text-center mb-0">Nurse, Springway Hospital</p>
                                                            </div>
                                                        </div>
                                                        <div className="carousel-item">
                                                            <div>
                                                                <p className="big-feedback-text text-center mb-4">“I’ve used NDRS to help me settle my salary issues at work, It was scary to speak out af first but the support from the settlement bodies helped me achieve a wonderful resolution.“</p>

                                                                <p className="text-center text-bold mb-1">Adaeze Nwaosa</p>
                                                                <p className="text-center mb-0">Nurse, Springway Hospital</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button className="arrow-pos carousel-control-prev" type="button" data-bs-target="#carouselFeedback" data-bs-slide="prev">
                                                        <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <img src="/images/arrow-feedback-left.svg" className="img-fluid" alt="arrow feedback left" />
                                                        <span className="visually-hidden">Previous</span>
                                                    </button>
                                                    <button className="arrow-pos carousel-control-next" type="button" data-bs-target="#carouselFeedback" data-bs-slide="next">
                                                        <span className="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <img src="/images/arrow-feedback-right.svg" className="img-fluid" alt="arrow feedback left" />
                                                        <span className="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="info-section">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-7 mx-auto">
                                <h3 className="heading-5">Enjoy 100% free access to</h3>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-lg-4 mb-3">
                                <div className="bell-box bg-white p-lg-5 p-3 rounded-16 h-100 text-center">
                                    <div className="text-center mb-3">
                                        <img src="/images/account-2.svg" className="img-fluid" alt="submit" />
                                    </div>

                                    <h5>Resolution Discussions</h5>
                                    <p>We facilitate resolution in a simple to understand interface with all involved parties</p>
                                </div>
                            </div>

                            <div className="col-lg-4 mb-3">
                                <div className="bell-box bg-white p-lg-5 p-3 rounded-16 h-100 text-center">
                                    <div className="text-center mb-3">
                                        <img src="/images/account-1.svg" className="img-fluid" alt="submit" />
                                    </div>

                                    <h5>Settlement Management Bodies</h5>
                                    <p>Neutral, knowledgeable third parties that oversee and facilitate the resolution of all disputes.</p>
                                </div>
                            </div>

                            <div className="col-lg-4 mb-3">
                                <div className="bell-box bg-white p-lg-5 p-3 rounded-16 h-100 text-center">
                                    <div className="text-center mb-3">
                                        <img src="/images/account-3.svg" className="img-fluid" alt="submit" />
                                    </div>

                                    <h5>Compliance</h5>
                                    <p>We give the claimant the ability to call back a case that hasn’t honored its resolution agreements </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="info-section pb-100">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-12">
                                <div className="mosaic-grid-2 w-100 grid-3-shape">

                                    <div className="item-element w-600 d-flex flex-column bg-green overflow-hidden item1_2 p-lg-5 p-5 category-img-grid" style={{ backgroundColor: "#002B22" }}>

                                        <div className="flex-grow-1">
                                            <img src="/images/minister.svg" className="img-fluid mb-3" alt="minister" />

                                            <p className="box-title-1 text-white">“ With NDRS, we receive dispute case submissions 3x faster than we previously did and with access to all supporting documents and the ability to invite the right settlement bodies quickly the resolution process is simpler than ever ”</p>
                                        </div>

                                        <div className="text-white">
                                            <h6>Samuel Obakoya</h6>
                                            <p>Ministry of Labour Admin</p>
                                        </div>

                                    </div>

                                    <div className="item-element p-lg-5 p-5 item2_2 overflow-hidden add-bg-image-2" style={{ backgroundImage: ` url('/images/box-img.png')` }}>

                                    </div>

                                    <div className="item-element  d-flex flex-column d-block p-lg-5 p-5 bg-main-6 overflow-hidden item3_2" style={{ backgrounCcolor: "#E6ECEA" }}>
                                        <h3 className="box-num flex-grow-1">3x</h3>
                                        <p className="">Claimants can experience a threefold increase in dispute case resolution speed</p>
                                    </div>

                                    <div className="item-element d-flex flex-column p-lg-5 p-5 overflow-hidden item4_2" style={{ backgroundColor: "#FEF6E7" }}>
                                        <h3 className="box-num flex-grow-1">98%</h3>
                                        <p className="">All records, paperwork and supporting documents stored on secure servers with a 98% accuracy rate.</p>
                                    </div>

                                    <div className="item-element p-lg-5 p-5 overflow-hidden item5_2  add-bg-image-2" style={{ backgroundImage: `url('/images/box-img-2.png')` }}>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="info-section pb-100">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-7 mx-auto">
                                <h3 className="heading-5">Frequently asked questions</h3>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-lg-8 mx-auto">
                                <div className="accordion faq-home mt-4" id="accordionHelp">

                                    <div className="accordion-item mb-3">
                                        <h2 className="accordion-header">
                                            <button className="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                How long does it take to resolve a grievance?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" className="accordion-collapse collapse show" data-bs-parent="#accordionHelp">
                                            <div className="accordion-body">
                                                If you're facing a grievance, it's important to consult your employer's grievance policy or your union representative to understand the specific timelines and procedures involved
                                            </div>
                                        </div>
                                    </div>

                                    <div className="accordion-item mb-3">
                                        <h2 className="accordion-header">
                                            <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                How do I create a poll htmlFor voting within discussions?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" className="accordion-collapse collapse" data-bs-parent="#accordionHelp">
                                            <div className="accordion-body">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate nulla nisi sit distinctio. Odit sapiente nobis perferendis cupiditate aperiam quam maiores corrupti vitae. Natus, enim voluptatibus exercitationem animi omnis aliquam.
                                            </div>
                                        </div>
                                    </div>

                                    <div className="accordion-item mb-3">
                                        <h2 className="accordion-header">
                                            <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                How to pass judgedment or key decisions as a settlement body?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" className="accordion-collapse collapse" data-bs-parent="#accordionHelp">
                                            <div className="accordion-body">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate nulla nisi sit distinctio. Odit sapiente nobis perferendis cupiditate aperiam quam maiores corrupti vitae. Natus, enim voluptatibus exercitationem animi omnis aliquam.
                                            </div>
                                        </div>
                                    </div>

                                    <div className="accordion-item mb-3">
                                        <h2 className="accordion-header">
                                            <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                How to pass judgedment or key decisions as a settlement body?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" className="accordion-collapse collapse" data-bs-parent="#accordionHelp">
                                            <div className="accordion-body">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate nulla nisi sit distinctio. Odit sapiente nobis perferendis cupiditate aperiam quam maiores corrupti vitae. Natus, enim voluptatibus exercitationem animi omnis aliquam.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="info-section pb-100">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-10 mx-auto">
                                <h3 className="heading-5 text-center mb-4">News</h3>

                                <div className="row">

                                    <div className="col-lg-4 mb-lg-0 mb-3">

                                        <div className="card rounded-16 h-100">
                                            <div className="card-body blog-body">
                                                <div className="blog-box rounded-16">
                                                    <img src="/images/news-1.jpg" className="img-fluid object-fit-cover w-100 h-100 object-position-center" alt="News" />
                                                </div>

                                                <h5 className="mt-3 blog-title">Tinubu orders resolution of Nigeria and UAE dispute</h5>

                                            </div>
                                        </div>
                                    </div>

                                    <div className="col-lg-4 mb-lg-0 mb-3">

                                        <div className="card rounded-16 h-100">
                                            <div className="card-body blog-body">
                                                <div className="blog-box rounded-16">
                                                    <img src="/images/news-2.jpg" className="img-fluid object-fit-cover w-100 h-100 object-position-center" alt="News" />
                                                </div>

                                                <h5 className="mt-3 blog-title">Tinubu orders resolution of Nigeria and UAE dispute</h5>

                                            </div>
                                        </div>
                                    </div>

                                    <div className="col-lg-4 mb-lg-0 mb-3">

                                        <div className="card rounded-16 h-100">
                                            <div className="card-body blog-body">
                                                <div className="blog-box rounded-16">
                                                    <img src="/images/news-3.jpg" className="img-fluid object-fit-cover w-100 h-100 object-position-center" alt="News" />
                                                </div>

                                                <h5 className="mt-3 blog-title">Tinubu orders resolution of Nigeria and UAE dispute</h5>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="info-section pb-100">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-12">
                                <div className="card rounded-16 p-lg-5 p-3 bg-custom-color-3 border-0">
                                    <div className="card-body">
                                        <div className="row">
                                            <div className="col-lg-8 mx-auto">
                                                <h3 className="heading-5 text-white mb-4">Resolve your workplace disputes today</h3>

                                                <div className="row">
                                                    <div className="col-lg-5 mx-auto">
                                                        <Link to="/login" className="btn btn-size btn-main-primary w-100 px-3">Submit a dispute</Link>
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

                <footer>
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-12">
                                <div className="d-flex flex-wrap justify-content-between align-items-center border-top py-3">
                                    <div className="mb-lg-0 mb-4">
                                        <img src="/images/NDRS-Logo.svg" className="img-fluid" alt="logo" style={{ height: "30px" }} />
                                    </div>

                                    <div className="gap-15 d-flex align-items-center">
                                        <a href="#" className="text-decoration-none">Terms and Conditions</a>
                                        <a href="#" className="text-decoration-none">Privacy Policy</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

                {/* <?php include "./components/javascript.inc.php"; ?> */}
            </div>
        </>
    )
}

export default Index