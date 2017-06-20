<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permission = array(
            '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11',
            '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11',
            '1', '2',
            '5', '6'           
        );

        $role = array(
            '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1',
            '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2',
            '3', '3',
            '4', '4'
        );

        for($i = 0; $i < 26; $i++)
        {
            DB::table('permission_role')->insert([
                'permission_id' => $permission[$i],
                'role_id' => $role[$i],
            ]);
        }
    }
}
