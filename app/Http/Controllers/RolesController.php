<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Role;
use App\Permission;
use App\User;
use App\PermissionRole;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if (Auth::user()->can('ACL')){
            $roles      = Role::all();
            $permission = Permission::all();
            $user       = User::find(Auth::user()->id);
            return view('auth.roles', compact('user','permission','roles'));
        }else{
            return redirect('home');
        }
    }
    public function view_edit($id){
        if (Auth::user()->can('ACL')){
            $role = Role::findOrFail($id);
            $per  = Permission::all();
            return view('auth.role.role_edit', compact('per','role'));
        }else{
            return redirect('home');
        }
    }
    public function view_add(){
        if (Auth::user()->can('ACL')){
            $per  = Permission::all();        
            return view('auth.role.role_new',compact('per'));
        }else{
            return redirect('home');
        }
    }
    public function update(Request $request){
        $role = Role::findOrFail($request->id);
        if ($role) {
            $role->name         = $request->name;
            $role->display_name = $request->display_name;
            $role->description  = $request->description;
            $role->save();
        }else{
            return  redirect()->back()->with('msg','Tên của role trùng hoặc không hợp lệ.');
        }
        $pers = Permission::all();
        $per = $request->permission;
        $role->detachPermissions($pers);
        if (count($per) > 0) {
            foreach ($per as $value) {
                $new_per = Permission::where('name',$value)->first();
                $role->attachPermission($new_per);
            }            
        }
        return  redirect()->back()->with('msg','Chỉnh sửa thành công.'); 
    }
    public function create(Request $request){
        //if (Auth::user()->can('role_create') || Auth::user()->hasRole('admin')) {
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
                        return  redirect('/roles')->with('msg','Thêm role và gán quyền thành công.');
                    }else{
                        return  redirect()->back()->with('msg','Bạn không có quyền này.');
                    }
                }
            }else{
                return  redirect()->back()->with('msg','Tên role không hợp lệ.');  
            }
        //}
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
        if (Auth::user()->can('ACL')){
            $users = User::all();
            $roles = Role::all();
            return view('auth.users', compact('users','roles'));
        }else{
            return redirect('home');
        }
    }

    public function users_role_update(Request $request){
        foreach ($request->user as $user) {
            if (!empty($user)) {
                $u_arr     = explode('_', $user);
                $user_id   = (int)$u_arr[1];
                $user_role = (int)$u_arr[2];
                $user_REAL = User::findOrFail($user_id);
                $role_REAL = Role::findOrFail($user_role);
                if ($user_REAL) {
                    $roles = Role::all();
                    foreach ( $roles as $role) {
                        $user_REAL->detachRole($role);
                    }
                    $user_REAL->attachRole($role_REAL);
                }
            }
        }
        return redirect()->back()->with('msg','Tên của role trùng hoặc không hợp lệ.');
    }
}