<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function Index(Request $request){

        $this->_updateData($request);

        $allCategory = DB::table('event_categorys')->where('status',1)->get();

        $banners = DB::table('sponsor_banners')->where('status',1)->inRandomOrder()->get();

        $totalMoneyCollect = DB::table('event_trans_lists')->where('status',1)->sum('amount');
        $totalEvents = DB::table('events')->where('status', 1)->get();
        $totalVolunteers = DB::table('event_volunteers')->where('status', 1)->get();

        $featureEvents = DB::table('events')
        ->where('status', 1)
        ->where('is_feature',1)
        ->inRandomOrder()
        ->limit(3)->get();

        $ongoingEvents = DB::table('events')
        ->where('status', 1)
        ->where('is_feature',0)
        ->inRandomOrder()
        ->limit(3)->get();

        return view('Home.index')
            ->with('title', 'Home')
            ->with('allCategory', $allCategory)
            ->with('featureEvents', $featureEvents)
            ->with('ongoingEvents', $ongoingEvents)
            ->with('banners', $banners)
            ->with('totalMoneyCollect', $totalMoneyCollect)
            ->with('totalEvents', count($totalEvents))
            ->with('totalVolunteers', count($totalVolunteers));

    }

    public function contact(Request $request){

        $this->_updateData($request);

        $allCategory = DB::table('event_categorys')->where('status',1)->get();
        

        return view('Home.contact')
            ->with('title', 'Contact Us')
            ->with('allCategory', $allCategory);

    }

    public function joinOrg(Request $request){

        $this->_updateData($request);

        $allCategory = DB::table('event_categorys')->where('status',1)->get();
        

        return view('Home.JoinOrg')
            ->with('title', 'Join As Organization')
            ->with('allCategory', $allCategory);

    }

    public function FAQ(Request $request){

        $this->_updateData($request);

        $allCategory = DB::table('event_categorys')->where('status',1)->get();
        

        return view('Home.faq')
            ->with('title', 'faq')
            ->with('allCategory', $allCategory);

    }

    public function about(Request $request){

        $this->_updateData($request);

        $allCategory = DB::table('event_categorys')->where('status',1)->get();
        

        return view('Home.about')
            ->with('title', 'About Us')
            ->with('allCategory', $allCategory);

    }

    public function EventDetails(Request $request,$id){

        $this->_updateData($request);

        $id = base64_decode($id);
        $allCategory = DB::table('event_categorys')->where('status',1)->get();
        
        $Events = DB::table('events')
        ->where('id', $id)->first();

        $data1=array();
        $data1['visitor']=$Events->visitor+1;
        DB::table('events')->where('id', $id)->update($data1);

        $trnsList = DB::table('event_trans_lists')
        ->leftJoin('events', 'event_trans_lists.eventId', '=', 'events.id')
        ->leftJoin('userinfos', 'event_trans_lists.user_id', '=', 'userinfos.id')
        ->select('event_trans_lists.*', 'events.event_name','userinfos.name')
        ->where('eventId', $id)->orderBy('id','DESC')->get();

        $volunteersList = DB::table('event_volunteers')
        ->leftJoin('events', 'event_volunteers.eventId', '=', 'events.id')
        ->select('event_volunteers.*', 'events.event_name')
        ->where('eventId', $id)->orderBy('event_volunteers.id','DESC')->get();
        
        $totalCollect = DB::table('event_trans_lists')
        ->where('eventId', $id)->sum('amount');

        $totalVApply= DB::table('event_volunteers')
        ->where('eventId', $id)->get();

        return view('Home.EventDetails')
            ->with('title', 'EventDetails Us')
            ->with('allCategory', $allCategory)
            ->with('trnsList', $trnsList)
            ->with('volunteersList', $volunteersList)
            ->with('totalCollect', $totalCollect)
            ->with('Events', $Events)
            ->with('totalVApply', count($totalVApply));

    }

    protected function _updateData($request){
        $ip = $this->getIp();
        $checkIp=DB::table('site_unique_traficip')->where('user_ip',$ip)->get();
        $getLastCount = DB::table('sitealltrafic')->first();
        $data=array();
        $data['count']=$getLastCount->count+1;
        DB::table('sitealltrafic')->where('id', $getLastCount->id)->update($data);
        if(count($checkIp)==0){
            $data1=array();
            $data1['user_ip']=$ip;
            
            DB::table('site_unique_traficip')->insert($data1);
        }
    }

    public function Events(Request $request){

        $this->_updateData($request);

        $allCategory = DB::table('event_categorys')->where('status',1)->get();

        $allEvents = DB::table('events')
        ->where('status', 1)
        ->where('eventType',1)
        ->inRandomOrder()
        ->paginate(9);

        // $allEvents = DB::table('events')
        // ->leftJoin('event_trans_lists', 'events.id', '=', 'event_trans_lists.eventId')
        // ->select('events.*', 'event_trans_lists.*')
        // ->where('events.status', 1)
        // ->where('events.eventType',1)
        // ->inRandomOrder()
        // ->paginate(9);

        // dd( $allEvents);
        $volEvents = DB::table('events')
        // ->leftJoin('events', 'event_volunteers.eventId', '=', 'events.id')
        ->where('status', 1)
        ->where('eventType',2)
        ->inRandomOrder()
        ->get();

        return view('Home.events')
            ->with('title', 'Events')
            ->with('allCategory', $allCategory)
            ->with('allEvents', $allEvents)
            ->with('volEvents', $volEvents);

    }

    public function CategoryEvent(Request $request,$cat_id){

        $this->_updateData($request);

        $cat_id = base64_decode($cat_id);

        $allCategory = DB::table('event_categorys')->where('status',1)->get();

        $allEvents = DB::table('events')
        ->where('eventType',1)
        ->where('eventCategory',$cat_id)
        ->where('status', 1)
        ->inRandomOrder()
        ->paginate(9);

        $volEvents = DB::table('events')
        ->where('status', 1)
        ->where('eventType',2)
        ->where('eventCategory',$cat_id)
        ->inRandomOrder()
        ->get();

        return view('Home.CategoryEvents')
            ->with('title', 'Category Event')
            ->with('allCategory', $allCategory)
            ->with('allEvents', $allEvents)
            ->with('volEvents', $volEvents);

    }

    public function Organization(Request $request){

        $this->_updateData($request);

        $allCategory = DB::table('event_categorys')->where('status',1)->get();
        $allOrg = DB::table('organizations')
        ->where('status', 1)
        ->paginate(9);

        return view('Home.Organization')
            ->with('title', 'Organization')
            ->with('allCategory', $allCategory)
            ->with('allOrg', $allOrg);
    }

    public function ApplyForOrgAccount(Request $request){
        $this->_updateData($request);

        $validator = Validator::make($request->all(), [
            'org_name' => 'required|min:3|max:30',
            'customer_phone' => 'required|min:11|max:15',
            'image' => 'required',
            'customer_Address' => 'required',
            'customer_details' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }else{

            $image = $request->file('image');
            $image_name=$image->getClientOriginalName();
            $image_ext=$image->getClientOriginalExtension();
            $image_new_name =strtoupper(Str::random(6));
            $image_full_name=$image_new_name.'.'.$image_ext;
            $upload_path='images/organisation/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $imageData='/images/organisation/'.$image_full_name;

            
            $data=array();
            $data['user_id']=$request->session()->get('user_id');
            $data['name']=$request->org_name;
            $data['phone']=$request->customer_phone;
            $data['image']=$imageData;
            $data['address']=$request->customer_Address;
            $data['details']=$request->customer_details;
            $data['status']='3';

            $insert = DB::table('organizations')->insert($data);

            if($insert){
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'Request Send Successfully'
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something going wrong'
                ]);
            }
        }
    }

    public function joinSponsor(Request $request){

        $this->_updateData($request);

        $allCategory = DB::table('event_categorys')->where('status',1)->get();
        

        return view('Home.JoinSponsor')
            ->with('title', 'Join As Sponsor')
            ->with('allCategory', $allCategory);

    }

    public function ApplyForSponsor(Request $request){

        $this->_updateData($request);

        $validator = Validator::make($request->all(), [
            'spo_name' => 'required|min:3|max:30',
            'startdate' => 'required',
            'image' => 'required',
            'endDate' => 'required',
            'customer_Amount' => 'required',
            'customer_details' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }else{

            $image = $request->file('image');
            $image_name=$image->getClientOriginalName();
            $image_ext=$image->getClientOriginalExtension();
            $image_new_name =strtoupper(Str::random(6));
            $image_full_name=$image_new_name.'.'.$image_ext;
            $upload_path='images/sponsor/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $imageData='/images/sponsor/'.$image_full_name;

            
            $data=array();
            $data['user_id']=$request->session()->get('user_id');
            $data['title']=$request->spo_name;
            $data['details']=$request->customer_details;
            $data['image']=$imageData;
            $data['startDate']=$request->startdate;
            $data['endDate']=$request->endDate;
            $data['amount']=$request->customer_Amount;
            $data['status']='1';

            $id = $request->session()->get('user_id');
            
            $data1=array();
            $data1['status']='2';
            $data1['type']='3';

            $update= DB::table('userinfos')
                            ->where('id',$id)
                            ->update($data1);

            $insert = DB::table('sponsors')->insert($data);

            if($insert){
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'Request Send Successfully'
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something going wrong'
                ]);
            }
        }
    }

    public function applyForVolun(Request $request,$id){

        $this->_updateData($request);

        $userInfo = DB::table('userinfos')->where('id', $request->session()->get('user_id'))->first();

        $allAlreadyApply = DB::table('event_volunteers')->where('user_id',$request->session()->get('user_id'))->where('status',1)->first();
        if($allAlreadyApply){
            return redirect()->back()->with([
                'error' => false,
                'message' => 'Already applied'
            ]);
        }else{
            $data=array();
            $data['eventId']=$id;
            $data['user_id']=$userInfo->id;
            $data['user_name']=$userInfo->username;
            $data['phone']=$userInfo->phone;
            $data['image']=$userInfo->image;
            $data['status']='1';
    
            $insert_user = DB::table('event_volunteers')->insert($data);
    
            return redirect()->back()->with([
                'error' => false,
                'message' => 'Request Send Successfully'
            ]);
        }
        
    }


    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip();
    }
}
