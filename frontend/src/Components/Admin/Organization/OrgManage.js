import React from 'react'
import axios from 'axios';
import { Link } from "react-router-dom";
import { useState,useEffect} from 'react';
import LeftNavBar from '../Layout/LeftNavBar';
import TopNavbar from '../Layout/TopNavbar';

const OrgManage = () => {
    let serial = 0;
    const [getEvent, setGetEvent] = useState([]);
    const mount= async()=>{
        const res = await axios.get('http://localhost:8000/api/admin/manageOrg');
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
                                    <h4 className="card-title"> Manage Sponsor List </h4>
                            </div>

                                <div className="class-body">
                                    <table className="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Info</th>
                                                <th>Status</th>
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
                                                            {e.name} <br/>
                                                            <small> <b>UserId:</b> {e.user_id} </small>
                                                        </td>
                                                        <td>
                                                            <small> <b>Phone:</b> {e.phone} </small>  <br/>
                                                            <small> <b>Phone:</b> {e.address} </small> <br/>
                                                        </td>
                                                        <td>{e.status === 1 ? 'Active' : 'Deactive'}</td>
                                                        <td>
                                                            <Link to={`pendingOrgdelete/${e.id}`} className="btn btn-danger btn-sm foat-end" > Delete </Link>
                                                            <Link to={`orgManageBlock/${e.id}`} className="btn btn-danger btn-sm foat-end" style={{ "marginLeft" :"10px"}}> Block </Link>
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
export default OrgManage;