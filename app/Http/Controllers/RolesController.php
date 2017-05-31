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

            // $add = new Permission();
            // $add->name         = 'add';
            // $add->display_name = 'Thêm mới'; // optional
            // $add->description  = 'Thêm mới nghỉ phép'; // optional
            // $add->save();
            $per = $request->permission;
            foreach ($per as $value) {
                $db_per = Permission::where('name',$value)->first();
                if ($db_per != null) {
                    $newRole->attachPermission($db_per);
                    return  redirect()->back()->with('msg','Thêm role và gán quyền thành công.');
                }else{
                    return  redirect()->back()->with('msg','Chưa có Permission này.');
                }
            }

            //$newRole->attachPermission($add);
        }else{
            return  redirect()->back()->with('msg','Tên role không hợp lệ.');  
        }

    }    
}