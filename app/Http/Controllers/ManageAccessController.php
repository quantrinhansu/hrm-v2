<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ManageAccessController extends Controller
{
    public function getList()
    {
    	$user = User::all();
    	return view('manage_access.list', ['user' => $user]);
    }

    public function postUpdate(Request $request)
    {
    	$user = User::find($request->id);
    	$user->active = $request->status;
    	$user->save();
    }
}
