<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 

Route::get('/','User\HomeController@Index');

Route::get('/events','User\HomeController@Events');
Route::get('/Ourteam/Organization','User\HomeController@Organization');
Route::get('/contact','User\HomeController@contact');
Route::get('/FAQ','User\HomeController@FAQ');
Route::get('/about','User\HomeController@about');
Route::get('/category/{id}','User\HomeController@CategoryEvent');

Route::get('/EventDetails/{id}','User\HomeController@EventDetails');

Route::get('/joinOrg','User\HomeController@joinOrg');
Route::post('/joinOrg','User\HomeController@ApplyForOrgAccount');
Route::get('/joinSponsor','User\HomeController@joinSponsor');
Route::post('/joinSponsor','User\HomeController@ApplyForSponsor');
Route::get('/applyForVolunteer/{id}','User\HomeController@applyForVolun');

Route::post('/SignIn','LoginController@Login');
Route::get('/SignIn','LoginController@LoginIndex');
Route::get('/logout','LoginController@logout');
Route::post('/SignUp','LoginController@CreateNewUser');
Route::get('/payDone/{id}','LoginController@PayDone');

// **************************ADMIN*******************************

Route::group(['middleware'=>['sess']] , function(){

    Route::group(['middleware'=>['admin']] , function(){

        Route::get('/admin/dashboard','Admin\HomeController@Index');


        Route::get('/admin/createAdmin', function () {
            return view('Admin.createAdmin')->with('title', 'Create Admin | Admin');
        });
        Route::post('/admin/createAdmin','Admin\UserController@CreateAdmin');
        Route::get('/admin/ManageProfile','Admin\UserController@ManageProfile');
        Route::post('/admin/ManageProfile','Admin\UserController@ManageProfileUpdate');
        Route::post('/admin/ManageProfile/deactivated','Admin\UserController@ManageProfileDeactivated');

        Route::get('/admin/manageAdmin','Admin\UserController@ManageAdmin');
        Route::post('/admin/manageAdmin/updateStatus', 'Admin\UserController@UpdateStatus');
        Route::post('/admin/manageAdmin/updateUserInfo', 'Admin\UserController@UpdateUserInfo');
        Route::post('/admin/manageAdmin/deleteAdmin', 'Admin\UserController@DeleteAdmin');
        Route::post('/admin/manageAdmin/makeSuperAdmin', 'Admin\UserController@MakeSuperAdmin');

        Route::get('/admin/createOrg','Admin\OrganizationController@ShowCreatePage');
        Route::post('/admin/createOrg','Admin\OrganizationController@CreateOrganisation');
        Route::get('/admin/manageOrg','Admin\OrganizationController@ManageOrg');
        Route::post('/admin/manageOrg/updateStatus', 'Admin\OrganizationController@UpdateStatus');
        Route::post('/admin/manageOrg/updateInfo', 'Admin\OrganizationController@UpdateInfo');
        Route::post('/admin/manageOrg/addOrgUser', 'Admin\OrganizationController@AddOrgUser');
        Route::post('/admin/manageOrg/delete', 'Admin\OrganizationController@Delete');
        Route::post('/admin/manageOrg/updateImage', 'Admin\OrganizationController@UpdateImage');
        Route::post('/admin/manageOrg/block', 'Admin\OrganizationController@BlockOrg');
        Route::get('/admin/pendingOrg','Admin\OrganizationController@PendingOrg');
        Route::get('/admin/pendingOrg/accept/{id}','Admin\OrganizationController@PendingOrgAccept');
        Route::get('/admin/pendingOrg/delete/{id}','Admin\OrganizationController@PendingOrgDelete');

        Route::get('/admin/eventCategory','Admin\CategoryController@Index');
        Route::post('/admin/eventCategory','Admin\CategoryController@CreateCategory');
        Route::post('/admin/eventCategory/updateStatus','Admin\CategoryController@UpdateStatus');
        Route::post('/admin/eventCategory/delete','Admin\CategoryController@Delete');
        Route::post('/admin/eventCategory/update','Admin\CategoryController@Update');

        Route::get('/admin/createAdminEvent','Admin\EventController@Index');
        Route::post('/admin/createAdminEvent','Admin\EventController@CreateAdminEvent');
        Route::get('/admin/createOrgEvent','Admin\EventController@EventOrgIndex');
        Route::post('/admin/createOrgEvent','Admin\EventController@CreateOrgEvent');
        Route::get('/admin/createVolunteerEvent','Admin\EventController@VolunteerIndex');
        Route::post('/admin/createVolunteerEvent','Admin\EventController@CreateVolunteerIndex');
        //admin Event
        Route::get('/admin/manageAdminEvent','Admin\EventController@ManageAdminEvent');
        Route::post('/admin/manageAdminEvent/updateStatus','Admin\EventController@ManageAdminEventUpdateStatus');
        Route::post('/admin/manageAdminEvent/delete','Admin\EventController@ManageAdminEventDelete');
        //Pending Event
        Route::get('/admin/managePendingEvent','Admin\EventController@ManagePendingEvent');
        Route::post('/admin/managePendingEvent/accept','Admin\EventController@ManagePendingEventAccept');
        Route::post('/admin/managePendingEvent/delete','Admin\EventController@ManagePendingEventDelete');

        //accepted event
        Route::get('/admin/manageAcceptedEvent','Admin\EventController@ManageAcceptedEvent');
        Route::post('/admin/manageAcceptedEvent/updateStatus','Admin\EventController@ManageAcceptedEventUpdateStatus');
        Route::get('/admin/manageAcceptedEvent/fundResponse/{id}','Admin\EventController@ManageAcceptedEventFundResponse');
        Route::get('/admin/manageAcceptedEvent/volunteerResponse/{id}','Admin\EventController@ManageAcceptedEventVolunteerResponse');

        Route::get('/admin/volunteerList','Admin\EventController@VolunteerList');
        Route::get('/admin/transitionList','Admin\EventController@TransitionList');

        Route::get('/admin/reports','Admin\ReportController@Index');
        Route::post('/admin/reports','Admin\ReportController@AddReply');

        //SponsorAdmin
        Route::get('/admin/sponsor','Admin\SponsorController@Index');
        Route::post('/admin/sponsor/accept','Admin\SponsorController@Accept');
        Route::post('/admin/sponsor/delete','Admin\SponsorController@Delete');

        Route::get('/admin/sponsorManage','Admin\SponsorController@ManageIndex');
        Route::post('/admin/sponsorManage/updateStauts','Admin\SponsorController@ManageUpdateStatus');
        Route::post('/admin/sponsorManage/delete','Admin\SponsorController@ManageDelete');

        Route::get('/admin/sponsorBanner','Admin\SponsorController@BannerIndex');
        Route::post('/admin/sponsorBanner/updateStatus','Admin\SponsorController@BannerIndexStatusUpdate');
        Route::post('/admin/sponsorBanner/accept','Admin\SponsorController@BannerAccept');
        Route::post('/admin/sponsorBanner/delete','Admin\SponsorController@BannerDelete');

        Route::get('/admin/userExport', 'Admin\UsersController@export');
        Route::get('/admin/userCSVExport', 'Admin\UsersController@CSVexport');
        Route::get('/admin/userPDFExport', 'Admin\UsersController@PDFExport');
        Route::get('/admin/eventExvelExport', 'Admin\UsersController@EventExvelExport');
        Route::get('/admin/eventPDFExport', 'Admin\UsersController@EventCSVExport');
        Route::get('/admin/eventCSVExport', 'Admin\UsersController@EventPDFExport');
        


        Route::get('/admin/manageVolEvent', function () {
            return view('Admin.manageVolEvent')->with('title', 'Manage Volunteer Event | Admin');
        });

    });
    // **************************ADMIN END*******************************

    // **************************ORGANISATION*******************************

    Route::group(['middleware'=>['org']] , function(){

            Route::get('/org/dashboard','Org\HomeController@Index');


            Route::get('/org/manageEvent', function () {
                return view('Organization.ManageEvent')
                        ->with('title', 'Manage Event | Organization');
            });

            //*****************CREATE EVENTS******************* */
            Route::get('/org/createEvent', function () {
                return view('Organization.CreateEvent')
                        ->with('title', 'Create Event | Organization');
            });
            Route::Post('/org/createEvent', 'Org\OrganizationHomeController@create');
            //*****************EVENT LIST******************* */
            Route::get('/org/EventList', 'Org\OrganizationHomeController@index')->name('org.eventList');
            //*****************EDIT EVENTS******************* */
            Route::get('/org/edit/{id}/{type}', 'Org\OrganizationHomeController@edit');
            Route::Post('/org/edit/{id}/{type}', 'Org\OrganizationHomeController@update');
            Route::Post('/org/edit/statusUpdate','Org\OrganizationHomeController@updatestatus');
            
            //*****************DELETE EVENTS******************* */
            Route::get('/org/delete/{id}/{type}', 'Org\OrganizationHomeController@delete');
            Route::get('/org/destroy/{id}/{type}', 'Org\OrganizationHomeController@destroy');
            

            //***************** EVENT Transactions******************* */
            Route::get('/org/eventTransaction', 'Org\OrganizationHomeController@eventTransaction')->name('org.transaction');
            //*****************CREATE VOLUNTEER EVENTS******************* */
            Route::get('/org/createVolunteerEvent', function () {
                return view('Organization.CreateVolunteerEvent')
                        ->with('title', 'Create Volunteer Event | Organization');
            });
            //*****************Volunteer List */
             Route::get('/org/volunteerlist', 'Org\OrganizationHomeController@VolunteerList');
            Route::Post('/org/createVolunteerEvent', 'Org\OrganizationHomeController@createVolunteerEvent');
            //*****************EDIT  Volunteer EVENTS******************* */
            Route::get('/org/ManageVolunteerEvent', 'Org\OrganizationHomeController@indexVolunteer')->name('org.volunteereventList');
             Route::post('/org/ManageVolunteerEvent/updateVolEvent', 'Org\OrganizationHomeController@updateVolEvent');


            Route::get('/org/SponsorRequest','Org\OrganizationHomeController@reqsponsor' )->name('org.req');
            Route::get('/org/SponsorRequest/{id}','Org\OrganizationHomeController@approvesponsor' )->name('org.approve');
            Route::get('/org/SponsorList','Org\OrganizationHomeController@sponsorlist' )->name('org.sponsor');
            Route::get('/org/SponsorList/{id}','Org\OrganizationHomeController@cancelDeal' )->name('org.cancedeal');
            Route::get('/org/RenewSponsor','Org\OrganizationHomeController@renewsponsor' )->name('org.renewsponsorlist');
            Route::get('/org/RenewSponsor/{id}','Org\OrganizationHomeController@renew' )->name('org.renew');
            Route::get('/org/SponsorTransaction','Org\OrganizationHomeController@sponsorTransaction' )->name('org.sponsorTransaction');
            Route::get('/org/refund/{id}','Org\OrganizationHomeController@RefundMoney' )->name('org.refund');

            //**************excel */

            Route::get('/org/eventTransactionPDFExport', 'Admin\UsersController@orgTransactionPDFExport')->name('org.transactionspdf');
            Route::get('/org/eventTransactionExcelExport', 'Admin\UsersController@orgTransactionexcelExport')->name('org.transactionsexcel');
    });
});


            // **************************SPONSOR START*******************************
            //Sponsor route start
            Route::group(['prefix' => 'sp','middleware'=>['sponsor']] , function(){

                // Route::post('/allAdvertise','Sponsor\AdvertiseController@CreateAdvertise');
                Route::get('/allAdvertise','Sponsor\AdvertiseController@Show');
                Route::get('/dashboard','Sponsor\AccountController@dashboard');

                Route::get('/addAdvertise', function () {
                    return view('Sponsor.addAdvertise')
                            ->with('title', 'Advertise Add | Sponsor');
                });

                Route::post('/addAdvertise','Sponsor\AdvertiseController@CreateAdd');
                Route::post('/addAdvertise/updateAddInfo', 'Sponsor\AdvertiseController@UpdateAddInfo');
                Route::post('/addAdvertise/updateStatus','Sponsor\AdvertiseController@UpdateStatus');
                Route::post('/addAdvertise/delete','Sponsor\AdvertiseController@AddvetiseDelete');
                Route::post('/manageAccount/delete','Sponsor\AccountController@deleteAccount');
                Route::post('/updateAccount','Sponsor\AccountController@updateAccount');
                Route::get('/manageAccount','Sponsor\AccountController@accountPageShow');
                Route::get('/allTransactionList','Sponsor\AccountController@allTransactionList');//all transaction list
                // Route::get('/orgTransactionList','Sponsor\AccountController@orgTransactionList');//org transaction list
                // Route::get('/eventTransactionList','Sponsor\AccountController@eventTransactionList');//event transaction list
                Route::get('/applyOrg','Sponsor\OrgController@orgList');
                Route::post('/applyInOrg','Sponsor\OrgController@applyInOrg');
                Route::post('/UpdateAppliedInOrg','Sponsor\OrgController@UpdateAppliedInOrg');
                Route::get('/sponsoredOrgList','Sponsor\OrgController@sponsoredOrgList');
                Route::get('/pendingOrgList','Sponsor\OrgController@pendingOrgList');
                Route::get('/ongoingOrgList','Sponsor\OrgController@ongoingOrgList');
            
                // Route::get('/payment', function () {
                //     return view('Sponsor.Payment')
                //             ->with('title', 'Payment | Sponsor');
                // });
                // Route::get('/siteTraffic', function () {
                //     return view('Sponsor.SiteTraffic')
                //             ->with('title', 'Site Traffic | Sponsor');
                // });
                Route::get('/updateSponsorship', function () {
                    return view('Sponsor.UpdateSponsorship')
                            ->with('title', 'Update | Sponsor');
                });
                Route::get('/updateOrgSponsorship', function () {
                    return view('Sponsor.UpdateOrgSponsorship')
                            ->with('title', 'Update | Sponsor');
                });
                Route::get('/allEvents', function () {
                    return view('Sponsor.AllEvents')
                            ->with('title', 'All Events | Sponsor');
                });
                Route::get('/sponsoredEvents', function () {
                    return view('Sponsor.SoponoredEvents')
                            ->with('title', 'Sponsored Events | Sponsor');
                });
    
    
                //Sponsor route end
            });
    
        // **************************SPONSOR END*******************************

    // **************************ORGANISATION END*******************************

    // **************************USER START*******************************

    Route::group(['middleware'=>['user']] , function(){

        // Route::get('/user/dashboard',function(){
        //     return view('User/Home') ->with('title', 'Home User');
        // });
        
        Route::get('/user/registration',function(){
            return view('User/Registration')->with('title', 'Registration');
        });
        
        // Route::get('/user/review',function(){
        //     return view('User/Review')->with('title', 'Review');
        // });
        
        // Route::get('/user/organizationList',function(){
        //     return view('User/OrganizationList')->with('title', 'Organization List');
        // });
        
        // Route::get('/user/report',function(){
        //     return view('User/Report')->with('title', 'Report');
        // });
        
        Route::get('/user/donation',function(){
            return view('User/Donation')->with('title', 'Donation');
        });
        
        // Route::get('/user/transitionDetails',function(){
        //     return view('User/TransitionDetails')->with('title', 'Transition Details');
        // });
        
        
        // Route::get('/user/organizationDetails',function(){
        //     return view('User/OrganizationDetails')->with('title', 'Organization Details');
        // });
        
        // Route::get('/user/categoryList',function(){
        //     return view('User/CategoryList')->with('title', 'Category List');
        // });
        
        // Route::get('/user/events',function(){
        //     return view('User/Events')->with('title', 'Events');
        // });
        
        // Route::get('/user/volunteerEventList',function(){
        //     return view('User/VolunteerEventList')->with('title', 'Volunteer Event List');
        // });
        
        
        // Route::get('/user/applyVolunteerEvent',function(){
        //     return view('User/ApplyVolunteerEvent')->with('title', 'Apply for Volunteer Event');
        // });
        
        Route::get('/user/yourAppliedVolunteerEvents',function(){
            return view('User/YourAppliedVolunteerEvents')->with('title', 'Your Applied Volunteer Events');
        });
        
        
        Route::get('/user/dashboard','User\UserController@dashboard')->name('User.dashboard');                                                                            
        Route::get('/user/organizationList','User\OrganizationController@organizationList')->name('Organization.organizationList');                                                                            
        Route::get('/user/categoryList','User\CategoryController@categoryList')->name('Category.categoryList');                                                                            
        Route::get('/user/volunteerEventList','User\EventController@volunteerEventList')->name('Event.volunteerEventList');                                                                                                                                           
        Route::get('/user/organizationDetails/{id}','User\OrganizationController@organizationDetails')->name('Organization.organizationDetails');                                                                            
        Route::get('/user/organizationEvents/{id}','User\OrganizationController@organizationEvents')->name('Organization.organizationEvents');                                                                            
        Route::get('/user/organizationFollow/{id}','User\OrganizationController@organizationFollow')->name('Organization.organizationFollow');                                                                            
        Route::get('/user/followedOrganization','User\OrganizationController@followedOrganization')->name('Organization.followedOrganization');                                                                            
        Route::get('/user/unfollowedOrganization/{id}','User\OrganizationController@unfollowedOrganization')->name('Organization.unfollowedOrganization');                                                                            
        Route::get('/user/transitionDetails','User\UserController@transitionDetails')->name('User.transitionDetails');  
        Route::get('/user/report/{id}','User\UserController@report')->name('User.report');  
        Route::get('/user/reportReply','User\UserController@reportReply')->name('User.reportReply');  
        Route::post('/user/report','User\UserController@reportPost')->name('User.reportPost');  
        Route::get('/user/events','User\EventController@events')->name('Event.events');  
        Route::post('/user/events/{id}','User\EventController@categoryBasedEvents'); 
        Route::post('/user/search','User\EventController@search'); 
        Route::get('/user/review/{id}','User\UserController@review')->name('User.review');  
        Route::post('/user/review','User\UserController@reviewPost');
        Route::get('/user/applyVolunteerEvent','User\UserController@applyVolunteerEvent')->name('User.applyVolunteerEvent');  
        Route::get('/user/yourAppliedVolunteerEvents','User\EventController@yourAppliedVolunteerEvents')->name('Event.yourAppliedVolunteerEvents');  
        Route::get('/user/cancleVolunteerEvent/{id}','User\EventController@cancleVolunteerEvent')->name('Event.cancleVolunteerEvent');  
        Route::post('/user/CategoryWiseEvent','User\EventController@CategoryWiseEvent')->name('User.CategoryWiseEvent');  
        Route::get('/user/generateInvoice/{id}','User\UserController@generateInvoice')->name('User.generateInvoice');  
        

     ///

     
     Route::get('/user/editProfile','User\UserController@editProfile')->name('User.editProfile');  
     Route::get('/user/editProfile/getData','User\UserController@editProfileGetData')->name('User.editProfileGetData');  
     Route::post('/user/editProfile/storeData','User\UserController@editProfileStoreData')->name('User.editProfileStoreData');  
     Route::post('/user/editProfile/updateData','User\UserController@editProfileUpdateData')->name('User.editProfileUpdateData');  



    });

    // **************************USER END*******************************


// SSLCOMMERZ Start
Route::get('/example1', 'RouteController@exampleEasyCheckout');
Route::get('/example2/{id}/{orgId}/{type}', 'RouteController@exampleHostedCheckout');

Route::post('/pay', 'RouteController@index');
Route::post('/pay-via-ajax', 'RouteController@payViaAjax');
Route::post('/success', 'RouteController@success');
Route::post('/fail', 'RouteController@fail');
Route::post('/cancel', 'RouteController@cancel');
Route::post('/ipn', 'RouteController@ipn');

//SSLCOMMERZ END

Auth::routes();

Route::get('/home', 'User\HomeController@Index')->name('home');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
Route::get('/login','LoginController@LoginIndex');
Route::get('/register','LoginController@LoginIndex');