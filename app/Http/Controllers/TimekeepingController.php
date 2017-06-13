<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timekeeping;
use App\User;

class TimekeepingController extends Controller
{
    public function index(){
        // User
        $users = User::all();
        // get date by month
        $req_month = $_GET['month'];

        return view('salary.timekeeping', compact('users'));
    }

    public function store(Request $request){
    	$tk = new Timekeeping();
        // $tk->user_ids = json_encode($request->user_ids);
        // $tk->date = json_encode($request->date);
        // $tk->content = json_encode($request->tk);
        // $tk->save();
        dd($request);
    }

    // public static function getTimeKeeping($date){
    //     $tk = Timekeeping::all();
    //     $db_month = reset($tk);
    //     foreach ($db_month as $key => $value) {
    //         $db_time = reset($db_month)['time'];
    //         $db_time = json_decode($db_time);
    //         $db_time = reset($db_time);
    //         $db_time_arr = explode('_', $db_time);
    //         dd($db_time_arr);
    //     }
    // }
}
