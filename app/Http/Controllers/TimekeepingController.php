<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timekeeping;
use App\User;
use Auth;
class TimekeepingController extends Controller
{
    public function index(){
        if (Auth::user()->can('salary_show')){
            // User
            $users = User::all();
            // get date by month
            if (!empty($_GET['month']) && !empty($_GET['year'])) {
                $req         = $_GET['month'].$_GET['year'];
                $tk_db       = Timekeeping::where('name',$req)->first();
                if ($tk_db) {
                    $tk_content  = $tk_db->content;
                    $tk_user_ids = $tk_db->user_ids;
                    $tk_date     = $tk_db->date;
                    return view('salary.timekeeping', compact('users','tk_content','tk_user_ids','tk_date'));
                }
                
            }
            return view('salary.timekeeping', compact('users'));
        }else{
            return redirect('home');
        }
    }

    public function store(Request $request){
        $all_tk = Timekeeping::all();
        foreach ($all_tk as $key => $value) {
            if ($value['name'] == $request->name) {
                $tk           = Timekeeping::where('name',$request->name)->first();
                $tk->user_ids = json_encode($request->user_ids);
                $tk->date     = json_encode($request->date);
                $tk->content  = json_encode($request->tk);
                $tk->date_work = json_encode($request->dw);
                $tk->save();
                return  redirect()->back()->with('msg','Đã cập nhật.'); 
            }
        }
        $tk           = new Timekeeping();
        $tk->name     = $request->name;
        $tk->user_ids = json_encode($request->user_ids);
        $tk->date     = json_encode($request->date);
        $tk->content  = json_encode($request->tk);
        $tk->date_work = json_encode($request->dw);
        $tk->save();
        return  redirect()->back()->with('msg','Đã thêm mới.'); 
    }
    // monthday : vd 062017
    public static function getDW($user_id , $month_date){
        $dw = Timekeeping::where('name',$month_date)->first();
        if ($dw) {
            $dw_info = $dw->date_work;
            $dw_info = json_decode($dw_info);
            foreach ($dw_info as $key => $value) {
                $out = explode('_', $value);
                if ((int)$out[0] == $user_id) {
                    return $out[1];
                }
            }           
        }
        return 0;
    }
}
