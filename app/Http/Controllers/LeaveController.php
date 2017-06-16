<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leaves;
use Carbon\Carbon;
use Auth;
use Mail;
use App\User;
class LeaveController extends Controller
{
    public function getList()
    {
        //if (Auth::user()->can('leave_show')){
        	$leave = Leaves::all();
        	return view('leaves.list', ['leave' => $leave]);
        //}
    }

    public function getAdd()
    {
        //if (Auth::user()->can('leave_add')){
    	   return view('leaves.add');
        //}
    }

    public function postAdd(Request $request)
    {
    	$this->validate($request, 
    		[
    			'description'	=> 'required',
    			'from'			=> 'required',
    			'to'			=> 'required'
    		], [
    			'description.required'			=> 'Bạn chưa nhập lý do',
    			'from.required'					=> 'Bạn chưa nhập ngày nghỉ từ',
    			'to.required'					=> 'Bạn chưa nhập ngày nghỉ'
    		]);
    	$from = Carbon::createFromFormat('d/m/Y', $request->from)->toDateString();
    	$to = Carbon::createFromFormat('d/m/Y', $request->to)->toDateString();

    	$leave = new Leaves;
    	$leave->description = $request->description;
    	$leave->from 		= $from;
    	$leave->to 			= $to;
    	$leave->user_id		= $request->user_id;
    	$leave->accepter_id	= $request->user_id;
    	$leave->save();

    	return redirect('leave/add')->with('thongbao', 'Bạn đã gửi đơn xin nghỉ thành công');
    }

    public function postConfirm(Request $request)
    {
    	$leave = Leaves::find($request->id);
    	$leave->type = $request->type;
    	$leave->accepter_id = Auth::user()->id;
    	$leave->save();

    	$user_id = Leaves::where('id', $request->id)->value('user_id');
    	$accepter_id = Leaves::where('id', $request->id)->value('accepter_id');

    	$accepter = User::where('id', $accepter_id)->value('name');
    	$mail_user = User::where('id', $user_id)->value('email');
    	$type 		= $request->type;

    	$email = $mail_user;
        $name = $accepter;
        //Gửi mail về cho user khi tạo user thành công
        $data = array('email' => $email, 'name' => $name, 'type' => $type);
        Mail::send('mail.leave', $data, function ($message) use ($email, $name, $type) {
            $message->from('efode2017@gmail.com', 'Công Bình');
        
            $message->to($email, $name, $type);
                                
            $message->subject('Mail Xin Nghỉ');

        });
    }

    public function postCancel(Request $request)
    {
    	$leave = Leaves::find($request->id);
    	$leave->type = $request->type;
    	$leave->accepter_id = Auth::user()->id;
    	$leave->save();

    	$user_id = Leaves::where('id', $request->id)->value('user_id');
    	$accepter_id = Leaves::where('id', $request->id)->value('accepter_id');

    	$accepter = User::where('id', $accepter_id)->value('name');
    	$mail_user = User::where('id', $user_id)->value('email');
    	$type 		= $request->type;

    	$email = $mail_user;
        $name = $accepter;
        //Gửi mail về cho user khi tạo user thành công
        $data = array('email' => $email, 'name' => $name, 'type' => $type);
        Mail::send('mail.leave', $data, function ($message) use ($email, $name, $type) {
            $message->from('efode2017@gmail.com', 'Công Bình');
        
            $message->to($email, $name, $type);
                                
            $message->subject('Mail Xin Nghỉ');

        });
    }
}
