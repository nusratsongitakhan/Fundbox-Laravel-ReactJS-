<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event_volunteer;
use App\Event;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function volunteerEventList(){
        $users = Event::where('eventType',2)->get();

        return view('User.VolunteerEventList')->with('volunteerEventList', $users)
                                            ->with('title', 'Volunteer Event List');
       }
    public function events(){
        $events = Event::all();
        $eventCategorys = DB::table('event_categorys')->get();

        // return view('User.Events')->with('Events', $events)
        //                                        ->with('eventCategorys', $eventCategorys)
        //                                       ->with('title', 'Event Categories');


        if( $events){
                  
            return response()->json([
             'status' => 19,
             'events' =>  $events,
             'eventCategorys' => $eventCategorys
            
             
         ]);}

                                  
        }
    public function search(Request $req){
       
        
        $Event=Event::where('event_name','LIKE','%'. $req->eventSearch .'%')
                        ->orWhere('details','LIKE','%'. $req->eventSearch .'%')
                        ->get();

        $eventCategorys = DB::table('event_categorys')->get();


    //  return view('User.Events')->with('Events', $Event)
    //                           ->with('eventCategorys', $eventCategorys)
    //                         ->with('title', 'Event Categories');

    if( $Event){
                  
        return response()->json([
         'status' => 19,
         'events' =>  $Event,
         'eventCategorys' => $eventCategorys
        
         
     ]);}
                                  
        }
    

    public function CategoryWiseEvent(Request $req){
        $events = Event::where('eventCategory',$req->selectedCategory)
                        ->get();
        $eventCategorys = DB::table('event_categorys')->get();

        // return view('User.Events')->with('Events', $events)
        //                                        ->with('eventCategorys', $eventCategorys)
        //                                       ->with('title', 'Event Categories');
        if($events){
                  
            return response()->json([
             'status' => 19,
             'events' =>  $events,
             'eventCategorys' => $eventCategorys
            
             
         ]);}
                                  
        }

        public function yourAppliedVolunteerEvents(Request $req){

        
            //    $user_id = $req->session()->get('user_id');
             $user_id = 1;
        
               $Event = Event::join('event_volunteers', 'event_volunteers.eventId', '=' ,'events.id')
                               ->where('event_volunteers.user_id',$user_id)
                                ->get();
        
              
               
         
                // return view('User/YourAppliedVolunteerEvents')->with('volunteerEvents', $Event)
                //                                              ->with('title', 'Applied Volunteer Events');
               
                                                       
                if($Event){
                  
                    return response()->json([
                     'status' => 19,
                     'list' => $Event,
                     'user_id' => $user_id
                    
                     
                 ]);}
            
            }




            public function cancleVolunteerEvent(Request $req, $id){



        
       
                Event_volunteer::destroy($id);
        
            
                  
                    return response()->json([
                     'status' => 19,
                     'message' => 'Cancel Done!'
                     
                 ]);
        
        
            //     $user_id = $req->session()->get('user_id');
        
            //    $Event = Event::join('event_volunteers', 'event_volunteers.eventId', '=' ,'events.id')
            //                    ->where('event_volunteers.user_id',$user_id)
            //                     ->get();
                
                // return view('User/YourAppliedVolunteerEvents')->with('volunteerEvents', $Event)
                //                                              ->with('title', 'Applied Volunteer Events');
            
            }
        


}