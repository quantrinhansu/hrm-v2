<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessTrip;
use App\UserDepartment;
use App\Department;
use App\UserPositionJobtype;
use App\User;
use Carbon\Carbon;
use Auth;
class BusinessTripController extends Controller
{
    public function getList()
    {
        //if (Auth::user()->can('business_trip_show')){
            $business_trip = BusinessTrip::all();
            return view('business_trip.list', ['business_trip' => $business_trip]);
        //}	
    }

    public function getAdd()
    {
        //if (Auth::user()->can('business_trip_add')){
    	   return view('business_trip.add');
        //}
    }

    public function postAjax(Request $request)
    {
        $username   = $request->username;
        $space      = strpos($username, " ");
        $username   = substr($username, 0, $space);
        
        $id_user    = User::where('username', $username)->value('id');
        $name       = User::where('username', $username)->value('name');
        
        $department = UserDepartment::join('departments', 'users_department.department_id', 'departments.id')->where('users_department.user_id', $id_user)->value('name');
        
        $position   = UserPositionJobtype::join('position', 'user_position_jobtype.position_id', 'position.id')->where('user_position_jobtype.user_id', $id_user)->value('name');
    	
    	$newdata = array();
    	$newdata['name'] = $name;
    	$newdata['department'] = $department;
    	$newdata['position'] = $position;
    	return $newdata;
    }

    public function postAdd(Request $request)
    {
    	$this->validate($request, 
    		[
    			'reason' 	=> 'required',
    			'place'		=> 'required',
    			'allowance'	=> 'required',
    			'from'		=> 'required',
    			'to'		=> 'required',
    		], 
    		[
    			'reason.required'	=> 'Bạn chưa nhập lý do',
    			'place.required'	=> 'Bạn chưa nhập địa điểm',
    			'allowance.required' => 'Bạn chưa nhập trợ cấp',
    			'from.required'		=> 'Bạn chưa nhập ngày đi',
    			'to.required'		=> 'Bạn chưa nhập ngày về'
    		]);
    	if($request->from){
            $from = Carbon::createFromFormat('d/m/Y', $request->from)->toDateString();
        }else{
            $from = null;
        }

        if($request->to){
            $to = Carbon::createFromFormat('d/m/Y', $request->to)->toDateString();
        }else{
            $to = null;
        }

    	$username = $request->username;
    	$space = strpos($username, " ");
    	$username = substr($username, 0, $space);

    	$id_user = User::where('username', $username)->value('id');

    	$business_trip = new BusinessTrip;
    	$business_trip->reason = $request->reason;
    	$business_trip->place = $request->place;
    	$business_trip->allowance = $request->allowance;
    	$business_trip->from = $from;
    	$business_trip->to = $to;
    	$business_trip->user_id = $id_user;
    	$business_trip->save();
    	return redirect('business-trip/add')->with('thongbao', 'Bạn đã tạo công tác thành công');
    }

    public function getEdit($id)
    {
        if (Auth::user()->can('business_trip')){
            $business_trip = BusinessTrip::find($id);
            return view('business_trip.edit', ['business_trip' => $business_trip]);
        }else{
            return redirect('home');
        }
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request, 
            [
                'reason'    => 'required',
                'place'     => 'required',
                'allowance' => 'required',
                'from'      => 'required',
                'to'        => 'required',
            ], 
            [
                'reason.required'   => 'Bạn chưa nhập lý do',
                'place.required'    => 'Bạn chưa nhập địa điểm',
                'allowance.required' => 'Bạn chưa nhập trợ cấp',
                'from.required'     => 'Bạn chưa nhập ngày đi',
                'to.required'       => 'Bạn chưa nhập ngày về'
            ]);
        if($request->from){
            $from = Carbon::createFromFormat('d/m/Y', $request->from)->toDateString();
        }else{
            $from = null;
        }

        if($request->to){
            $to = Carbon::createFromFormat('d/m/Y', $request->to)->toDateString();
        }else{
            $to = null;
        }

        $username = $request->username;
        $space = strpos($username, " ");
        $username = substr($username, 0, $space);

        $id_user = User::where('username', $username)->value('id');
        $business_trip = BusinessTrip::find($id);
        $business_trip->reason = $request->reason;
        $business_trip->place = $request->place;
        $business_trip->allowance = $request->allowance;
        $business_trip->from = $from;
        $business_trip->to = $to;
        $business_trip->user_id = $id_user;
        $business_trip->save();

        return redirect('business-trip/edit/' . $id)->with('thongbao', 'Bạn đã sửa công tác thành công');
    }

    public function postDelete(Request $request)
    {
        if (Auth::user()->can('business_trip_show')){
            $id = $request->id;
            $business_trip = BusinessTrip::find($id);
            $business_trip->delete();
        }
    }
}
