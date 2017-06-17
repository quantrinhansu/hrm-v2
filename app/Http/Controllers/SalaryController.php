<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Salary;
use App\Allowance;
use App\Salary_allowance;


class SalaryController extends Controller
{
    public function index(){
    	$users = User::all();
        $allowances = Allowance::all();
        
        return view('salary.salary', compact('users','allowances'));
        
    	
    }

    public function allowance(){
    	$allowances = Allowance::all();
    	return view('salary.allowance', compact('allowances'));
    }

    public function allowance_add(Request $request){
        if ($request) {
            $allowance = new Allowance();
            $allowance->name = $request->name;
            $allowance->type = $request->type;
            $allowance->save();
            return  redirect()->back()->with('msg','Đã thêm phụ cấp.');            
        }
    }

    public function allowance_delete(Request $request){
        if ($request) {
            $allowance = Allowance::findOrFail($request->id);
            $allowance->delete();
        }
    }

    public function allowance_update(Request $request){
        if ($request) {
            $allowance = Allowance::findOrFail($request->id)->update(array('name' => $request->name,'type' => $request->type));
            if ($allowance) {
                return  redirect()->back()->with('msg','Đã cập nhật.'); 
            }
            return  redirect()->back()->with('msg','Không thể cập nhật.');         
        }
    }    



    public static function getAllowances($user_id){
        $allowances = Salary_allowance::where('user_id',$user_id)->get();
        return $allowances;
    }

    public static function getAllowance($allowance_id){
        $allowance = Allowance::where('id',$allowance_id)->get();
        return $allowance;
    }

    public static function getBaseSalaryOfUser($id){
    	$salary = Salary::where('user_id',$id)->first();
    	return $salary['base_salary'];
    }

    public static function getTotalSalaryAllowance($user_id){
    	$out = Salary_allowance::where('user_id', $user_id)->sum('value');
    	return $out;
    }
    public static function getTotalSalaryAllowanceWithoutInsurrance($user_id, $value=false){
    	$out = DB::select('SELECT * FROM `salary_allowance` WHERE (user_id = '.$user_id.' AND allowance_id IN (SELECT id FROM `allowance` WHERE type=\'0\'))');
    	if ($value == true) {
    		$Salary_No_Ins_val = 0;
    		foreach ($out as $key => $value) {
    			$Salary_No_Ins_val += (int)$value->value;
    		}
    		return $Salary_No_Ins_val;
    	}
    	return $out;
    }

    public static function getTotalSalaryAllowanceWithInsurrance($user_id, $value=false){
    	$out = DB::select('SELECT * FROM `salary_allowance` WHERE (user_id = '.$user_id.' AND allowance_id IN (SELECT id FROM `allowance` WHERE type=\'1\'))');
    	if ($value == true) {
    		$Salary_With_Ins_val = 0;
    		foreach ($out as $key => $value) {
    			$Salary_With_Ins_val += (int)$value->value;
    		}
    		return $Salary_With_Ins_val;
    	}
    	return $out;
    }

    public static function getTotalSalary($user_id){
    	$base_salary = SalaryController::getBaseSalaryOfUser($user_id);
    	$Salary_No_Ins_val = SalaryController::getTotalSalaryAllowanceWithoutInsurrance($user_id,true);
    	$Salary_With_Ins_val = SalaryController::getTotalSalaryAllowanceWithInsurrance($user_id,true);
    	return $Salary_No_Ins_val + $Salary_With_Ins_val + (int)$base_salary;
    }
    public static function getRealSalary($user_id){
    	return SalaryController::getTotalSalary($user_id)*(/*(int)Timekeeping::getWorkday($user_id)/26*/ 1);
    }
    public static function getPersonalIncomeWithInsurrance($user_id){
    	return (int)(SalaryController::getTotalSalary($user_id) - SalaryController::getTotalSalaryAllowanceWithoutInsurrance($user_id,true));
    }

    public static function getSalaryForInsurrance($user_id){
        return (int)(SalaryController::getBaseSalaryOfUser($user_id) + SalaryController::getTotalSalaryAllowanceWithInsurrance($user_id, true));
    }

    public static function getWeekday($date){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
            $timestamp = strtotime($date);
            $date = getdate($timestamp);
            $weekday = strtolower($date['weekday']);

            switch($weekday) {
                case 'monday':
                    $weekday = 'Thứ hai';
                    break;
                case 'tuesday':
                    $weekday = 'Thứ ba';
                    break;
                case 'wednesday':
                    $weekday = 'Thứ tư';
                    break;
                case 'thursday':
                    $weekday = 'Thứ năm';
                    break;
                case 'friday':
                    $weekday = 'Thứ sáu';
                    break;
                case 'saturday':
                    $weekday = 'Thứ bảy';
                    break;
                default:
                    $weekday = 'Chủ nhật';
                    break;
            }
        return $weekday;
    }

    public static function getAllDateInMonth($date){
        return cal_days_in_month(CAL_GREGORIAN,6,2017);
    }
}
