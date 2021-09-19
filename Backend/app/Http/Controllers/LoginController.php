<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    public function LoginIndex(Request $request){
        session_start();

        if($request->session()->has('username')){
            if($request->session()->get('user_type') == 1){
                return redirect('/admin/dashboard');
            }elseif($request->session()->get('user_type') == 2){
                return redirect('/org/dashboard');
            }elseif($request->session()->get('user_type') == 3){
                return redirect('/sp/dashboard');
            }elseif($request->session()->get('user_type') == 4){
                return redirect('/');
            }else{
                return view('Home.SignIn')
                ->with('title', 'Login');
            }
        }else{
            return view('Home.SignIn')
            ->with('title', 'Login');
        }

    }

    public function Login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'login_email' => 'required|email|max:50',
            'login_password' => [
                'required',
                'min:8', 
                'max:20', 
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 240,
                'message' => 'Required data missing.'
            ]);
        }else{
            $password=md5($request->input('login_password'));

            $user=DB::table('userinfos')
            ->where('email',$request->input('login_email'))
            ->where('status',1)
            ->first();
            
            if($user){

                if($user->password == $password){

                    return response()->json([
                        'status' => 200,
                        'userData'=> $user,
                        'message' => 'Login Successful'
                    ]);
                }else{
                    return response()->json([
                        'status' => 240,
                        'message' => 'Something going wrong!'
                    ]);
                }
            }else{
                return response()->json([
                    'status' => 240,
                    'message' => 'User not Found!'
                ]);
            }
        }
    }

    public function PayDone(Request $request,$id)
    {

    
        $user=DB::table('userinfos')
        ->where('id',$id)
        ->first();

        $request->session()->put('user_id', $user->id);
        $request->session()->put('username', $user->username);
        $request->session()->put('full_name', $user->name);
        $request->session()->put('user_type', $user->type);
        $request->session()->put('user_email', $user->email);
        $request->session()->put('user_image', $user->image);
        $request->session()->put('admin_is_super_admin', $user->is_super_admin);

        
        return redirect('/');
                
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('/');
    }

    public function CreateNewUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'signup_name' => ['required', 'min:3' ,'max:30'],
            'signup_username' => 'required',
            'signup_email' => 'required|email|min:10|max:50',
            'signup_password' => [
                                    'required',
                                    'string',
                                    'min:8', 
                                    'max:20',
                                    'regex:/[a-z]/',      
                                    'regex:/[A-Z]/',      
                                    'regex:/[0-9]/',      
                                    'regex:/[@$!%*#?&]/', 
                                ],
            'signup_con_password' => 'required|same:signup_password',
            'signup_phone' => 'required|min:11|max:15'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 240,
                'message' => 'Required data missing.'
            ]);
        }else{

            $username = $request->input('signup_username');
            $email = $request->input('signup_email');

            $user=DB::table('userinfos')
            ->where('email',$request->input('signup_email'))
            ->orWhere('username',$request->input('signup_username'))
            ->first();           
            
            if($user == null){
                $data=array();
                $data['name']=$request->input('signup_name');
                $data['username']=$request->input('signup_username');
                $data['password']=md5($request->input('signup_password'));
                $data['email']=$request->input('signup_email');
                $data['phone']=$request->input('signup_phone');
                $data['type']='4';
                $data['status']='1';

                $insert_user = DB::table('userinfos')->insert($data);

                if($insert_user){
                    return response()->json([
                        'status' => 200,
                        'message' => 'Account Create Successfully'
                    ]);
                }else{
                    return response()->json([
                        'status' => 240,
                        'message' => 'Something going wrong!'
                    ]);
                }
            }else{
                return response()->json([
                    'status' => 240,
                    'message' => 'Username or Email Already register'
                ]);
            }
        }
    }


}
