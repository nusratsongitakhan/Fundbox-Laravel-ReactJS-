<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function Index(Request $request){

        $allReports = DB::table('reports')
        ->leftJoin('userinfos', 'reports.user_id', '=', 'userinfos.id')
        ->leftJoin('events', 'reports.event_id', '=', 'events.id')
        ->select('reports.*', 'userinfos.username','userinfos.image','userinfos.name','events.event_name')
        ->get();
        
        if($allReports){
            return response()->json($allReports, 200);
        }else{
            return response()->json(['code'=>401, 'message' => 'No data Found!']);
        }

    }

    public function AddReply(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'edit_reply' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 240,
                'message' => 'Required data missing.'
            ]);
        } else {

            $data=array();
            $data['reply']=$request->input('edit_reply');

            $update= DB::table('reports')
                            ->where('id',$id)
                            ->update($data);

            if ($update) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Reply Send Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 240,
                    'message' => 'Something going wrong!'
                ]);
            }
        }
    }
}
