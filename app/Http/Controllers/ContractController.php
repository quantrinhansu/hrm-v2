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
use App\Allowance;
use App\Salary;
use App\Salary_allowance;
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
        $salary_allowance = Salary_allowance::where('user_id', $employee)->get();

        $pdf = PDF::loadView('contract.export', ['contract' => $contract, 'salary_allowance' => $salary_allowance]);
        return $pdf->stream($fileName . '.pdf');     
    }

    public function getAdd($id)
    {
        //if (Auth::user()->can('contract_add')){
        	$position = Position::all();
        	$department = Department::all();
        	$jobtype = JobType::all();
            $user = User::find($id);
            $allowance = Allowance::all();
        	return view('contract.add', ['position' => $position, 'department' => $department, 'jobtype' => $jobtype, 'user' => $user, 'allowance' => $allowance]);
        //}
    }

    public function postAdd(Request $request, $id)
    {
    	$this->validate($request, 
    		[
    			'code'		=>		'required|unique:contract,code',
    			'name_contract'	=>	'required',
    			'work_description'	=>	'required',
    			'start_contract'	=>	'required',
    			'end_contract'		=>	'required',
                'salary'             =>  'required'

    		], [
    			'code.required'				=>		'Bạn chưa nhập mã hợp đồng',
    			'code.unique'				=>		'Mã hợp đồng bị trùng',
    			'name_contract.required'	=>		'Bạn chưa nhập tên hợp đồng',
    			'work_description.required'	=>		'Bạn chưa nhập công việc phải làm',
    			'start_contract.required'	=>		'Bạn chưa nhập ngày bắt đầu hợp đồng',
    			'end_contract.required'		=>		'Bạn chưa nhập ngày kết thúc hợp đồng',
                'salary.required'            =>      'Bạn chưa nhập lương'
    		]);
    	
    	 $start_contract = Carbon::createFromFormat('d/m/Y', $request->start_contract)->toDateString();
    	 $end_contract = Carbon::createFromFormat('d/m/Y', $request->end_contract)->toDateString();

    	DB::beginTransaction();

        try {

    	$user_department	= 	new UserDepartment;
    	$user_department->user_id	=	$id;
    	$user_department->department_id	= $request->department;
    	$user_department->save();

    	$user_position_jobtype		=	new UserPositionJobtype;
    	$user_position_jobtype->user_id	=	$id;
    	$user_position_jobtype->position_id	=	$request->position;
    	$user_position_jobtype->jobtype_id	=	$request->jobtype;
    	$user_position_jobtype->save();

    	$contract 	= 	new Contract;
    	$contract->create_by	=	Auth::User()->id;
    	$contract->employee		=	$id;
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

        $salary = new Salary;
        $salary->user_id = $id;
        $salary->base_salary = $request->salary;
        $salary->save();

       
        $allowance = $request->allowance;
        foreach ($allowance as $key => $al) {
            if($al != null){
                $salary_allowance = new Salary_allowance;
                $salary_allowance->user_id = $id;
                $salary_allowance->allowance_id = $key + 1;
                $salary_allowance->value    =   $al;
                $salary_allowance->save();
            }
        }
    	DB::commit();

    	return redirect('contract');

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
            $allowance = Allowance::all();
            $user_id = Contract::where('id', $id)->value('employee');
            $salary_allowance = Salary_allowance::where('user_id', $user_id)->get();

        	return view('contract.edit', ['contract' => $contract, 'position'	=> $position, 'department'	=> $department, 'jobtype'	=> $jobtype, 'allowance' => $allowance, 'salary_allowance' => $salary_allowance]);
        //}
    }

    public function postEdit(Request $request, $id)
    {
    	
    	$this->validate($request, 
    		[
    			'code' => ['required', Rule::unique('contract')->ignore($id, 'id')],
    			'name_contract'	=>	'required',
    			'work_description'	=>	'required',
    			'start_contract'	=>	'required',
    			'end_contract'		=>	'required',
                'salary'            => 'required',

    		], [
    			'code.required'				=>		'Bạn chưa nhập mã hợp đồng',
    			'code.unique'				=>		'Mã hợp đồng bị trùng',
    			'name_contract.required'				=>		'Bạn chưa nhập tên hợp đồng',
    			'work_description.required'				=>		'Bạn chưa nhập công việc phải làm',
    			'start_contract.required'				=>		'Bạn chưa nhập ngày bắt đầu hợp đồng',
    			'end_contract.required'				=>		'Bạn chưa nhập ngày kết thúc hợp đồng',
                'salary.required'           => 'Bạn chưa nhập lương'
    		]);
    	
    	 $start_contract = Carbon::createFromFormat('d/m/Y', $request->start_contract)->toDateString();
    	 $end_contract = Carbon::createFromFormat('d/m/Y', $request->end_contract)->toDateString();

    	DB::beginTransaction();

        try {

        $user_id = Contract::where('id', $id)->value('employee');

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

        $salary = Salary::where('user_id', $user_id)->update(['base_salary' => $request->salary]);

        $allowance = $request->allowance;

        $query = Salary_allowance::where('user_id', $user_id)->get();
        foreach ($allowance as $key => $al) {
            if($al != null){
                if(count($query->where('allowance_id', $key + 1))){
                    $salary_allowance = Salary_allowance::where('user_id', $user_id)
                                                        ->where('allowance_id', $key + 1)->update(['value' => $al]);
                    $query = Salary_allowance::where('user_id', $user_id)->get();
                }else{
                    $salary_allowance = new Salary_allowance;
                    $salary_allowance->user_id = $user_id;
                    $salary_allowance->allowance_id = $key + 1;
                    $salary_allowance->value    =   $al;
                    $salary_allowance->save();
                }  
            }else{
                $delete_salary_allowance = Salary_allowance::where('user_id', $user_id)
                                                            ->where('allowance_id', $key + 1)->delete();
            }
        }

    	DB::commit();

    	return redirect('contract/edit/' . $id)->with('thongbao', 'Bạn đã sửa hợp đồng thành công');

    	} catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function postDelete(Request $request)
    {
        if (Auth::user()->can('contract_add')){
            $user_id = Contract::where('id', $request->id)->value('employee');
            $salary = Salary::where('user_id', $user_id)->delete();
            $salary_allowance = Salary_allowance::where('user_id', $user_id)->delete();
        	$contract = Contract::find($request->id);
        	$contract->delete();
        }
    }
}
