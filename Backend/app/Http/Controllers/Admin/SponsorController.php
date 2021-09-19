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

class SponsorController extends Controller
{
    public function Index(Request $request){

        $pendingSponsor = DB::table('userinfos')
        ->leftJoin('sponsors', 'userinfos.id', '=', 'sponsors.user_id')
        ->select('userinfos.*', 'sponsors.name AS spoName','sponsors.image AS spoImage','sponsors.startDate','sponsors.endDate','sponsors.details','sponsors.amount')
        ->where('userinfos.type', 3)
        ->where('userinfos.status',2)
        ->get();

        // dd($pendingSponsor);
        if($pendingSponsor){
            return response()->json($pendingSponsor, 200);
        }else{
            return response()->json(['code'=>401, 'message' => 'No data Found!']);
        }

    }

    public function Accept($id)
    {
        
        $data=array();
        $data['status']='1';

        $update= DB::table('userinfos')
                        ->where('id',$id)
                        ->update($data);

        if($update){
            return response()->json([
                'status' => 200,
                'event'=> $insert,
                'message' => 'Update Successfully'
            ]);
        }else{
            return response()->json([
                'status' => 240,
                'message' => 'Something going wrong!'
            ]);
        }

    }

    public function Delete($id)
    {
        
        $removed=DB::table('userinfos')->where('id', $id)->delete();

        if($removed){
            return response()->json([
                'status' => 200,
                'event'=> $removed,
                'message' => 'Delete Successfully'
            ]);
        }else{
            return response()->json([
                'status' => 240,
                'message' => 'Something going wrong!'
            ]);
        }
    }

    public function ManageIndex(Request $request){

        $allSponsor = DB::table('userinfos')
        ->leftJoin('sponsors', 'userinfos.id', '=', 'sponsors.user_id')
        ->select('userinfos.*', 'sponsors.name AS spoName','sponsors.image AS spoImage','sponsors.startDate','sponsors.endDate','sponsors.details','sponsors.amount')
        ->where('userinfos.type', 3)
        ->where(function($q) {$q->where('userinfos.status',0)->orwhere('userinfos.status',1);})
        ->get();

        if($allSponsor){
            return response()->json($allSponsor, 200);
        }else{
            return response()->json(['code'=>401, 'message' => 'No Data Found!']);
        }

    }

    public function ManageUpdateStatus(Request $request)
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

            $update= DB::table('userinfos')
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

    public function ManageDelete(Request $request)
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
                return response()->json([
                    'error' => false,
                    'message' => 'Delete successfully.'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }

    public function BannerIndex(Request $request){

        $SponsorBanner = DB::table('sponsor_banners')
        ->leftJoin('sponsors', 'sponsor_banners.sponsor_Id', '=', 'sponsors.id')
        ->select('sponsor_banners.*','sponsors.name')
        ->orderBy('sponsor_banners.id','DESC')
        ->paginate(10);

        return view('Admin.SponsorBanner')
        ->with('title', 'Banner Sponsor | Admin')
        ->with('SponsorBanner', $SponsorBanner);

    }

    public function BannerIndexStatusUpdate(Request $request)
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

            $update= DB::table('sponsor_banners')
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

    public function BannerAccept(Request $request)
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
            
            $data=array();
            $data['status']='1';

            $update= DB::table('sponsor_banners')
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

    public function BannerDelete(Request $request)
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

            $removed=DB::table('sponsor_banners')->where('id', $id)->delete();

            if ($removed) {
                return response()->json([
                    'error' => false,
                    'message' => 'Delete successfully.'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }
    }
}
