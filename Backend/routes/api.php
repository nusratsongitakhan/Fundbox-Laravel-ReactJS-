<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/////////////////Admin///////////////////////////////

Route::get('/admin/dashboard','Admin\HomeController@Index');

Route::get('/admin/eventCategory','Admin\CategoryController@Index');
Route::post('/admin/eventCategory','Admin\CategoryController@CreateCategory');
Route::post('/admin/eventCategory/updateStatus','Admin\CategoryController@UpdateStatus');
Route::post('/admin/eventCategory/delete','Admin\CategoryController@Delete');
Route::post('/admin/eventCategory/update','Admin\CategoryController@Update');

Route::post('/admin/createAdmin','Admin\UserController@CreateAdmin');
Route::get('/admin/manageAdmin','Admin\UserController@ManageAdmin');
Route::get('/admin/getSingleAdminData/{id}','Admin\UserController@ManageProfile');
Route::post('/admin/manageAdmin/updateStatus', 'Admin\UserController@UpdateStatus');
Route::post('/admin/manageAdmin/updateUserInfo/{id}', 'Admin\UserController@UpdateUserInfo');
Route::post('/admin/manageAdmin/deleteAdmin', 'Admin\UserController@DeleteAdmin');
Route::post('/admin/manageAdmin/makeSuperAdmin', 'Admin\UserController@MakeSuperAdmin');
//SponsorAdmin
Route::get('/admin/sponsor','Admin\SponsorController@Index');
Route::get('/admin/sponsor/accept/{id}','Admin\SponsorController@Accept');
Route::get('/admin/sponsorManage','Admin\SponsorController@ManageIndex');
Route::get('/admin/sponsor/delete/{id}','Admin\SponsorController@Delete');

Route::get('/admin/reports','Admin\ReportController@Index');
Route::post('/admin/reports/{id}','Admin\ReportController@AddReply');

Route::get('/admin/transitionList','Admin\EventController@TransitionList');
Route::get('/admin/volunteerList','Admin\EventController@VolunteerList');

Route::get('/admin/pendingOrg','Admin\OrganizationController@PendingOrg');
Route::get('/admin/pendingOrg/accept/{id}','Admin\OrganizationController@PendingOrgAccept');
Route::get('/admin/pendingOrg/delete/{id}','Admin\OrganizationController@PendingOrgDelete');
Route::get('/admin/manageOrg','Admin\OrganizationController@ManageOrg');
Route::get('/admin/manageOrg/block/{id}', 'Admin\OrganizationController@BlockOrg');
Route::post('/admin/createOrg','Admin\OrganizationController@CreateOrganisation');
//event admin
Route::post('/admin/createAdminEvent','Admin\EventController@CreateAdminEvent');
Route::post('/admin/createOrgEvent','Admin\EventController@CreateOrgEvent');
Route::get('/admin/getAllOrg','Admin\EventController@EventOrgIndex');
Route::post('/admin/createOrgEvent','Admin\EventController@CreateOrgEvent');
Route::post('/admin/createVolunteerEvent','Admin\EventController@CreateVolunteerIndex');
Route::get('/admin/managePendingEvent','Admin\EventController@ManagePendingEvent');
Route::get('/admin/managePendingEvent/accept/{id}','Admin\EventController@ManagePendingEventAccept');
Route::get('/admin/managePendingEvent/delete/{id}','Admin\EventController@ManagePendingEventDelete');
Route::get('/admin/manageAcceptedEvent','Admin\EventController@ManageAcceptedEvent');
Route::get('/admin/manageAcceptedEvent/delete/{id}','Admin\EventController@ManageAcceptedEventUpdateStatus');
Route::get('/admin/manageAdminEvent','Admin\EventController@ManageAdminEvent');
Route::get('/admin/manageAdminEvent/delete/{id}','Admin\EventController@ManageAdminEventDelete');

//getCategory
Route::get('/admin/eventCategory','Admin\CategoryController@Index');
Route::post('/admin/eventCategory','Admin\CategoryController@CreateCategory');
Route::post('/admin/eventCategory/updateStatus','Admin\CategoryController@UpdateStatus');
Route::post('/admin/eventCategory/delete','Admin\CategoryController@Delete');
Route::post('/admin/eventCategory/update/{id}','Admin\CategoryController@Update');
Route::get('/admin/eventCategory/singleCategory/{id}','Admin\CategoryController@SingleCategory');

Route::post('/admin/ManageProfile/{id}','Admin\UserController@ManageProfileUpdate');

Route::post('/login','LoginController@Login');
Route::post('/SignUp','LoginController@CreateNewUser');


//closeadmin

/////////////////ORG///////////////////////////////

Route::post('/addevent','Org\OrganizationHomeController@create');
Route::post('/addVolevent','Org\OrganizationHomeController@createVolunteerEvent');
Route::get('/eventList','Org\OrganizationHomeController@showEvents');
Route::get('/edit-event/{id}','Org\OrganizationHomeController@eventData');
Route::post('/update-event/{id}','Org\OrganizationHomeController@updateEvent');
Route::post('/delete-event/{id}','Org\OrganizationHomeController@deleteEvent');
Route::get('/eventTransList','Org\OrganizationHomeController@eTransaction');
Route::post('/refund-Money/{id}','Org\OrganizationHomeController@refundEvent');
Route::get('/sponsorRequest','Org\OrganizationHomeController@sponreq');
Route::get('/sponsorList','Org\OrganizationHomeController@sponList');
Route::get('/RenewSponsor','Org\OrganizationHomeController@RenSpon');
Route::post('/approvesponsor/{id}','Org\OrganizationHomeController@approvespon');
Route::post('/cancelsponsor/{id}','Org\OrganizationHomeController@cancelspon');
Route::post('/renewDeal/{id}','Org\OrganizationHomeController@renewDeal');
Route::get('/sponsorTransaction','Org\OrganizationHomeController@sponTransaction');
Route::get('/VolunteerList','Org\OrganizationHomeController@VolList');

//closeorg

/////////////////Sponsor///////////////////////////////

Route::get('/sp/allAdvertiser','Sponsor\AdvertiseController@Show');
Route::get('/sp/OngoingEvents','Sponsor\AdvertiseController@OngoingEvents');
Route::post('sp/addAdvertise','Sponsor\AdvertiseController@CreateAdd');
Route::get('/sp/SpTransactionList','Sponsor\AccountController@allTransactionList');




//closesponsor

////////////////////User////////////////////////////

Route::get('/user/transitionDetails','User\UserController@transitionDetails'); 
Route::get('/user/organizationList','User\OrganizationController@organizationList'); 
Route::get('/user/organizationDetails/{id}','User\OrganizationController@organizationDetails');
Route::get('/user/organizationFollow/{id}','User\OrganizationController@organizationFollow')->name('Organization.organizationFollow');  
Route::get('/user/followedOrganization','User\OrganizationController@followedOrganization')->name('Organization.followedOrganization'); 
Route::delete('/user/unfollowedOrganization/{id}','User\OrganizationController@unfollowedOrganization');
Route::get('/user/yourAppliedVolunteerEvents','User\EventController@yourAppliedVolunteerEvents');
Route::delete('/user/cancleVolunteerEvent/{id}','User\EventController@cancleVolunteerEvent');
Route::get('/user/categoryList','User\CategoryController@categoryList');
Route::get('/user/organizationEvents/{id}','User\OrganizationController@organizationEvents');
Route::get('/user/report/{id}','User\UserController@report')->name('User.report');
Route::post('/user/report','User\UserController@reportPost')->name('User.reportPost');  
Route::get('/user/reportReply','User\UserController@reportReply');
Route::get('/user/events','User\EventController@events')->name('Event.events');
Route::post('/user/search','User\EventController@search'); 
Route::post('/user/CategoryWiseEvent','User\EventController@CategoryWiseEvent')->name('User.CategoryWiseEvent');   
Route::get('/user/review/{id}','User\UserController@review')->name('User.review');  
Route::post('/user/review','User\UserController@reviewPost');

//closeuser