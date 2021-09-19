import React from 'react'
import axios from 'axios';
import { Link } from "react-router-dom";
import { useState,useEffect} from 'react';
import LeftNavBar from '../Layout/LeftNavBar';
import TopNavbar from '../Layout/TopNavbar';

const SponsorManage = () => {
    let serial = 0;
    const [getEvent, setGetEvent] = useState([]);
    const mount= async()=>{
        const res = await axios.get('http://localhost:8000/api/admin/sponsorManage');
        console.log(res.data);
        
        if (res.status === 200) {
            setGetEvent(res.data)
        }
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
                                    <h4>
                                    <Link to={'/admin/dashboard'} className="btn btn-primary btn-sm foat-end"> Back</Link>
                                    </h4>
                                
                                    <h4 className="card-title"> Manage Sponsor </h4>
                                </div>
                                <div className="class-body">
                                    <table className="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Others</th>
                                                <th>Details</th>
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
                                                            {e.spoName} <br/>
                                                            <small> <b>User name:</b> {e.name} </small> <br/>
                                                            <small> <b>username:</b> {e.username} </small> 
                                                        </td>
                                                        <td>
                                                            <small> <b>Email:</b> {e.email} </small>  <br/>
                                                            <small> <b>Phone:</b> {e.phone} </small> <br/>
                                                            <small> <b>Amount:</b> {e.amount} </small> <br/>
                                                            <small> <b>Start:</b> {e.startDate} </small> <br/>
                                                            <small> <b>End:</b> {e.endDate} </small>
                                                        </td>
                                                        <td>{e.details}</td>
                                                        <td>
                                                            <Link to={`sponsorDelete/${e.id}`} className="btn btn-danger btn-sm foat-end" > Delete </Link>
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
export default SponsorManage;