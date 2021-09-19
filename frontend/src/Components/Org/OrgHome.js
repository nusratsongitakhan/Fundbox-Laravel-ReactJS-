import React from 'react'
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';

import { Link } from 'react-router-dom';
 const OrgHome = () => {
     return (
        
<div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
                <LeftNavBar/>
                <div id="layoutSidenav_content">
                    <main>
		
        <div className="col-sm-6 offset-sm-3">
            <p><Link to={'/org/createEvents'} className="btn btn-primary btn-sm foat-end"> Create New Event</Link><br /> </p>

           <p><Link to={'/org/createVolEvent'} className="btn btn-primary btn-sm foat-end"> Create New Volunteer  Event</Link><br /> </p>

            <p><Link to={'/org/EventList'} className="btn btn-primary btn-sm foat-end"> Event List</Link><br /> </p>

            <p><Link to={'/org/EventTransactionList'} className="btn btn-primary btn-sm foat-end"> Event Transaction List</Link><br /> </p>
            <p><Link to={'/org/SponsorRequest'} className="btn btn-primary btn-sm foat-end"> Sponsor Request List</Link><br /> </p>
            <p><Link to={'/org/SponsorList'} className="btn btn-primary btn-sm foat-end"> Sponsor  List</Link><br /> </p>
            <p><Link to={'/org/RenewSponsor'} className="btn btn-primary btn-sm foat-end"> Renew Sponsor </Link><br /> </p>
            <p><Link to={'/org/SponsorTransaction'} className="btn btn-primary btn-sm foat-end"> Sponsor Transaction List </Link><br /> </p>
            <p><Link to={'/org/VolunteerList'} className="btn btn-primary btn-sm foat-end"> Volunteer List </Link><br /> </p>
                         </div>
                   </main>
                </div>
            </div>
        </div>

    )
}
export default OrgHome;