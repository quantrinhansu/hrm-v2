<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class ManageAccessController extends Controller
{
    public function getList()
    {
        if (Auth::user()->can('manage_access')){
        	$user = User::all();
        	return view('manage_access.list', ['user' => $user]);
        } else{
            return redirect('home');
        }
    }

    public function postUpdate(Request $request)
    {
    	$user = User::find($request->id);
    	$user->active = $request->status;
    	$user->save();
    }
}
