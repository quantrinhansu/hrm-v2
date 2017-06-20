<?php

use Illuminate\Database\Seeder;

class HomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home')->insert([
                'name' => 'BEESIGHT SOFT',
                'director' => 'Nguyễn Huy',
                'address'	=>	'320/12 Truong Chinh, 13th ward, Tan Binh District
								Ho Chi Minh City, Vietnam',
				'phone_number'	=>	'(+84) 908 558 815',
				'email'		=> 	'info@beesightsoft.com',
				'logo'		=>	'besignsoft.png'
            ]);
    }
}
