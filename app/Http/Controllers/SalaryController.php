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
    	return view('salary.salary', compact('users'));
    }

    public function allowance(){
    	$allowance = Allowance::all();
    	return view('salary.allowance', compact('allowance'));
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
}
