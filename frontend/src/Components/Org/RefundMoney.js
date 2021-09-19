import React from 'react'
import axios from 'axios';
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';

import { useState, useEffect } from 'react';
import { useParams } from "react-router";
import { useHistory } from "react-router-dom";
const RefundMoney = () => {
    const history = useHistory();
    
    const { id: eid } = useParams();
    const Refund = async (e) => {
        const thidClickedFunda = e.currentTarget;
        thidClickedFunda.innerText = "Refunding";
        const res = await axios.post(`http://localhost:8000/api/refund-Money/${eid}`);
        if (res.status ===200) {
        setTimeout(() => { history.push('/org/EventTransactionList'); }, 3000);           }
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
                Are You Sure You Want to Refund The Money 
                <br />
                <br />
                <button className="btn btn-success btn-sm foat-end" onClick={Refund}>Refund</button>
            </div>
                        </div>
                        		</main>
                </div>
            </div>
        </div>
    )
}
export default RefundMoney