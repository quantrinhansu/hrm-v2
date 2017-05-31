<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Permission;
use Auth;
use App\User;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //         $users = User::whereHas('roles', function($q)
        // {
        //     $q->where('name', 'staff');
        // })->get();
        // dd(count($users));
        //$user = User::find(Auth::user()->id)->first();
       /* foreach (Auth::user()->roles as $value) {
            echo $value->name;
        }*/
        // $user = User::find(Auth::user()->id);
        // return view('auth.permission', compact('user'));
        //return view('auth.permission');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $newPer = new Permission();
        $newPer->name         = $request->name;
        $newPer->display_name = $request->display_name; // optional
        $newPer->description  = $request->description; // optional
        $newPer->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
