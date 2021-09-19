import React from 'react'
import axios from 'axios';
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';

import { useParams } from "react-router";
import { useState, useEffect } from 'react';
import { useHistory } from "react-router-dom";
const RenewDeal = () => {
    const history = useHistory();
    const { id: eid } = useParams();
    const [ename, seteName] = useState("");

    const renewDeal = async (e) => {
        const thidClickedFunda = e.currentTarget;
        thidClickedFunda.innerText = "Renewing";
        const res = await axios.post(`http://localhost:8000/api/renewDeal/${eid}`);
        if (res.status ===200) {
           
            setTimeout(() => { history.push('/org/RenewSponsor'); }, 2000);   
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
            <div className="alert alert-success" role="alert">
                Are You Sure You Want to Renew the Deal of Sponsor?
                <br />
                <br />
                <button className="btn btn-success btn-sm foat-end" onClick={renewDeal}>Renew</button>
            </div>
        </div>
        		</main>
                </div>
            </div>
        </div>

    )
}
export default RenewDeal