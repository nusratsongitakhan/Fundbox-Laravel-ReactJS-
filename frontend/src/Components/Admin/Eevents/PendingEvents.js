import React from 'react'
import axios from 'axios';
import { Link } from "react-router-dom";
import { useState,useEffect} from 'react';
import LeftNavBar from '../Layout/LeftNavBar';
import TopNavbar from '../Layout/TopNavbar';

const PendingEvents = () => {
    let serial = 0;
    const [getEvent, setGetEvent] = useState([]);
    const mount= async()=>{
        const res = await axios.get('http://localhost:8000/api/admin/managePendingEvent');
        console.log(res.data);
        
        if (res.status === 200) {
            setGetEvent(res.data)
        }
    }

    const acceptEvent = async(id)=>{
        const res = await axios.get(`http://localhost:8000/api/admin/managePendingEvent/accept/${id}`);
        mount();
        console.log(res.data.message);
    }

    const deleteEvent = async(id)=>{
        const res = await axios.get(`http://localhost:8000/api/admin/managePendingEvent/delete/${id}`);
        mount();
        console.log(res.data.message);
    }

    
    useEffect(() => {
        mount();    
    }, []);

    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
                <LeftNavBar/>
                <div id="layoutSidenav_content">
                    <main>
                        <div className="col-sm-12 offset-sm-0" style={{ "marginTop" :"0px"}}>
                            <div className="card">
                                <div className="card-header" style={{ "padding" :"5px"}}>
                                    <h4 className="card-title"> Pending Events List</h4>
                                    <div className="small">Waiting for admin approve</div>
                                </div>

                                <div className="class-body">
                                    <table className="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th style={{ "width" :"50%"}}>Name</th>
                                                <th>Others</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        {
                                            getEvent.map((e) => {
                                                return (
                                                    <tr key={e.id} >
                                                        <td>{serial += 1}</td>
                                                        <td>
                                                            <b>{e.event_name}</b><br/>
                                                            <small> <b>details:</b> {e.details} </small> 
                                                        </td>
                                                        <td>
                                                            <small> <b>contact:</b> {e.contact} </small>  <br/>
                                                            <small> <b>Category:</b> {e.eventCategory} </small> <br/>
                                                            <small> <b>Event Type:</b> {e.eventType} </small> <br/>
                                                            <small> <b>Target Money:</b> {e.targetMoney} </small> <br/>
                                                            <small> <b>Target Date:</b> {e.targetDate} </small>
                                                        </td>
                                                        <td>
                                                            <a className="btn btn-success btn-sm foat-end"  onClick={()=> acceptEvent(e.id)}  aria-hidden="true" >Accept</a>
                                                            <a className="btn btn-danger btn-sm foat-end"  onClick={()=> deleteEvent(e.id)}  aria-hidden="true" >Delete</a>
                                                        </td>
                                                    </tr>
                                                );
                                            })
                                        }
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
        
    )
}
export default PendingEvents;