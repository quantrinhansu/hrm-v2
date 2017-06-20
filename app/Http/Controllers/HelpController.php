<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use Auth;
use Mail;
class HelpController extends Controller
{
    public function getIntroduce()
    {   
        $home = Home::find(1);
        return view('help.introduce', ['home' => $home]);
    }

    public function getEdit()
    {
        $home = Home::find(1);
        return view('home.edit', ['home' => $home]);
    }

    public function postEdit(Request $request)
    {
        $home = Home::find(1);
        $home->name = $request->name;
        $home->director = $request->director;
        $home->address = $request->address;
        $home->phone_number = $request->phone_number;
        $home->email = $request->email;

        if($request->hasFile('logo')){
            $file = $request->file('logo'); //Lấy hình gán vào biến file
            $name = $file->getClientOriginalName(); //Lấy tên gốc của hình
            $temp = $file->getClientOriginalExtension();

            if($temp == 'jpg' || $temp == 'png'){
                $Hinh = str_random(4) . "_" . $name;
                $file->move("images", $Hinh);

                if(file_exists("images/" . $home['logo'])){
                    unlink("images/" . $home['logo']);
                }
                $home->logo = $Hinh;
            }
        }
        $home->save();     
    }

    public function getFeedBack()
    {
        return view('help.feedback');
    }

    public function postFeedBack(Request $request)
    {
        $this->validate($request, [
            'title'         =>  'required',
            'description'   =>  'required'
            ], [
            'title.required'    =>  'Bạn chưa nhập tiêu đề',
            'description.required'  =>  'Bạn chưa nhập nội dung'
            ]);

        $email = Auth::User()->email;
        $name = Auth::User()->name;
        $title = $request->title;
        $description = $request->description;
        //Gửi mail về cho user khi tạo user thành công
        $data = array('email' => $email, 'name' => $name, 'title' => $title, 'description' => $description);
        Mail::send('mail.feedback', $data, function ($message) use ($email, $name, $title) {
            $message->from($email, $name);
        
            $message->to('cbinh951@gmail.com', 'Phạm Công Bình');
                                
            $message->subject($title);

        });
        return redirect('help/feedback')->with('thongbao', 'Cám ơn bạn đã gửi phản hồi!');
    }
}
