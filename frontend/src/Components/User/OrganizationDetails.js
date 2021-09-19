import React from 'react'
import axios from 'axios';
import { useEffect } from "react";
import { useParams } from 'react-router';
import { useState } from 'react';
import { useAxios } from './useAxios';
import { Link } from 'react-router-dom';
import UserMenuBar from './UserMenuBar';
import TopNavbar from './TopNavBar';


const OrganizationDetails = ()=>{
    const { id: eid } = useParams();
    const [organization, setOrganization] = useState([]);
    const [Org_follow, setOrg_follow] = useState([]);
    const url = `http://localhost:8000/api/user/organizationDetails/${eid}`;
    useAxios(url, setOrganization);


    const getData = async ()=>{
        const response = await axios.get(`http://localhost:8000/api/user/organizationDetails/${eid}`); 
        //console.log(response.data);
        if (response.data.status === 19) {
           
            setOrg_follow(response.data.Org_follow);
             
        }
      
    }

    useEffect(()=>{
        getData();
    }, [])


    return(

<div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
            <div className="row">
            <div className="col-2 mt-1 mb-2">
                <UserMenuBar/>
            </div>
            <div className="col-10 mt-1 mb-2">
                <div id="layoutSidenav_content">
                    <main className="bodyBoxShadow">
                    <div>
                    <div>
            <div className="app-content content">
                    <div className="content-overlay"></div>
                    <div className="content-wrapper">
                        <div className="content-body">
                            <section id="widgets-Statistics">
                                <div className="row">
                                <div className="col-11 mt-1 mb-2">
                                    <h4>Organization Details</h4>
                                   
                                </div>
                                <div className="col-1 mt-1 mb-2">
                                    
                                    <Link to="/user/organizationList" className="btn btn-primary foat-end">Back</Link>
                                </div>
                                <hr/>
                                </div>

                                <div className="container">
                                    
                                        <h3 >{organization.name} </h3>
                                   
                                        <img src={"http://localhost:8000"+organization.image} className="mx-auto d-block"  className="img-thumbnail" alt="Organization picture" max-width="800" height="300" /> 
                                        
                                        <div className="col-12">
                                        <label for="inputAddress" className="form-label"><b>About</b></label>
                                        <p>{organization.details}</p>
                                    </div>

                                        {/* <div className="col-12 col text-center"> */}

                                            <Link to={`/user/organizationEvents/${organization.id}`} className="btn btn-primary btn-sm foat-end" >Event List</Link>  
                                            <Link to={`/user/organizationFollow/${organization.id}`} className="btn btn-primary btn-sm foat-end">Follow</Link>  
                            
                                            {/* <a href="/user/organizationEvents/{{$organization['id']}}" class="btn btn-success">Event List</a>

                                            <a href="/user/organizationFollow/{{$organization['id']}}" class="btn btn-success">Follow</a> */}


                                        {/* </div> */}
                                </div> 
                


            

            
                            </section>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="sidenav-overlay"></div>
                <div class="drag-target"></div>

                
  
          
        </div>
                        
                    </main>
                </div>
                </div>
            </div>
            </div>
        </div>




















       
    )
}


export default OrganizationDetails;