<?php

namespace App\Http\Controllers\Sponsor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function accountPageShow(Request $request)
    {
    //     return view('Sponsor.ListofAdvertise')
    //     ->with('title', 'All Advertise | Sponsor')
    //    ->with('allAdvertise', $allAdvertise);

    $userId = $request->session()->get('user_id');
   // dd($userId);

   $UserInfo = DB::table('userinfos')
        ->where('id', $userId)
        ->first();
   $spInfo = DB::table('sponsors')
        ->where('user_id', $userId)
        ->first();

    
         //dd ($spInfo);


        return view('Sponsor.ManageAccount')
                ->with('title', 'Manage Account | Sponsor')
                ->with('userInfo', $UserInfo)
                ->with('spInfo', $spInfo);

    }
    public function dashboard(Request $request)
    {
        $userId = $request->session()->get('user_id');
        $spId = DB::table('sponsors')
            ->where('user_id',$userId)
            ->where('status',1)
            ->first();

        $totalSiteVisit = DB::table('sitealltrafic')->first();
        $totalMoneyCollect = DB::table('event_trans_lists')
            ->where('user_id',$userId)
            ->sum('amount');

        //dd($totalSiteVisit,$totalMoneyCollect);
    
        return view('Sponsor.sponsorHome')
                    ->with('title', 'Home | Sponsor')
                    ->with('date', date('d-M-Y'))
                    ->with('totalSiteVisit', $totalSiteVisit->count)
                    ->with('totalMoneyCollect', $totalMoneyCollect);

    }

    public function deleteAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        } else {
            $id = $request->input('id');

            $removed=DB::table('userinfos')->where('id', $id)->delete();
            

            if ($removed) {

                $spId = DB::table('sponsors')
                ->where('user_id',$id)
                 ->first();

                

                $data=array();
                $data['status']='3';

                $update= DB::table('sponsor_banners')
                            ->where('sponsor_Id',$spId->id)
                            ->update($data);

                $removed1=DB::table('sponsors')->where('user_id', $id)->delete();

                return redirect('/logout');
                // return response()->json([
                //     'error' => false,
                //     'message' => 'Delete successfully.'
                // ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }

    public function updateAccount(Request $request)
    {
        $userId = $request->session()->get('user_id');

        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'title' => 'required|min:5',
            'name' => 'required|min:5',
            'details' => 'required|min:5',
            'Phone' => 'required|min:11',

        ]);
        //dd($validator);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
            
        } else {

            $image = $request->file('image');
            $image_name=$image->getClientOriginalName();
            $image_ext=$image->getClientOriginalExtension();
            $image_new_name =strtoupper(Str::random(6));
            $image_full_name=$image_new_name.'.'.$image_ext;
            $upload_path='images/Sponsor/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $imageData='images/Sponsor/'.$image_full_name;


            //dd($imageData);
            
            $data=array();
            $data['title']=$request->input('title');
            $data['image']=$imageData;
            $data['details']=$request->input('details');

            $data1=array();
            $data1['image']=$imageData;
            $data1['name']=$request->input('name');
            $data1['phone']=$request->input('Phone');
            

            $update= DB::table('sponsors')
                            ->where('user_id',$userId)
                            ->update($data);
            $update= DB::table('userinfos')
                            ->where('id',$userId)
                            ->update($data1);
            

                            
            if ($update) {
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'Edit successfully.'
                ]);
            } else {
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
        
    }



    public function allTransactionList(Request $request){

        //$spId = $request->session()->get('user_id');

        $allTransactionList = DB::table('event_trans_lists')
            ->leftjoin('events','event_trans_lists.eventId','=','events.id')
            //->leftjoin('organizations','event_trans_lists.org_Id','=','organizations.id')
            //->where('user_id',$spId)
            ->where('user_id',13)
            ->get();
             //dd($allTransactionList);

//         $allTransactionList = DB::table('event_trans_lists')
//         ->leftJoin('events', 'event_trans_lists.eventId', '=', 'events.id')
//         //->leftJoin('userinfos', 'event_trans_lists.user_id', '=', 'userinfos.id')
//         //->select('event_trans_lists.*', 'events.event_name','userinfos.name')
//         //->orderBy('id','DESC')
//          //->paginate(10);
//         ->where('user_id',$spId)
//         ->get();

            if($allTransactionList){
                return response()->json($allTransactionList, 200);
            }else{
                return response()->json(['code'=>401, 'message' => 'No data Found!']);
            }


    }

}
