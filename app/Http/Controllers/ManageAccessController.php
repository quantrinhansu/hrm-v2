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

    public function postAdd(Request $request)
    {
    	return $request->all();
    }
}
