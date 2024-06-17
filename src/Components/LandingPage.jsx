import React from 'react'
import { Link } from 'react-router-dom'


const LandingPage = () => {
    return (
        <>
            <div class="bg-white">

                <nav class="navbar bg-white py-4">
                    <div class="container">
                        <a class="navbar-brand" href="#">
                            <img src="/images/NDRS-Logo.svg" class="img-fluid" alt="logo" style={{ height: '30px' }} />
                        </a>

                        <Link to="/Login" class="btn btn-size btn-main-primary px-3">Log in</Link>
                    </div>
                </nav>

                <div class="container">
                    <div class="hero-section add-bg-image d-flex align-items-end position-relative p-lg-5 p-3" style={{ backgroundImage: `url('/images/hero-banner-1.png')` }}>
                        <div class="dark-overlay rounded-16"></div>
                        <div class="container-fluid position-relative">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1 class="hero-text text-white mb-4">An easier way to resolve disputes & grieviances </h1>
                                    <p class="text-white hero-para mb-4">Skip the back-and-forth and get a resolution in a fraction of the time with our streamlined process.</p>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <Link to="/login" class="btn btn-size btn-main-primary px-3">Submit a dispute</Link>
                                        </div>
                                        <div class="col-lg-4">
                                            <Link to="/login" class="btn btn-size text-white border-0 px-3">Log into account </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <img src="/images/labour-employment.svg" class="img-fluid py-3" alt="labour-employment" />
                </div>

                <div class="info-section pt-100 pb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="text-center para-sub">Access to all Nigerian Trade Unions and Settlement Managment Bodies</p>

                                <img src="/images/unions.png" class="img-fluid" alt="unions" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-section pb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 mx-auto">
                                <h3 class="heading-5 mb-4">One streamlined platform to settle all disputes & grievances</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <div class="bell-box p-lg-5 p-3 rounded-16 h-100">
                                    <div class="text-center mb-3">
                                        <img src="/images/submit.svg" class="img-fluid" alt="submit" />
                                    </div>

                                    <h5>Submit your complaint</h5>
                                    <p>Submit details to the dispute or grievances in 3 quick steps.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-3">
                                <div class="bell-box p-lg-5 p-3 rounded-16 h-100">
                                    <div class="text-center mb-3">
                                        <img src="/images/invite.svg" class="img-fluid" alt="submit" />
                                    </div>

                                    <h5>Get an invite</h5>
                                    <p>You’ll receive an email invite from the Ministry of Labor & Employment to setup your account.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-3">
                                <div class="bell-box p-lg-5 p-3 rounded-16 h-100">
                                    <div class="text-center mb-3">
                                        <img src="/images/resolution.svg" class="img-fluid" alt="submit" />
                                    </div>

                                    <h5>Easy resolution</h5>
                                    <p>Access to all necessary people and features to easily reach a dispute resolution.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-section pb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card rounded-16 p-lg-5 p-3 bg-custom-color-3 border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 mx-auto">
                                                <h3 class="heading-5 text-white mb-5">Submit your complaint</h3>

                                                <p class="text-medium text-white">Choose type of case</p>
                                                <div class="row">
                                                    <div class="col-lg-6 mb-lg-0 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                <p class="text-white custom-text-2 text-medium mb-1">Dispute case</p>
                                                                <p class="text-white">These are disagreements requiring formal resolution, mostly between individuals, organizations or unions</p>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 mb-lg-0 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" />
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                <p class="text-white custom-text-2 text-medium mb-1">Grievance</p>
                                                                <p class="text-white">These are complaints about an unfair workplace issue, mostly within  organizations.</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form>

                                                    <div class="mb-3">
                                                        <label class="form-label text-white">Type of claimant</label>
                                                        <select class="form-select form-control-height">
                                                            <option>--Choose--</option>
                                                            <option>Individual</option>
                                                            <option>Group</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label text-white">Name of representative (if group)</label>
                                                        <input type="text" class="form-control form-control-height" placeholder="Type in Name of representative" />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label text-white">Email address of representative or individual</label>
                                                        <input type="text" class="form-control form-control-height" placeholder="Type in Email address" />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label text-white">Name of organisation you work in or represent</label>
                                                        <input type="text" class="form-control form-control-height" placeholder="Type in organisation name" />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label text-white">Union you are sending your complaint to</label>
                                                        <select class="form-select form-control-height">
                                                            <option>--Choose--</option>
                                                            <option>Individual</option>
                                                            <option>Group</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="complaintText" class="form-label text-white">Your Complaint</label>
                                                        <textarea class="form-control" id="complaintText" rows="4" placeholder="Describe your issue here..."></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="attachment" class="form-label text-white">Attachment</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="bi bi-paperclip"></i></span>
                                                            <input type="file" class="form-control" id="attachment" />
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-size btn-main-primary w-100">Send complaint</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-section pb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card rounded-16 p-lg-5 p-3 bg-custom-color-4 border-0">
                                    <div class="card-body">
                                        <p class="text-center text-medium">Resolution feedback</p>

                                        <div class="row">
                                            <div class="col-lg-10 mx-auto">
                                                <div id="carouselFeedback" class="carousel slide">
                                                    <div class="carousel-indicators indictator" style={{ bottom: "-40px" }}>
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <div>
                                                                <p class="big-feedback-text text-center mb-4">“I’ve used NDRS to help me settle my salary issues at work, It was scary to speak out af first but the support from the settlement bodies helped me achieve a wonderful resolution.“</p>

                                                                <p class="text-center text-bold mb-1">Adaeze Nwaosa</p>
                                                                <p class="text-center mb-0">Nurse, Springway Hospital</p>
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <div>
                                                                <p class="big-feedback-text text-center mb-4">“I’ve used NDRS to help me settle my salary issues at work, It was scary to speak out af first but the support from the settlement bodies helped me achieve a wonderful resolution.“</p>

                                                                <p class="text-center text-bold mb-1">Adaeze Nwaosa</p>
                                                                <p class="text-center mb-0">Nurse, Springway Hospital</p>
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <div>
                                                                <p class="big-feedback-text text-center mb-4">“I’ve used NDRS to help me settle my salary issues at work, It was scary to speak out af first but the support from the settlement bodies helped me achieve a wonderful resolution.“</p>

                                                                <p class="text-center text-bold mb-1">Adaeze Nwaosa</p>
                                                                <p class="text-center mb-0">Nurse, Springway Hospital</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="arrow-pos carousel-control-prev" type="button" data-bs-target="#carouselFeedback" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <img src="/images/arrow-feedback-left.svg" class="img-fluid" alt="arrow feedback left" />
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="arrow-pos carousel-control-next" type="button" data-bs-target="#carouselFeedback" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <img src="/images/arrow-feedback-right.svg" class="img-fluid" alt="arrow feedback left" />
                                                        <span class="visually-hidden">Next</span>
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

                <div class="info-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 mx-auto">
                                <h3 class="heading-5">Enjoy 100% free access to</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <div class="bell-box bg-white p-lg-5 p-3 rounded-16 h-100 text-center">
                                    <div class="text-center mb-3">
                                        <img src="/images/account-2.svg" class="img-fluid" alt="submit" />
                                    </div>

                                    <h5>Resolution Discussions</h5>
                                    <p>We facilitate resolution in a simple to understand interface with all involved parties</p>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-3">
                                <div class="bell-box bg-white p-lg-5 p-3 rounded-16 h-100 text-center">
                                    <div class="text-center mb-3">
                                        <img src="/images/account-1.svg" class="img-fluid" alt="submit" />
                                    </div>

                                    <h5>Settlement Management Bodies</h5>
                                    <p>Neutral, knowledgeable third parties that oversee and facilitate the resolution of all disputes.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-3">
                                <div class="bell-box bg-white p-lg-5 p-3 rounded-16 h-100 text-center">
                                    <div class="text-center mb-3">
                                        <img src="/images/account-3.svg" class="img-fluid" alt="submit" />
                                    </div>

                                    <h5>Compliance</h5>
                                    <p>We give the claimant the ability to call back a case that hasn’t honored its resolution agreements </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-section pb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mosaic-grid-2 w-100 grid-3-shape">

                                    <div class="item-element w-600 d-flex flex-column bg-green overflow-hidden item1_2 p-lg-5 p-5 category-img-grid" style={{ backgroundColor: "#002B22" }}>

                                        <div class="flex-grow-1">
                                            <img src="/images/minister.svg" class="img-fluid mb-3" alt="minister" />

                                            <p class="box-title-1 text-white">“ With NDRS, we receive dispute case submissions 3x faster than we previously did and with access to all supporting documents and the ability to invite the right settlement bodies quickly the resolution process is simpler than ever ”</p>
                                        </div>

                                        <div class="text-white">
                                            <h6>Samuel Obakoya</h6>
                                            <p>Ministry of Labour Admin</p>
                                        </div>

                                    </div>

                                    <div class="item-element p-lg-5 p-5 item2_2 overflow-hidden add-bg-image-2" style={{ backgroundImage: ` url('/images/box-img.png')` }}>

                                    </div>

                                    <div class="item-element  d-flex flex-column d-block p-lg-5 p-5 bg-main-6 overflow-hidden item3_2" style={{ backgrounCcolor: "#E6ECEA" }}>
                                        <h3 class="box-num flex-grow-1">3x</h3>
                                        <p class="">Claimants can experience a threefold increase in dispute case resolution speed</p>
                                    </div>

                                    <div class="item-element d-flex flex-column p-lg-5 p-5 overflow-hidden item4_2" style={{ backgroundColor: "#FEF6E7" }}>
                                        <h3 class="box-num flex-grow-1">98%</h3>
                                        <p class="">All records, paperwork and supporting documents stored on secure servers with a 98% accuracy rate.</p>
                                    </div>

                                    <div class="item-element p-lg-5 p-5 overflow-hidden item5_2  add-bg-image-2" style={{ backgroundImage: `url('/images/box-img-2.png')` }}>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-section pb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 mx-auto">
                                <h3 class="heading-5">Frequently asked questions</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="accordion faq-home mt-4" id="accordionHelp">

                                    <div class="accordion-item mb-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                How long does it take to resolve a grievance?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                If you're facing a grievance, it's important to consult your employer's grievance policy or your union representative to understand the specific timelines and procedures involved
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mb-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                How do I create a poll for voting within discussions?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate nulla nisi sit distinctio. Odit sapiente nobis perferendis cupiditate aperiam quam maiores corrupti vitae. Natus, enim voluptatibus exercitationem animi omnis aliquam.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mb-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                How to pass judgedment or key decisions as a settlement body?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate nulla nisi sit distinctio. Odit sapiente nobis perferendis cupiditate aperiam quam maiores corrupti vitae. Natus, enim voluptatibus exercitationem animi omnis aliquam.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mb-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                How to pass judgedment or key decisions as a settlement body?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionHelp">
                                            <div class="accordion-body">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate nulla nisi sit distinctio. Odit sapiente nobis perferendis cupiditate aperiam quam maiores corrupti vitae. Natus, enim voluptatibus exercitationem animi omnis aliquam.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-section pb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 mx-auto">
                                <h3 class="heading-5 text-center mb-4">News</h3>

                                <div class="row">

                                    <div class="col-lg-4 mb-lg-0 mb-3">

                                        <div class="card rounded-16 h-100">
                                            <div class="card-body blog-body">
                                                <div class="blog-box rounded-16">
                                                    <img src="/images/news-1.jpg" class="img-fluid object-fit-cover w-100 h-100 object-position-center" alt="News" />
                                                </div>

                                                <h5 class="mt-3 blog-title">Tinubu orders resolution of Nigeria and UAE dispute</h5>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-lg-0 mb-3">

                                        <div class="card rounded-16 h-100">
                                            <div class="card-body blog-body">
                                                <div class="blog-box rounded-16">
                                                    <img src="/images/news-2.jpg" class="img-fluid object-fit-cover w-100 h-100 object-position-center" alt="News" />
                                                </div>

                                                <h5 class="mt-3 blog-title">Tinubu orders resolution of Nigeria and UAE dispute</h5>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-lg-0 mb-3">

                                        <div class="card rounded-16 h-100">
                                            <div class="card-body blog-body">
                                                <div class="blog-box rounded-16">
                                                    <img src="/images/news-3.jpg" class="img-fluid object-fit-cover w-100 h-100 object-position-center" alt="News" />
                                                </div>

                                                <h5 class="mt-3 blog-title">Tinubu orders resolution of Nigeria and UAE dispute</h5>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-section pb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card rounded-16 p-lg-5 p-3 bg-custom-color-3 border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8 mx-auto">
                                                <h3 class="heading-5 text-white mb-4">Resolve your workplace disputes today</h3>

                                                <div class="row">
                                                    <div class="col-lg-5 mx-auto">
                                                        <Link to="/login" class="btn btn-size btn-main-primary w-100 px-3">Submit a dispute</Link>
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
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex flex-wrap justify-content-between align-items-center border-top py-3">
                                    <div class="mb-lg-0 mb-4">
                                        <img src="/images/NDRS-Logo.svg" class="img-fluid" alt="logo" style={{ height: "30px" }} />
                                    </div>

                                    <div class="gap-15 d-flex align-items-center">
                                        <a href="#" class="text-decoration-none">Terms and Conditions</a>
                                        <a href="#" class="text-decoration-none">Privacy Policy</a>
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

export default LandingPage