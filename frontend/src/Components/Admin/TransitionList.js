import React from 'react'
import axios from 'axios';
import { useState,useEffect} from 'react';
import { useHistory } from "react-router-dom";
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';

const TransitionList = () => {
    const history = useHistory();
    let serial = 0;
    const [event, setEvent] = useState([]);
    const [search, setSearch] = useState("");
    const mount= async()=>{
        const res = await axios.get('http://localhost:8000/api/admin/transitionList');
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
                                    <h4 className="card-title"> All Transition List </h4>
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
                                                <th>Event Name</th>
                                                <th>UserName</th>
                                                <th>Amount</th>
                                                <th>Others</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        {
                                            event.filter((val) => {
                                                if (search == "" || search === null) {
                                                    return val
                                                }
                                                else if ((val.event_name?val.event_name:'').toLowerCase().includes(search.toLowerCase()) || (val.name?val.name:'').toLowerCase().includes(search.toLowerCase()))
                                                {
                                                    return val
                                                }
                                            }).map((e) => {
                                                return (
                                                    <tr key={e.id} >
                                                        <td>{serial += 1}</td>
                                                        <td>
                                                            {e.event_name} <br/>
                                                        </td>
                                                        <td>
                                                            <small> <b>name:</b> {e.name} </small> <br/>
                                                        </td>
                                                        <td>
                                                            <small>{e.amount} Tk</small> <br/>
                                                        </td>
                                                        <td>
                                                            <small> <b>Visible Type:</b> {e.visibleType === 1 ? 'Show' : 'Hide'} </small> <br/>
                                                            <small> <b>Date:</b> {e.created_at} </small>
                                                        </td>
                                                        <td>
                                                            {/* {e.visibleType === 1 ? 'Show' : 'Hide'} */}
                                                            {(() => {
                                                                if (e.status === 1) {
                                                                return (
                                                                    <div className="btn btn-primary btn-sm foat-end">Active</div>
                                                                )
                                                                } else if (e.status === 5) {
                                                                return (
                                                                    <div className="btn btn-info btn-sm foat-end">Waiting for Refund</div>
                                                                )
                                                                }else if (e.status === 6) {
                                                                    return (
                                                                        <div className="btn btn-success btn-sm foat-end">Refund Done</div>
                                                                    )
                                                                } else if (e.status === 0) {
                                                                    return (
                                                                        <div className="btn btn-danger btn-sm foat-end">Cacel</div>
                                                                    )
                                                                }
                                                            })()}
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
export default TransitionList;