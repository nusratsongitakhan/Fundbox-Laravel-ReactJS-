import React from 'react'

export default function TopNavbar() {
    return (
                <nav className="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                    {/* Navbar Brand*/}
                    <a className="navbar-brand ps-3" href="/admin/dashboard">Fundbox</a>
                    {/* Sidebar Toggle*/}
                    <button className="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i className="fas fa-bars" /></button>
                    {/* Navbar Search*/}
                    <form className="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                    <div className="input-group">
                        
                    </div>
                    </form>
                    {/* Navbar*/}
                    <ul className="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li>
                            <a className="nav-link "  href="#!" role="button"  aria-expanded="false"><i className="fa fa-cog" /></a>
                        </li>
                        <li>
                            <a className="nav-link "  href="#!" role="button"  aria-expanded="false"><i className="fas fa-user fa-fw" /></a>
                        </li>
                        <li>
                            <a className="nav-link "  href="index.html"  aria-hidden="true" ><i className="fa fa-sign-out" /></a>
                        </li>
                    </ul>
                </nav>
    )
}
