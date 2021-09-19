import React from 'react'
import UserMenuBar from './UserMenuBar';
import TopNavbar from './TopNavBar';
import { useState } from 'react';
import { useAxios } from './useAxios';
import { Link } from 'react-router-dom';




 const ReportReply = () => {

    const [list, setReplyReport] = useState([]);
    const url = 'http://localhost:8000/api/user/reportReply';
    useAxios(url, setReplyReport);
   
    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
            <div className="row">
            <div className="col-2 mt-1 mb-2">
                <UserMenuBar/>
            </div>
            <div className="col-10 mt-1 mb-2"  >
                <div id="layoutSidenav_content">
                    <main className="bodyBoxShadow">
                    <div>

<div className="app-content content">
<div className="content-overlay"></div>
    <div className="content-wrapper">
        <div className="content-body">



            <section id="widgets-Statistics">

                <div className="row">
                <div className="col-11 mt-1 mb-2">
                        <h4>Replies of your Reports</h4>
                       
                    </div>
                    <div className="col-1 mt-1 mb-2">
                        
                        <Link to="/user/home" className="btn btn-primary foat-end">Back</Link>
                    </div>
                    <hr/>
                </div>
                <table className="table table-striped">
                    <thead>
                             <tr>
                                <th>Event Id</th>
                                <th>Details</th>
                                <th>Reply</th>
                                <th>Date</th>
                                
                            </tr>
                    </thead>
                        <tbody>

                        {
                                 list.map((reply)=>{
                                 return (
                                 <tr key={reply.id}>
                                     <td>{reply.event_id}</td>
                                     <td>{reply.details}</td>
                                     <td>{reply.reply}</td>
                                     <td>{reply.created_at}</td>
                                
                                 </tr> 
                                   );
                                 })
                             }


                        </tbody>
                </table>          
            </section>

        </div>
    </div>
</div>



</div>
                        
                    </main>
                </div>
                </div>
            </div>
            </div>
        </div>
    )
}
export default  ReportReply;