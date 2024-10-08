<?php

namespace Database\Seeders;
use App\Models\Setting;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Setting::create([
            'email'=> 'testemail@gmail.com',
            'phone'=>'12345678',
            'insta'=>'https://instagram.com',
            'facebook'=>'https://facebook.com',
            'youtube'=>'https://youtube.com',
            'twitter'=>'https://twitter.com',
            'address'=>'150 Sheetal Park',
            'map'=>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14763.811524506124!2d70.7673784!3d22.3176217!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959cb068d5f09db%3A0x1bf532b8d7ac854e!2sAlphabit%20Infoway%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1727685009519!5m2!1sen!2sin'
        ]);
    

     }
}
