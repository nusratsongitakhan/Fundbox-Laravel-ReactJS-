import React from 'react'
import axios from 'axios';
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';
import { useState } from 'react';
import { useHistory } from "react-router-dom";
const CreateVolEvent = () => {
    const history = useHistory();
    const [event, setEvent] = useState({
        event_name: '',
        details: '',
        contact: '',
        venue : '',
        targetDate: ''
    });
    const [msg, setMsg] = useState(" ");
    const handleInput = (e) => {
         const name = e.target.name;
        const value = e.target.value;
        setEvent({  ...event,[name]: [value]})
        console.log(name, value);
    }
    const addEvent = async (e) => {
        e.preventDefault();
        const event_name = event.event_name.toString();
        const details =event.details.toString();
        const contact =event.contact.toString();
        const venue  =event.venue.toString();
        const targetDate = event.targetDate.toString();
        const res = await axios.post('http://localhost:8000/api/addVolevent', { event_name: event_name,details: details,contact: contact,venue : venue,targetDate : targetDate});
        if (res.data.status === 200) {
            console.log(res.data.message);
            setMsg(res.data.message);
            setEvent({ event_name: '',
        details: '',
        contact: '',
        venue : '',
        targetDate: '' })
            setTimeout(() => { history.push('/org/EventList'); }, 3000);
            // 
        }
        else if (res.data.status === 240) {
            setMsg(res.data.message);
            setEvent({ event_name: '',
        details: '',
        contact: '',
        venue : '',
        targetDate: '' })
        }
        else {
            setMsg(res.data.message);
            setEvent({  event_name: '',
        details: '',
        contact: '',
        venue : '',
        targetDate: '' })
        }
    }
    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
                <LeftNavBar/>
                <div id="layoutSidenav_content">
                    <main>
       <div className="col-sm-6 offset-sm-3">
           <div className="card">
            <div className="card-header">
                    <h4 className="card-title">Create New Volunteer Event </h4>
                    <h4 className="card-title">{msg} </h4>
               </div>
                <div className="card-content">
                <div className="card-body">  
            <form onSubmit={addEvent} >
                                       
                                        <div className="row">
                                            <div className="col-12 col-sm-12 col-lg-12">
                                                 <label >Event Name</label>
                                                <input type="text" className="form-control" name="event_name"  onChange={handleInput} required/>
                                            </div>
                                            
                                          <div className="col-12 col-sm-12 col-lg-6 mb-1" style={{ "marginTop" :"10px"}}>
                                                <fieldset className="form-group position-relative has-icon-left">
                                                    <label >End Date</label>
                                                    <input type="datetime-local" name="targetDate"  className="form-control" id="#" placeholder="End Date" autoComplete="off" onChange={handleInput} required/>
                                                </fieldset>
                                            </div>
                                            <div className="col-12 col-sm-12 col-lg-12" >
                                            <label >Contact</label>
                                                <input type="text" className="form-control" name="contact"  onChange={handleInput} required/>
                                            </div>
                                            <div className="col-12 col-sm-12" style={{ "marginTop" :"10px"}}>
                                                <fieldset className="form-group">
                                                    <label >Details</label>
                                                    <textarea className="form-control" name="details" id="basicTextarea" rows="3"  onChange={handleInput} required />
                                                </fieldset>
                                            </div>
                                            {/* <div className="col-12 col-sm-12"style={{ "marginTop" :"10px"}}>
                                                <fieldset className="form-group">
                                                    <div className="custom-file">
                                                        <input type="file" className="custom-file-input" id="inputGroupFile02" name="event_image"/>
                                                        <label className="custom-file-label" for="inputGroupFile02">Choose Event image</label>
                                                    </div>
                                                </fieldset>
                                            </div> */}
                                             <div className="col-12 col-sm-6" style={{ "marginTop" :"10px"}}>
                                                <fieldset className="form-group">
                                                    <label >Venue</label>
                                                    <input type="text" className="form-control" name="venue"  onChange={handleInput} required/>
                                                </fieldset>
                                            </div>
                                            
                                            
                                            <div className="col-12 col-sm-12" style={{ "marginTop" :"10px"}}>
                                                <button type="submit" className="btn btn-block btn-success glow">Add</button>
                                            </div>
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
export default CreateVolEvent;