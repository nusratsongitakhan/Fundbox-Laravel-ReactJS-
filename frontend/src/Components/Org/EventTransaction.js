import React from 'react'
import axios from 'axios';
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';

import { Link } from 'react-router-dom';
import { useState, useEffect } from 'react';
const EventTransaction = () => {
    const [event, setEvent] = useState([]);
        const mount= async()=>{
        const res = await axios.get('http://localhost:8000/api/eventTransList');
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
                                                    
                                                    <th>Event Name</th>
                                                    <th>User Name</th>
                                                    <th>Amount Paid</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            {
                                            event.map((e) => {
                                                return (
                                                    <tr key={e.id}>
                                            <td>{e.event_name}</td>
                                            
                                            <td>
                                                <b>{e.name}</b>
                                            </td>
                                            <td>
                                                <b>{e.amount}</b>
                                            </td>
                                            <td>
                                                <b>{}</b>
                                            </td>
                                            <td>
                                                {/* <a href="{{route('org.refund',$Req->id)}}" className="btn btn-danger">Refund money</a> */}
                                                            {/* <button  className="btn btn-danger" >Refund Money</button> */}
                                                            <Link to={`refund-money/${e.id}`} className="btn btn-danger btn-sm foat-end" > Refund Money </Link>
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
export default EventTransaction