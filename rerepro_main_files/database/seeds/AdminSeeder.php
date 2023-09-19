<?php

use Faker\Factory;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Permission;
use App\CommonSetting;
class AdminSeeder extends DatabaseSeeder
{

    public function run()
    {
        $admin = User::firstOrCreate(array(
            'email' => 'admin@developer.com',
            'name' => 'Admin'
        ));
        $admin->password = bcrypt("password123");
        $admin->save();

        if($admin->profile == null){
            $profile = new \App\Profile();
            $profile->user_id = $admin->id;
            $profile->save();
        }

        $user = User::firstOrCreate(array(
            'email' => 'admin@matthew.com',
            'name' => 'User'
        ));
        $user->password = bcrypt("123456");
        $user->save();

        if($user->profile == null){
            $profile = new \App\Profile();
            $profile->user_id = $user->id;
            $profile->save();
        }

        $admin_role = Role::firstOrcreate(['name' => 'admin']);
        $user_role = Role::firstOrcreate(['name' => 'user']);
        $permission = Permission::firstOrcreate(['name' => 'All Permission']);
        $admin->assignRole('admin');
        $admin_role->givePermissionTo($permission);
        $user->assignRole('user');

        CommonSetting::create(['title'=>'Update Title from admin', 'favicon'=>'AdminDashboard/default_logo.png', 'dashboard_logo'=>'AdminDashboard/default_logo.png', 'dashboard_logo_text'=>'AdminDashboard/default_logo_text.png', 'footer_text'=>date('Y').' © Update footer form admin.']);

        $this->command->info('Admin User created with username admin@admin.com and password admin');
    }

}