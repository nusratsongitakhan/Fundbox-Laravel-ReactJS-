import React from 'react'
import axios from 'axios';
import { Link } from "react-router-dom";
import { useState,useEffect} from 'react';
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';

const Category = () => {
    let serial = 0;
    const [getEvent, setGetEvent] = useState([]);
    const mount= async()=>{
        const res = await axios.get('http://localhost:8000/api/admin/manageAdmin');
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
                        <div className="card-header" style={{ "padding" :"5px"}}>
                            <h4 className="card-title"> Manage Admin </h4>
                        </div>
                        <div className="col-sm-12" style={{ "marginTop" :"20px"}}>
                            <div className="card">
                                <div className="class-body">
                                    <table className="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
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
                                                            <small> <b>Username</b> {e.username} </small> 
                                                        </td>
                                                        <td>
                                                            <small> <b>Email</b> {e.email} </small>  <br/>
                                                            <small> <b>Phone</b> {e.phone} </small> 
                                                        </td>
                                                        <td>{e.status === 1 ? 'Active' : 'Deactive'}</td>
                                                        <td>
                                                            {/* <Link to={`edit-student/${e.id}`} className="btn btn-success btn-sm" >Edit</Link> */}
                                                            <Link to={`adminEdit/${e.id}`} className="btn btn-primary btn-sm foat-end" > Edit </Link><br />
                                                            <Link to={`adminDelete/${e.id}`} className="btn btn-danger btn-sm foat-end"> Delete </Link>
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
export default Category;