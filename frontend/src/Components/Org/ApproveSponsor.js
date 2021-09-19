import React from 'react'
import axios from 'axios';
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';

import { useParams } from "react-router";
import { useState, useEffect } from 'react';
import { useHistory } from "react-router-dom";
const ApproveSponsor = () => {
    const history = useHistory();
    const { id: eid } = useParams();
    const [ename, seteName] = useState("");

    const approveSponsor = async (e) => {
        const thidClickedFunda = e.currentTarget;
        thidClickedFunda.innerText = "Approving";
        const res = await axios.post(`http://localhost:8000/api/approvesponsor/${eid}`);
        if (res.status ===200) {
           
            setTimeout(() => { history.push('/org/SponsorRequest'); }, 2000);   
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
            <div className="alert alert-danger" role="alert">
                Are You Sure You Want to Approve the Sponsor?
                <br />
                <br />
                <button className="btn btn-danger btn-sm foat-end" onClick={approveSponsor}>Approve</button>
            </div>
                        </div>
                        
		</main>
                </div>
            </div>
        </div>

    )
}
export default ApproveSponsor