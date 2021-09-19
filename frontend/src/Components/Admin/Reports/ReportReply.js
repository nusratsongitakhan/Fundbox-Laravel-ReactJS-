import React from 'react'
import axios from 'axios';
import { Link } from 'react-router-dom';
import { useState } from 'react';
import { useParams } from "react-router";
import { useHistory } from "react-router-dom";
import LeftNavBar from '../Layout/LeftNavBar';
import TopNavbar from '../Layout/TopNavbar';

const ReportReply = () => {
    const history = useHistory();
    const [event, setEvent] = useState({
        edit_reply: ''
    });
    const [msg, setMsg] = useState("");
    const { id: id } = useParams();

    const handleInput = (e) => {
        const name = e.target.name;
        const value = e.target.value;
        setEvent({ ...event, [name]: [value] })
        console.log(name,value);
    }
    const updateEvent = async (e) => {
        e.preventDefault();
        const edit_reply = event.edit_reply.toString();
        const res = await axios.post(`http://localhost:8000/api/admin/reports/${id}`, { edit_reply: edit_reply});
        if (res.data.status === 200) {
            console.log(res.data.message);
            setMsg(res.data.message);
            setEvent({ 
                edit_reply: '',
            })
            
             setTimeout(() => { history.push('/admin/reports'); }, 0);
        }else{
            console.log(res.data.message);
            setMsg(res.data.message);
        }
    }
    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
                <LeftNavBar/>
                <div id="layoutSidenav_content">
                    <main>
                        <div className="class-header">
                            <h4>
                            <Link to={'/admin/reports'} className="btn btn-primary btn-sm foat-end"> Back</Link>
                            </h4>
                            <h4> Report Reply</h4>
                        </div>
                        <div className="container" style={{ "marginTop" :"50px"}}>
                            <div className="row">
                                <div className="col-md-12">
                                    <div className="card">
                                        <div className="class-header">
                                            <h4 className="card-title">{msg} </h4>
                                        </div>
                                        <div className="class-body"></div>
                                        <form onSubmit={updateEvent}>
                                            <div className="form-group mb-3">
                                            <label > Message</label>
                                                <fieldset className="form-group">
                                                    <textarea className="form-control" name="edit_reply" id="edit_reply" onChange={handleInput} rows="3" placeholder="Reply" required></textarea>
                                                </fieldset>
                                            </div>

                                            <div className="form-group mb-3"style={{ "marginTop" :"10px"}}>
                                            <button type="submit" className="btn btn-primary">Reply</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    )
}
export default ReportReply