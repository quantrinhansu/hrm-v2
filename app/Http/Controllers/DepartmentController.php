<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\User;
use App\UserDepartment;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Auth;
class DepartmentController extends Controller
{
    public function getList()
    {
        //if (Auth::user()->can('department_show')){
        	$department = Department::all();
            $manager_department = UserDepartment::where('manager', 1)->get();
        	return view('department.list', ['department' => $department, 'manager_department' => $manager_department]);
        //}
    }

    public function getAdd()
    {
        if (Auth::user()->can('department')){
        	$user = User::leftJoin('users_department', 'users.id', '=', 'users_department.user_id')->where('users_department.department_id', null)->select('users.id', 'users.name', 'users.username', 'users.gender')->get();
        	return view('department.add_department', ['user' => $user]);
        }else{
            return redirect('home');
        }
    }
    public function postAdd(Request $request)
    {
    	$message = ['name.required' => 'Bạn chưa nhập tên phòng ban',
                    'name.min'      => 'Tên phòng ban ít nhất phải 3 ký tự',
                    'name.unique'	=> 'Tên phòng ban bị trùng',
                    'code.required' => 'Bạn chưa nhập mã phòng ban',
                    'code.unique'   => 'Mã phòng ban bị trùng'  
                   ];
        $validation = Validator::make( Input::all(), [
                               'name' => 'required|min:3|unique:departments,name',
                               'code' => 'required|unique:departments,code'
                            ], $message);

        if( $validation->fails() )
	      {
	        return json_encode([
	                'errors' => $validation->errors()->getMessages(),
	                'code' => 200
	             ]);
	      }

      	$department = new Department;
    	$department->name = $request->name;
    	$department->code = $request->code;
    	$department->save();

        //$user = User::where('', $request->manager)->get();
    	$username = $request->manager;
        $space = strpos($username, " ");
        $username = substr($username, 0, $space);

        $id_user = User::where('username', $username)->value('id');

    	$user_department = new UserDepartment;
    	$user_department->user_id = $id_user;
    	$user_department->department_id = $department->id;
    	$user_department->manager = 1;
    	$user_department->save();

        return json_encode('success');
    }

    public function getDetail($id)
    {
        //if (Auth::user()->can('department_detail')){
        	$department = Department::find($id);
            $user_department = UserDepartment::where('department_id', $id)->get();
        	$manager = UserDepartment::where('department_id', $id)
                                        ->where('manager', 1)->value('user_id');
            $manager = User::where('id', $manager)->value('name');
        	$count_employee = count(UserDepartment::where('department_id', $id)->get());
        	return view('department.detail', ['department' => $department, 'user_department' => $user_department, 'count_employee' => $count_employee, 'manager' => $manager]);
        //}
    }

    public function getAddEmployee($id)
    {
        if (Auth::user()->can('department')){
        	$user = User::leftJoin('users_department', 'users.id', '=', 'users_department.user_id')->where('users_department.department_id', null)
        	 							   ->where('users_department.manager', null)
        	 	->select('users.id', 'users.name', 'users.username', 'users.gender')->get();
        	 $department = Department::find($id);
        	return view('department.add_employee', ['user' => $user, 'department' => $department]);
        }else{
            return redirect('home');
        }
    }

    public function postAddEmployee($id, Request $request)
    {
    	$this->validate($request, 
    		['employee' => 'required'], 
    		['employee.required' => 'Bạn chưa chọn nhân viên thêm vào phòng']);

    	$all_id = $request->employee;
    	foreach ($all_id as $employee_id) {
    		$user_department = new UserDepartment;
    		$user_department->user_id = $employee_id;
    		$user_department->department_id = $id;
    		$user_department->save();
    	}
    	return redirect('department/detail/' . $id);
    }

    public function postEdit(Request $request)
    {
        $message = ['name.required' => 'Bạn chưa nhập tên phòng',
                    'name.min'      => 'Tên phòng ít nhất phải 3 ký tự',
                    'name.unique'   => 'Tên phòng bị trùng',
                    'code.required' => 'Bạn chưa nhập mã phòng',
                    'code.unique'   => 'Mã phòng bị trùng'
                   ];
        $validation = Validator::make( Input::all(), [
                               'name' => ['required', Rule::unique('departments')->ignore($request->department_id, 'id'), 'min:3'],
                               'code' => ['required', Rule::unique('departments')->ignore($request->department_id, 'id')],
                            ], $message);

        if( $validation->fails() )
        {
            return json_encode([
                    'errors' => $validation->errors()->getMessages(),
                    'code' => 200
                 ]);
        }

        $department = Department::find($request->department_id);
        $department->code = $request->code;
        $department->name = $request->name;
        //$department->manager_id = $request->manager;
        $department->save();

        $user_department_manager = UserDepartment::where('department_id', $request->department_id)
                                          ->where('manager', 1)
                                        ->update(['manager' =>  Null]);

        $user_department = UserDepartment::where('department_id', $request->department_id)
                                          ->where('user_id', $request->manager)
                                        ->update(['manager' =>  1]);
    	
    	/*$user_department = UserDepartment::where('department_id', $request->department_id)->update(['user_id' =>  $request->manager]);*/

        $arr = array();
        $newdata = Department::where('id', $request->department_id)->get();
        $user = User::where('id', $request->manager)->get();

        foreach ($user as $value) {
            $arr['user_name'] = $value['name'];
        }
        foreach ($newdata as $key => $value) {
            $arr['name'] = $value['name'];
            $arr['code'] = $value['code'];
            $arr['manager_id'] = $value['manager_id'];
        }

        return json_encode($arr);
    }

    public function getEdit($id)
    {
        if (Auth::user()->can('department')){
            $user = User::join('users_department', 'users.id', '=', 'users_department.user_id')->where('users_department.department_id', $id)
                ->select('users.id', 'users.name', 'users.username', 'users.gender', 'users_department.manager')->get();
            $department = Department::find($id);
            return view('department.edit_department', ['user' => $user, 'department' => $department]);
        }else{
            return redirect('home');
        }
    }

    public function postDelete(Request $request)
    {
        $user_department = UserDepartment::where('department_id', $request->id)->delete();
        $department = Department::find($request->id);
        $department->delete();
    }

    public function getEditEmployee($id)
    {
        if (Auth::user()->can('department')){
        	$user = User::leftJoin('users_department', 'users.id', '=', 'users_department.user_id')->where('users_department.department_id', null)
        								  ->orwhere('users_department.department_id', $id)
        								  ->where('users_department.manager', null)
        	->select('users.id', 'users.name', 'users.username', 'users.gender')->get();
        	$department = Department::find($id);
        	$user_department = UserDepartment::where('department_id', $id)->get();
        	return view('department.edit_employee', ['user' => $user, 'department' => $department, 'user_department' => $user_department]);
        }else{
            return redirect('home');
        }
    }

    public function postEditEmployee($id, Request $request)
    {
    	$this->validate($request, 
    		['employee' => 'required'], 
    		['employee.required' => 'Bạn chưa chọn nhân viên thêm vào phòng']);

    	$user_department = UserDepartment::where('department_id', $id)
    									   ->where('manager', null)->get();
    	$old_user_department = array();
    	foreach ($user_department as $value) {
    		$old_user_department[] = $value['user_id'];
    	}

    	$new_user_department = $request->employee;

    	//Xoá những user bị bỏ tick
    	$delete_old_user_department = checkArrayold($old_user_department, $new_user_department);

    	foreach ($delete_old_user_department as $value) {
    		$delete_user = UserDepartment::where('user_id', $value)->delete();
    	}

    	//Thêm user mới vào phòng
    	if(!empty($new_user_department)){
    		$add_employee = checkArraynew($old_user_department, $new_user_department);
    		foreach ($add_employee as $value) {
    			$add_user_department = new UserDepartment;
    			$add_user_department->user_id = $value;
    			$add_user_department->department_id = $id;
    			$add_user_department->save();
    		}
    	}
    	return redirect('department/detail/edit-employee/' . $id)->with('thongbao', 'Bạn đã sửa thành công');
    }
}
