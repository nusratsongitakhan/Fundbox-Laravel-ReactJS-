import React from 'react'
import UserMenuBar from './UserMenuBar';
import TopNavbar from './TopNavBar';
import { useState } from 'react';
import { useAxios } from './useAxios';
import { Link } from 'react-router-dom';
import axios from 'axios';

 const FollowedOrganization = () => {

    const [list, setFollowedOrganization] = useState([]);
    const url = 'http://localhost:8000/api/user/followedOrganization';
    useAxios(url, setFollowedOrganization);

    const unfollow = async (e,id) => {
  
        const thidClickedFunda = e.currentTarget;
        thidClickedFunda.innerText = "Processing";
            const response = await axios.delete(`http://localhost:8000/api/user/unfollowedOrganization/${id}`);
            // history.push('http://localhost:8000/api/user/followedOrganization'); 
   
            if (response.data.status === 19){
                thidClickedFunda.closest("tr").remove();
                alert(response.data.msg)
            }
            else{

                alert("Can't Unfollowed")
            }
         }

    return (

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
                         <h4>Followed Organization</h4>
                        
                     </div>
                     <div className="col-1 mt-1 mb-2">
                         
                         <Link to="/user/home" className="btn btn-primary foat-end">Back</Link>
                     </div>
                     <hr/>
                 </div>
                 <table className="table table-striped">
                     <thead>
                         <tr>
                             <th>Organization Id </th>
                             <th>Status</th>
                             <th>  </th>
                         </tr>
                     </thead>
                         <tbody>

                              {
                                 list.map((organization)=>{
                                 return (
                                 <tr key={organization.id}>
                                     <td>{organization.id}</td>
                                     <td>{organization.status}</td>
                                    
                                     <td>
                                         <button type="button" onClick={(e)=>unfollow(e,organization.id)} className="btn btn-primary btn-sm foat-end">Unfollow</button>
                                     </td>
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
export default FollowedOrganization;