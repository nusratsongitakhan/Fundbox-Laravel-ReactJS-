import React from 'react'
import axios from 'axios';
import { Link } from 'react-router-dom';
import logo from '../../dummyLogo.png';
import avatar from '../../avatar.png';
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';
import { useState,useEffect} from 'react';


// import 'boxicons';

 const AdminHome = () => {
    const ColoredLine = ({ color }) => (
        <hr
            style={{
                color: color,
                backgroundColor: color,
                height: 5
            }}
        />
    );
    function getUserData(){
        // let data = localStorage.getItem('userData');
        let setData = sessionStorage.getItem('userData');
        // console.log(JSON.parse(data))
        console.log(JSON.parse(setData))
    }

    const [event, setEvent] = useState([]);
    const getDashboardData= async()=>{
        const res = await axios.get('http://localhost:8000/api/admin/dashboard');
        console.log(res.data);
        
        if (res.status === 200) {
            setEvent(res.data)
        }
    }
    useEffect(() => {
        getDashboardData();    
    }, []);

    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
                <LeftNavBar/>
                <div id="layoutSidenav_content" style={{ "marginLeft" :"10px", "marginRight" :"20px", "marginTop" :"10px"}}>
                    <main>
                        <section id="widgets-Statistics">
                            <div className="row">
                                <div className="col-12 mt-1 mb-2">
                                    <h4>Site Summary</h4>
                                    <ColoredLine color="red" />
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                            <div className="badge-circle badge-circle-lg badge-circle-light-primary mx-auto mb-50">
                                                    <i className="bx bx-receipt font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">Total Site Visit</div>
                                                <h3 className="mb-0">{event.totalSiteVisit}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                                <div className="badge-circle badge-circle-lg badge-circle-light-primary mx-auto mb-50">
                                                <i className="bx bx-receipt font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">Unique IP</div>
                                                <h3 className="mb-0">{event.uniqueIp}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <br/>
                        <section id="widgets-Statistics">
                            <div className="row">
                                <div className="col-12 mt-1 mb-2">
                                    <h4>Transaction Summary</h4>
                                    <ColoredLine color="red" />
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                            <div className="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                    <i className="bx bxs-smiley-happy font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">Total Collect</div>
                                                <h3 className="mb-0">৳ {event.totalMoneyCollect}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                                <div className="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                                    <i className="bx bxs-smiley-sad font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">Refund Money</div>
                                                <h3 className="mb-0">৳ {event.refundMoney}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                                <div className="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                    <i className="bx bxs-smiley-happy font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">Today Collect</div>
                                                <h3 className="mb-0">৳ {event.todayCollect}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                                <div className="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                                    <i className="bx bxs-smiley-sad font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">Today Refund Money</div>
                                                <h3 className="mb-0">৳ {event.todayRefund}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <br/>
                        <section id="widgets-Statistics">
                            <div className="row">
                                <div className="col-12 mt-1 mb-2">
                                    <h4>Events Summary</h4>
                                    <ColoredLine color="red" />
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                                <div className="badge-circle badge-circle-lg badge-circle-light-warning mx-auto mb-50">
                                                    <i className="bx bx-receipt font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">Total Event</div>
                                                <h3 className="mb-0">{event.totalEvents}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                                <div className="badge-circle badge-circle-lg badge-circle-light-primary mx-auto mb-50">
                                                    <i className="bx bxs-error font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">Pending Event</div>
                                                <h3 className="mb-0">{event.pendingEvents}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                                <div className="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                    <i className="bx bxs-smiley-happy font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">Accepted Event</div>
                                                <h3 className="mb-0">{event.acceptedEvents}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-warning">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                                <div className="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                                    <i className="bx bxs-smiley-sad font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">Deactivate Event</div>
                                                <h3 className="mb-0">{event.deactiveEvents}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <br/>
                        <section id="widgets-Statistics">
                            <div className="row">
                                <div className="col-12 mt-1 mb-2">
                                    <h4>User Information</h4>
                                    <ColoredLine color="red" />
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                                <div className="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                    <i className="bx bx-user font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">Admins</div>
                                                <h3 className="mb-0">{event.totalAdmin}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                                <div className="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                    <i className="bx bx-user font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">Organization</div>
                                                <h3 className="mb-0">{event.totalOrg}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                                <div className="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                    <i className="bx bx-user font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">Sponsor</div>
                                                <h3 className="mb-0">{event.totalSpo}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                                    <div className="card text-center">
                                        <div className="card-content">
                                            <div className="card-body py-1">
                                                <div className="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                    <i className="bx bx-user font-medium-5"></i>
                                                </div>
                                                <div className="text-muted line-ellipsis">User</div>
                                                <h3 className="mb-0">{event.totalUser}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </main>
                </div>
            </div>
        </div>
    )
}
export default AdminHome;