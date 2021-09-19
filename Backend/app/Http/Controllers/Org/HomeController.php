<?php

namespace App\Http\Controllers\Org;

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

        $userId = $request->session()->get('user_id');

        $org = DB::table('organizations')
        ->where('user_id',$userId)
        ->where('status',1)
        ->first();

        if($org){
            
            $request->session()->put('org_name', $org->name);
            $request->session()->put('org_id', $org->id);
            $request->session()->put('org_image', $org->image);
            $request->session()->put('org_phone', $org->phone);

            return view('Organization.Home')
                ->with('title', 'Home Organization')
                ->with('date', date('d-M-Y'));
        }else{

            $request->session()->flush();
            return redirect('/SignIn')->with([
                        'message' => 'Your account has been blocked'
                    ]);
        }
           
    }

}
