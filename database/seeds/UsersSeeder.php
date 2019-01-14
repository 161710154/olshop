<?php

use Illuminate\Database\Seeder;
use App\Role; 
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Membuat role admin 
        $adminRole = new Role(); 
        $adminRole->name = "admin"; 
        $adminRole->display_name = "Admin"; 
        $adminRole->save();

        $memberRole = new Role;
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();

        $membercustomRole = new Role;
        $membercustomRole->name = "membercustom";
        $membercustomRole->display_name = "Member Custom";
        $membercustomRole->save();

        // Membuat sample admin 
        $admin = new User(); 
        $admin->name = 'Admin Mokuzai'; 
        $admin->email = 'admin@gmail.com'; 
        $admin->password = bcrypt('rahasia'); 
        $admin->is_verified = 1;
        $admin->save();
        $admin->attachRole($adminRole);

        $member = new User;
        $member->name = "member";
        $member->email = "member@gmail.com";
        $member->password = bcrypt('rahasia');
        $member->is_verified = 1;
        $member->save();
        $member->attachRole($memberRole);

        $membercustom = new User;
        $membercustom->name = "membercustom";
        $membercustom->email = "membercustom@gmail.com";
        $membercustom->password = bcrypt('rahasia');
        $membercustom->is_verified = 1;
        $membercustom->save();
        $membercustom->attachRole($membercustomRole);
    }
}
