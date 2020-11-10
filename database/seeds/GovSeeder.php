<?php

use Illuminate\Database\Seeder;

class GovSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `governments` (`name_ar`, `name_en`,`delivery`) VALUES
    ( 'القاهرة', 'Cairo','30'),
( 'الجيزة', 'Giza','30'),
( 'الأسكندرية', 'Alexandria','40'),
( 'الدقهلية', 'Dakahlia','40'),
( 'البحر الأحمر', 'Red Sea','50'),
( 'البحيرة', 'Beheira','40'),
( 'الفيوم', 'Fayoum','50'),
( 'الغربية', 'Gharbiya','40'),
( 'الإسماعلية', 'Ismailia','50'),
( 'المنوفية', 'Monofia','40'),
( 'المنيا', 'Minya','50'),
( 'القليوبية', 'Qaliubiya','40'),
( 'الوادي الجديد', 'New Valley','50'),
( 'السويس', 'Suez','50'),
( 'اسوان', 'Aswan','50'),
( 'اسيوط', 'Assiut','50'),
( 'بني سويف', 'Beni Suef','50'),
( 'بورسعيد', 'Port Said','50'),
( 'دمياط', 'Damietta','40'),
( 'الشرقية', 'Sharkia','40'),
( 'جنوب سيناء', 'South Sinai','50'),
( 'كفر الشيخ', 'Kafr Al sheikh','40'),
( 'مطروح', 'Matrouh','50'),
( 'الأقصر', 'Luxor','50'),
( 'قنا', 'Qena','50'),
( 'شمال سيناء', 'North Sinai','50'),
( 'سوهاج', 'Sohag','50')");
    }
}
