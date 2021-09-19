import React from 'react'
import UserMenuBar from './UserMenuBar';
import TopNavbar from './TopNavBar';
import { useState } from 'react';
import { useAxios } from './useAxios';
import { Link } from 'react-router-dom';
import { useParams } from 'react-router';

const OrganizationEvents= ()=>{
    const { id: eid } = useParams();
    const [list, setOrganizationEvents] = useState([]);
    const url = `http://localhost:8000/api/user/organizationEvents/${eid}`;
    useAxios(url, setOrganizationEvents);

    const event = list.filter(event => event.eventType === 1);

    return(

<div className="sb-nav-fixed">
            <TopNavbar url="#!"/>
            <div id="layoutSidenav">
            <div className="row">
            <div className="col-2 mt-1 mb-2">
                <UserMenuBar/>
            </div>
            <div className="col-10 mt-1 mb-2">
                <div id="layoutSidenav_content">
                    <main className="bodyBoxShadow">
                    <div>
                <div className="app-content content">
                        <div className="content-overlay"></div>
                        <div className="content-wrapper">
                            <div className="content-body">
                                <section id="widgets-Statistics">

                                    <div className="row">
                                        <div className="col-11 mt-1 mb-2">
                                            <h4>Events of this Organization</h4>
                                            
                                        </div>
                                        <div className="col-1 mt-1 mb-2">
                                        <Link to="/user/organizationDetails/:id" className="btn btn-primary foat-end">Back</Link>    
                                        </div>
                                        <hr/>
                                    </div>

                                    <div className="row">

                                                    {
                                                            event.map((organizationEvent)=>{
                                                            return (
                                                                
                                                            
                                                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                                                                    <div className="card text-center">
                                                                        <div className="card-content">
                                                                        <img src={"http://localhost:8000"+organizationEvent.image} className="card-img-top" alt="..."/>
                                                                            <div className="card-body py-1">
                                                                                <div className="badge-circle badge-circle-lg badge-circle-light-warning mx-auto mb-50">
                                                                                    <i className="bx bx-receipt font-medium-5"></i>
                                                                                </div>
                                                                                <h5 className="card-title">{organizationEvent.event_name}</h5>
                                                                                <p className="card-text">{organizationEvent.details}</p>
                                                                                
                                                                                {/* <a href="{{ URL::to('/example2/'.base64_encode($organizationEvent->id).'/'.base64_encode($organizationEvent->orgId)) }}" class="btn btn-primary">Donate Now</a> */}
                                                                                
                                                                                
                                                                                    
                                                                               
                                                                                <Link to={`/user/review/${organizationEvent.id}`} className="btn btn-primary btn-sm foat-end">Review</Link>               
                                                                                <Link to={`/user/report/${organizationEvent.id}`} className="btn btn-primary btn-sm foat-end">Report</Link>               
                                                                                {/* <a href={`/user/review/${organizationEvent.id}`} className="btn btn-primary btn-sm">Review</a>
                                                                                <a href={`/user/report/${organizationEvent.id}`} className="btn btn-primary btn-sm">Report</a>  */}
                                        
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            
                                                            );
                                                            })
                                                        }
                                                    
                                                        

                                    </div>
                                </section>
                                
                            
                            </div>
                        </div>
                    </div>


           
        </div>
                        
                    </main>
                </div>
                </div>
            </div>
            </div>
        </div>
















       
    )
}


export default OrganizationEvents;