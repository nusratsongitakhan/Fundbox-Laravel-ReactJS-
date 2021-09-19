<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Organization;
use App\Event;
use App\Org_follow;
class OrganizationController extends Controller
{
    public function organizationList(){
        $users = Organization::all();

        // return view('User.OrganizationList')->with('organizationList', $users)
        //                                     ->with('title', 'Organization List');
    

        if($users){
          
            return response()->json([
             'status' => 19,
             'list' => $users,
             'message' => 'No Data Found!'
             
         ]);
 
 
        }
        
    
    }


    public function organizationDetails(Request $req, $id){
        $user = Organization::find($id);

        $follow = Org_follow:: all();

        
        // return view('User.OrganizationDetails')->with('organization', $user)
        //                                        ->with('followedOrganizations', $follow)
        //                                        ->with('title', 'Organization Details');

       
        if( $user){
          
            return response()->json([
             'status' => 19,
             'list' => $user,
             'Org_follow' => $follow,
             'message' => 'No Data Found!'
             
         ]);
 
 
        }
    
    }


    public function organizationEvents($id){
        $users = Event::where('orgId',$id)
                        ->get();

        // return view('User.OrganizationEvents')->with('organizationEvents', $users)
        //                                        ->with('title', 'Organization Events');



        if( $users){
          
            return response()->json([
             'status' => 19,
             'list' => $users,
            
             
         ]);
 
 
        }
       
    
    }

   


    public function organizationFollow(Request $req, $id){



        $organization = Organization::find($id);

        $user_id = 1;
        // $user_id = $req->session()->get('user_id');

        



        $followOrganization = new Org_follow;
       
        $followOrganization->org_id =$id;
        $followOrganization->user_id = $user_id;
        $followOrganization->status = $organization->status;
        $followOrganization->save();

        
        // return redirect()->route('Organization.followedOrganization');

        return response()->json([
            'status' => 19,
            'message' => 'Success! Now You are following the Organiztion!!!'

        ]);

    
    }


    public function followedOrganization(){
        $followedOrganizations = Org_follow::all();

        // return view('User.FollowedOrganization')->with('followedOrganizations', $followedOrganizations)
        //                                        ->with('title', 'Followed Organization');

        
        if($followedOrganizations){
          
            return response()->json([
             'status' => 19,
             'list' => $followedOrganizations
          
             
         ]);
 
 
        }
       
    
    }



    public function unfollowedOrganization($id){
        
        Org_follow::destroy($id);
        // return redirect()->route('Organization.followedOrganization');

          
            return response()->json([
             'status' => 19,
             'msg' => "Unfollowed successfully"
          
             
         ]);
 
 
       
    
    }




    







}
