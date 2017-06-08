<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract;
use App\Position;
use App\Department;
use App\JobType;
use App\User;
use App\UserDepartment;
use App\UserPositionJobtype;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use PDF;

class ContractController extends Controller
{
	public function getList()
	{
        //if (Auth::user()->can('contract_show')){
    		$contract = Contract::all();
    		return view('contract.list', ['contract'	=> $contract]);
        //}
	}

    public function getExport($id)
    {
        $employee = Contract::where('id', $id)->value('employee');
        $name_employee = User::where('id', $employee)->value('name');
        $fileName = "HopDong_". $name_employee;
        $contract = Contract::find($id);
        $pdf = PDF::loadView('contract.export', ['contract' => $contract]);
        return $pdf->stream($fileName . '.pdf');     
    }

    public function getAdd()
    {
        //if (Auth::user()->can('contract_add')){
        	$position = Position::all();
        	$department = Department::all();
        	$jobtype = JobType::all();
        	return view('contract.add', ['position' => $position, 'department' => $department, 'jobtype' => $jobtype]);
        //}
    }

    public function postAdd(Request $request)
    {
    	$this->validate($request, 
    		[
    			'name'		=>		'required',
    			'birthday'	=>		'required',
    			'CMND'		=>		'required',
    			'date_CMND'	=>		'required',
    			'address_CMND'	=>	'required',
    			'permanent_address'	=> 'required',
    			'present_address'	=> 'required',
    			'code'		=>		'required|unique:contract,code',
    			'name_contract'	=>	'required',
    			'work_description'	=>	'required',
    			'start_contract'	=>	'required',
    			'end_contract'		=>	'required',

    		], [
    			'name.required'				=>		'Bạn chưa nhập tên nhân viên',
    			'birthday.required'			=>		'Bạn chưa nhập ngày sinh',
    			'CMND.required'				=>		'Bạn chưa nhập số CMND',
    			'date_CMND.required'		=>		'Bạn chưa nhập ngày cấp CMND',
    			'address_CMND.required'		=>		'Bạn chưa nhập nơi cấp CMND',
    			'permanent_address.required'		=>		'Bạn chưa nhập nơi đăng ký hộ khẩu',
    			'present_address.required'	=>		'Bạn chưa nhập chỗ ở hiện tại',
    			'code.required'				=>		'Bạn chưa nhập mã hợp đồng',
    			'code.unique'				=>		'Mã hợp đồng bị trùng',
    			'name_contract.required'				=>		'Bạn chưa nhập tên hợp đồng',
    			'work_description.required'				=>		'Bạn chưa nhập công việc phải làm',
    			'start_contract.required'				=>		'Bạn chưa nhập ngày bắt đầu hợp đồng',
    			'end_contract.required'				=>		'Bạn chưa nhập ngày kết thúc hợp đồng',
    		]);
    	
    	 $birthday = Carbon::createFromFormat('d/m/Y', $request->birthday)->toDateString();
    	 $date_CMND = Carbon::createFromFormat('d/m/Y', $request->date_CMND)->toDateString();
    	 $start_contract = Carbon::createFromFormat('d/m/Y', $request->start_contract)->toDateString();
    	 $end_contract = Carbon::createFromFormat('d/m/Y', $request->end_contract)->toDateString();

    	DB::beginTransaction();

        try {
        $username = getUsername($request->name);
    	$user = new User;
        $user->username             = $username;
    	$user->name 				= $request->name;
    	$user->date_of_birth 		= $birthday;
    	$user->gender 				= $request->gender;
    	$user->CMND 				= $request->CMND;
    	$user->date_CMND 			= $date_CMND;
    	$user->address_CMND 		= $request->address_CMND;
    	$user->permanent_address 	= $request->permanent_address;
    	$user->present_address 		= $request->present_address;
    	$user->save();

    	$user_department	= 	new UserDepartment;
    	$user_department->user_id	=	$user->id;
    	$user_department->department_id	= $request->department;
    	$user_department->save();

    	$user_position_jobtype		=	new UserPositionJobtype;
    	$user_position_jobtype->user_id	=	$user->id;
    	$user_position_jobtype->position_id	=	$request->position;
    	$user_position_jobtype->jobtype_id	=	$request->jobtype;
    	$user_position_jobtype->save();

    	$contract 	= 	new Contract;
    	$contract->create_by	=	Auth::User()->id;
    	$contract->employee		=	$user->id;
    	$contract->code 		= 	$request->code;
    	$contract->name 		= 	$request->name_contract;
    	if($request->type_contract != 'other')
    	{
    		$contract->type 		= 	$request->type_contract;
    	}else{
    		$contract->type 		= $request->other;
    	}
    	
    	$contract->work_description 	= $request->work_description;
    	$contract->from 		= $start_contract;
    	$contract->to 			= $end_contract;
    	$contract->save();

    	DB::commit();

    	return redirect('contract/add')->with('thongbao', 'Bạn đã tạo hợp đồng thành công');

    	} catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function getEdit($id)
    {
        //if (Auth::user()->can('contract_edit')){
        	$contract = Contract::find($id);
        	$position = Position::all();
        	$department = Department::all();
        	$jobtype = JobType::all();
        	return view('contract.edit', ['contract' => $contract, 'position'	=> $position, 'department'	=> $department, 'jobtype'	=> $jobtype]);
        //}
    }

    public function postEdit(Request $request, $id)
    {
    	
    	$this->validate($request, 
    		[
    			'name'		=>		'required',
    			'birthday'	=>		'required',
    			'CMND'		=>		'required',
    			'date_CMND'	=>		'required',
    			'address_CMND'	=>	'required',
    			'permanent_address'	=> 'required',
    			'present_address'	=> 'required',
    			'code' => ['required', Rule::unique('contract')->ignore($id, 'id')],
    			'name_contract'	=>	'required',
    			'work_description'	=>	'required',
    			'start_contract'	=>	'required',
    			'end_contract'		=>	'required',

    		], [
    			'name.required'				=>		'Bạn chưa nhập tên nhân viên',
    			'birthday.required'			=>		'Bạn chưa nhập ngày sinh',
    			'CMND.required'				=>		'Bạn chưa nhập số CMND',
    			'date_CMND.required'		=>		'Bạn chưa nhập ngày cấp CMND',
    			'address_CMND.required'		=>		'Bạn chưa nhập nơi cấp CMND',
    			'permanent_address.required'		=>		'Bạn chưa nhập nơi đăng ký hộ khẩu',
    			'present_address.required'	=>		'Bạn chưa nhập chỗ ở hiện tại',
    			'code.required'				=>		'Bạn chưa nhập mã hợp đồng',
    			'code.unique'				=>		'Mã hợp đồng bị trùng',
    			'name_contract.required'				=>		'Bạn chưa nhập tên hợp đồng',
    			'work_description.required'				=>		'Bạn chưa nhập công việc phải làm',
    			'start_contract.required'				=>		'Bạn chưa nhập ngày bắt đầu hợp đồng',
    			'end_contract.required'				=>		'Bạn chưa nhập ngày kết thúc hợp đồng',
    		]);
    	
    	 $birthday = Carbon::createFromFormat('d/m/Y', $request->birthday)->toDateString();
    	 $date_CMND = Carbon::createFromFormat('d/m/Y', $request->date_CMND)->toDateString();
    	 $start_contract = Carbon::createFromFormat('d/m/Y', $request->start_contract)->toDateString();
    	 $end_contract = Carbon::createFromFormat('d/m/Y', $request->end_contract)->toDateString();

    	DB::beginTransaction();

        try {

        $user_id = Contract::where('id', $id)->value('employee');

    	$user = User::find($user_id);
    	$user->name 				= $request->name;
    	$user->date_of_birth 		= $birthday;
    	$user->gender 				= $request->gender;
    	$user->CMND 				= $request->CMND;
    	$user->date_CMND 			= $date_CMND;
    	$user->address_CMND 		= $request->address_CMND;
    	$user->permanent_address 	= $request->permanent_address;
    	$user->present_address 		= $request->present_address;
    	$user->save();

    	$user_department	=  UserDepartment::where('user_id', $user_id)->update(['department_id' => $request->department]);

    	$user_position_jobtype		= UserPositionJobtype::where('user_id', $user_id)->update(['position_id' => $request->position, 'jobtype_id' => $request->jobtype]);

    	$contract 	= 	Contract::find($id);
    	$contract->code 		= 	$request->code;
    	$contract->name 		= 	$request->name_contract;
    	if($request->type_contract != 'other')
    	{
    		$contract->type 		= 	$request->type_contract;
    	}else{
    		$contract->type 		= $request->other;
    	}
    	
    	$contract->work_description 	= $request->work_description;
    	$contract->from 		= $start_contract;
    	$contract->to 			= $end_contract;
    	$contract->save();

    	DB::commit();

    	return redirect('contract/edit/' . $id)->with('thongbao', 'Bạn đã tạo hợp đồng thành công');

    	} catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function postDelete(Request $request)
    {
        $user_id = Contract::where('id', $request->id)->value('employee');
        $user    = User::where('id', $user_id)->delete();
    	//$contract = Contract::find($request->id);
    	//$contract->delete();
    }
}
