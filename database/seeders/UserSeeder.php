<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user::create([
        'name'=>'prince',
        'email'=>'prince@gmail.com',
        'password'=>'123456789',
        'usertype'=>'client',

        ]);
    }
}
