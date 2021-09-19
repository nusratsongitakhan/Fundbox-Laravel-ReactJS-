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

class OrgController extends Controller
{
    public function orgList(Request $request){

        $allOrgList = DB::table('organizations')
         ->where('status',1)
         ->get();
         //dd($orgList);

        return view('Sponsor.OrgList')
            ->with('title', 'Apply Org | Sponsor')
            ->with('allOrgList', $allOrgList);

    }
    public function sponsoredOrgList(Request $request){

        $sponsorOrgList = DB::table('spo_to_org_proposals')
         ->where('status',1)//1 means active
         ->get();
         //dd($orgList);

         return view('Sponsor.SponsoredorgList')
            ->with('title', 'Sponsored Org List | Sponsor')
            ->with('sponsorOrgList', $sponsorOrgList);

    }
    public function pendingOrgList(Request $request){

        $pendingOrgList = DB::table('spo_to_org_proposals')
         ->where('status',2)//2 means pending
         ->get();
         //dd($orgList);

         return view('Sponsor.PendingOrgList')
            ->with('title', 'Pending Org Request | Sponsor')
            ->with('allPendingOrgList', $pendingOrgList);

    }
    public function ongoingOrgList(Request $request){

        $ongoingOrgList = DB::table('spo_to_org_proposals')
         ->where('status',4)//2 means pending
         ->get();

        $sponsorInfo = DB::table('sponsors')
              ->where('user_id', $request->session()->get('user_id'))
              ->first();
         //dd($orgList);

         return view('Sponsor.ProcessingOrgList')
            ->with('title', 'Pending Org Request | Sponsor')
            ->with('sponsorInfo',$sponsorInfo)
            ->with('allOngoingOrgList', $ongoingOrgList);

    }
    public function applyInOrg(Request $request){

        $spId = $request->session()->get('user_id');
        //dd($spId);


        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'editStartDate' => 'required',
            'editEndDate' => 'required',
            'details' => 'required',
            'editAmount' => 'required',
            'orgId' => 'required'
            //'image' => 'required'
        ]);

        
        //dd($validator);

        if ($validator->fails()) {
            dd($request->all());
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }else{

            // $image = $request->file('image');
            // $image_name=$image->getClientOriginalName();
            // $image_ext=$image->getClientOriginalExtension();
            // $image_new_name =strtoupper(Str::random(6));
            // $image_full_name=$image_new_name.'.'.$image_ext;
            // $upload_path='images/Sponsor/';
            // $image_url=$upload_path.$image_full_name;
            // $success=$image->move($upload_path,$image_full_name);
            // $imageData='images/Sponsor/'.$image_full_name;

            $imageData =  DB::table('organizations')
            ->where('id',$request->orgId)
            ->first();

            
            $data=array();
            $data['title']=$request->title;
            $data['startDate']=$request->editStartDate;
            $data['endDate']=$request->editEndDate;
            $data['details']=$request->details;
            $data['amount']=$request->editAmount;
            $data['org_Id']=$request->orgId;
            $data['sponsorLogo']=$imageData->image;
            $data['sponsor_Id']=$spId;
            $data['status']='2';

            $insert = DB::table('spo_to_org_proposals')->insert($data);

            if($insert){
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'Applied Successfully'
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something going wrong'
                ]);
            }
        }


    }
    public function UpdateAppliedInOrg(Request $request){

        $userSpId = $request->session()->get('user_id');
        //dd($spId);


        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'editStartDate' => 'required',
            'editEndDate' => 'required',
            'details' => 'required',
            'editAmount' => 'required',
            'spoId' => 'required'
            //'image' => 'required'
        ]);

        
        //dd($validator);

        if ($validator->fails()) {
            dd($request->all());
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }else{

            // $image = $request->file('image');
            // $image_name=$image->getClientOriginalName();
            // $image_ext=$image->getClientOriginalExtension();
            // $image_new_name =strtoupper(Str::random(6));
            // $image_full_name=$image_new_name.'.'.$image_ext;
            // $upload_path='images/Sponsor/';
            // $image_url=$upload_path.$image_full_name;
            // $success=$image->move($upload_path,$image_full_name);
            // $imageData='images/Sponsor/'.$image_full_name;

            $spoId =  DB::table('spo_to_org_proposals')
            ->where('id',$request->spoId)
            ->first();
            // $imageData =  DB::table('sponsors')
            // ->where('user_id',$request->userSpId)
            // ->first();
            //dd($imageData,$imageData);
           // dd($validator);

            
            $data=array();
            $data['title']=$request->title;
            $data['startDate']=$request->editStartDate;
            $data['endDate']=$request->editEndDate;
            $data['details']=$request->details;
            $data['amount']=$request->editAmount;
            //$data['sponsorLogo']=$imageData->image;
            $data['status']='4';

            //dd($spoId, $data);

            $update= DB::table('spo_to_org_proposals')
                             ->where('id',$spoId->id)
                             ->update($data);

            if($update){
                return redirect()->back()->with([
                    'error' => false,
                    'message' => 'Updated Successfully'
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'Something going wrong'
                ]);
            }
        }


    }
}
