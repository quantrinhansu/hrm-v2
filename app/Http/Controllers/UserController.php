<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\UserDepartment;
use Auth;
use App\Position;
use App\JobType;
use App\UserPositionJobtype;
use App\EmployeeRelative;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile', ['user' => User::findOrFail(Auth::user()->id)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return view('profile', ['user' => User::findOrFail($id)]);
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

    public function autocomplete(Request $request){
        $term = $request->term;
        $uData = User::where('username', 'LIKE', '%'.$term.'%')->take(10)->get();
       
        $result = array();
        foreach ($uData as $key => $value) {
            //$uDepa = UserDepartment::where('user_id', $value->id)->first();
            //$depa = DepartmentController::getDepartmentInfo($uDepa->department_id);
            //$data = $value->username.'['.$value->id.' - '.$value->first_name.' '.$value->last_name.' - '.$depa->name.']';
            array_push($result, $value->username);
        }
        return $result;
    }
    public function getList()
    {
        $user = User::all();
        return view('employee.list', ['user' => $user]);
    }

    public function getAdd()
    {
        $department = Department::all();
        $position = Position::all();
        $jobtype = JobType::all();
        return view('employee.add', ['department' => $department, 'position' => $position, 'jobtype' => $jobtype]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
                'name'                  =>  'required',
                'email'                 =>  'required|email|unique:users,email',
                'username'              => 'required|unique:users,username',
                ],[
                'name.required'         => 'Bạn chưa nhập họ tên',
                'email.required'        => 'Bạn chưa nhập email',
                'email.email'           => 'Không đúng định dạng email',
                'email.unique'           => 'Email bị trùng',
                'username.required'     => 'Bạn chưa nhập username', 
                'username.unique'       => 'Username bị trùng'            
                ]);

        if($request->birthday){
            $birthday = Carbon::createFromFormat('d/m/Y', $request->birthday)->toDateString();
        }else{
            $birthday = null;
        }

        if($request->joining_date){
            $joining_date = Carbon::createFromFormat('d/m/Y', $request->joining_date)->toDateString();
        }else{
            $joining_date = null;
        }

        if($request->date_CMND){
            $date_CMND = Carbon::createFromFormat('d/m/Y', $request->date_CMND)->toDateString();
        }else{
            $date_CMND = null;
        }

        DB::beginTransaction();

        try {
            $user = new User;
            $user->username              = $request->username;
            $user->email             = $request->email;
            $user->password          = bcrypt('123456');
            $user->active            = 1;
            $user->gender            = $request->gender;
            $user->avatar            = "";
            $user->name              = $request->name;
            $user->permanent_address = $request->permanent_address;
            $user->present_address   = $request->present_address;
            $user->date_of_birth    = $birthday;
            $user->joining_date      = $joining_date;
            $user->nationality       = $request->nationality;
            $user->ethnic            = $request->ethnic;
            $user->phone_number      = $request->phone_number;
            $user->bank_account_name = $request->bank_account_name;
            $user->bank_name         = $request->bank_name;
            $user->CMND              = $request->CMND;
            $user->date_CMND         = $date_CMND;
            $user->address_CMND      = $request->address_CMND;
            $user->save();

            $user_id = $user->id;
            $user_department = new UserDepartment;
            $user_department->user_id = $user_id;
            $user_department->department_id = $request->department;
            $user_department->save();

            $user_position_jobtype = new UserPositionJobtype;
            $user_position_jobtype->user_id = $user_id;
            $user_position_jobtype->position_id = $request->position;
            $user_position_jobtype->jobtype_id = $request->job_type;
            $user_position_jobtype->save();

            $employee_relative = new EmployeeRelative;
            $employee_relative->full_name = $request->relative_name;
            $employee_relative->address = $request->relative_address;
            $employee_relative->phone_number = $request->relative_phone_number;
            $employee_relative->relation = $request->relative_relation;
            $employee_relative->user_id = $user_id;
            $employee_relative->save();

             DB::commit();
            return redirect('employee/add')->with('thongbao', 'Bạn đã thêm thành công');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        $department = Department::all();
        $position = Position::all();
        $jobtype = JobType::all();
        return view('employee.edit', ['department' => $department, 'position' => $position, 'jobtype' => $jobtype, 'user' => $user]);
    }

    public function postEdit(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request, [
                'name'                  =>  'required',
                'email' => ['required', Rule::unique('users')->ignore($id, 'id'), 'email'],
                'username' => ['required', Rule::unique('users')->ignore($id, 'id')],
                ],[
                'name.required'         => 'Bạn chưa nhập họ tên',
                'email.required'        => 'Bạn chưa nhập email',
                'email.email'           => 'Không đúng định dạng email',
                'email.unique'           => 'Email bị trùng',
                'username.required'     => 'Bạn chưa nhập username', 
                'username.unique'       => 'Username bị trùng'            
                ]);

        if($request->birthday){
            $birthday = Carbon::createFromFormat('d/m/Y', $request->birthday)->toDateString();
        }else if($request->birthday ==null){
            $birthday = null;
        }

        if($request->joining_date){
            $joining_date = Carbon::createFromFormat('d/m/Y', $request->joining_date)->toDateString();
        }else if($request->joining_date ==null){
            $joining_date = null;
        }

        if($request->date_CMND){
            $date_CMND = Carbon::createFromFormat('d/m/Y', $request->date_CMND)->toDateString();
        }else if($request->date_CMND ==null){
            $date_CMND = null;
        }

         DB::beginTransaction();

        try {
            $user = User::find($id);
            $user->username              = $request->username;
            $user->email             = $request->email;
            $user->gender            = $request->gender;
            $user->avatar            = "";
            $user->name              = $request->name;
            $user->permanent_address = $request->permanent_address;
            $user->present_address   = $request->present_address;
            $user->date_of_birth     = $birthday;
            $user->joining_date      = $joining_date;
            $user->nationality       = $request->nationality;
            $user->ethnic            = $request->ethnic;
            $user->phone_number      = $request->phone_number;
            $user->bank_account_name = $request->bank_account_name;
            $user->bank_name         = $request->bank_name;
            $user->CMND              = $request->CMND;
            $user->date_CMND         = $date_CMND;
            $user->address_CMND      = $request->address_CMND;
            $user->save();

            if(count(UserDepartment::where('user_id', $id)->get())){
                $user_department = UserDepartment::where('user_id', $id)->update(['department_id' => $request->department]);

            }else{
                $user_department = new UserDepartment;
                $user_department->user_id = $id;
                $user_department->department_id = $request->department;
                $user_department->save();   
            }
            
            if(count(UserPositionJobtype::where('user_id', $id)->get()))
            {
                 $user_position_jobtype = UserPositionJobtype::where('user_id', $id)->update(['position_id' => $request->position, 'jobtype_id' => $request->job_type]);
             }else{
                $user_position_jobtype = new UserPositionJobtype;
                $user_position_jobtype->user_id = $id;
                $user_position_jobtype->position_id = $request->position;
                $user_position_jobtype->jobtype_id = $request->job_type;
                $user_position_jobtype->save();
             }

            if(count(EmployeeRelative::where('user_id', $id)->get()))
            {
                $employee_relative = EmployeeRelative::where('user_id', $id)->update(['full_name' => $request->relative_name, 'address' => $request->relative_address, 'phone_number' => $request->relative_phone_number, 'relation' => $request->relative_relation]);
            }else{
                $employee_relative = new EmployeeRelative;
                $employee_relative->full_name = $request->relative_name;
                $employee_relative->address = $request->relative_address;
                $employee_relative->phone_number = $request->relative_phone_number;
                $employee_relative->relation = $request->relative_relation;
                $employee_relative->user_id = $id;
                $employee_relative->save();
            }
            
             DB::commit();
            return redirect('employee/edit/' . $id)->with('thongbao', 'Bạn đã sửa thành công');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function postDelete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
    }
}
