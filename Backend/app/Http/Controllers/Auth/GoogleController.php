<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Socialite;
use Auth;
use Exception;
use App\User;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        // try {
        //     return Socialite::driver('google')->redirect();
        // } catch (InvalidStateException $e) {
        //     return Socialite::driver('google')->stateless()->redirect();
        // }
        return Socialite::driver('google')->redirect();
        
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
            
            $user = Socialite::driver('google')->stateless()->user();


            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){

                if($finduser->status==1){

                    Auth::login($finduser);
                    $request->session()->put('user_id', $finduser->id);
                    $request->session()->put('username', $finduser->username);
                    $request->session()->put('full_name', $finduser->name);
                    $request->session()->put('user_type', $finduser->type);
                    $request->session()->put('user_email', $finduser->email);
                    $request->session()->put('user_image', $finduser->image);
                    $request->session()->put('admin_is_super_admin', $finduser->is_super_admin);


                    if($finduser->type == 1){
                        return redirect('/admin/dashboard');
                    }elseif($finduser->type == 2){
                        return redirect('/org/dashboard');
                    }elseif($finduser->type == 3){
                        return redirect('/sp/dashboard');
                    }elseif($finduser->type == 4){
                        return redirect('/');
                    }else{
                        return redirect('/SignIn')->with([
                            'error' => true,
                            'message' => 'Something going wrong'
                        ]);
                    }

                }else{
                    return redirect('/SignIn')->with([
                        'error' => true,
                        'message' => 'Your Account has been Deactivated'
                    ]);
                }
     
                
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => $user->email,
                    'email' => $user->email,
                    'phone' => '0',
                    'type' => '4',
                    'status' => '1',
                    'google_id'=> $user->id,
                    'password' => md5(rand(1,10000))
                ]);
    
                Auth::login($newUser);

                $request->session()->put('user_id', $newUser->id);
                $request->session()->put('username', $newUser->username);
                $request->session()->put('full_name', $newUser->name);
                $request->session()->put('user_type', $newUser->type);
                $request->session()->put('user_email', $newUser->email);
                $request->session()->put('user_image', $newUser->image);
                $request->session()->put('admin_is_super_admin', $newUser->is_super_admin);
     
                return redirect('/');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}