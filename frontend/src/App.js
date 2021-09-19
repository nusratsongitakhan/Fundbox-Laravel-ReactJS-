import logo from './dummyLogo.png';
import './App.css';
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import OrgHome from './Components/Org/OrgHome';
import CreateEvent from './Components/Org/CreateEvent';
import CreateVolEvent from './Components/Org/CreateVolEvent';
import EventList from './Components/Org/EventList';
import EditEvent from './Components/Org/EditEvent';
import DeleteEvent from './Components/Org/DeleteEvent';

import EventTransaction from './Components/Org/EventTransaction';
import RefundMoney from './Components/Org/RefundMoney';
import SponsorReq from './Components/Org/SponsorReq';
import SponsorList from './Components/Org/SponsorList';
import RenewSpons from './Components/Org/RenewSpons';
import ApproveSponsor from './Components/Org/ApproveSponsor';
import CancelDeal from './Components/Org/CancelDeal';
import RenewDeal from './Components/Org/RenewDeal';

import Category from './Components/Admin/Category';
import DeleteCategory from './Components/Admin/DeleteCategory';
import SpTest from './Components/Sponsor/SpTest';
import SponsorHome from './Components/Sponsor/SponsorHome';

import ListOfAdvertise from './Components/Sponsor/ListOfAdvertise';
import AddAdvertise from './Components/Sponsor/AddAdvertise';
import OngoingEvents from './Components/Sponsor/OngoingEvents';
import SpTransactionList from './Components/Sponsor/SpTransactionList';

import EditCategory from './Components/Admin/EditCategory';
import AdminHome from './Components/Admin/AdminHome';
import CreateAdmin from './Components/Admin/CreateAdmin';
import AdminManage from './Components/Admin/AdminManage';
import AdminDelete from './Components/Admin/AdminDelete';
import AdminEdit from './Components/Admin/AdminEdit';
import PendingSponsorList from './Components/Admin/Sponsor/PendingSponsorList';
import SponsorAccept from './Components/Admin/Sponsor/SponsorAccept';
import SponsorManage from './Components/Admin/Sponsor/SponsorManage';
import SponsorDelete from './Components/Admin/Sponsor/SponsorDelete';
import ReportsList from './Components/Admin/Reports/ReportsList';
import ReportReply from './Components/Admin/Reports/ReportReply';
import TransitionList from './Components/Admin/TransitionList';
import OrgPendingList from './Components/Admin/Organization/OrgPendingList';
import OrgDelete from './Components/Admin/Organization/OrgDelete';
import OrgAccept from './Components/Admin/Organization/OrgAccept';
import OrgManage from './Components/Admin/Organization/OrgManage';
import OrgBlock from './Components/Admin/Organization/OrgBlock';
import OrgCreate from './Components/Admin/Organization/OrgCreate';
import CreateAdminEvent from './Components/Admin/Eevents/CreateAdminEvent';

import HomeDefault from './Components/HomeDefault';
import Login from './Components/Login';
import CreateOrgEvent from './Components/Admin/Eevents/CreateOrgEvent';
import CreateVolunteerEvent from './Components/Admin/Eevents/CreateVolunteerEvent';
import PendingEvents from './Components/Admin/Eevents/PendingEvents';
import SponsorTransaction from './Components/Org/SponsorTransaction';
import Volunteer from './Components/Org/Volunteers';
import ManageAdminEvents from './Components/Admin/Eevents/ManageAdminEvents';
import ManageAcceptedEvents from './Components/Admin/Eevents/ManageAcceptedEvents';
import AdminVisitorList from './Components/Admin/AdminVisitorList';
import Signup from './Components/Signup';
import ManageAdminAccount from './Components/Admin/ManageAdminAccount';


import ReportReply from './Components/User/ReportReply';
import UserHome from './Components/User/UserHome.js';
import Report from './Components/User/Report';
import TransitionDetails from './Components/User/TransitionDetails.js';
import OrganizationList from './Components/User/OrganizationList.js';
import OrganizationDetails from './Components/User/OrganizationDetails';
import OrganizationEvents from './Components/User/OrganizationEvents';
import FollowedOrganization from './Components/User/FollowedOrganization';
import YourAppliedVolunteerEvents from './Components/User/YourAppliedVolunteerEvents';
import CategoryList from './Components/User/CategoryList';
import UserMenuBar from './Components/User/UserMenuBar';
import Events from './Components/User/Events';
import Review from './Components/User/Review';
import OrganizationFollow from './Components/User/OrganizationFollow';

function App() {
  return (
    <>

    
      <Router>
        <Switch>
         
          {/* <Route exact path="/" component={Signin} />
          <Route  path="/signup" component={Signup} /> */}

<Route  path="/index" component={HomeDefault} />
<Route  path="/login" component={Login} />
<Route  path="/signup" component={Signup} />

{/* /////////////////Admin/////////////////////////////// */}

<Route  path="/admin/dashboard" component={AdminHome} />
<Route  path="/admin/category" component={Category} />
<Route  path="/admin/delete-category/:id" component={DeleteCategory} />
<Route  path="/admin/edit-category/:id" component={EditCategory} />

<Route  path="/admin/createAdmin" component={CreateAdmin} />
<Route  path="/admin/manageAdmin" component={AdminManage} />
<Route  path="/admin/adminDelete/:id" component={AdminDelete} />
<Route  path="/admin/adminEdit/:id" component={AdminEdit} />

              {/* Admin Sponsor Start */}
<Route  path="/admin/sponsor" component={PendingSponsorList} />
<Route  path="/admin/sponsorAccept/:id" component={SponsorAccept} />
<Route  path="/admin/sponsorManage" component={SponsorManage} />
<Route  path="/admin/sponsorDelete/:id" component={SponsorDelete} />
              {/* Admin Sponsor END */}

              {/* Admin Reports Start */}
<Route  path="/admin/reports" component={ReportsList} />
<Route  path="/admin/reportsReply/:id" component={ReportReply} />
              {/* Admin Reports END */}

              {/* Admin Organization Start */}
<Route  path="/admin/pendingOrg" component={OrgPendingList} />
<Route  path="/admin/pendingOrgdelete/:id" component={OrgDelete} />
<Route  path="/admin/pendingOrgAccept/:id" component={OrgAccept} />
<Route  path="/admin/orgManage" component={OrgManage} />
<Route  path="/admin/orgManageBlock/:id" component={OrgBlock} />
<Route  path="/admin/orgCreate" component={OrgCreate} />
              {/* Admin Organization END */}

              {/* Admin Event Start */}
<Route  path="/admin/createAdminEvent" component={CreateAdminEvent} />
<Route  path="/admin/createOrgEvent" component={CreateOrgEvent} />
<Route  path="/admin/createVolunteerEvent" component={CreateVolunteerEvent} />
<Route  path="/admin/managePendingEvent" component={PendingEvents} />
<Route  path="/admin/manageAdminEvent" component={ManageAdminEvents} />
<Route  path="/admin/manageAcceptedEvent" component={ManageAcceptedEvents} />
              {/* Admin Event END */}

<Route  path="/admin/transitionList" component={TransitionList} />
<Route  path="/admin/adminVisitorList" component={AdminVisitorList} />

<Route  path="/admin/manageAccount" component={ManageAdminAccount} />

{/* //closeadmin */}

{/* /////////////////ORG/////////////////////////////// */}


          <Route path="/organization" component={OrgHome} />
          
          <Route path="/org/createEvents" component={CreateEvent} />
          
          <Route path="/org/createVolEvent" component={CreateVolEvent} />
          
          <Route path="/org/EventList" component={EventList} />
          
          <Route path="/org/edit-event/:id" component={EditEvent} />
          
          <Route path="/org/delete-event/:id" component={DeleteEvent} />
          
          <Route path="/org/EventTransactionList" component={EventTransaction} />
          
          <Route path="/org/refund-money/:id" component={RefundMoney} />
          
          <Route path="/org/SponsorRequest" component={SponsorReq} />
          
          <Route path="/org/SponsorList" component={SponsorList} />
          
          <Route path="/org/RenewSponsor" component={RenewSpons} />
          
          <Route path="/org/Approve-Sponsor/:id" component={ApproveSponsor} />
          
          <Route path="/org/Cancel-deal/:id" component={CancelDeal} />
          
          <Route path="/org/Renew-Deal/:id" component={RenewDeal} />
          
          <Route path="/org/SponsorTransaction" component={SponsorTransaction} />

           <Route path="/org/VolunteerList" component={Volunteer} />
          
{/* //closeorg */}

{/* /////////////////Sponsor/////////////////////////////// */}
<Route path="/sp/test" component={SpTest} />
<Route path="/sp/dashboard" component={SponsorHome} />
<Route path="/sp/allAdvertiser" component={ListOfAdvertise} />
<Route path="/sp/addAdvertise" component={AddAdvertise} />
<Route path="/sp/OngoingEvents" component={OngoingEvents} />
<Route path="/sp/SpTransactionList" component={SpTransactionList} />





{/* //closesponsor */}

{/* ////////////////////User//////////////////////////// */}

<Route path="/user/home" component={UserHome} />
<Route path="/user/userMenuBar" component={UserMenuBar} />
<Route path="/user/transitionDetails" component={TransitionDetails} />
<Route path="/user/organizationList" component={OrganizationList} />
<Route path="/user/organizationDetails/:id" children={<OrganizationDetails/>}></Route>
<Route path="/user/organizationEvents/:id" children={<OrganizationEvents/>}></Route>
<Route path="/user/organizationFollow/:id" children={<OrganizationFollow/>}></Route>
<Route path="/user/report/:id" children={<Report/>}></Route>
<Route path="/user/report" ></Route>
<Route path="/user/reportReply" children={<ReportReply/>}></Route>
<Route path="/user/review/:id" children={<Review/>}></Route>
<Route path="/user/review"></Route>
<Route path="/user/followedOrganization" children={<FollowedOrganization/>}></Route>
<Route path="/user/yourAppliedVolunteerEvents" children={<YourAppliedVolunteerEvents/>}></Route>
<Route path="/user/categoryList" children={<CategoryList/>}></Route>

<Route path="/user/events" children={<Events/>}></Route>


{/* <Route path="/user/organizationList" component={UserHome} />
<Route path="/user/followedOrganization" component={UserHome} />
<Route path="/user/categoryList" component={UserHome} />

<Route path="/user/reportReply" component={UserHome} />
<Route path="/user/events" component={UserHome} />
<Route path="/user/yourAppliedVolunteerEvents" component={UserHome} /> */}





{/* //closeuser */}






          
        </Switch>
      </Router>
    </>
  );
}

export default App;
