<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::create([
            'sitename_en' => 'ScientificDesign',
            'sitename_ar' => 'كنجمارا',
            'logo' => 'testLogo.jpg',
            'email' => 'info@test.com',
            'phone' => '0123456789',
            'address' => 'Cairo',
            'lat' => '1',
            'long' => '1',
            'about_us_en' => 'About Us English Text',
            'about_us_ar' => 'نبذه عنا بالعربيه',
            'terms_en' => 'Terms and Conditions English Text',
            'terms_ar' => 'الشروط والاحكام بالعربيه',
            'policy_en' => 'privacy Policy English Text',
            'policy_ar' => 'الخصوصيه بالعربيه',
            'facebook' => '',
            'twitter' => '',
            'youtube' => '',
            'instagram' => '',
            'slider1' => 'testSlider.jpg',
            'slider2' => 'testSlider.jpg',
            'slider3' => 'testSlider.jpg',
            'slider4' => 'testSlider.jpg',
            'slider5' => 'testSlider.jpg',
            ]);
    }
}
