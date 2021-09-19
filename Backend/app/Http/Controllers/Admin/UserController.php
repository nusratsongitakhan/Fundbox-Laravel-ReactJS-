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

class UserController extends Controller
{

    private function isLoggedIn(Request $request){
        if ($request->session()->has('user_type') && $request->session()->get('user_type')) {
            return true;
        } else {
            
            return false;
        }
        return true;
    }

    public function CreateAdmin(Request $request){

        $validator = Validator::make($request->all(), [
            'admin_name' => 'required|min:3|max:30',
            'username' => 'required|string',
            'admin_email' => 'required|email|min:10|max:50',
            'admin_password' => 'required|min:8|max:20',
            'admin_confirm_assword' => 'required|same:admin_password',
            'admin_phone' => 'required|min:11|max:15',
            'status' => 'required',
            'username' => 'unique:userinfos',
            'email' => 'unique:userinfos'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 240,
                'message' => 'Required data missing.'
            ]);
        }else{

            
            $data=array();
            $data['name']=$request->admin_name;
            $data['username']=$request->username;
            $data['password']=md5($request->admin_password);
            $data['email']=$request->admin_email;
            $data['phone']=$request->admin_phone;
            $data['type']='1';
            $data['status']=$request->status;

            $insert_user = DB::table('userinfos')->insert($data);

            if($insert_user){
                return response()->json([
                    'status' => 200,
                    'event'=> $insert_user,
                    'message' => 'Admin Create Successfully'
                ]);
            }else{
                return response()->json([
                    'status' => 240,
                    'message' => 'Something going wrong!'
                ]);
            }
        }
    }

    public function ManageAdmin(Request $request){

        $allAdmins = DB::table('userinfos')
        ->where('type', 1)
        ->get();

        if($allAdmins){
            return response()->json($allAdmins, 200);
        }else{
            return response()->json(['code'=>401, 'message' => 'No Category Found!']);
        }
    }

    public function UpdateStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'user_status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        } else {
            $user_id = $request->input('user_id');
            
            $data=array();
            $data['status']=$request->input('user_status');

            $update= DB::table('userinfos')
                            ->where('id',$user_id)
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

    public function UpdateUserInfo(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'editName' => 'required|string',
            'editEmail' => 'required|email|min:10|max:50',
            'editPhone' => 'required|min:11|max:15',
            'email' => 'unique:userinfos'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 240,
                'message' => 'Required data missing.'
            ]);
            
        } else {
            
            $data=array();
            $data['name']=$request->editName;
            $data['email']=$request->editEmail;
            $data['phone']=$request->editPhone;
            

            $update= DB::table('userinfos')
                            ->where('id',$id)
                            ->update($data);

                            
            if ($update) {
                return response()->json([
                    'status' => 200,
                    'event'=> $update,
                    'message' => 'Edit Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 240,
                    'message' => 'Something going wrong!'
                ]);
            }
        }
        
    }

    public function DeleteAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'adminId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 240,
                'message' => 'Required data missing.'
            ]);
        } else {
            $user_id = $request->input('adminId');

            $removed=DB::table('userinfos')->where('id', $user_id)->delete();

            if ($removed) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Delete Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 240,
                    'message' => 'Something going wrong!.'
                ]);
            }
        }

    }

    public function MakeSuperAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        } else {
            $user_id = $request->input('user_id');
            
            $data=array();
            $data['is_super_admin']=$request->input('value');

            $update= DB::table('userinfos')
                            ->where('id',$user_id)
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

    public function ManageProfile($id){

        $UserInfo = DB::table('userinfos')
        ->where('id',$id)
        ->where('type', 1)
        ->first();

        if($UserInfo){
            return response()->json($UserInfo, 200);
        }else{
            return response()->json(['code'=>401, 'message' => 'No Data Found!']);
        }
        
    }

    public function ManageProfileUpdate(Request $request,$id)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 240,
                'message' => 'Required data missing.'
            ]);
        } else {
            $data=array();
            $data['name']=$request->input('name');
            $data['phone']=$request->input('phone');


            if($request->password !=""){
                if($request->password == $request->con_pass){
                    $data['password']=md5($request->password);
                }
            }

            $userAvailable= DB::table('userinfos')
            ->where('id',$id)->first();
            // dd($request->all());
            if($userAvailable){

                $data=DB::table('userinfos')->where('id',$id)->update($data);
                
                if($data==null){
                    return response()->json([
                        'status' => 240,
                        'message' => 'Something going wrong!'
                    ]);
                }
                else{
                    return response()->json([
                        'status' => 200,
                        'message' => 'Update Successfully'
                    ]);
                } 

            }else{
                return response()->json([
                    'status' => 240,
                    'message' => 'Something going wrong!'
                ]);
            }
        }
    }

    public function ManageProfileDeactivated(Request $request)
    {
        if ($this->isLoggedIn($request)) {

            $data=array();
            $data['status']='0';

            $update= DB::table('userinfos')
                ->where('id',$request->session()->get('user_id'))
                ->update($data);

            if ($update) {
                return redirect('/logout');
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Something went wrong.'
                ]);
            }
        }else{
            return redirect(url('/SignIn'));
        }
    }
    
}
