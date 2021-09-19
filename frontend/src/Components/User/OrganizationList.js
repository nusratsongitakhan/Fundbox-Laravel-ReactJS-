import React from 'react'
import UserMenuBar from './UserMenuBar';
import TopNavbar from './TopNavBar';
import { useState } from 'react';
import { useAxios } from './useAxios';
import { Link } from 'react-router-dom';

const OrganizationList = ()=>{
    
    const [list, setOrganization] = useState([]);
    const url = 'http://localhost:8000/api/user/organizationList';
    useAxios(url, setOrganization);


    return(

<div className="sb-nav-fixed">
            <TopNavbar url="#!"/>
            <div id="layoutSidenav">
            <div className="row">
            <div className="col-2 mt-1 mb-2">
                <UserMenuBar/>
            </div>
            <div className="col-10 mt-1 mb-2">
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
                         <h4>Organization List</h4>
                        
                     </div>
                     <div className="col-1 mt-1 mb-2">
                         
                         <Link to="/user/home" className="btn btn-primary foat-end">Back</Link>
                     </div>

                     <hr/>
                 </div>
                 <table className="table table-striped">
                     <thead>
                         <tr>
                             <th>User Id</th>
                             <th>Name</th>
                             <th>Phone</th>
                             <th>Address</th>
                             <th>Status</th>
                             <th>Details</th>
                             <th> </th>
                         
                         </tr>
                     </thead>
                         <tbody>

                              {
                                 list.map((organization)=>{
                                 return (
                                 <tr key={organization.id}>
                                     <td>{organization.user_id}</td>
                                     <td>{organization.name}</td>
                                     <td>{organization.phone}</td>
                                     <td>{organization.address}</td>
                                     <td>{organization.status}</td>
                                     <td><Link to={`/user/organizationDetails/${organization.id}`} className="btn btn-primary btn-sm foat-end">Organization Details</Link></td>                  
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


export default OrganizationList;