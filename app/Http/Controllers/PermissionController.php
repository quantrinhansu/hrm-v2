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
        $per = Permission::all();
        return view('auth.permission', compact('per'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Auth::user()->can('permission_create')) {
            $newPer = new Permission();
            $newPer->name         = $request->name;
            $newPer->display_name = $request->display_name; // optional
            $newPer->description  = $request->description; // optional
            $newPer->save();
        }else{
            return  redirect()->back()->with('msg','Bạn không có quyền này.');
        }
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
    public function update(Request $request)
    {
        if (Auth::user()->can('permission_update')) {
            $permission = Permission::findOrFail($request->id);
            $permission->name         = $request->name;
            $permission->display_name = $request->display_name; // optional
            $permission->description  = $request->description; // optional
            $permission->save();
        }else{
            return  redirect()->back()->with('msg','Bạn không có quyền này.');
        }
    }

    public function delete(Request $request)
    {
        if (Auth::user()->can('permission_delete')) {
            $permission = Permission::findOrFail($request->id);
            $permission->delete();
            $permission->perms()->sync([]); 
            $permission->forceDelete();
            return  redirect()->back()->with('msg','Deleted.');
        }else{
            return  redirect()->back()->with('msg','Bạn không có đủ thẩm quyền để thực hiện tác vụ này.');
        }
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
