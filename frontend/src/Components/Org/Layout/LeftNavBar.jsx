import React from 'react'
import TopNavbar from './TopNavbar'
export default function LeftNavBar() {
    return (
        <div>
            <TopNavbar/>
        <div id="layoutSidenav_nav">
            <nav className="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div className="sb-sidenav-menu">
                    <div className="nav">
                        <div className="sb-sidenav-menu-heading">Core</div>
                        <a className="nav-link" href="/organization">
                            <div className="sb-nav-link-icon"><i className="fas fa-tachometer-alt" /></div>
                            Dashboard
                        </a>
                        <div className="sb-sidenav-menu-heading">Events</div>
                        <a className="nav-link" href="/org/createEvents">
                            <div className="sb-nav-link-icon"><i className="far fa-handshake" /></div>
                            Create New Event
                        </a>
                        
                        
                        
                        <div className="sb-sidenav-menu-heading">Volunteer Events</div>
                        <a className="nav-link" href="/org/createVolEvent">
                            <div className="sb-nav-link-icon"><i className="fas fa-user-ninja" /></div>
                            Create Volunteer Event
                            </a>
                            <a className="nav-link" href="/org/VolunteerList">
                            <div className="sb-nav-link-icon"><i className="fas fa-user-ninja" /></div>
                           Volunteer List
                        </a>
                         <div className="sb-sidenav-menu-heading">Manage Events</div>
                            
                            <a className="nav-link" href="/org/EventList">
                            <div className="sb-nav-link-icon"><i className="fas fa-user-ninja" /></div>
                            Event List
                        </a>
                        <a className="nav-link" href="/org/EventTransactionList">
                            <div className="sb-nav-link-icon"><i className="fas fa-hands" /></div>
                        Event Transaction List                        </a>
                        
                         <div className="sb-sidenav-menu-heading">Sponsors</div>
                        
                        <a className="nav-link" href="/org/SponsorRequest">
                            <div className="sb-nav-link-icon"><i className="fas fa-calendar-week"/></div>
                            Sponsor Requests
                            </a>
                            <a className="nav-link" href="/org/SponsorList">
                            <div className="sb-nav-link-icon"><i className="fas fa-calendar-week"/></div>
                            Sponsor List
                            </a>
                            <a className="nav-link" href="/org/RenewSponsor">
                            <div className="sb-nav-link-icon"><i className="fas fa-calendar-week"/></div>
                            Renew Sponsor
                            </a>
                             <a className="nav-link" href="/org/SponsorTransaction">
                            <div className="sb-nav-link-icon"><i className="fas fa-calendar-week"/></div>
                            Sponsor Transaction List
                        </a>
                        
                       

                        

                       
                         
                    </div>
                </div>
                <div className="sb-sidenav-footer">
                    <div className="small">Logged in as:</div>
                    Organization
                </div>
            </nav>
            </div>
            </div>
    )
}
