import React from 'react'
import UserMenuBar from './UserMenuBar';
import TopNavbar from './TopNavBar';
import { useState } from 'react';
import { useAxios } from './useAxios';
import { Link } from 'react-router-dom';
import { useParams } from 'react-router';
import axios from 'axios';
import { useHistory } from "react-router-dom";
import { useEffect } from "react";
 const Report = () => {
    const { id: eid } = useParams();
    const history = useHistory();
    const [report, setReport] = useState({
        event_id: '',
        user_id: 1,
        user_name: 'Songita',
        details: '',
        status : 1
        
    });
    const [msg, setMsg] = useState(" ");
    const change = (e) => {
        const name = e.target.name;
        const value = e.target.value;
        setReport({  ...report,[name]: value})
        console.log(name, value);
        
    }


    const onSubmit = async (e) => {
      
        e.preventDefault();
        
        const event_id = eid;
       
        const user_id =report.user_id.toString();
        const user_name =report.user_name.toString();
        const  details =report.details.toString();
        const status = report.status.toString();

        const sendReports={ event_id: event_id,user_id: user_id,user_name: user_name,details: details,status : status};
        console.log(sendReports);
        // const response = await axios.post("http://localhost:8000/api/user/report", { event_id: event_id,user_id: user_id,user_name: user_name,details: details,status : status});
        
        
        
       
            const response = await axios.post("http://localhost:8000/api/user/report",sendReports );
            console.log(response)
            if(response.data.status === 19){
                alert(response.data.message);
                setReport({ event_id: '',
                user_id: 1,
                user_name: 'Songita',
                details: '',
                status : 1})
                setTimeout(() => { history.push(`/user/report/${eid}`); }, 3000);
                 
            }
            else if (response.data.error === 400) {
                alert(response.data.status);
            }
            else{
                alert("Something went wrong!");

            setReport({  event_id: '',
            user_id: 1,
            user_name: 'Songita',
            details: '',
            status : 1})
            }
        
    
    }


    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
            <div className="row">
            <div className="col-2 mt-1 mb-2">
                <UserMenuBar/>
            </div>
            <div className="col-10 mt-1 mb-2" >
                <div id="layoutSidenav_content">
                    <main className="bodyBoxShadow">
                    <div className="app-content content">
        <div className="content-overlay"></div>
        <div className="content-wrapper">
            <div className="content-body">
                <section id="widgets-Statistics">
                    <div className="row">
                        <div className="col-11 mt-1 mb-2">
                            <h4>Report</h4>
                            
                        </div>

                        <div className="col-1 mt-1 mb-2">
                            <Link to="/user/events" className="btn btn-primary foat-end">Back</Link>  
                        </div>
                        <hr/>
                    </div>

                    <form onSubmit={onSubmit}>

                        {/* @csrf */}


                                <input type="hidden" className="form-control"  name="event_id" value={eid} onChange={change}/>
                        
                            
                            <div className="form-floating">
                                <textarea className="form-control" placeholder="Write details here..." name="details" value={report.details} onChange={change} style={{height: 100}}></textarea>

                            </div>

                            <div className="col-12">
                                <button type="submit" className="btn btn-outline-primary">Done</button>
                            </div>
                    </form>
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
    )
    
 
}
export default Report;