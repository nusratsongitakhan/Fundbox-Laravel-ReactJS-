import React from 'react'
import UserMenuBar from './UserMenuBar';
import TopNavbar from './TopNavBar';
import { useState } from 'react';
import { useAxios } from './useAxios';
import { Link } from 'react-router-dom';
import axios from 'axios';
import { useEffect } from "react";


 const YourAppliedVolunteerEvents = () => {
    
    const [list, setAppliedVE] = useState([]);
    const url = 'http://localhost:8000/api/user/yourAppliedVolunteerEvents';
    useAxios(url, setAppliedVE);

    const cancel = async (e,id) => {
  
        const thidClickedFunda = e.currentTarget;
        thidClickedFunda.innerText = "Canceling...";
            const response = await axios.delete(`http://localhost:8000/api/user/cancleVolunteerEvent/${id}`);
            // history.push('http://localhost:8000/api/user/followedOrganization'); 
   
            if (response.data.status === 19){

                console.log(response.data.status);
                thidClickedFunda.closest("tr").remove();

                alert(response.data.message);
            }

            else{

                alert("Can't Cancle");
            }

         }

    return (
        <div>

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
                    <div className="app-content content">
            <div className="content-overlay"></div>
                <div className="content-wrapper">
                    <div className="content-body">



                        <section id="widgets-Statistics">

                            <div className="row">
                                <div className="col-11 mt-1 mb-2">
                                    <h4>Your Applied Volunteer Event List</h4>
                                
                                </div>
                                <div className="col-1 mt-1 mb-2">
                                <Link to="/user/home" className="btn btn-primary foat-end">Back</Link>
                                
                                </div>
                                <hr/>
                            </div>
                            <table className="table table-striped">
                                <thead>
                                <tr>
                                <th>Event Id</th>
                                <th>Event Name</th>
                                <th>Event Details</th>
                                <th>Organization Id</th>
                                <th>Status</th>
                                <th>Date</th> 
                                <th> </th>
                                </tr>
                                </thead>
                                    <tbody>

                                         {
                                            list.map((event)=>{
                                            return (
                                            <tr key={event.id}>
                                                <td>{event.eventId}</td>
                                                <td>{event.event_name}</td>
                                                <td>{event.details}</td>
                                                <td>{event.orgId}</td>
                                                <td>{event.status}</td>
                                                <td>{event.created_at}</td>
                                                <td>
                                                    <button type="button" onClick={(e)=>cancel(e,event.id)} className="btn btn-danger btn-sm foat-end">Cancel Application</button>
                                                </td>
                                            </tr> 
                                              );
                                            })
                                        }


                                    </tbody>
                            </table>          
                        </section>

                    </div>
                </div>
            </div>
                        
                    </main>
                </div>
                </div>
            </div>
            </div>
        </div>

          


           
        </div>
    )
}
export default  YourAppliedVolunteerEvents ;