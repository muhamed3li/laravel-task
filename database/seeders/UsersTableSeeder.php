<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'), // password
            'role'=>'admin',
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('123456'), // password
            'role'=>'user',
        ]);
    }
}
