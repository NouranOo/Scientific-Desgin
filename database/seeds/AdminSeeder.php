<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name'=>'admin',
            'password'=>\Illuminate\Support\Facades\Hash::make(123456),
            'email'=>'admin@admin.com',
        ]);
    }
}
