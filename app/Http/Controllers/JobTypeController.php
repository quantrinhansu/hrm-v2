<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobType;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Auth;
class JobTypeController extends Controller
{
    public function getList()
    {
        if (Auth::user()->can('jobtype_show')){
        	$job_type = JobType::orderBy('created_at', 'desc')->get();
        	return view('job_type.list', ['job_type' => $job_type]);
        }
    }

    public function postAdd(Request $request)
    {
    	$message = ['name.required' => 'Bạn chưa nhập tên chuyên môn',
                    'name.min'      => 'Tên chuyên môn ít nhất phải 3 ký tự',
                    'name.unique'   => 'Tên chuyên môn bị trùng',
                    'description.required' => 'Bạn chưa nhập mã chuyên môn',
                    'description.unique'   => 'Mã chuyên môn bị trùng'  
                   ];
        $validation = Validator::make( Input::all(), [
                               'name' => 'required|min:3|unique:job_type,name',
                               'description' => 'required|unique:job_type,code'
                            ], $message);


        if( $validation->fails() )
	      {
	        return json_encode([
	                'errors' => $validation->errors()->getMessages(),
	                'code' => 200
	             ]);
	      }else{
	      	$jobtype = new JobType;
	    	$jobtype->name = $request->name;
	    	$jobtype->code = $request->description;
	    	$jobtype->save();

	    	return json_encode([
                    'success' => 'success'
                 ]);
	      }
    }

    public function getEdit($id)
    {
        //if (Auth::user()->can('jobtype_edit')){
            $jobtype = JobType::find($id);
            return view('job_type.edit', ['jobtype' => $jobtype]);
        //}
    }
    public function postEdit(Request $request)
    {
    	$message = ['name.required' => 'Bạn chưa nhập tên chuyên môn',
                    'name.min'      => 'Tên chuyên môn ít nhất phải 3 ký tự',
                    'name.unique'   => 'Tên chuyên môn bị trùng',
                    'code.required' => 'Bạn chưa nhập mã chuyên môn',
                    'code.unique'   => 'Mã chuyên môn bị trùng'
                   ];
        $validation = Validator::make( Input::all(), [
                               'name' => ['required', Rule::unique('job_type')->ignore($request->id, 'id'), 'min:3'],
                               'code' => ['required', Rule::unique('job_type')->ignore($request->id, 'id')],
                            ], $message);

        if( $validation->fails() )
	    {
	        return json_encode([
	                'errors' => $validation->errors()->getMessages(),
	                'code' => 200
	             ]);
	    }else{
	    	$jobtype = JobType::find($request->id);
	    	$jobtype->name = $request->name;
	    	$jobtype->code = $request->code;
	    	$jobtype->save();

	    	$newdata = JobType::find($request->id)->toJson();
	    	return $newdata;
    	}
    }

    public function postDelete(Request $request)
    {
        if (Auth::user()->can('jobtype_delete')){
        	$jobtype = JobType::find($request->id);
        	$jobtype->delete();
        }
    }
}
