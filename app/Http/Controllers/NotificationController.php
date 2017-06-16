<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\Auth;
class NotificationController extends Controller
{
    public function getList()
    {
        //if (Auth::user()->can('notification_show')){
        	$notification = Notification::orderBy('created_at', 'desc')->get();
        	return view('notification.list', ['notification' => $notification]);
        //}
    }

    public function getAdd()
    {
        //if (Auth::user()->can('notification_add')){
    	   return view('notification.add');
        //}
    }

    public function postAdd(Request $request)
    {
    	$this->validate($request, 
    		[
    			'title'		=> 'required',
    			'content'		=> 'required'
    		], 
    		[
    			'title.required'	=> 'Bạn chưa nhập tiêu đề',
    			'content.required'	=> 'Bạn chưa nhập nội dung'
    		]);
    	$notification = new Notification;
    	$notification->title = $request->title;
    	$notification->content = $request->content;
    	$notification->create_by = Auth::user()->id;
    	$notification->save();

    	return redirect('notification/add')->with('thongbao', 'Bạn đã tạo thông báo thành công');
    }

    public function getEdit($id)
    {
        //if (Auth::user()->can('notification_edit')){
        	$notification = Notification::find($id);
        	return view('notification.edit', ['notification' => $notification]);
        //}
    }

    public function postEdit($id, Request $request)
    {
    	$this->validate($request, 
    		[
    			'title'		=> 'required',
    			'content'		=> 'required'
    		], 
    		[
    			'title.required'	=> 'Bạn chưa nhập tiêu đề',
    			'content.required'	=> 'Bạn chưa nhập nội dung'
    		]);
    	$notification = Notification::find($id);
    	$notification->title = $request->title;
    	$notification->description = $request->description;
    	$notification->content = $request->content;
    	$notification->create_by = Auth::user()->id;
    	$notification->save();

    	return redirect('notification/edit/' . $id)->with('thongbao', 'Bạn đã sửa thông báo thành công');
    }

    public function postDelete(Request $request)
    {
    	$notification = Notification::find($request->id);
    	$notification->delete();
    }

    public function getDetail($id)
    {
        //if (Auth::user()->can('notification_detail')){
        	$notification = Notification::find($id);
        	return view('notification.detail', ['notification' => $notification]);
        //}
    }
}
