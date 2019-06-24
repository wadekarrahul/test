<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use Session;

class AuthenticationController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	public function login(Request $request){
		$email = $request->get('email');
		$password = $request->get('password');
		$user = User::where('email', $email)->first();
		if(!empty($user) && Hash::check($password, $user->password)){
			session(['user_id' => $user->id]);
			session(['user_name' => $user->name]);
			session(['is_admin' => $user->is_admin]);
			return redirect('/posts/');
		}else{
			return redirect('/login');
		}
	}
	
	public function logout(){
		Session::flush();
		return redirect('/login');
	}
}
