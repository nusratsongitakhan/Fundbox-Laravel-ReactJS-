import React from 'react'
import axios from 'axios';
import { Link } from "react-router-dom";
import { useState, useEffect } from 'react';
import { useHistory } from "react-router-dom";
import LeftNavBar from '../Layout/LeftNavBar';
import TopNavbar from '../Layout/TopNavbar';

const CreateVolunteerEvent = () => {
    const history = useHistory();
    const [event, setEvent] = useState({
        event_name: '',
        event_details: '',
        event_category: '1',
        event_vanue: '',
        date: '',
        event_phone : '',
        status: '1'
    });

    const [selectedFile, setSelectedFile] = useState([]);

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
        const event_details =event.event_details.toString();
        const event_category =event.event_category.toString();
        const event_vanue =event.event_vanue.toString();
        const date =event.date.toString();
        const event_phone = event.event_phone.toString();
        const status = event.status.toString();
        // const image = selectedFile;
        const res = await axios.post('http://localhost:8000/api/admin/createVolunteerEvent', 
        { 
            event_name: event_name,event_details: event_details,event_category: event_category,event_vanue: event_vanue,date : date,event_phone : event_phone,status:status
        },{
            headers: { 
                'Content-Type': 'application/json;charset=UTF-8',
                "Access-Control-Allow-Origin": "http://localhost:3000",
                "Acces-Control-Allow-Methods": "GET, POST, PATCH, DELETE",
                "Access-Control-Allow-Headers": "Origin, X-Requested-With, Content-Type,Accept, Authortization",
                "Accept": "application/json"
            }
        });
        if (res.data.status === 200) {
            console.log(res.data.message);
            setMsg(res.data.message);
            setEvent({ 
                event_name: '',
                event_details: '',
                event_category: '',
                event_vanue: '',
                date: '',
                event_phone : '',
                status: '1'
            })
            setTimeout(() => { history.push('/admin/dashboard'); }, 500);
            // 
        }
        else if (res.data.status === 240) {
            setMsg(res.data.message);
            setEvent({ event_name: '',
            event_details: '',
            event_category: '',
            event_vanue: '',
            date: '',
            event_phone : '',
            status: '1'
                })
        }
        else {
            setMsg(res.data.message);
            setEvent({event_name: '',
            event_details: '',
            event_category: '',
            event_vanue: '',
            date: '',
            event_phone : '',
            status: '1'})
        }
    
    }

    const [getCategory, setGetCategory] = useState([]);

    const getCategoryList= async()=>{
        const res = await axios.get(`http://localhost:8000/api/admin/eventCategory`);
        console.log(res.data);
        if (res.status === 200) {
            setGetCategory(res.data)
        }
            
    }

    useEffect(() => {
        getCategoryList();  
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
                                <div className="card-header">
                                    <h4 className="card-title">Create Volunteer Event </h4>
                                </div>
                                <div className="card-content">
                                    <div className="card-body">  
                                        <form onSubmit={addEvent} >
                                            <div className="row">
                                                <div className="col-12 col-sm-12 col-lg-12">
                                                    <input type="text" className="form-control" name="event_name" placeholder="Event Name" onChange={handleInput} required/>
                                                </div>
                                                
                                                <div className="col-12 col-sm-12 col-lg-6 mb-1" style={{ "marginTop" :"10px"}}>
                                                    <fieldset className="form-group position-relative has-icon-left">
                                                        <label >End Date</label>
                                                        <input type="datetime-local" name="date"  className="form-control" id="#" placeholder="End Date" autoComplete="off" onChange={handleInput} required/>
                                                    </fieldset>
                                                </div>
                                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                                    <label >Event vanue</label>
                                                    <input type="text" className="form-control" name="event_vanue" placeholder="Event vanue" onChange={handleInput} required/>
                                                </div>
                                                <div className="col-12 col-sm-12 col-lg-12" >
                                                <label >  </label>
                                                    <input type="text" className="form-control" name="event_phone" placeholder="Contact" onChange={handleInput} required/>
                                                </div>
                                                <div className="col-12 col-sm-12" style={{ "marginTop" :"10px"}}>
                                                    <fieldset className="form-group">
                                                        <textarea className="form-control" name="event_details" id="basicTextarea" rows="3" placeholder="Event details" onChange={handleInput} required />
                                                    </fieldset>
                                                </div>

                                                {/* <div className="col-12 col-sm-12" style={{ "marginTop" :"10px"}}>
                                                    <fieldset className="form-group">
                                                        <div className="custom-file">
                                                            <input type="file" className="custom-file-input" onChange={(e)=>setSelectedFile(e.target.files[0])} name="image" />
                                                            <label className="custom-file-label" htmlFor="inputGroupFile02">Choose Event image</label>
                                                        </div>
                                                    </fieldset>
                                                </div> */}
                                                
                                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                                    <label>Category</label>
                                                    <fieldset className="form-group">
                                                        <select name="event_category" className="form-control" onChange={handleInput} required>
                                                            {
                                                                getCategory.map((e) => {
                                                                    return (
                                                                    <option value={e.id}>{e.name}</option>
                                                                    )
                                                                })
                                                            }
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                
                                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                                    <label>Status</label>
                                                    <fieldset className="form-group">
                                                        <select name="status" className="form-control" onChange={handleInput} required>
                                                            <option disabled>Select Status</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Deactivate</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                
                                                
                                                <div className="col-12 col-sm-12" style={{ "marginTop" :"10px"}}>
                                                    <button type="submit" className="btn btn-block btn-success glow">Add</button>
                                                </div>

                                                <h4 className="card-title" style={{ "marginTop" :"10px"}}>{msg} </h4>
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
export default CreateVolunteerEvent;