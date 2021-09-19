import React from 'react'
import UserMenuBar from './UserMenuBar';
import TopNavbar from './TopNavBar';
import { useState } from 'react';
import { useAxios } from './useAxios';
import { Link } from 'react-router-dom';

const CategoryList = ()=>{
    
    const [list, setCategory] = useState([]);
    const url = 'http://localhost:8000/api/user/categoryList';
    useAxios(url, setCategory);


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
                         <h4>Category List</h4>
                        
                     </div>
                     <div className="col-1 mt-1 mb-2">
                         
                         <Link to="/user/home" className="btn btn-primary foat-end">Back</Link>
                     </div>

                     <hr/>
                 </div>
                 <table className="table table-striped">
                     <thead>
                         <tr>
                             <th>Id</th>
                             <th>Name</th>
                             <th>Status</th>
                         </tr>
                     </thead>
                         <tbody>

                              {
                                 list.map((category)=>{
                                 return (
                                 <tr key={category.id}>
                                     <td>{category.id}</td>
                                     <td>{category.name}</td>
                                     <td>{category.status}</td>                 
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


export default CategoryList;