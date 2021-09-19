import UserMenuBar from './UserMenuBar';
import TopNavbar from './TopNavBar';

 const UserHome = () => {
    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
            <div className="row">
            <div className="col-2 mt-1 mb-2">
                <UserMenuBar/>
            </div>
            <div className="col-10 mt-1 mb-2"  style={{backgroundColor: '#0000CD'}} >
                <div id="layoutSidenav_content">
                    <main className="bodyBoxShadow">
                        <h1 style={{margin:230 , padding:50, position:'sticky',color:'white' }} >WelCome to FundBox!</h1>
                        
                    </main>
                </div>
                </div>
            </div>
            </div>
        </div>
    )
}
export default UserHome;