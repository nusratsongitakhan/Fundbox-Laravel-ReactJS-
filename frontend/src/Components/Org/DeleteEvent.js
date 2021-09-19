import React from 'react'
import axios from 'axios';
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';
import { useParams } from "react-router";
import { useState, useEffect } from 'react';
import { useHistory } from "react-router-dom";
const DeleteEvent = () => {
    const history = useHistory();
    const { id: eid } = useParams();
    const [ename, seteName] = useState("");
         const mount= async()=>{
        const res = await axios.get(`http://localhost:8000/api/edit-event/${eid}`);

        if (res.status === 200) {
        seteName(res.data.event_name);
         
        }
            
    }
    const deleteEvent = async (e) => {
        const thidClickedFunda = e.currentTarget;
        thidClickedFunda.innerText = "Deleting";
        const res = await axios.post(`http://localhost:8000/api/delete-event/${eid}`);
        if (res.data.status ===200) {
            console.log(res.data.message);
            setTimeout(() => { history.push('/org/EventList'); }, 2000);   
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
        <div className="col-sm-6 offset-sm-3">
            <div className="alert alert-danger" role="alert">
                Are You Sure You Want to Delete "{ename}" Event
                <br />
                <br />
                <button className="btn btn-danger btn-sm foat-end" onClick={deleteEvent}>Delete</button>
            </div>
                        </div>
                        		</main>
                </div>
            </div>
        </div>
    )
}
export default DeleteEvent