<?php

use Illuminate\Database\Seeder;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notification')->insert([
                'title' => 'Họp Phòng',
                'content' => 'Toàn thể công ty chiều nay họp lúc 14h00',
                'create_by'	=>	'1'
            ]);
    }
}
