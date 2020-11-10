<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::create([
            'name'=>'مسطره كيمياء',
            'image'=>'80355308_298015591116157_5972845258579378176_n (1).jpg',
            'price'=>25,
        ]);

        \App\Models\Product::create([
            'name'=>'مسطره احياء',
            'image'=>'80682225_298017264449323_4947640323120562176_o - Copy.jpg',
            'price'=>25,
        ]);
    }
}
