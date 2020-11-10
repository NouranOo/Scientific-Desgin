<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'user',
            'password'=>\Illuminate\Support\Facades\Hash::make(123456),
            'email'=>'user@user.com',
            'address'=>'cairo',
            'sex'=>'male',

        ]);
    }
}
