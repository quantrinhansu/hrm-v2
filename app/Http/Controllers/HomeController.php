<?php

namespace App\Http\Controllers;

use App\Home;
use Request;
use App\Noti;
use App\User;
use App\NotiUser;
use Auth;
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

    public static function SystemFetch(){
        $html_format = '<li>
          <a href="%1$s" target="_blank">
            <span class="label label-blue">
                <i class="%2$s"></i>
            </span>
            %3$s
            <span class="pull-right text-muted small">%4$s</span>
          </a>
        </li>';
        if(Request::ajax()) {
            if(isset($_POST["view"])){
                if($_POST["view"] != ''){
                    $user_notis = NotiUser::where('user_id',Auth::user()->id)->get();
                    foreach ($user_notis as $key => $user_noti) {
                        $user_noti_get = NotiUser::findOrFail($user_noti->id)->update(array('isRead' => 1));
                    }
                }
                $result = NotiUser::where('user_id',Auth::user()->id)->limit(5)->get();
                $output = '';
                if (count($result) > 0) {
                    foreach ($result as $key => $rs) {
                        $rs_noti = Noti::findOrFail($rs->noti_id)->first();
                        $icon = '';
                        $link = '';
                        $content = '';
                        switch ($rs_noti->type) {
                            case 'KT':
                                $link = 'retribution';
                                $icon = 'fa fa-trophy';
                                $content = 'Khen Thưởng ';
                                break;
                            
                            default:
                                break;
                        }
                        $output .= sprintf($html_format,$link, $icon, $content,$rs_noti->created_at);
                    }
                }else{
                    $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
                }
            }
            $user_notis_1 = NotiUser::where('user_id',Auth::user()->id)->where('isRead',0)->get();
            $count = count($user_notis_1);
            $data = array(
                    'notification'   => $output,
                    'unseen_notification' => $count
            );
            echo json_encode($data);
        }
    }

    public static function createNoti($rec_list, $type, $content){

        $noti = new Noti();
        $noti->rec_list = json_encode($rec_list);
        $noti->type = $type;
        $noti->content = $content;
        $noti->save();
        foreach ($rec_list as $key => $rec) {

            $user = User::findOrFail($rec);
            if ($user) {
                $noti->users()->attach($user);
            }
        }
       
    }
}
