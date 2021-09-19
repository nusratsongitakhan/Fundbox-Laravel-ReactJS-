import React from 'react'
import { Link } from 'react-router-dom';
import Transition from './Transition';
import { useState } from 'react';
import { useAxios } from './useAxios';
import UserMenuBar from './UserMenuBar';
import TopNavbar from './TopNavBar';

const TransitionDetails = ()=>{
    
    const [list, setTransition] = useState([]);
    const url = 'http://localhost:8000/api/user/transitionDetails';
    useAxios(url, setTransition);


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
                        <h4>Transition Details</h4>
                       
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
                            <th>Amount</th>
                            <th>Visible Type</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th> </th>
                        
                        </tr>
                    </thead>
                        <tbody>

                             {
                                list.map((transition)=>{
                                    return <Transition key={transition.eventId} {...transition} />
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


export default TransitionDetails;