<?php

use Illuminate\Database\Seeder;
use App\User;

class TimekeepingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        for ($i=1; $i <= 12; $i++) { 
			$month = $i;
			$content = array();
			$arr_user = array();
			foreach ($users as $key => $user) {
				$all_date = cal_days_in_month(CAL_GREGORIAN,$month,2017);
				for ($i=1; $i < $all_date; $i++) { 
					array_push($content,'cn');
					array_push($arr_user, $user->id);
				}	
			}
			$name = array();
			array_push($name, $i.'2017');
			$content = json_encode($content);
			
			DB::table('timekeeping')->insert([
                'name' => $name,
                'content' => $content,
                'user_ids'	=> $arr_user
            ]);
		}
    }
}
