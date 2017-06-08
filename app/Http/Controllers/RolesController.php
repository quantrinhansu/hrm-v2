<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Auth;
use App\User;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $roles = Role::all();
        $permission = Permission::all();
        $user = User::find(Auth::user()->id);
        return view('auth.roles', compact('user','permission','roles'));
    }
    public function create(Request $request)
    {
        if (Auth::user()->can('role_create')) {
            if (!empty($request) && (trim($request->name,' ') != '') ) {
                $db_role = Role::where('name',$request->name)->first();
                if ($db_role == null) {
                    $newRole = new Role();
                    $newRole->name         = $request->name;
                    $newRole->display_name = $request->display_name; // optional
                    $newRole->description  = $request->description; // optional
                    $newRole->save();                  
                }else{
                    return  redirect()->back()->with('msg','Tên role này đã tồn tại.');
                }
                $per = $request->permission;
                foreach ($per as $value) {
                    $db_per = Permission::where('name',$value)->first();
                    if ($db_per != null) {
                        $newRole->attachPermission($db_per);
                        return  redirect()->back()->with('msg','Thêm role và gán quyền thành công.');
                    }else{
                        return  redirect()->back()->with('msg','Bạn không có quyền này.');
                    }
                }
            }else{
                return  redirect()->back()->with('msg','Tên role không hợp lệ.');  
            }
        }
    }
    public function delete(Request $request){
        if (Auth::user()->can('role_delete')) {
            $role = Role::findOrFail($request->role_id);
            $role->delete();
            $role->users()->sync([]); 
            $role->perms()->sync([]); 
            $role->forceDelete(); 
            return  redirect()->back()->with('msg','Deleted.');
        }else{
            return  redirect()->back()->with('msg','Bạn không có đủ thẩm quyền để thực hiện tác vụ này.');
        }
    }
    public function users(){
        $users = User::all();
        return view('auth.users', compact('users'));
    }
}