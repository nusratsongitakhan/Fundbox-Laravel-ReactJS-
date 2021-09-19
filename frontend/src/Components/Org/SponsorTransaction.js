import React from 'react'
import axios from 'axios';
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';
import { Link } from 'react-router-dom';
import { useState, useEffect } from 'react';
const SponsorTransaction = () => {
    const [event, setEvent] = useState([]);
        const mount= async()=>{
        const res = await axios.get('http://localhost:8000/api/sponsorTransaction');
        console.log(res.data);
        
        if (res.status === 200) {
            setEvent(res.data)
             
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
                          <div className="restaurant-list-table">
                        <div className="card">
                            <div className="card-content">
                                <div className="card-body">
                                  
                                    <div className="table-responsive">
                                        <table id="seven-item-datatable" className="table">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Id</th>
                                                    <th>Sponsor Name</th>
                                                    <th>Amount Paid</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            {
                                            event.map((e) => {
                                                return (
                                                    <tr key={e.id}>
                                            <td>{e.id}</td>
                                            
                                            <td>
                                                <b>{e.name}</b>
                                            </td>
                                            <td>
                                                <b>{e.amount}</b>
                                            </td>
                                            <td>
                                                <b>{}</b>
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
export default SponsorTransaction
