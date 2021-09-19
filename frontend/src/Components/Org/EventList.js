import React from 'react'
import axios from 'axios';
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';
import { Link } from 'react-router-dom';
import { useState, useEffect } from 'react';
import { useHistory } from "react-router-dom";

const EventList = () => {
    const [vol, setVol] = useState(false)
    const [anVol,setAnvol] = useState(false)
    const history = useHistory();
    const [event, setEvent] = useState([]);
    const [search, setSearch] = useState("");
    const [isEvent, setIsEvent] = useState([]);
    const mount= async()=>{
        const res = await axios.get('http://localhost:8000/api/eventList');
        console.log(res.data);
        
        if (res.status === 200) {
            
            setEvent(res.data)
            const newEvent = event.filter((val) => val.eventType === 1)
            
            
        }
            
    }
    // const deleteEvent = (e) => {
    //     console.log("deleted");
    //       setTimeout(() => { history.push('/org/EventList'); }, 1000);
    // }
     useEffect(() => {
    mount();
        
     }, []);
    // const searchEvent = async (e) => {
    //     e.preventDefault();
    //     const res = await axios.get('http://localhost:8000/api/eventList');
    // }

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
                                <h4> Events
                                {/* <Link to={'add-student'} className="btn btn-primary btn-sm foat-end"> Add Student</Link> */}
                                </h4>
                                
                                    <input type="text"
                                        placeholder="searching"
                                        onChange={e => {setSearch(e.target.value)}}
                                    />
                              
                                
                                
                            </div>
                            <div className="class-body">
                                <table className="table table-bordered table-striped">
                                    <thead>
                                                        <tr><button onClick={() => {
                                                            setVol(!vol)
                                                            console.log(vol);
                                                            if (!vol) {
                                                                const newEvent = event.filter((val) => val.eventType === 1)
                                                                console.log(newEvent);
                                                                setEvent(newEvent)
                                                            }
                                                            else {
                                                                mount();
                                                            }
                                                            
                                                        }}>Normal Event</button></tr>
                                                        <tr><button onClick={() => {
                                                            setAnvol(!anVol)
                                                            console.log(anVol);
                                                            if (!anVol) {
                                                                const newEvent = event.filter((val) => val.eventType === 2)
                                                                console.log(newEvent);
                                                                setEvent(newEvent)
                                                            }
                                                            else {
                                                                mount();
                                                            }
                                                            
                                                        }}>Volunteer Event</button></tr>
                                        <tr>
                                            <th>ID</th>
                                            <th>Event Name</th>
                                            <th>Target Money</th>
                                            <th>Event Type</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {
                                            event.filter((val) => {
                                                if (search == "") {
                                                    return val
                                                }
                                                else if (val.event_name.toLowerCase().includes(search.toLowerCase()))
                                                {
                                                    return val
                                                }
                                            }).map((e) => {
                                            return (
                                                <tr key={e.id} >
                                                    <td>{e.id}</td>
                                                    <td>{e.event_name}</td>
                                                    <td>
                                                        {e.eventType === 2 ? 'Volunteer Event' : `${e.targetMoney}$`}
                                                        </td>
                                                    <td>{e.eventType ===1 ? 'Normal Event' : 'Volunteer Event'}</td>
                                                    <td>
                                                        {/* <Link to={`edit-student/${e.id}`} className="btn btn-success btn-sm" >Edit</Link> */}
                                                        <Link to={`edit-event/${e.id}`} className="btn btn-primary btn-sm foat-end">Edit</Link><br />
                                                    </td>
                                                    <td>
                                                        <Link to={`delete-event/${e.id}`} className="btn btn-danger btn-sm foat-end" > Delete </Link>
                                                        {/* <button className="btn btn-danger btn-sm foat-end" onClick={deleteEvent}>Delete</button> */}
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
                </div>
            </div>
        </div>
        	</main>
                </div>
            </div>
        </div>

    )
}
export default EventList;
