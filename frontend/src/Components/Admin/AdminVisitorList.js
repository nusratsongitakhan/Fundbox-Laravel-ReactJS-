import React from 'react'
import axios from 'axios';
import { useState,useEffect} from 'react';
import { useHistory } from "react-router-dom";
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';

const AdminVisitorList = () => {
    const history = useHistory();
    let serial = 0;
    const [event, setEvent] = useState([]);
    const [search, setSearch] = useState("");
    const mount= async()=>{
        const res = await axios.get('http://localhost:8000/api/admin/volunteerList');
        console.log(res.data);
        
        if (res.status === 200) {
            setEvent(res.data)
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
                                    <h4 className="card-title"> All Visitor List </h4>
                                    <input className="col-sm-3 offset-sm-9" type="text"
                                        placeholder="searching"
                                        onChange={e => {setSearch(e.target.value)}}
                                    />
                                </div>
                                <div className="class-body">
                                    <table className="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>UserName</th>
                                                <th>Phone</th>
                                                <th>Others</th>
                                                <th>Events Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        {
                                            event.filter((val) => {
                                                if (search == "" || search === null) {
                                                    return val
                                                }
                                                else if ((val.event_name?val.event_name:'').toLowerCase().includes(search.toLowerCase()) || (val.user_name?val.user_name:'').toLowerCase().includes(search.toLowerCase()))
                                                {
                                                    return val
                                                }
                                            }).map((e) => {
                                                return (
                                                    <tr key={e.id} >
                                                        <td>{serial += 1}</td>
                                                        <td>
                                                            <small> <b>name:</b> {e.user_name} </small> <br/>
                                                            <small> <b>userId:</b> {e.user_id} </small> <br/>
                                                        </td>
                                                        <td>
                                                            <small>{e.phone}</small> <br/>
                                                        </td>
                                                        <td>
                                                            <small> <b>Date:</b> {e.created_at} </small>
                                                        </td>
                                                        <td>
                                                            {e.event_name}
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
export default AdminVisitorList;