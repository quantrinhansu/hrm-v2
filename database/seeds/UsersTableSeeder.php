<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = array(
            'congbinh@gmail.com',
            'phu@gmail.com',
            'khuong@gmail.com',
            'tien@gmail.com',
            'tung@gmail.com',
            'nam@gmail.com',
            'tri@gmail.com',
            'vu@gmail.com',
            'tuan@gmail.com',
            'dieu@gmail.com',
            'nhan@gmail.com',
            'tai@gmail.com',
            'minh@gmail.com',
            'tra@gmail.com',
            'cong@gmail.com',
            'thanh@gmail.com'
        );

        $username = array(
            'congbinh',
            'viettien',
            'phudat',
            'ducmata',
            'tuanml',
            'namcuxi',
            'dungtruong',
            'vude',
            'cuongde',
            'nhannguyen',
            'letai',
            'thanhnhan',
            'quangminh',
            'ngoctra',
            'huucong',
            'ngocthanh'
        );

        for($i = 0; $i < 15; $i++)
        {
            DB::table('users')->insert([
                'username' => $username[$i],
                'email' => $email[$i],
                'password' => bcrypt('123456')
            ]);
        }
         
    }
}
