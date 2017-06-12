<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = Home::find(1);
        return view('home', ['home' => $home]);
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
}
