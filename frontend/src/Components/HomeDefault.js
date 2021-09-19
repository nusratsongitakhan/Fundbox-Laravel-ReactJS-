import React from 'react'
import { Link } from 'react-router-dom';
import logo from '../dummyLogo.png';
import { useHistory } from "react-router-dom";
// import logos from '../public/assets/img/undraw_team_work_k80m.png';

const HomeDefault = () => {
    const history = useHistory();
    return (
        <div>
            <div>
                <div className="site-mobile-menu site-navbar-target">
                    <div className="site-mobile-menu-header">
                    <div className="site-mobile-menu-close mt-3">
                        <span className="icon-close2 js-menu-toggle"></span>
                    </div>
                    </div>
                    <div className="site-mobile-menu-body"></div>
                </div>
            </div>
            <div className="top-bar">
                <div className="container">
                    <div className="row">
                        <div className="col-12">
                            <a href="#" className=""><span className="mr-2  icon-envelope-open-o"></span> <span className="d-none d-md-inline-block">info@fundbox.com</span></a>
                            <span className="mx-md-2 d-inline-block"></span>
                            <a href="#" className=""><span className="mr-2  icon-phone"></span> <span className="d-none d-md-inline-block">+880 1776 364781</span></a>

                            <div className="float-right">
                                <a href="/login" className=""><span></span> <span className="d-none d-md-inline-block">Login</span></a>
                                <span className="mx-md-2 d-inline-block"></span>
                                <a href="/signup" className=""><span></span> <span className="d-none d-md-inline-block">Signup</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <header className="site-navbar js-sticky-header site-navbar-target" role="banner">

                <div className="container">
                    <div className="row align-items-center position-relative">
                        <div className="site-logo">
                            <img src={logo} alt="site logo" />
                        </div>

                        <div className="toggle-button d-inline-block d-lg-none"><a href="#" className="site-menu-toggle py-5 js-menu-toggle text-black"><span className="icon-menu h3"></span></a></div>

                    </div>
                </div>
            </header>
            <div className="container">
                <div className="row">
                    <div className="col-6">
                        <h1 style={{ "marginTop" :"90px"}}>Fundraising for the people and causes you care about</h1>
                        <h5>Get Start Today</h5>
                        <button type="button" className="btn btn-lg btn-primary" disabled>Start Donation</button>
                    </div>
                    <div className="col-6">
                        <img src={process.env.PUBLIC_URL + '/assets/img/undraw_team_work_k80m.png'} height="500"/>
                    </div>
                </div>
            </div>
            <div className="event" style={{ "backgroundColor" :"#F2F4F4"}}>
                <div className="container">
                    <div className="row" style={{ "marginBottom" :"00px"}}>
                        <div className="col-12" >
                            <h2 className="text-center" style={{ "margin" :"30px 0px"}}>Feature Events</h2>
                            <div className="row">
                                <div className="col-lg-4 col-sm-6 col-12 dashboard-users-danger">
                                    <a href="{{ URL::to('/EventDetails/'.base64_encode($feaEvent->id)) }}" className="text-dark">
                                        <div className="col-4">
                                            <div className="card" style={{ "marginTop" :"10px","width": "20rem"}}>
                                                <img className="card-img-top" style={{ "height" :"13.4rem"}} src={process.env.PUBLIC_URL + '/assets/img/loading.gif'} alt="Card image cap" />
                                                <div className="card-body" style={{ "textAlign" :"center"}}>
                                                    <h5 className="card-title" style={{ "overflow" :"hidden","textOverflow":"ellipsis"}}>this is name</h5>
                                                    <p className="card-text" style={{ "height" :"80px","width":"250px","overflow":"hidden","textOverflow":"ellipsis"}}>This is details</p>
                                                    
                                                    <h6 style={{ "marginTop" :"10px"}}>Need ৳ 100</h6>
                                                    
                                                    <a  href="#" className="btn btn-primary loginAlert" aria-hidden="true" style={{ "color" :"white"}}>Donate Now</a >
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div className="col-lg-4 col-sm-6 col-12 dashboard-users-danger">
                                    <a href="{{ URL::to('/EventDetails/'.base64_encode($feaEvent->id)) }}" className="text-dark">
                                        <div className="col-4">
                                            <div className="card" style={{ "marginTop" :"10px","width": "20rem"}}>
                                                <img className="card-img-top" style={{ "height" :"13.4rem"}} src={process.env.PUBLIC_URL + '/assets/img/loading.gif'} alt="Card image cap" />
                                                <div className="card-body" style={{ "textAlign" :"center"}}>
                                                    <h5 className="card-title" style={{ "overflow" :"hidden","textOverflow":"ellipsis"}}>this is name</h5>
                                                    <p className="card-text" style={{ "height" :"80px","width":"250px","overflow":"hidden","textOverflow":"ellipsis"}}>This is details</p>
                                                    
                                                    <h6 style={{ "marginTop" :"10px"}}>Need ৳ 100</h6>
                                                    
                                                    <a href="#" className="btn btn-primary loginAlert" aria-hidden="true" style={{ "color" :"white"}}>Donate Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div className="col-lg-4 col-sm-6 col-12 dashboard-users-danger">
                                    <a href="{{ URL::to('/EventDetails/'.base64_encode($feaEvent->id)) }}" className="text-dark">
                                        <div className="col-4">
                                            <div className="card" style={{ "marginTop" :"10px","width": "20rem"}}>
                                                <img className="card-img-top" style={{ "height" :"13.4rem"}} src={process.env.PUBLIC_URL + '/assets/img/loading.gif'} alt="Card image cap" />
                                                <div className="card-body" style={{ "textAlign" :"center"}}>
                                                    <h5 className="card-title" style={{ "overflow" :"hidden","textOverflow":"ellipsis"}}>this is name</h5>
                                                    <p className="card-text" style={{ "height" :"80px","width":"250px","overflow":"hidden","textOverflow":"ellipsis"}}>This is details</p>
                                                    
                                                    <h6 style={{ "marginTop" :"10px"}}>Need ৳ 100</h6>
                                                    
                                                    <a href="#" className="btn btn-primary loginAlert" aria-hidden="true" style={{ "color" :"white"}}>Donate Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div className="status" style={{ "backgroundColor" :"#F2F4F4"}}>
                <div className="container" style={{ "paddingBottom" :"30px"}}>
                    <h2 className="text-center">We will save the world</h2>
                    <h6 className="text-center"  style={{ "paddingBottom" :"30px"}}>We have the strongest community</h6>
                    <div className="row">
                        <div className="col-4" style={{ "textAlign" :"center"}}>
                            <h2><b>100</b></h2>
                            <h3>Volunteers</h3>
                        </div>
                        <div className="col-4" style={{ "textAlign" :"center"}}>
                            <h2><b>500</b></h2>
                            <h3>Events</h3>
                        </div>
                        <div className="col-4" style={{ "textAlign" :"center"}}>
                            <h2><b>154863.00 ৳</b></h2>
                            <h3>Total Donation</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div className="event" style={{ "backgroundColor" :"#ffffff","margin": "auto", "width": "50%","padding": "10px"}}>
                <div className="container" style={{ "paddingBottom" :"30px"}}>
                    <div className="">
                            <div className="osahan-slider-item mx-2">
                                <img style={{ "width":"100%","backgroundColor" :"#ffffff","objectFit":"contain"}} src={process.env.PUBLIC_URL + '/assets/img/loading.gif'} className="img-fluid mx-auto rounded promo-slider" alt="Responsive image" />
                            </div>
                    </div>
                </div>
            </div>
            <div className="event" >
                <div className="container" style={{ "height" :"200px","textAlign": "center", "marginTop":"100px"}}>
                    <h2 style={{ "marginTop":"20px"}}>Ready to Join us?</h2>
                    <a type="button" href="{{URL::to('/joinOrg')}}" className="btn btn-success">Join as Organization</a>
                    <a type="button" href="{{URL::to('/joinSponsor')}}" className="btn btn-success">Join as Sponsor</a>
                </div>
            </div>

            <footer className="footer-01">
                <div className="container">
                    <div className="row mt-5">
                        <div className="col-md-12 text-center">
                            <p className="copyright">Copyright All rights reserved | Develop <i className="ion-ios-heart" aria-hidden="true"></i> by <a target="_blank">APWT_B_SUMMER-2021_GROUP_7 </a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    )
}
export default HomeDefault;