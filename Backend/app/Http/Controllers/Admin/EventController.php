<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function Index(Request $request){

        $allCategory = DB::table('event_categorys')
        ->where('status', 1)
        ->get();

        return view('Admin.adminEvent')
        ->with('title', 'Create Admin Event | Admin')
        ->with('allCategory', $allCategory);

    }

    public function CreateAdminEvent(Request $request){

        $validator = Validator::make($request->all(), [
            'event_name' => 'required|min:5',
            'event_details' => 'required',
            'event_category' => 'required',
            'event_amount' => 'required',
            'date' => 'required',
            'event_phone' => 'required|min:11|max:15',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 240,
                'message' => 'Required data missing.'
            ]);
        }else{

            // $image = $request->file('image');
            // $image_name=$image->getClientOriginalName();
            // $image_ext=$image->getClientOriginalExtension();
            // $image_new_name =strtoupper(Str::random(6));
            // $image_full_name=$image_new_name.'.'.$image_ext;
            // $upload_path='images/event/';
            // $image_url=$upload_path.$image_full_name;
            // $success=$image->move($upload_path,$image_full_name);
            // $imageData='/images/event/'.$image_full_name;

            
            $data=array();
            $data['event_name']=$request->event_name;
            // $data['image']=$imageData;
            $data['details']=$request->event_details;
            $data['contact']=$request->event_phone;
            $data['eventCategory']=$request->event_category;
            $data['eventType']='1';
            $data['targetMoney']=$request->event_amount;
            $data['targetDate']=$request->date;
            $data['status']=$request->status;
            $data['isAdminEvent']='1';

            $insert = DB::table('events')->insert($data);

            if($insert){
                return response()->json([
                    'status' => 200,
                    'message' => 'Crated Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 240,
                    'message' => 'Something going wrong!'
                ]);
            }
        }
    }

    public function EventOrgIndex(Request $request){

        $allOrg = DB::table('organizations')
        ->where('status', 1)->orderBy('id','DESC')
        ->get();

        if($allOrg){
            return response()->json($allOrg, 200);
        }else{
            return response()->json(['code'=>401, 'message' => 'No data Found!']);
        }

    }

    public function CreateOrgEvent(Request $request){

        $validator = Validator::make($request->all(), [
            'org_id' => 'required',
            'event_name' => 'required|min:5',
            'event_details' => 'required',
            'event_category' => 'required',
            'event_amount' => 'required',
            'date' => 'required',
            'event_phone' => 'required|min:11|max:15',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 240,
                'message' => 'Required data missing.'
            ]);
        }else{

            $data=array();
            $data['orgId']=$request->org_id;
            $data['event_name']=$request->event_name;
            $data['details']=$request->event_details;
            $data['contact']=$request->event_phone;
            $data['eventCategory']=$request->event_category;
            $data['eventType']='1';
            $data['targetMoney']=$request->event_amount;
            $data['targetDate']=$request->date;
            $data['status']=$request->status;

            $insert = DB::table('events')->insert($data);

            if($insert){
                return response()->json([
                    'status' => 200,
                    'message' => 'Create Successfully'
                ]);
            }else{
                return response()->json([
                    'status' => 240,
                    'message' => 'Required data missing.'
                ]);
            }
        }
    }

    public function CreateVolunteerIndex(Request $request){

        $validator = Validator::make($request->all(), [
            'event_name' => 'required|min:5',
            'event_details' => 'required',
            'event_category' => 'required',
            'event_vanue' => 'required',
            'date' => 'required',
            'event_phone' => 'required|min:11|max:15',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 240,
                'message' => 'Required data missing.'
            ]);
        }else{

            $data=array();
            $data['event_name']=$request->event_name;
            $data['details']=$request->event_details;
            $data['contact']=$request->event_phone;
            $data['eventCategory']=$request->event_category;
            $data['eventType']='2';
            $data['targetMoney']=$request->event_amount;
            $data['targetDate']=$request->date;
            $data['status']=$request->status;
            $data['isAdminEvent']='1';

            $insert = DB::table('events')->insert($data);

            if($insert){
                return response()->json([
                    'status' => 200,
                    'message' => 'Create Successfully'
                ]);
            }else{
                return response()->json([
                    'status' => 240,
                    'message' => 'Something going wrong!'
                ]);
            }
        }
    }

    public function VolunteerIndex(Request $request){

        $allCategory = DB::table('event_categorys')
        ->where('status', 1)
        ->get();

        return view('Admin.createVolunteerEvent')
        ->with('title', 'Create Volunteer Event | Admin')
        ->with('allCategory', $allCategory);

    }

    public function ManageAdminEvent(Request $request){

        $allEvents = DB::table('events')
        ->where('isAdminEvent', 1)
        ->get();

        if($allEvents){
            return response()->json($allEvents, 200);
        }else{
            return response()->json(['code'=>401, 'message' => 'No data Found!']);
        }

    }

    public function ManageAdminEventUpdateStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        } else {
            $id = $request->input('id');
            
            $data=array();
            $data['status']=$request->input('status');

            $update= DB::table('events')
                            ->where('id',$id)
                            ->update($data);

            if ($update) {
                return response()->json([
                    'error' => false,
                    'message' => 'Update successfully.'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }

    public function ManageAdminEventDelete(Request $request,$id)
    {
    ;

        $removed=DB::table('events')->where('id', $id)->delete();

        if ($removed) {
            return response()->json([
                'status' => 200,
                'message' => 'Delete Successfully'
            ]);
        } else {
            return response()->json([
                'status' => 240,
                'message' => 'Something going wrong!'
            ]);
        }
    
    }

    public function ManagePendingEvent(Request $request){

        $allEvents = DB::table('events')
        ->where('status', 2)
        ->where('isAdminEvent', 0)
        ->get();

        if($allEvents){
            return response()->json($allEvents, 200);
        }else{
            return response()->json(['code'=>401, 'message' => 'No data Found!']);
        }

    }

    public function ManagePendingEventAccept(Request $request,$id)
    {
            
        $data=array();
        $data['status']='1';

        $update= DB::table('events')
                        ->where('id',$id)
                        ->update($data);

        if ($update) {
            return response()->json([
                'status' => 200,
                'message' => 'Accept Successfully'
            ]);
        } else {
            return response()->json([
                'status' => 240,
                'message' => 'Something going wrong!'
            ]);
        }
    }

    public function ManagePendingEventDelete(Request $request, $id)
    {
        $removed=DB::table('events')->where('id', $id)->delete();

        if ($removed) {
            return response()->json([
                'status' => 200,
                'message' => 'Delete Successfully'
            ]);
        } else {
            return response()->json([
                'status' => 240,
                'message' => 'Something going wrong!'
            ]);
        }
    }

    public function ManageAcceptedEvent(Request $request){

        $allEvents = DB::table('events')
        ->where('isAdminEvent', 0)
        ->where('status', 1)
        ->orWhere('status', 0)
        ->get();

        if($allEvents){
            return response()->json($allEvents, 200);
        }else{
            return response()->json(['code'=>401, 'message' => 'No data Found!']);
        }

    }

    public function ManageAcceptedEventUpdateStatus(Request $request,$id)
    {
        $removed=DB::table('events')->where('id', $id)->delete();

        if ($removed) {
            return response()->json([
                'status' => 200,
                'message' => 'Delete Successfully'
            ]);
        } else {
            return response()->json([
                'status' => 240,
                'message' => 'Something going wrong!'
            ]);
        }
    }

    public function VolunteerList(Request $request){

        $allVolunteers = DB::table('event_volunteers')
        ->leftJoin('events', 'event_volunteers.eventId', '=', 'events.id')
        ->select('event_volunteers.*', 'events.event_name')
        ->orderBy('id','DESC')
        ->get();

        if($allVolunteers){
            return response()->json($allVolunteers, 200);
        }else{
            return response()->json(['code'=>401, 'message' => 'No data Found!']);
        }

    }

    public function TransitionList(Request $request){

        $allTransitions = DB::table('event_trans_lists')
        ->leftJoin('events', 'event_trans_lists.eventId', '=', 'events.id')
        ->leftJoin('userinfos', 'event_trans_lists.user_id', '=', 'userinfos.id')
        ->select('event_trans_lists.*', 'events.event_name','userinfos.name')
        ->where('paymentType',1)
        ->orderBy('id','DESC')
        ->get();


        if($allTransitions){
            return response()->json($allTransitions, 200);
        }else{
            return response()->json(['code'=>401, 'message' => 'No data Found!']);
        }

    }

    public function ManageAcceptedEventFundResponse(Request $request,$id){
        $eventId = base64_decode($id);

        $allTransitions = DB::table('event_trans_lists')
        ->leftJoin('events', 'event_trans_lists.eventId', '=', 'events.id')
        ->leftJoin('userinfos', 'event_trans_lists.user_id', '=', 'userinfos.id')
        ->select('event_trans_lists.*', 'events.event_name','userinfos.name')
        ->where('events.id',$eventId)
        ->where('paymentType',1)
        ->paginate(10);

        $eventName =  DB::table('events')->where('id',$eventId)->first();

        return view('Admin.transitionList')
        ->with('title', 'Transition List | Admin')
        ->with('eventName', "Event Name: ".$eventName->event_name)
        ->with('allTransitions', $allTransitions);

    }

    public function ManageAcceptedEventVolunteerResponse(Request $request,$id){
        $eventId = base64_decode($id);
        $eventName =  DB::table('events')->where('id',$eventId)->first();

        $allVolunteers = DB::table('event_volunteers')
        ->leftJoin('events', 'event_volunteers.eventId', '=', 'events.id')
        ->select('event_volunteers.*', 'events.event_name')
        ->where('events.id',$eventId)
        ->paginate(10);

        return view('Admin.volunteerList')
        ->with('title', 'Volunteer List | Admin')
        ->with('eventName', "Event Name: ".$eventName->event_name)
        ->with('allVolunteers', $allVolunteers);

    }
    
}
