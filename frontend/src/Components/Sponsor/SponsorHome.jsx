import LeftNavBar from './LeftNavBar';
import TopNavbar from './TopNavbar';

 const SponsorHome = () => {
    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
                <LeftNavBar/>
                <div id="layoutSidenav_content">
                    <main className="bodyBoxShadow">
                        <h1>its a Body</h1>
                        
                    </main>
                </div>
            </div>
        </div>
    )
}
export default SponsorHome;