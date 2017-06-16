<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function getLogin()
    {
    	if(!Auth::check()){
    		return view('auth.login');
    	}
    	return view('home');
    }

    public function postLogin(Request $request)
    {
    	$email = $request->email;
    	$password = $request->password;

    	if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            return redirect('home');
        }else{
        	return redirect('login')->with('thongbao', 'Email hoặc mật khẩu không đúng');
        }
    }

    public function postLogout()
    {
    	Auth::logout();
    	return redirect('login');
    }
}
