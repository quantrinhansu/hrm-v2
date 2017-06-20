<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PermissionTableSeeder::class);
         $this->call(RoleTableSeeder::class);
         $this->call(PermissionRoleTableSeeder::class);
         $this->call(JobtypeTableSeeder::class);
         $this->call(PositionTableSeeder::class);
         $this->call(DepartmentTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(UserRoleTableSeeder::class);
         $this->call(UserDepartmentTableSeeder::class);
         $this->call(UserPositionJobtypeTableSeeder::class);
         $this->call(EmployeeRelativeTableSeeder::class);
         $this->call(allowanceTableSeeder::class);
         $this->call(ContractTableSeeder::class);
         $this->call(NotificationTableSeeder::class);
         $this->call(LeaveTableSeeder::class);
         $this->call(RetributionTableSeeder::class);
         $this->call(BussinessTripTableSeeder::class);
         $this->call(HomeTableSeeder::class);
         //$this->call(TimekeepingTableSeeder::class);

    }
}
