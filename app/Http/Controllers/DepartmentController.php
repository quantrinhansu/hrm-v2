<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\User;
use App\UserDepartment;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
class DepartmentController extends Controller
{
    public function getList()
    {
    	$department = Department::all();
    	$user = User::all();
    	return view('department.list', ['department' => $department, 'user' => $user]);
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
    	$department->manager_id = $request->manager;
    	$department->save();

    	$newdata = Department::find($department->id)->toJson();
    	return $newdata;
    }

    public function getDetail($id)
    {
    	$department = Department::find($id);
    	$user_department = UserDepartment::where('department_id', $id)->get();
    	$count_employee = count(UserDepartment::where('department_id', $id)->get());
    	return view('department.detail', ['department' => $department, 'user_department' => $user_department, 'count_employee' => $count_employee]);
    }

    public function getAddEmployee($id)
    {
    	 $user = User::leftJoin('users_department', 'users.id', '=', 'users_department.user_id')->where('users_department.department_id', null)->select('users.id', 'users.first_name', 'users.last_name', 'users.username', 'users.gender')->get();
    	 $department = Department::find($id);
    	return view('department.add_employee', ['user' => $user, 'department' => $department]);
    }

    public function postAddEmployee($id, Request $request)
    {
    	$all_id = $request->employee;
    	foreach ($all_id as $employee_id) {
    		$user_department = new UserDepartment;
    		$user_department->user_id = $employee_id;
    		$user_department->department_id = $id;
    		$user_department->save();
    	}
    	return redirect('department/detail/' . $id);
    }

    public function postAjax(Request $request)
    {
        $user = User::all();
        $user_id = $request->id;

        foreach($user as $us)
        {
          echo '<option value="'.$us->id.'"';
          if($us->id == $user_id){
            echo 'selected';
          }
          echo '>'.$us->username.'1</option>';
        }
    }

    public function postEdit(Request $request)
    {
        return $request->all();
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
        $department->manager_id = $request->manager;
        $department->save();

        $arr = array();
       // $newdata = Department::find($request->department_id);
        $newdata = Department::where('id', $request->department_id)->get();
       // echo $request->manager;
        $user = User::where('id', $request->manager)->get();
    
        foreach ($user as $value) {
            $arr['first_name'] = $value['first_name'];
            $arr['last_name']   = $value['last_name'];
        }
        foreach ($newdata as $key => $value) {
            $arr['name'] = $value['name'];
            $arr['code'] = $value['code'];
            $arr['manager_id'] = $value['manager_id'];
        }

        return json_encode($arr);
       // dd($newdata);
       // return $newdata;
    }

    public function getEdit($id)
    {
        $user = User::all();
        $department = Department::find($id);
        return view('department.edit_department', ['user' => $user, 'department' => $department]);
    }
}
