import React from 'react'
import axios from 'axios';
import { useParams } from "react-router";
import { useEffect } from 'react';
import { useHistory } from "react-router-dom";
import LeftNavBar from '../Layout/LeftNavBar';
import TopNavbar from '../Layout/TopNavbar';

const OrgBlock = () => {
    const history = useHistory();
    const { id: id } = useParams();
    
    const mount= async()=>{
        const res = await axios.get(`http://localhost:8000/api/admin/manageOrg/block/${id}`);
        console.log(res.data.message);
        if (res.status === 200) {
            setTimeout(() => { history.push('/admin/orgManage'); }, 0);
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
                    </main>
                </div>
            </div>
        </div>
    )
}
export default OrgBlock