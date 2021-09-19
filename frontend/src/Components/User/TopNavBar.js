import React from 'react'
import { Link } from 'react-router-dom';

export default function TopNavbar() {
    return (
                <nav className="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                    {/* Navbar Brand*/}
                    <a className="navbar-brand ps-3" href="index.html">Fundbox</a>
                    {/* Sidebar Toggle*/}
                    <button className="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i className="fas fa-bars" /></button>
                    {/* Navbar Search*/}
                    {/* <form className="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                    <div className="input-group">
                        <input className="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        <button className="btn btn-primary" id="btnNavbarSearch" type="button"><i className="fas fa-search" /></button>
                    </div>
                    </form> */}
                    {/* Navbar*/}
                    <ul className="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li>
                            <a className="nav-link "  href="#!" role="button"  aria-expanded="false"><i className="fa fa-cog" /></a>
                        </li>
                        <li>
                        <a className="nav-link "  href="#!" role="button"  aria-expanded="false"><i className="fa fa-cog" /></a>
                        </li>
                        <li>
                          
                        <a className="nav-link "  href="#!" role="button"  aria-expanded="false"><i className="fa fa-cog" />                                     </a>
                    
                        </li>
                        <li>
                          
                        <a className="nav-link "  href="/logout" role="button"  aria-expanded="false"><i className="fa fa-cog" /><b>Logout</b></a>
                    
                        </li>
                    </ul>
                </nav>
    )
}
