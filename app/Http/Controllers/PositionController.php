<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Auth;
class PositionController extends Controller
{
    public function getList()
    {
        if (Auth::user()->can('position_show')){
        	$position = Position::orderBy('created_at', 'desc')->get();
        	return view('position.list', ['position' => $position]);
        }else{
            return redirect('home');
        }
    }

    public function postAdd(Request $request)
    {
    	$message = ['name.required' => 'Bạn chưa nhập tên chức vụ',
                    'name.min'      => 'Tên chức vụ ít nhất phải 3 ký tự',
                    'name.unique'	=> 'Tên chức vụ bị trùng',
                    'description.required' => 'Bạn chưa nhập mã chức vụ',
                    'description.unique'   => 'Mã chức vụ bị trùng'  
                   ];
        $validation = Validator::make( Input::all(), [
                               'name' => 'required|min:3|unique:position,name',
                               'description' => 'required|unique:position,code'
                            ], $message);

        if( $validation->fails() )
	      {
	        return json_encode([
	                'errors' => $validation->errors()->getMessages(),
	                'code' => 200
	             ]);
	      }else{
	      	$position = new Position;
	    	$position->name = $request->name;
	    	$position->code = $request->description;
	    	$position->save();

            return json_encode([
                    'success' => 'success'
                 ]);
	      }
    }
    
    public function getEdit($id)
    {
        if (Auth::user()->can('position_show')){
            $position = Position::find($id);
            return view('position.edit', ['position' => $position]);
        }else{
            return redirect('home');
        }
    }
    public function postEdit(Request $request)
    {
    	$message = ['name.required' => 'Bạn chưa nhập tên chức vụ',
                    'name.min'      => 'Tên chức vụ ít nhất phải 3 ký tự',
                    'name.unique'	=> 'Tên chức vụ bị trùng',
                    'code.required' => 'Bạn chưa nhập mã chức vụ',
                    'code.unique'   => 'Mã chức vụ bị trùng'
                   ];
        $validation = Validator::make( Input::all(), [
                               'name' => ['required', Rule::unique('position')->ignore($request->id, 'id'), 'min:3'],
                               'code' => ['required', Rule::unique('position')->ignore($request->id, 'id')],
                            ], $message);

        if( $validation->fails() )
	    {
	        return json_encode([
	                'errors' => $validation->errors()->getMessages(),
	                'code' => 200
	             ]);
	    }else{
	    	$position = Position::find($request->id);
	    	$position->name = $request->name;
	    	$position->code = $request->code;
	    	$position->save();

	    	$newdata = Position::find($request->id)->toJson();
	    	return $newdata;
    	}
    }

    public function postDelete(Request $request)
    {
    	$position = Position::find($request->id);
    	$position->delete();
    }
}
