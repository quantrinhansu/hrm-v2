<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Retribution;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use App\Http\Controllers\HomeController;
use Excel;
class RetributionController extends Controller
{
    public function getList()
    {
        //if (Auth::user()->can('retribution_show')){
        	$retribution = Retribution::all();
        	return view('retribution.list', ['retribution' => $retribution]);
        //}
    }

    public function getExport()
    {
        $fileName = "DanhSachKhenThuong_KyLuat_".date('d-m-Y_H:i:s');
        $retribution = Retribution::all();
        Excel::create($fileName, function($excel) use($retribution){
            $excel->sheet('test1', function($sheet) use($retribution){
                $sheet->loadView('retribution.export', ['retribution' => $retribution]);

                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  14,
                    )
                ));
            });

        })->export('xlsx');  
    }

    public function postAdd(Request $request)
    {
    	$message = ['staff.required' => 'Bạn chưa nhập tên nhân viên',
    				'code.required'  => 'Bạn chưa nhập quyết định',
    				'reason.required' => 'Bạn chưa nhập lý do',
    				'description.required' => 'Bạn chưa nhập hình thức'
                   ];
        $validation = Validator::make( Input::all(), [
                               'staff' => 'required',
                               'code' => 'required',
                               'description' => 'required',
                               'reason'		=> 'required'
                            ], $message);


        if( $validation->fails() )
	      {
	        return json_encode([
	                'errors' => $validation->errors()->getMessages(),
	                'code' => 200
	             ]);
	      }

    	$username = $request->staff;
    	$space = strpos($username, " ");

    	$username = substr($username, 0, $space);

    	$id_user = User::where('username', $username)->value('id');

    	$create_date = Carbon::createFromFormat('d/m/Y', $request->create_date)->toDateString();

    	$retribution 				= new Retribution;
    	$retribution->code 			= $request->code;
    	$retribution->decide 		= $request->decide;
    	$retribution->reason 		= $request->reason;
    	$retribution->description 	= $request->description;
    	$retribution->create_date 	= $create_date;
    	$retribution->user_id 		= $id_user;
    	$retribution->create_by 	= Auth::user()->id;
    	$retribution->save();
// make noti
        $rec_list = array($id_user);
        HomeController::createNoti($rec_list,'KT',$request->decide);
// end
    	return json_encode([
                    'success' => 'success'
                 ]);
    }

    public function getEdit($id)
    {
        if (Auth::user()->can('retribution')){
        	$retribution = Retribution::find($id);
        	return view('retribution.edit', ['retribution' => $retribution]);
        }else{
            return redirect('home');
        }
    }

    public function postEdit(Request $request)
    {
    	$message = ['staff.required' => 'Bạn chưa nhập tên nhân viên',
    				'code.required'  => 'Bạn chưa nhập quyết định',
    				'reason.required' => 'Bạn chưa nhập lý do',
    				'description.required' => 'Bạn chưa nhập hình thức'
                   ];
        $validation = Validator::make( Input::all(), [
                               'staff' => 'required',
                               'code' => 'required',
                               'description' => 'required',
                               'reason'		=> 'required'
                            ], $message);


        if( $validation->fails() )
	      {
	        return json_encode([
	                'errors' => $validation->errors()->getMessages(),
	                'code' => 200
	             ]);
	      }

    	$username = $request->staff;
    	$space = strpos($username, " ");
    	$username = substr($username, 0, $space);

    	$id_user = User::where('username', $username)->value('id');

    	$create_date = Carbon::createFromFormat('d/m/Y', $request->create_date)->toDateString();

    	$retribution 				= Retribution::find($request->id_retribution);
    	$retribution->code 			= $request->code;
    	$retribution->decide 		= $request->decide;
    	$retribution->reason 		= $request->reason;
    	$retribution->description 	= $request->description;
    	$retribution->create_date 	= $create_date;
    	$retribution->user_id 		= $id_user;
    	$retribution->save();

    	$test = Retribution::where('id', $request->id_retribution)->get();
    	
    	$newdata = array();
    	foreach ($test as $value) {
    		$newdata['code'] = $value['code'];
    		$newdata['decide'] = ($value['decide'] == 'khenthuong' ? 'Khen Thưởng' : 'Kỷ Luật');
    		$newdata['reason'] = $value['reason'];
    		$newdata['description'] = $value['description'];
    		$newdata['create_date'] = Carbon::parse($value['create_date'])->format('d-m-Y');
    	}

    	$newdata['username'] = User::where('username', $username)->value('username');
    	$newdata['name'] = User::where('username', $username)->value('name');

    	return json_encode($newdata);
    }

    public function postDelete(Request $request)
    {
    	$retribution = Retribution::find($request->id);
    	$retribution->delete();
    }
}
