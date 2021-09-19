import React from 'react'
import axios from 'axios';
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';

import { Link } from 'react-router-dom';
import { useState, useEffect } from 'react';
import { useParams } from "react-router";
import { useHistory } from "react-router-dom";
const EditEvent = () => {
    const history = useHistory();
    const [event, setEvent] = useState({
        event_name: '',
        details: '',
        contact: '',
        targetDate: ''
    });
    const [msg, setMsg] = useState("");
    const { id: eid } = useParams();
    const [ename, seteName] = useState("");
    const [edetails, seteDetails] = useState("");
    const [econtact, seteContact] = useState("");
    const [edate, seteDate] = useState("");
    const mount= async()=>{
        const res = await axios.get(`http://localhost:8000/api/edit-event/${eid}`);
        console.log(res.data);
        console.log(res.data.event_name);
        seteName(res.data.event_name);
        seteDetails(res.data.details);
        seteContact(res.data.contact);
        seteDate(res.data.targetDate);

        if (res.status === 200) {
            setEvent(res.data)
            
        }
            
    }
     useEffect(() => {
    mount();  
     }, []);
    
    const handleInput = (e) => {
        const name = e.target.name;
        const value = e.target.value;
        setEvent({ ...event, [name]: [value] })
        console.log(name,value);
    }
    const updateEvent = async (e) => {
        e.preventDefault();
        const event_name = event.event_name.toString();
        const details =event.details.toString();
        const contact =event.contact.toString();
        const targetDate = event.targetDate.toString();
        const res = await axios.post(`http://localhost:8000/api/update-event/${eid}`, { event_name: event_name,details: details,contact: contact,targetDate : targetDate});
        if (res.data.status === 200) {
            console.log(res.data.message);
            setMsg(res.data.message);
            setEvent({ event_name: '',
        details: '',
        contact: '',
                targetDate: ''
            })
            
             setTimeout(() => { history.push('/org/EventList'); }, 3000);
        }
    }
    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
                <LeftNavBar/>
                <div id="layoutSidenav_content">
                    <main>
		
        <div>
            <div className="container">
                <div className="row">
                    <div className="col-md-12">
                        <div className="card">
                            <div className="class-header">
                                <h4> Edit Student
                                <Link to={'/org/EventList'} className="btn btn-primary btn-sm foat-end"> Back</Link>
                                </h4>
                                <h4 className="card-title">{msg} </h4>
                            </div>
                            <div className="class-body"></div>
                            <form onSubmit={updateEvent}>
                                <div className="form-group mb-3">
                                <label > Event Name</label>
                                    <input type="text" name="event_name" onChange={handleInput} className="form-control" placeholder={ename} />
                                  
                                </div>
                                <div className="form-group mb-3">
                                <label > Event Details</label>
                                <input type="text" name="details" onChange={handleInput}  className="form-control" placeholder={edetails}/>  
                                  
                                </div>
                                <div className="form-group mb-3">
                                <label > Contact</label>
                                <input type="text" name="contact" onChange={handleInput}  className="form-control"placeholder={econtact} />  
                                  
                                </div>
                                <div className="form-group mb-3">
                                <label > Event End Date</label>
                                <input type="text" name="targetDate" onChange={handleInput}  className="form-control"placeholder={edate} />  
                                  
                                </div>
                                <div className="form-group mb-3">
                                  <button type="submit" className="btn btn-primary">Save Event</button>
                                </div>
                            </form>
                        </div>
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
export default EditEvent