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

 const OrganizationFollow = () => {
    const { id: eid } = useParams();
    const history = useHistory();
  
    const getData = async ()=>{
        const response = await axios.get(`http://localhost:8000/api/user/organizationFollow/${eid}`); 
        //console.log(response.data);
        if (response.data.status === 19) {
           
            alert(response.data.message);
            history.push("/user/followedOrganization");
        }
    
        else{
            alert("Something went wrong!");
        }
    
      
    }

    useEffect(()=>{
        getData();
    }, [])



    
        
    
  


    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
            <div className="row">
            <div className="col-2 mt-1 mb-2">
                <UserMenuBar/>
            </div>
            <div className="col-10 mt-1 mb-2" style={{backgroundColor: '#0000CD'}}>
                <div id="layoutSidenav_content">
                    <main className="bodyBoxShadow">
              

                         <h4 style={{color: 'red'}}>Follwed organization page Loading...</h4>


              
                    </main>
                 </div>
                        
 
            </div>
            </div>
            </div>
        </div>
    )
    
 
}
export default OrganizationFollow;