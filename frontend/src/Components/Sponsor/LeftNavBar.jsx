import React from 'react'

export default function LeftNavBar() {
    return (
        <div id="layoutSidenav_nav">
                    <nav className="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div className="sb-sidenav-menu">
                        <div className="nav">
                            <div className="sb-sidenav-menu-heading">Core</div>
                            <a className="nav-link" href="/sp/dashboard">
                            <div className="sb-nav-link-icon"><i className="fas fa-tachometer-alt" /></div>
                            Dashboard
                            </a>
                            <div className="sb-sidenav-menu-heading">Interface</div>
                            <a className="nav-link" href="/sp/allAdvertiser">
                            <div className="sb-nav-link-icon"><i className="far fa-handshake" /></div>
                            All Advertise
                            </a>
                            <a className="nav-link" href="/sp/addAdvertise">
                            <div className="sb-nav-link-icon"><i className="fas fa-user-ninja" /></div>
                            Add Advertise
                            </a>
                            <div className="sb-sidenav-menu-heading">Events</div>
                            <a className="nav-link" href="/sp/OngoingEvents">
                            <div className="sb-nav-link-icon"><i className="fas fa-calendar-day"/></div>
                            Ongoing Events
                            </a>
                            <div className="sb-sidenav-menu-heading">Organisation</div>
                            <a className="nav-link" href="#!">
                            <div className="sb-nav-link-icon"><i className="fas fa-people-arrows" /></div>
                            Apply in Organisation
                            </a>
                            <a className="nav-link" href="#!">
                            <div className="sb-nav-link-icon"><i className="fas fa-clipboard-list" /></div>
                            All Sponsored Organisation
                            </a>
                            <a className="nav-link" href="#!">
                            <div className="sb-nav-link-icon"><i className="fas fa-child" /></div>
                            Pending Request
                            </a>
                            <a className="nav-link" href="#!">
                            <div className="sb-nav-link-icon"><i className="fab fa-connectdevelop" /></div>
                            Ongoing Process
                            </a>
                            <div className="sb-sidenav-menu-heading">Account</div>
                            <a className="nav-link" href="#!">
                            <div className="sb-nav-link-icon"><i className="fas fa-address-book" /></div>
                            Manage Account
                            </a>
                            <a className="nav-link" href="SpTransactionList">
                            <div className="sb-nav-link-icon"><i className="fas fa-chart-area" /></div>
                            Transaction List
                            </a>
                        </div>
                        </div>
                        <div className="sb-sidenav-footer">
                        <div className="small">Logged in as:</div>
                        Admin
                        </div>
                    </nav>
                    </div>
    )
}
