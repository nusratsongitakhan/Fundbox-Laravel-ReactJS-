import React from 'react'
import './Css/UserMenuBar.css';

export default function UserMenuBar () {
     return (
    //     <div>
    //        <div className='userMenu'>
    //         <ul>
    //          <li><button><Link to='/user/organizationList'>Organization List</Link></button></li>  
    //          <li><button><Link to='/user/followedOrganization'>Followed Organization</Link></button></li>  
    //          <li> <button><Link to='/user/categoryList'>CategoryList</Link></button></li>  
    //          <li><button> <Link to='/user/transitionDetails'>TransitionDetails</Link></button></li>  
    //          <li> <button><Link to='/user/reportReply'>Replies of your Reports</Link></button></li>  
    //          <li> <button><Link to='/user/events'>Events</Link></button></li>  
    //          <li><button> <Link to='/user/yourAppliedVolunteerEvents'>YourAppliedVoluteerEvents</Link></button></li>  
    //         </ul>
    //        </div>
    //     </div>

    <div id="layoutSidenav_nav" style={{backgroundColor:'#3C4B64' }}>
    
            
            
                    <nav className="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div className="sb-sidenav-menu">
                        <div className="nav">
                        <div className="col-8 mt-1 mb-2">
                           
                            <a className="nav-link" href="/user/home">
                            <div className="sb-nav-link-icon"><i className="fas fa-tachometer-alt" /></div>
                            <b style={{color:'white'}}>Dashboard</b>
                            </a>
                        </div>

                        <div className="col-8 mt-1 mb-2">
                           
                            <a className="nav-link" href="/user/organizationList">
                           <div className="sb-nav-link-icon"><i className="far fa-handshake" /></div>
                           <b style={{color:'white'}}>Organization List</b> 
                            </a>
                       </div>

                       <div className="col-8 mt-1 mb-2">
                            <a className="nav-link" href="/user/followedOrganization">
                            <div className="sb-nav-link-icon"><i className="fas fa-user-ninja" /></div>
                            <b style={{color:'white'}}>Followed Organization</b> 
                            </a>
                       </div>
                       <div className="col-8 mt-1 mb-2">
                            <a className="nav-link" href="/user/categoryList">
                            <div className="sb-nav-link-icon"><i className="fas fa-hands" /></div>
                            <b style={{color:'white'}}>CategoryList</b> 
                            </a>
                        </div>

                        <div className="col-8 mt-1 mb-2">
                          
                            <a className="nav-link" href="/user/transitionDetails">
                            <div className="sb-nav-link-icon"><i className="fas fa-chart-area" /></div>
                            <b style={{color:'white'}}>Transition Details</b> 
                            </a>
                        </div>

                        <div className="col-8 mt-1 mb-2">
                            <a className="nav-link" href="/user/reportReply">
                            <div className="sb-nav-link-icon"><i className="fas fa-table" /></div>
                            <b style={{color:'white'}}>Replies of your Reports</b>
                            </a>
                       </div>
                        <div className="col-8 mt-1 mb-2">
                            <a className="nav-link" href="/user/events">
                            <div className="sb-nav-link-icon"><i className="fas fa-table" /></div>
                            <b style={{color:'white'}}>Events</b>
                            </a>
                       </div>
                        <div className="col-8 mt-1 mb-2">
                            <a className="nav-link" href="/user/yourAppliedVolunteerEvents">
                            <div className="sb-nav-link-icon"><i className="fas fa-table" /></div>
                            <b style={{color:'white'}}>Your Applied Voluteer Events</b>
                            </a>
                       </div>

                        </div>
                        </div>
                        <div className="col-8 mt-1 mb-2">
                        <div className="sb-sidenav-footer">
                        <div className="small" style={{padding: 36 }}><b>     </b></div>
                        </div>
                        </div>

                        <div className="col-8 mt-1 mb-2">
                        <div className="sb-sidenav-footer">
                        <div className="small" style={{color:'#0000FF' , margin:5 }}><b>Logged in as: User</b></div>
                        
                        </div>
                        </div>

                        <div className="col-8 mt-1 mb-2">
                        <div className="sb-sidenav-footer">
                        <div className="small" style={{padding: 3 }}><b>     </b></div>
                        </div>
                        </div>
                    </nav>
            
        
                
    </div>
     )








}





